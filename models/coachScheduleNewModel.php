<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of coachScheduleModel
 *
 * @author sandra
 */
class coachScheduleNewModel extends baseModel {

    private $schedule_id = 0;
    private $coach_id = 0;
    private $semester_id = 0;
    private $year = 0;
    private $time_from_schedule = '';
    private $time_to_schedule = '';
    private $day_week_schedule = '';
    private $schedule_date = null;
    private $blocked_ses = 0;
    private $is_occ = 0;
    private $occ_max = 0;
    private $course_id = 0;
    private $is_from_other_type = 0;
    private $time_zone = '';
    private $actual_occ = 0;

    function __construct() {

        parent::__construct();
        parent::setTable('lm_coach_schedule_new');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
        return parent::select($where, $as, $select, $join);
    }

    public function add($indices = '', $valores = '') {

        $first = true;

        if (!empty($this->coach_id)) {
            if ($first) {
                $indices .= "coach_id";
                $valores .= $this->coach_id;
                $first = false;
            } else {
                $indices .= ",coach_id";
                $valores .= "," . $this->coach_id;
            }
        }
        
        if (!empty($this->semester_id)) {
            if ($first) {
                $indices .= "semester_id";
                $valores .= $this->semester_id;
                $first = false;
            } else {
                $indices .= ",semester_id";
                $valores .= "," . $this->semester_id;
            }
        }
        
        if (!empty($this->year)) {
            if ($first) {
                $indices .= "year";
                $valores .= $this->year;
                $first = false;
            } else {
                $indices .= ",year";
                $valores .= "," . $this->year;
            }
        }

        if (!empty($this->time_from_schedule)) {
            if ($first) {
                $indices .= "time_from_schedule";
                $valores .= "'" . $this->time_from_schedule . "'";
                $first = false;
            } else {
                $indices .= ",time_from_schedule";
                $valores .= ",'" . $this->time_from_schedule . "'";
            }
        }

        if (!empty($this->time_to_schedule)) {
            if ($first) {
                $indices .= "time_to_schedule";
                $valores .= "'" . $this->time_to_schedule . "'";
                $first = false;
            } else {
                $indices .= ",time_to_schedule";
                $valores .= ",'" . $this->time_to_schedule . "'";
            }
        }

        if (!empty($this->day_week_schedule)) {
            if ($first) {
                $indices .= "day_week_schedule";
                $valores .= "'" . $this->day_week_schedule . "'";
                $first = false;
            } else {
                $indices .= ",day_week_schedule";
                $valores .= ",'" . $this->day_week_schedule . "'";
            }
        }


        if (!empty($this->schedule_date)) {
            if ($first) {
                $indices .= "schedule_date";
                $valores .= "'" . $this->schedule_date . "'";
                $first = false;
            } else {
                $indices .= ",schedule_date";
                $valores .= ",'" . $this->schedule_date . "'";
            }
        }


        if (!empty($this->blocked_ses)) {
            if ($first) {
                $indices .= "blocked_ses";
                $valores .= $this->blocked_ses;
                $first = false;
            } else {
                $indices .= ",blocked_ses";
                $valores .= "," . $this->blocked_ses;
            }
        }

        if (!empty($this->is_occ)) {
            if ($first) {
                $indices .= "is_occ";
                $valores .= $this->is_occ;
                $first = false;
            } else {
                $indices .= ",is_occ";
                $valores .= "," . $this->is_occ;
            }
        }
        
        if (!empty($this->actual_occ)) {
            if ($first) {
                $indices .= "actual_occ";
                $valores .= $this->actual_occ;
                $first = false;
            } else {
                $indices .= ",actual_occ";
                $valores .= "," . $this->actual_occ;
            }
        }

        if (!empty($this->occ_max)) {
            if ($first) {
                $indices .= "occ_max";
                $valores .= $this->occ_max;
                $first = false;
            } else {
                $indices .= ",occ_max";
                $valores .= "," . $this->occ_max;
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

        if (!empty($this->is_from_other_type)) {
            if ($first) {
                $indices .= "is_from_other_type";
                $valores .= $this->is_from_other_type;
                $first = false;
            } else {
                $indices .= ",is_from_other_type";
                $valores .= "," . $this->is_from_other_type;
            }
        }

        if (!empty($this->time_zone)) {
            if ($first) {
                $indices .= "time_zone";
                $valores .= "'" . $this->time_zone . "'";
                $first = false;
            } else {
                $indices .= ",time_zone";
                $valores .= ",'" . $this->time_zone . "'";
            }
        }

        return parent::add($indices, $valores);
    }

    public function update($campos = '', $where = '') {


        $where = 'schedule_id=' . $this->schedule_id;
        $first = true;

        if (!empty($this->coach_id)) {
            if ($first) {
                $campos .= " coach_id=" . $this->coach_id;
                $first = false;
            } else {
                $campos .= ", coach_id=" . $this->coach_id;
            }
        }
        
        if (!empty($this->semester_id)) {
            if ($first) {
                $campos .= " semester_id=" . $this->semester_id;
                $first = false;
            } else {
                $campos .= ", semester_id=" . $this->semester_id;
            }
        }
        
        if (!empty($this->year)) {
            if ($first) {
                $campos .= " year=" . $this->year;
                $first = false;
            } else {
                $campos .= ", year=" . $this->year;
            }
        }

        if (!empty($this->time_from_schedule)) {
            if ($first) {
                $campos .= " time_from_schedule='" . $this->time_from_schedule . "'";
                $first = false;
            } else {
                $campos .= ", time_from_schedule='" . $this->time_from_schedule . "'";
            }
        }


        if (!empty($this->time_to_schedule)) {
            if ($first) {
                $campos .= " time_to_schedule='" . $this->time_to_schedule . "'";
                $first = false;
            } else {
                $campos .= ", time_to_schedule='" . $this->time_to_schedule . "'";
            }
        }

        if (!empty($this->day_week_schedule)) {
            if ($first) {
                $campos .= " day_week_schedule='" . $this->day_week_schedule . "'";
                $first = false;
            } else {
                $campos .= ", day_week_schedule='" . $this->day_week_schedule . "'";
            }
        }

 
        if (!empty($this->schedule_date)) {
            if ($first) {
                $campos .= " schedule_date='" . $this->schedule_date . "'";
                $first = false;
            } else {
                $campos .= ", schedule_date='" . $this->schedule_date . "'";
            }
        }

 
        if (!empty($this->blocked_ses)) {
            if ($first) {
                $campos .= " blocked_ses=" . $this->blocked_ses;
                $first = false;
            } else {
                $campos .= ", blocked_ses=" . $this->blocked_ses;
            }
        }
        
        if (!empty($this->time_zone)) {
            if ($first) {
                $campos .= " time_zone='" . $this->time_zone . "'";
                $first = false;
            } else {
                $campos .= ", time_zone='" . $this->time_zone . "'";
            }
        }

        if ($first) {
            $campos .= " is_occ=" . $this->is_occ . ",occ_max=$this->occ_max,course_id=$this->course_id,is_from_other_type=$this->is_from_other_type";
            $first = false;
        } else {
            $campos .= ", is_occ=" . $this->is_occ . ",occ_max=$this->occ_max,course_id=$this->course_id,is_from_other_type=$this->is_from_other_type";
        }


        return parent::update($campos, $where);
    }

    public function updateBlocked() {

        $where = "schedule_id=" . $this->schedule_id;

        $campos = " blocked_ses=" . $this->blocked_ses;

        return parent::update($campos, $where);
    }


    public function updateOcc() {

        $where = "schedule_id=" . $this->schedule_id;

        $campos = " is_occ=" . $this->is_occ;

        return parent::update($campos, $where);
    }
    
    public function updateActualOcc() {

        $where = "schedule_id=" . $this->schedule_id;

        $campos = " actual_occ=" . $this->actual_occ;

        return parent::update($campos, $where);
    }
    
    public function updateScheduleCoach() {

        $where = "schedule_id=" . $this->schedule_id." AND coach_id=$this->coach_id";

        $campos = " is_occ=$this->is_occ,actual_occ=$this->actual_occ,course_id=$this->course_id,occ_max=$this->occ_max";

        return parent::update($campos, $where);
    }

    public function updateOccMaxByCourse($where = '', $campos = '') {

        $where = "course_id=" . $this->course_id;

        $campos = "occ_max=$this->occ_max";

        return parent::update($campos, $where);
    }


    public function delete($where) {
        return parent::delete($where);
    }

    function getSchedule_id() {
        return $this->schedule_id;
    }

    function getCoach_id() {
        return $this->coach_id;
    }

    function getSemester_id() {
        return $this->semester_id;
    }

    function getYear() {
        return $this->year;
    }

    function getTime_from_schedule() {
        return $this->time_from_schedule;
    }

    function getTime_to_schedule() {
        return $this->time_to_schedule;
    }

    function getDay_week_schedule() {
        return $this->day_week_schedule;
    }

    function getSchedule_date() {
        return $this->schedule_date;
    }

    function getBlocked_ses() {
        return $this->blocked_ses;
    }

    function getIs_occ() {
        return $this->is_occ;
    }

    function getOcc_max() {
        return $this->occ_max;
    }

    function getCourse_id() {
        return $this->course_id;
    }

    function getIs_from_other_type() {
        return $this->is_from_other_type;
    }

    function getTime_zone() {
        return $this->time_zone;
    }

    function setSchedule_id($schedule_id): void {
        $this->schedule_id = $schedule_id;
    }

    function setCoach_id($coach_id): void {
        $this->coach_id = $coach_id;
    }

    function setSemester_id($semester_id): void {
        $this->semester_id = $semester_id;
    }

    function setYear($year): void {
        $this->year = $year;
    }

    function setTime_from_schedule($time_from_schedule): void {
        $this->time_from_schedule = $time_from_schedule;
    }

    function setTime_to_schedule($time_to_schedule): void {
        $this->time_to_schedule = $time_to_schedule;
    }

    function setDay_week_schedule($day_week_schedule): void {
        $this->day_week_schedule = $day_week_schedule;
    }

    function setSchedule_date($schedule_date): void {
        $this->schedule_date = $schedule_date;
    }

    function setBlocked_ses($blocked_ses): void {
        $this->blocked_ses = $blocked_ses;
    }

    function setIs_occ($is_occ): void {
        $this->is_occ = $is_occ;
    }

    function setOcc_max($occ_max): void {
        $this->occ_max = $occ_max;
    }

    function setCourse_id($course_id): void {
        $this->course_id = $course_id;
    }

    function setIs_from_other_type($is_from_other_type): void {
        $this->is_from_other_type = $is_from_other_type;
    }

    function setTime_zone($time_zone): void {
        $this->time_zone = $time_zone;
    }

    function getActual_occ() {
        return $this->actual_occ;
    }

    function setActual_occ($actual_occ): void {
        $this->actual_occ = $actual_occ;
    }



}
