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
$join = " LEFT JOIN zoom_user ON (user.id = zoom_user.user_id)"
		. " LEFT JOIN zoom_meeting ON (user.id = zoom_meeting.user_id)";
$where = " user.active = 1 AND user.deleted_at IS NULL ";
$select = "user.id as user_id, user.name as name_user, user.lastname as lastname_user, user.email, zoom_user.user_id as id_user,"
		. " zoom_user.user_zoom_id as id_user_zoom, zoom_user.zoom_email as zoom_mail, zoom_user.pmi, zoom_user.host_id, zoom_meeting.id as id_zoom_meeting";
$result_users = $users->select($where, '', $select, $join);

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

		if (!isset($result_create->id)) {
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