<?php

/* 
 * Developed by wilowi
 */


ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

require_once _URL_CRON.'util.php';
require_once _URL_CRON.'config.php';
require_once _URL_CRON.'autoload.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/util.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/autoload.php';

$today = new DateTime('now');

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('deleteNotifications.txt');

$notifications = new notificationsModel();
$where = "erased=1";
$result_notif = $notifications->select($where);

//echo print_r($students);
//echo print_r($result_users);

if (count($result_notif) > 0) {

	//echo print_r($new_students);
	foreach ($result_notif as $notif) {
		
		$where_del = "id_notification=$notif->id_notification";
		$result_del = $notifications->delete($where_del);
		
		if($result_del){
			
			$log->setType_msg('INFO');
			$log->setMsg('Notification deleted: ' . $notif->id_notification);
		}else{
			$log->setType_msg('ERROR');
			$log->setMsg('When deleting notification: ' . $notif->id_notification);
		}

		
		$log->writeLog();
	}
	
	
	
}

$log->setType_msg('INFO');
$log->setMsg('CRON DELETE NOTIFICATIONS EXECUTED');
$log->writeLog();


?>