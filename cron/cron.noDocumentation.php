<?php

/*
 * Developed by David Camacho
 */

set_time_limit(500);
ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

require_once '/var/cron/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'] . '/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'] . '/config.php';

require_once _URL_CRON . 'util.php';
require_once _URL_CRON . 'autoload.php';

$today = new DateTime('now');
$todayDate = $today->format('Y-m-d');

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('noCourseDocumentationUploaded.txt');

$courses = new coursesNewModel();

$where = "lm_courses_new.date_end_course >= '$todayDate' OR date_end_course is null ORDER BY lm_courses_new.date_ini_course ASC";
$join = " LEFT JOIN lm_university USING(id_university)"
    . " LEFT JOIN lm_time_zones ON (lm_university.id_zone=lm_time_zones.id_zone)";
$select = " lm_courses_new.*, lm_university.name_university,lm_university.id_university,lm_time_zones.large_name";

$result_courses = $courses->select($where, '', $select, $join);

if (count($result_courses) > 0) {

    foreach ($result_courses as $course) {

        if ($course->date_end_course == "") {

            $today_uni = new DateTime('now', new DateTimeZone($course->large_name));
            $today_uni_date = $today_uni->format('Y-m-d');

            $one_week = new DateTime($course->date_ini_course, new DateTimeZone($course->large_name));
            $one_week->modify('-1 week');
            $one_week_date = $one_week->format('Y-m-d');

            if ($today_uni_date >= $one_week_date) {
                $section_course = new coursesSectionsNewModel();
                $where_section = "lm_courses_sections_new.course_id=" . $course->course_id;
                $join_section = " LEFT JOIN lm_users ON (lm_courses_sections_new.id_teacher = lm_users.id_user)";
                $select_section = "lm_courses_sections_new.*, lm_users.*";
                $result_section = $section_course->select($where_section, '', $select_section, $join_section);
                if (count($result_section) > 0) {
                    foreach ($result_section as $section) {
                        $documentation_course = new courseDocumentationModel();
                        $where_documentation = "lm_course_documentation.id_section=" . $section->section_id;
                        $select_documentation = "lm_course_documentation.*";
                        $result_documentation = $documentation_course->select($where_documentation, '', $select_documentation, '');

                        if (count($result_documentation) == 0) {
                            if ($section->emailsReception == 1) {
                                $subject = "LinguaMeeting no course documentation uploaded";
                                $body = '<div style="font-family:&quot;Cuprum&quot;,sans-serif">';
                                $body .= '<div style="padding-bottom:0.8em;width:45%;margin-right:1%;margin-bottom:1%;background:#fff;
                                border-radius:5px;font-family:&quot;Cuprum&quot;,sans-serif"><p style="font-family:&quot;Dosis&quot;,
                                sans-serif;font-weight:bold;font-size:128%;color:#314a94;border-radius:5px;border-bottom:solid 1px #314a94;
                                padding:0.4em;padding-left:0.8em;background:#d9e1ec;background:-webkit-linear-gradient(left top,#9fafc4,#d9e1ec);
                                background:-o-linear-gradient(bottom right,#9fafc4,#d9e1ec);background:-moz-linear-gradient(bottom right,#9fafc4,#d9e1ec);
                                background:linear-gradient(top right,#9fafc4,#d9e1ec)">LinguaMeeting no course documentation uploaded</p></div>';
                                $body .= "<br>Dear $section->name_user,";
                                $body .= '<br><br>I hope all is well. We are writing to you today to remind you to upload instructions/content for the conversation guides of each coaching session. Please, upload the instructions in your LinguaMeeting Portal by going to the Instructors portal>Active Courses>Instructions, or by editing your coaching form.';  
                                $body .= ' Click <a href="https://www.youtube.com/watch?v=jTTxZU_G_Lo" target="_blank">here</a> to view a video tutorial ';
                                $body .= '<br><br><p>Thank you!</p>';
                                $body .= '</div>';

                                $address = array($section->email);
                                //$result_email = sendMail($address, $subject, $body);

                                $save = new emailsModel();
                                $save->setId_user_receiver($section->id_user);
                                $save->setEmail_receiver($section->email);
                                $save->setBody_mail($body);
                                $save->setSubject_mail($subject);
                                $save->setDate_send_mes($today->format('Y-m-d H:i:s'));
                                $save->setType_message('noCourseDocumentationUploaded');
                                $result = $save->add();

                                if ($result) {
                                    $log->setType_msg('INFO');
                                    $log->setMsg('Email save to stack . Object: ' . $section->email);
                                    $log->writeLog();
                                } else {
                                    $log->setType_msg('ERROR');
                                    $log->setMsg('When saving email for teacher. Object: ' . json_encode($section));
                                    $log->writeLog();
                                }
                            } else {
                                $log->setType_msg('INFO');
                                $log->setMsg('Email not saving to stack because the user has desactivated the email reception. Object: ' . $section->email);
                                $log->writeLog();
                            }
                        } else {
                            echo 'NOT SENDING';
                        }
                    }
                }
            }
        } else {

            $course_due_dates = new coursesDuedatesModel();
            $where_due_dates = "lm_courses_duedates.course_id=" . $course->course_id." ORDER BY date_start ASC";
            $select_due_dates = "lm_courses_duedates.*";
            $result_due_dates = $course_due_dates->select($where_due_dates, '', $select_due_dates, '');

            if (count($result_due_dates) > 0) {
                $today_uni = new DateTime('now', new DateTimeZone($course->large_name));
                $today_uni_date = $today_uni->format('Y-m-d');

                $one_week = new DateTime($result_due_dates[0]->date_start, new DateTimeZone($course->large_name));
                $one_week->modify('-1 week');
                $one_week_date = $one_week->format('Y-m-d');

                if ($today_uni_date >= $one_week_date) {
                    $section_course = new coursesSectionsNewModel();
                    $where_section = "lm_courses_sections_new.course_id=" . $course->course_id;
                    $join_section = " LEFT JOIN lm_users ON (lm_courses_sections_new.id_teacher = lm_users.id_user)";
                    $select_section = "lm_courses_sections_new.*, lm_users.*";
                    $result_section = $section_course->select($where_section, '', $select_section, $join_section);
                    if (count($result_section) > 0) {
                        foreach ($result_section as $section) {
                            $documentation_course = new courseDocumentationModel();
                            $where_documentation = "lm_course_documentation.id_section=" . $section->section_id;
                            $select_documentation = "lm_course_documentation.*";
                            $result_documentation = $documentation_course->select($where_documentation, '', $select_documentation, '');

                            if (count($result_documentation) == 0) {
                                if ($section->emailsReception == 1) {
                                    $subject = "LinguaMeeting no course documentation uploaded";
                                    $body = '<div style="font-family:&quot;Cuprum&quot;,sans-serif">';
                                    $body .= '<div style="padding-bottom:0.8em;width:45%;margin-right:1%;margin-bottom:1%;background:#fff;
                                border-radius:5px;font-family:&quot;Cuprum&quot;,sans-serif"><p style="font-family:&quot;Dosis&quot;,
                                sans-serif;font-weight:bold;font-size:128%;color:#314a94;border-radius:5px;border-bottom:solid 1px #314a94;
                                padding:0.4em;padding-left:0.8em;background:#d9e1ec;background:-webkit-linear-gradient(left top,#9fafc4,#d9e1ec);
                                background:-o-linear-gradient(bottom right,#9fafc4,#d9e1ec);background:-moz-linear-gradient(bottom right,#9fafc4,#d9e1ec);
                                background:linear-gradient(top right,#9fafc4,#d9e1ec)">LinguaMeeting no course documentation uploaded</p></div>';
                                    $body .= "<br>Dear $section->name_user,";
                                    $body .= '<br><br>I hope all is well. We are writing to you today to remind you to upload instructions/content for the conversation guides of each coaching session. Please, upload the instructions in your LinguaMeeting Portal by going to the Instructors portal>Active Courses>Instructions, or by editing your coaching form.';
                                    $body .= ' Click <a href="https://www.youtube.com/watch?v=jTTxZU_G_Lo" target="_blank">here</a> to view a video tutorial ';
                                    $body .= '<br><br><p>Thank you!</p>';
                                    $body .= '</div>';

                                    $address = array($section->email);
                                    //$result_email = sendMail($address, $subject, $body);

                                    $save = new emailsModel();
                                    $save->setId_user_receiver($section->id_user);
                                    $save->setEmail_receiver($section->email);
                                    $save->setBody_mail($body);
                                    $save->setSubject_mail($subject);
                                    $save->setDate_send_mes($today->format('Y-m-d H:i:s'));
                                    $save->setType_message('noCourseDocumentationUploaded');
                                    $result = $save->add();

                                    if ($result) {
                                        $log->setType_msg('INFO');
                                        $log->setMsg('Email save to stack . Object: ' . $section->email);
                                        $log->writeLog();
                                    } else {
                                        $log->setType_msg('ERROR');
                                        $log->setMsg('When saving email for teacher. Object: ' . json_encode($section));
                                        $log->writeLog();
                                    }
                                } else {
                                    $log->setType_msg('INFO');
                                    $log->setMsg('Email not saving to stack because the user has desactivated the email reception. Object: ' . $section->email);
                                    $log->writeLog();
                                }
                            } else {
                                echo 'NOT SENDING';
                            }
                        }
                    }
                }
            }
        }
    }
}
$log->setType_msg('INFO');
$log->setMsg('CRON NOT SESSIONS EXECUTED');
$log->writeLog();
?>