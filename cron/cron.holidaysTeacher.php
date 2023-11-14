<?php

/* 
 * Developed by wilowi
 * CRON: Send a notification to instructors one week before a holiday.
 * EXECUTE: Every Sundays.
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
$log->setFile_name('holidaysTeacher.txt');

$teachers = new coachingFormModel();
$where = "lm_coaching_form.end_date >= '" . $today->format('Y-m-d') . "'";
$join = " LEFT JOIN lm_coaching_form_holidays ON(lm_coaching_form_holidays.id_form=lm_coaching_form.id_form)"
		. " LEFT JOIN lm_courses ON(lm_coaching_form.id_form=lm_courses.id_form)"
		. " LEFT JOIN lm_courses_sections ON(lm_courses_sections.id_course=lm_courses.id_course)";
$select = " lm_coaching_form.*, lm_courses.id_course,lm_courses_sections.id_teacher, lm_coaching_form_holidays.days_holiday";
$result_teachers = $teachers->select($where, '', $select, $join);

$new_teachers = array();
foreach ($result_teachers as $teach) {

	$id_teacher = $teach->id_teacher;

	if (!empty($id_teacher)) {

		if (empty($new_teachers[$id_teacher])) {

			$new_teachers[$id_teacher] = new stdClass();

			$new_teachers[$id_teacher]->id_user = $id_teacher;
			$new_teachers[$id_teacher]->holidays = $teach->days_holiday;
		}
	}
}

//echo print_r($new_teachers);
if (count($new_teachers) > 0) {

	//echo print_r($student);
	foreach ($new_teachers as $teacher) {

		if (!empty($teacher->holidays)) {
			
			$holidays = explode(',', $teacher->holidays);

			foreach ($holidays as $holiday) {
				
				$date_holidayIni = new DateTime($holiday);
				$date_holiday = new DateTime($holiday);
				$date_holiday->modify('-1 week');

				if ($today >= $date_holiday && $today<$date_holidayIni) {

					$body = '<div style="font-family:&quot;Cuprum&quot;,sans-serif">';
					/* $body .= '<div style="padding-bottom:0.8em;width:45%;margin-right:1%;margin-bottom:1%;background:#fff;
					  border-radius:5px;font-family:&quot;Cuprum&quot;,sans-serif"><p style="font-family:&quot;Dosis&quot;,
					  sans-serif;font-weight:bold;font-size:128%;color:#314a94;border-radius:5px;border-bottom:solid 1px #314a94;
					  padding:0.4em;padding-left:0.8em;background:#d9e1ec;background:-webkit-linear-gradient(left top,#9fafc4,#d9e1ec);
					  background:-o-linear-gradient(bottom right,#9fafc4,#d9e1ec);background:-moz-linear-gradient(bottom right,#9fafc4,#d9e1ec);
					  background:linear-gradient(top right,#9fafc4,#d9e1ec)">Holiday at the university</p></div>'; */					
					$body .= "<br>This is a holiday reminder.";
					$body .= "<br>The holiday is at: <strong>" . $holiday."</strong>";
					$body .= '</div>';

					//echo $body;
					$notifications = new notificationsModel();
					$notifications->setId_type_not(12);
					$notifications->setData($body);
					$notifications->setDest_user($teacher->id_user);
					$notifications->setDate_insert($today->format('Y-m-d H:i:s'));
					$result_add = $notifications->add();


					if ($result_add) {
						$log->setType_msg('INFO');
						$log->setMsg('Adding Notification  . Object: ' . $teacher->id_user);
						$log->writeLog();
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
}

$log->setType_msg('INFO');
$log->setMsg('CRON HOLIDAYS TEACHER EXECUTED');
$log->writeLog();

?>