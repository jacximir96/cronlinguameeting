<?php

ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

require_once '/var/cron/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';

require_once _URL_CRON.'util.php';
require_once _URL_CRON.'config/globalFunctions.php';
require_once _URL_CRON.'autoload.php';

$today = new DateTime('now');
$todayFormat = $today->format('Y-m-d');

$students = new studentsCourseSessionsNewModel();
$courses = new coachCoursesModel();
$where = "lm_courses_new.date_end_course>'$todayFormat'";
$join = "INNER JOIN lm_courses_new USING(course_id)";

$result_courses = $courses->select($where,'','*',$join);

//echo print_r($result_courses);

if (!empty($result_courses)) {


    foreach ($result_courses as $c) {

        $result_sessions = $students->select("id_coach=$c->coach_id AND course_id=$c->course_id and assigned=1",'',"count(id_student_session) as totalsessions");
        
        //echo "<pre>";echo print_r($result_sessions);echo "</pre>";

        if (empty($result_sessions[0]->totalsessions)){
            
            $delete = "coach_id=$c->coach_id AND course_id=$c->course_id";
            $courses->delete($delete);
            
            echo "<br>delete course $c->name_course for coach $c->coach_id";

        }
    }
}


?>