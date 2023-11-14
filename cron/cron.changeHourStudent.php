<?php

/*
 * Developed by wilowi
 * CRON: Send Notification for students when exists a Daylight saving in the university. The notifications is one day before.
 * EXECUTE: Every days.
 */
ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

require_once _URL_CRON.'util.php';
require_once _URL_CRON.'config.php';
require_once _URL_CRON.'autoload.php';
/*require_once $server['DOCUMENT_ROOT'] . '/cronlinguameeting/util.php';
require_once $server['DOCUMENT_ROOT'] . '/cronlinguameeting/config.php';
require_once $server['DOCUMENT_ROOT'] . '/cronlinguameeting/autoload.php';*/

$today = new DateTime('now');
$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('changeHourStudent.txt');

// --- FOR EEUU
$summerEEUU = new DateTime('2021-03-14');
$summerEEUUIni = new DateTime('2021-03-14');
$summerEEUU->modify('-1 day'); //one week before
$winterEEUU = new DateTime('2021-11-07');
$winterEEUUIni = new DateTime('2021-11-07');
$winterEEUU->modify('-1 day'); //one week before

//$today = new DateTime('2019-03-09 17:20');

if (   ($today >= $summerEEUU && $today<$summerEEUUIni) || ($today >= $winterEEUU && $today<$winterEEUUIni) ) {
	
	$day = '';
	if($today >= $summerEEUU && $today<$summerEEUUIni){
		$day = $summerEEUUIni->format('Y-m-d');
	}else{
		$day = $winterEEUUIni->format('Y-m-d');
	}

	$notifications = new notificationsModel();
	$idsEEUU = "1,2,3,4,5,6,7";
	$users = new userModel();
	$where_uni = "lm_users.rol=8 AND lm_users.active=1 AND lm_users.erased=0 AND lm_users.id_zone NOT IN($idsEEUU)"
			. " AND lm_course_students.active_course=1 AND lm_university.id_zone IN($idsEEUU) ";
	$join_uni = " LEFT JOIN lm_course_students ON (lm_users.id_user=lm_course_students.id_student)"
			. " LEFT JOIN lm_courses ON(lm_course_students.id_course=lm_courses.id_course)"
			. " LEFT JOIN lm_university ON(lm_courses.id_university=lm_university.id_university)";
	$select = "lm_users.*";

	$result_students = $users->select($where_uni, '', '*', $join_uni);
	
	//echo print_r($users);
	//echo print_r($result_students);

	if (!empty($result_students)) {
		foreach ($result_students as $co) {

			$data = "<div class='text-18'><strong>Important: Daylight saving in your school\'s time zone</strong></div>";
			$data .= '<br><div><span>Due to the daylight saving in the country where your school is located, '
					. 'you session/s have changed. Please, go to your portal to see when your next session is.</div>'
					. '<br><div>The daylight saving is on <strong>'.$day.'</strong>. The sessions will change that day.</div>'
					. '<br><div>Thanks.</div>';

			$data = addslashes($data);
			
			$notifications->setId_type_not(13);
			$notifications->setData($data);
			$notifications->setDest_user($co->id_user);
			$notifications->setDate_insert($today->format('Y-m-d H:i:s'));
			$result_add = $notifications->add();

			if (!$result_add) {
				$log->setType_msg('ERROR');
				$log->setMsg('When adding notification. ');
				$log->writeLog();
			} else {
				$log->setType_msg('INFO');
				$log->setMsg('Notification for ' . $co->email . ' - id_user: ' . $co->id_user);
				$log->writeLog();
			}
			
			$body = 'Dear Student,';
			$body.= '<br><br><div><span>Due to the daylight saving in the country where your school is located, '
					. 'you session/s have changed. Please, go to your portal to see when your next session is.</div>'
					. '<br><div>The daylight saving is on <strong>'.$day.'</strong>. The sessions will change that day.</div>'
					. '<div>Thanks.</div>';
			$body.='<br><br><img style="float:left;margin-right:20px;margin-top:20px;height:40px;width:180px;" '
					. 'src="'._URL_LOCATION_LINGUAMEETING.'images/logo.png" alt="LinguaMeeting" title="LinguaMeeting">';
			$subject = "Important: Daylight saving in your school's time zone";
			$subject = addslashes($subject);
			//echo $body;
			$save = new emailsModel();
			$save->setId_user_receiver($co->id_user);
			$save->setEmail_receiver($co->email);
			$save->setBody_mail($body);
			$save->setSubject_mail($subject);
			$save->setDate_send_mes($today->format('Y-m-d H:i:s'));
			$save->setType_message('daylight');
			$result = $save->add();
			
			if($result){
				
				$log->setType_msg('INFO');
				$log->setMsg('Email saved to Stack . Object: ' . $co->email);
				$log->writeLog();
				
			}else{
				
				$log->setType_msg('ERROR');
				$log->setMsg('Saving email . Object: ' . $co->email);
				$log->writeLog();

			}
			
			
		}
	}
	
	//echo print_r($new_coaches);
	
}

// --- FOR AUSTRALIA
$summerAustralia = new DateTime('2021-04-04');
$summerAustraliaIni = new DateTime('2021-04-04');
$summerAustralia->modify('-1 day'); //one week before
$winterAustralia = new DateTime('2021-10-03');
$winterAustraliaIni = new DateTime('2021-10-03');
$winterAustralia->modify('-1 day'); //one week before

//$today = new DateTime('2019-04-06 17:24');

if (   ($today >= $summerAustralia && $today<$summerAustraliaIni) || ($today >= $winterAustralia && $today<$winterAustraliaIni) ) {
	//echo "entro";
	$day = '';
	if($today >= $summerAustralia && $today<$summerAustraliaIni){
		$day = $summerAustraliaIni->format('Y-m-d');
	}else{
		$day = $winterAustraliaIni->format('Y-m-d');
	}
	
	$notifications = new notificationsModel();
	$idsAustralia = "24,25,26,27,28";
	$users = new userModel();
	$where_uni = "lm_users.rol=8 AND lm_users.active=1 AND lm_users.erased=0 AND lm_users.id_zone NOT IN($idsAustralia)"
			. " AND lm_course_students.active_course=1 AND lm_university.id_zone IN($idsAustralia) ";
	$join_uni = " LEFT JOIN lm_course_students ON (lm_users.id_user=lm_course_students.id_student)"
			. " LEFT JOIN lm_courses ON(lm_course_students.id_course=lm_courses.id_course)"
			. " LEFT JOIN lm_university ON(lm_courses.id_university=lm_university.id_university)";
	$select = "lm_users.*";

	$result_users = $users->select($where_uni, '', '*', $join_uni);

	if (!empty($result_users)) {
		foreach ($result_users as $co) {

			$data = "<div class='text-18'><strong>Important: Daylight saving in your school's time zone</strong></div>";
			$data .= '<br><div><span class="color10">Due to the daylight saving in the country where your school is located, '
					. 'you session/s have changed. Please, go to your portal to see when your next session is.</div>'
					. '<br><div>The daylight saving is on <strong>'.$day.'</strong>. The sessions will change that day.</div>'
					. '<div>Thanks.</div>';
			$data = addslashes($data);
			//echo $data;
			$notifications->setId_type_not(13);
			$notifications->setData($data);
			$notifications->setDest_user($co->id_user);
			$notifications->setDate_insert($today->format('Y-m-d H:i:s'));
			$result_add = $notifications->add();

			if (!$result_add) {
				$log->setType_msg('ERROR');
				$log->setMsg('When adding notification. ');
				$log->writeLog();
			} else {
				$log->setType_msg('INFO');
				$log->setMsg('Notification for ' . $co->email . ' - id_user: ' . $co->id_user);
				$log->writeLog();
			}
			
			$body = 'Dear Student,';
			$body.= '<br><br><div><span>Due to the daylight saving in the country where your school is located, '
					. 'you session/s have changed. Please, go to your portal to see when your next session is.</div>'
					. '<br><div>The daylight saving is on <strong>'.$day.'</strong>. The sessions will change that day.</div>'
					. '<div><br>Thanks.</div>';
			$body.='<br><br><img style="float:left;margin-right:20px;margin-top:20px;height:40px;width:180px;" '
					. 'src="'._URL_LOCATION_LINGUAMEETING.'images/logo.png" alt="LinguaMeeting" title="LinguaMeeting">';
			$subject = "Important: Daylight saving in your school's time zone";
			$subject = addslashes($subject);
			//echo $body;
			$save = new emailsModel();
			$save->setId_user_receiver($co->id_user);
			$save->setEmail_receiver($co->email);
			$save->setBody_mail($body);
			$save->setSubject_mail($subject);
			$save->setDate_send_mes($today->format('Y-m-d H:i:s'));
			$save->setType_message('daylight');
			$result = $save->add();
			
			if($result){
				
				$log->setType_msg('INFO');
				$log->setMsg('Email saved to Stack . Object: ' . $co->email);
				$log->writeLog();
				
			}else{
				
				$log->setType_msg('ERROR');
				$log->setMsg('Saving email . Object: ' . $co->email);
				$log->writeLog();

			}
		}
	}
}


$log->setType_msg('INFO');
$log->setMsg('CRON CHANGE HOUR STUDENT EXECUTED');
$log->writeLog();

?>