<?php

/* 
 * Developed by wilowi
 */


ini_set('display_errors', 1);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);
$today = new DateTime('now');

require_once '/var/cron/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';

require_once _URL_CRON.'util.php';
require_once _URL_CRON.'autoload.php';


$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('coachingFormBlock.txt');
			
$coachingForm = new coursesNewModel();
$where = 'lm_courses_new.blocked=0 AND lm_university.active=1 AND lm_university.erased!=1';
$join = ' LEFT JOIN lm_university USING(id_university)'
		. ' LEFT JOIN lm_time_zones ON (lm_university.id_zone=lm_time_zones.id_zone)';
$select = 'lm_courses_new.*, lm_university.name_university,lm_university.id_university,lm_time_zones.large_name';
$result_coaching = $coachingForm->select($where,'',$select,$join);

$coachingForm->setModified($today->format('Y-m-d H:i:s'));
$coachingForm->setModified_by('cron block');

foreach ($result_coaching as $key => $form) {
	
	$today_uni = new DateTime('now', new DateTimeZone($form->large_name));
	
	$one_week = new DateTime($form->date_ini_course, new DateTimeZone($form->large_name));
	$one_week->modify('-1 week');
		
	// block the coaching form one week before
	if($today_uni>=$one_week){
            
		
		$coachingForm->setId_university($form->id_university);
		$coachingForm->setCourse_id($form->course_id);
		$coachingForm->setBlocked(1);
		$result_update = $coachingForm->updateBlock();
		
		if($result_update){
			
			$log->setType_msg('INFO');
			$log->setMsg('Course blocked. Id course: '.$form->course_id.' Name form: '.$form->name_course.' University: '.$form->name_university);
			
		}else{
			$log->setType_msg('ERROR');
			$log->setMsg('When blocking the course. Id course: '.$form->course_id.' Name form: '.$form->name_course.' University: '.$form->name_university);
		}
		
		$log->writeLog();
		
		
	}
	
    
}

$log->setType_msg('INFO');
$log->setMsg('CRON BLOCK COACHING FORM EXECUTED');
$log->writeLog();


?>