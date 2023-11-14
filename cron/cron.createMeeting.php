<?php

ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

require_once '/var/cron/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';

require_once _URL_CRON.'util.php';
require_once _URL_CRON.'autoload.php';

$today = new DateTime('now');

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('createMeeting.txt');

$users = new userModel();
$where = "(lm_users.rol=7 OR lm_users.rol=10) AND lm_users.active=1 AND lm_users.erased=0";
$join = " LEFT JOIN lm_zoom_users USING(id_user)"
		. " LEFT JOIN lm_zoom_meetings USING(id_user)";
$select = "lm_users.id_user as user_id, lm_users.name_user,lm_users.lastname_user,lm_users.email, lm_zoom_users.*, lm_zoom_meetings.id_zoom_meeting";
$as = "";
$result_users = $users->select($where, $as, $select, $join);

//echo "<pre>";echo print_r($result_users);echo "</pre>";

$zoom = new zoom();
$meeting_lm = new zoomMeetingsModel();

$count_meetings_created = 0;
foreach ($result_users as $key => $userZoom) {	
	
	if(empty($userZoom->id_zoom_meeting)){ // if empty, create the meeting.
	
		$meeting_lm->setId_user($userZoom->user_id);
		
		$info = new stdClass();
		$info->first_name = $userZoom->name_user;
		$info->last_name = $userZoom->lastname_user;

		$result_create = $zoom->createMeeting($info, $userZoom->zoom_mail);

		if (!isset($result_create->id)) { // error
			$log->setType_msg('ERROR');
			$log->setMsg('When creating a zoom meeting with cron - ZOOM ID: ' . $userZoom->zoom_mail . ' Response: ' . json_encode($result_create));
			$log->writeLog();
		} else {

			$meeting_lm->setZoom_id($result_create->id);
			$meeting_lm->setUuid($result_create->uuid);
			$meeting_lm->setStart_url($result_create->start_url);
			$meeting_lm->setJoin_url($result_create->join_url);
			$result_add_met = $meeting_lm->add();

			if (!$result_add_met) {
				$log->setType_msg('ERROR');
				$log->setMsg('01 When creating a meeting in linguameeting with cron:  ZOOM ID: ' . $userZoom->zoom_mail . ' Response: ' . json_encode($result_create));
				$log->writeLog();
			}else{
				$count_meetings_created++;
				$log->setType_msg('INFO');
				$log->setMsg('Meeting created correctly with cron:  ZOOM ID: ' . $userZoom->zoom_mail . ' Id Meeting: ' . $result_add_met.' - Zoom join: '.$result_create->join_url);
				$log->writeLog();
			}
		}
	}
}

$log->setType_msg('INFO');
$log->setMsg('CRON EXECUTED. Meetings created: ' . $count_meetings_created);
$log->writeLog();
?>