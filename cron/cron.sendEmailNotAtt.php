<?php

/*
 * Developed by wilowi
 * CRON: Send a email not attendance
 * EXECUTE: Every day at 07:30 spanish time.
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
$log->setFile_name('sendEmailNotAtt.txt');

$emails = new emailsNotattendanceModel();
$limit = "60";
$result_emails = $emails->selectPagination('', '', 'date_send_mes ASC', $limit);


if (count($result_emails) > 0) {

    $cont_emails = 0;
    foreach ($result_emails as $email) {

	// send email
	//echo "sending email";	    
	$addresses = array();
	array_push($addresses, $email->email_receiver);

	$attach = array();
	if (!empty($email->attach)) {

	    array_push($attach, $email->attach);
	}

	$email->subject_mail = stripslashes($email->subject_mail);
	$result = sendMailSupport($addresses, $email->subject_mail, $email->body_mail, $attach);

	if ($result) {

	    $cont_emails++;
	    $total = $result_optionsM[0]->emails_sent + $cont_emails;
	    $log->setType_msg('INFO');
	    $log->setMsg('Email ' . $email->type_message . ' sent to . Object: ' . $email->email_receiver);
	    $log->writeLog();

	    //$today = new DateTime('now');
	    if ($email->type_message == 'notattendance') {
		$log_student = new studentsLogsModel();
		$log_student->setId_student($email->id_user_receiver);
		$log_student->setLog_description('Email Not Attendance session');
		$log_student->setDate_log($today->format('Y-m-d H:i:s'));
		$result_add_log = $log_student->add();
	    }

	    //delete email.
	    $where_del = "id_email=$email->id_email AND email_receiver='$email->email_receiver'";
	    $result_del = $emails->delete($where_del);

	    if (!$result_del) {
		$log->setType_msg('INFO');
		$log->setMsg('Error when deleting email - id email: ' . $email->id_email);
		$log->writeLog();
	    }
	} else {

	    $log->setType_msg('ERROR');
	    $log->setMsg('Sending email ' . $email->type_message . '. Object: ' . $email->email_receiver);
	    $log->writeLog();
	}
    }
}

$log->setType_msg('INFO');
$log->setMsg('CRON SEND EMAIL NOT ATTENDANCE EXECUTED - total ' . $cont_emails);
$log->writeLog();
?>