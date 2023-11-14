<?php

/* 
 * Developed by wilowi
 */

ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

require_once '/var/cron/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';

require_once _URL_CRON.'util.php';
require_once _URL_CRON.'autoload.php';

$today = new DateTime('now');
$todayThree = new DateTime('now');
$todayThree->modify('- 2 day');
$todayOneMore = new DateTime('now');
$todayOneMore->modify('+ 1 day');

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('zoomRecordings.txt');

$zoom = new zoom();

$users_zoom = new zoomUsersModel();
$join = " LEFT JOIN lm_users USING(id_user)"
	. " LEFT JOIN lm_zoom_meetings USING(id_user)"
	. " LEFT JOIN lm_time_zones ON(lm_users.id_zone=lm_time_zones.id_zone)";
$where = "lm_users.active=1 AND lm_users.erased=0";
$result_zoom_users = $users_zoom->select($where, '', '*', $join);

//echo print_r($result_zoom_users);
if (count($result_zoom_users) > 0) {

    $array_chat = array();

    foreach ($result_zoom_users as $key => $zoom_u) {

	//$result_rec = $zoom->getAllMeetingsRecordings($zoom_u->zoom_id);

	$info = new stdClass();
	//$info->date_ini = '2021-08-26';
	//$info->date_end = '2021-08-31';
        $all = $zoom->getAllRecordings($info, $zoom_u->zoom_mail);

        if (!empty($all)) {
            //echo print_r($all);
            foreach ($all->meetings as $result_rec) {

                $account_id = $result_rec->account_id;
                $duration = intval($result_rec->duration);
                $start_time = $result_rec->start_time;
                //$timezone = $meeting->timezone;
                //$share_url = filter_var($result_rec->share_url, FILTER_SANITIZE_STRING);
                $recording_count = $result_rec->recording_count;
                $total_size = intval($result_rec->total_size);
                $topic = $result_rec->topic;
                $id = $result_rec->id;
                //$uuid = $result_rec->uuid; // number to get recording ( each meeting sessions create one) The unique for the meeting user is host_id	
                $host_id = $result_rec->host_id;
                $host_email = $result_rec->host_email;
                $recordings = $result_rec->recording_files;
                $zoom_recordings = new zoomRecordingsModel();

                foreach ($recordings as $recording) {

                    //echo "<pre>";echo print_r($recording);echo "</pre>";
                    //echo "entro foreach recording";
                    $id_recording = $recording->id;
                    $meeting_id = $recording->meeting_id; // es uuid
                    $recording_start = $recording->recording_start;
                    $recording_end = $recording->recording_end;
                    $file_type = filter_var($recording->file_type, FILTER_SANITIZE_STRING);
                    $file_size = intval($recording->file_size);
                    $play_url = filter_var($recording->play_url, FILTER_SANITIZE_STRING);
                    $download_url = filter_var($recording->download_url, FILTER_SANITIZE_STRING);
                    $recording_type = $recording->recording_type;
                    $status = $recording->status;

                    if (strtoupper($file_type) == 'MP4') {

                        $where = "account_id='$account_id' AND host_id='$host_id' AND id_recording_zoom='$id_recording'";
                        $result_where = $zoom_recordings->select($where);
                        //echo "entro es mp4";
                        if (empty($result_where)) {
                            // if empty, insert the new register.

                            $log->setType_msg('INFO');
                            $log->setMsg('The recording does not exist in LM ' . $id_recording);
                            $log->writeLog();

                            $recording_start = str_replace('Z', '', $recording_start);
                            $recording_end = str_replace('Z', '', $recording_end);
                            $recording_start = str_replace('T', ' ', $recording_start);
                            $recording_end = str_replace('T', ' ', $recording_end);
                            $date_start = explode(' ', $recording_start);
                            $date_end = explode(' ', $recording_end);

                            $zoom_recordings->setAccount_id($account_id);
                            $zoom_recordings->setHost_id($host_id);
                            $zoom_recordings->setUuid($meeting_id);
                            $zoom_recordings->setId_recording_zoom($id_recording);
                            $zoom_recordings->setRecording_start($recording_start);
                            $zoom_recordings->setRecording_end($recording_end);
                            //$zoom_recordings->setTimezone($timezone);
                            $zoom_recordings->setTimezone($zoom_u->large_name);
                            $zoom_recordings->setFile_type($file_type);
                            $zoom_recordings->setPlay_url($play_url);
                            $zoom_recordings->setDownload_url($download_url);
                            $zoom_recordings->setStatus($status);
                            $result_add_zoom = $zoom_recordings->add();

                            //echo print_r($zoom_recordings);
                            if (!$result_add_zoom) {

                                $log->setType_msg('ERROR');
                                $mensaje .= '001 When saving the recording. DATA ZOOM: ' . json_encode($recording);
                                $log->setMsg($mensaje);
                                $log->writeLog();
                            } else {

                                // Save in the students sessions.
                                $date_ini_session = new DateTime($recording_start, new DateTimeZone('GMT'));
                                $date_end_session = new DateTime($recording_end, new DateTimeZone('GMT'));
                                $date_ini_sessionV2 = new DateTime($recording_start, new DateTimeZone('GMT'));
                                $date_end_sessionV2 = new DateTime($recording_end, new DateTimeZone('GMT'));

                                $users = new userModel();
                                $where_flex = "us.active=1 AND us.erased=0 AND lm_students_courses.active=1";
                                $where_flex .= " AND lm_students_courses_sessions_new.id_coach=$zoom_u->id_user AND lm_students_courses_sessions_new.assigned=1"
                                        . " AND lm_students_courses_sessions_new.date_select_end between '" . $todayThree->format('Y-m-d') . " 00:00:00' AND '" . $todayOneMore->format('Y-m-d') . " 00:00:00'";
                                $select_flex = "lm_students_courses_sessions_new.*,lm_time_zones.large_name,lm_students_courses.enroll_id,us.id_zone,"
                                        . "us.name_user,us.lastname_user";
                                $join_flex = " LEFT JOIN lm_students_courses ON(us.id_user=lm_students_courses.id_user)"
                                        . " LEFT JOIN lm_students_courses_sessions_new ON(us.id_user=lm_students_courses_sessions_new.id_user)"
                                        . " LEFT JOIN lm_time_zones USING(id_zone)";
                                $result_st_flex = $users->select($where_flex, 'us', $select_flex, $join_flex);
                                //echo "<pre>";echo print_r($result_st_flex);echo "</pre>";
                                //echo print_r($result_st);
                                //echo "<pre>";echo print_r($users);	echo "</pre>";
                                //return true;
                                // --- FOR FLEX
                                if (!empty($result_st_flex)) {

                                    $new_student = orderStudentOld($result_st_flex);

                                    //modify 5 minutes.
                                    //$date_ini_session->modify('-5 minutes');
                                    //$date_end_session->modify('+ 5 minutes');
                                    foreach ($new_student as $student) {
                                        //echo "entro cada estudiante";

                                        $timezoneSelect = $student->large_name;
                                        //echo print_r($result_uni);

                                        $date_ini_session->setTimezone(new DateTimeZone($timezoneSelect));
                                        $date_end_session->setTimezone(new DateTimeZone($timezoneSelect));

                                        //modify 5 minutes.
                                        $date_ini_session->modify('-7 minutes');
                                        $date_end_session->modify('+6 minutes');

                                        //echo print_r($student->weeks);
                                        //echo print_r($date_ini_session);
                                        foreach ($student->sessions as $week) {
                                            //echo "entro semanas";

                                            if ($student->large_name != $week->timezone) {

                                                $timezoneSelect = $week->timezone;
                                                $date_ini_session->setTimezone(new DateTimeZone($timezoneSelect));
                                                $date_end_session->setTimezone(new DateTimeZone($timezoneSelect));
                                            }

                                            $date_week_start = new DateTime($week->date_select_ini, new DateTimeZone($timezoneSelect));
                                            $date_week_end = new DateTime($week->date_select_end, new DateTimeZone($timezoneSelect));
                                            $date_week_startV2 = new DateTime($week->date_select_ini, new DateTimeZone($timezoneSelect));
                                            $date_week_endV2 = new DateTime($week->date_select_end, new DateTimeZone($timezoneSelect));

                                            $date_week_startV2->modify('-5 minutes');
                                            $date_week_endV2->modify('+5 minutes');

                                            //echo print_r($date_week_start);	
                                            if ($date_week_start >= $date_ini_session && $date_week_end <= $date_end_session && $zoom_u->id_user == $week->id_coach) {

                                                $students_rec = new studentsCourseSessionsNewModel();
                                                $students_rec->setId_student_session($week->id_studentSession);
                                                $students_rec->setId_recording($result_add_zoom);
                                                $result_up_rec = $students_rec->updateRecording();

                                                if (!$result_up_rec) {
                                                    $log->setType_msg('ERROR');
                                                    $log->setMsg('Update recording in table students flex. DATA: ' . json_encode($student));
                                                    $log->writeLog();
                                                } else {
                                                    $log->setType_msg('INFO');
                                                    $log->setMsg('Update student flex correctly. DATA: ' . $student->name_user . ' ' . $student->lastname_user . ' ' . $student->id_user);
                                                    $log->writeLog();
                                                }
                                            } elseif (( $date_ini_sessionV2 >= $date_week_startV2 && $date_ini_sessionV2 <= $date_week_endV2 ) && ($date_end_sessionV2 >= $date_week_startV2 && $date_end_sessionV2 <= $date_week_endV2) && ($zoom_u->id_user == $week->id_coach)) {


                                                $students_rec = new studentsCourseSessionsNewModel();
                                                $students_rec->setId_student_session($week->id_studentSession);
                                                $students_rec->setId_recording($result_add_zoom);
                                                $result_up_rec = $students_rec->updateRecording();

                                                if (!$result_up_rec) {
                                                    $log->setType_msg('ERROR');
                                                    $log->setMsg('Update recording V2 in table students flex. DATA: ' . json_encode($student));
                                                    $log->writeLog();
                                                } else {
                                                    $log->setType_msg('INFO');
                                                    $log->setMsg('Update student V2 flex correctly. DATA: ' . $student->name_user . ' ' . $student->lastname_user . ' ' . $student->id_user);
                                                    $log->writeLog();
                                                }
                                            }

                                            $date_week_startV2->modify('+5 minutes');
                                            $date_week_endV2->modify('-5 minutes');
                                        } // end foreach weeks

                                        $date_ini_session->modify('+7 minutes');
                                        $date_end_session->modify('-6 minutes');
                                    }
                                } else {

                                    $log->setType_msg('WARNING');
                                    //$mensaje.='001 Not update students';
                                    $log->setMsg('002 Not update flex students');
                                    $log->writeLog();
                                }
                            } // end if add in table lm_zoom_recordings.
                        } else {

                            $log->setType_msg('INFO');
                            $log->setMsg('The recording EXIST in LM ' . $id_recording);
                            $log->writeLog();

                            $recording_start = str_replace('Z', '', $recording_start);
                            $recording_end = str_replace('Z', '', $recording_end);
                            $recording_start = str_replace('T', ' ', $recording_start);
                            $recording_end = str_replace('T', ' ', $recording_end);
                            $date_start = explode(' ', $recording_start);
                            $date_end = explode(' ', $recording_end);
                            $result_add_zoom = true;
                            //echo print_r($zoom_recordings);
                            if (!$result_add_zoom) {

                                $log->setType_msg('ERROR');
                                $mensaje .= '001 When saving the recording. DATA ZOOM: ' . json_encode($recording);
                                $log->setMsg($mensaje);
                                $log->writeLog();
                            } else {

                                // Save in the students sessions.
                                $date_ini_session = new DateTime($recording_start, new DateTimeZone('GMT'));
                                $date_end_session = new DateTime($recording_end, new DateTimeZone('GMT'));
                                $date_ini_sessionV2 = new DateTime($recording_start, new DateTimeZone('GMT'));
                                $date_end_sessionV2 = new DateTime($recording_end, new DateTimeZone('GMT'));

                                $users = new userModel();
                                $where_flex = "us.active=1 AND us.erased=0 AND lm_students_courses.active=1";
                                $where_flex .= " AND lm_students_courses_sessions_new.id_coach=$zoom_u->id_user AND lm_students_courses_sessions_new.assigned=1"
                                        . " AND lm_students_courses_sessions_new.date_select_end between '" . $todayThree->format('Y-m-d') . " 00:00:00' AND '" . $todayOneMore->format('Y-m-d') . " 00:00:00'";
                                $select_flex = "lm_students_courses_sessions_new.*,lm_time_zones.large_name,lm_students_courses.enroll_id,"
                                        . "us.name_user,us.lastname_user,us.id_zone";
                                $join_flex = " LEFT JOIN lm_students_courses ON(us.id_user=lm_students_courses.id_user)"
                                        . " LEFT JOIN lm_students_courses_sessions_new ON(us.id_user=lm_students_courses_sessions_new.id_user)"
                                        . " LEFT JOIN lm_time_zones USING(id_zone)";
                                $result_st_flex = $users->select($where_flex, 'us', $select_flex, $join_flex);
                                //echo "<pre>";echo print_r($result_st_flex);echo "</pre>";
                                //echo print_r($result_st);
                                //echo "<pre>";echo print_r($users);	echo "</pre>";
                                //return true;
                                // --- FOR FLEX
                                if (!empty($result_st_flex)) {

                                    $new_student = orderStudentOld($result_st_flex);

                                    //echo print_r($new_student);
                                    //modify 5 minutes.
                                    //$date_ini_session->modify('-5 minutes');
                                    //$date_end_session->modify('+ 5 minutes');
                                    foreach ($new_student as $student) {
                                        //echo "entro cada estudiante";
                                        //echo print_r($student);

                                        $timezoneSelect = $student->large_name;
                                        //echo print_r($result_uni);

                                        $date_ini_session->setTimezone(new DateTimeZone($timezoneSelect));
                                        $date_end_session->setTimezone(new DateTimeZone($timezoneSelect));

                                        //modify 5 minutes.
                                        $date_ini_session->modify('-7 minutes');
                                        $date_end_session->modify('+6 minutes');

                                        //echo print_r($student->weeks);
                                        //echo print_r($date_ini_session);
                                        foreach ($student->sessions as $week) {
                                            //echo "entro semanas";

                                            if ($student->large_name != $week->timezone) {

                                                $timezoneSelect = $week->timezone;
                                                $date_ini_session->setTimezone(new DateTimeZone($timezoneSelect));
                                                $date_end_session->setTimezone(new DateTimeZone($timezoneSelect));
                                            }

                                            $date_week_start = new DateTime($week->date_select_ini, new DateTimeZone($timezoneSelect));
                                            $date_week_end = new DateTime($week->date_select_end, new DateTimeZone($timezoneSelect));
                                            $date_week_startV2 = new DateTime($week->date_select_ini, new DateTimeZone($timezoneSelect));
                                            $date_week_endV2 = new DateTime($week->date_select_end, new DateTimeZone($timezoneSelect));

                                            $date_week_startV2->modify('-5 minutes');
                                            $date_week_endV2->modify('+5 minutes');

                                            //echo print_r($date_week_start);	
                                            if ($date_week_start >= $date_ini_session && $date_week_end <= $date_end_session && $zoom_u->id_user == $week->id_coach) {

                                                $students_rec = new studentsCourseSessionsNewModel();
                                                $students_rec->setId_student_session($week->id_studentSession);
                                                $students_rec->setId_recording($result_where[0]->id_recording);
                                                $result_up_rec = $students_rec->updateRecording();

                                                if (!$result_up_rec) {
                                                    $log->setType_msg('ERROR');
                                                    $log->setMsg('Update recording in table students flex. DATA: ' . json_encode($student));
                                                    $log->writeLog();
                                                } else {
                                                    $log->setType_msg('INFO');
                                                    $log->setMsg('Update student flex correctly. DATA: ' . $student->name_user . ' ' . $student->lastname_user . ' ' . $student->id_user);
                                                    $log->writeLog();
                                                }
                                            } elseif (( $date_ini_sessionV2 >= $date_week_startV2 && $date_ini_sessionV2 <= $date_week_endV2 ) && ($date_end_sessionV2 >= $date_week_startV2 && $date_end_sessionV2 <= $date_week_endV2) && ($zoom_u->id_user == $week->id_coach)) {

                                                $students_rec = new studentsCourseSessionsNewModel();
                                                $students_rec->setId_student_session($week->id_studentSession);
                                                $students_rec->setId_recording($result_where[0]->id_recording);
                                                $result_up_rec = $students_rec->updateRecording();

                                                if (!$result_up_rec) {
                                                    $log->setType_msg('ERROR');
                                                    $log->setMsg('Update recording in table students flex. DATA: ' . json_encode($student));
                                                    $log->writeLog();
                                                } else {
                                                    $log->setType_msg('INFO');
                                                    $log->setMsg('Update student flex correctly. DATA: ' . $student->name_user . ' ' . $student->lastname_user . ' ' . $student->id_user);
                                                    $log->writeLog();
                                                }
                                            }

                                            $date_week_startV2->modify('+5 minutes');
                                            $date_week_endV2->modify('-5 minutes');
                                        } // end foreach weeks

                                        $date_ini_session->modify('+7 minutes');
                                        $date_end_session->modify('-6 minutes');
                                    }
                                } else {

                                    $log->setType_msg('WARNING');
                                    //$mensaje.='001 Not update students';
                                    $log->setMsg('002b Not update flex students');
                                    $log->writeLog();
                                }
                            } // end if add in table lm_zoom_recordings.
                        }
                    } //end if mp4
                    else if (strtoupper($file_type) == 'CHAT') { // for chat
                        // save in array for insert in the DB
                        $recording->host_id = $host_id;
                        array_push($array_chat, $recording);
                    }
                } // foreach recordings
            }
        }
    }


    if (!empty($array_chat)) {

	$zoom_recordings = new zoomRecordingsModel();

	foreach ($array_chat as $chat) {

	    $chat_start = $chat->recording_start;
	    $chat_end = $chat->recording_end;
	    $host_id = $chat->host_id;
	    $chat_file = $chat->download_url;

	    $chat_start = str_replace('Z', '', $chat_start);
	    $chat_end = str_replace('Z', '', $chat_end);
	    $chat_start = str_replace('T', ' ', $chat_start);
	    $chat_end = str_replace('T', ' ', $chat_end);
	    //$date_start_chat = explode(' ', $chat_start);
	    //$date_end_chat = explode(' ', $chat_end);
	    // search recording
	    $where = "host_id='$host_id' AND recording_start='$chat_start' AND recording_end='$chat_end'";
	    $result_recording = $zoom_recordings->select($where);

	    if (!empty($result_recording)) {

		$zoom_recordings->setId_recording($result_recording[0]->id_recording);
		$zoom_recordings->setChat_file($chat_file);

		$zoom_recordings->updateChat();
	    }
	}
    }
    
} // end count


$log->setType_msg('INFO');
$log->setMsg('CRON EXECUTED');
$log->writeLog();


function orderStudentOld($result_student) {

    $newStudent = array();

    $count_total = 0;

    foreach ($result_student as $student) {

	$id_user = $student->id_user;
	$id_student_session = $student->id_student_session;
	//$days_holidays = explode(',',$student->days_holiday);

	if (empty($newStudent[$id_user])) {

	    $newStudent[$id_user] = new stdClass();
	    $newStudent[$id_user]->sessions = array();
	}

	$newStudent[$id_user]->id_user = $id_user;
	$newStudent[$id_user]->name_user = $student->name_user;
	$newStudent[$id_user]->lastname_user = $student->lastname_user;
	$newStudent[$id_user]->id_course = $student->course_id;
	$newStudent[$id_user]->id_course_session = $student->id_course_session;
	$newStudent[$id_user]->large_name = $student->large_name;

	if (!empty($id_student_session)) {

	    if (empty($newStudent[$id_user]->sessions[$id_student_session])) {

		$newStudent[$id_user]->sessions[$id_student_session] = new stdClass();
	    }

	    $newStudent[$id_user]->sessions[$id_student_session]->id_course = $student->course_id;
	    $newStudent[$id_user]->sessions[$id_student_session]->id_coach = $student->id_coach;
	    $newStudent[$id_user]->sessions[$id_student_session]->attendance = $student->attendance;
	    $newStudent[$id_user]->sessions[$id_student_session]->missed = $student->missed;
	    $newStudent[$id_user]->sessions[$id_student_session]->past = $student->past;
	    $newStudent[$id_user]->sessions[$id_student_session]->from_makeup = $student->from_makeup;
	    $newStudent[$id_user]->sessions[$id_student_session]->from_extra = $student->from_extra;
	    $newStudent[$id_user]->sessions[$id_student_session]->id_recording = $student->id_recording;
	    $newStudent[$id_user]->sessions[$id_student_session]->date_select_ini = $student->date_select_ini;
	    $newStudent[$id_user]->sessions[$id_student_session]->date_select_end = $student->date_select_end;
	    $newStudent[$id_user]->sessions[$id_student_session]->assigned = $student->assigned;
	    $newStudent[$id_user]->sessions[$id_student_session]->id_studentSession = $id_student_session;
	    $newStudent[$id_user]->sessions[$id_student_session]->timezone = $student->timezone;
	}
    }

    //echo print_r($newStudent);
    return $newStudent;
}

?>
