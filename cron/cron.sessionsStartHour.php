<?php

/*
 * Developed by wilowi
 */

set_time_limit(500);

ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

require_once '/var/cron/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';

require_once _URL_CRON.'util.php';
require_once _URL_CRON.'autoload.php';

$today = new DateTime('now');
$twoBefore = new DateTime('now');
$oneHour = new DateTime('now');
$oneHour->modify('+1 hour');
$oneHourDate = $oneHour->format('Y-m-d H:i');

$oneHour15 = new DateTime($oneHourDate);
$oneHour15->modify('-15 minutes');

$twoAfter = new DateTime('now');
$twoAfter->modify('+1 days');
$twoBeforeDate = $twoBefore->format('Y-m-d') . ' 00:00:00';
$twoAfterDate = $twoAfter->format('Y-m-d') . ' 00:00:00';

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('sessionsStartHour.txt');

$students = new studentsCoursesModel();
$where =  " enrollment.active = 1 AND user.active = 1 AND user.deleted_at IS NULL "
    . " AND session_status.id = 1 "
    . " AND CONCAT(enrollment_session.day,'',enrollment_session.start_time) between '$twoBeforeDate' AND '$twoAfterDate'";
$join =   " LEFT JOIN user ON (enrollment.student_id = user.id) "
    . " LEFT JOIN enrollment_session ON (enrollment.id = enrollment_session.enrollment_id) "
    . " LEFT JOIN session_status ON (enrollment_session.session_status_id = session_status.id) "
    . " LEFT JOIN section ON (enrollment.section_id = section.id) "
    . " LEFT JOIN course ON (section.course_id = course.id) "
    . " LEFT JOIN timezone ON (user.timezone_id = timezone.id) "
    . " LEFT JOIN conversation_package ON (course.conversation_package_id = conversation_package.id) "
    . " LEFT JOIN session_type ON (conversation_package.session_type_id = session_type.id) ";
$select = " enrollment_session.*, course.university_id AS id_university, timezone.name AS large_name, "
    . " course.is_flex, user.name AS name_user, user.lastname AS lastname_user, user.email, user.email_reception AS emailsReception, "
    . " enrollment.section_id, session_type.code AS type_group, CONCAT(enrollment_session.day,'',enrollment_session.start_time) AS date_select_ini, section.course_id, enrollment.student_id AS id_user";
$result_students = $students->select($where, '', $select, $join);

// array para guardar los assignments que se hayan encontrado y no hacer el sq
$assignments = array();
$schedule = new enrollmentSessionModel();

// --- FOR STUDENTS
if (count($result_students) > 0) {

    $arrayHoras = array();
    $documentation = new courseDocumentationModel();

    foreach ($result_students as $student) {

        $key = "";

        $dateSelectIni = new DateTime($student->date_select_ini, new DateTimeZone($student->large_name));

        /*if ($student->large_name != $student->large_name) {
            $dateSelectIni->setTimezone(new DateTimeZone($student->large_name));
        }*/

        $dateSelectIni->setTimezone(new DateTimeZone("Europe/Madrid"));

        if ($dateSelectIni > $oneHour15 && $dateSelectIni < $oneHour && $student->emailsReception == 1) {

            if (empty($student->is_flex)) {
                if ($student->makeup_id == 1 && !empty($student->session_id_recovered) && $student->type_group == 'O') {
                    $result_week_make = $schedule->select("id = $student->session_id_recovered");
                    $where_doc = "section_id = $student->section_id AND week_id = " . $student->coaching_week_id;
                    $key = $student->course_id . '_' . $student->section_id . '_' . $student->coaching_week_id;
                } else {
                    $where_doc = "section_id = $student->section_id AND week_id = $student->coaching_week_id";

                    if ($student->type_group == 'O') {
                        $key = $student->course_id . '_' . $student->section_id . '_' . $student->coaching_week_id;
                    } else {
                        $key = $student->course_id . '_' . $student->coaching_week_id;
                    }
                }
            } else {
                if ($student->makeup_id == 1 && !empty($student->session_id_recovered) && $student->type_group == 'O') {
                    $result_week_make = $schedule->select("id = $student->session_id_recovered");
                    $where_doc = "section_id = $student->section_id AND chapter_id = " . $result_week_make[0]->session_id;
                    $key = $student->course_id . '_' . $student->section_id . '_' . $result_week_make[0]->session_id;
                } else {
                    $where_doc = "section_id = $student->section_id AND chapter_id = $student->session_id";

                    if ($student->type_group == 'O') {
                        $key = $student->course_id . '_' . $student->section_id . '_' . $student->session_id;
                    } else {
                        $key = $student->course_id . '_' . $student->session_id;
                    }
                }
            }

            if (empty($assignments[$key])) {/* FALTA VALIDAR TODO ESTE IF */
                $result_doc = $documentation->select($where_doc, '', '*', ' LEFT JOIN lm_guides_chapters ON(lm_guides_chapters.id_chapter=lm_course_documentation.ids_chapters)');

                if (!empty($result_doc)) {
                    $assignments[$key] = new stdClass();

                    if (!empty($result_doc[0]->assignment)) {
                        $assignments[$key]->assignment = _URL_LOCATION_LINGUAMEETING . $result_doc[0]->assignment;
                    } elseif (!empty($result_doc[0]->url)) {
                        $assignments[$key]->assignment = _URL_LOCATION_LINGUAMEETING . $result_doc[0]->url;
                    }
                }
            }

            $student->assignment = $assignments[$key]->assignment;

            /*if ($student->large_name != $student->timezone) {
                $dateSelectIni->setTimezone(new DateTimeZone($student->large_name));
            } else {
                $dateSelectIni->setTimezone(new DateTimeZone($student->timezone));
            }*/

            $dateSelectIni->setTimezone(new DateTimeZone($student->large_name));

            $subject = "Your LinguaMeeting session starts in 1 hour!";
            $body = '<div >';
            $body .= "<br>Dear $student->name_user,<br>";
            $body .= "<br><br>Your LinguaMeeting session is starting soon! Your session is on <strong>" . $dateSelectIni->format('h:i A') . " (" . $student->large_name . ")</strong>.";

            if (!empty($student->assignment)) {
                $body .= '<br><br><strong>Before joining your session</strong>, make sure to review the <a href="' . $student->assignment . '"> assignment/conversation guide</a> provided by your instructor.';
            }

            $body .= "<br><br><strong>To join your session</strong>, follow these steps: ";
            $body .= '<br>'
                . '<ol>'
                . '<li>Enter your credentials at <a href="' . _URL_LOCATION_LINGUAMEETING . '/login">Linguameeting.com/login</a></li>'
                . '<li>Click on "View Course"</li>'
                . '<li>Once you are on the new page, scroll down and select "Join Session"</li>'
                . '<li>Click the "Join Session" button, which will appear 2 minutes before the session start time</li>'
                . '</ol>';
            $body .= 'This is a no-reply message. If you need to contact us, please send an email to <a href="mailto:support@linguameeting.com">support@linguameeting.com</a>.';
            $body .= "<br><br>Have no fear, the language coach is here!";

            $body .= '<br><br><img style="float:left;margin-right:20px;margin-top:20px;height:40px;" '
                . 'src="' . _URL_LOCATION_LINGUAMEETING . 'images/NewLogoLinguaMeeting.png" alt="LinguaMeeting" title="LinguaMeeting">';
            $body .= '</div>';

            $save = new emailsSessionsModel();
            $save->setId_user_receiver($student->id_user);
            $save->setEmail_receiver($student->email);
            $save->setBody_mail($body);
            $save->setSubject_mail($subject);
            $save->setDate_send_mes($today->format('Y-m-d H:i:s'));
            $save->setType_message('sessionStart');
            $result = $save->add();
            array_push($arrayHoras, $student);

            if ($result) {
                $log->setType_msg('INFO');
                $log->setMsg('Email saved to Stack . Object: ' . $student->email);
                $log->writeLog();
            } else {
                $log->setType_msg('ERROR');
                $log->setMsg('Saving email . Object: ' . $student->email);
                $log->writeLog();
            }
        }
    }
}

$log->setType_msg('INFO');
$log->setMsg('CRON SESSIONS START EXECUTED');
$log->writeLog();
