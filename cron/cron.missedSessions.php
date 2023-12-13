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

$students = new enrollmentSessionModel();
$join = " LEFT JOIN enrollment ON (enrollment_session.enrollment_id = enrollment.id)"
		. " LEFT JOIN session ON (enrollment_session.session_id = session.id)"
		. " LEFT JOIN user ON (enrollment.student_id = user.id)"
        . " LEFT JOIN timezone ON (user.timezone_id = timezone.id)"
		. " LEFT JOIN session_status ON (enrollment_session.session_status_id = session_status.id)";
$where = " enrollment_session.session_status_id = 1 "
        . " AND CONCAT(enrollment_session.day, ' ', enrollment_session.start_time) >= '" . $today_two->format('Y-m-d') . "'"
		. " AND enrollment.active = 1";
$select = "user.timezone_id AS id_zone_student,user.id AS user_id,enrollment_session.*,session.course_id,"
		. "session.coach_id,enrollment_session.extra_session_id,session_status.name,timezone.name AS large_name,"
		. "CONCAT(enrollment_session.day, ' ', enrollment_session.end_time) AS date_select_end,"
		. "timezone.name AS timezone";
$result_students = $students->select($where, '', $select, $join);

//echo json_encode($result_students);

foreach ($result_students as $stu) {

    $today_st->setTimezone(new DateTimeZone($stu->large_name));

    $date_end = new DateTime($stu->date_select_end, new DateTimeZone($stu->timezone));

    if ($stu->large_name != $stu->timezone) {
        $date_end->setTimezone(new DateTimeZone($stu->large_name));
    }

    if ($today_st >= $date_end) {

		$students->setId_enrollment_session($stu->id);
		$students->setId_session_status(3);
		$result_update = $students->updateSessionStatusId();

		if (!$result_update) {
			$log->setType_msg('ERROR');
			$log->setMsg('When updating missing session. Object: ' . json_encode($stu));
		} else {
			$log->setType_msg('INFO');
			$log->setMsg('Missing session update. Id student session: ' . $stu->id);
		}

		$log->writeLog();
    }
}

$log->setType_msg('INFO');
$log->setMsg('CRON MISSED SESSIONS EXECUTED');
$log->writeLog();
?>
