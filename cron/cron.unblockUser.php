<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
$log->setFile_name('unblockUsers.txt');

$user = new userModel();
$where = "active=1 AND erased=0";
$result_user = $user->select($where);

foreach ($result_user as $us) {
	
	if($us->blocked==1){
			
		
		$user->setId_user($us->id_user);
		$user->setAttempts(0);
		$user->setBlocked(0);
		$user->setModified($today->format('Y-m-d H:i:s'));
		$user->setModified_by('cron unblock user');
		$user->updateAttempts();
		$user->updateBlocked();
		
		$log->setType_msg('INFO');
		$log->setMsg('User unblocked: '.$us->email);
		$log->writeLog();
		
	}
	
	
	
}




$log->setType_msg('INFO');
$log->setMsg('CRON UNBLOCK USERS EXECUTED');
$log->writeLog();


?>