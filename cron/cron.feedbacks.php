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

$studentsFlex = new enrollmentSessionModel();
$where2 = " CONCAT(enrollment_session.day, ' ', enrollment_session.start_time) >= '2023-11-01'"  /* " . $todayF->format('Y-m-d') . " */
	. " AND enrollment.active = 1";
$join =   " LEFT JOIN enrollment ON (enrollment_session.enrollment_id = enrollment.id) "
	. " LEFT JOIN session ON enrollment_session.session_id = session.id "
	. " LEFT JOIN user ON enrollment.student_id = user.id "
	. " LEFT JOIN timezone ON user.timezone_id = timezone.id ";
$select = " enrollment.section_id, user.id AS id_user, user.name AS name_user, user.lastname AS lastname_user, "
	. " user.created_at AS created, user.email, session.course_id, session.coach_id AS id_coach, enrollment_session.*, timezone.name AS large_name, "
	. " CONCAT(enrollment_session.day, ' ', enrollment_session.start_time) AS date_select_ini, "
	. " CONCAT(enrollment_session.day, ' ', enrollment_session.end_time) AS date_select_end ";
$result_students_flex = $studentsFlex->select($where2, '', $select, $join);

if (!empty($result_students_flex)) {
	$new_students = orderStudentOld($result_students_flex);
	$today->setTimezone(new DateTimeZone('Europe/Madrid'));
	$count_no_feed = 0;
	$count_feed = 0;
	$count_total = 0;

	foreach ($new_students as $student) {
		foreach ($student->sessions as $session) {

			$count_total++;

			$feedbacks = new studentsFeedbacksModel();
			$update = false;
			$add = false;

			$where = " enrollment_session_id = $session->id_studentSession";
			$result_feedback = $feedbacks->select($where);

			if (empty($result_feedback)) {

				$feedbacks->setEnrollment_session_id($session->id_studentSession);

				if ($session->id_session_status == 2) {
					$feedbacks->setPuntuality_type_id(1);
					$feedbacks->setPrepared_class_type_id(1);
					$feedbacks->setParticipation_type_id(2);
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
			} else {
				$feedbacks->setId($result_feedback[0]->id);

				if (empty($result_feedback[0]->puntuality_type_id) && $session->id_session_status == 2) {
					$feedbacks->setPuntuality_type_id(1);
					$update = true;
				}
				
				if (empty($result_feedback[0]->prepared_class_type_id) && $session->id_session_status == 2) {
					$feedbacks->setPrepared_class_type_id(1);
					$update = true;
				}

				if (empty($result_feedback[0]->participation_type_id) && $session->id_session_status == 2) {
					$feedbacks->setParticipation_type_id(2);
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
		}
	}
}

echo "TOTAL SESSIONS: " . $count_total . "<br>";
echo "NOT FEEDBACKS: " . $count_no_feed . "<br>";
echo "YES FEEDBACKS: " . $count_feed . "<br>";

$log->setType_msg('INFO');
$log->setMsg('CRON FEEDBACKS EXECUTED');
$log->writeLog();

function orderStudentOld($result_student)
{
	$newStudent = array();
	//$teacher_found = false;

	foreach ($result_student as $student) {

		$id_user = $student->id_user;
		$id_student_session = $student->id;

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
			$newStudent[$id_user]->sessions[$id_student_session]->id_session_status = $student->session_status_id;
			$newStudent[$id_user]->sessions[$id_student_session]->id_makeup = $student->makeup_id;
			//$newStudent[$id_user]->sessions[$id_student_session]->id_recording = $student->id_recording;
			$newStudent[$id_user]->sessions[$id_student_session]->date_select_ini = $student->date_select_ini;
			$newStudent[$id_user]->sessions[$id_student_session]->date_select_end = $student->date_select_end;
			//$newStudent[$id_user]->sessions[$id_student_session]->assigned = $student->assigned;
			$newStudent[$id_user]->sessions[$id_student_session]->id_studentSession = $id_student_session;
		}
	}

	return $newStudent;
}
