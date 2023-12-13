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

require_once '/var/cron/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';

require_once _URL_CRON.'util.php';
require_once _URL_CRON.'autoload.php';

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('surveyLinguameeting.txt');

// --- get general url survey
$general = new configModel();
$where_general = "id = 1";/* Se ejecuta para el curso */
$result_general = $general->select($where_general);

$courses = new coursesNewModel();

/*$join = " LEFT JOIN lm_university ON(lm_courses_new.id_university=lm_university.id_university)"
		. " LEFT JOIN lm_time_zones ON(lm_university.id_zone=lm_time_zones.id_zone)"
		. " LEFT JOIN lm_courses_duedates ON(lm_courses_new.course_id=lm_courses_duedates.course_id)"
		. " LEFT JOIN lm_coach_courses ON(lm_courses_new.course_id=lm_coach_courses.course_id)"
		. " LEFT JOIN lm_languages ON(lm_courses_new.id_language=lm_languages.id_language)";
$select = " lm_courses_new.*,lm_courses_new.course_id,lm_university.id_zone,lm_university.name_university,lm_time_zones.large_name,"
		. " lm_languages.id_language,lm_courses_duedates.*,lm_coach_courses.coach_id";
$where =  "  lm_courses_new.date_end_course >= '" . $today->format('Y-m-d')."' AND lm_courses_duedates.is_makeUp = 0 ORDER BY lm_courses_new.created DESC";*/

$join = " LEFT JOIN university ON (course.university_id = university.id)"
		. " LEFT JOIN timezone ON (university.timezone_id = timezone.id)"
		. " LEFT JOIN coaching_week ON (course.id = coaching_week.course_id)"
		. " LEFT JOIN assignment ON (coaching_week.id = assignment.week_id)"
		. " LEFT JOIN course_coach ON(course.id = course_coach.course_id)"
		. " LEFT JOIN language ON (course.language_id = language.id)";
$select = " course.*,course.id as course_id, university.timezone_id as id_zone, university.name as name_university,"
		. " timezone.name as large_name,language.id as id_language,coaching_week.*,course_coach.coach_id,assignment.week_id";
$where =  "  course.end_date >= '" . $today->format('Y-m-d')."' AND coaching_week.is_makeUp = 0 ORDER BY course.created_at DESC";

$result_courses = $courses->select($where, '', $select, $join);

$dataCourses = ordercourse($result_courses);

foreach ($dataCourses as $course) {

	$today_uni = new DateTime('now', new DateTimeZone($course->zoneUniversity));

	if (!empty($course->weeks)) {
		$last_week = end($course->weeks);
		$last_week_time = new DateTime($last_week->date_start, new DateTimeZone($course->zoneUniversity));
		$last_week_time->modify('-1 weeks');
	} else {    
        $last_week_time = new DateTime($course->end_date, new DateTimeZone($course->zoneUniversity));
        $last_week_time->modify('-1 weeks');
    }

	if($today_uni >= $last_week_time) {
		// insert notification for coach
		$notifications = new notificationsModel();

		foreach ($course->coaches as $key => $coach) {
			$putUrl = '#';

			if ( !empty($course->url_survey) ) {
				$putUrl = $course->url_survey;
			} else if ( !empty ($result_general) ) {
				$putUrl = $result_general[0]->url;
			}

			$data = '';

			if ( $course->id_language == 1 ) {
				$data = "<strong>UNIVERSIDAD: $course->name_university, CURSO: $course->name_course</strong><br><br>";

				    $data.= "Ahora que falta poco para acabar este curso, te pedimos por favor RECORDAR a los estudiantes completar la encuesta de satisfacción que aparece en su portal. Sigue estos pasos:<br>";

				$data.= "1. Hacia el final de la clase, últimos 2 minutos, muéstrales dónde puede encontrar la encuesta en su portal del "
                                        . 'estudiante con la ayuda de esta <a href="https://view.genial.ly/63b6fde0a9be3a001052bbda">presentación</a> y pídeles que la completen DESPUÉS de la sesión.<br>';
				$data.= "2.También agradecemos cualquier reseña positiva en nuestro Facebook, así que, por favor, "
                                        . 'anima a los estudiantes para que nos dejen ahí sus comentarios sobre su experiencia, compartiéndoles este link: <a href="https://www.facebook.com/linguameeting/reviews?ref=page_internal">RESEÑA</a> '
                                        . "y especificando que es una acción VOLUNTARIA.<br>";
				$data.= "3. Por favor, asegúrate de que compartes toda esta información en la penúltima y/o última sesión del curso.<br>";
				$data.= '<br><br>Muchísimas gracias.';

			} else {
				$data = "<strong>UNIVERSITY: $course->name_university, COURSE: $course->name_course</strong><br><br>";
				$data.= "Given that the course is coming to a close, we ask that you REMIND students to complete the satisfaction survey in their portal. Follow the below steps:<br>";
				$data.= "1 Towards the end of class, the last 2 minutes, show the students where they can find the link to the survey, "
                                        . 'with the help of <a href="https://view.genial.ly/63b6fde0a9be3a001052bbda">this</a> presentation, and ask that they complete it AFTER the end of the session. <br>';
				$data.= "2. We also appreciate any positive feedback on Facebook, so please encourage students "
                                        . 'to leave us a comment here sharing this link: <a href="https://www.facebook.com/linguameeting/reviews?ref=page_internal">REVIEW</a>, reminding them that it is completely optional to do so.<br>';
				$data.= "3. Please ensure that all of this information is shared with students before the last day of sessions. <br>";
				$data.= '<br><br>Thanks so much for your help!';
			}

			$notifications->setNotification_type_id(7);
			$notifications->setContent($data);
			$notifications->setNotifier_id($coach->id_coach);
			$notifications->setNotification_at($today->format('Y-m-d H:i:s'));
			$result_add = $notifications->add();

			if ( !$result_add ) {
				$log->setType_msg('ERROR');
				$log->setMsg('When adding notification. ');
				$log->writeLog();
			} else {
				$log->setType_msg('INFO');
				$log->setMsg('Notification added for coach:  '.$coach->id_coach.' for course: '.$course->id_course);
				$log->writeLog();
			}
		}
	}
}

$log->setType_msg('INFO');
$log->setMsg('CRON END SURVEY EXECUTED');
$log->writeLog();

function orderCourse($courses) {

	$newCourses = array();
	
	foreach ($courses as $session){

		$id_course = $session->course_id;
		$id_week = $session->week_id;
		$id_coach = $session->coach_id;

		if ( empty($newCourses[$id_course]) ) {
			$newCourses[$id_course] = new stdClass();
			$newCourses[$id_course]->weeks = array();
			$newCourses[$id_course]->coaches = array();
		}

		$newCourses[$id_course]->id_university = $session->university_id;
		$newCourses[$id_course]->name_university = $session->name_university;
		$newCourses[$id_course]->id_course = $session->course_id;
		$newCourses[$id_course]->name_course = $session->name;
		$newCourses[$id_course]->start_date = $session->start_date;
		$newCourses[$id_course]->end_date = $session->end_date;
		$newCourses[$id_course]->id_coach = $session->coach_id;
		$newCourses[$id_course]->url_survey = $session->url_survey;
		$newCourses[$id_course]->zoneUniversity = $session->large_name;
		$newCourses[$id_course]->id_language = $session->id_language;

		if ( !empty($id_week) ) {
			if ( empty($newCourses[$id_course]->weeks[$id_week]) ) {
				$newCourses[$id_course]->weeks[$id_week] = new stdClass();
			}

			$newCourses[$id_course]->weeks[$id_week]->id_week = $id_week;
			$newCourses[$id_course]->weeks[$id_week]->date_start = $session->date_start;
			$newCourses[$id_course]->weeks[$id_week]->date_end = $session->date_end;
		}
		
		if ( !empty($id_coach) ) {
			if (empty($newCourses[$id_course]->coaches[$id_coach])) {
				$newCourses[$id_course]->coaches[$id_coach] = new stdClass();
			}
			$newCourses[$id_course]->coaches[$id_coach]->id_coach = $session->coach_id;
		}
	}

	return $newCourses;
}
?>
