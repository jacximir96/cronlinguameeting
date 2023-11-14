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
/*require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/util.php';
require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';
require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/autoload.php';*/
$today = new DateTime('now');

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('seeMessages.txt');

$users = new userModel();
$where = "rol=2 and active=1";
$result_users = $users->select($where);

//echo print_r($result_users);
$messages = new messagesModel();

foreach ($result_users as $user) {
	
	$where_msg = "id_user_receiver=$user->id_user AND read_mes=0 AND delete_receiver=1";
	$result_msg = $messages->select($where_msg);
	
	//echo print_r($result_msg);
	
	// --- If exist not read messages --> send email
	if(!empty($result_msg)){
		
		$addresses = array();
		array_push($addresses, $user->email);
		
		$subject = "Recordatorio: mensajes sin leer";

		$body = "<br>Hola $user->name_user,";
		$body .= "<br><br>Esto es un recordatorio para decirte que tienes mensajes sin leer en la plataforma de linguameeting.";
		$body .= '<br><br>Por favor, inicia sesi&oacute;n en <a href="'._URL_LOCATION_LINGUAMEETING.'login" target="_blank">www.linguameeting.com</a> y revisa los mensajes pendientes.';
		$body.= '<br><br>Un saludo,';
		$body.= '<br>Tech Support.';
		$body.= '<br><br>NOTA: Esto es un mensaje generado autom&aacute;ticamente a trav&eacute;s de la plataforma.';
		$body.='<br><br><img style="float:left;margin-right:20px;margin-top:20px;height:40px;width:180px;" '
					. 'src="'._URL_LOCATION_LINGUAMEETING.'images/logo.png" alt="LinguaMeeting" title="LinguaMeeting">';
		
		//echo $body;

		$result = sendMailInfo($addresses, $subject, $body);
		
		if($result){

				$log->setType_msg('INFO');
				$log->setMsg('Email  sent to . Object: ' . $user->email);
				$log->writeLog();
				
			}else{
				
				$log->setType_msg('ERROR');
				$log->setMsg('Sending email . Object: ' . $user->email);
				$log->writeLog();
			}
		
	}
	
}

$log->setType_msg('INFO');
$log->setMsg('CRON SEE MESSAGES EXECUTED');
$log->writeLog();



?>