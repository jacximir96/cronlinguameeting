<?php

/*
 * Developed by wilowi
 */

// ONLY EXECUTED ONCE A YEAR

ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

//echo print_r($server);
require_once _URL_CRON.'util.php';
require_once _URL_CRON.'config.php';
require_once _URL_CRON.'autoload.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/util.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/autoload.php';

$today = new DateTime('now');

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('deleteMeetings.txt');

$users = new userModel();
$where = "(lm_users.rol=7 OR lm_users.rol=10) AND lm_users.active=1 AND lm_users.erased=0";
$join = " LEFT JOIN lm_zoom_users USING(id_user)"
	. " LEFT JOIN lm_zoom_meetings USING(id_user)";
$select = "lm_users.id_user as user_id, lm_users.name_user,lm_users.email, lm_zoom_users.*, lm_zoom_meetings.id_zoom_meeting,lm_zoom_meetings.zoom_id";
$as = "";
$result_users = $users->select($where, $as, $select, $join);

//echo "<pre>";echo print_r($result_users);echo "</pre>";

$zoom = new zoom();
$meeting_lm = new zoomMeetingsModel();

$count_meetings_created = 0;
foreach ($result_users as $key => $userZoom) {
    //echo print_r($userZoom);

    if (!empty($userZoom->id_zoom_meeting)) { // if !empty, delete meeting and create the new meeting.
	//if($userZoom->user_id==26){
	$result_delete_m = $zoom->deleteMeeting($userZoom->zoom_id);
	$log->setType_msg('INFO');
	$log->setMsg('Delete meeting:  ZOOM ID: ' . $userZoom->zoom_id . ' Response: ' . json_encode($result_delete_m));
	$log->writeLog();

	// delete old meeting in linguameeting
	$where_del_lm = "id_zoom_meeting=$userZoom->id_zoom_meeting";
	$del_lm = $meeting_lm->delete($where_del_lm);

	$count_meetings_created++;


	//}
    }
}

$log->setType_msg('INFO');
$log->setMsg('CRON EXECUTED. Meetings deleted: ' . $count_meetings_created);
$log->writeLog();
?>