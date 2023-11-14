<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// ESTA FUNCIÓN HAY QUE CAMBIARLA POR LO NUEVO
function orderSessionsStudents($sessions, $byUni = false) {

	$new_sessions = array();

	if (!$byUni) {
	    
	    foreach ($sessions as $ses) {

		$id_course = $ses->id_course;
		$id_university = $ses->id_university;
		$id_session = $ses->id_student_session;

		if (empty($new_sessions[$id_course])) {

		    $new_sessions[$id_course] = new stdClass();
		    $new_sessions[$id_course]->sessions = array();

		    $new_sessions[$id_course]->id_course = $id_course;
		    $new_sessions[$id_course]->id_university = $id_university;
		    $new_sessions[$id_course]->name_course = $ses->name_course;
		    $new_sessions[$id_course]->name_university = $ses->name_university;
		    $new_sessions[$id_course]->date_ini_course = $ses->date_ini_course;
		    $new_sessions[$id_course]->duration_course = $ses->duration_course;
		    $new_sessions[$id_course]->students_class = $ses->students_class;
		    $new_sessions[$id_course]->id_type_course = $ses->id_type_course;
		    $new_sessions[$id_course]->weeks_to_do = $ses->weeks_to_do;
		    $new_sessions[$id_course]->max_ses_day = $ses->max_ses_day;
		    $new_sessions[$id_course]->closed = $ses->closed;
		    $new_sessions[$id_course]->date_closed = $ses->date_closed;
		    $new_sessions[$id_course]->free_course = $ses->free_course;
		    $new_sessions[$id_course]->large_name = $ses->large_name;
		}


		if (empty($new_sessions[$id_course]->sessions[$id_session])) {

		    $new_sessions[$id_course]->sessions[$id_session] = new stdClass();

		    $new_sessions[$id_course]->sessions[$id_session]->date_select_ini = $ses->date_select_ini;
		    $new_sessions[$id_course]->sessions[$id_session]->date_select_end = $ses->date_select_end;
		    $new_sessions[$id_course]->sessions[$id_session]->id_coach = $ses->id_coach;
		    $new_sessions[$id_course]->sessions[$id_session]->id_user = $ses->id_user;
		    $new_sessions[$id_course]->sessions[$id_session]->attendance = $ses->attendance;
		    $new_sessions[$id_course]->sessions[$id_session]->missed = $ses->missed;
		    $new_sessions[$id_course]->sessions[$id_session]->from_makeup = $ses->from_makeup;
		    $new_sessions[$id_course]->sessions[$id_session]->from_extra = $ses->from_extra;
		    $new_sessions[$id_course]->sessions[$id_session]->id_recording = $ses->id_recording;
		    $new_sessions[$id_course]->sessions[$id_session]->id_student_session = $ses->id_student_session;
		    $new_sessions[$id_course]->sessions[$id_session]->name_user = $ses->name_user;
		    $new_sessions[$id_course]->sessions[$id_session]->lastname_user = $ses->lastname_user;                    
                    $new_sessions[$id_course]->sessions[$id_session]->dateIniY = $ses->dateIniY;
                    $new_sessions[$id_course]->sessions[$id_session]->dateEndY = $ses->dateEndY;
                    $new_sessions[$id_course]->sessions[$id_session]->dateIniH = $ses->dateIniH;
                    $new_sessions[$id_course]->sessions[$id_session]->dateEndH = $ses->dateEndH;
                    $new_sessions[$id_course]->sessions[$id_session]->id_course = $id_course;
		    $new_sessions[$id_course]->sessions[$id_session]->timezone = $ses->timezone;
		    $new_sessions[$id_course]->sessions[$id_session]->not_attended_by_coach = $ses->not_attended_by_coach;
		    $new_sessions[$id_course]->sessions[$id_session]->comments = $ses->comments;
		    
		    if(!empty($ses->id_feedback)){
			
			$new_sessions[$id_course]->sessions[$id_session]->id_feedback = $ses->id_feedback;
			$new_sessions[$id_course]->sessions[$id_session]->is_puntual_session = $ses->is_puntual_session;
			
		    }
		    
		}

                
	    }
	    
	} else {
	    
	    foreach ($sessions as $ses) {

		$id_course = $ses->id_course;
		$id_university = $ses->id_university;
		$id_session = $ses->id_student_session;
		
		if (empty($new_sessions[$id_university])) {

		    $new_sessions[$id_university] = new stdClass();
		    $new_sessions[$id_university]->courses = array();

		    $new_sessions[$id_university]->id_university = $id_university;
		    $new_sessions[$id_university]->name_university = $ses->name_university;
		}

		if (empty($new_sessions[$id_university]->courses[$id_course])) {

		    $new_sessions[$id_university]->courses[$id_course] = new stdClass();
		    $new_sessions[$id_university]->courses[$id_course]->sessions = array();

		    $new_sessions[$id_university]->courses[$id_course]->id_course = $id_course;
		    $new_sessions[$id_university]->courses[$id_course]->name_course = $ses->name_course;
		    $new_sessions[$id_university]->courses[$id_course]->date_ini_course = $ses->date_ini_course;
		    $new_sessions[$id_university]->courses[$id_course]->duration_course = $ses->duration_course;
		    $new_sessions[$id_university]->courses[$id_course]->students_class = $ses->students_class;
		    $new_sessions[$id_university]->courses[$id_course]->id_type_course = $ses->id_type_course;
		    $new_sessions[$id_university]->courses[$id_course]->weeks_to_do = $ses->weeks_to_do;
		    $new_sessions[$id_university]->courses[$id_course]->max_ses_day = $ses->max_ses_day;
		    $new_sessions[$id_university]->courses[$id_course]->closed = $ses->closed;
		    $new_sessions[$id_university]->courses[$id_course]->date_closed = $ses->date_closed;
		    $new_sessions[$id_university]->courses[$id_course]->free_course = $ses->free_course;
		    $new_sessions[$id_university]->courses[$id_course]->large_name = $ses->large_name;
		}


		if (empty($new_sessions[$id_university]->courses[$id_course]->sessions[$id_session])) {

		    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session] = new stdClass();

		    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->date_select_ini = $ses->date_select_ini;
		    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->date_select_end = $ses->date_select_end;
		    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->id_coach = $ses->id_coach;
		    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->id_user = $ses->id_user;
		    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->attendance = $ses->attendance;
		    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->missed = $ses->missed;
		    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->from_makeup = $ses->from_makeup;
		    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->from_extra = $ses->from_extra;
		    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->id_recording = $ses->id_recording;
		    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->id_student_session = $ses->id_student_session;
                    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->dateIniY = $ses->dateIniY;
                    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->dateEndY = $ses->dateEndY;
                    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->dateIniH = $ses->dateIniH;
                    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->dateEndH = $ses->dateEndH;
		    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->name_user = $ses->name_user;
		    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->lastname_user = $ses->lastname_user; 
		    $new_sessions[$id_university]->courses[$id_course]->sessions[$id_session]->timezone = $ses->timezone; 
		}
	    }
	    
	}

	return $new_sessions;
	
    }


/**
 * Order an array of users  to show the information data correctly.
 * @param Array $users
 * @return Array
 */
function orderUser($users, $flex = false) {

    $new_user = array();

    if (!empty($users)) {

        foreach ($users as $key => $user) {

            $id_user = $user->user_id;
            $id_language = $user->id_language;
            $id_hobby = $user->id_hobby;
            $id_incentive = $user->id_incentive;
            $id_salary_lang = $user->id_salary_lang;
            $id_university = $user->id_university;
            $id_course = $user->course_id;

            // --- Add new user
            if (empty($new_user[$id_user])) {
                $new_user[$id_user] = new stdClass();
                $new_user[$id_user]->languages = array();
                $new_user[$id_user]->hobbies = array();
                $new_user[$id_user]->incentives = array();
                $new_user[$id_user]->salary = array();
                $new_user[$id_user]->universities = array();
            }

            $new_user[$id_user]->id_user = $user->user_id;
            $new_user[$id_user]->email = $user->email;
            $new_user[$id_user]->name_user = $user->name_user;
            $new_user[$id_user]->lastname_user = $user->lastname_user;
            $new_user[$id_user]->rol = $user->rol;
            $new_user[$id_user]->active = $user->active;
            $new_user[$id_user]->blocked = $user->blocked;
            $new_user[$id_user]->attempts = $user->attempts;
            $new_user[$id_user]->is_private = $user->is_private;
            $new_user[$id_user]->nickname = $user->nickname;
            $new_user[$id_user]->phone = $user->phone;
            $new_user[$id_user]->whatsapp = $user->whatsapp;
            $new_user[$id_user]->id_zone = $user->id_zone;
            $new_user[$id_user]->id_country = $user->id_country;
            $new_user[$id_user]->user_description = $user->user_description;
            $new_user[$id_user]->url_photo = $user->url_photo;
            $new_user[$id_user]->password = $user->password;
            $new_user[$id_user]->lingro_student = $user->lingro_student;
            $new_user[$id_user]->large_name = $user->large_name;
            $new_user[$id_user]->id_user_zoom = $user->id_user_zoom;
            $new_user[$id_user]->zoom_mail = $user->zoom_mail;
            $new_user[$id_user]->start_url = $user->start_url;
            $new_user[$id_user]->uuid = $user->uuid;
            $new_user[$id_user]->pmi = $user->pmi;
            $new_user[$id_user]->host_id = $user->host_id;
            $new_user[$id_user]->id_user_zoom = $user->id_user_zoom;
            $new_user[$id_user]->created = $user->created;
            $new_user[$id_user]->created_by = $user->created_by;
            $new_user[$id_user]->modified = $user->modified;
            $new_user[$id_user]->modified_by = $user->modified_by;
            $new_user[$id_user]->skype = $user->skype;
            $new_user[$id_user]->coach_trainee = $user->coach_trainee;
            /* $new_user[$id_user]->evaluation_1 = $user->evaluation_1;
              $new_user[$id_user]->evaluation_2 = $user->evaluation_2;
              $new_user[$id_user]->date_evaluation_1 = $user->date_evaluation_1;
              $new_user[$id_user]->date_evaluation_2 = $user->date_evaluation_2; */
            if ($user->rol == 7 || $user->rol == 10) {
                $new_user[$id_user]->full_name = $user->full_name;
                $new_user[$id_user]->bank_name = $user->bank_name;
                $new_user[$id_user]->bank_account = $user->bank_account;
                $new_user[$id_user]->other_type_pay = $user->other_type_pay;
                $new_user[$id_user]->bank_observations = $user->bank_observations;
                $new_user[$id_user]->ind = $user->ind;
                $new_user[$id_user]->currency = $user->currency;
                $new_user[$id_user]->swift = $user->swift;
                $new_user[$id_user]->address = $user->address;
                $new_user[$id_user]->postal_code = $user->postal_code;
                $new_user[$id_user]->city = $user->city;
                $new_user[$id_user]->paypal_email = $user->paypal_email;
                $new_user[$id_user]->fixed_salary = $user->fixed_salary;
                $new_user[$id_user]->id_user_coor = $user->id_user_coor;
                $new_user[$id_user]->semestre_1 = $user->semestre_1;
                $new_user[$id_user]->semestre_2 = $user->semestre_2;
                $new_user[$id_user]->nom = $user->nom;
                $new_user[$id_user]->iso2 = $user->iso2;
                $new_user[$id_user]->coach_pagador = $user->coach_pagador;
                $new_user[$id_user]->coach_level = $user->coach_level;
            }
            $new_user[$id_user]->id_country_live = $user->id_country_live;
            $new_user[$id_user]->coach_flex = $user->coach_flex;
            $new_user[$id_user]->coach_flex_assigned = $user->coach_flex_assigned;
            $new_user[$id_user]->who_login = $user->who_login;
            $new_user[$id_user]->last_login = $user->last_login;
            $new_user[$id_user]->hash_remember = $user->hash_remember;
            $new_user[$id_user]->emailsReception = $user->emailsReception;
            $new_user[$id_user]->emailsMarketing = $user->emailsMarketing;
            $new_user[$id_user]->coach_pagador = $user->coach_pagador;
            $new_user[$id_user]->erased = $user->erased;
            if (!empty($user->erased_user)) {
                $new_user[$id_user]->erased = $user->erased_user;
            }

            // country live
            /* if(!empty($user->id_country_live)){

              $country = new countryModel();
              $result_country = $country->select('id_country='.intval($user->id_country_live));
              $new_user[$id_user]->id_country_live = $user->id_country_live;
              $new_user[$id_user]->nom_country_live = $result_country[0]->nom;

              } */

            // --- Add new language
            if (empty($new_user[$id_user]->languages[$id_language])) {
                $new_user[$id_user]->languages[$id_language] = new stdClass();
            }

            $new_user[$id_user]->languages[$id_language]->name_language = $user->name_language;
            $new_user[$id_user]->languages[$id_language]->id_language = $user->id_language;

            // --- Add new hobby
            if (!empty($id_hobby)) {
                if (empty($new_user[$id_user]->hobbies[$id_hobby])) {
                    $new_user[$id_user]->hobbies[$id_hobby] = new stdClass();
                }


                $new_user[$id_user]->hobbies[$id_hobby]->id_hobby = $user->id_hobby;
                $new_user[$id_user]->hobbies[$id_hobby]->description_hobby = $user->description_hobby;
            }

            // --- Add incentive if exist.
            if (!empty($id_incentive)) {
                if (empty($new_user[$id_user]->incentives[$id_incentive])) {
                    $new_user[$id_user]->incentives[$id_incentive] = new stdClass();
                }

                $new_user[$id_user]->incentives[$id_incentive]->id_incentive = $id_incentive;
                $new_user[$id_user]->incentives[$id_incentive]->type_incentive = $user->type_incentive;
                $new_user[$id_user]->incentives[$id_incentive]->incentive = $user->incentive;
                $new_user[$id_user]->incentives[$id_incentive]->date_incentive = $user->date_incentive;
                $new_user[$id_user]->incentives[$id_incentive]->see = true;
            }

            // --- Add salary if exist.

            if (empty($new_user[$id_user]->salary[$id_salary_lang])) {
                $new_user[$id_user]->salary[$id_salary_lang] = new stdClass();
            }


            $new_user[$id_user]->salary[$id_salary_lang]->id_language = $id_salary_lang;
            $new_user[$id_user]->salary[$id_salary_lang]->fixed_salary = $user->fixed_salary;
            $new_user[$id_user]->salary[$id_salary_lang]->salary_hour = $user->salary_hour;


            // --- Add university
            if (!empty($id_university)) {

                if (empty($new_user[$id_user]->universities[$id_university])) {
                    $new_user[$id_user]->universities[$id_university] = new stdClass();
                    $new_user[$id_user]->universities[$id_university]->courses = array();
                }


                $new_user[$id_user]->universities[$id_university]->id_university = $id_university;
                $new_user[$id_user]->universities[$id_university]->name_university = $user->name_university;

                if (!empty($id_course)) {

                    if (empty($new_user[$id_user]->universities[$id_university]->courses[$id_course])) {


                        $new_user[$id_user]->universities[$id_university]->courses[$id_course] = new stdClass();
                    }

                    $new_user[$id_user]->universities[$id_university]->courses[$id_course]->id_course = $id_course;
                    $new_user[$id_user]->universities[$id_university]->courses[$id_course]->name_course = $user->name_course;

                    if ($user->rol == 4) {

                        $block = new coursesCoordinatorsModel();
                        $where_block = "id_course=$id_course AND id_coor=$id_user AND see_course=0";
                        $result_block = $block->select($where_block);

                        if (count($result_block) > 0) {
                            $new_user[$id_user]->universities[$id_university]->courses[$id_course]->block = 1;
                        } else {
                            $new_user[$id_user]->universities[$id_university]->courses[$id_course]->block = 0;
                        }
                    }
                } // end empty course.
            }// end empty university.
        } // end foreach users.
    }

    return $new_user;
}

function orderNewAvailability($schedule) {

    $newSche = array();

    foreach ($schedule as $sche) {

        if (!empty($sche->date_schedule_start)) {

            $index = $sche->date_schedule_start . '-' . $sche->date_schedule_end;
            $day = $sche->day_week_schedule;
            $hour_from = $sche->date_time_start;
            $hour_to = $sche->date_time_end;
            $time = $hour_from . '-' . $hour_to;
            $hour = $sche->time_from_schedule;
            $date_start = explode(' ', $sche->date_schedule_start);
            $date_end = explode(' ', $sche->date_schedule_end);

            if (empty($newSche[$index])) {

                $newSche[$index] = new stdClass();
                $newSche[$index]->times = array();
                $newSche[$index]->hours = array();
            }

            array_push($newSche[$index]->hours, $sche);

            $newSche[$index]->id_coach = $sche->id_coach;
            $newSche[$index]->date_schedule_start = $sche->date_schedule_start;
            $newSche[$index]->date_schedule_end = $sche->date_schedule_end;
            $newSche[$index]->date_start = $date_start[0];
            $newSche[$index]->date_end = $date_end[0];
            $newSche[$index]->time_from_schedule = $hour_from;
            $newSche[$index]->time_to_schedule = $hour_to;

            if (empty($newSche[$index]->times[$time])) {

                $newSche[$index]->times[$time] = new stdClass();
                $newSche[$index]->times[$time]->days = array();
            }

            $newSche[$index]->times[$time]->hour_from = $hour_from;
            $newSche[$index]->times[$time]->hour_to = $hour_to;
            $newSche[$index]->times[$time]->hour_from = $hour_from;
            $newSche[$index]->times[$time]->break_from = $sche->break_time_start;
            $newSche[$index]->times[$time]->break_to = $sche->break_time_end;

            if (empty($newSche[$index]->times[$time]->days[$day])) {

                $newSche[$index]->times[$time]->days[$day] = new stdClass();
                //$newSche[$index]->times[$time]->days[$day]->hours = array();

                switch ($day) {
                    case 'Mon':
                        $newSche[$index]->times[$time]->monday = true;
                        break;
                    case 'Tue':
                        $newSche[$index]->times[$time]->tuesday = true;
                        break;
                    case 'Wed':
                        $newSche[$index]->times[$time]->wednesday = true;
                        break;
                    case 'Thu':
                        $newSche[$index]->times[$time]->thursday = true;
                        break;
                    case 'Fri':
                        $newSche[$index]->times[$time]->friday = true;
                        break;
                    case 'Sat':
                        $newSche[$index]->times[$time]->saturday = true;
                        break;
                    case 'Sun':
                        $newSche[$index]->times[$time]->sunday = true;
                        break;

                    default:
                        break;
                }
            }

            $newSche[$index]->times[$time]->days[$day]->day_week_schedule = $sche->day_week_schedule;
        }
    }

    return $newSche;
}


function selectCoachesCourse($coaches, $hour_ini, $hour_end,$dateSelect,$course,$timeZoneUniversity) {
    
    $new_coaches_course = array();
    $new_coaches = array();
    $new_coaches_university = array();
    $array_total = new stdClass();
    $array_total->course = array();
    $array_total->other = array();

    $yearCourse = $course->year;
    $semesterCourse = $course->semester_id;
    //$id_university = $course->id_university;
    $durationCourse = $course->duration_course;

    // Eliminamos duplicados
    $coaches = array_unique($coaches, SORT_REGULAR);

    $dateCompare = new DateTime($dateSelect . ' ' . $hour_ini, new DateTimeZone($timeZoneUniversity));

    // check 12 hours
    $dateIni24 = new DateTime('now');
    $dateIni24->modify('+12 hours');
    $dateIni24->setTimezone(new DateTimeZone($timeZoneUniversity));

    if ($dateCompare > $dateIni24) {

        $array_total->hours_24 = 0;
        $totalSelectFree = 0;

        // GABALA
        $a_or_1d = array();
        $a_or_2d1 = array();
        $a_or_2d2 = array();
        $mi_where = "";
        $mi_where1 = "";
        $mi_where2 = "";

        foreach ($coaches as $keyCoach => $coach) {

            $dateSearchStart = new DateTime($dateSelect . " " . $hour_ini, new DateTimeZone($timeZoneUniversity));
            $dateSearchEnd = new DateTime($dateSelect . " " . $hour_end, new DateTimeZone($timeZoneUniversity));

            $dateSearchStart->setTimezone(new DateTimeZone($coach->large_name));
            $dateSearchEnd->setTimezone(new DateTimeZone($coach->large_name));

            $dateSearchCoachStart = $dateSearchStart->format('Y-m-d');
            $dateSearchCoachEnd = $dateSearchEnd->format('Y-m-d');

            // si cambia el día entre el inicio y fin hay que hacer dos búsquedas cortando la hora

            if ($dateSearchCoachStart != $dateSearchCoachEnd) {
                $hour_ini_aux = $dateSearchStart->format('H:i:s');
                $hour_end_aux = '00:00:00';
                $a_or_1d1[] = "(coach_id=$coach->id_user AND schedule_date='$dateSearchCoachStart' AND time_from_schedule BETWEEN '$hour_ini_aux' AND '$hour_end_aux')";

                $hour_ini_aux = '00:00:00';
                $hour_end_aux = $dateSearchEnd->format('H:i:s');
                $a_or_1d2[] = "(coach_id=$coach->id_user AND schedule_date='$dateSearchCoachEnd' AND time_from_schedule BETWEEN '$hour_ini_aux' AND '$hour_end_aux')";

                $mi_where1 = "semester_id=$semesterCourse AND year=$yearCourse AND blocked_ses=0 AND (" . implode(" OR ", $a_or_2d1) . ")";
                $mi_where2 = "semester_id=$semesterCourse AND year=$yearCourse AND blocked_ses=0 AND (" . implode(" OR ", $a_or_2d2) . ")";
            } else {
                $a_or_1d[] = "(coach_id=$coach->id_user AND schedule_date='$dateSearchCoachStart' AND time_from_schedule BETWEEN '" . $dateSearchStart->format('H:i:s') . "' AND '" . $dateSearchEnd->format('H:i:s') . "')";
                $mi_where = "semester_id=$semesterCourse AND year=$yearCourse AND blocked_ses=0 AND (" . implode(" OR ", $a_or_1d) . ")";
            }
        }

        $coaches_agenda = array();
        $schedule = new coachScheduleNewModel();
        if ($mi_where != "") {
            $aux_schedule = $schedule->select($mi_where);
            foreach ($aux_schedule as $v) {
                $coaches_agenda[$v->coach_id][] = $v;
            }
        }
        if ($mi_where1 != "" && $mi_where2 != "") {

            $aux_schedule1 = $schedule->select($mi_where1);
            $aux_schedule2 = $schedule->select($mi_where2);
            $aux_schedule = array_merge($aux_schedule1, $aux_schedule2);

            foreach ($aux_schedule as $v) {
                $coaches_agenda[$v->coach_id][] = $v;
            }
        }
        
        // Fin GABALA
        //echo print_r($coaches);
        foreach ($coaches as $keyCoach => $coach) {

            if ($totalSelectFree >= 2) {
                break;
            }

            $hob = new hobbiesUsersModel();
            $result_hob = $hob->select("id_user=$coach->id_user");

            $new_arr = array();
            foreach ($result_hob as $category) {
                $new_arr[] = $category->description_hobby;
            }
            $coach->description_hobby = implode(',', $new_arr);

            $result_schedule = $coaches_agenda[$coach->id_user];

            // ahora vemos si tiene ese curso, porcentaje de ocupación de ese día,etc
            $found = false;
            $free = 0;
            $occ = 0;
            $select_free = 0;
            $total_ses = count($result_schedule);
            $total_occ = false;
            $diffCourse = 0;
            $countOcc = 0;
            $countSes = 0;
            $maxSessionsRow = 0;
            $sessionsRow = 0;

            // Según los minutos de la sesión tienen que existir X huecos seguidos, sino no está disponible.
            //if ($durationCourse == 45 && count($result_schedule) == 3 || $durationCourse == 30 && count($result_schedule) == 2 || $durationCourse == 15 && count($result_schedule) == 1) {
            if ( ($durationCourse == 45 && $total_ses >= 3) || ($durationCourse == 30 && $total_ses >= 2) || ($durationCourse == 15 && $total_ses >= 1) ) {

                foreach ($result_schedule as $sch) {

                    $inRow = false;

                    $valueC = 'count' . $countSes;

                    if ($sch->is_occ == 1) {

                        $occ++;

                        if ($sch->occ_max <= $sch->actual_occ && !empty($sch->occ_max)) {

                            $countOcc++;
                        } else if ($sch->course_id == $course->course_id) {

                            if (!$found) {

                                $found = true;
                                //break;
                            }

                            if ($sch->occ_max > $sch->actual_occ) {
                                $select_free++;
                                $inRow = true;
                            }

                            $sessionsRow++;
                        } else if (!empty($sch->course_id)) {
                            $diffCourse++;
                            $countOcc++;
                        }
                    } else {

                        $inRow = true;
                        $free++;
                        $sessionsRow++;
                    }

                    // Esto quiere decir que no es una sesión seguida.
                    if (!$inRow) {

                        if ($sessionsRow > $maxSessionsRow) {
                            $maxSessionsRow = $sessionsRow;
                        }
                        $sessionsRow = 0;
                    }

                    $countSes++;
                } // end foreach reschedule
                
                // Si $inRow nunca ha sido false hay que actualizar maxSessionsRow. Así aseguramos que se actualice el valor de maxSessionsRow                    
                if ($sessionsRow > $maxSessionsRow) {

                    $maxSessionsRow = $sessionsRow;
                }

                if (($course->duration_course == 30 && $maxSessionsRow < 2) ) {
                    $total_occ = true;
                }

                if ($course->duration_course == 45 && $maxSessionsRow < 3 ) {
                    $total_occ = true;
                }

                if ($course->duration_course == 15 && empty($maxSessionsRow)) {

                    $total_occ = true;
                }

                // máximo ocupado
                if (!empty($total_ses)) {

                    $coach->occ_day = round(($occ * 100) / $total_ses, 2);
                } else {

                    $coach->occ_day = 0;
                }

                $coach->select_free = $select_free; // esto quiere decir que tiene sesiones de ese curso sin rellenar del todo.
                $coach->free = $free; //tiene libres, o sea a 0
                //
                // ocupación del semestre
                $occSemester = new coachOccTermModel();
                $result_occ_semester = $occSemester->select("coach_id=$coach->id_user AND semester_id=$semesterCourse AND year=$yearCourse");

                if (!empty($result_occ_semester)) {

                    //$coaches[$keyCoach]->occ_semester = $result_occ_semester[0]->percentage;
                    $coach->occ_semester = $result_occ_semester[0]->percentage;
                } else {

                    //$coaches[$keyCoach]->occ_semester = 0;
                    $coach->occ_semester = 0;
                }

                // si tienen cursos diferentes en todos los intervalos lo descarto.
                if ($diffCourse == $total_ses) {
                    $total_occ = true;
                }

                if ($countOcc == $total_ses) {

                    $total_occ = true;
                }
                
                                
                /*if($coach->id_user==52760){
                    
                    echo "<br> Max sessions row: $maxSessionsRow";
                    echo "<br> Total sessions: $total_ses";
                    echo "<br> Ocupadas: $countOcc";
                    echo "<br> Cursos diferentes: $diffCourse";
                    
                }*/

                // Esto para la ordenación
                if (!$found && !empty($result_schedule) && !$total_occ) {

                    // primero ver si tiene ese curso en otros días u otras horas.
                    $coachCourses = new coachCoursesModel();
                    $result_coach_courses = $coachCourses->select("coach_id=$coach->id_user AND course_id=$course->course_id");

                    if (!empty($result_coach_courses)) {

                        array_push($new_coaches_course, $coach);
                        
                    } else {

                        // vemos si tiene la universidad otro día
                        $result_coach_courses = $coachCourses->select("coach_id=$coach->id_user AND university_id=$course->id_university");

                        if (!empty($result_coach_courses)) {

                            array_push($new_coaches_university, $coach);
                            
                        } else {
                            

                            if (!in_array($coach, $new_coaches)) {

                                array_push($new_coaches, $coach);
                            }
                        }
                    }
                } else if (!empty($result_schedule) && !$total_occ) {


                    array_push($new_coaches_course, $coach);
                }


                if ($coach->select_free > 0) {
                    $totalSelectFree++;
                }
            }
        }// each coach
    
    // ahora vemos que resultados de cada uno y unimos los arrays o no. Como máximo 6 coaches. aunque si hay los del curso se puede dejar en tres.
    array_multisort(array_column($new_coaches_course, 'select_free'), SORT_DESC,array_column($new_coaches_course, 'occ_semester'), SORT_ASC,$new_coaches_course);

    //array_multisort(array_column($new_coaches_university, 'occ_semester'), SORT_DESC,array_column($new_coaches_university, 'occ_day'), SORT_ASC,$new_coaches_university);
    array_multisort(array_column($new_coaches_university, 'occ_semester'), SORT_DESC,array_column($new_coaches_university, 'free'), SORT_ASC,$new_coaches_university);

    //array_multisort(array_column($new_coaches, 'occ_semester'), SORT_DESC,array_column($new_coaches, 'occ_day'), SORT_ASC,$new_coaches);
    array_multisort(array_column($new_coaches, 'occ_semester'), SORT_DESC,array_column($new_coaches, 'free'), SORT_ASC,$new_coaches);
    
    
    if (!empty($new_coaches_course)) {

        $max = count($new_coaches_course) - 3;

        //si hay menos de tres elementos en los coaches que tienen el mismo curso, completo con alguno del resto si hubiese.
        if ($max < 0) {

            $select = 0;
            $selectAll = 0;
            for ($i = $max; $i <= 0; $i++) {

                if (!empty($new_coaches_university[$select])) {

                    array_push($new_coaches_course, $new_coaches_university[$select]);
                    unset($new_coaches_university[$select]);
                    $select++;
                } else if (!empty($new_coaches[$selectAll])) {

                    array_push($new_coaches_course, $new_coaches[$selectAll]);
                    unset($new_coaches[$selectAll]);
                    $selectAll++;
                }
            }

            if (!empty($new_coaches_course[0])) {
                array_push($array_total->course, $new_coaches_course[0]);
            }

            if (!empty($new_coaches_course[1])) {
                array_push($array_total->course, $new_coaches_course[1]);
            }

            if (!empty($new_coaches_course[2])) {
                array_push($array_total->course, $new_coaches_course[2]);
            }
            
        } else if ($max > 0) {

            
            if (!empty($new_coaches_course[0])) {
                array_push($array_total->course, $new_coaches_course[0]);
            }

            if (!empty($new_coaches_course[1])) {
                array_push($array_total->course, $new_coaches_course[1]);
            }

            if (!empty($new_coaches_course[2])) {
                array_push($array_total->course, $new_coaches_course[2]);
            }

        }
    } else {
        
        // Si no hay ninguno, pues cojo del resto
        $select = 0;
        $selectAll = 0;
        for ($i = 0; $i < 3; $i++) {

            if (!empty($new_coaches_university[$select])) {

                array_push($array_total->course, $new_coaches_university[$select]);
                unset($new_coaches_university[$select]);
                $select++;
            } else if (!empty($new_coaches[$selectAll])) {

                array_push($array_total->course, $new_coaches[$selectAll]);
                unset($new_coaches[$selectAll]);
                $selectAll++;
            }
        }

        
    }

    if(!empty($new_coaches_university) && empty($array_total->other) && empty($array_total->course)){
  
        $cont = count($array_total->other);
        foreach ($new_coaches_university as $aux) {
            
            if($cont==3){
                break;
            }
            
            array_push($array_total->other, $aux);
            
            $cont++;
            
        }
        
    }
    
    if(count($array_total->other)<3 && empty($array_total->course)){
        
        $key = array_key_first($new_coaches);
        
        for ($i = count($array_total->other); $i < 3; $i++) {

            if (!empty($new_coaches[$key])) {

                array_push($array_total->other, $new_coaches[$key]);
                unset($new_coaches[$key]);
                $key++;
            } 
        }
    }
    
    if(empty($array_total->course) && !empty($array_total->other)){
        
        $array_total->course = $array_total->other;
        $array_total->other = [];
        
    }

}else{
    $array_total->hours_24 = 1;
}

/*echo "total:";
echo print_r($array_total);*/
    return $array_total;
}


function searchTimesCoach($course,$hour_ini,$hour_end,$dateSelect,$coach_id,$timeZoneUniversity){
    
    $durationCourse = $course->duration_course; 
    $hour_end_search = new DateTime($dateSelect." ".$hour_end);
    $yearCourse = $course->year;
    $semesterCourse = $course->semester_id;

    //$hours = generateHours($hour_ini, $hour_end_search->format('H:i:s'), $durationCourse);
    $hour_end_search->modify('-1 minute');
    //echo print_r($hour_end_search);
    $hours = generateHours($hour_ini, $hour_end_search->format('H:i:s'), $durationCourse);
    
    //echo "<pre>";echo print_r($hours);echo "</pre>";
    //---------------------------
    
    $totalTimes = array();
    $durationSQL = intval($durationCourse - 1); // for msyql between
    foreach ($hours as $key => $hour) {
        
        $totalTimes[$hour] = new stdClass();        
        
        $selecthour_ini_aux = new DateTime($dateSelect." ".$hour);
        $selecthour_end_aux = new DateTime($dateSelect." ".$hour);
        $selecthour_end_aux->modify('+'.$durationSQL.' minutes');
        $totalTimes[$hour]->hour_ini = strtoupper($selecthour_ini_aux->format('g:i A'));
        $totalTimes[$hour]->hour_end = $selecthour_end_aux->format('H:i');

        // zona horaria coach
        $model_user = new userModel();
        $result_user = $model_user->select("id_user=$coach_id", '', "lm_time_zones.large_name", " LEFT JOIN lm_time_zones USING(id_zone)");
        $timeZoneCoach = $result_user[0]->large_name;

        $dateSearchStart = new DateTime($dateSelect . " " . $hour, new DateTimeZone($timeZoneUniversity));
        $dateSearchEnd = new DateTime($dateSelect . " " . $selecthour_end_aux->format('H:i'), new DateTimeZone($timeZoneUniversity));
        $dateSearchStart->setTimezone(new DateTimeZone($timeZoneCoach));
        $dateSearchEnd->setTimezone(new DateTimeZone($timeZoneCoach));
        $dateSearchCoachStart = $dateSearchStart->format('Y-m-d');
        $dateSearchCoachEnd = $dateSearchEnd->format('Y-m-d');

        $result_schedule = array();
        $schedule = new coachScheduleNewModel();

        // si cambia el día entre el inicio y fin hay que hacer dos búsquedas cortando la hora
        if ($dateSearchCoachStart != $dateSearchCoachEnd) {

            $hour_ini_aux = $dateSearchStart->format('H:i:s');
            $hour_end_aux = '00:00:00';

            $where = "coach_id=$coach_id AND semester_id=$semesterCourse AND year=$yearCourse "
                    . "AND schedule_date='$dateSearchCoachStart' AND time_from_schedule BETWEEN '$hour_ini_aux' AND '$hour_end_aux' AND blocked_ses=0";

            $result_schedule_1 = $schedule->select($where);

            $hour_ini_aux = '00:00:00';
            $hour_end_aux = $dateSearchEnd->format('H:i:s');

            $where = "coach_id=$coach_id AND semester_id=$semesterCourse AND year=$yearCourse "
                    . "AND schedule_date='$dateSearchCoachEnd' AND time_from_schedule BETWEEN '$hour_ini_aux' AND '$hour_end_aux' AND blocked_ses=0";

            $result_schedule_2 = $schedule->select($where);

            $result_schedule = array_merge($result_schedule_1, $result_schedule_2);
        } else {

            $where = "coach_id=$coach_id AND semester_id=$semesterCourse AND year=$yearCourse "
                    . "AND schedule_date='$dateSearchCoachStart' AND time_from_schedule BETWEEN '".$dateSearchStart->format('H:i:s')."' AND '".$dateSearchEnd->format('H:i')."' AND blocked_ses=0";


            $result_schedule = $schedule->select($where);
        }
        
        //echo $where;
        //echo print_r($result_schedule);
        //echo "number: ".count($result_schedule);
        
        $occ = false;
        $sameCourse = true;
        $numberOcc = 0;
        $occMax = 0;
        $schedules = "";
        $first = true;
        $show = 0;
        
        if ( ($durationCourse == 45 && count($result_schedule) >= 3) || ($durationCourse == 30 && count($result_schedule) >= 2) || ($durationCourse == 15 && count($result_schedule) >= 1) ) {

            foreach ($result_schedule as $sch) {

                $show = 1;

                if (!empty($sch->is_occ)) { // si está a cero está libre
                    
                    if ($sch->course_id != $course->course_id && !empty($sch->course_id)) { 
                        // si es el mismo aunque haya estudiantes y no esté lleno puedo cogerla. Si no es el mismo no.
                        $occ = true; // si no es el mismo curso ya no puede coger este intervalo.
                        $sameCourse = false;
                    } else { // si es el mismo curso comprobamos la ocupación
                        if (($sch->actual_occ >= $sch->occ_max) && !empty($sch->occ_max)) {

                            $occ = true; // ya tiene ocupación máxima
                        }
                    }
                }

                if ($first) {

                    $first = false;
                    $schedules = $sch->schedule_id;
                } else {
                    $schedules .= ",$sch->schedule_id";
                }

                if ($sch->actual_occ > $numberOcc) {
                    $numberOcc = $sch->actual_occ;
                }

                if ($sch->occ_max > $occMax) {
                    $occMax = $sch->occ_max;
                }
            }
        } else {
            $occ = true;
        }
        if (!$occ) {

            $totalTimes[$hour]->occ = 0;
            $totalTimes[$hour]->schedules = $schedules;
            $totalTimes[$hour]->samecourse = $sameCourse;
            $totalTimes[$hour]->numberOcc = $numberOcc;
            $totalTimes[$hour]->occMax = $occMax;
            $totalTimes[$hour]->samecourse = $sameCourse;
            $totalTimes[$hour]->show = $show;
            $totalTimes[$hour]->available = $occMax - $numberOcc;
        } else {
            $totalTimes[$hour]->occ = 1;
            $totalTimes[$hour]->samecourse = $sameCourse;
            $totalTimes[$hour]->show = $show;
            $totalTimes[$hour]->occMax = $occMax;
        }
    }
    
    //echo print_r($totalTimes);


    return $totalTimes;
}

function searchTimesCoachNext($course, $hour_ini, $dateSelect, $coach_id, $timeZoneUniversity) {
    
    $todayAux = new DateTime('now');
    $todayAux->setTimezone(new DateTimeZone($timeZoneUniversity));

    $durationCourse = $course->duration_course;
    $hour_end_search = new DateTime($dateSelect . " " . $hour_ini);
    $hour_end_search->modify("+" . $durationCourse . " minutes");
    $yearCourse = $course->year;
    $semesterCourse = $course->semester_id;

    //---------------------------

    $totalTimes = new stdClass();
    $durationSQL = intval($durationCourse - 1); // for msyql between

    $selecthour_ini_aux = new DateTime($dateSelect . " " . $hour_ini);
    $selecthour_end_aux = new DateTime($dateSelect." ".$hour_ini);
    $selecthour_end_aux->modify('+'.$durationSQL.' minutes');
    $totalTimes->hour_ini = $selecthour_ini_aux->format('H:i');
    $totalTimes->hour_end = $selecthour_end_aux->format('H:i');

    // zona horaria coach
    $model_user = new userModel();
    $result_user = $model_user->select("id_user=$coach_id", '', "lm_time_zones.large_name", " LEFT JOIN lm_time_zones USING(id_zone)");
    $timeZoneCoach = $result_user[0]->large_name;

    $dateSearchStart = new DateTime($dateSelect . " " . $hour_ini, new DateTimeZone($timeZoneUniversity));
    $dateSearchEnd = new DateTime($dateSelect . " " . $selecthour_end_aux->format('H:i'), new DateTimeZone($timeZoneUniversity));
    
    //echo print_r($dateSearchStart);
    //echo print_r($dateSearchStart);
    $dateSearchStart->setTimezone(new DateTimeZone($timeZoneCoach));
    $dateSearchEnd->setTimezone(new DateTimeZone($timeZoneCoach));
    
    //echo print_r($dateSearchStart);
    //echo print_r($dateSearchStart);

    $dateSearchCoachStart = $dateSearchStart->format('Y-m-d');
    $dateSearchCoachEnd = $dateSearchEnd->format('Y-m-d');

    $result_schedule = array();
    $schedule = new coachScheduleNewModel();
    
    // OJO NO CAMBIAR LAS SESIONES ANTERIORES
    
    if ($dateSearchStart > $todayAux) {

        // si cambia el día entre el inicio y fin hay que hacer dos búsquedas cortando la hora

        if ($dateSearchCoachStart != $dateSearchCoachEnd) {

            $hour_ini_aux = $dateSearchStart->format('H:i:s');
            $hour_end_aux = '00:00:00';

            $where = "coach_id=$coach_id AND semester_id=$semesterCourse AND year=$yearCourse "
                    . "AND schedule_date='$dateSearchCoachStart' AND time_from_schedule BETWEEN '$hour_ini_aux' AND '$hour_end_aux' AND blocked_ses=0";

            $result_schedule_1 = $schedule->select($where);

            $hour_ini_aux = '00:00:00';
            $hour_end_aux = $dateSearchEnd->format('H:i:s');

            $where = "coach_id=$coach_id AND semester_id=$semesterCourse AND year=$yearCourse "
                    . "AND schedule_date='$dateSearchCoachEnd' AND time_from_schedule BETWEEN '$hour_ini_aux' AND '$hour_end_aux' AND blocked_ses=0";

            $result_schedule_2 = $schedule->select($where);

            $result_schedule = array_merge($result_schedule_1, $result_schedule_2);
        } else {

            $where = "coach_id=$coach_id AND semester_id=$semesterCourse AND year=$yearCourse "
                    . "AND schedule_date='$dateSearchCoachStart' AND time_from_schedule BETWEEN '" . $dateSearchStart->format('H:i:s') . "' AND '" . $dateSearchEnd->format('H:i') . "' AND blocked_ses=0";

            $result_schedule = $schedule->select($where);
        }

        /*echo $where;
        echo print_r($result_schedule);
        echo print_r($schedule);*/

        $occ = false;
        $sameCourse = true;
        $numberOcc = 0;
        $occMax = 0;
        $schedules_ids = "";
        $first = true;
        $show = 0;
        if ($durationCourse == 45 && count($result_schedule) == 3 || $durationCourse == 30 && count($result_schedule) == 2 || $durationCourse == 15 && count($result_schedule) == 1) {
            foreach ($result_schedule as $sch) {

                $show = 1;

                if (!empty($sch->is_occ)) { // si está a cero está libre, y si está a 1 es que algo hay cogido.
                    if ($sch->course_id != $course->course_id && !empty($sch->course_id)) {
                        $occ = true; // si no es el mismo curso ya no puede coger este intervalo.
                        $sameCourse = false;
                        $show = 0;
                    } else { // si es el mismo curso comprobamos la ocupación
                        if (($sch->actual_occ >= $sch->occ_max) && !empty($sch->occ_max)) {

                            $occ = true; // ya tiene ocupación máxima
                            $show = 0;
                        }
                    }
                }

                if ($first) {

                    $first = false;
                    $schedules_ids = $sch->schedule_id;
                } else {
                    $schedules_ids .= ",$sch->schedule_id";
                }

                if ($sch->actual_occ > $numberOcc) {
                    $numberOcc = $sch->actual_occ;
                }

                if ($sch->occ_max > $occMax) {
                    $occMax = $sch->occ_max;
                }
            }

            //echo print_r($schedules_ids);
        } else {
            $occ = true;
        }
        if (!$occ) {

            $totalTimes->occ = 0;
            $totalTimes->schedules = $schedules_ids;
            $totalTimes->samecourse = $sameCourse;
            $totalTimes->numberOcc = $numberOcc;
            $totalTimes->occMax = $occMax;
            $totalTimes->samecourse = $sameCourse;
            $totalTimes->show = $show;
            $totalTimes->available = $occMax - $numberOcc;
        } else {
            $totalTimes->occ = 1;
            $totalTimes->samecourse = $sameCourse;
            $totalTimes->show = $show;
            $totalTimes->occMax = $occMax;
        }

        $totalTimes->date = $dateSelect;
    } else {

        $totalTimes->occ = 1;
        $totalTimes->samecourse = 0;
        $totalTimes->show = 0;
        $totalTimes->occMax = 10;
    }

    //echo print_r($totalTimes);

    return $totalTimes;
}

function registerSessionCourse($course,$schedules,$id_user,$coach_id,$timeZoneUser,$week_id,$dateSelect,$hour_ini,$enroll_id,$isDateEnd,$fromRechedule=0,$idStudentSession=0){

    $durationCourse = $course->duration_course;
    $yearCourse = $course->year;
    $semesterCourse = $course->semester_id;
    //$id_university = $course->id_university;
    $resultado = new stdClass();
    $logs = new logsModel();
    $logs->setFolder('panel/');
    $logs->setFile_name('studentSessions.txt');
    
    $todayLog = new DateTime('now');
    
    $hour_ini_aux = new DateTime($dateSelect." ".$hour_ini);
    $hour_end = new DateTime($dateSelect." ".$hour_ini);
    $hour_end->modify('+'.$durationCourse.' minutes');
    
    // check 24 hours
    $dateIni24 = new DateTime('now');
    $dateIni24->setTimezone(new DateTimeZone($timeZoneUser));
    $hour_compare= new DateTime($dateSelect." ".$hour_ini,new DateTimeZone($timeZoneUser));
    $dateIni24->modify('+12 hours');

    if($dateIni24 >= $hour_compare) {
        
        $resultado->return = false;
        $resultado->msg = "Sessions must be scheduled at least 12 hours in advance.";
        return $resultado;
    }

        // hay que insertar en el estudiante, actualizar la tabla del coach y actualizar la tabla de cursos asignados al coach.
    $sessions = new studentsCourseSessionsNewModel();
    $coachSchedule = new coachScheduleNewModel();
    $coachCourses = new coachCoursesModel();
    
    $sessions->setId_user($id_user);
    $sessions->setEnroll_id($enroll_id);
    $sessions->setTimezone($timeZoneUser);
    $sessions->setCourse_id($course->course_id);
    
    $result_actual_session = array();
    
    if($isDateEnd==1){
        $sessions->setWeek_id($week_id);
        $result_actual_session = $sessions->select("week_id=$week_id AND enroll_id=$enroll_id");
        
        if($fromRechedule==1 && !empty($idStudentSession)){
            
            $result_actual_session = $sessions->select("id_student_session=$idStudentSession AND enroll_id=$enroll_id");
        }else{
            
            $result_actual_session = $sessions->select("week_id=$week_id AND enroll_id=$enroll_id");
        }
        
    }else{
        $sessions->setWeek_id(0);
        $sessions->setSession_id($week_id);
        
        if($fromRechedule==1 && !empty($idStudentSession)){
            
            $result_actual_session = $sessions->select("id_student_session=$idStudentSession AND enroll_id=$enroll_id");
        }else{
            
            $result_actual_session = $sessions->select("session_id=$week_id AND enroll_id=$enroll_id");
        }
        
        
    }
    
    $sessions->setId_coach($coach_id);
    $sessions->setDate_select_ini($dateSelect." ".$hour_ini_aux->format('H:i'));
    $sessions->setDate_select_end($hour_end->format('Y-m-d')." ".$hour_end->format('H:i'));
    $sessions->setAssigned(1);
    $sessions->setId_student_session($result_actual_session[0]->id_student_session);
    
    $result_update = $sessions->updateSession();
   
    if ($result_update) {
        
        // logs registro sessiones
        $logStu = new studentsLogsModel();
        $logStu->setId_student($id_user);
        $logStu->setDate_log($todayLog->format('Y-m-d H:i:s'));
        $ip_log = getRealIP();
        $logStu->setIp_log($ip_log);
        $log_desc = "";
        if (!empty($result_actual_session) && $fromRechedule == 1) {
            $log_desc = "Reschedule session. Old session: " . $result_actual_session[0]->date_select_ini . " - New session: " . $dateSelect . " " . $hour_ini_aux->format('H:i');
        } else if (empty($fromRechedule)) {

            $log_desc = "New session selected: " . $dateSelect . " " . $hour_ini_aux->format('H:i');
        }

        $logStu->setLog_description($log_desc);
        $logStu->add();

        // ver si viene de reschedule
        if ($fromRechedule == 1 || ($result_actual_session[0]->assigned==1 && !empty($result_actual_session[0]->date_select_ini) && !empty($result_actual_session[0]->date_select_end)) ) {
                        
            //echo print_r($result_actual_session);
            $datesSelectIniAux = new DateTime($result_actual_session[0]->date_select_ini,new DateTimeZone($result_actual_session[0]->timezone));
            $datesSelectEndAux = new DateTime($result_actual_session[0]->date_select_end,new DateTimeZone($result_actual_session[0]->timezone));
            $datesSelectEndAux->modify('- 1 minute');
            
            $coachAux = new userModel();
            $where_coach_aux = "id_user=".$result_actual_session[0]->id_coach;
            $join_coach_aux = " LEFT JOIN lm_time_zones USING(id_zone)";
            $result_coach_aux = $coachAux->select($where_coach_aux,'','lm_time_zones.large_name',$join_coach_aux,$join_coach_aux);
            
            $datesSelectIniAux->setTimezone(new DateTimeZone($result_coach_aux[0]->large_name));
            $datesSelectEndAux->setTimezone(new DateTimeZone($result_coach_aux[0]->large_name));
            
            $dateSearchCoachStartAux = $datesSelectIniAux->format('Y-m-d');
            $dateSearchCoachEndAux = $datesSelectEndAux->format('Y-m-d');

            $result_schedule = array();
            $schedule = new coachScheduleNewModel();

            // si cambia el día entre el inicio y fin hay que hacer dos búsquedas cortando la hora
            if ($dateSearchCoachStartAux != $dateSearchCoachEndAux) {

                $hour_ini_aux = $datesSelectIniAux->format('H:i:s');
                $hour_end_aux = '00:00:00';

                $where = "coach_id=".$result_actual_session[0]->id_coach." AND semester_id=$semesterCourse AND year=$yearCourse "
                        . "AND schedule_date='$dateSearchCoachStartAux' AND time_from_schedule BETWEEN '$hour_ini_aux' AND '$hour_end_aux' AND blocked_ses=0";

                $result_schedule_1 = $schedule->select($where);

                $hour_ini_aux = '00:00:00';
                $hour_end_aux = $datesSelectEndAux->format('H:i:s');

                $where = "coach_id=".$result_actual_session[0]->id_coach." AND semester_id=$semesterCourse AND year=$yearCourse "
                        . "AND schedule_date='$dateSearchCoachEndAux' AND time_from_schedule BETWEEN '$hour_ini_aux' AND '$hour_end_aux' AND blocked_ses=0";

                $result_schedule_2 = $schedule->select($where);

                $result_schedule = array_merge($result_schedule_1, $result_schedule_2);
            } else {

                $where = "coach_id=".$result_actual_session[0]->id_coach." AND semester_id=$semesterCourse AND year=$yearCourse "
                        . "AND schedule_date='$dateSearchCoachStartAux' AND time_from_schedule BETWEEN '" . $datesSelectIniAux->format('H:i:s') . "' AND '" . $datesSelectEndAux->format('H:i') . "' AND blocked_ses=0";


                $result_schedule = $schedule->select($where);
            }
            
            foreach ($result_schedule as $schAux) {
                
                $coachSchedule->setCoach_id($result_actual_session[0]->id_coach);

                $actual_sch_aux = $coachSchedule->select("schedule_id=$schAux->schedule_id");
                $coachSchedule->setSchedule_id($schAux->schedule_id);
                

                $actual_occ_aux = intval($actual_sch_aux[0]->actual_occ) - 1;
                
                if(empty($actual_occ_aux) || $actual_occ_aux<0){
                    $coachSchedule->setIs_occ(0);
                    $coachSchedule->setCourse_id(0);
                    $coachSchedule->setOcc_max(0);
                    $actual_occ_aux = 0;
                }else{
                    $coachSchedule->setIs_occ(1);
                    $coachSchedule->setCourse_id(intval($actual_sch_aux[0]->course_id));
                    $coachSchedule->setOcc_max(intval($actual_sch_aux[0]->occ_max));
                }

                
                $coachSchedule->setActual_occ($actual_occ_aux);
                $coachSchedule->updateScheduleCoach();
            }
        } // end from reschedule


        // nuevo schedules
        $coachSchedule = new coachScheduleNewModel();
        $coachSchedule->setCoach_id($coach_id);
        foreach ($schedules as $sch) {

            $actual_sch = $coachSchedule->select("schedule_id=$sch");
            $coachSchedule->setSchedule_id($sch);
            $coachSchedule->setIs_occ(1);

            $actual_occ = intval($actual_sch[0]->actual_occ) + 1;

            if (empty($actual_sch[0]->course_id)) {

                $coachSchedule->setCourse_id($course->course_id);
                $coachSchedule->setOcc_max($course->students_class);
            } else {
                $coachSchedule->setCourse_id($actual_sch[0]->course_id);
                $coachSchedule->setOcc_max(intval($actual_sch[0]->occ_max));
            }

            $coachSchedule->setActual_occ($actual_occ);
            $coachSchedule->updateScheduleCoach();
            
            //echo print_r($coachSchedule);

        }
        
        //update coachCourses
        $result_actual_course = $coachCourses->select("coach_id=$coach_id AND course_id=$course->course_id");    
        
        if(empty($result_actual_course)){
            
            $coachCourses->setCoach_id($coach_id);
            $coachCourses->setCourse_id($course->course_id);
            $coachCourses->setUniversity_id($course->id_university);
            $coachCourses->add();
            
        }
        
        $resultado->return = true;
        return $resultado;
        
    } else {
        
        $resultado->return = false;
        $resultado->msg = "Sorry, there was a problem, please select another session or contact support@linguameeting.com";
        
        $params = new stdClass();
        $params->course = $course;
        $params->schedules = $schedules;
        $params->id_user = $id_user;
        $params->coach_id = $coach_id;
        $params->timeZoneUser = $timeZoneUser;
        $params->week_id = $week_id;
        $params->dateSelect = $dateSelect;
        $params->hour_ini = $hour_ini;
        $params->enroll_id = $enroll_id;
        $params->isDateEnd = $isDateEnd;
        $params->fromReschedule = $fromRechedule;
        
        $logs->setType_msg('ERROR');
        $logs->setMsg('CODE:105 - FUNCTION booksession - :'. json_encode($result_actual_session).' - params: '. json_encode($params).' - session model:'. json_encode($sessions)   );
        $logs->writeLog();

        return $resultado;
    }
}

function registerSessionOther($course,$schedules,$id_user,$coach_id,$timeZoneUser,$week_id,$dateSelect,$hour_ini,$enroll_id,$isDateEnd,$type,$oldSession=0){

    $durationCourse = $course->duration_course;
    $yearCourse = $course->year;
    $semesterCourse = $course->semester_id;
    $id_university = $course->id_university;
    $resultado = new stdClass();
    $logs = new logsModel();
    $logs->setFolder('panel/');
    $logs->setFile_name('studentSessions.txt');
    $todayLog = new DateTime('now');
    
    $hour_ini_aux = new DateTime($dateSelect." ".$hour_ini);
    $hour_end = new DateTime($dateSelect." ".$hour_ini);
    $hour_end->modify('+'.$course->duration_course.' minutes');
    
    // check 24 hours
    $dateIni24 = new DateTime('now');
    $dateIni24->setTimezone(new DateTimeZone($timeZoneUser));
    $hour_compare= new DateTime($dateSelect." ".$hour_ini,new DateTimeZone($timeZoneUser));
    $dateIni24->modify('+12 hours');

    if($dateIni24 >= $hour_compare) {
        
        $resultado->return = false;
        $resultado->msg = "Sessions must be scheduled at least 12 hours in advance.";
        return $resultado;
    }

        // hay que insertar en el estudiante, actualizar la tabla del coach y actualizar la tabla de cursos asignados al coach.
    $sessions = new studentsCourseSessionsNewModel();
    $coachSchedule = new coachScheduleNewModel();
    $coachCourses = new coachCoursesModel();
    
    // como es una sesión nueva, por make-up o lo que sea, hay que insertarla nueva.
    $sessions->setId_user($id_user);
    $sessions->setEnroll_id($enroll_id);
    $sessions->setTimezone($timeZoneUser);
    $sessions->setCourse_id($course->course_id);
        
    if($isDateEnd==1){
        $sessions->setWeek_id($week_id);
        
    }else{
        $sessions->setWeek_id(0);
    }
    
    $result_actual_session = $sessions->select("enroll_id=$enroll_id ORDER BY session_id DESC limit 1");
    $sessions->setSession_id(intval($result_actual_session[0]->session_id+1));
    
    $sessions->setId_coach($coach_id);
    $sessions->setDate_select_ini($dateSelect." ".$hour_ini_aux->format('H:i'));
    $sessions->setDate_select_end($hour_end->format('Y-m-d')." ".$hour_end->format('H:i'));
    $sessions->setAssigned(1);
    
    if (!empty($oldSession)) {

        $sessions->setSession_recovered($oldSession);
    }

    if ($type == 'make') {
        $sessions->setFrom_make_up(1);
    } else if ($type == 'extra') {
        $sessions->setFrom_extra(1);
    }


    // search if is a make-up week
    $dueDates = new coursesDuedatesModel();
    $result_due = $dueDates->select("week_id=$week_id");


    if($result_due[0]->is_makeUp==1){
        $sessions->setWeeks_only_make_ups(1);
    }
    
    $result_update = $sessions->add();
    
    //echo print_r($sessions);
            
    if ($result_update) {
        
        // logs registro sessiones
        $logStu = new studentsLogsModel();
        $logStu->setId_student($id_user);
        $logStu->setDate_log($todayLog->format('Y-m-d H:i:s'));
        $ip_log = getRealIP();
        $logStu->setIp_log($ip_log);
        $log_desc = "";
        if ($type == 'make') {
            $log_desc = "Make-Up used: " . $dateSelect." ".$hour_ini_aux->format('H:i');
        } else if ($type == 'extra') {

            $log_desc = "Extra session used: " . $dateSelect." ".$hour_ini_aux->format('H:i');
        }
        $logStu->setLog_description($log_desc);
        $logStu->add();

        // nuevo schedules
        $coachSchedule = new coachScheduleNewModel();
        $coachSchedule->setCoach_id($coach_id);
        foreach ($schedules as $sch) {

            $actual_sch = $coachSchedule->select("schedule_id=$sch");
            $coachSchedule->setSchedule_id($sch);
            $coachSchedule->setIs_occ(1);

            $actual_occ = intval($actual_sch[0]->actual_occ) + 1;

            if (empty($actual_sch[0]->course_id)) {

                $coachSchedule->setCourse_id($course->course_id);
                $coachSchedule->setOcc_max($course->students_class);
            } else {
                $coachSchedule->setCourse_id($actual_sch[0]->course_id);
                $coachSchedule->setOcc_max(intval($actual_sch[0]->occ_max));
            }

            $coachSchedule->setActual_occ($actual_occ);
            $coachSchedule->updateScheduleCoach();
            
            //echo print_r($coachSchedule);

        }
        
        //update coachCourses
        $result_actual_course = $coachCourses->select("coach_id=$coach_id AND course_id=$course->course_id");
        
        
        if(empty($result_actual_course)){
            
            $coachCourses->setCoach_id($coach_id);
            $coachCourses->setCourse_id($course->course_id);
            $coachCourses->setUniversity_id($course->id_university);
            $coachCourses->add();
            
        }
        
        
        // actualizar make-ups estudiante
        $enroll = new studentsCoursesModel();
        $enroll_actual = $enroll->select("enroll_id=$enroll_id");
        if ($type == 'make') {
            
            $make_used = intval($enroll_actual[0]->make_ups_used) + 1;
            $enroll->setEnroll_id($enroll_id);
            $enroll->setMake_ups_used($make_used);
            $enroll->updateMakeUpsUsed();
            
            
        } else if ($type == 'extra') {
            $extra_used = intval($enroll_actual[0]->extra_sessions_used) + 1;
            $enroll->setEnroll_id($enroll_id);
            $enroll->setExtra_sessions_used($extra_used);
            $enroll->updateExtraUsed();
        }
        else if($type == 'other'){
            $other_used = intval($enroll_actual[0]->other_sessions_used) + 1;
            $enroll->setEnroll_id($enroll_id);
            $enroll->setOther_sessions_used($other_used);
            $enroll->updateOtherUsed();
            
        }

        $resultado->return = true;
        return $resultado;
        
    } else {
        
        $resultado->return = false;
        $resultado->msg = "Sorry, there was a problem, please select another session or contact support@linguameeting.com";
        
        $params = new stdClass();
        $params->course = $course;
        $params->schedules = $schedules;
        $params->id_user = $id_user;
        $params->coach_id = $coach_id;
        $params->timeZoneUser = $timeZoneUser;
        $params->week_id = $week_id;
        $params->dateSelect = $dateSelect;
        $params->hour_ini = $hour_ini;
        $params->enroll_id = $enroll_id;
        $params->isDateEnd = $isDateEnd;
        $params->fromMake = 1;
        
        $logs->setType_msg('ERROR');
        $logs->setMsg('CODE:105 - FUNCTION booksessionMake - :'. json_encode($result_actual_session).' - params: '. json_encode($params).' - session model:'. json_encode($sessions)   );
        $logs->writeLog();

        return $resultado;
    }
}

function deleteSessionsStudent($sessions,$deleteAll=false) {

    $delSes = new studentsCourseSessionsNewModel();
    
    foreach ($sessions as $ses) {
        
        if ($ses->assigned == 1) {

            $id_course = $ses->course_id;
            $coach_id = $ses->id_coach;
            
            // get data course
            $courseActual = new coursesNewModel();
            $result_actual = $courseActual->select("course_id=$id_course");
            
            $semesterCourse = $result_actual[0]->semester_id;
            $yearCourse = $result_actual[0]->year;

            // zona horaria coach
            $model_user = new userModel();
            $result_user = $model_user->select("id_user=$coach_id", '', "lm_time_zones.large_name", " LEFT JOIN lm_time_zones USING(id_zone)");
            $timeZoneCoach = $result_user[0]->large_name;

            //$result_del_ses = $delSes->delete("id_student_session=$ses->id_student_session  AND enroll_id=$ses->enroll_id AND course_id=$id_course");
            $delSes->setEnroll_id($ses->enroll_id);
            $delSes->setId_student_session($ses->id_student_session);
            $result_del_ses = $delSes->updateSessionClean(); // no lo borro definitivamente porque no se ha borrado el usuario del todo.

            if ($result_del_ses) {

                // buscar sesión del coach y descontar 1.
                // si se actualiza a 0 actualizar is_occ a 0 tb.
                //$durationSQL = intval($ses->duration_course - 1); // for msyql between
                $dateSearchStart = new DateTime($ses->date_select_ini, new DateTimeZone($ses->timezone));
                $dateSearchEnd = new DateTime($ses->date_select_end, new DateTimeZone($ses->timezone));
                //$dateSearchEnd->modify('+' . $durationSQL . ' minutes');
                $dateSearchEnd->modify('-1 minute');
                $dateSearchStart->setTimezone(new DateTimeZone($timeZoneCoach));
                $dateSearchEnd->setTimezone(new DateTimeZone($timeZoneCoach));

                $dateSearchCoachStart = $dateSearchStart->format('Y-m-d');
                $dateSearchCoachEnd = $dateSearchEnd->format('Y-m-d');

                $result_schedule = array();
                $schedule = new coachScheduleNewModel();

                // si cambia el día entre el inicio y fin hay que hacer dos búsquedas cortando la hora

                if ($dateSearchCoachStart != $dateSearchCoachEnd) {

                    $hour_ini_aux = $dateSearchStart->format('H:i:s');
                    $hour_end_aux = '00:00:00';

                    $where = "coach_id=$coach_id AND semester_id=$semesterCourse AND year=$yearCourse "
                            . "AND schedule_date='$dateSearchCoachStart' AND time_from_schedule BETWEEN '$hour_ini_aux' AND '$hour_end_aux' AND blocked_ses=0";

                    $result_schedule_1 = $schedule->select($where);

                    $hour_ini_aux = '00:00:00';
                    $hour_end_aux = $dateSearchEnd->format('H:i:s');

                    $where = "coach_id=$coach_id AND semester_id=$semesterCourse AND year=$yearCourse "
                            . "AND schedule_date='$dateSearchCoachEnd' AND time_from_schedule BETWEEN '$hour_ini_aux' AND '$hour_end_aux' AND blocked_ses=0";

                    $result_schedule_2 = $schedule->select($where);

                    $result_schedule = array_merge($result_schedule_1, $result_schedule_2);
                } else {

                    $where = "coach_id=$coach_id AND semester_id=$semesterCourse AND year=$yearCourse "
                            . "AND schedule_date='$dateSearchCoachStart' AND time_from_schedule BETWEEN '" . $dateSearchStart->format('H:i:s') . "' AND '" . $dateSearchEnd->format('H:i') . "' AND blocked_ses=0";


                    $result_schedule = $schedule->select($where);
                }


                foreach ($result_schedule as $sch) {

                    $occ_actual = $sch->actual_occ;
                    $new_occ = intval($occ_actual) - 1;

                    $schedule->setSchedule_id($sch->schedule_id);

                    if (empty($new_occ) || $new_occ<0) {

                        $schedule->setIs_occ(0);
                        $schedule->setOcc_max(0);
                        $schedule->setCourse_id(0);
                        $schedule->setActual_occ(0);
                        $schedule->setCoach_id($coach_id);
                        $schedule->setIs_from_other_type(0);
                        $schedule->updateScheduleCoach();
                        
                        //guardar en histórico para que se le sume luego al coach, si se pone a cero.
                        

                    } else {

                        $schedule->setIs_occ(1);
                        $schedule->setCoach_id($coach_id);
                        $schedule->setActual_occ($new_occ);
                        $schedule->updateActualOcc();

                    }
                    
                    

                }

                // actualizar numero make-ups o extra del estudiante.

                if ($ses->from_makeup) {

                    $options = new studentsCoursesModel();
                    $where = "enroll_id=$ses->enroll_id AND id_user=$ses->id_user";
                    $result_exist = $options->select($where);

                    $options->setId_user($ses->id_user);
                    $options->setEnroll_id($ses->enroll_id);
                    $options->setCourse_id($ses->course_id);
                    $value_session = intval($result_exist[0]->make_ups_used) - 1;
                    $options->setMake_ups_used($value_session);
                    if ($value_session >= 0) {
                        $result_up1 = $options->updateMakeUpsUsed();
                    }
                    
                    // logs registro sessiones
                    $todayLog = new DateTime('now');
                    $logStu = new studentsLogsModel();
                    $logStu->setId_student($ses->id_user);
                    $logStu->setDate_log($todayLog->format('Y-m-d H:i:s'));
                    $ip_log = getRealIP();
                    $logStu->setIp_log($ip_log);
                    $log_desc = "Make-Up deleted: " . $ses->date_select_ini;
                    $logStu->setLog_description($log_desc);
                    $logStu->add();
                } elseif ($ses->from_extra) {


                    $options = new studentsCoursesModel();
                    $where = "enroll_id=$ses->enroll_id AND id_user=$ses->id_user";
                    $result_exist = $options->select($where);

                    $options->setId_user($ses->id_user);
                    $options->setEnroll_id($ses->enroll_id);
                    $options->setCourse_id($ses->course_id);
                    $value_session = intval($result_exist[0]->extra_sessions_used) - 1;
                    $options->setExtra_sessions_used($value_session);
                    if ($value_session >= 0) {
                        $result_up1 = $options->updateExtraUsed();
                    }
                    
                    // logs registro sessiones
                    $todayLog = new DateTime('now');
                    $logStu = new studentsLogsModel();
                    $logStu->setId_student($ses->id_user);
                    $logStu->setDate_log($todayLog->format('Y-m-d H:i:s'));
                    $ip_log = getRealIP();
                    $logStu->setIp_log($ip_log);
                    $log_desc = "Extra session deleted: " . $ses->date_select_ini;
                    $logStu->setLog_description($log_desc);
                    $logStu->add();
                }

                // ver si existen feedbacks y eliminarlos.
                $feedbacks = new studentsFeedbacksModel();
                $where = "id_student_course_session=$ses->id_student_session";
                $result_feedback = $feedbacks->select($where);

                if (!empty($result_feedback)) {

                    $where_del = " id_student_course_session=$ses->id_student_session AND id_feedback=" . $result_feedback[0]->id_feedback;
                    $result_delete = $feedbacks->delete($where_del);

                    if (!$result_delete) {

                        $this->logs->setType_msg('WARNING');
                        $this->logs->setMsg('CODE:056 - FUNCTION global deleteSessionsStudent - delete feedback - Modified by: ' . $_SESSION['id']);
                        $this->logs->writeLog();
                    }
                }
                
                if ($deleteAll) {

                    $where_del = "id_student_session=" . $ses->id_student_session . " AND id_user=$ses->id_user";
                    $delSes->delete($where_del);
                }
            } else {
                return false;
            }
        } else {


            $where_del = "id_student_session=" . $ses->id_student_session . " AND id_user=$ses->id_user";
            $delSes->delete($where_del);
        }
    }

    return true;
    
}

function desactiveCoursesStudents($courses){
    
    $model = new studentsCoursesModel();

    foreach ($courses as $ses) {

        $model->setCourse_id($ses->course_id);
        $model->setId_user($ses->id_user);
        $model->setEnroll_id($ses->enroll_id);
        $result_desactive = $model->desactiveCourse();
    }
}

function object_sorter($clave, $orden = null) {
    return function ($a, $b) use ($clave, $orden) {
        $result = ($orden == "DESC") ? strnatcmp($b->$clave, $a->$clave) : strnatcmp($a->$clave, $b->$clave);
        return $result;
    };
}

function searchLastMinute($course_id, $hour_ini, $hour_end, $timeZoneStudent) {
        
    $iniHourSelect = $hour_ini->format('Y-m-d H:i:s');
    $endHourSelect = $hour_end->format('Y-m-d H:i:s');

    $schedule = new studentsCourseSessionsNewModel();
    $joinSchedule = " ";
    $where_sch = "course_id=$course_id AND date_select_ini >='$iniHourSelect' AND date_select_ini <='$endHourSelect'";
    $selectSch = "lm_students_courses_sessions_new.*";
    $result_sel = $schedule->select($where_sch, '', $selectSch, $joinSchedule);
    //echo "<pre>";echo print_r($result_sel);echo "</pre>";

    $totalSessions = array();

    foreach ($result_sel as $session) {

        // HAY QUE HACER EL CAMBIO A LA ZONA HORARIA DEL ESTUDIANTE Y VER SI ES MAYOR QUE HOY Y  MENOR QUE EL FIN
        $dateSelectCompare = new DateTime($session->date_select_ini,new DateTimeZone($session->timezone));
        $dateSelectEnd = new DateTime($session->date_select_end,new DateTimeZone($session->timezone));
        $todayAux = new DateTime('now');
        $todayAux->setTimezone(new DateTimeZone($timeZoneStudent));
        
        if($session->timezone!=$timeZoneStudent){
            
            $dateSelectCompare->setTimezone($timeZoneStudent);
            $dateSelectEnd->setTimezone($timeZoneStudent);
        }

        if ($dateSelectCompare >= $hour_ini && $dateSelectCompare <= $hour_end) {
            $dateIniSelect = $session->date_select_ini . '_' . $session->timezone;

            if (empty($totalSessions[$dateIniSelect])) {

                
                $totalSessions[$dateIniSelect] = new stdClass();

                $totalSessions[$dateIniSelect]->date_select_ini = $dateSelectCompare->format('Y-m-d H:i:s'); // aquí cambiar la hora del estudiante
                $totalSessions[$dateIniSelect]->date_select_end = $dateSelectEnd->format('Y-m-d H:i:s');
                $totalSessions[$dateIniSelect]->coach_id = $session->id_coach;

                // cambiar a la zona horaria del coach.
                $user = new userModel();
                $join = " LEFT JOIN lm_time_zones USING(id_zone)"
                        . " LEFT JOIN lm_country USING(id_country)";
                $select = "lm_time_zones.large_name,lm_users.name_user,lm_users.lastname_user,lm_users.url_photo,lm_country.nom,lm_country.iso2";
                $where = "id_user=$session->id_coach";
                $result_user = $user->select($where, '', $select, $join);

                $dateSearchCoachIni = new DateTime($session->date_select_ini, new DateTimeZone($session->timezone));
                $dateSearchCoachEnd = new DateTime($session->date_select_end, new DateTimeZone($session->timezone));
                $totalSessions[$dateIniSelect]->hour_ini = strtoupper($dateSearchCoachIni->format('g:i A')); // cambiar después
                $totalSessions[$dateIniSelect]->date_ini = $dateSearchCoachIni->format('Y-m-d');

                $dateSearchCoachIni->setTimezone(new DateTimeZone($result_user[0]->large_name));
                $dateSearchCoachEnd->setTimezone(new DateTimeZone($result_user[0]->large_name));

                // schedule
                $coachSch = new coachScheduleNewModel();
                $where_coach_sch = "coach_id=$session->id_coach AND course_id=$course_id AND schedule_date='" . $dateSearchCoachIni->format('Y-m-d') . "' AND time_from_schedule BETWEEN '"
                        . $dateSearchCoachIni->format('H:i:s') . "' AND '" . $dateSearchCoachEnd->format('H:i:s') . "'";
                $result_coach_sch = $coachSch->select($where_coach_sch);

                //echo "<pre>";echo print_r($where_coach_sch);echo "</pre>";
                //echo "<pre>";echo print_r($result_coach_sch);echo "</pre>";

                $schedules_select = "";
                $first = true;
                foreach ($result_coach_sch as $key => $value) {
                    $totalSessions[$dateIniSelect]->actual_occ = $value->actual_occ;
                    $totalSessions[$dateIniSelect]->occ_max = $value->occ_max;

                    if ($first) {

                        $first = false;
                        $schedules_select = $value->schedule_id;
                    } else {
                        $schedules_select .= ",$value->schedule_id";
                    }
                }

                if ($totalSessions[$dateIniSelect]->actual_occ >= $totalSessions[$dateIniSelect]->occ_max) {
                    $totalSessions[$dateIniSelect]->show = 0;
                } else {
                    $totalSessions[$dateIniSelect]->available = $totalSessions[$dateIniSelect]->occ_max - $totalSessions[$dateIniSelect]->actual_occ;
                    $totalSessions[$dateIniSelect]->show = 1;
                }
                $totalSessions[$dateIniSelect]->name = $result_user[0]->name_user;
                $totalSessions[$dateIniSelect]->lastname = $result_user[0]->lastname_user;
                $totalSessions[$dateIniSelect]->url_photo = $result_user[0]->url_photo;
                $totalSessions[$dateIniSelect]->nom = $result_user[0]->nom;
                $totalSessions[$dateIniSelect]->iso2 = $result_user[0]->iso2;
                $totalSessions[$dateIniSelect]->schedules = $schedules_select;
            }
        }
    }

    return $totalSessions;
}

?>