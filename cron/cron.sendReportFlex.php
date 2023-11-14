<?php

/*
 * Developed by wilowi
 */

set_time_limit(400);
ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);

//echo "antes de require";
require_once _URL_CRON.'config.php';
require_once _URL_CRON.'util.php';
require_once _URL_CRON.'autoload.php';
$dir_file = '/var/cron/cronlinguameeting/reports/attendance_flex/';
/*require_once $server['DOCUMENT_ROOT'] . '/cronlinguameeting/util.php';
require_once $server['DOCUMENT_ROOT'] . '/cronlinguameeting/config.php';
require_once $server['DOCUMENT_ROOT'] . '/cronlinguameeting/autoload.php';
$dir_file = $server['DOCUMENT_ROOT'] . '/cronlinguameeting/reports/attendance_flex/';*/


//echo "despues de require";
$today = new DateTime('now');
$todayAux = new DateTime($today->format('Y-m-d'));

$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('sendReportFlex.txt');

//echo "DESPUES LOGS";
$panel = new panelController();

$instructors = new coursesFlexModel();
$where = "(lm_users.rol=4 OR lm_users.rol=5) AND lm_users.active=1 AND lm_users.erased=0 AND lm_courses_flex.closed=0 AND (lm_courses_flex.date_end_course >= '" . $today->format('Y-m-d') . " 00:00:00' OR lm_courses_flex.date_end_course is NULL) ORDER BY lm_courses_flex.date_ini_course";

$join = " LEFT JOIN lm_university USING(id_university)"
	. " LEFT JOIN lm_coaching_form_flex ON(lm_courses_flex.id_university=lm_coaching_form_flex.id_university)"
	. " LEFT JOIN lm_courses_sections_flex ON(lm_courses_flex.id_course=lm_courses_sections_flex.id_course)"
	. " LEFT JOIN lm_university_teachers ON(lm_courses_sections_flex.id_teacher=lm_university_teachers.id_user)"
	. " LEFT JOIN lm_users ON(lm_university_teachers.id_user=lm_users.id_user)";
$select = "lm_users.id_user,lm_users.name_user,lm_users.lastname_user,lm_users.email,lm_users.rol,lm_users.emailsReception,"
	. "lm_coaching_form_flex.id_form_flex,lm_university_teachers.id_university,lm_university.name_university,"
	. "lm_courses_flex.*,"
	. "lm_courses_sections_flex.id_course_section,lm_courses_sections_flex.id_teacher,lm_courses_sections_flex.name_section";

$result_inst = $instructors->select($where, '', $select, $join);

//echo "<pre>";echo print_r($result_inst);echo "</pre>";

//--- First order the instructor with the courses.
$new_instructors = array();

foreach ($result_inst as $key => $value) {

    $id_user = $value->id_user;
    $id_university = $value->id_university;
    $id_course = $value->id_course;
    $id_section = $value->id_course_section;
    $rol = $value->rol;
    $id_week = $value->id_course_week;
    $no_insert = false;

    if(!empty($value->date_end_course)){
	$endDateForm = new DateTime($value->date_end_course);
    }

    if ( $endDateForm >= $todayAux || empty($value->date_end_course) ) {

	//Get options for send report.
	$options_teacher = new teacherOptionsModel();
	$where_op_t = "id_teacher=" . $id_user . " AND id_section=" . $id_section . " AND is_flex=1";
	$result_op_t = $options_teacher->select($where_op_t);

	$sendThisReport = false;
	if ((!empty($result_op_t[0]) && $result_op_t[0]->sendReportWeek == 1) || empty($result_op_t)) {
	    $sendThisReport = true;
	}

	if (empty($value->emailsReception)) {

	    $sendThisReport = false;
	}

	if (!empty($id_user)) {

	    if (empty($new_instructors[$id_user])) {

		$new_instructors[$id_user] = new stdClass();
		$new_instructors[$id_user]->universities = array();
	    }

	    $new_instructors[$id_user]->name_user = $value->name_user;
	    $new_instructors[$id_user]->lastname_user = $value->lastname_user;
	    $new_instructors[$id_user]->email = $value->email;
	    $new_instructors[$id_user]->id_user = $value->id_user;

	    if (!empty($id_university)) {

		if (empty($new_instructors[$id_user]->universities[$id_university])) {

		    $new_instructors[$id_user]->universities[$id_university] = new stdClass();
		    $new_instructors[$id_user]->universities[$id_university]->courses = array();
		}

		$new_instructors[$id_user]->universities[$id_university]->name_university = $value->name_university;

		//if ($rol == 4 || ($rol == 5 && $id_user == $value->id_teacher)) {
		if (($rol == 4 && $sendThisReport) || ($id_user == $value->id_teacher && $sendThisReport)) { // changed 23/02/2019
		    //if ( $id_user == $value->id_teacher ) {	// changed 23/02/2019
		    if (!empty($id_course)) {

			if ($rol == 4) {
			    $courses_coor = new coursesCoordinatorsModel();
			    $where = "id_coor=$id_user AND id_course=$id_course AND see_course=0";
			    $result_coor = $courses_coor->select($where);
			    if (!empty($result_coor)) {
				$no_insert = true;
			    }
			}

			if (!$no_insert) {

			    if (empty($new_instructors[$id_user]->universities[$id_university]->courses[$id_course])) {

				$new_instructors[$id_user]->universities[$id_university]->courses[$id_course] = new stdClass();
				$new_instructors[$id_user]->universities[$id_university]->courses[$id_course]->sections = array();
			    }

			    $new_instructors[$id_user]->universities[$id_university]->courses[$id_course]->name_course = $value->name_course;
			    $new_instructors[$id_user]->universities[$id_university]->courses[$id_course]->id_course = $id_course;

			    if (!empty($id_section)) {

				if (empty($new_instructors[$id_user]->universities[$id_university]->courses[$id_course]->sections[$id_section])) {

				    $new_instructors[$id_user]->universities[$id_university]->courses[$id_course]->sections[$id_section] = new stdClass();
				}

				$new_instructors[$id_user]->universities[$id_university]->courses[$id_course]->sections[$id_section]->name_section = $value->name_section;
				$new_instructors[$id_user]->universities[$id_university]->courses[$id_course]->sections[$id_section]->id_section = $id_section;
			    }
			}
		    }
		}// end if rol.
	    }
	}// end if user
    }
}
//echo "<pre>";echo print_r($new_instructors);echo "</pre>";
//echo print_r($new_instructors);

/* $log->setType_msg('INFO');
  $log->setMsg('array: ' . json_encode($new_instructors));
  $log->writeLog();
  return true; */

// --- Search the data sections and create the report.
foreach ($new_instructors as $user) {

    // --- Universities.
    foreach ($user->universities as $university) {

	foreach ($university->courses as $course) {

	    $id_course = $course->id_course;

	    foreach ($course->sections as $section) {

		$id_section = $section->id_section;

		$students = new courseStudentsFlexModel();
		$where = "lm_course_students_flex.id_course=$id_course AND lm_course_students_flex.id_section=$id_section AND lm_users.active=1 AND lm_users.erased=0"
			. " ORDER BY lm_users.lastname_user ASC,CASE WHEN lm_students_flex_course_sessions.date_select_ini IS NULL THEN 1 ELSE 0 END, lm_students_flex_course_sessions.date_select_ini";
		$join = " LEFT JOIN lm_users ON(lm_course_students_flex.id_student=lm_users.id_user)"
			. " LEFT JOIN lm_students_options ON(lm_course_students_flex.id_student=lm_students_options.id_user)"
			. " LEFT JOIN lm_students_flex_course_sessions ON(lm_course_students_flex.id_student=lm_students_flex_course_sessions.id_user)"
			. " LEFT JOIN lm_students_feedbacks_flex ON(lm_course_students_flex.id_student=lm_students_feedbacks_flex.id_student AND lm_students_flex_course_sessions.id_student_session=lm_students_feedbacks_flex.id_student_course_session)"
			. " LEFT JOIN lm_time_zones ON(lm_users.id_zone=lm_time_zones.id_zone)"
			. " LEFT JOIN lm_courses_sections_flex ON(lm_course_students_flex.id_course=lm_courses_sections_flex.id_course)"
			. " LEFT JOIN lm_zoom_recordings ON(lm_students_flex_course_sessions.id_recording=lm_zoom_recordings.id_recording)";
		$select = " lm_course_students_flex.*, lm_users.id_user,lm_users.name_user,lm_users.lastname_user, lm_users.created,lm_users.email,"
			. " lm_students_options.make_up,lm_students_options.extra_session,lm_students_options.total_make_up,lm_students_options.total_extra_session,"
			. " lm_students_feedbacks_flex.id_feedback,lm_students_feedbacks_flex.id_student_course_session,lm_students_feedbacks_flex.id_puntuality,lm_students_feedbacks_flex.id_prepared,"
			. "lm_students_feedbacks_flex.id_participation,lm_students_feedbacks_flex.is_puntual_session,"
			. "lm_students_flex_course_sessions.date_select_ini,lm_students_flex_course_sessions.date_select_end,lm_students_flex_course_sessions.attendance,"
			. "lm_students_flex_course_sessions.from_makeup,lm_students_flex_course_sessions.from_extra,lm_students_flex_course_sessions.missed,"
			. "lm_students_flex_course_sessions.id_student_session,lm_students_flex_course_sessions.id_recording,lm_students_flex_course_sessions.id_coach,"
			. "lm_students_flex_course_sessions.assigned,"
			. "lm_zoom_recordings.id_recording,lm_zoom_recordings.play_url,lm_zoom_recordings.download_url,"
			. "lm_students_flex_course_sessions.id_course as id_course_old,"
			. "lm_time_zones.large_name,lm_courses_sections_flex.see_recording_students";
		$result_students = $students->select($where, '', $select, $join);

		//echo print_r($students);
		//echo print_r($result_students);
		
		if (count($result_students) > 0) {

		    $new_students_aux = array();
		    foreach ($result_students as $keyNew => $stu_aux) {

			if ($stu_aux->id_course_old == $id_course) {
			    array_push($new_students_aux, $stu_aux);
			}
		    }

		    $new_students = $panel->orderReportCronFlex($new_students_aux);		    

		    $courseFlex = new coursesFlexModel();
		    $where_course = "lm_courses_flex.id_course=$id_course AND lm_courses_sections_flex.id_course_section=$id_section ORDER BY lm_users.lastname_user ASC";
		    $join_course = " LEFT JOIN lm_university USING(id_university)"
			    . " LEFT JOIN lm_courses_sections_flex USING(id_course)"
			    . " LEFT JOIN lm_users ON(lm_users.id_user=lm_courses_sections_flex.id_teacher)"
			    . " LEFT JOIN lm_time_zones ON(lm_users.id_zone=lm_time_zones.id_zone)"
			    . " LEFT JOIN lm_course_type ON(lm_courses_flex.id_type_course=lm_course_type.id_type_course)";
		    $select_course = "lm_courses_flex.name_course,lm_courses_flex.date_ini_course,lm_university.name_university,lm_users.name_user,lm_university.id_university,"
			    . "lm_courses_sections_flex.id_teacher,lm_courses_sections_flex.name_section,lm_courses_sections_flex.id_course_section,"
			    . "lm_time_zones.large_name,lm_users.lastname_user,lm_course_type.sessions_type_course,lm_courses_flex.id_course";
		    $result_university = $courseFlex->select($where_course, '', $select_course, $join_course);

		    $new_university = $panel->orderUniversityCronFlex($result_university);
		    $data_university = reset($new_university);
		    
		    $pdf = generateReportInstructorFlex($new_students, $data_university);

		    chown($dir_file . $pdf, 'apache');
		    chgrp($dir_file . $pdf, 'apache');

		    // send Mail
		    $subject = "LinguaMeeting Report Attendance Flex. $university->name_university - Course: $course->name_course";
		    $body = "Dear $user->lastname_user, $user->name_user: <br><br>";
		    $body .= "You can find attached the weekly report for: <br><br>"
			    . "<strong>University:</strong> $university->name_university<br>"
			    . "<strong>Course:</strong> $course->name_course<br>"
			    . "<strong>Section:</strong> $section->name_section<br>";
		    $body .= '<br><br><img style="float:left;margin-right:20px;margin-top:20px;height:40px;width:180px;" '
			    . 'src="'._URL_LOCATION_LINGUAMEETING.'images/logo.png" alt="LinguaMeeting" title="LinguaMeeting">';

		    $body .= '<br><br> <p>If you wish to contact us, please do not reply to this message but instead contact support: <a href="mailto:support@linguameeting.com">support@linguameeting.com</a></p>';
		    
		    //$addresses = array();
		    //array_push($addresses, $user->email);
		    //array_push($addresses, 'sandritascs@gmail.com');
		    //$attach = array();
		    //array_push($attach, $dir_file . $pdf);
		    $save = new emailsModel();
		    $save->setId_user_receiver($user->id_user);
		    $save->setEmail_receiver($user->email);
		    $save->setBody_mail($body);
		    $save->setSubject_mail($subject);
		    $save->setAttach($dir_file . $pdf);
		    $save->setDate_send_mes($today->format('Y-m-d H:i:s'));
		    $save->setType_message('sendReport');
		    $result = $save->add();

		    $log->setType_msg('INFO');
		    $log->setMsg('Report Flex save to stack: ' . json_encode($user->email) . ' - Attached: ' . json_encode($dir_file . $pdf));
		    $log->writeLog();

		    //sendMail($addresses, $subject, $body, $attach);
		} // end count students
	    }
	} // end foreach course
    }// end foreach university
} // end foreach user


$log->setType_msg('INFO');
$log->setMsg('CRON SEND REPORT FLEX EXECUTED');
$log->writeLog();

function generateReportInstructorFlex($students, $dataUniversity) {

    $dir_file = '/var/cron/cronlinguameeting/reports/attendance_flex/';
    $dir_princ = '/var/cron/cronlinguameeting/';
    /*$server = filter_input_array(INPUT_SERVER);
    $dir_file = $server['DOCUMENT_ROOT'] . '/cronlinguameeting/reports/attendance_flex/';
    $dir_princ = $server['DOCUMENT_ROOT'] . '/cronlinguameeting/';*/
    
    $today = new DateTime('now', new DateTimeZone($dataUniversity->timezone));
    $start_coaching = new DateTime($dataUniversity->date_ini_course, new DateTimeZone($dataUniversity->timezone));
    //$end_coaching = end($dataUniversity->weeks);
    // --- Puntuality
    $puntuality = new puntualityModel();
    $result_puntuality = $puntuality->select();

    // --- Prepared class
    $prepared = new preparedClassModel();
    $result_prepared = $prepared->select();

    // --- Participation
    $participation = new participationModel();
    $result_participation = $participation->select();

    $pdf = new PDF('P', 'mm', 'A4');

    $pdf->SetMargins(10, 5, 10); // before add page
    $pdf->AddPage();
    $pdf->SetFont('Helvetica', '', 12);
    $pdf->SetFillColor(224, 224, 224);
    $pdf->Rect(0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight(), 'F');

    //--- Drawing header

    $pdf->Image($dir_princ . "images/panel/lingua-logo_report.jpg", 50, 5, 110);
    $pdf->Image($dir_princ . "images/panel/cabecera_bg.jpg", 2, 30, 205);
    //$pdf->SetTextColor(0, 0, 0);
    //$pdf->SetX(10);
    $pdf->Text(33, 41, utf8_decode($dataUniversity->name_university));
    $pdf->Text(33, 48, utf8_decode($dataUniversity->name_instructor));
    $pdf->Text(40, 56, utf8_decode($dataUniversity->name_course));
    $pdf->Text(43, 62, utf8_decode($dataUniversity->name_section));
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Text(142, 41, 'Course start: ' . $start_coaching->format('d M Y'));
    //$pdf->Text(142, 47, 'Coaching end: ' . $end_coaching->date_end);
    $pdf->Text(142, 62, 'Report date: ' . $today->format('d M Y'));
    $pdf->SetTextColor(0);

    // --------------
    // --- Summary table
    $pdf->Image($dir_princ . "images/panel/cabcera_tabla_resumen.jpg", 33, 75, 140);

    $cont_x = 33;
    $cont_color = 1;
    $cont_y = 97;
    $cont_users = 1;
    $pdf->SetFont('Helvetica', '', 11);
    $no_enter = false;
    $total_students = count($students);
    $total_attendance = 0;

    foreach ($students as $student) {

	$student->lastname_user = str_replace('&#39;', "'", $student->lastname_user);
	$student->name_user = str_replace('&#39;', "'", $student->name_user);

	$name_student = utf8_decode($student->name_user) . ', ' . utf8_decode($student->lastname_user);
	//$attendance = $student->count_attendance . '/' . $dataUniversity->sessions_course;
	$attendance = $student->count_attendance_report . '/' . $dataUniversity->sessions_course;
	//$percentage = round($student->count_attendance_report * 100 / $dataUniversity->sessions_course, 2) . ' %';

	if ($cont_users > 35 && !$no_enter) {

	    $pdf->SetMargins(10, 5, 10); // before add page
	    $pdf->AddPage();
	    $pdf->SetFillColor(224, 224, 224);
	    $pdf->Rect(0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight(), 'F');
	    $cont_y = 10;
	    $no_enter = true;
	}

	if ($cont_color % 2 == 0) {
	    $pdf->SetFillColor(245, 245, 245);
	} else {
	    $pdf->SetFillColor(235, 235, 235);
	}

	$pdf->SetY($cont_y);
	$pdf->SetX($cont_x);
	$pdf->Cell(73, 5, $name_student, 0, 0, 'C', true);
	$pdf->SetX($cont_x + 73);
	$pdf->Cell(68, 5, $attendance, 0, 0, 'C', true);
	$cont_y = $cont_y + 5;
	$cont_color++;
	$cont_users++;


	$total_attendance = $total_attendance + $student->count_attendance_report;
    }

    //$average = round($total_attendance / $total_students * 100 / $dataUniversity->sessions_course) . ' %';
    //$average = round( ($total_attendance / ($total_students*$dataUniversity->sessions_course) ) *100) . ' %'; // Changed 25022019
    reset($students);

    // --- Rubric
    $pdf->SetMargins(10, 5, 10); // before add page
    $pdf->AddPage();
    $pdf->SetFont('Helvetica', '', 12);
    $pdf->SetFillColor(224, 224, 224);
    $pdf->Rect(0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight(), 'F');

    //--- Drawing header		
    $pdf->Image($dir_princ . "images/panel/lingua-logo_report.jpg", 50, 5, 110);
    $pdf->Image($dir_princ . "images/panel/cabecera_bg.jpg", 2, 30, 205);
    //$pdf->SetTextColor(0, 0, 0);
    //$pdf->SetX(10);
    $pdf->Text(33, 41, utf8_decode($dataUniversity->name_university));
    $pdf->Text(33, 48, utf8_decode($dataUniversity->name_instructor));
    $pdf->Text(40, 56, utf8_decode($dataUniversity->name_course));
    $pdf->Text(43, 62, utf8_decode($dataUniversity->name_section));
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Text(142, 41, 'Coaching start: ' . $start_coaching->format('d M Y'));
    //$pdf->Text(142, 47, 'Coaching end: ' . $end_coaching->date_end);
    $pdf->Text(142, 62, 'Report date: ' . $today->format('d M Y'));
    $pdf->SetTextColor(0);
    // ---

    $pdf->Image($dir_princ . "images/panel/Rubric.png", 15, 90, 180);

    // --- Page for each student.		
    foreach ($students as $student) {

	$student->lastname_user = str_replace('&#39;', "'", $student->lastname_user);
	$student->name_user = str_replace('&#39;', "'", $student->name_user);

	$name_student = utf8_decode($student->name_user) . ', ' . utf8_decode($student->lastname_user);
	$attendance = $student->count_attendance_report . '/' . $dataUniversity->sessions_course;
	//$percentage = round($student->count_attendance_report * 100 / $dataUniversity->sessions_course, 2) . ' %';

	$pdf->SetMargins(10, 5, 10); // before add page
	$pdf->AddPage();
	$pdf->SetFont('Helvetica', '', 12);
	$pdf->SetFillColor(224, 224, 224);
	$pdf->Rect(0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight(), 'F');

	//--- Drawing header		
	$pdf->Image($dir_princ . "images/panel/lingua-logo_report.jpg", 50, 5, 110);
	$pdf->Image($dir_princ . "images/panel/cabecera_bg.jpg", 2, 30, 205);
	//$pdf->SetTextColor(0, 0, 0);
	//$pdf->SetX(10);
	$pdf->Text(33, 41, utf8_decode($dataUniversity->name_university));
	$pdf->Text(33, 48, utf8_decode($dataUniversity->name_instructor));
	$pdf->Text(40, 56, utf8_decode($dataUniversity->name_course));
	$pdf->Text(43, 62, utf8_decode($dataUniversity->name_section));
	$pdf->SetTextColor(255, 255, 255);
	$pdf->Text(142, 41, 'Coaching start: ' . $start_coaching->format('d M Y'));
	//$pdf->Text(142, 47, 'Coaching end: ' . $end_coaching->date_end);
	$pdf->Text(142, 62, 'Report date: ' . $today->format('d M Y'));
	$pdf->SetTextColor(0);
	// ---

	$pdf->Image($dir_princ . "images/panel/marco_alumno_blanco.jpg", 0, 66, 212, 230);
	$pdf->Image($dir_princ . "images/panel/marco_alumno_resalte_blanco.jpg", 85, 75, 115);
	$pdf->SetFont('', 'B');
	$pdf->Text(10, 85, 'Student:');
	$pdf->SetFont('', '');
	$pdf->Text(28, 85, $name_student);
	$pdf->SetFont('', 'B');
	$pdf->Text(10, 91, 'Attendance:');
	$pdf->SetFont('', '');
	$pdf->Text(35, 91, $attendance);

	$pdf->SetFont('Helvetica', '', 14);
	$pdf->Text(110, 89, 'Comparative attendance');
	$pdf->SetFont('Helvetica', '', 12);
	$pdf->Text(100, 100, 'Attendance:');
	$pdf->Text(125, 100, $attendance);
	//$pdf->Text(100, 110, 'Percentage:');
	//$pdf->Text(125, 110, $percentage);
	//$pdf->Text(100, 120, 'Class average:');
	//$pdf->Text(130, 120, $average);
	// --- Feedbacks header
	$pdf->SetFont('Helvetica', '', 14);
	$pdf->SetFont('', 'B');
	$pdf->Text(100, 145, 'Coach feedbacks');
	$pdf->SetFont('Helvetica', '', 12);
	$pdf->SetFont('', '');

	$pdf->SetFont('Helvetica', '', 10);
	if (count($student->feedbacks) > 0) {
	    $pdf->SetTextColor(255, 255, 255);
	    $pdf->SetFillColor(87, 158, 138);
	    $pdf->Rect(44, 150, 20, 13, 'F');
	    $pdf->SetFillColor(18, 107, 112);
	    $pdf->Rect(65, 150, 46, 13, 'F');
	    $pdf->SetFillColor(18, 107, 112);
	    $pdf->Rect(112, 150, 46, 13, 'F');
	    $pdf->SetFillColor(18, 107, 112);
	    $pdf->Rect(159, 150, 46, 13, 'F');

	    $pdf->Text(49, 158, 'DATE');
	    $pdf->Text(76, 158, 'PUNCTUALITY');
	    $pdf->Text(116, 158, 'PREPARED FOR CLASS');
	    $pdf->Text(169, 158, 'PARTICIPATION');

	    $pdf->SetTextColor(0);
	} else {

	    //There is no coach feedback
	    $pdf->SetFont('Helvetica', '', 16);
	    $pdf->Text(90, 155, 'There is no coach feedback');
	    $pdf->SetFont('Helvetica', '', 12);
	}


	$cont_row = 98;
	$cont_row_make = 101;
	$cont_img = 94;

	$pdf->SetFont('Helvetica', '', 11);
	$cont_sessions = 1;
	foreach ($student->sessions as $week) {

	    foreach ($student->feedbacks as $key_f => $feedback) {

		if ($feedback->id_student_course_session == $week->id_studentSession) {

		    $student->feedbacks[$key_f]->date_show = $week->day_week_session_select;
		}
	    }

	    //if (empty($week->from_makeup) && empty($week->from_extra)) {

	    if (empty($week->assigned)) {

		$pdf->Text(12, $cont_row, 'Session ' . $cont_sessions);
	    } else {

		$date_show = new DateTime($week->day_week_session_select);
		$pdf->Text(12, $cont_row, $date_show->format('d M Y'));
	    }



	    if ($week->from_makeup) {

		$pdf->SetFont('Helvetica', '', 8);
		$pdf->SetTextColor(163, 217, 130);
		$pdf->Text(12, $cont_row_make, '(make-up)');
		$pdf->SetTextColor(0);
		$pdf->SetFont('Helvetica', '', 11);
	    } else if ($week->from_extra) {

		$pdf->SetFont('Helvetica', '', 8);
		$pdf->SetTextColor(163, 217, 130);
		$pdf->Text(12, $cont_row_make, '(extra session)');
		$pdf->SetTextColor(0);
		$pdf->SetFont('Helvetica', '', 11);
	    }

	    if (!empty($week->attendance)) {

		$pdf->Image($dir_princ . "images/panel/circle_attendance.png", 35, $cont_img, 4);
	    } else if (!empty($week->missed)) {

		$pdf->Image($dir_princ . "images/panel/cross_attendance.png", 35, $cont_img, 4);
	    } else if (empty($week->assigned)) {

		$pdf->Image($dir_princ . "images/panel/circle_none.png", 35, $cont_img, 4);
	    }

	    $cont_row = $cont_row + 9;
	    $cont_img = $cont_img + 9;
	    $cont_row_make = $cont_row_make + 9;
	    //}

	    $cont_sessions++;
	} // end foreach weeks
	$pdf->SetFont('Helvetica', '', 12);

	$cont_rect = 165;
	$cont_rect_text = 171;
	$count_feedbacks = 1;
	$count_aux = 150;
	$no_enter_feed = false;

	//echo print_r($student->feedbacks);
	sort($student->feedbacks);
	foreach ($student->feedbacks as $feedback) {

	    if ($feedback->is_puntual_session != 4) { //changed 13032018. Trello task
		$date_show = new DateTime($feedback->date_show);

		if ($count_feedbacks > 10 && !$no_enter_feed) {

		    $pdf->SetMargins(10, 5, 10); // before add page
		    $pdf->AddPage();
		    $pdf->SetFillColor(224, 224, 224);
		    $pdf->Rect(0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight(), 'F');
		    $pdf->Image($dir_princ . "images/panel/marco_alumno_blanco.jpg", 0, 0, 212, 297);
		    $cont_rect = 20;
		    $cont_rect_text = 26;
		    $no_enter_feed = true;
		}
		if (!empty($feedback->id_puntuality)) {

		    $pdf->SetFont('Helvetica', '', 8);
		    $pdf->SetFillColor(232, 232, 232);
		    $pdf->Rect(44, $cont_rect, 20, 10, 'F');
		    $pdf->Text(46, $cont_rect_text, $date_show->format('d M Y'));

		    if ($feedback->id_puntuality == 1) {

			$pdf->SetFillColor(163, 217, 130);
		    } else if ($feedback->id_puntuality == 2) {

			$pdf->SetFillColor(230, 189, 87);
		    } else {
			$pdf->SetFillColor(249, 107, 103);
		    }
		    $pdf->Rect(65, $cont_rect, 46, 10, 'F');
		    foreach ($result_puntuality as $punt) {

			if ($punt->id_puntuality == $feedback->id_puntuality) {

			    $pdf->Text(68, $cont_rect_text, $punt->text_puntuality_report);
			}
		    }


		    if ($feedback->id_prepared == 1) {

			$pdf->SetFillColor(163, 217, 130);
		    } else if ($feedback->id_prepared == 2) {

			$pdf->SetFillColor(230, 189, 87);
		    } else {
			$pdf->SetFillColor(249, 107, 103);
		    }
		    $pdf->Rect(112, $cont_rect, 46, 10, 'F');
		    foreach ($result_prepared as $prep) {

			if ($prep->id_prepared == $feedback->id_prepared) {
			    $pdf->Text(115, $cont_rect_text, $prep->text_prepared_report);
			}
		    }


		    if ($feedback->id_participation == 1) {

			$pdf->SetFillColor(163, 217, 130);
		    } else if ($feedback->id_participation == 2) {

			$pdf->SetFillColor(230, 189, 87);
		    } else {
			$pdf->SetFillColor(249, 107, 103);
		    }
		    $pdf->Rect(159, $cont_rect, 46, 10, 'F');

		    foreach ($result_participation as $part) {

			if ($part->id_participation == $feedback->id_participation) {
			    $pdf->Text(162, $cont_rect_text, $part->text_participation_report);
			}
		    }


		    //$pdf->Text($count_aux, $cont_rect_text, $date_show->format('d M Y'));
		    $cont_rect += 12;
		    $cont_rect_text += 12;
		    $count_aux += 12;
		    $count_feedbacks++;
		}
	    }
	}
    }


    // --- Generar reporte
    $name_file = 'FlexReport_' . $dataUniversity->id_course . '_' . $dataUniversity->id_course_section . '.pdf';
    $name_file = str_replace(':', '_', $name_file);
    $name_file = str_replace('/', '_', $name_file);
    $name_file = str_replace('>', '_', $name_file);
    $name_file = str_replace('<', '_', $name_file);
    $name_file = str_replace('"', '_', $name_file);

    $pdf->Output($dir_file . $name_file, 'F');

    return $name_file;
}

?>
