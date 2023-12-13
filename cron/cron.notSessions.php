<?php

/*
 * Developed by wilowi
 * Once a week on Saturdays.
 */

set_time_limit(500);
ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

require_once '/var/cron/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'] . '/cronlinguameeting/config.php';

require_once _URL_CRON . 'util.php';
require_once _URL_CRON . 'autoload.php';

$today = new DateTime('now');
$todayDate = $today->format('Y-m-d');
$twoBefore = new DateTime('now');
$twoBefore->modify('+2 days');
$twoBeforeDate = $twoBefore->format('Y-m-d');

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('notSessions.txt');

/*$students = new studentsCoursesModel();
$where = "lm_students_courses.active=1 AND lm_users.active=1 AND lm_users.erased=0 AND lm_courses_duedates.date_start >= '$todayDate' AND lm_courses_duedates.order_week = 1 ORDER BY lm_courses_duedates.date_start ASC";
$join = " LEFT JOIN lm_users ON(lm_students_courses.id_user=lm_users.id_user)"
    . " LEFT JOIN lm_courses_new ON(lm_courses_new.course_id=lm_students_courses.course_id)"
    . " LEFT JOIN lm_courses_duedates ON(lm_courses_duedates.course_id=lm_students_courses.course_id)";
$select = "lm_users.id_user, lm_users.name_user, lm_users.lastname_user, lm_users.email, lm_users.emailsReception,"
    . " lm_courses_new.name_course, lm_courses_duedates.date_start, lm_courses_duedates.order_week, lm_courses_duedates.is_makeUp, lm_students_courses.*";*/

$students = new studentsCoursesModel();
$where =  " enrollment.active=1 AND user.active = 1 AND user.deleted_at IS NULL AND coaching_week.start_date >= '$todayDate' ORDER BY coaching_week.start_date ASC";
$join =   " LEFT JOIN user ON (enrollment.student_id = user.id)"
        . " LEFT JOIN section ON (enrollment.section_id = section.id)"
        . " LEFT JOIN course ON (section.course_id = course.id)"
        . " LEFT JOIN coaching_week ON (course.id = coaching_week.course_id)";
$select = " user.id AS id_user, user.name AS name_user, user.lastname AS lastname_user, user.email, user.email_reception AS emailsReception,"
        . " course.name AS name_course, coaching_week.start_date AS date_start, coaching_week.is_makeup AS is_makeUp, enrollment.*";    
$result_students = $students->select($where, '', $select, $join);

if ( count($result_students) > 0 ) {

    foreach ( $result_students as $student ) {

        if ( $student->date_start == $twoBeforeDate ) {

            $enrollmentSession = new enrollmentSessionModel();
            $where_session = "enrollment_session.enrollment_id = " . $student->id."";
            $select_sessions = "enrollment_session.*";
            $result_sessions = $enrollmentSession->select($where_session, '', $select_sessions, '');

            if ( count( $result_sessions ) == 0 ) {
                if ( $student->emailsReception == 1 ) {
                    $subject = "Linguameeting not sessions selected";
                    $body = '<div style="font-family:&quot;Cuprum&quot;,sans-serif">';
                    $body .= '<div style="padding-bottom:0.8em;width:45%;margin-right:1%;margin-bottom:1%;background:#fff;
				border-radius:5px;font-family:&quot;Cuprum&quot;,sans-serif"><p style="font-family:&quot;Dosis&quot;,
				sans-serif;font-weight:bold;font-size:128%;color:#314a94;border-radius:5px;border-bottom:solid 1px #314a94;
				padding:0.4em;padding-left:0.8em;background:#d9e1ec;background:-webkit-linear-gradient(left top,#9fafc4,#d9e1ec);
				background:-o-linear-gradient(bottom right,#9fafc4,#d9e1ec);background:-moz-linear-gradient(bottom right,#9fafc4,#d9e1ec);
				background:linear-gradient(top right,#9fafc4,#d9e1ec)">LinguaMeeting not sessions selected</p></div>';
                    $body .= "<br>Dear $student->name_user,";
                    $body .= "<br><br>You do not have any session selected for your course <strong>$student->name_course</strong>.";
                    $body .= '<br><br>Go to <a href="' . _URL_LOCATION_LINGUAMEETING . '" target="_blank">www.linguameeting.com</a> and select a session';
                    $body .= '<br><br> <p>If you wish to contact us, please do not reply to this message but instead contact support: <a href="mailto:support@linguameeting.com">support@linguameeting.com</a></p>';
                    $body .= '</div>';

                    $address = array($student->email);

                    $save = new emailsModel();
                    $save->setReceiver_id($student->id_user);
                    $save->setEmail($student->email);
                    $save->setBody($body);
                    $save->setSubject($subject);
                    $save->setDate_send_mes($today->format('Y-m-d H:i:s'));
                    $save->setType_message('notSessions');
                    $result = $save->add();

                    if ( $result ) {
                        $log->setType_msg('INFO');
                        $log->setMsg('Email save to stack . Object: ' . $student->email);
                        $log->writeLog();
                    } else {
                        $log->setType_msg('ERROR');
                        $log->setMsg('When saving email for student. Object: ' . json_encode($student));
                        $log->writeLog();
                    }

                } else {
                    $log->setType_msg('INFO');
                    $log->setMsg('Email not saving to stack because the user has desactivated the email reception. Object: ' . $student->email);
                    $log->writeLog();
                }
            } else {
                echo 'NOT SENDING';
            }
        }
    }
}

$log->setType_msg('INFO');
$log->setMsg('CRON NOT SESSIONS EXECUTED');
$log->writeLog();
?>