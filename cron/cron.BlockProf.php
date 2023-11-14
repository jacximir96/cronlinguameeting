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
$nineMonthBefore = new DateTime('now');
$nineMonthBefore->modify('-9 months');
$formatM = $nineMonthBefore->format('Y-m-d H:i:s');

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('blockProfesores.txt');

$user = new userModel();
$where = "active=1 AND erased=0 AND rol=5 AND last_login <= '$formatM'";
$result_user = $user->select($where);

foreach ($result_user as $us) {

        $user->setId_user($us->id_user);
        $user->setActive(0);
        $user->setModified($today->format('Y-m-d H:i:s'));
        $user->setModified_by('cron block prof');
        $user->updateActive();

        $log->setType_msg('INFO');
        $log->setMsg('User prof blocked: '.$us->email);
        $log->writeLog();
}

$log->setType_msg('INFO');
$log->setMsg('CRON BLOCK PROF. EXECUTED');
$log->writeLog();