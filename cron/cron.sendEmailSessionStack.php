<?php

/*
 * Cron para enviar los correos de próxima sessión 1 hora antes
 */

set_time_limit(400);

ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

require_once '/var/cron/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';

require_once _URL_CRON.'util.php';
require_once _URL_CRON.'autoload.php';

$today = new DateTime('now');

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('sendEmailSessionStack.txt');

$optionsM = new managerOptionsModel();
$result_optionsM = $optionsM->select();
$noEnviar = false;

if ($result_optionsM[0]->date_emails_sessions != $today->format('Y-m-d')) {

    $optionsM->setEmails_sessions_sent(0);
    $optionsM->setDate_emails_sessions($today->format('Y-m-d'));
    $result_upOp = $optionsM->updateEmailsSessionsSent();

}


$emails = new emailsSessionsModel();
$limit = "40";
//$result_emails = $emails->selectPagination("type_message!='notSessionSelected'", '', 'date_send_mes ASC', $limit);
$result_emails = $emails->selectPagination("", '', 'date_send_mes DESC', $limit);
//echo print_r($result_emails);

if (count($result_emails) > 0) {

    $cont_emails = 0;
    foreach ($result_emails as $email) {

	// send email
	//echo "sending email:";echo print_r($email);	    
	$addresses = array();
	array_push($addresses, $email->email_receiver);

	$attach = array();
	if (!empty($email->attach)) {

	    array_push($attach, $email->attach);
	}

	//echo $email->body_mail;
	$total = $result_optionsM[0]->emails_sessions_sent + $cont_emails;
	$email->subject_mail = stripslashes($email->subject_mail);

	if ($total < 1500) {

	    $result = sendMailSessionsNoReply($addresses, $email->subject_mail, $email->body_mail, $attach);
	    
	} elseif ($total < 3200) {

	    $result = sendMailSessionsNoReply2($addresses, $email->subject_mail, $email->body_mail, $attach);
	    
	} else {

	    $noEnviar = true;
	    $result = false;
	}


	if ($result) {

	    $cont_emails++;
	    $total = $result_optionsM[0]->emails_sessions_sent + $cont_emails;
	    $log->setType_msg('INFO');
	    $log->setMsg('Email ' . $email->type_message . ' sent to . Object: ' . $email->email_receiver);
	    $log->writeLog();

	    //$today = new DateTime('now');
	    if ($email->type_message == 'sessionStart') {
		$log_student = new studentsLogsModel();
		$log_student->setId_student($email->id_user_receiver);
		$log_student->setLog_description('Email Session Start');
		$log_student->setDate_log($today->format('Y-m-d H:i:s'));
		$result_add_log = $log_student->add();
	    }
	    
	    //delete email.
	    $where_del = "id_email_session=$email->id_email_session AND email_receiver='$email->email_receiver'";
	    $result_del = $emails->delete($where_del);

	    if (!$result_del) {
		$log->setType_msg('INFO');
		$log->setMsg('Error when deleting email - id email: ' . $email->id_email_session);
		$log->writeLog();
	    }
	    
	    $optionsM->setEmails_sessions_sent($total);
	    $optionsM->setDate_emails_sessions($today->format('Y-m-d'));
	    $result_upOp = $optionsM->updateEmailsSessionsSent();
	    
	} else {

	    if (!$noEnviar) {

		$log->setType_msg('ERROR');
		$log->setMsg('Sending email ' . $email->type_message . '. Object: ' . $email->email_receiver);
		$log->writeLog();
		
	    } else {

		$log->setType_msg('WARNING');
		$log->setMsg('Not sent because is more than 3500 ' . $email->type_message . '. Object: ' . $email->email_receiver);
		$log->writeLog();
	    }
	}
    }
    

    
}

$log->setType_msg('INFO');
$log->setMsg('CRON SEND EMAIL STACK EXECUTED - total '.$total);
$log->writeLog();
?>
