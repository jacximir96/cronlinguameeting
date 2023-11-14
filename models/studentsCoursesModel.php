<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of courseStudentsModel
 *
 * @author sandra
 */
class studentsCoursesModel extends baseModel {

    private $enroll_id = 0;
    private $course_id = 0;
    private $section_id = 0;
    private $id_user = 0;
    private $date_ini = null;
    private $date_end = null;
    private $active = 0;
    private $make_ups = 0;
    private $make_ups_used = 0;
    private $extra_sessions = 0;
    private $extra_sessions_used = 0;
    private $other_sessions = 0;
    private $other_sessions_used = 0;
    private $make_ups_buy = 0;
    private $date_assign = null;
    private $payment_id = '';

    function __construct() {

        parent::__construct();
        parent::setTable('lm_students_courses');
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

        if (!empty($this->section_id)) {
            if ($first) {
                $indices .= "section_id";
                $valores .= $this->section_id;
                $first = false;
            } else {
                $indices .= ",section_id";
                $valores .= "," . $this->section_id;
            }
        }

        if (!empty($this->date_ini)) {
            if ($first) {
                $indices .= "date_ini";
                $valores .= "'" . $this->date_ini . "'";
                $first = false;
            } else {
                $indices .= ",date_ini";
                $valores .= ",'" . $this->date_ini . "'";
            }
        }

        if (!empty($this->active)) {
            if ($first) {
                $indices .= "active";
                $valores .= $this->active;
                $first = false;
            } else {
                $indices .= ",active";
                $valores .= "," . $this->active;
            }
        }

        if (!empty($this->make_ups)) {
            if ($first) {
                $indices .= "make_ups";
                $valores .= $this->make_ups;
                $first = false;
            } else {
                $indices .= ",make_ups";
                $valores .= "," . $this->make_ups;
            }
        }

        if (!empty($this->date_end)) {
            if ($first) {
                $indices .= "date_end";
                $valores .= "'" . $this->date_end . "'";
                $first = false;
            } else {
                $indices .= ",date_end";
                $valores .= ",'" . $this->date_end . "'";
            }
        }

        if (!empty($this->make_ups_used)) {
            if ($first) {
                $indices .= "make_ups_used";
                $valores .= $this->make_ups_used;
                $first = false;
            } else {
                $indices .= ",make_ups_used";
                $valores .= "," . $this->make_ups_used;
            }
        }

        if (!empty($this->extra_sessions)) {
            if ($first) {
                $indices .= "extra_sessions";
                $valores .= $this->extra_sessions;
                $first = false;
            } else {
                $indices .= ",extra_sessions";
                $valores .= "," . $this->extra_sessions;
            }
        }

        if (!empty($this->extra_sessions_used)) {
            if ($first) {
                $indices .= "extra_sessions_used";
                $valores .= $this->extra_sessions_used;
                $first = false;
            } else {
                $indices .= ",extra_sessions_used";
                $valores .= "," . $this->extra_sessions_used;
            }
        }

        if (!empty($this->other_sessions)) {
            if ($first) {
                $indices .= "other_sessions";
                $valores .= $this->other_sessions;
                $first = false;
            } else {
                $indices .= ",other_sessions";
                $valores .= "," . $this->other_sessions;
            }
        }

        if (!empty($this->other_sessions_used)) {
            if ($first) {
                $indices .= "other_sessions_used";
                $valores .= $this->other_sessions_used;
                $first = false;
            } else {
                $indices .= ",other_sessions_used";
                $valores .= "," . $this->other_sessions_used;
            }
        }
        
        if (!empty($this->make_ups_buy)) {
            if ($first) {
                $indices .= "make_ups_buy";
                $valores .= $this->make_ups_buy;
                $first = false;
            } else {
                $indices .= ",make_ups_buy";
                $valores .= "," . $this->make_ups_buy;
            }
        }
        
        if (!empty($this->date_ini)) {
            if ($first) {
                $indices .= "date_assign";
                $valores .= "'" . $this->date_assign . "'";
                $first = false;
            } else {
                $indices .= ",date_assign";
                $valores .= ",'" . $this->date_assign . "'";
            }
        }
        
        if (!empty($this->payment_id)) {
	    if ($first) {
		$indices .= "payment_id";
		$valores .= "'" . $this->payment_id . "'";
		$first = false;
	    } else {
		$indices .= ",payment_id";
		$valores .= ",'" . $this->payment_id . "'";
	    }
	}

        return parent::add($indices, $valores);
    }

    public function desactiveCourse() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "active=0";

        return parent::update($campos, $where);
    }

    public function updateActive() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user . " AND section_id=" . $this->section_id;

        $campos = "active=1";

        return parent::update($campos, $where);
    }

    public function deactivateCourse() {

        $where = "course_id=" . $this->course_id;

        $campos = "active=0";

        return parent::update($campos, $where);
    }

    public function updateSection() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "section_id=$this->section_id";

        return parent::update($campos, $where);
    }

    public function deleteSection() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "section_id=0";

        return parent::update($campos, $where);
    }
    
    public function updateMakeUpsBuy() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "make_ups_buy=$this->make_ups_buy";

        return parent::update($campos, $where);
    }
    
    public function updateMakeUpsBuyCourse() {

        $where = "course_id=" . $this->course_id." AND make_ups_buy=0" ;

        $campos = "make_ups_buy=$this->make_ups_buy";

        return parent::update($campos, $where);
    }

    public function updateMakeUpsBuyByCourse($where = '', $campos = '') {

        $where = "course_id=" . $this->course_id;

        $campos = "make_ups_buy=$this->make_ups_buy";

        return parent::update($campos, $where);
    }

    public function updateEndDateByCourse() {

        $where = "course_id=" . $this->course_id;
        
        if($this->date_end=='NULL'){
            $campos = "date_end=".$this->date_end;
            
        }else{
            $campos = "date_end='".$this->date_end."'";
        }

        
        
        if($this->active==1){
            
            $campos.= ",active=$this->active";
        }

        return parent::update($campos, $where);
    }

    public function updateMakeUps() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "make_ups=$this->make_ups";

        return parent::update($campos, $where);
    }
    
    public function updateMakeUpsPayment() {

        $where = "enroll_id=$this->enroll_id ";

        $campos = "make_ups=$this->make_ups,make_ups_buy=$this->make_ups_buy";

        return parent::update($campos, $where);
    }

    public function updateMakeUpsUsed() {

        $where = "enroll_id=$this->enroll_id";

        $campos = "make_ups_used=$this->make_ups_used";

        return parent::update($campos, $where);
    }

    public function updateExtra() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "extra_sessions=$this->extra_sessions";

        return parent::update($campos, $where);
    }

    public function updateExtraUsed() {

        $where = "enroll_id=$this->enroll_id";

        $campos = "extra_sessions_used=$this->extra_sessions_used";

        return parent::update($campos, $where);
    }

    public function updateOther() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "other_sessions=$this->other_sessions";

        return parent::update($campos, $where);
    }

    public function updateOtherUsed() {

        $where = "enroll_id=$this->enroll_id ";

        $campos = "other_sessions_used=$this->other_sessions_used";

        return parent::update($campos, $where);
    }
    
    public function updatePaymentId() {

        $where = "enroll_id=$this->enroll_id  AND id_user=$this->id_user";

        $campos = "payment_id='$this->payment_id'";

        return parent::update($campos, $where);
    }

    public function updateNewPaymentId($old_payment) {

        $where = "payment_id='$old_payment";

        $campos = "payment_id='$this->payment_id'";
        $campos.= ",date_assign='$this->date_assign'";

        echo $where.' '.$campos;

        return parent::update($campos, $where);
    }

    public function updateAllSessions() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "make_ups=$this->make_ups";
        $campos.= ",extra_sessions=$this->extra_sessions";
        $campos = ",other_sessions=$this->other_sessions";
        

        return parent::update($campos, $where);
    }
    
    public function updateAllSessionsUsed() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "make_ups_used=$this->make_ups_used";
        $campos.= ",extra_sessions_used=$this->extra_sessions_used";
        $campos = ",other_sessions_used=$this->other_sessions_used";
        

        return parent::update($campos, $where);
    }
    
    function getEnroll_id() {
        return $this->enroll_id;
    }

    function setEnroll_id($enroll_id): void {
        $this->enroll_id = $enroll_id;
    }

        
    function getCourse_id() {
        return $this->course_id;
    }

    function getSection_id() {
        return $this->section_id;
    }

    function getId_user() {
        return $this->id_user;
    }

    function getDate_ini() {
        return $this->date_ini;
    }

    function getDate_end() {
        return $this->date_end;
    }

    function getActive() {
        return $this->active;
    }

    function getMake_ups() {
        return $this->make_ups;
    }

    function getMake_ups_used() {
        return $this->make_ups_used;
    }

    function getExtra_sessions() {
        return $this->extra_sessions;
    }

    function getExtra_sessions_used() {
        return $this->extra_sessions_used;
    }

    function getOther_sessions() {
        return $this->other_sessions;
    }

    function getOther_sessions_used() {
        return $this->other_sessions_used;
    }

    function setCourse_id($course_id): void {
        $this->course_id = $course_id;
    }

    function setSection_id($section_id): void {
        $this->section_id = $section_id;
    }

    function setId_user($id_user): void {
        $this->id_user = $id_user;
    }

    function setDate_ini($date_ini): void {
        $this->date_ini = $date_ini;
    }

    function setDate_end($date_end): void {
        $this->date_end = $date_end;
    }

    function setActive($active): void {
        $this->active = $active;
    }

    function setMake_ups($make_ups): void {
        $this->make_ups = $make_ups;
    }

    function setMake_ups_used($make_ups_used): void {
        $this->make_ups_used = $make_ups_used;
    }

    function setExtra_sessions($extra_sessions): void {
        $this->extra_sessions = $extra_sessions;
    }

    function setExtra_sessions_used($extra_sessions_used): void {
        $this->extra_sessions_used = $extra_sessions_used;
    }

    function setOther_sessions($other_sessions): void {
        $this->other_sessions = $other_sessions;
    }

    function setOther_sessions_used($other_sessions_used): void {
        $this->other_sessions_used = $other_sessions_used;
    }

    function getMake_ups_buy() {
        return $this->make_ups_buy;
    }

    function setMake_ups_buy($make_ups_buy): void {
        $this->make_ups_buy = $make_ups_buy;
    }

    function getDate_assign() {
        return $this->date_assign;
    }

    function setDate_assign($date_assign): void {
        $this->date_assign = $date_assign;
    }

    function getPayment_id() {
        return $this->payment_id;
    }

    function setPayment_id($payment_id): void {
        $this->payment_id = $payment_id;
    }



}
