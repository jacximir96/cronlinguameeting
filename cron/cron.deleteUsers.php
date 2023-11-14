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
$threeMonths = new DateTime('now');
$threeMonths->modify('-3 months');
$formatM = $threeMonths->format('Y-m-d H:i:s');

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('deleteUsers.txt');

$users = new userModel();
$where = "erased=1 AND date_erased<= '$formatM'";
$result_users = $users->select($where);

//echo print_r($students);
//echo print_r($result_users);

if (count($result_users) > 0) {

	//echo print_r($new_students);
	foreach ($result_users as $user) {
		
		$where_del = "id_user=$user->id_user";
		$result_del = $users->delete($where_del);
		
		if($result_del){
			
			$log->setType_msg('INFO');
			$log->setMsg('User deleted: ' . $user->email.' Original: '. json_encode($user));
		}else{
			$log->setType_msg('ERROR');
			$log->setMsg('When deleting user: ' . $user->email);
		}

		
		$log->writeLog();
	}	
	
}

$log->setType_msg('INFO');
$log->setMsg('CRON DELETE USERS EXECUTED');
$log->writeLog();


?>