<?php

/* 
 * Developed by wilowi
 */

ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

require_once _URL_CRON.'util.php';
require_once _URL_CRON.'config.php';
require_once _URL_CRON.'autoload.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/util.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/autoload.php';
$today = new DateTime('now');

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('holidays.txt');

$students = new courseStudentsModel();
$where = "lm_course_students.active_course=1 AND lm_users.active=1 AND lm_users.erased=0";
$join = " LEFT JOIN lm_users ON(lm_course_students.id_student=lm_users.id_user)"
		. " LEFT JOIN lm_courses ON(lm_courses.id_course=lm_course_students.id_course)"
		. " LEFT JOIN lm_coaching_form ON(lm_courses.id_form=lm_coaching_form.id_form)"
		. " LEFT JOIN lm_coaching_form_holidays ON(lm_coaching_form_holidays.id_form=lm_coaching_form.id_form)"
		. " LEFT JOIN lm_time_zones ON(lm_users.id_zone=lm_time_zones.id_zone)";
$select = " lm_course_students.*, lm_users.id_user,lm_users.name_user,lm_users.lastname_user, lm_users.created,lm_users.email,"
		. " lm_courses.id_university,lm_courses.id_form,"
		. " lm_time_zones.large_name,lm_coaching_form_holidays.days_holiday";
$result_students = $students->select($where, '', $select, $join);

//echo print_r($result_students);

if (count($result_students) > 0) {

	$new_students = orderStudentOld($result_students);

	foreach ($new_students as $student) {

		//echo print_r($student);

		$holidays = explode(',', $student->holidays);

		//echo print_r($holidays);

		foreach ($holidays as $holiday) {

			if (!empty($holiday) && $holiday == $student->today_session) {

				// send email
				//echo "sending email";
				//$addresses = array();
				//array_push($addresses, $student->email);
				//$subject = "Holiday at the university";
				$body = '<div style="font-family:&quot;Cuprum&quot;,sans-serif">';
				/*$body .= '<div style="padding-bottom:0.8em;width:45%;margin-right:1%;margin-bottom:1%;background:#fff;
				border-radius:5px;font-family:&quot;Cuprum&quot;,sans-serif"><p style="font-family:&quot;Dosis&quot;,
				sans-serif;font-weight:bold;font-size:128%;color:#314a94;border-radius:5px;border-bottom:solid 1px #314a94;
				padding:0.4em;padding-left:0.8em;background:#d9e1ec;background:-webkit-linear-gradient(left top,#9fafc4,#d9e1ec);
				background:-o-linear-gradient(bottom right,#9fafc4,#d9e1ec);background:-moz-linear-gradient(bottom right,#9fafc4,#d9e1ec);
				background:linear-gradient(top right,#9fafc4,#d9e1ec)">Holiday at the university</p></div>';*/
				$body .= "<br>Dear $student->name_user,";
				$body .= "<br>This is a reminder for your university holiday.";
				$body .= "<br>The holiday is: " . $holiday;
				$body .= "<br><strong>Important notice:</strong>  if you are planning to be in a place with a different time zone than your school, please go to <i>Profile"
					. "</i> to make the necessary adjustments.";
				$body .= "<br>The Linguameeting Team.";
				$body .= '<br><br><img style="float:left;margin-right:20px;margin-top:20px;height:40px;width:180px;" '
						. 'src="'._URL_LOCATION_LINGUAMEETING.'images/logo.png" alt="LinguaMeeting" title="LinguaMeeting">';
				$body .= '</div>';

				//echo $body;
				//$result = sendMail($addresses, $subject, $body);
				/* $save = new emailsModel();
				  $save->setId_user_receiver($student->id_user);
				  $save->setEmail_receiver($student->email);
				  $save->setBody_mail($body);
				  $save->setSubject_mail($subject);
				  $save->setDate_send_mes($today->format('Y-m-d H:i:s'));
				  $save->setType_message('holidays');
				  $result = $save->add(); */

				$notifications = new notificationsModel();
				$notifications->setId_type_not(12);
				$notifications->setData($body);
				$notifications->setDest_user($student->id_user);
				$notifications->setDate_insert($today->format('Y-m-d H:i:s'));
				$result_add = $notifications->add();


				if ($result_add) {
					$log->setType_msg('INFO');
					$log->setMsg('Adding Notification  . Object: ' . $student->email);
					$log->writeLog();
					
					$log_student = new studentsLogsModel();
					$log_student->setId_student($student->id_user);
					$log_student->setLog_description('Notification Holidays');
					$log_student->setDate_log($today->format('Y-m-d H:i:s'));
					$result_add_log = $log_student->add();
					
				} else {
					$log->setType_msg('ERROR');
					$log->setMsg('When adding notification: ' . json_encode($student));
					$log->writeLog();
				}
				
				
			} else {
				//echo "NOT SENDING";
			}
		}
	}
}

$log->setType_msg('INFO');
$log->setMsg('CRON HOLIDAYS EXECUTED');
$log->writeLog();

function orderStudentOld($result_student) {

	$newStudent = array();
	$next_session = null;

	//echo print_r($result_student);
	foreach ($result_student as $student) {

		// Get timezone university
		$uni = new universityModel();
		$join = " LEFT JOIN lm_time_zones USING(id_zone)";
		$where = "id_university=" . $student->id_university;
		$select_uni = "lm_university.id_university, lm_university.id_zone, lm_time_zones.large_name";
		$result_uni = $uni->select($where, '', $select_uni, $join);

		$id_user = $student->id_user;
		$timezone = $student->large_name;
		$time_from_session = new DateTime($student->time_from_session, new DateTimeZone($result_uni[0]->large_name));
		$time_to_session = new DateTime($student->time_to_session, new DateTimeZone($result_uni[0]->large_name));
		$time_from_session->setTimezone(new DateTimeZone($timezone));
		$time_to_session->setTimezone(new DateTimeZone($timezone));
		$today_st = new DateTime('now', new DateTimeZone($result_uni[0]->large_name));
		$today_st->setTimezone(new DateTimeZone($timezone));
		$today_st->modify('+1 day');

		if (empty($newStudent[$id_user])) {

			$newStudent[$id_user] = new stdClass();
		}

		$newStudent[$id_user]->id_user = $id_user;
		$newStudent[$id_user]->name_user = $student->name_user;
		$newStudent[$id_user]->lastname_user = $student->lastname_user;
		$newStudent[$id_user]->email = $student->email;
		$newStudent[$id_user]->timezone = $student->large_name;
		$newStudent[$id_user]->id_university = $student->id_university;
		$newStudent[$id_user]->today_session = $today_st->format('Y-m-d');
		$newStudent[$id_user]->holidays = $student->days_holiday;
	}

	//echo print_r($newStudent);
	return $newStudent;
}

?>