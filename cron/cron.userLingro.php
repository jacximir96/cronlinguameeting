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

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('userLingro.txt');

$lingro = new lingroRegisterModel();
$where = "update_profile=0";
$result_lingro = $lingro->select($where);

//echo print_r($students);
//echo print_r($result_students);

$user = new userModel();

if (count($result_lingro) > 0) {

	//echo print_r($new_students);
	foreach ($result_lingro as $userLingro) {
		
		$where_user = " email='$userLingro->email_user_lingro'";
		$result_user = $user->select($where_user);

		if(!empty($result_user)){
			
			// update user
			$user->setId_user($result_user[0]->id_user);
			$user->setLingro_student(1);
			$user->setModified($today->format('Y-m-d H:i:s'));
			$user->setModified_by('cron user lingro');
			$result_update = $user->updateLingro();

			if($result_update){
				
				$lingro->setId_lingro_reg($userLingro->id_lingro_reg);
				$lingro->setEmail_user_lingro($userLingro->email_user_lingro);
				$lingro->setUpdate_profile(1);
				$result_up_lingro = $lingro->updateProfile();
				
				if(!$result_up_lingro){
					$log->setType_msg('ERROR');
					$log->setMsg('When updating profile lingro. Object: ' . json_encode($result_lingro));
					$log->writeLog();
				}

				
			}else{
				$log->setType_msg('ERROR');
				$log->setMsg('When updating user lingro. Object: ' . json_encode($result_lingro));
				$log->writeLog();
			}
			
		}
		
	}
	
}

$log->setType_msg('INFO');
$log->setMsg('CRON USER LINGRO EXECUTED');
$log->writeLog();



?>