<?php

/*
 * Developed by wilowi
 * Executed within 3 days -> 8.30am
 */


ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

require_once '/var/cron/cronlinguameeting/config.php';
//require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';

require_once _URL_CRON.'util.php';
require_once _URL_CRON.'autoload.php';

$today = new DateTime('now');
$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('feedbacks.txt');



// FLEX COURSES
$todayI = new DateTime('now');
$todayI->modify('-1 days');
$todayF = new DateTime('now');
$todayF->modify('-5 days');

$studentsFlex = new studentsCoursesModel();
$where2 = "lm_students_courses.active=1 AND lm_users.active=1 AND lm_users.erased=0 AND lm_students_courses_sessions_new.date_select_end  BETWEEN '" . $todayF->format('Y-m-d') . " 00:00:00' AND '" . $todayI->format('Y-m-d')
	. " 00:00:00' AND lm_students_courses_sessions_new.assigned=1 ORDER BY lm_students_courses_sessions_new.date_select_ini ASC";
//echo $where2;
//$where = "lm_students_courses.active=1 AND lm_users.active=1 AND lm_users.erased=0 AND lm_students_courses_sessions_new.assigned=1 ORDER BY lm_students_courses_sessions_new.date_select_ini DESC"; 
$join = " LEFT JOIN lm_users ON(lm_students_courses.id_user=lm_users.id_user)"
	. " LEFT JOIN lm_students_courses_sessions_new ON(lm_students_courses.enroll_id=lm_students_courses_sessions_new.enroll_id)"
	. " LEFT JOIN lm_courses_new ON(lm_students_courses_sessions_new.course_id=lm_courses_new.course_id)"
	. " LEFT JOIN lm_university ON(lm_courses_new.id_university=lm_university.id_university)"
	. " LEFT JOIN lm_time_zones ON(lm_users.id_zone=lm_time_zones.id_zone)";
$select = " lm_students_courses.*, lm_users.id_user,lm_users.name_user,lm_users.lastname_user, lm_users.created,lm_users.email,"
	. "lm_students_courses_sessions_new.*,"
	. "lm_users.id_user,lm_time_zones.large_name";
$result_students_flex = $studentsFlex->select($where2, '', $select, $join);

//echo "<pre>";echo print_r($result_students_flex);echo "</pre>";
//echo print_r($studentsFlex);



if (!empty($result_students_flex)) {

    $new_students = orderStudentOld($result_students_flex);

    /*echo "<pre>";
    echo print_r($new_students);
    echo "</pre>";*/


    $today->setTimezone(new DateTimeZone('Europe/Madrid'));
    $count_no_feed = 0;
    $count_feed = 0;
    $count_total = 0;
    foreach ($new_students as $student) {

	//echo print_r($student);
	foreach ($student->sessions as $session) {

	    $count_total++;

	    if ($session->assigned == 1) {
                $feedbacks = new studentsFeedbacksModel();

		$update = false;
		$add = false;

		// --- See if exist feedback

		$where = " id_student=$student->id_user AND id_student_course_session=$session->id_studentSession";
		$result_feedback = $feedbacks->select($where);


		if (empty($result_feedback)) {

		    $feedbacks->setId_student($student->id_user);
		    $feedbacks->setId_student_course_session($session->id_studentSession);

		    if ($session->attendance == 1) {

			$feedbacks->setId_puntuality(1);
			$feedbacks->setId_prepared(1);
			$feedbacks->setId_participation(2);
			$feedbacks->setIs_puntual_session(1);
			$add = true;
		    } else if ($session->missed == 1) {
			$feedbacks->setIs_puntual_session(4);
			$add = true;
		    }

		    if ($add) {


			$feedbacks->setObservations('Feedback added by cron task');
			$count_no_feed++;

			$log->setType_msg('INFO');
			$log->setMsg('Feedback  added for user: ' . $student->email . ' and id session: ' . $session->id_studentSession);
			$log->writeLog();

			$result_add = $feedbacks->add();

			if (!$result_add) {
			    $log->setType_msg('ERROR');
			    $log->setMsg('Added feedback for user: ' . $student->email . ' and id session: ' . $session->id_studentSession);
			    $log->writeLog();
			}
		    }
		} else { // update feedback

		    $feedbacks->setId_feedback($result_feedback[0]->id_feedback);

		    if (empty($result_feedback[0]->is_puntual_session)) {

			//echo "es empty";
			//echo print_r($student);
			//echo "no feedback <br>";
			if ($session->attendance == 1) {

			    $feedbacks->setIs_puntual_session(1);
			    $update = true;
			} else if ($session->missed == 1) {

			    $feedbacks->setIs_puntual_session(4);
			    $update = true;
			}
		    }

		    if (empty($result_feedback[0]->id_puntuality) && $session->attendance == 1) {

			$feedbacks->setId_puntuality(1);
			$update = true;
		    }
		    if (empty($result_feedback[0]->id_prepared) && $session->attendance == 1) {

			$feedbacks->setId_prepared(1);
			$update = true;
		    }
		    if (empty($result_feedback[0]->id_participation) && $session->attendance == 1) {

			$feedbacks->setId_participation(2);
			$update = true;
		    }

		    if ($update) {
                        
                        $count_feed++;

			$feedbacks->setObservations($result_feedback[0]->observations . ' - <br>Feedback updated by cron task');
			$result_update = $feedbacks->update();
                        
			if (!$result_update) {
			    $log->setType_msg('ERROR');
			    $log->setMsg('Updated feedback for user: ' . $student->email . ' and id session: ' . $session->id_studentSession);
			    $log->writeLog();
			}

			$log->setType_msg('INFO');
			$log->setMsg('Feedback updated for user: ' . $student->email . ' and id session: ' . $session->id_studentSession);
			$log->writeLog();
		    }
		}
	    } //assigned
	} // each session
    }
}

echo "TOTAL SESSIONS: " . $count_total . "<br>";
echo "NOT FEEDBACKS: " . $count_no_feed . "<br>";
echo "YES FEEDBACKS: " . $count_feed . "<br>";


$log->setType_msg('INFO');
$log->setMsg('CRON FEEDBACKS EXECUTED');
$log->writeLog();


function orderStudentOld($result_student) {

    $newStudent = array();
    $teacher_found = false;

    foreach ($result_student as $student) {

	$id_user = $student->id_user;
	$id_student_session = $student->id_student_session;
	//$days_holidays = explode(',',$student->days_holiday);

	if (empty($newStudent[$id_user])) {

	    $newStudent[$id_user] = new stdClass();
	    $newStudent[$id_user]->sessions = array();
	    $newStudent[$id_user]->feedbacks = array();

	}


	$newStudent[$id_user]->id_user = $id_user;
	$newStudent[$id_user]->name_user = $student->name_user;
	$newStudent[$id_user]->lastname_user = $student->lastname_user;
	$newStudent[$id_user]->id_course = $student->course_id;
	$newStudent[$id_user]->id_section = $student->section_id;
	$newStudent[$id_user]->large_name = $student->large_name;
	$newStudent[$id_user]->email = $student->email;


	if (!empty($id_student_session)) {


	    if (empty($newStudent[$id_user]->sessions[$id_student_session])) {

		$newStudent[$id_user]->sessions[$id_student_session] = new stdClass();
	    }

	    $newStudent[$id_user]->sessions[$id_student_session]->id_course = $student->course_id;
	    $newStudent[$id_user]->sessions[$id_student_session]->id_coach = $student->id_coach;
	    $newStudent[$id_user]->sessions[$id_student_session]->attendance = $student->attendance;
	    $newStudent[$id_user]->sessions[$id_student_session]->missed = $student->missed;
	    $newStudent[$id_user]->sessions[$id_student_session]->past = $student->past;
	    $newStudent[$id_user]->sessions[$id_student_session]->from_makeup = $student->from_makeup;
	    $newStudent[$id_user]->sessions[$id_student_session]->from_extra = $student->from_extra;
	    $newStudent[$id_user]->sessions[$id_student_session]->id_recording = $student->id_recording;
	    $newStudent[$id_user]->sessions[$id_student_session]->date_select_ini = $student->date_select_ini;
	    $newStudent[$id_user]->sessions[$id_student_session]->date_select_end = $student->date_select_end;
	    $newStudent[$id_user]->sessions[$id_student_session]->assigned = $student->assigned;
	    $newStudent[$id_user]->sessions[$id_student_session]->id_studentSession = $id_student_session;

	}

    }

    //echo print_r($newStudent);
    return $newStudent;
}

?>
