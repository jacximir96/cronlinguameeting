<?php

/**
 * Description of studentsFlexCourseSessionsModel
 *
 * @author sandra
 */
class studentsFlexCourseSessionsModel extends baseModel {

    private $id_student_session;
    private $id_user = 0;
    private $id_course = 0;
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
    private $isNewSchedule = 0;
    private $daylight_assig = 0;
    private $timezone = '';
    private $not_attended_by_coach = 0;
	private $comments = '';

    function __construct() {

	parent::__construct();
	parent::setTable('lm_students_flex_course_sessions');
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

	if (!empty($this->id_course)) {
	    if ($first) {
		$indices .= "id_course";
		$valores .= $this->id_course;
		$first = false;
	    } else {
		$indices .= ",id_course";
		$valores .= "," . $this->id_course;
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

	if (!empty($this->isNewSchedule)) {
	    if ($first) {
		$indices .= "isNewSchedule";
		$valores .= $this->isNewSchedule;
		$first = false;
	    } else {
		$indices .= ",isNewSchedule";
		$valores .= "," . $this->isNewSchedule;
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

	if ($first) {
	    $indices .= "attendance,missed,past,from_makeup,from_extra,assigned,daylight_assig";
	    $valores .= $this->attendance . ',' . $this->missed . ',' . $this->past . ',' . $this->from_make_up . ',' . $this->from_extra . ',' . $this->assigned.",".$this->daylight_assig;
	    $first = false;
	} else {
	    $indices .= ",attendance,missed,past,from_makeup,from_extra,assigned,daylight_assig";
	    $valores .= "," . $this->attendance . ',' . $this->missed . ',' . $this->past . ',' . $this->from_make_up . ',' . $this->from_extra . ',' . $this->assigned.",".$this->daylight_assig;
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
	
	if($first){
	    
	    $first = false;
	    $campos.= " isNewSchedule=$this->isNewSchedule";
	    
	}else{
	    
	     $campos.= ", isNewSchedule=$this->isNewSchedule";
	}
	
	if ($first) {
	    $campos .= " daylight_assig=" . $this->daylight_assig;
	    $first = false;
	} else {
	    $campos .= ", daylight_assig=" . $this->daylight_assig;
	}

	return parent::update($campos, $where);
    }
    
    public function updateSessionClean() {

	$where = "id_student_session=" . $this->id_student_session . " AND id_user=$this->id_user";

	    
	$campos = "date_select_ini=null,date_select_end=null, id_coach=null,assigned=0,isNewSchedule=0,daylight_assig=0";


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

    public function delete($where) {
	return parent::delete($where);
    }
    
    function getId_student_session() {
        return $this->id_student_session;
    }

    function getId_user() {
        return $this->id_user;
    }

    function getId_course() {
        return $this->id_course;
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

    function setId_student_session($id_student_session): void {
        $this->id_student_session = $id_student_session;
    }

    function setId_user($id_user): void {
        $this->id_user = $id_user;
    }

    function setId_course($id_course): void {
        $this->id_course = $id_course;
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

    function getIsNewSchedule() {
	return $this->isNewSchedule;
    }

    function setIsNewSchedule($isNewSchedule) {
	$this->isNewSchedule = $isNewSchedule;
    }

    function getDaylight_assig() {
	return $this->daylight_assig;
    }

    function setDaylight_assig($daylight_assig) {
	$this->daylight_assig = $daylight_assig;
    }

    function getTimezone() {
	return $this->timezone;
    }

    function setTimezone($timezone) {
	$this->timezone = $timezone;
    }

    function getNot_attended_by_coach() {
	return $this->not_attended_by_coach;
    }

    function getComments() {
	return $this->comments;
    }

    function setNot_attended_by_coach($not_attended_by_coach) {
	$this->not_attended_by_coach = $not_attended_by_coach;
    }

    function setComments($comments) {
	$this->comments = $comments;
    }



}

?>