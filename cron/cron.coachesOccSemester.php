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
require_once _URL_CRON.'config/globalFunctions.php';
require_once _URL_CRON.'autoload.php';


$today = new DateTime('now');
$todayEarly = new DateTime('now');
$year = $today->format('Y');
$todayEarly->modify('-3 months');
// three months early


$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('occCoachesSemester.txt');

$model = new coachScheduleNewModel();
$join = " LEFT JOIN lm_users ON(lm_coach_schedule_new.coach_id=lm_users.id_user)";
$as = "";
$where = "lm_users.active=1 AND lm_users.erased=0 AND schedule_date>='".$todayEarly->format('Y-m-d')."'";
$select = "lm_coach_schedule_new.*";
$result_model = $model->select($where,$as,$select,$join);

//echo "<pre>";echo print_r($model);echo "</pre>";
//echo "<pre>";echo print_r($result_model);echo "</pre>";

$coaches = array();

foreach ($result_model as $key => $value) {
    
    $coach_id = $value->coach_id;
    //$semester_id = $value->semester_id;
    
    $dateSchedule = new DateTime($value->schedule_date);
    $year = $dateSchedule->format('Y');
    
    switch ($dateSchedule->format('M')) {
        case "Jan":
            $semester_id = 2;
            break;
        
        case "Feb":
            $semester_id = 2;
            break;
        
        case "Mar":
            $semester_id = 2;
            break;
        
        case "Apr":
            $semester_id = 2;
            break;
        
        case "May":
            $semester_id = 2;
            break;
        
        case "Jun":
            $semester_id = 3;
            break;
        
        case "Jul":
            $semester_id = 3;
            break;
        
        case "Aug":
            $semester_id = 1;
            break;
        
        case "Sep":
            $semester_id = 1;
            break;
        
        case "Oct":
            $semester_id = 1;
            break;
        
        case "Nov":
            $semester_id = 1;
            break;
        
        case "Dec":
            $semester_id = 1;
            break;

        default:
            break;
    }
    
    
    if(empty($coaches[$coach_id])){
        
        
        $coaches[$coach_id] = new stdClass();
        $coaches[$coach_id]->semester = array();
        $coaches[$coach_id]->coach_id = $coach_id;
    }
    
    if(empty($coaches[$coach_id]->semester[$semester_id])){
        
        
        $coaches[$coach_id]->semester[$semester_id] = new stdClass();
        $coaches[$coach_id]->semester[$semester_id]->year = array();
        $coaches[$coach_id]->semester[$semester_id]->semester_id = $semester_id;
    }
    
    if(empty($coaches[$coach_id]->semester[$semester_id]->year[$year])){
        
        
        $coaches[$coach_id]->semester[$semester_id]->year[$year] = new stdClass();
        $coaches[$coach_id]->semester[$semester_id]->year[$year]->semester_id = $semester_id;
        $coaches[$coach_id]->semester[$semester_id]->year[$year]->total_sessions = 0;
        $coaches[$coach_id]->semester[$semester_id]->year[$year]->total_sessions_free = 0;
        $coaches[$coach_id]->semester[$semester_id]->year[$year]->total_sessions_occ = 0;
        $coaches[$coach_id]->semester[$semester_id]->year[$year]->year = $year;
    }
    
    // si están bloqueadas no cuentan como disponibles por tanto no cuentan en el total de sesiones.
    if(empty($value->blocked_ses)){
        
        $coaches[$coach_id]->semester[$semester_id]->year[$year]->total_sessions++;
        
        if($value->is_occ==1){
            $coaches[$coach_id]->semester[$semester_id]->year[$year]->total_sessions_occ++;
        }else{
            
            $coaches[$coach_id]->semester[$semester_id]->year[$year]->total_sessions_free++;
        }
        
        
    }
    
}

//$occup = round(($hours_sessions_total*100)/$hours_avail_total,2);

reset($coaches);

foreach ($coaches as $keyC => $c) {
    
    if(!empty($c->semester)){
        
        foreach ($c->semester as $semCAux => $semesterAux) {
            
             foreach ($semesterAux->year as $semC => $semester) {

                if (!empty($semester->total_sessions) && !empty($semester->total_sessions_occ)) {
                    $percentage = round(($semester->total_sessions_occ * 100) / $semester->total_sessions, 2);
                } else {
                    $percentage = 0;
                }
                //$coaches[$keyC]->semester[$semC]->percentage = $percentage;

                $cron = new coachOccTermModel();
                $cron->setCoach_id($c->coach_id);
                $cron->setSemester_id($semester->semester_id);
                $cron->setYear($semester->year);
                $cron->setPercentage($percentage);

                $where = "coach_id=$c->coach_id AND semester_id=$semester->semester_id AND year=$semester->year";
                $result_actual = $cron->select($where);

                if (empty($result_actual)) {
                    $cron->add();
                } else {
                    $cron->updateOcc();
                }
            }
        }
        
        
    }
    
    
}

//echo "<pre>";echo print_r($coaches);echo "</pre>";

$log->setType_msg('INFO');
$log->setMsg('CRON EXECUTED. ');
$log->writeLog();

?>