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
$todayThree->modify('- 3 day');

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('experiencesRecordings.txt');

$zoom = new zoom();

$array_chat = array();

//$result_rec = $zoom->getAllMeetingsRecordings($zoom_u->zoom_id);

$info = new stdClass();
//$info->date_ini = '2020-10-01';
//$info->date_end = '2020-10-04';
$all = $zoom->getAllRecordings($info, "info@linguameeting.com");

//echo print_r($all);
foreach ($all->meetings as $result_rec) {

    //$account_id = $result_rec->account_id;
    $duration = intval($result_rec->duration);
    $start_time = $result_rec->start_time;
    $id = $result_rec->id;
    $host_id = $result_rec->host_id;
    $host_email = $result_rec->host_email;
    $recordings = $result_rec->recording_files;

    foreach ($recordings as $recording) {
        //echo "entro foreach recording";
        $id_recording = $recording->id;
        $recording_start = $recording->recording_start;
        $recording_end = $recording->recording_end;
        $file_type = filter_var($recording->file_type, FILTER_SANITIZE_STRING);
        $play_url = filter_var($recording->play_url, FILTER_SANITIZE_STRING);
        $download_url = filter_var($recording->download_url, FILTER_SANITIZE_STRING);
        $recording_type = $recording->recording_type;
        $status = $recording->status;

        if (strtoupper($file_type) == 'MP4') {

            $recording_start = str_replace('Z', '', $recording_start);
            $recording_end = str_replace('Z', '', $recording_end);
            $recording_start = str_replace('T', ' ', $recording_start);
            $recording_end = str_replace('T', ' ', $recording_end);
            $date_start = explode(' ', $recording_start);
            $date_end = explode(' ', $recording_end);

            // Save in the experience session
            $date_ini_session = new DateTime($recording_start, new DateTimeZone('GMT'));
            $date_end_session = new DateTime($recording_end, new DateTimeZone('GMT'));
            $date_ini_sessionV2 = new DateTime($recording_start, new DateTimeZone('GMT'));
            $date_end_sessionV2 = new DateTime($recording_end, new DateTimeZone('GMT'));

            $model_experiences = new experiencesModel();
            $where = "day BETWEEN '".$todayThree->format('Y-m-d')."' AND '".$today->format('Y-m-d')."'";
            $result_exp = $model_experiences->select($where);

            //echo print_r($result_st_flex);	
            if (count($result_exp) > 0) {

                $uni = new universityModel();

                //modify 5 minutes.
                //$date_ini_session->modify('-5 minutes');
                //$date_end_session->modify('+ 5 minutes');
                foreach ($result_exp as $exp) {
                    
                    //echo print_r($result_uni);
                    $date_ini_session->setTimezone(new DateTimeZone("America/New_York"));
                    $date_end_session->setTimezone(new DateTimeZone("America/New_York"));

                    //modify 5 minutes.
                    $date_ini_session->modify('-7 minutes');
                    $date_end_session->modify('+6 minutes');

                    //echo "entro semanas";

                    $date_week_start = new DateTime($exp->day . ' ' . $exp->hour, new DateTimeZone("America/New_York"));
                    $date_week_end = new DateTime($exp->day . ' ' . $week->hour_end, new DateTimeZone("America/New_York"));
                    $date_week_startV2 = new DateTime($exp->day . ' ' . $exp->hour, new DateTimeZone("America/New_York"));
                    $date_week_endV2 = new DateTime($exp->day . ' ' . $exp->hour_end, new DateTimeZone("America/New_York"));

                    $date_week_startV2->modify('-5 minutes');
                    $date_week_endV2->modify('+5 minutes');

                    //echo print_r($date_week_start);	
                    if ($date_week_start >= $date_ini_session && $date_week_end <= $date_end_session && empty($exp->zoom_video)) {

                        $model_experiences->setId_experience($exp->id_experience);
                        $model_experiences->setZoom_video($play_url);
                        $result_up_rec = $model_experiences->updateVideo();

                        if (!$result_up_rec) {
                            $log->setType_msg('ERROR');
                            $log->setMsg('Update recording in table experiences. DATA: ' . json_encode($student));
                            $log->writeLog();
                        } else {
                            $log->setType_msg('INFO');
                            $log->setMsg('Update student correctly. DATA: ' . $student->name_user . ' ' . $student->lastname_user);
                            $log->writeLog();
                        }
                    } elseif (( $date_ini_sessionV2 >= $date_week_startV2 && $date_ini_sessionV2 <= $date_week_endV2 ) && ($date_end_sessionV2 >= $date_week_startV2 && $date_end_sessionV2 <= $date_week_endV2) && ($zoom_u->id_user == $week->id_coach) && empty($exp->zoom_video)) {

                        $model_experiences->setId_experience($exp->id_experience);
                        $model_experiences->setZoom_video($play_url);
                        $result_up_rec = $model_experiences->updateVideo();

                        if (!$result_up_rec) {
                            $log->setType_msg('ERROR');
                            $log->setMsg('Update recording V2 in table experiences. DATA: ' . json_encode($student));
                            $log->writeLog();
                        } else {
                            $log->setType_msg('INFO');
                            $log->setMsg('Update student correctly V2. DATA: ' . $student->name_user . ' ' . $student->lastname_user);
                            $log->writeLog();
                        }
                    }


                    $date_ini_session->modify('+7 minutes');
                    $date_end_session->modify('-6 minutes');
                    $date_week_startV2->modify('+5 minutes');
                    $date_week_endV2->modify('-5 minutes');
                }
            } else {

                $log->setType_msg('WARNING');
                //$mensaje.='001 Not update students';
                $log->setMsg('001 Not update any video');
                $log->writeLog();
            }
        }
    } // foreach recordings
}



$log->setType_msg('INFO');
$log->setMsg('CRON EXECUTED');
$log->writeLog();
?>
