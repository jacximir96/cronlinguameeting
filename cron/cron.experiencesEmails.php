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
$todayBefore = new DateTime('now');
$todayBefore->modify('+ 1 day');

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('experiencesEmails.txt');

$model = new experiencesModel();
$users = new experiencesUsersModel();
$usersPublic = new experiencesUsersPublicModel();

$where = "day='".$todayBefore->format('Y-m-d')."'";
$joinExp = " LEFT JOIN lm_users ON(lm_users.id_user=lm_experiences.coach_id)";
$result_model = $model->select($where,'','lm_experiences.*,lm_users.name_user,lm_users.lastname_user',$joinExp);

//echo print_r($result_model);
foreach ($result_model as $exp) {
    
    $join = " LEFT JOIN lm_users ON(lm_users.id_user=lm_experiences_users.user_id)"
            . "LEFT JOIN lm_time_zones ON(lm_users.id_zone=lm_time_zones.id_zone)";
    $result_users = $users->select("experience_id=$exp->id_experience AND attendance=0","","lm_users.name_user,lm_users.lastname_user,lm_users.email,lm_time_zones.large_name",$join);
    
    //echo print_r($users);
    
    foreach($result_users as $us){
        
        $dateExperience = new DateTime($exp->day.' '.$exp->hour, new DateTimeZone('America/New_York'));
        $dateExperience->setTimezone(new DateTimeZone($us->large_name));
        
        $bodyUser = "Welcome to Experiences!";
        $bodyUser.= '<p>This is a reminder  for the Experience you registered for: <strong>'.$exp->title.'</strong> on <strong>'
                .$dateExperience->format('d F Y').'</strong> and <strong>'.$dateExperience->format('g:i A').'</strong> ('.$us->large_name.').</p>';
        $bodyUser.= '<p>In order to join the Experience, go to your portal and click on the Experience tab.</p><p>Enjoy! </p>';
        $bodyUser .= "<br>The Linguameeting Team.";
        $bodyUser .= '<br><br><img style="float:left;margin-right:20px;margin-top:20px;height:40px;width:180px;" '
                . 'src="'._URL_LOCATION_LINGUAMEETING.'images/logo.png" alt="LinguaMeeting" title="LinguaMeeting">';

        //echo $bodyUser;
        $address = array("$us->email");
        
        if(sendMailExperiences($address, 'LinguaMeeting Experience: '.utf8_decode($exp->title), $bodyUser)){
            
            $log->setType_msg('INFO');
            $log->setMsg('Email sent to: ' . $us->email);
            $log->writeLog();
        }else{
            
            $log->setType_msg('ERROR');
            $log->setMsg('There was an error with the email: ' . $us->email);
            $log->writeLog();
            
        }

        
    }
    
    $result_public = $usersPublic->select("experience_id=$exp->id_experience");
    
    foreach($result_public as $us){
        
        $dateExperience = new DateTime($exp->day.' '.$exp->hour, new DateTimeZone('America/New_York'));
        
        $bodyUser = "Hello $us->name!";
        $bodyUser.= '<p>This is a reminder for your LinguaMeeting Experience: <strong>'.$exp->title.'</strong> on <strong>'
                .$dateExperience->format('d F Y').'</strong> and <strong>'.$dateExperience->format('g:i A').'</strong> (America/New_York).</p>';
        $bodyUser.= '<p><a href="'.$exp->url_join.'">Join the experience</a></p>';
        $bodyUser.= '<p>See you there! </p>';
        $bodyUser .= "<br>The Linguameeting Team.";
        $bodyUser .= '<br><br><img style="float:left;margin-right:20px;margin-top:20px;height:40px;width:180px;" '
                . 'src="'._URL_LOCATION_LINGUAMEETING.'images/logo.png" alt="LinguaMeeting" title="LinguaMeeting">';


        //echo $bodyUser;
        $address = array("$us->email");
        if(sendMailExperiences($address, 'LinguaMeeting Experience: '.utf8_decode($exp->title), $bodyUser)){
            
            $log->setType_msg('INFO');
            $log->setMsg('Email (public) sent to: ' . $us->email);
            $log->writeLog();
        }else{
            
            $log->setType_msg('ERROR');
            $log->setMsg('There was an error (public) with the email: ' . $us->email);
            $log->writeLog();
            
        }
        
    }
    
}

$log->setType_msg('INFO');
$log->setMsg('CRON EXECUTED');
$log->writeLog();
?>
