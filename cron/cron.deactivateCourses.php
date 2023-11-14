<?php

/*
 * Developed by wilowi
 * Updated by David Camacho
 * 
 * Se ejecuta una vez a la semana, los lunes a las 14:00 hora Madrid.
 */

set_time_limit(400);
ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);
$today = new DateTime('now');

// Ahora cerrar los cursos dos semanas después de la fecha fin 03/10/2022 Así que resto dos semanas a today
$today->modify("-2 weeks");

require_once '/var/cron/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';

require_once _URL_CRON.'util.php';
require_once _URL_CRON.'autoload.php';
/*require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/util.php';
require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/autoload.php';*/

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('deactivateCourses.txt');

$courses = new coursesNewModel();

$join = " LEFT JOIN lm_university ON(lm_courses_new.id_university=lm_university.id_university)"
      . " LEFT JOIN lm_time_zones ON(lm_university.id_zone=lm_time_zones.id_zone)"
      . " LEFT JOIN lm_students_courses ON(lm_courses_new.course_id = lm_students_courses.course_id)";
$select = " lm_courses_new.*,lm_university.id_zone,lm_time_zones.large_name";
$where = "  lm_courses_new.date_end_course < '" . $today->format('Y-m-d') . "' AND lm_students_courses.active = 1 GROUP BY lm_students_courses.course_id ORDER BY lm_courses_new.created DESC";

$result_courses = $courses->select($where, '', $select, $join);

foreach ($result_courses as $course) {
    echo 'Curso: '.$course->course_id.'<br/>';

//    $today_uni = new DateTime('now', new DateTimeZone($course->large_name));
//    $end_date_uni = new DateTime($course->date_end_course, new DateTimeZone($course->large_name));

    $students_course = new studentsCoursesModel();
    $where = 'course_id='.$course->course_id;
    $result_students_course = $students_course->select($where, '', '*','');

    $students_course->setActive(0);
    $students_course->setCourse_id($course->course_id);
    $result_deactivate = $students_course->deactivateCourse();

    if (!$result_deactivate) {
        $log->setType_msg('ERROR');
        $log->setMsg('deactivating course.');
        $log->writeLog();
    } else {
        $log->setType_msg('INFO');
        $log->setMsg('Course: ' . $course->course_id . ' Deactivated');
        $log->writeLog();
    }
}
$log->setType_msg('INFO');
$log->setMsg('CRON END DEACTIVATE COURSES EXECUTED');
$log->writeLog();
?>
