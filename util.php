<?php


/**
 * @author sandra
 * 
 * This is a configuration file for php.
 * You can configure the global variables and function for the project.
 * 
 * Developed by wilowi
 */


// --- Directories
define('_TITLE', 'LinguaMeeting');
define('EURO',chr(128));

// ---- Variable
define("SIGNATURA_LINGRO", "Linguameeting");

# COMMON FUNCTIONS

function normalize ($str){
    
    $originals = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modifs = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $str = utf8_decode($str);
    $str = strtr($str, utf8_decode($originals), $modifs);
    $str = strtolower($str);
    
    return utf8_encode($str);
    
}

/**
 * Generate random code.
 * @param int $longitud
 * @return string
 */
function generarCodigo($longitud) {
	
	$key = '';
	$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$max = strlen($pattern) - 1;
	
	for ($i = 0; $i < $longitud; $i++){
		$key .= $pattern[mt_rand(0, $max)];
	}
	
	return $key;
}

function generarCodigoPassword($longitud) {
	
	$key = '';
	$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#@$*!';
	$max = strlen($pattern) - 1;
	
	for ($i = 0; $i < $longitud; $i++){
		$key .= $pattern[mt_rand(0, $max)];
	}
	
	return $key;
}

function generateCodeNumbers($longitud) {
	
	$key = '';
	$pattern = '1234567890';
	$max = strlen($pattern) - 1;
	
	for ($i = 0; $i < $longitud; $i++){
		$key .= $pattern[mt_rand(0, $max)];
	}
	
	return $key;
}


/**
 * Generate random code for registration.
 * @param int $longitud
 * @return string
 */
function generarCodeReg($longitud) {
	
	$key = '';
	$pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$max = strlen($pattern) - 1;
	
	for ($i = 0; $i < $longitud; $i++){
		$key .= $pattern[mt_rand(0, $max)];
	}
	
	return $key;
}

/**
 * Generate random code for registration.
 * @param int $longitud
 * @return string
 */
function generarCodeLetters($longitud) {
	
	$key = '';
	$pattern = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$max = strlen($pattern) - 1;
	
	for ($i = 0; $i < $longitud; $i++){
		$key .= $pattern[mt_rand(0, $max)];
	}
	
	return $key;
}

/**
 * Generate hours between ini and end with interval.
 * @param string $hour_ini
 * @param string $hour_end
 * @param int $interval
 * @param string $type
 * @return array
 */
function generateHours($hour_ini, $hour_end, $interval, $type = 'normal') {

	date_default_timezone_set('Europe/Madrid');

	$hours = array();

	$date_ini_hour = new DateTime($hour_ini);
	$date_end_hour = new DateTime($hour_end);
	$date_end_hour->modify('+1 second'); // Adding 1 second for show the correct $hora_fin
	
	// if the ini hour is greater than end hour -> adding one day more to end hour.
	if ($date_ini_hour > $date_end_hour) {

		$date_end_hour->modify('+1 day');
	}

	// Interval in minutes       
	$interval_date = new DateInterval('PT' . $interval . 'M');

	// Period between hours
	$period = new DatePeriod($date_ini_hour, $interval_date, $date_end_hour);

	foreach ($period as $hour) {

		// Save de hours
		if ($type == 'eeuu') {
			$hours[] = $hour->format('G:ia');
		} 
		else if($type == 'three'){
		    
		    $hours[] = $hour->format('H:i:s');
		    
		}
		else {
			$hours[] = $hour->format('H:i');
		}
	}

	return $hours;
}

/**
 * Function to resize images.
 * @param string $rutaOriginal -> url original file.
 * @param string $rutaFinal -> final url ( where save the file)
 * @param integer $anchoNuevo
 * @param integer $altoNuevo
 * @param string $tipo -> image type (jpg,png,gif)
 * @return boolean
 */
function redimensionarImg($rutaOriginal, $rutaFinal, $anchoNuevo, $altoNuevo, $tipo) {

	$imgOrg = '';
	$alto_final = 0;
	$ancho_final = 0;

	// --- Crear imagen original
	if ($tipo == 'image/gif') { # GIF
		if (!$imgOrg = imagecreatefromgif($rutaOriginal)) {
			return false;
		}
	} else if ($tipo == 'image/jpeg') { # JPG 
		if (!$imgOrg = imagecreatefromjpeg($rutaOriginal)) {
			return false;
		}
	} else if ($tipo == 'image/png') { # PNG
		if (!$imgOrg = imagecreatefrompng($rutaOriginal)) {
			return false;
		}
	} else {
		return false;
	}

	// --- Original image size
	if (!list($ancho, $alto) = getimagesize($rutaOriginal)) {
		return false;
	}
        
        if(empty($anchoNuevo)){
            
            $anchoNuevo = $ancho;
        }

	//Ratio
	$x_ratio = $anchoNuevo / $ancho;
	$y_ratio = $altoNuevo / $alto;

	//Width and height
	if (($ancho <= $anchoNuevo) && ($alto <= $altoNuevo)) {
		$ancho_final = $ancho;
		$alto_final = $alto;
	} else if (($x_ratio * $alto) < $altoNuevo) {
		$alto_final = ceil($x_ratio * $alto);
		$ancho_final = $anchoNuevo;
	} else {
		$ancho_final = ceil($y_ratio * $ancho);
		$alto_final = $altoNuevo;
	}

	// Create canvas
	if (!$lienzo = imagecreatetruecolor($ancho_final, $alto_final)) {
		return false;
	}
	
	// Transparency for png
	if ($tipo == 'image/png') { # PNG
		 // integer representation of the color black (rgb: 0,0,0)
        $background = imagecolorallocate($lienzo , 0, 0, 0);
        // removing the black from the placeholder
        imagecolortransparent($lienzo, $background);

        // turning off alpha blending (to ensure alpha channel information
        // is preserved, rather than removed (blending with the rest of the
        // image in the form of black))
        imagealphablending($lienzo, false);

        // turning on alpha channel information saving (to ensure the full range
        // of transparency is preserved)
        imagesavealpha($lienzo, true);
	}

	// Copy original canvas
	if (!imagecopyresampled($lienzo, $imgOrg, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto)) {
		return false;
	}

	// Delete the original image
	if (!imagedestroy($imgOrg)) {
		return false;
	}

	// Create the image and save it in the images directory
	if ($tipo == 'image/gif') { # GIF
		if (!imagegif($lienzo, $rutaFinal)) {
			return false;
		}
	} else if ($tipo == 'image/jpeg') { # JPG
		if (!imagejpeg($lienzo, $rutaFinal)) {
			return false;
		}
	} else if ($tipo == 'image/png') { # PNG
		if (!imagepng($lienzo, $rutaFinal)) {
			return false;
		}
	} else {
		return false;
	}
	return true;
}

/**
 * Function to send email with the account no-reply@linguameeting.com
 * @param array $addresses
 * @param string $subject
 * @param string $body
 * @param array $attach
 * @return boolean
 */
function sendMail($addresses, $subject, $body, $attach=array()){
	
	if (_ENVIRONMENT == 'production') {

		$sendmail = new lmMailer();
		$sendmail->setAddress($addresses);
		
		if(!empty($attach)){

			$sendmail->setAttachment($attach);
		}

		//$sendmail->setOpen();
		if ($sendmail->sendStandarMail($subject, $body)) {
			return true;
		} else {
			
			$log = new logsModel();
			$log->setFolder('mails/');
			$log->setFile_name('sendMail.txt');
			$log->setType_msg('ERROR');
			$log->setMsg('Error with sending emails by no-reply:  EMAILS: ' . json_encode($addresses) . ' Subject: ' . $subject.' Message: '.$body);
                        echo "<pre>Error with sending emails by no-reply:</pre>";
			$log->writeLog();
			return false;
		}
		
		//$sendmail->setClose();
            
            return true;

	}else{
		return true;
	}
}

/**
 * Function to send email with the account support@linguameeting.com
 * @param array $addresses
 * @param string $subject
 * @param string $body
 * @param array $attach
 * @return boolean
 */
function sendMailSupport($addresses, $subject, $body, $attach=array(),$from=''){
	
	if (_ENVIRONMENT == 'production') {

		$sendmail = new lmMailer();
		$sendmail->setSupport($from);
		$sendmail->setAddress($addresses);
		
		if(!empty($attach)){

			$sendmail->setAttachment($attach);
		}

		//$sendmail->setOpen();
		if ($sendmail->sendStandarMail($subject, $body)) {
			return true;
		} else {
			
			$log = new logsModel();
			$log->setFolder('mails/');
			$log->setFile_name('sendMail.txt');
			$log->setType_msg('ERROR');
			$log->setMsg('Error with sending emails by support:  EMAILS: ' . json_encode($addresses) . ' Subject: ' . $subject.' Message: '.$body);
			$log->writeLog();
			return false;
		}
		
		//$sendmail->setClose();
            
            return true;

	}else{
		return true;
	}
}

/**
 * Function to send email with the account info@linguameeting.com
 * @param array $addresses
 * @param string $subject
 * @param string $body
 * @param array $attach
 * @return boolean
 */
function sendMailInfo($addresses, $subject, $body, $attach=array()){
	
	if (_ENVIRONMENT == 'production') {

		$sendmail = new lmMailer();
		$sendmail->setInfo();
		$sendmail->setAddress($addresses);
		
		if(!empty($attach)){

			$sendmail->setAttachment($attach);
		}

		//$sendmail->setOpen();
		if ($sendmail->sendStandarMail($subject, $body)) {
			return true;
		} else {
			
			$log = new logsModel();
			$log->setFolder('mails/');
			$log->setFile_name('sendMail.txt');
			$log->setType_msg('ERROR');
			$log->setMsg('Error with sending emails by info account:  EMAILS: ' . json_encode($addresses) . ' Subject: ' . $subject.' Message: '.$body);
			$log->writeLog();
			return false;
		}
		
		//$sendmail->setClose();
            return true;

	}else{
		return true;
	}
}


/**
 * Function to send email with the account no-reply-sessions@linguameeting.com
 * @param array $addresses
 * @param string $subject
 * @param string $body
 * @param array $attach
 * @return boolean
 */
function sendMailSessionsNoReply($addresses, $subject, $body, $attach=array()){
	
	if (_ENVIRONMENT == 'production') {

		$sendmail = new lmMailer();
		$sendmail->setSessions();
		$sendmail->setAddress($addresses);
		
		if(!empty($attach)){

			$sendmail->setAttachment($attach);
		}

		//$sendmail->setOpen();
		if ($sendmail->sendStandarMail($subject, $body)) {
			return true;
		} else {
			
			$log = new logsModel();
			$log->setFolder('mails/');
			$log->setFile_name('sendMail.txt');
			$log->setType_msg('ERROR');
			$log->setMsg('Error with sending emails by info account:  EMAILS: ' . json_encode($addresses) . ' Subject: ' . $subject.' Message: '.$body);
			$log->writeLog();
			return false;
		}
		
		//$sendmail->setClose();
            return true;

	}else{
		return true;
	}
}

/**
 * Function to send email with the account no-reply2-sessions@linguameeting.com
 * @param array $addresses
 * @param string $subject
 * @param string $body
 * @param array $attach
 * @return boolean
 */
function sendMailSessionsNoReply2($addresses, $subject, $body, $attach=array()){
	
	if (_ENVIRONMENT == 'production') {

		$sendmail = new lmMailer();
		$sendmail->setSessions2();
		$sendmail->setAddress($addresses);
		
		if(!empty($attach)){

			$sendmail->setAttachment($attach);
		}

		//$sendmail->setOpen();
		if ($sendmail->sendStandarMail($subject, $body)) {
			return true;
		} else {
			
			$log = new logsModel();
			$log->setFolder('mails/');
			$log->setFile_name('sendMail.txt');
			$log->setType_msg('ERROR');
			$log->setMsg('Error with sending emails by info account:  EMAILS: ' . json_encode($addresses) . ' Subject: ' . $subject.' Message: '.$body);
			$log->writeLog();
			return false;
		}
		
		//$sendmail->setClose();
            return true;

	}else{
		return true;
	}
}


/**
 * Function to send email with the account info@linguameeting.com
 * @param array $addresses
 * @param string $subject
 * @param string $body
 * @param array $attach
 * @return boolean
 */
function sendMailExperiences($addresses, $subject, $body, $attach=array()){
	
	if (_ENVIRONMENT == 'production') {

		$sendmail = new lmMailer();
		$sendmail->setExperiences();
		$sendmail->setAddress($addresses);
		
		if(!empty($attach)){

			$sendmail->setAttachment($attach);
		}

		//$sendmail->setOpen();
		if ($sendmail->sendStandarMail($subject, $body)) {
			return true;
		} else {
			
			$log = new logsModel();
			$log->setFolder('mails/');
			$log->setFile_name('sendMail.txt');
			$log->setType_msg('ERROR');
			$log->setMsg('Error with sending emails by info account:  EMAILS: ' . json_encode($addresses) . ' Subject: ' . $subject.' Message: '.$body);
			$log->writeLog();
			return false;
		}
		
		//$sendmail->setClose();
            return true;

	}else{
		return true;
	}
}

/**
 * Generate the sessions to show in the register,reschedule, etc for the users.
 * @param array $result_coaches_sessions
 * @param array $weeks
 * @param string $timeZone
 * @return array
 */
function generateSessionsShow($result_coaches_sessions, $weeks, $timeZone) {


	foreach ($result_coaches_sessions as $key => $session_coach) {
		$show_session = true;

		$result_coaches_sessions[$key]->alternative = 'No';
		$result_coaches_sessions[$key]->sessions = array();

		$session_occ = new sessionsOccupancyModel();
		$where = 'id_course_session=' . $session_coach->id_course_session;
		$result_occ = $session_occ->select($where);
		$totalOcc = 0;

		// if exist a session in a week with occp 100%, don't show this time session
		if (count($result_occ) > 0) {

			foreach ($result_occ as $key2 => $occ) {

				if ($occ->occupancy_session >= $session_coach->students_class) {
					$show_session = false;
				}
				
				if($occ->occupancy_session>$totalOcc){
					$totalOcc = $occ->occupancy_session;
				}
			}
		}

		$result_coaches_sessions[$key]->show = $show_session;
		$result_coaches_sessions[$key]->totalOcc = $totalOcc;

		$select_week = new stdClass();
		$showAlternativeA = true;
		$showAlternativeB = true;
		$occupancyA = 0;
		$occupancyB = 0;
		foreach ($weeks as $week) {
			$sessions_select = new stdClass();

			$date_ini_week = new DateTime($week->date_start, new DateTimeZone($timeZone));
			$date_end_week = new DateTime($week->date_end, new DateTimeZone($timeZone));
			
			$occup = new sessionsOccupancyModel();
			$where_occ = "id_course_session=$session_coach->id_course_session AND id_course_week=$week->id_course_week";
			$result_occSes = $occup->select($where_occ);
			//echo print_r($week);
			
			if ($week->alternative == 'A' && $result_occSes[0]->occupancy_session>= $session_coach->students_class) {
					$showAlternativeA = false;
			}
			if ($week->alternative == 'B' && $result_occSes[0]->occupancy_session>= $session_coach->students_class) {
					$showAlternativeB = false;
			}
			
			if ($week->alternative == 'A' && !empty($result_occSes[0]->occupancy_session)) {
					$occupancyA = $result_occSes[0]->occupancy_session;
			}
			if ($week->alternative == 'B' && !empty($result_occSes[0]->occupancy_session)) {
					$occupancyB = $result_occSes[0]->occupancy_session;
			}

			if (!empty($result_occSes)) {
				$sessions_select->occupSes = $result_occSes[0]->occupancy_session;
			} else {
				$sessions_select->occupSes = 0;
			}

			while ($date_ini_week <= $date_end_week) {

				$day_week = $date_ini_week->format('D');

				if ($day_week == $session_coach->day_week_session) {

					$sessions_select->day_all = $date_ini_week->format('d F Y');
					if ($week->alternative == 'A' || $week->alternative == 'B') {
						$result_coaches_sessions[$key]->alternative = 'Yes';
					}
					$sessions_select->alternative = $week->alternative;
					//get occup
					$sessions_select->id_course_week = $week->id_course_week;
					
					array_push($result_coaches_sessions[$key]->sessions, $sessions_select);
				}

				$date_ini_week->modify('+1 day');
			}

			$select_week->date_ini = $date_ini_week->format('Y-m-d');
			$select_week->date_ini_day = $date_ini_week->format('D');
		}
		
		$result_coaches_sessions[$key]->showAlternativeA = $showAlternativeA;
		$result_coaches_sessions[$key]->showAlternativeB = $showAlternativeB;
		$result_coaches_sessions[$key]->occupancyA = $occupancyA;
		$result_coaches_sessions[$key]->occupancyB = $occupancyB;
	}

	//echo print_r($result_coaches_sessions);
	return $result_coaches_sessions;
}

/**
 * Get the IP
 * @return string
 */
function getRealIP() {
	
	$server = filter_input_array(INPUT_SERVER);
	
	if (!empty($server['HTTP_CLIENT_IP']))
		return $server['HTTP_CLIENT_IP'];

	if (!empty($server['HTTP_X_FORWARDED_FOR']))
		return $server['HTTP_X_FORWARDED_FOR'];

	return $server['REMOTE_ADDR'];
}

function orderStudent($result_student) {

    $newStudent = array();

    $count_attendance = 0;
    $count_past = 0;
    $count_missed = 0;
    $count_future = 0;
    $count_total = 0;
    $count_make_up = 0;
    $count_make_att = 0;
    $count_make_missed = 0;
    $count_extra_att = 0;
    $count_extra_missed = 0;
    $count_key_extra = "0";
//$next = false;
    $teacher_found = false;
    $next_session = null;
    $next_old = null;

    foreach ($result_student as $student) {

// Get timezone university
	$uni = new universityModel();
	$join = " LEFT JOIN lm_time_zones USING(id_zone)";
	$where = "id_university=" . $student->id_university;
	$select_uni = "lm_university.id_university, lm_university.id_zone, lm_time_zones.large_name";
	$result_uni = $uni->select($where, '', $select_uni, $join);

	$session_future = false;
	$id_user = $student->id_user;
	$id_week = $student->id_course_week;
	$id_teacher = $student->id_teacher;
	$timezone = $student->large_name;
	$day_week = $student->day_week_session;
	$time_from_session = new DateTime($student->time_from_session, new DateTimeZone($result_uni[0]->large_name));
	$time_to_session = new DateTime($student->time_to_session, new DateTimeZone($result_uni[0]->large_name));
	$time_from_session->setTimezone(new DateTimeZone($timezone));
	$time_to_session->setTimezone(new DateTimeZone($timezone));
	$day_student_aux = $time_from_session->format('D');
	$id_feedback = $student->id_feedback;
//$days_holidays = explode(',',$student->days_holiday);


	if (!$teacher_found && !empty($id_teacher)) {

	    $user = new userModel();
	    $where = "id_user=$id_teacher";
	    $instructor = $user->select($where);
	    if (count($instructor) > 0) {
		$teacher_found = true;
	    }
	}


	if (empty($newStudent[$id_user])) {

	    $newStudent[$id_user] = new stdClass();
	    $newStudent[$id_user]->weeks = array();
	    $newStudent[$id_user]->feedbacks = array();
	    $count_attendance = 0;
	    $count_missed = 0;
	    $count_past = 0;
	    $count_future = 0;
	    $count_total = 0;
	    $count_make_up = 0;
	    $count_make_att = 0;
	    $count_make_missed = 0;
	    $count_extra_att = 0;
	    $count_extra_missed = 0;
	}


	$count_total ++;
	if ($student->attendance == 1) {
	    $count_attendance++;
	}
	if ($student->missed == 1) {
	    $count_missed++;
	}
	if ($student->past == 1) {
	    $count_past++;
	}
	if ($student->from_makeup == 1) {
	    $count_make_up++;
	}
	if ($student->from_makeup == 1 && $student->attendance) {
	    $count_make_att++;
	}
	if ($student->from_extra == 1 && $student->attendance) {
	    $count_extra_att++;
	}

	if ($student->from_makeup == 1 && $student->missed) {
	    $count_make_missed++;
	}
	if ($student->from_extra == 1 && $student->missed) {
	    $count_extra_missed++;
	}

	$newStudent[$id_user]->id_user = $id_user;
	$newStudent[$id_user]->name_user = $student->name_user;
	$newStudent[$id_user]->lastname_user = $student->lastname_user;
	$newStudent[$id_user]->name_course = $student->name_course;
	$newStudent[$id_user]->id_course = $student->id_course;
	$newStudent[$id_user]->students_class = $student->students_class;
	$newStudent[$id_user]->duration_course = $student->duration_course;
	$newStudent[$id_user]->sessions_rec = $student->sessions_rec;
	$newStudent[$id_user]->id_section = $student->id_course_section;
	$newStudent[$id_user]->code = $student->code;
	$newStudent[$id_user]->id_teacher = $id_teacher;
	$newStudent[$id_user]->id_coach = $student->id_coach;
	$newStudent[$id_user]->name_instructor = $instructor[0]->name_user;
	$newStudent[$id_user]->lastname_instructor = $instructor[0]->lastname_user;
	$newStudent[$id_user]->make_up = $student->make_up;
	$newStudent[$id_user]->extra_session = $student->extra_session;
	$newStudent[$id_user]->name_section = $student->name_section;
	$newStudent[$id_user]->id_course_session = $student->id_course_session;
	$newStudent[$id_user]->time_from_session = $time_from_session->format('H:i');
	$newStudent[$id_user]->time_to_session = $time_to_session->format('H:i');
	$newStudent[$id_user]->emailsReception = $student->emailsReception;
        $newStudent[$id_user]->emailsMarketing = $student->emailsMarketing;

	$time_from_session->setTimezone(new DateTimeZone($result_uni[0]->large_name));
	$time_to_session->setTimezone(new DateTimeZone($result_uni[0]->large_name));

	$newStudent[$id_user]->count_attendance = intval($count_attendance);
	$newStudent[$id_user]->count_past = $count_past;
	$newStudent[$id_user]->count_missed = $count_missed;
	$newStudent[$id_user]->count_makeup = $count_make_up;
	$newStudent[$id_user]->count_make_att = intval($count_make_att);
	$newStudent[$id_user]->count_extra_att = intval($count_extra_att);
	$newStudent[$id_user]->count_make_missed = intval($count_make_missed);
	$newStudent[$id_user]->count_extra_missed = intval($count_extra_missed);
	$newStudent[$id_user]->total_make_up = $student->total_make_up;
	$newStudent[$id_user]->total_make_up_used = $student->total_make_up - $student->make_up;
	$newStudent[$id_user]->total_extra_session = $student->total_extra_session;
	$newStudent[$id_user]->total_extra_session_used = $student->total_extra_session - $student->extra_session;
	$newStudent[$id_user]->timezone = $student->large_name;
	$newStudent[$id_user]->name_university = $student->name_university;
	$newStudent[$id_user]->id_university = $student->id_university;
	$newStudent[$id_user]->total_sessions = $count_total;
	if (empty($student->see_recording_students)) {

	    $newStudent[$id_user]->see_recording_students = 0;
	} else {
	    $newStudent[$id_user]->see_recording_students = $student->see_recording_students;

// ger url recording
	    if (!empty($student->id_recording)) {

		$newStudent[$id_user]->play_url = $student->play_url;
		$newStudent[$id_user]->play_url = $student->download_url;
	    }
	}


	if (!empty($student->days_holiday)) {

	    $newStudent[$id_user]->days_holiday = $student->days_holiday;
	}

	if (!empty($student->break_start)) {

	    $newStudent[$id_user]->break_start = $student->break_start;
	}

	if (!empty($student->break_end)) {

	    $newStudent[$id_user]->break_end = $student->break_end;
	}

	if (!empty($id_week)) {


	    if (empty($newStudent[$id_user]->weeks[$id_week])) {

		$newStudent[$id_user]->weeks[$id_week] = new stdClass();
	    } else {
		$newStudent[$id_user]->weeks['extra' . $count_key_extra] = new stdClass();
		$id_week = 'extra' . $count_key_extra;
		$count_key_extra++;
	    }

	    $today = new DateTime('now', new DateTimeZone($result_uni[0]->large_name));

	    $date_aux_st_start = new DateTime($student->date_start, new DateTimeZone($result_uni[0]->large_name));
	    $date_aux_st_end = new DateTime($student->date_end, new DateTimeZone($result_uni[0]->large_name));


	    $time_aux_st_start = new DateTime($day_week . ' ' . $time_from_session->format('H:i'), new DateTimeZone($result_uni[0]->large_name));
	    $time_aux_st_end = new DateTime($day_week . ' ' . $time_to_session->format('H:i'), new DateTimeZone($result_uni[0]->large_name));


	    $date_start = new DateTime($date_aux_st_start->format('Y-m-d') . ' ' . $time_aux_st_start->format('H:i'), new DateTimeZone($result_uni[0]->large_name));
	    $date_end = new DateTime($date_aux_st_end->format('Y-m-d') . ' ' . $time_aux_st_end->format('H:i'), new DateTimeZone($result_uni[0]->large_name));

	    if ($today < $date_end) {

		while ($date_start <= $date_end) {

		    $day_week_st = $date_start->format('D');

		    if ($day_week_st == $day_week) {


			$date_five = new DateTime($date_start->format('Y-m-d') . ' ' . $time_aux_st_start->format('H:i'), new DateTimeZone($result_uni[0]->large_name));
			$date_five->setTimezone(new DateTimeZone($timezone));
			$date_five->modify('-2 minutes');

			$date_aux_st_start->setTimezone(new DateTimeZone($timezone));
			$date_aux_st_end->setTimezone(new DateTimeZone($timezone));
			$time_aux_st_start->setTimezone(new DateTimeZone($timezone));
			$time_aux_st_end->setTimezone(new DateTimeZone($timezone));
			$date_start->setTimezone(new DateTimeZone($timezone));
			$date_end->setTimezone(new DateTimeZone($timezone));
			$today->setTimezone(new DateTimeZone($timezone));
			$day_student_aux = $date_start->format('D');

			$newStudent[$id_user]->weeks[$id_week]->day_week_session_select = $date_start->format('Y-m-d');
			$next_session = $date_start;


			if ($next_session < $next_old || empty($newStudent[$id_user]->next_session)) {


// --- Get join url
			    $meeting = new zoomMeetingsModel();
			    $where_meeting = "id_user=$student->id_coach";
			    $join_meet = " LEFT JOIN lm_users USING(id_user)";
			    $select_meet = " lm_zoom_meetings.*,lm_users.url_photo";
			    $result_meeting = $meeting->select($where_meeting, '', $select_meet, $join_meet);

// --- Get Coach photo


			    $newStudent[$id_user]->next_session = $next_session->format('Y-m-d');
			    $newStudent[$id_user]->hour_next_session = $time_aux_st_start->format('H:i');
			    $newStudent[$id_user]->hour_to_next_session = $time_aux_st_end->format('H:i');
			    $newStudent[$id_user]->id_student_session = $student->id_student_session;
			    $newStudent[$id_user]->join_url = $result_meeting[0]->join_url;
			    $newStudent[$id_user]->join_photo_url = $result_meeting[0]->url_photo;

			    $documentation = new courseDocumentationModel();
			    $where_doc = "id_week=$id_week";
			    $result_doc = $documentation->select($where_doc);
			    if (!empty($result_doc)) {
				$newStudent[$id_user]->assignment_week = $result_doc[0]->assignment;
			    }

			    $interval = $today->diff($date_start);

			    $newStudent[$id_user]->interval = $interval->format('%d days, %H hours, %I minutes');
			    if ($today >= $date_five) {
				$newStudent[$id_user]->seeJoin = 'yes';
			    } else {
				$newStudent[$id_user]->seeJoin = 'no';
			    }

//echo print_r($newStudent);
			}

			if (!empty($newStudent[$id_user]->next_session)) {
			    $next_old = new DateTime($newStudent[$id_user]->next_session . ' ' . $time_to_session->format('H:i'), new DateTimeZone($result_uni[0]->large_name));
			    $next_old->setTimezone(new DateTimeZone($timezone));
			}

			$date_aux_st_start->setTimezone(new DateTimeZone($result_uni[0]->large_name));
			$date_aux_st_end->setTimezone(new DateTimeZone($result_uni[0]->large_name));
			$time_aux_st_start->setTimezone(new DateTimeZone($result_uni[0]->large_name));
			$time_aux_st_end->setTimezone(new DateTimeZone($result_uni[0]->large_name));
			$date_start->setTimezone(new DateTimeZone($result_uni[0]->large_name));
			$date_end->setTimezone(new DateTimeZone($result_uni[0]->large_name));
			$today->setTimezone(new DateTimeZone($result_uni[0]->large_name));
		    }

		    $date_start->modify('+1 day');
		}

		if (!empty($newStudent[$id_user]->next_session)) {

//$date_aux_s = new DateTime($newStudent[$id_user]->next_session.' '.$time_to_session->format('H:i'),new DateTimeZone($result_uni[0]->large_name));
// probar con poner esto: 
		    $date_aux_s = new DateTime($newStudent[$id_user]->next_session . ' ' . $newStudent[$id_user]->hour_to_next_session, new DateTimeZone($timezone));
//$date_aux_s = new DateTime($newStudent[$id_user]->next_session.' '.$newStudent[$id_user]->hour_to_next_session,new DateTimeZone($result_uni[0]->large_name));

		    $date_aux_s->setTimezone(new DateTimeZone($timezone));
		    $today->setTimezone(new DateTimeZone($timezone));

		    if ($date_aux_s < $today) {

			$newStudent[$id_user]->next_session = '';
			$newStudent[$id_user]->hour_next_session = '';
			$newStudent[$id_user]->hour_to_next_session = '';
			$newStudent[$id_user]->seeJoin = '';
			$newStudent[$id_user]->id_student_session = '';
			$newStudent[$id_user]->join_url = '';
			$newStudent[$id_user]->join_photo_url = '';
			$newStudent[$id_user]->assignment_week = '';
		    }
		    $today->setTimezone(new DateTimeZone($result_uni[0]->large_name));
		}
	    } else {

		while ($date_start <= $date_end) {

		    $day_week_st = $date_start->format('D');

		    if ($day_week_st == $day_week) {
			$date_aux_st_start->setTimezone(new DateTimeZone($timezone));
			$date_aux_st_end->setTimezone(new DateTimeZone($timezone));
			$time_aux_st_start->setTimezone(new DateTimeZone($timezone));
			$time_aux_st_end->setTimezone(new DateTimeZone($timezone));
			$date_start->setTimezone(new DateTimeZone($timezone));
			$date_end->setTimezone(new DateTimeZone($timezone));
			$day_student_aux = $date_start->format('D');

			$newStudent[$id_user]->weeks[$id_week]->day_week_session_select = $date_start->format('Y-m-d');

			$date_aux_st_start->setTimezone(new DateTimeZone($result_uni[0]->large_name));
			$date_aux_st_end->setTimezone(new DateTimeZone($result_uni[0]->large_name));
			$time_aux_st_start->setTimezone(new DateTimeZone($result_uni[0]->large_name));
			$time_aux_st_end->setTimezone(new DateTimeZone($result_uni[0]->large_name));
			$date_start->setTimezone(new DateTimeZone($result_uni[0]->large_name));
			$date_end->setTimezone(new DateTimeZone($result_uni[0]->large_name));
		    }

		    $date_start->modify('+1 day');
		}
	    }

	    $time_from_session->setTimezone(new DateTimeZone($timezone));
	    $time_to_session->setTimezone(new DateTimeZone($timezone));

	    $newStudent[$id_user]->weeks[$id_week]->from_makeup = $student->from_makeup;
	    $newStudent[$id_user]->weeks[$id_week]->from_extra = $student->from_extra;
	    $newStudent[$id_user]->weeks[$id_week]->date_start = $student->date_start;
	    $newStudent[$id_user]->weeks[$id_week]->date_end = $student->date_end;
	    $newStudent[$id_user]->weeks[$id_week]->attendance = $student->attendance;
	    $newStudent[$id_user]->weeks[$id_week]->missed = $student->missed;
	    $newStudent[$id_user]->weeks[$id_week]->past = $student->past;
	    $newStudent[$id_user]->weeks[$id_week]->day_week_session = $day_student_aux;
	    $newStudent[$id_user]->weeks[$id_week]->id_coach = $student->id_coach;
	    $newStudent[$id_user]->weeks[$id_week]->id_studentSession = $student->id_student_session;
	    $newStudent[$id_user]->weeks[$id_week]->time_from_session = $time_from_session->format('H:i');
	    $newStudent[$id_user]->weeks[$id_week]->time_to_session = $time_to_session->format('H:i');
	    $newStudent[$id_user]->weeks[$id_week]->id_course_week = $student->id_course_week;
	    $newStudent[$id_user]->weeks[$id_week]->alternative = $student->alternative;

	    $time_from_session->setTimezone(new DateTimeZone($result_uni[0]->large_name));
	    $time_to_session->setTimezone(new DateTimeZone($result_uni[0]->large_name));
	    $newStudent[$id_user]->weeks[$id_week]->id_course_session = $student->id_course_session;
	    $newStudent[$id_user]->weeks[$id_week]->id_recording = $student->id_recording;
	}

//echo print_r($count_attendance);
	$count_future = $count_total - ($count_missed + $count_attendance);
	$newStudent[$id_user]->count_future = $count_future;


	if (!empty($id_feedback)) {

	    if (empty($newStudent[$id_user]->feedbacks[$id_feedback])) {

		$newStudent[$id_user]->feedbacks[$id_feedback] = new stdClass();
	    }

	    $newStudent[$id_user]->feedbacks[$id_feedback]->id_feedback = $student->id_feedback;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->id_puntuality = $student->id_puntuality;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->id_prepared = $student->id_prepared;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->id_participation = $student->id_participation;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->is_puntual_session = $student->is_puntual_session;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->id_student_course_session = $student->id_student_course_session;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->date = $newStudent[$id_user]->weeks[$id_week]->day_week_session_select;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->time_fom = $newStudent[$id_user]->weeks[$id_week]->time_from_session;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->time_to = $newStudent[$id_user]->weeks[$id_week]->time_to_session;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->description_puntuality = $student->description_puntuality;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->description_prepared = $student->description_prepared;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->description_participation = $student->description_participation;
	}
    }

//echo print_r($newStudent);
    return $newStudent;
}

function orderStudentFlex($result_student) {

    $newStudent = array();

    $count_attendance = 0;
    $count_past = 0;
    $count_missed = 0;
    $count_future = 0;
    $count_total = 0;
    $count_make_up = 0;
    $count_make_att = 0;
    $count_make_missed = 0;
    $count_extra_att = 0;
    $count_extra_missed = 0;
    $count_key_extra = "0";
//$next = false;
    $teacher_found = false;
    $next_session = null;
    $next_old = null;

    foreach ($result_student as $student) {

// Get timezone university
	$uni = new universityModel();
	$join = " LEFT JOIN lm_time_zones USING(id_zone)";
	$where = "id_university=" . $student->id_university;
	$select_uni = "lm_university.id_university, lm_university.id_zone, lm_time_zones.large_name";
	$result_uni = $uni->select($where, '', $select_uni, $join);

	$session_future = false;
	$id_user = $student->id_user;
	if (empty($id_user)) {
	    $id_user = $student->user_id;
	}
//$id_week = $student->id_course_week;
	$id_student_session = $student->id_student_session;
	$id_teacher = $student->id_teacher;
	$timezone = $student->large_name;
	$id_feedback = $student->id_feedback;
//$days_holidays = explode(',',$student->days_holiday);		

	if (!$teacher_found) {

	    $user = new userModel();
	    $where = "id_user=$id_teacher";
	    $instructor = $user->select($where);
	    if (count($instructor) > 0) {
		$teacher_found = true;
	    }
	}


	if (empty($newStudent[$id_user])) {

	    $newStudent[$id_user] = new stdClass();
	    $newStudent[$id_user]->sessions = array();
	    $newStudent[$id_user]->feedbacks = array();
	    $count_attendance = 0;
	    $count_missed = 0;
	    $count_past = 0;
	    $count_future = 0;
	    $count_total = 0;
	    $count_make_up = 0;
	    $count_make_att = 0;
	    $count_make_missed = 0;
	    $count_extra_att = 0;
	    $count_extra_missed = 0;
	}


	$count_total ++;
	if ($student->attendance == 1) {
	    $count_attendance++;
	}
	if ($student->missed == 1) {
	    $count_missed++;
	}
	if ($student->past == 1) {
	    $count_past++;
	}
	if ($student->from_makeup == 1) {
	    $count_make_up++;
	}
	if ($student->from_makeup == 1 && $student->attendance) {
	    $count_make_att++;
	}
	if ($student->from_extra == 1 && $student->attendance) {
	    $count_extra_att++;
	}

	if ($student->from_makeup == 1 && $student->missed) {
	    $count_make_missed++;
	}
	if ($student->from_extra == 1 && $student->missed) {
	    $count_extra_missed++;
	}

	$newStudent[$id_user]->id_user = $id_user;
	$newStudent[$id_user]->name_user = $student->name_user;
	$newStudent[$id_user]->lastname_user = $student->lastname_user;
	$newStudent[$id_user]->name_course = $student->name_course;
	$newStudent[$id_user]->id_course = $student->id_course;
	$newStudent[$id_user]->students_class = $student->students_class;
	$newStudent[$id_user]->duration_course = $student->duration_course;
	$newStudent[$id_user]->sessions_rec = $student->sessions_rec;
	$newStudent[$id_user]->id_section = $student->id_course_section;
	$newStudent[$id_user]->code = $student->code;
	$newStudent[$id_user]->id_teacher = $id_teacher;
//$newStudent[$id_user]->id_coach = $student->id_coach;
	$newStudent[$id_user]->name_instructor = $instructor[0]->name_user;
	$newStudent[$id_user]->lastname_instructor = $instructor[0]->lastname_user;
	$newStudent[$id_user]->make_up = $student->make_up;
	$newStudent[$id_user]->extra_session = $student->extra_session;
	$newStudent[$id_user]->name_section = $student->name_section;
	$newStudent[$id_user]->id_course_session = $student->id_course_session;

	$newStudent[$id_user]->count_attendance = intval($count_attendance);
	$newStudent[$id_user]->count_past = $count_past;
	$newStudent[$id_user]->count_missed = $count_missed;
	$newStudent[$id_user]->count_makeup = $count_make_up;
	$newStudent[$id_user]->count_make_att = intval($count_make_att);
	$newStudent[$id_user]->count_extra_att = intval($count_extra_att);
	$newStudent[$id_user]->count_make_missed = intval($count_make_missed);
	$newStudent[$id_user]->count_extra_missed = intval($count_extra_missed);
	$newStudent[$id_user]->total_make_up = $student->total_make_up;
	$newStudent[$id_user]->total_make_up_used = $student->total_make_up - $student->make_up;
	$newStudent[$id_user]->total_extra_session = $student->total_extra_session;
	$newStudent[$id_user]->total_extra_session_used = $student->total_extra_session - $student->extra_session;
	$newStudent[$id_user]->timezone = $student->large_name;
	$newStudent[$id_user]->name_university = $student->name_university;
	$newStudent[$id_user]->id_university = $student->id_university;
	$newStudent[$id_user]->total_sessions = $count_total;
	$newStudent[$id_user]->emailsReception = $student->emailsReception;
        $newStudent[$id_user]->emailsMarketing = $student->emailsMarketing;
	$newStudent[$id_user]->email = $student->email;

	if (empty($student->see_recording_students)) {

	    $newStudent[$id_user]->see_recording_students = 0;
	} else {
	    $newStudent[$id_user]->see_recording_students = $student->see_recording_students;

// ger url recording
	    if (!empty($student->id_recording)) {

		$newStudent[$id_user]->play_url = $student->play_url;
		$newStudent[$id_user]->play_url = $student->download_url;
	    }
	}


	if (!empty($student->days_holiday)) {

	    $newStudent[$id_user]->days_holiday = $student->days_holiday;
	}

	if (!empty($student->break_start)) {

	    $newStudent[$id_user]->break_start = $student->break_start;
	}

	if (!empty($student->break_end)) {

	    $newStudent[$id_user]->break_end = $student->break_end;
	}

	if (!empty($id_student_session)) {


	    if (empty($newStudent[$id_user]->sessions[$id_student_session])) {

		$newStudent[$id_user]->sessions[$id_student_session] = new stdClass();
	    }

	    $newStudent[$id_user]->sessions[$id_student_session]->id_course = $student->id_course;
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
	    $newStudent[$id_user]->sessions[$id_student_session]->timezone = $student->timezone;

	    if (!empty($student->timezone) && $student->timezone != $timezone) {

// Si cuando se cogió la sesión, era una zona horaria distinta a la que tiene ele studiante, hay que transformarla en la actual del estudiante.
		$date_start_auxses = new DateTime($student->date_select_ini, new DateTimeZone($student->timezone));
		$date_end_auxses = new DateTime($student->date_select_end, new DateTimeZone($student->timezone));
		$date_start_auxses->setTimezone(new DateTimeZone($timezone));
		$date_end_auxses->setTimezone(new DateTimeZone($timezone));

		$newStudent[$id_user]->sessions[$id_student_session]->date_select_ini = $date_start_auxses->format('Y-m-d H:i:s');
		$newStudent[$id_user]->sessions[$id_student_session]->date_select_end = $date_end_auxses->format('Y-m-d H:i:s');
	    }


// get coach data if assgined=1
	    if (!empty($student->id_coach) && $student->assigned == 1) {

		$coach = new userModel();
		$where_coach = "id_user=$student->id_coach";
		$result_coach = $coach->select($where_coach, '', 'lm_users.name_user,lm_users.lastname_user,lm_users.id_country,lm_users.description,lm_users.url_photo,lm_country.nom', ' LEFT JOIN lm_country USING(id_country)');
		$newStudent[$id_user]->sessions[$id_student_session]->name_coach_complete = $result_coach[0]->lastname_user . ', ' . $result_coach[0]->name_user;
		$newStudent[$id_user]->sessions[$id_student_session]->country_coach = $result_coach[0]->nom;
		$newStudent[$id_user]->sessions[$id_student_session]->description_coach = $result_coach[0]->description;
		$newStudent[$id_user]->sessions[$id_student_session]->url_photo = $result_coach[0]->url_photo;
	    }
	}

	if (!empty($id_student_session) && $student->assigned == 1) {

	    $today = new DateTime('now');
//$today->setTimezone(new DateTimeZone($result_uni[0]->large_name));
	    $today->setTimezone(new DateTimeZone($timezone));

//$date_start = new DateTime($student->date_select_ini,new DateTimeZone($result_uni[0]->large_name));
//$date_end = new DateTime($student->date_select_end, new DateTimeZone($result_uni[0]->large_name));

	    $date_start = new DateTime($student->date_select_ini, new DateTimeZone($timezone));
	    $date_end = new DateTime($student->date_select_end, new DateTimeZone($timezone));

	    if (!empty($student->timezone) && $student->timezone != $timezone) {

		$date_start = new DateTime($student->date_select_ini, new DateTimeZone($student->timezone));
		$date_end = new DateTime($student->date_select_end, new DateTimeZone($student->timezone));
		$today->setTimezone(new DateTimeZone($student->timezone));
	    }

// check if the course has started.
//echo print_r($newStudent[$id_user]->next_session);
	    if ($today < $date_end) {

		$date_five = new DateTime($date_start->format('Y-m-d H:i:s'), new DateTimeZone($timezone));

		if (!empty($student->timezone) && $student->timezone != $timezone) {

		    $date_five = new DateTime($date_start->format('Y-m-d H:i:s'), new DateTimeZone($student->timezone));
		}

		$date_five->setTimezone(new DateTimeZone($timezone));
		$date_five->modify('-2 minutes');

		$date_start->setTimezone(new DateTimeZone($timezone));
		$date_end->setTimezone(new DateTimeZone($timezone));
		$today->setTimezone(new DateTimeZone($timezone));
		$next_session = $date_start;

		if ($next_session < $next_old || empty($newStudent[$id_user]->next_session)) {

// --- Get join url
		    $meeting = new zoomMeetingsModel();
		    $where_meeting = "id_user=$student->id_coach";
		    $join_meet = " LEFT JOIN lm_users USING(id_user)";
		    $select_meet = " lm_zoom_meetings.*,lm_users.url_photo";
		    $result_meeting = $meeting->select($where_meeting, '', $select_meet, $join_meet);

		    $newStudent[$id_user]->next_session = $next_session->format('Y-m-d');
		    $newStudent[$id_user]->hour_next_session = $next_session->format('H:i');
		    $newStudent[$id_user]->hour_to_next_session = $date_end->format('H:i');
		    $newStudent[$id_user]->id_student_session = $student->id_student_session;
		    $newStudent[$id_user]->join_url = $result_meeting[0]->join_url;
		    $newStudent[$id_user]->join_photo_url = $result_meeting[0]->url_photo;
		    $newStudent[$id_user]->id_coach = $student->id_coach;

		    $interval = $today->diff($date_start);

		    $newStudent[$id_user]->interval = $interval->format('%d days, %H hours, %I minutes');

		    if ($today >= $date_five) {

			$newStudent[$id_user]->seeJoin = 'yes';
		    } else {

			$newStudent[$id_user]->seeJoin = 'no';
		    }

//echo print_r($newStudent);
		}

		if (!empty($newStudent[$id_user]->next_session)) {

//$next_old = new DateTime($newStudent[$id_user]->next_session . ' ' . $newStudent[$id_user]->hour_to_next_session, new DateTimeZone($result_uni[0]->large_name));
		    $next_old = new DateTime($newStudent[$id_user]->next_session . ' ' . $newStudent[$id_user]->hour_to_next_session, new DateTimeZone($timezone));

		    if (!empty($student->timezone) && $student->timezone != $timezone) {

			$next_old = new DateTime($newStudent[$id_user]->next_session . ' ' . $newStudent[$id_user]->hour_to_next_session, new DateTimeZone($student->timezone));
		    }

		    $next_old->setTimezone(new DateTimeZone($timezone));
		}

		/* $date_start->setTimezone(new DateTimeZone($result_uni[0]->large_name));
		  $date_end->setTimezone(new DateTimeZone($result_uni[0]->large_name));
		  $today->setTimezone(new DateTimeZone($result_uni[0]->large_name)); */

		$date_start->setTimezone(new DateTimeZone($timezone));
		$date_end->setTimezone(new DateTimeZone($timezone));
		$today->setTimezone(new DateTimeZone($timezone));

		if (!empty($student->timezone) && $student->timezone != $timezone) {

		    $date_start->setTimezone(new DateTimeZone($student->timezone));
		    $date_end->setTimezone(new DateTimeZone($student->timezone));
		    $today->setTimezone(new DateTimeZone($student->timezone));
		}

		if (!empty($newStudent[$id_user]->next_session)) {

//$date_aux_s = new DateTime($newStudent[$id_user]->next_session.' '.$time_to_session->format('H:i'),new DateTimeZone($result_uni[0]->large_name));
// probar con poner esto: 
		    $date_aux_s = new DateTime($newStudent[$id_user]->next_session . ' ' . $newStudent[$id_user]->hour_to_next_session, new DateTimeZone($timezone));
//$date_aux_s = new DateTime($newStudent[$id_user]->next_session.' '.$newStudent[$id_user]->hour_to_next_session,new DateTimeZone($result_uni[0]->large_name));
		    if (!empty($student->timezone) && $student->timezone != $timezone) {

			$date_aux_s = new DateTime($newStudent[$id_user]->next_session . ' ' . $newStudent[$id_user]->hour_to_next_session, new DateTimeZone($student->timezone));
		    }

		    $date_aux_s->setTimezone(new DateTimeZone($timezone));
		    $today->setTimezone(new DateTimeZone($timezone));

		    if ($date_aux_s < $today) {

			$newStudent[$id_user]->next_session = '';
			$newStudent[$id_user]->hour_next_session = '';
			$newStudent[$id_user]->hour_to_next_session = '';
			$newStudent[$id_user]->seeJoin = '';
			$newStudent[$id_user]->id_student_session = '';
			$newStudent[$id_user]->join_url = '';
			$newStudent[$id_user]->join_photo_url = '';
			$newStudent[$id_user]->assignment_week = '';
			$newStudent[$id_user]->id_coach = '';
		    }

//$today->setTimezone(new DateTimeZone($result_uni[0]->large_name));
		    $today->setTimezone(new DateTimeZone($timezone));
		    if (!empty($student->timezone) && $student->timezone != $timezone) {

			$today->setTimezone(new DateTimeZone($student->timezone));
		    }
		}
	    } else {

		/* $date_start->setTimezone(new DateTimeZone($timezone));
		  $date_end->setTimezone(new DateTimeZone($timezone));
		  $day_student_aux = $date_start->format('D');

		  $newStudent[$id_user]->weeks[$id_week]->day_week_session_select = $date_start->format('Y-m-d');

		  $date_start->setTimezone(new DateTimeZone($result_uni[0]->large_name));
		  $date_end->setTimezone(new DateTimeZone($result_uni[0]->large_name)); */
	    }
	}

//echo print_r($count_attendance);
	$count_future = $count_total - ($count_missed + $count_attendance);
	$newStudent[$id_user]->count_future = $count_future;


	if (!empty($id_feedback)) {

	    if (empty($newStudent[$id_user]->feedbacks[$id_feedback])) {

		$newStudent[$id_user]->feedbacks[$id_feedback] = new stdClass();
	    }

	    $newStudent[$id_user]->feedbacks[$id_feedback]->id_feedback = $student->id_feedback;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->id_puntuality = $student->id_puntuality;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->id_prepared = $student->id_prepared;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->id_participation = $student->id_participation;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->is_puntual_session = $student->is_puntual_session;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->id_student_course_session = $student->id_student_course_session;
//$newStudent[$id_user]->feedbacks[$id_feedback]->date = $newStudent[$id_user]->weeks[$id_week]->day_week_session_select;
//$newStudent[$id_user]->feedbacks[$id_feedback]->time_fom = $newStudent[$id_user]->weeks[$id_week]->time_from_session;
//$newStudent[$id_user]->feedbacks[$id_feedback]->time_to = $newStudent[$id_user]->weeks[$id_week]->time_to_session;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->description_puntuality = $student->description_puntuality;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->description_prepared = $student->description_prepared;
	    $newStudent[$id_user]->feedbacks[$id_feedback]->description_participation = $student->description_participation;
	}
    }

//echo print_r($newStudent);
    return $newStudent;
}

function _data_last_month_day($month, $year) {
    //$month = date('m');
    //$year = date('Y');
    $day = date("d", mktime(0, 0, 0, $month + 1, 0, $year));

    return date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));
}

/** Actual month first day * */
function _data_first_month_day($month, $year) {
    //$month = date('m');
    //$year = date('Y');
    return date('Y-m-d', mktime(0, 0, 0, $month, 1, $year));
}

// GUIDES SANDRA hay que quitar la llamada en panelController y instructor controller

function generateWeeks($aux_date, $advance, $break_ini_aux, $break_end_aux, $holidays_days, $timeZoneInsert, $alternative = '') {

    $array_weeks = array();

    $cont_alternative = 1;
    $change_break = false;
    while ($aux_date <= $advance) {
        $select_week = new stdClass();
        // only for alternative weeks			
        if ($alternative == 'on') {
            $select_week->alternative = true;

            if (!$change_break) {
                if (($cont_alternative % 2) == 0) {
                    $select_week->type_alternative = 'B';
                } else {
                    $select_week->type_alternative = 'A';
                }
            } else {
                if (($cont_alternative % 2) == 0) {
                    $select_week->type_alternative = 'A';
                } else {
                    $select_week->type_alternative = 'B';
                }
            }
        } else {
            $select_week->alternative = false;
        }


        $day_week = $aux_date->format('D');
        $date_ini_week = new DateTime($aux_date->format('Y-m-d'), new DateTimeZone($timeZoneInsert));
        $select_week->date_ini = $date_ini_week->format('Y-m-d');
        $select_week->date_ini_day = $date_ini_week->format('D');

        switch ($day_week) {
            case 'Mon':
                $aux_date->modify('+1 week');
                $select_week->type = 'normal';
                break;

            case 'Tue':
                $aux_date->modify('+6 days');
                $select_week->type = 'medium';
                break;

            case 'Wed':
                $aux_date->modify('+5 days');
                $select_week->type = 'medium';
                break;

            case 'Thu':
                $aux_date->modify('+4 days');
                $select_week->type = 'medium';
                break;

            case 'Fri':
                $aux_date->modify('+3 days');
                $select_week->type = 'medium';
                break;

            case 'Sat':
                $aux_date->modify('+2 days');
                $select_week->type = 'medium';
                break;

            case 'Sun':
                $aux_date->modify('+1 days');
                $select_week->type = 'medium';
                break;

            default:
                $select_week->type = 'normal';
                break;
        }

        $date_end_week = new DateTime($aux_date->format('Y-m-d'), new DateTimeZone($timeZoneInsert));


        if ($date_end_week > $advance) {
            $date_end_week = new DateTime($advance->format('Y-m-d'), new DateTimeZone($timeZoneInsert));
        } else {
            // only for show, rest one day in date_end
            $date_end_week->modify('-1 days');
        }

        $select_week->date_end = $date_end_week->format('Y-m-d');
        $select_week->date_end_day = $date_end_week->format('D');

        switch ($select_week->date_end_day) {
            case 'Mon':
                $select_week->type = 'medium';
                break;

            case 'Tue':
                $select_week->type = 'medium';
                break;

            case 'Wed':
                $select_week->type = 'medium';
                break;

            case 'Thu':
                $select_week->type = 'medium';
                break;

            case 'Fri':
                $select_week->type = 'medium';
                break;

            case 'Sat':
                $select_week->type = 'medium';
                break;

            default:
                break;
        }

        $interval = $date_ini_week->diff($date_end_week);
        $interval_one = $interval->format('%a') + 1;
        $select_week->interval = $interval_one;

        // put days to show in the table.
        $select_week->days = array();
        $day_ini_for = new DateTime($date_ini_week->format('Y-m-d'), new DateTimeZone($timeZoneInsert));

        for ($i = 0; $i < $interval_one; $i++) {

            $select_week->days[$i] = new stdClass();
            $select_week->days[$i]->day = $day_ini_for->format('d') . ' - ' . $day_ini_for->format('F');
            $select_week->days[$i]->holiday = false;
            if (in_array($day_ini_for->format('Y-m-d'), $holidays_days)) {
                $select_week->days[$i]->holiday = true;
            }
            $day_ini_for->modify('+1 day');
        }

        if ($date_ini_week == $break_ini_aux && $date_end_week == $break_end_aux) {
            $select_week->type = 'break';
            $change_break = true;
        }
        /* if($date_ini_week!=$break_ini_aux && $date_end_week!=$break_end_aux){
          array_push($array_weeks, $select_week);
          } */
        array_push($array_weeks, $select_week);
        $cont_alternative++;
    }


    return $array_weeks;
}

function generateColorRGBA(){    

    $r = mt_rand(128, 255);
    $g = mt_rand(128, 255);
    $b = mt_rand(128, 255);
    $a = '0.5';
    $rgba = 'rgba('.$r.','.$g.','.$b.','.$a.')';

    return $rgba;
}


//

?>