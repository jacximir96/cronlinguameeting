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

    private $id = 0;
    private $student_id = 0;
    private $section_id = 0;
    private $active = 0;
    private $registered_at = '';
    private $activated_at = '';
    private $finished_at = '';
    private $intro_session = 0;
    private $created_at = '';
    private $updated_at = '';
    private $deleted_at = '';

    function __construct() {

        parent::__construct();
        parent::setTable('enrollment');
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

        if (!empty($this->student_id)) {
            if ($first) {
                $indices .= "student_id";
                $valores .= $this->student_id;
                $first = false;
            } else {
                $indices .= ",student_id";
                $valores .= "," . $this->student_id;
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

        if (!empty($this->registered_at)) {
            if ($first) {
                $indices .= "registered_at";
                $valores .= "'" . $this->registered_at . "'";
                $first = false;
            } else {
                $indices .= ",registered_at";
                $valores .= ",'" . $this->registered_at . "'";
            }
        }

        if (!empty($this->activated_at)) {
            if ($first) {
                $indices .= "activated_at";
                $valores .= "'" . $this->activated_at . "'";
                $first = false;
            } else {
                $indices .= ",activated_at";
                $valores .= ",'" . $this->activated_at . "'";
            }
        }

        if (!empty($this->finished_at)) {
            if ($first) {
                $indices .= "finished_at";
                $valores .= "'" . $this->finished_at . "'";
                $first = false;
            } else {
                $indices .= ",finished_at";
                $valores .= ",'" . $this->finished_at . "'";
            }
        }

        if (!empty($this->intro_session)) {
            if ($first) {
                $indices .= "intro_session";
                $valores .= $this->intro_session;
                $first = false;
            } else {
                $indices .= ",intro_session";
                $valores .= "," . $this->intro_session;
            }
        }

        if (!empty($this->created_at)) {
            if ($first) {
                $indices .= "created_at";
                $valores .= "'" . $this->created_at . "'";
                $first = false;
            } else {
                $indices .= ",created_at";
                $valores .= ",'" . $this->created_at . "'";
            }
        }

        if (!empty($this->updated_at)) {
            if ($first) {
                $indices .= "updated_at";
                $valores .= "'" . $this->updated_at . "'";
                $first = false;
            } else {
                $indices .= ",updated_at";
                $valores .= ",'" . $this->updated_at . "'";
            }
        }

        if (!empty($this->deleted_at)) {
            if ($first) {
                $indices .= "deleted_at";
                $valores .= "'" . $this->deleted_at . "'";
                $first = false;
            } else {
                $indices .= ",deleted_at";
                $valores .= ",'" . $this->deleted_at . "'";
            }
        }

        return parent::add($indices, $valores);
    }

    /*public function desactiveCourse() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "active=0";

        return parent::update($campos, $where);
    }*/

    /*public function updateActive() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user . " AND section_id=" . $this->section_id;

        $campos = "active=1";

        return parent::update($campos, $where);
    }*/

    /*public function deactivateCourse() {

        $where = "course_id=" . $this->course_id;

        $campos = "active=0";

        return parent::update($campos, $where);
    }*/

    /*public function updateSection() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "section_id=$this->section_id";

        return parent::update($campos, $where);
    }*/

    /*public function deleteSection() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "section_id=0";

        return parent::update($campos, $where);
    }*/
    
    /*public function updateMakeUpsBuy() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "make_ups_buy=$this->make_ups_buy";

        return parent::update($campos, $where);
    }*/
    
    /*public function updateMakeUpsBuyCourse() {

        $where = "course_id=" . $this->course_id." AND make_ups_buy=0" ;

        $campos = "make_ups_buy=$this->make_ups_buy";

        return parent::update($campos, $where);
    }*/

    /*public function updateMakeUpsBuyByCourse($where = '', $campos = '') {

        $where = "course_id=" . $this->course_id;

        $campos = "make_ups_buy=$this->make_ups_buy";

        return parent::update($campos, $where);
    }*/

    /*public function updateEndDateByCourse() {

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
    }*/

    /*public function updateMakeUps() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "make_ups=$this->make_ups";

        return parent::update($campos, $where);
    }*/
    
    /*public function updateMakeUpsPayment() {

        $where = "enroll_id=$this->enroll_id ";

        $campos = "make_ups=$this->make_ups,make_ups_buy=$this->make_ups_buy";

        return parent::update($campos, $where);
    }*/

    /*public function updateMakeUpsUsed() {

        $where = "enroll_id=$this->enroll_id";

        $campos = "make_ups_used=$this->make_ups_used";

        return parent::update($campos, $where);
    }*/

    /*public function updateExtra() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "extra_sessions=$this->extra_sessions";

        return parent::update($campos, $where);
    }*/

    /*public function updateExtraUsed() {

        $where = "enroll_id=$this->enroll_id";

        $campos = "extra_sessions_used=$this->extra_sessions_used";

        return parent::update($campos, $where);
    }*/

    /*public function updateOther() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "other_sessions=$this->other_sessions";

        return parent::update($campos, $where);
    }*/

    /*public function updateOtherUsed() {

        $where = "enroll_id=$this->enroll_id ";

        $campos = "other_sessions_used=$this->other_sessions_used";

        return parent::update($campos, $where);
    }*/
    
    /*public function updatePaymentId() {

        $where = "enroll_id=$this->enroll_id  AND id_user=$this->id_user";

        $campos = "payment_id='$this->payment_id'";

        return parent::update($campos, $where);
    }*/

    /*public function updateNewPaymentId($old_payment) {

        $where = "payment_id='$old_payment";

        $campos = "payment_id='$this->payment_id'";
        $campos.= ",date_assign='$this->date_assign'";

        echo $where.' '.$campos;

        return parent::update($campos, $where);
    }*/

    /*public function updateAllSessions() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "make_ups=$this->make_ups";
        $campos.= ",extra_sessions=$this->extra_sessions";
        $campos = ",other_sessions=$this->other_sessions";
        

        return parent::update($campos, $where);
    }*/
    
    /*public function updateAllSessionsUsed() {

        $where = "enroll_id=$this->enroll_id AND course_id=" . $this->course_id . " AND id_user=" . $this->id_user;

        $campos = "make_ups_used=$this->make_ups_used";
        $campos.= ",extra_sessions_used=$this->extra_sessions_used";
        $campos = ",other_sessions_used=$this->other_sessions_used";
        

        return parent::update($campos, $where);
    }*/

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id) : void
    {
        $this->id = $id;
    }

    /**
     * Get the value of student_id
     */ 
    public function getStudent_id()
    {
        return $this->student_id;
    }

    /**
     * Set the value of student_id
     *
     * @return  self
     */ 
    public function setStudent_id($student_id) : void
    {
        $this->student_id = $student_id;
    }

    /**
     * Get the value of section_id
     */ 
    public function getSection_id()
    {
        return $this->section_id;
    }

    /**
     * Set the value of section_id
     *
     * @return  self
     */ 
    public function setSection_id($section_id) : void
    {
        $this->section_id = $section_id;
    }

    /**
     * Get the value of active
     */ 
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */ 
    public function setActive($active) : void
    {
        $this->active = $active;
    }

    /**
     * Get the value of registered_at
     */ 
    public function getRegistered_at()
    {
        return $this->registered_at;
    }

    /**
     * Set the value of registered_at
     *
     * @return  self
     */ 
    public function setRegistered_at($registered_at) : void
    {
        $this->registered_at = $registered_at;
    }

    /**
     * Get the value of activated_at
     */ 
    public function getActivated_at()
    {
        return $this->activated_at;
    }

    /**
     * Set the value of activated_at
     *
     * @return  self
     */ 
    public function setActivated_at($activated_at) : void
    {
        $this->activated_at = $activated_at;
    }

    /**
     * Get the value of finished_at
     */ 
    public function getFinished_at()
    {
        return $this->finished_at;
    }

    /**
     * Set the value of finished_at
     *
     * @return  self
     */ 
    public function setFinished_at($finished_at) : void
    {
        $this->finished_at = $finished_at;
    }

    /**
     * Get the value of intro_session
     */ 
    public function getIntro_session()
    {
        return $this->intro_session;
    }

    /**
     * Set the value of intro_session
     *
     * @return  self
     */ 
    public function setIntro_session($intro_session) : void
    {
        $this->intro_session = $intro_session;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at) : void
    {
        $this->created_at = $created_at;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at) : void
    {
        $this->updated_at = $updated_at;
    }

    /**
     * Get the value of deleted_at
     */ 
    public function getDeleted_at()
    {
        return $this->deleted_at;
    }

    /**
     * Set the value of deleted_at
     *
     * @return  self
     */ 
    public function setDeleted_at($deleted_at) : void
    {
        $this->deleted_at = $deleted_at;
    }
}
