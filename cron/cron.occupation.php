<?php

/*
 * Developed by wilowi
 */

set_time_limit(400);
ini_set('display_errors', 0);
date_default_timezone_set('Europe/Madrid');

$server = filter_input_array(INPUT_SERVER);
$today = new DateTime('now');


require_once _URL_CRON.'util.php';
require_once _URL_CRON.'config.php';
require_once _URL_CRON.'autoload.php';
/* require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/util.php';
  require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/config.php';
  require_once $server['DOCUMENT_ROOT'].'/cronlinguameeting/autoload.php'; */


$log = new logsModel();
$log->setFolder('cron/');
$log->setFile_name('occupation.txt');

$courses = new courseModel();
$as = '';
$join = ' LEFT JOIN lm_coaching_form USING(id_form) ';
$select = 'lm_courses.*,lm_coaching_form.*';
//$where = "lm_coaching_form.start_date>='".$today->format('Y-m-d')."' AND lm_coaching_form.end_date > '" . $today->format('Y-m-d')."'";
$where = "lm_coaching_form.end_date > '" . $today->format('Y-m-d') . "'";

$result_courses = $courses->select($where, $as, $select, $join);

//echo print_r(count($result_courses));

foreach ($result_courses as $key => $course) {

    //echo print_r($course);

    $weeks = new coursesWeeksModel();
    $where_week = "id_course = $course->id_course ORDER BY date_start";
    $result_weeks = $weeks->select($where_week);

    //echo print_r($result_weeks);

    $start_week = new DateTime($result_weeks[0]->date_start);

    $start_week_before = new DateTime($result_weeks[0]->date_start);
    $start_week_more = new DateTime($result_weeks[0]->date_start);
    $start_week_before->modify('-1 week');
    $start_week_more->modify('+1 week');

    if ($today >= $start_week_before && $today < $start_week) { // send notification week before coaching.
	getStudents($course->id_course, 'BEFORE');
    }


    if ($today >= $start_week && $today < $start_week_more) { // send notification same week coaching.
	getStudents($course->id_course, 'SAME');
    }
}

function getStudents($id_course, $type) {

    $log = new logsModel();
    $log->setFolder('cron/');
    $log->setFile_name('occupation.txt');

    $estimated_students = 0;
    $total_students = 0;

    //echo $type."<br>";
    // --- stimated students.
    $sections = new coursesSectionModel();
    $where_st2 = " lm_courses_sections.id_course=$id_course";
    $join_st2 = " LEFT JOIN lm_users ON(lm_courses_sections.id_teacher=lm_users.id_user)"
	    . " LEFT JOIN lm_courses ON(lm_courses_sections.id_course=lm_courses.id_course)";
    $result_sections = $sections->select($where_st2, '', 'lm_courses_sections.*,lm_users.*,lm_courses.name_course', $join_st2);

    foreach ($result_sections as $section) {
	//echo print_r($section);
	$send_notif_warning = false;
	$send_notif_danger = false;
	$text = '';

	$estimated_students = $section->students_section;

	$students_course = new courseStudentsModel();
	$where_st = " id_course=$id_course AND id_section=$section->id_course_section AND lm_users.erased=0";
	$join = " LEFT JOIN lm_users ON(lm_course_students.id_student=lm_users.id_user)";
	$select = "lm_course_students.*,lm_users.erased";
	$result_students = $students_course->select($where_st, '', $select, $join);

	$total_students = count($result_students);

	//echo "section: $section->name_section <br>";
	//echo "ESTIMATED: ".$estimated_students." - TOTAL REGISTERED: ".$total_students. " <br>";

	$per = round(($total_students * 100) / $estimated_students, 0);

	//echo "porcentaje: $per % <br>";		

	switch ($type) {
	    case 'BEFORE':
		if ($per < 25 && $per > 0) {
		    $send_notif_warning = true;
		    // --- Search rol Manager or Admin
		    $text = '<div>We noticed that the LinguaMeeting registration for your course/section <strong>' . $section->name_course . '</strong> / <strong>' . $section->name_section . '</strong> is very low.'
			    . ' Next week, the coaching session will start and we do not want students to miss sessions.</div>';
		    $text .= '<div>Would you please remind your students to register asap this week?</div>';
		} elseif ($per <= 0) {
		    $send_notif_danger = true;
		    $text = '<div>We noticed that students have not registered yet for your course/section <strong>' . $section->name_course . '</strong> / <strong>' . $section->name_section . '</strong>.'
			    . ' Next week, the coaching session will start and we do not want students to miss sessions.</div>';
		    $text .= '<div>Would you please remind your students to register asap this week?</div>';
		}
		break;

	    case 'SAME':
		if ($per < 50 && $per > 0) {
		    $send_notif_warning = true;
		    $text = '<div>We noticed that the LinguaMeeting registration for your course/section <strong>' . $section->name_course . '</strong> / <strong>' . $section->name_section . '</strong> is very low.'
			    . ' The coaching session will start this week and we do not want students to miss sessions.</div>';
		    $text .= '<div>Would you please remind your students to register asap this week?</div>';
		} elseif ($per <= 0) {
		    $send_notif_danger = true;
		    $text = '<div>We noticed that students have not registered yet for your course/section <strong>' . $section->name_course . '</strong> / <strong>' . $section->name_section . '</strong>.'
			    . ' The coaching session will start this week and we do not want students to miss sessions.</div>';
		    $text .= '<div>Would you please remind your students to register asap this week?</div>';
		}
		break;

	    default:
		break;
	}

	if ($send_notif_warning) {

	    $notif = new notificationsModel();
	    $notif->setId_type_not(10);
	    $notif->setData($text);
	    $date_insert = new DateTime('now');
	    $notif->setDate_insert($date_insert->format('Y-m-d H:i:s'));
	    $notif->setDest_user($section->id_user);
	    $result_notif = $notif->add();

	    if ($section->emailsReception == 1) {

		$subject = "Linguameeting Section Occupation";
		$body = '<div style="font-family:&quot;Cuprum&quot;,sans-serif">';
		$body .= '<div style="padding-bottom:0.8em;width:45%;margin-right:1%;margin-bottom:1%;background:#fff;
				border-radius:5px;font-family:&quot;Cuprum&quot;,sans-serif"><p style="font-family:&quot;Dosis&quot;,
				sans-serif;font-weight:bold;font-size:128%;color:#314a94;border-radius:5px;border-bottom:solid 1px #314a94;
				padding:0.4em;padding-left:0.8em;background:#d9e1ec;background:-webkit-linear-gradient(left top,#9fafc4,#d9e1ec);
				background:-o-linear-gradient(bottom right,#9fafc4,#d9e1ec);background:-moz-linear-gradient(bottom right,#9fafc4,#d9e1ec);
				background:linear-gradient(top right,#9fafc4,#d9e1ec)">Linguameeting Section Occupation</p></div>';
		$body .= "<br>Hello $section->name_user,<br>";
		$body .= "<br>" . $text;
		$body .= '<br><br> <p>This is an automatic message. If you wish to contact us, please do not reply to this message but instead contact support: <a href="mailto:support@linguameeting.com">support@linguameeting.com</a></p>';
		$body .= '<br>The LinguaMeeting Team.';
		$body .= '<br><br><img style="float:left;margin-right:20px;margin-top:20px;height:40px;width:180px;" '
			. 'src="'._URL_LOCATION_LINGUAMEETING.'images/logo.png" alt="LinguaMeeting" title="LinguaMeeting"><br>';
		$body .= '</div>';

		//$result = sendMail($addresses, $subject, $body);
		$save = new emailsModel();
		$save->setId_user_receiver($section->id_user);
		$save->setEmail_receiver($section->email);
		$save->setBody_mail($body);
		$save->setSubject_mail($subject);
		$save->setDate_send_mes($date_insert->format('Y-m-d H:i:s'));
		$save->setType_message('occupationNotif');
		$result = $save->add();

		if ($result) {

		    $log->setType_msg('INFO');
		    $log->setMsg('Email save to stack . Object: ' . $section->email);
		    $log->writeLog();
		} else {

		    $log->setType_msg('ERROR');
		    $log->setMsg('When saving email for instructor. Object: ' . $section->email . ' - ' . $section->name_user);
		    $log->writeLog();
		}
	    } else {

		$log->setType_msg('INFO');
		$log->setMsg('Email not saving to stack because the user has desactivated the email reception. Object: ' . $section->email);
		$log->writeLog();
	    }
	}

	if ($send_notif_danger) {

	    $notif = new notificationsModel();
	    $notif->setId_type_not(11);
	    $notif->setData($text);
	    $date_insert = new DateTime('now');
	    $notif->setDate_insert($date_insert->format('Y-m-d H:i:s'));
	    $notif->setDest_user($section->id_user);
	    $result_notif = $notif->add();

	    if ($section->emailsReception == 1) {
		
		$subject = "Linguameeting Section Occupation";
		$body = '<div style="font-family:&quot;Cuprum&quot;,sans-serif">';
		$body .= '<div style="padding-bottom:0.8em;width:45%;margin-right:1%;margin-bottom:1%;background:#fff;
				border-radius:5px;font-family:&quot;Cuprum&quot;,sans-serif"><p style="font-family:&quot;Dosis&quot;,
				sans-serif;font-weight:bold;font-size:128%;color:#314a94;border-radius:5px;border-bottom:solid 1px #314a94;
				padding:0.4em;padding-left:0.8em;background:#d9e1ec;background:-webkit-linear-gradient(left top,#9fafc4,#d9e1ec);
				background:-o-linear-gradient(bottom right,#9fafc4,#d9e1ec);background:-moz-linear-gradient(bottom right,#9fafc4,#d9e1ec);
				background:linear-gradient(top right,#9fafc4,#d9e1ec)">Linguameeting Section Occupation</p></div>';
		$body .= "<br>Hello $section->name_user,<br>";
		$body .= "<br>" . $text;
		$body .= '<br><br> <p>This is an automatic message. If you wish to contact us, please do not reply to this message but instead contact support: <a href="mailto:support@linguameeting.com">support@linguameeting.com</a></p>';
		$body .= '<br>The LinguaMeeting Team.';
		$body .= '<br><br><img style="float:left;margin-right:20px;margin-top:20px;height:40px;width:180px;" '
			. 'src="'._URL_LOCATION_LINGUAMEETING.'images/logo.png" alt="LinguaMeeting" title="LinguaMeeting"><br>';
		$body .= '</div>';

		//echo $body;
		//$result = sendMail($addresses, $subject, $body);
		$save = new emailsModel();
		$save->setId_user_receiver($section->id_user);
		$save->setEmail_receiver($section->email);
		$save->setBody_mail($body);
		$save->setSubject_mail($subject);
		$save->setDate_send_mes($date_insert->format('Y-m-d H:i:s'));
		$save->setType_message('occupationNotif');
		$result = $save->add();

		if ($result) {
		    $log->setType_msg('INFO');
		    $log->setMsg('Email save to stack . Object: ' . $section->email);
		    $log->writeLog();
		} else {
		    $log->setType_msg('ERROR');
		    $log->setMsg('When saving email for instructor. Object: ' . $section->email . ' - ' . $section->name_user);
		    $log->writeLog();
		}
		
	    } else {

		$log->setType_msg('INFO');
		$log->setMsg('Email not saving to stack because the user has desactivated the email reception. Object: ' . $section->email);
		$log->writeLog();
	    }
	    
	}
	
    }
    
}

$log->setType_msg('INFO');
$log->setMsg('CRON OCCUPATION EXECUTED');
$log->writeLog();
?>