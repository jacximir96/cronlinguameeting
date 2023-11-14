<?php

/* 
 * Una vez al día
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

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('missedSessionsNotSelected.txt');

$students = new studentsCourseSessionsNewModel();
$join = " INNER JOIN lm_courses_duedates USING (week_id)"
        . " LEFT JOIN lm_users ON(lm_students_courses_sessions_new.id_user=lm_users.id_user)"
        . " LEFT JOIN lm_time_zones ON(lm_users.id_zone=lm_time_zones.id_zone)";
$where = "lm_students_courses_sessions_new.assigned=0 AND lm_courses_duedates.date_end <='".$today->format('Y-m-d')."' AND missed=0";
$select = "lm_students_courses_sessions_new.*,"
	. "lm_courses_duedates.*,lm_users.id_zone as id_zone_student,lm_time_zones.large_name";
$result_students = $students->select($where, '', $select, $join);

//echo"<pre>";echo print_r($result_students);echo "</pre>";
//echo "<pre>";echo print_r($students);echo "</pre>";


foreach ($result_students as $stu) {

    $today_st->setTimezone(new DateTimeZone($stu->large_name));
    $date_end = new DateTime($stu->date_end, new DateTimeZone($stu->large_name));

    if ($today_st > $date_end) {

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
    }

    $log->writeLog();
}

$log->setType_msg('INFO');
$log->setMsg('CRON MISSED not selected sessions EXECUTED');
$log->writeLog();
?>
