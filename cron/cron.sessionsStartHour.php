<?php

/*
 * Developed by wilowi
 */

set_time_limit(500);

ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

require_once '/var/cron/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';

require_once _URL_CRON.'util.php';
require_once _URL_CRON.'autoload.php';

$today = new DateTime('now');
$twoBefore = new DateTime('now');
$oneHour = new DateTime('now');
$oneHour->modify('+1 hour');
$oneHourDate = $oneHour->format('Y-m-d H:i');

$oneHour15 = new DateTime($oneHourDate);
$oneHour15->modify('-15 minutes');


$twoAfter = new DateTime('now');
$twoAfter->modify('+1 days');
$twoBeforeDate = $twoBefore->format('Y-m-d').' 00:00:00';
$twoAfterDate = $twoAfter->format('Y-m-d').' 00:00:00';

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('sessionsStartHour.txt');

$students = new studentsCoursesModel();

$where = "lm_students_courses.active=1 AND lm_users.active=1 AND lm_users.erased=0 AND lm_students_courses_sessions_new.assigned=1 "
	. "AND lm_students_courses_sessions_new.missed=0 AND lm_students_courses_sessions_new.attendance=0 AND lm_students_courses_sessions_new.past=0"
        . " AND lm_students_courses_sessions_new.date_select_ini between '$twoBeforeDate' AND '$twoAfterDate'";
$join = "LEFT JOIN lm_users ON (lm_students_courses.id_user=lm_users.id_user)"
	. " LEFT JOIN lm_students_courses_sessions_new ON(lm_students_courses.enroll_id=lm_students_courses_sessions_new.enroll_id)"
	. " LEFT JOIN lm_courses_new ON(lm_courses_new.course_id=lm_students_courses.course_id)"
	. " LEFT JOIN lm_time_zones ON(lm_users.id_zone=lm_time_zones.id_zone)"
        . " LEFT JOIN lm_course_type USING (id_type_course)";
$select = "lm_students_courses_sessions_new.*,lm_courses_new.id_university,lm_time_zones.large_name,"
        . "lm_courses_new.is_flex,lm_users.name_user,"
        . "lm_users.lastname_user,lm_users.email,lm_users.emailsReception, lm_students_courses.section_id,lm_course_type.type_group";

$result_students = $students->select($where, '', $select, $join);


//echo "<pre>";echo print_r($result_students);echo "</pre>";
//echo "<pre>";echo print_r($students);echo "</pre>";


// array para guardar los assignments que se hayan encontrado y no hacer el sq
$assignments = array();
$schedule = new studentsCourseSessionsNewModel();

// --- FOR STUDENTS
if(count($result_students)>0){
    
    $arrayHoras = array();
    $documentation = new courseDocumentationModel();
    foreach ($result_students as $student) {
        
        $key = "";
        
         $dateSelectIni = new DateTime($student->date_select_ini,new DateTimeZone($student->timezone));
         
         if($student->large_name!=$student->timezone){
         
            $dateSelectIni->setTimezone(new DateTimeZone($student->large_name));
         }
         
         // ahora convierto a Europe/Madrid para comparar.
         $dateSelectIni->setTimezone(new DateTimeZone("Europe/Madrid"));
         
        //echo "<pre>";echo print_r($dateSelectIni);echo "</pre>";
         
	if ($dateSelectIni>$oneHour15 && $dateSelectIni<$oneHour && $student->emailsReception == 1) {
            
            //Obtenemos documentación
            if (empty($student->is_flex)) {
                
                
                //ver si es make-up para coger el assignament de la semana que corresponde.
                if ($student->from_makeup == 1 && !empty($student->session_recovered) && $student->type_group == 'O') {

                    //consulto el id_week.
                    $result_week_make = $schedule->select("id_student_session=$student->session_recovered");
                    $where_doc = "id_section=$student->section_id AND id_week=" . $result_week_make[0]->week_id;
                    $key = $student->course_id.'_'.$student->section_id.'_'.$result_week_make[0]->week_id;
                } else {
                    
                    $where_doc = "id_section=$student->section_id AND id_week=$student->week_id";
                    
                    if ($student->type_group == 'O') {
                        $key = $student->course_id.'_'.$student->section_id.'_'.$student->week_id;
                    }else{
                        $key = $student->course_id.'_'.$student->week_id;
                    }
                    
                }
            } else {

                
                //ver si es make-up para coger el assignament de la semana que corresponde.
                if ($student->from_makeup == 1 && !empty($student->session_recovered) && $student->type_group == 'O') {

                    //consulto el id_week.
                    $result_week_make = $schedule->select("id_student_session=$student->session_recovered");
                    $where_doc = "id_section=$student->section_id AND id_chapter=" . $result_week_make[0]->session_id;
                    $key = $student->course_id.'_'.$student->section_id.'_'.$result_week_make[0]->session_id;
                    
                } else {
                    $where_doc = "id_section=$student->section_id AND id_chapter=$student->session_id";
                    
                    if ($student->type_group == 'O') {
                        $key = $student->course_id.'_'.$student->section_id.'_'.$student->session_id;
                    }else{
                        $key = $student->course_id.'_'.$student->session_id;
                    }
                    
                    
                    
                }
            }
            
            if (empty($assignments[$key])) {

                $result_doc = $documentation->select($where_doc, '', '*', ' LEFT JOIN lm_guides_chapters ON(lm_guides_chapters.id_chapter=lm_course_documentation.ids_chapters)');

                if (!empty($result_doc)) {

                    $assignments[$key] = new stdClass();

                    if (!empty($result_doc[0]->assignment)) {

                        $assignments[$key]->assignment = _URL_LOCATION_LINGUAMEETING . $result_doc[0]->assignment;
                    } elseif (!empty($result_doc[0]->url)) {
                        $assignments[$key]->assignment = _URL_LOCATION_LINGUAMEETING . $result_doc[0]->url;
                    }
                }
            }
            $student->assignment = $assignments[$key]->assignment;
            
            if ($student->large_name != $student->timezone) {

                $dateSelectIni->setTimezone(new DateTimeZone($student->large_name));
            } else {
                $dateSelectIni->setTimezone(new DateTimeZone($student->timezone));
            }

            // send email
	    $subject = "Your LinguaMeeting session starts in 1 hour!";
	    
            $body = '<div >';
            $body .= "<br>Dear $student->name_user,<br>";
            $body .= "<br><br>Your LinguaMeeting session is starting soon! Your session is on <strong>" . $dateSelectIni->format('h:i A') . " (" . $student->large_name . ")</strong>.";

            if (!empty($student->assignment)) {

                $body .= '<br><br><strong>Before joining your session</strong>, make sure to review the <a href="' . $student->assignment . '"> assignment/conversation guide</a> provided by your instructor.';
            }

            $body .= "<br><br><strong>To join your session</strong>, follow these steps: ";
            $body .= '<br>'
                    . '<ol>'
                    . '<li>Enter your credentials at <a href="' . _URL_LOCATION_LINGUAMEETING . '/login">Linguameeting.com/login</a></li>'
                    . '<li>Click on "View Course"</li>'
                    . '<li>Once you are on the new page, scroll down and select "Join Session"</li>'
                    . '<li>Click the "Join Session" button, which will appear 2 minutes before the session start time</li>'
                    . '</ol>';
            $body .= 'This is a no-reply message. If you need to contact us, please send an email to <a href="mailto:support@linguameeting.com">support@linguameeting.com</a>.';
            $body .= "<br><br>Have no fear, the language coach is here!";

            $body .= '<br><br><img style="float:left;margin-right:20px;margin-top:20px;height:40px;" '
                    . 'src="' . _URL_LOCATION_LINGUAMEETING . 'images/NewLogoLinguaMeeting.png" alt="LinguaMeeting" title="LinguaMeeting">';
            $body .= '</div>';

            //echo $body;

	    $save = new emailsSessionsModel();
	    $save->setId_user_receiver($student->id_user);
	    $save->setEmail_receiver($student->email);
	    $save->setBody_mail($body);
	    $save->setSubject_mail($subject);
	    $save->setDate_send_mes($today->format('Y-m-d H:i:s'));
	    $save->setType_message('sessionStart');
	    $result = $save->add();
            
            
            
            array_push($arrayHoras,$student);


	    if ($result) {

		$log->setType_msg('INFO');
		$log->setMsg('Email saved to Stack . Object: ' . $student->email);
		$log->writeLog();
	    } else {

		$log->setType_msg('ERROR');
		$log->setMsg('Saving email . Object: ' . $student->email);
		$log->writeLog();
	    }

	    
	}
    }
    
}
//echo "<pre>";echo print_r($assignments);echo "</pre>";
//echo "<pre>";echo print_r($arrayHoras);echo "</pre>";


$log->setType_msg('INFO');
$log->setMsg('CRON SESSIONS START EXECUTED');
$log->writeLog();



?>
