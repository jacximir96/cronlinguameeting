<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

ini_set('display_errors', 1);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

require_once '/var/cron/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'].'/config.php';

require_once _URL_CRON.'util.php';
require_once _URL_CRON.'autoload.php';


$today = new DateTime('now');
$eightMonthBefore = new DateTime('now');
$eightMonthBefore->modify('-8 months -3 weeks');
$formatM = $eightMonthBefore->format('Y-m-d H:i:s');

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('notifyBlockProfesores.txt');

$user = new userModel();
$where = "active=1 AND erased=0 AND rol=5 AND last_login <= '$formatM'";
$result_user = $user->select($where);

foreach ($result_user as $us) {

    $subject = "Linguameeting account will be deactivated";
    $body = '<div style="font-family:&quot;Cuprum&quot;,sans-serif">';
    $body .= '<div style="padding-bottom:0.8em;width:45%;margin-right:1%;margin-bottom:1%;background:#fff;
				border-radius:5px;font-family:&quot;Cuprum&quot;,sans-serif"><p style="font-family:&quot;Dosis&quot;,
				sans-serif;font-weight:bold;font-size:128%;color:#314a94;border-radius:5px;border-bottom:solid 1px #314a94;
				padding:0.4em;padding-left:0.8em;background:#d9e1ec;background:-webkit-linear-gradient(left top,#9fafc4,#d9e1ec);
				background:-o-linear-gradient(bottom right,#9fafc4,#d9e1ec);background:-moz-linear-gradient(bottom right,#9fafc4,#d9e1ec);
				background:linear-gradient(top right,#9fafc4,#d9e1ec)">Linguameeting account will be deactivated</p></div>';
    $body .= '<br>Dear Prof. '. $us->lastname_user .',';
    $body .= '<br><br>We have noticed that there has been no activity in your account for the last 9 months. As such, your account will be deactivated one week from the date of this email. If you would like to keep your account active, log in at <a href="' . _URL_LOCATION_LINGUAMEETING . '/login">linguameeting.com/login.</a>';
    $body .= '<br><br> <p>If you would like to reactivate your account, or have any questions or concerns, please contact <a href="mailto:support@linguameeting.com">support@linguameeting.com</a></p>';
    $body .= '<br><br>Regards,';
    $body .= '<br><br>The LinguaMeeting Team.';
    $body .= '</div>';

    $address = array($us->email);

    $save = new emailsModel();
    $save->setId_user_receiver($us->id_user);
    $save->setEmail_receiver($us->email);
    $save->setBody_mail($body);
    $save->setSubject_mail($subject);
    $save->setDate_send_mes($today->format('Y-m-d H:i:s'));
    $save->setType_message('accountDeactivated');
    $result = $save->add();

    if ($result) {
        $log->setType_msg('INFO');
        $log->setMsg('Email save to stack . Object: ' . $us->email);
        $log->writeLog();
    } else {
        $log->setType_msg('ERROR');
        $log->setMsg('When saving email for professor. Object: ' . json_encode($us));
        $log->writeLog();
    }
}

$log->setType_msg('INFO');
$log->setMsg('CRON NOTIFY PROF. EXECUTED');
$log->writeLog();