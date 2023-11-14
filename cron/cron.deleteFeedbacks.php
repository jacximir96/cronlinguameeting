<?php

// cron que pasa diariamente


ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

//require_once '/var/cron/cronlinguameeting/config.php';
require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';

require_once _URL_CRON.'util.php';
require_once _URL_CRON.'config/globalFunctions.php';
require_once _URL_CRON.'autoload.php';

$today = new DateTime('now');
$yesterday = new DateTime('now');
$yesterday->modify("-1 day");

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('deleteFeedbacks.txt');

$model = new studentsCourseSessionsNewModel();
$where = "assigned=1 AND date_select_ini>='".$yesterday->format('Y-m-d H:i:s')."' AND date_select_ini<='".$today->format('Y-m-d H:i:s')."'";
$as = "";
$join = " LEFT JOIN lm_students_feedbacks ON(lm_students_feedbacks.id_student_course_session=lm_students_course_sessions_new.id_student_session)";
$select = "*";

$result_model = $model->select($where);


foreach($result_model as $session){
    
    $feedback =  new studentsFeedbacksModel();
    
    $where = "id_student_course_session=$session->id_student_session";
    $result_feedback = $feedback->select($where);

    
    if(count($result_feedback)>1){

        $last = end($result_feedback);
        foreach ($result_feedback as $key => $feed) {
            
            // borramos todos los feedbacks menos el último
            if ($feed->id_feedback != $last->id_feedback) {

                $where_delete = "id_feedback=$feed->id_feedback";
                $feedback->delete($where_delete);
                
                $log->setType_msg('INFO');
                $log->setMsg("feedback delete $feed->id_feedback y sesión $feed->id_student_course_session.");
            }
        }
    }
    
    
}

$log->setType_msg('INFO');
$log->setMsg('CRON DELETE FEEDBACKS EXECUTED');
$log->writeLog();

?>