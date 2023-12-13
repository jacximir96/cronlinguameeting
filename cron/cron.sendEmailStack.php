<?php

/*
 * Developed by wilowi
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
$log->setFile_name('sendEmailStack.txt');

$optionsM = new managerOptionsModel();
$result_optionsM = $optionsM->select();
$noEnviar = false;

if ($result_optionsM[0]->date_emails != $today->format('Y-m-d')) {
	$optionsM->setEmails_sent(0);
	$optionsM->setDate_emails($today->format('Y-m-d'));
	$result_upOp = $optionsM->updateEmailsSent();
}

$emails = new emailsModel();
$limit = "40";
$result_emails = $emails->selectPagination("", '', 'date_send_mes DESC', $limit);

if (count($result_emails) > 0) {

	$cont_emails = 0;
	foreach ($result_emails as $email) {

		$addresses = array();
		array_push($addresses, $email->email);

		$attach = array();
		if (!empty($email->attach)) {
			array_push($attach, $email->attach);
		}

		$total = $result_optionsM[0]->emails_sent + $cont_emails;
		$email->subject = stripslashes($email->subject);

		if ($total < 1500) {
			$result = sendMail($addresses, $email->subject, $email->body, $attach);
		} elseif ($total < 3200) {
			$result = sendMailInfo($addresses, $email->subject, $email->body, $attach);
		} else {
			$noEnviar = true;
			$result = false;
		}

		if ($result) {
			$cont_emails++;
			$total = $result_optionsM[0]->emails_sent + $cont_emails;
			$log->setType_msg('INFO');
			$log->setMsg('Email ' . $email->type_message . ' sent to . Object: ' . $email->email);
			$log->writeLog();

			$jsonFormat = [
				"ip" => getRealIP()
			];

			$ip_log = json_encode($jsonFormat);

			if ($email->type_message == 'sessionStart') {
				$log_student = new studentsLogsModel();
				$log_student->setCauser_id($email->receiver_id);
				$log_student->setDescription('Email Session Start');
				//$log_student->setDate_log($today->format('Y-m-d H:i:s'));
				$result_add_log = $log_student->add();
			} elseif ($email->type_message == 'endCoaching') {
				$log_student = new studentsLogsModel();
				$log_student->setCauser_id($email->receiver_id);
				$log_student->setDescription('Email End Course');
				//$log_student->setDate_log($today->format('Y-m-d H:i:s'));
				$result_add_log = $log_student->add();
			} elseif ($email->type_message == 'notSessions') {
				$log_student = new studentsLogsModel();
				$log_student->setCauser_id($email->receiver_id);
				$log_student->setDescription('Email Not Sessions Selected');
				//$log_student->setDate_log($today->format('Y-m-d H:i:s'));
				$result_add_log = $log_student->add();
			} elseif ($email->type_message == 'occupationNotif') {
				$log_teacher = new studentsLogsModel();
				$log_teacher->setCauser_id($email->receiver_id);
				$log_teacher->setDescription('Occupation Notification sent.');
				//$log_teacher->setDate_log($today->format('Y-m-d H:i:s'));
				$log_teacher->setProperties($ip_log);
				$result_add_log = $log_teacher->add();
			} elseif ($email->type_message == 'sendReport') {
				$log_teacher = new studentsLogsModel();
				$log_teacher->setCauser_id($email->receiver_id);
				$log_teacher->setDescription('Report Sent.');
				//$log_teacher->setDate_log($today->format('Y-m-d H:i:s'));
				$log_teacher->setProperties($ip_log);
				$result_add_log = $log_teacher->add();
			} elseif ($email->type_message == 'sendInvoice') {
				$log_teacher = new studentsLogsModel();
				$log_teacher->setCauser_id($email->receiver_id);
				$log_teacher->setDescription('Invoice Sent.');
				//$log_teacher->setDate_log($today->format('Y-m-d H:i:s'));
				$log_teacher->setProperties($ip_log);
				$result_add_log = $log_teacher->add();
			} elseif ($email->type_message == 'daylight') {
				$log_student = new studentsLogsModel();
				$log_student->setCauser_id($email->receiver_id);
				$log_student->setDescription('Email Daylight');
				//$log_student->setDate_log($today->format('Y-m-d H:i:s'));
				$result_add_log = $log_student->add();
			}

			$where_del = "id=$email->id AND email='$email->email'";
			$result_del = $emails->delete($where_del);

			if (!$result_del) {
				$log->setType_msg('INFO');
				$log->setMsg('Error when deleting email - id email: ' . $email->id);
				$log->writeLog();
			}

			$optionsM->setEmails_sent($total);
			$optionsM->setDate_emails($today->format('Y-m-d'));
			$result_upOp = $optionsM->updateEmailsSent();
		} else {
			if (!$noEnviar) {
				$log->setType_msg('ERROR');
				$log->setMsg('Sending email ' . $email->type_message . '. Object: ' . $email->email);
				$log->writeLog();
			} else {
				$log->setType_msg('WARNING');
				$log->setMsg('Not sent because is more than 3500 ' . $email->type_message . '. Object: ' . $email->email);
				$log->writeLog();
			}
		}
	}
} else {
	$endCoaching = new emailsNextModel();
	$limit = "40";
	$result_emails_end = $endCoaching->selectPagination('', '', 'date_send_mes ASC', $limit);

	if (count($result_emails_end) > 0) {

		$cont_emails = 0;
		foreach ($result_emails_end as $email) {

			$addresses = array();
			array_push($addresses, $email->email);

			$attach = array();
			if (!empty($email->attach)) {
				array_push($attach, $email->attach);
			}

			$total = $result_optionsM[0]->emails_sent + $cont_emails;
			$email->subject = stripslashes($email->subject);

			if ($total < 1500) {
				$result = sendMail($addresses, $email->subject, $email->body, $attach);
			} elseif ($total < 3000) {
				$result = sendMailInfo($addresses, $email->subject, $email->body, $attach);
			} else {
				$noEnviar = true;
				$result = false;
			}

			if ($result) {

				$cont_emails++;
				$total = $result_optionsM[0]->emails_sent + $cont_emails;
				$log->setType_msg('INFO');
				$log->setMsg('Email Next' . $email->type_message . ' sent to . Object: ' . $email->email);
				$log->writeLog();

				if ($email->type_message == 'endCoaching') {
					$log_student = new studentsLogsModel();
					$log_student->setCauser_id($email->receiver_id);
					$log_student->setDescription('Email End Course');
					//$log_student->setDate_log($today->format('Y-m-d H:i:s'));
					$result_add_log = $log_student->add();
				}

				$where_del = "id = $email->id AND email = '$email->email'";
				$result_del = $endCoaching->delete($where_del);

				if (!$result_del) {
					$log->setType_msg('INFO');
					$log->setMsg('Error when deleting email next - id email: ' . $email->id);
					$log->writeLog();
				}

				$optionsM->setEmails_sent($total);
				$optionsM->setDate_emails($today->format('Y-m-d'));
				$result_upOp = $optionsM->updateEmailsSent();
			} else {
				if (!$noEnviar) {
					$log->setType_msg('ERROR');
					$log->setMsg('Sending next email ' . $email->type_message . '. Object: ' . $email->email);
					$log->writeLog();
				} else {
					$log->setType_msg('WARNING');
					$log->setMsg('Not sent next because is more than 3500 ' . $email->type_message . '. Object: ' . $email->email);
					$log->writeLog();
				}
			}
		}
	}
}

$log->setType_msg('INFO');
$log->setMsg('CRON SEND EMAIL STACK EXECUTED - total ' . $total);
$log->writeLog();
