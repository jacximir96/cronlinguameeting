<?php

/*
 * Developed by wilowi
 */


ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

require_once '/var/cron/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';
//echo print_r($server);
require_once _URL_CRON.'util.php';
require_once _URL_CRON.'autoload.php';


$today = new DateTime('now');
$today_st = new DateTime('now');
$today_two = new DateTime('now');
$today_two->modify('-7 days');

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('missedSessions.txt');

$students = new studentsCourseSessionsNewModel();
$join = " LEFT JOIN lm_courses_new USING (course_id)"
	. "LEFT JOIN lm_students_courses ON(lm_students_courses_sessions_new.enroll_id=lm_students_courses.enroll_id)"
	. " LEFT JOIN lm_university USING(id_university)"
        . " LEFT JOIN lm_users ON(lm_students_courses_sessions_new.id_user=lm_users.id_user)"
	. " LEFT JOIN lm_time_zones ON(lm_users.id_zone=lm_time_zones.id_zone)";
$where = "lm_students_courses_sessions_new.assigned=1 AND lm_users.active=1 AND lm_users.erased=0 "
        . "AND lm_students_courses_sessions_new.date_select_ini between '" . $today_two->format('Y-m-d') . "' AND '".$today->format('Y-m-d')."'"
	. " AND lm_students_courses.active=1";
$select = "lm_users.id_zone as id_zone_student,lm_students_courses_sessions_new.*,"
	. "lm_time_zones.large_name";
$result_students = $students->select($where, '', $select, $join);

//echo "<pre>";echo print_r($result_students);echo "</pre>";
//echo "<pre>";echo print_r($students);echo "</pre>";

foreach ($result_students as $stu) {

    $today_st->setTimezone(new DateTimeZone($stu->large_name));

    $date_end = new DateTime($stu->date_select_end, new DateTimeZone($stu->timezone));

    if ($stu->large_name != $stu->timezone) {

        $date_end->setTimezone(new DateTimeZone($stu->large_name));
    }


    if ($today_st >= $date_end && empty($stu->attendance)) {
	
	$students->setId_student_session($stu->id_student_session);
	$students->setMissed(1);
	$result_update = $students->updateMissed();

	if (!$result_update) {
	    
	    $log->setType_msg('ERROR');
	    $log->setMsg('When updating missing session. Object: ' . json_encode($stu));
	    
	} else {

	    $log->setType_msg('INFO');
	    $log->setMsg('Missing session update. Id student session: ' . $stu->id_student_session);
	}

	$log->writeLog();
    }
}

$log->setType_msg('INFO');
$log->setMsg('CRON MISSED SESSIONS EXECUTED');
$log->writeLog();
?>
