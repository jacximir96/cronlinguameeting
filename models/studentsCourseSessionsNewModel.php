<?php

/**
 * Description of studentsFlexCourseSessionsModel
 *
 * @author sandra
 */
class studentsCourseSessionsNewModel extends baseModel {

    private $id_student_session;
    private $id_user = 0;
    private $enroll_id = 0;
    private $course_id = 0;
    private $id_coach = 0;
    private $attendance = 0;
    private $missed = 0;
    private $past = 0;
    private $from_make_up = 0;
    private $from_extra = 0;
    private $id_recording = 0;
    private $date_select_ini = '';
    private $date_select_end = '';
    private $assigned = 0;
    private $week_id = 0;
    private $session_id = 0;
    private $timezone = '';
    private $not_attended_by_coach = 0;
    private $comments = '';
    private $week_only_make_ups = 0;
    private $session_recovered = 0;

    function __construct() {

	parent::__construct();
	parent::setTable('lm_students_courses_sessions_new');
    }

    public function autoCommit($value = true) {
	parent::autoCommit($value);
    }

    public function commit() {
	parent::commit();
    }

    public function rollBack() {
	parent::rollBack();
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
	return parent::select($where, $as, $select, $join);
    }

    public function add($indices = '', $valores = '') {

	$first = true;
        
        if (!empty($this->id_user)) {
	    if ($first) {
		$indices .= "id_user";
		$valores .= $this->id_user;
		$first = false;
	    } else {
		$indices .= ",id_user";
		$valores .= "," . $this->id_user;
	    }
	}
        
        if (!empty($this->enroll_id)) {
            if ($first) {
                $indices .= "enroll_id";
                $valores .= $this->enroll_id;
                $first = false;
            } else {
                $indices .= ",enroll_id";
                $valores .= "," . $this->enroll_id;
            }
        }

        if (!empty($this->course_id)) {
	    if ($first) {
		$indices .= "course_id";
		$valores .= $this->course_id;
		$first = false;
	    } else {
		$indices .= ",course_id";
		$valores .= "," . $this->course_id;
	    }
	}

	if (!empty($this->id_coach)) {
	    if ($first) {
		$indices .= "id_coach";
		$valores .= $this->id_coach;
		$first = false;
	    } else {
		$indices .= ",id_coach";
		$valores .= "," . $this->id_coach;
	    }
	}

	if (!empty($this->date_select_ini)) {
	    if ($first) {
		$indices .= "date_select_ini";
		$valores .= "'" . $this->date_select_ini . "'";
		$first = false;
	    } else {
		$indices .= ",date_select_ini";
		$valores .= ",'" . $this->date_select_ini . "'";
	    }
	}

	if (!empty($this->date_select_end)) {
	    if ($first) {
		$indices .= "date_select_end";
		$valores .= "'" . $this->date_select_end . "'";
		$first = false;
	    } else {
		$indices .= ",date_select_end";
		$valores .= ",'" . $this->date_select_end . "'";
	    }
	}

	if (!empty($this->week_id)) {
	    if ($first) {
		$indices .= "week_id";
		$valores .= $this->week_id;
		$first = false;
	    } else {
		$indices .= ",week_id";
		$valores .= "," . $this->week_id;
	    }
	}
	
	if (!empty($this->timezone)) {
	    if ($first) {
		$indices .= "timezone";
		$valores .= "'" . $this->timezone . "'";
		$first = false;
	    } else {
		$indices .= ",timezone";
		$valores .= ",'" . $this->timezone . "'";
	    }
	}
	
	if (!empty($this->not_attended_by_coach)) {
	    if ($first) {
		$indices .= "not_attended_by_coach";
		$valores .= $this->not_attended_by_coach;
		$first = false;
	    } else {
		$indices .= ",not_attended_by_coach";
		$valores .= "," . $this->not_attended_by_coach;
	    }
	}
        
        if (!empty($this->week_only_make_ups)) {
	    if ($first) {
		$indices .= "week_only_make_ups";
		$valores .= $this->week_only_make_ups;
		$first = false;
	    } else {
		$indices .= ",week_only_make_ups";
		$valores .= "," . $this->week_only_make_ups;
	    }
	}

	if (!empty($this->comments)) {
	    if ($first) {
		$indices .= "comments";
		$valores .= "'" . $this->comments . "'";
		$first = false;
	    } else {
		$indices .= ",comments";
		$valores .= ",'" . $this->comments . "'";
	    }
	}
        
        if (!empty($this->session_recovered)) {
	    if ($first) {
		$indices .= "session_recovered";
		$valores .= $this->session_recovered;
		$first = false;
	    } else {
		$indices .= ",session_recovered";
		$valores .= "," . $this->session_recovered;
	    }
	}

	if ($first) {
	    $indices .= "attendance,missed,past,from_makeup,from_extra,assigned,session_id";
	    $valores .= $this->attendance . ',' . $this->missed . ',' . $this->past . ',' . $this->from_make_up . ',' . $this->from_extra . ',' . $this->assigned.",".$this->session_id;
	    $first = false;
	} else {
	    $indices .= ",attendance,missed,past,from_makeup,from_extra,assigned,session_id";
	    $valores .= "," . $this->attendance . ',' . $this->missed . ',' . $this->past . ',' . $this->from_make_up . ',' . $this->from_extra . ',' . $this->assigned.",".$this->session_id;
	}


	return parent::add($indices, $valores);
    }

    public function updateMissed() {

	$where = "id_student_session=" . $this->id_student_session;

	$campos = " missed=" . $this->missed;

	return parent::update($campos, $where);
    }

    public function updateAttendance() {

	$where = "id_student_session=" . $this->id_student_session;

	$campos = " attendance=" . $this->attendance;

	return parent::update($campos, $where);
    }

    public function updateSession() {

	$where = "id_student_session=" . $this->id_student_session . " AND id_user=$this->id_user";
	$first = true;

	if (!empty($this->id_coach)) {
	    if ($first) {
		$campos .= " id_coach=" . $this->id_coach;
		$first = false;
	    } else {
		$campos .= ", id_coach=" . $this->id_coach;
	    }
	}

	if (!empty($this->date_select_ini)) {
	    if ($first) {
		$campos .= " date_select_ini='" . $this->date_select_ini . "'";
		$first = false;
	    } else {
		$campos .= ", date_select_ini='" . $this->date_select_ini . "'";
	    }
	}

	if (!empty($this->date_select_end)) {
	    if ($first) {
		$campos .= " date_select_end='" . $this->date_select_end . "'";
		$first = false;
	    } else {
		$campos .= ", date_select_end='" . $this->date_select_end . "'";
	    }
	}
	
	if (!empty($this->timezone)) {
	    if ($first) {
		$campos .= " timezone='" . $this->timezone . "'";
		$first = false;
	    } else {
		$campos .= ", timezone='" . $this->timezone . "'";
	    }
	}


	if ( (!empty($this->date_select_ini) && !empty($this->date_select_end)) || $this->assigned==1) {
	    $campos .= ",assigned=1";
	}else{
	    
	    $campos .= ",assigned=0";
	}
	

	return parent::update($campos, $where);
    }
    
    public function updateSessionRegister($isFlex=0) {

        // sino hay fecha de fin de curso es flex y por tanto no hay week-id, el week_id es el sesison_id
        if(empty($isFlex)){
            $where = "enroll_id=" . $this->enroll_id . " AND id_user=$this->id_user AND week_id=$this->week_id";
        }else{
            $where = "enroll_id=" . $this->enroll_id . " AND id_user=$this->id_user AND session_id=$this->session_id";
        }
	
	$first = true;

	if (!empty($this->id_coach)) {
	    if ($first) {
		$campos .= " id_coach=" . $this->id_coach;
		$first = false;
	    } else {
		$campos .= ", id_coach=" . $this->id_coach;
	    }
	}

	if (!empty($this->date_select_ini)) {
	    if ($first) {
		$campos .= " date_select_ini='" . $this->date_select_ini . "'";
		$first = false;
	    } else {
		$campos .= ", date_select_ini='" . $this->date_select_ini . "'";
	    }
	}

	if (!empty($this->date_select_end)) {
	    if ($first) {
		$campos .= " date_select_end='" . $this->date_select_end . "'";
		$first = false;
	    } else {
		$campos .= ", date_select_end='" . $this->date_select_end . "'";
	    }
	}
	
	if (!empty($this->timezone)) {
	    if ($first) {
		$campos .= " timezone='" . $this->timezone . "'";
		$first = false;
	    } else {
		$campos .= ", timezone='" . $this->timezone . "'";
	    }
	}


	if ( (!empty($this->date_select_ini) && !empty($this->date_select_end)) || $this->assigned==1) {
	    $campos .= ",assigned=1";
	}else{
	    
	    $campos .= ",assigned=0";
	}
	

	return parent::update($campos, $where);
    }
    
    public function updateSessionClean() {

	$where = "id_student_session=" . $this->id_student_session . " AND enroll_id=$this->enroll_id";

	    
	$campos = "date_select_ini=null,date_select_end=null,id_coach=0,assigned=0,timezone=null";


	return parent::update($campos, $where);
    }

    public function updateRecording() {

	$where = "id_student_session=" . $this->id_student_session;

	$campos = " id_recording=" . $this->id_recording;

	return parent::update($campos, $where);
    }
    
    public function updateReclame() {

	$where = 'id_student_session=' . $this->id_student_session;

	$campos = " not_attended_by_coach=$this->not_attended_by_coach";

	$campos .= ", comments='$this->comments'";


	return parent::update($campos, $where);
    }
    
    public function updateWeek() {

	$where = 'id_student_session=' . $this->id_student_session;

	$campos = " week_id=$this->week_id";


	return parent::update($campos, $where);
    }
    
    public function updateSessionId() {

	$where = 'session_id=' . $this->session_id;

	$campos = " week_id=$this->week_id";


	return parent::update($campos, $where);
    }

    public function delete($where) {
	return parent::delete($where);
    }


    function getId_student_session() {
        return $this->id_student_session;
    }

    function getId_user() {
        return $this->id_user;
    }

    function getCourse_id() {
        return $this->course_id;
    }

    function getId_coach() {
        return $this->id_coach;
    }

    function getAttendance() {
        return $this->attendance;
    }

    function getMissed() {
        return $this->missed;
    }

    function getPast() {
        return $this->past;
    }

    function getFrom_make_up() {
        return $this->from_make_up;
    }

    function getFrom_extra() {
        return $this->from_extra;
    }

    function getId_recording() {
        return $this->id_recording;
    }

    function getDate_select_ini() {
        return $this->date_select_ini;
    }

    function getDate_select_end() {
        return $this->date_select_end;
    }

    function getAssigned() {
        return $this->assigned;
    }

    function getWeek_id() {
        return $this->week_id;
    }

    function getSession_id() {
        return $this->session_id;
    }

    function getTimezone() {
        return $this->timezone;
    }

    function getNot_attended_by_coach() {
        return $this->not_attended_by_coach;
    }

    function getComments() {
        return $this->comments;
    }

    function setId_student_session($id_student_session): void {
        $this->id_student_session = $id_student_session;
    }

    function setId_user($id_user): void {
        $this->id_user = $id_user;
    }

    function setCourse_id($course_id): void {
        $this->course_id = $course_id;
    }

    function setId_coach($id_coach): void {
        $this->id_coach = $id_coach;
    }

    function setAttendance($attendance): void {
        $this->attendance = $attendance;
    }

    function setMissed($missed): void {
        $this->missed = $missed;
    }

    function setPast($past): void {
        $this->past = $past;
    }

    function setFrom_make_up($from_make_up): void {
        $this->from_make_up = $from_make_up;
    }

    function setFrom_extra($from_extra): void {
        $this->from_extra = $from_extra;
    }

    function setId_recording($id_recording): void {
        $this->id_recording = $id_recording;
    }

    function setDate_select_ini($date_select_ini): void {
        $this->date_select_ini = $date_select_ini;
    }

    function setDate_select_end($date_select_end): void {
        $this->date_select_end = $date_select_end;
    }

    function setAssigned($assigned): void {
        $this->assigned = $assigned;
    }

    function setWeek_id($week_id): void {
        $this->week_id = $week_id;
    }

    function setSession_id($session_id): void {
        $this->session_id = $session_id;
    }

    function setTimezone($timezone): void {
        $this->timezone = $timezone;
    }

    function setNot_attended_by_coach($not_attended_by_coach): void {
        $this->not_attended_by_coach = $not_attended_by_coach;
    }

    function setComments($comments): void {
        $this->comments = $comments;
    }

    function getWeeks_only_make_ups() {
        return $this->week_only_make_ups;
    }

    function setWeeks_only_make_ups($week_only_make_ups): void {
        $this->week_only_make_ups = $week_only_make_ups;
    }

    function getEnroll_id() {
        return $this->enroll_id;
    }

    function setEnroll_id($enroll_id): void {
        $this->enroll_id = $enroll_id;
    }

    function getSession_recovered() {
        return $this->session_recovered;
    }

    function setSession_recovered($session_recovered): void {
        $this->session_recovered = $session_recovered;
    }



}

?>