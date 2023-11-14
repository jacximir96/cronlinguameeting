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
$todayBefore->modify('-1 days');

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('experiencesRating.txt');
//https://www.linguameeting.com/images/logo_donate_web.png

/*$bodyUser = "Hello Madison!";
        $bodyUser.= '<p>We hope the Experience <strong>Bolivia: nature and wildlife</strong> with <strong>Andrea Camacho</strong> was as fun for you to attend as it was for us to make!</p>';
        $bodyUser.= '<p>If you would like to show some love for our coaches you can:</p>';
        $bodyUser.= '<div style="float:left;"><a href="'._URL_LOCATION_LINGUAMEETING.'panel" style="text-decoration:none;margin-top:10px">'
                . '<div style="color:white;background-color:#007aa5;border-radius:5px;text-align:center;padding:10px; width:200px;">Leave a tip</div>'
                . '</a></div><div style="float:left; margin-left:5px;margin-right:5px;">and</div>';
        $bodyUser.= '<div style="float:left;"><a href="'._URL_LOCATION_LINGUAMEETING.'panel" style="text-decoration:none;margin-top:10px">'
                . '<div style="color:white;background-color:#007aa5;border-radius:5px;text-align:center;padding:10px; width:200px;">Rate Experience</div>'
                . '</a></div>';
                $bodyUser.= '<p style="clear:both; padding-top:5px;">*Tips go 100% to the coaches.</p>';
        $bodyUser.= "<p><br>Thanks so much!</p>";
        $bodyUser .= "<br>The Linguameeting Team.";
        $bodyUser .= '<br><br><img style="float:left;margin-right:20px;margin-top:20px;height:40px;width:180px;" '
                . 'src="'._URL_LOCATION_LINGUAMEETING.'images/logo.png" alt="LinguaMeeting" title="LinguaMeeting">';*/

    /*$bodyUser = "Hello Madison!";
        $bodyUser.= '<p>We hope the Experience <strong>Bolivia: nature and wildlife</strong> with <strong>Andrea Camacho</strong> was as fun for you to attend as it was for us to make!</p>';
        $bodyUser.= '<p>If you would like to show some love for our coaches you can:</p>';
        $bodyUser.= '<div style="float:left;"><a href="'._URL_LOCATION_LINGUAMEETING.'panel" style="text-decoration:none;margin-top:10px">'
                . '<img style="height:60px;" src="https://www.linguameeting.com/images/logo_donate_web.png">'
                . '</a></div><div style="float:left; margin-left:5px;margin-right:5px;margin-top:15px;">and</div>';
        $bodyUser.= '<div style="float:left;"><a href="'._URL_LOCATION_LINGUAMEETING.'panel" style="text-decoration:none;margin-top:10px">'
                . '<div style="color:white;background-color:#007aa5;border-radius:5px;text-align:center;padding:10px; width:200px;margin-top:10px;">Rate Experience</div>'
                . '</a></div>';
                $bodyUser.= '<p style="clear:both; padding-top:5px;">*Tips go 100% to the coaches.</p>';
        $bodyUser.= "<p><br>Thanks so much!</p>";
        $bodyUser .= "<br>The Linguameeting Team.";
        $bodyUser .= '<br><br><img style="float:left;margin-right:20px;margin-top:20px;height:40px;width:180px;" '
                . 'src="'._URL_LOCATION_LINGUAMEETING.'images/logo.png" alt="LinguaMeeting" title="LinguaMeeting">';*/ 

$model = new experiencesModel();
$users = new experiencesUsersModel();
$usersPublic = new experiencesUsersPublicModel();

$where = "day='".$todayBefore->format('Y-m-d')."'";
$joinExp = " LEFT JOIN lm_users ON(lm_users.id_user=lm_experiences.coach_id)";
$result_model = $model->select($where,'','lm_experiences.*,lm_users.name_user,lm_users.lastname_user',$joinExp);

foreach ($result_model as $exp) {
    
    $join = " LEFT JOIN lm_users ON(lm_users.id_user=lm_experiences_users.user_id)";
    $result_users = $users->select("experience_id=$exp->id_experience AND attendance=1","","lm_users.name_user,lm_users.lastname_user,lm_users.email",$join);
    
    foreach($result_users as $us){
        
        $bodyUser = "Hello $us->name_user!";
        $bodyUser.= '<p>We hope the Experience <strong>'.$exp->title.'</strong> with <strong>'.$exp->name_user.' '.$exp->lastname_user.'</strong> was as fun for you to attend as it was for us to make!</p>';
        $bodyUser.= '<p>If you would like to show some love for our coaches you can:</p>';
        $bodyUser.= '<div style="float:left;"><a href="'._URL_LOCATION_LINGUAMEETING.'panel" style="text-decoration:none;margin-top:10px">'
                . '<div style="color:white;background-color:#007aa5;border-radius:5px;text-align:center;padding:10px; width:200px;">Rate or tip</div>'
                . '</a></div>';
        $bodyUser.= '<p style="clear:both; padding-top:5px;">*Tips go 100% to the coaches.</p>';
        $bodyUser.= "<p><br>Thanks so much!</p>";
        $bodyUser .= "<br>The Linguameeting Team.";
        $bodyUser .= '<br><br><img style="float:left;margin-right:20px;margin-top:20px;height:40px;width:180px;" '
                . 'src="'._URL_LOCATION_LINGUAMEETING.'images/logo.png" alt="LinguaMeeting" title="LinguaMeeting">';

        //echo $bodyUser;
        $address = array("$us->email");
        
        if(sendMailExperiences($address, 'Rate LinguaMeeting Experience', $bodyUser)){
            
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
        
        $bodyUser = "Hello $us->name!";
        $bodyUser.= '<p>We hope the Experience <strong>'.$exp->title.'</strong> with <strong>'.$exp->name_user.' '.$exp->lastname_user.'</strong> was as fun for you to attend as it was for us to make!</p>';
        $bodyUser.= '<p>If you would like to show some love for our coaches you can:</p>';
        $bodyUser.= '<div style="float:left;"><a href="'._URL_LOCATION_LINGUAMEETING.'experiencesSearch/'.$exp->id_experience.'" style="text-decoration:none;margin-top:10px">'
                . '<div style="color:white;background-color:#007aa5;border-radius:5px;text-align:center;padding:10px; width:200px;">Rate or tip</div>'
                . '</a></div>';
        $bodyUser.= '<p style="clear:both; padding-top:5px;">*Tips go 100% to the coaches.</p>';
        $bodyUser.= "<p><br>Thanks so much!</p>";
        $bodyUser .= "<br>The Linguameeting Team.";
        $bodyUser .= '<br><br><img style="float:left;margin-right:20px;margin-top:20px;height:40px;width:180px;" '
                . 'src="'._URL_LOCATION_LINGUAMEETING.'images/logo.png" alt="LinguaMeeting" title="LinguaMeeting">';


        //echo $bodyUser;
        $address = array("$us->email");
        if(sendMailExperiences($address, 'Rate LinguaMeeting Experience', $bodyUser)){
            
            $log->setType_msg('INFO');
            $log->setMsg('Email sent to: ' . $us->email);
            $log->writeLog();
        }else{
            
            $log->setType_msg('ERROR');
            $log->setMsg('There was an error with the email: ' . $us->email);
            $log->writeLog();
            
        }
        
    }
    
}

$log->setType_msg('INFO');
$log->setMsg('CRON EXECUTED');
$log->writeLog();
?>
