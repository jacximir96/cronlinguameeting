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
class coachScheduleModel extends baseModel{
	
	
	private $id_schedule = 0;
	private $id_coach = 0;
	private $time_from_schedule = '';
	private $time_to_schedule = '';
	private $day_week_schedule = '';
	private $date_schedule_start = null;
	private $date_schedule_end = null;
	private $date_time_start = null;
	private $date_time_end = null;
	private $break_time_start = null;
	private $break_time_end = null;
	private $blocked_ses = 0;
	private $is_occ = 0;
	private $who_occ = 0;
	private $id_course_occ = 0;
	private $from_flex = 0;
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_coach_schedule');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $valores='') {
		
		$first = true;
		
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
		
		if (!empty($this->date_schedule_start)) {
			if ($first) {
				$indices .= "date_schedule_start";
				$valores .= "'" . $this->date_schedule_start . "'";
				$first = false;
			} else {
				$indices .= ",date_schedule_start";
				$valores .= ",'" . $this->date_schedule_start . "'";
			}
		}
		
		if (!empty($this->date_schedule_end)) {
			if ($first) {
				$indices .= "date_schedule_end";
				$valores .= "'" . $this->date_schedule_end . "'";
				$first = false;
			} else {
				$indices .= ",date_schedule_end";
				$valores .= ",'" . $this->date_schedule_end . "'";
			}
		}
		
		if (!empty($this->date_time_start)) {
			if ($first) {
				$indices .= "date_time_start";
				$valores .= "'" . $this->date_time_start . "'";
				$first = false;
			} else {
				$indices .= ",date_time_start";
				$valores .= ",'" . $this->date_time_start . "'";
			}
		}
		
		if (!empty($this->date_time_end)) {
			if ($first) {
				$indices .= "date_time_end";
				$valores .= "'" . $this->date_time_end . "'";
				$first = false;
			} else {
				$indices .= ",date_time_end";
				$valores .= ",'" . $this->date_time_end . "'";
			}
		}
		
		if (!empty($this->break_time_start)) {
			if ($first) {
				$indices .= "break_time_start";
				$valores .= "'" . $this->break_time_start . "'";
				$first = false;
			} else {
				$indices .= ",break_time_start";
				$valores .= ",'" . $this->break_time_start . "'";
			}
		}
		
		if (!empty($this->break_time_end)) {
			if ($first) {
				$indices .= "break_time_end";
				$valores .= "'" . $this->break_time_end . "'";
				$first = false;
			} else {
				$indices .= ",break_time_end";
				$valores .= ",'" . $this->break_time_end . "'";
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
		
		if (!empty($this->who_occ)) {
			if ($first) {
				$indices .= "who_occ";
				$valores .= $this->who_occ;
				$first = false;
			} else {
				$indices .= ",who_occ";
				$valores .= "," . $this->who_occ;
			}
		}
		
		if (!empty($this->id_course_occ)) {
			if ($first) {
				$indices .= "id_course_occ";
				$valores .= $this->id_course_occ;
				$first = false;
			} else {
				$indices .= ",id_course_occ";
				$valores .= "," . $this->id_course_occ;
			}
		}
		
		if (!empty($this->from_flex)) {
			if ($first) {
				$indices .= "from_flex";
				$valores .= $this->from_flex;
				$first = false;
			} else {
				$indices .= ",from_flex";
				$valores .= "," . $this->from_flex;
			}
		}
		
		
		
		return parent::add($indices, $valores);
	}
	
	public function update($campos='', $where = '') {
		
		
		$where = 'id_schedule='.$this->id_schedule;
		$first = true;		
		
		if(!empty($this->id_coach)){
			if ($first) {
				$campos.=" id_coach=".$this->id_coach;
				$first = false;
			} else {
				$campos.=", id_coach=".$this->id_coach;
			}
			
		}		
		
		if(!empty($this->time_from_schedule)){
			if ($first) {
				$campos.=" time_from_schedule='".$this->time_from_schedule."'";
				$first = false;
			} else {
				$campos.=", time_from_schedule='".$this->time_from_schedule."'";
			}
			
		}
		
		
		if(!empty($this->time_to_schedule)){
			if ($first) {
				$campos.=" time_to_schedule='".$this->time_to_schedule."'";
				$first = false;
			} else {
				$campos.=", time_to_schedule='".$this->time_to_schedule."'";
			}
			
		}
		
		if(!empty($this->day_week_schedule)){
			if ($first) {
				$campos.=" day_week_schedule='".$this->day_week_schedule."'";
				$first = false;
			} else {
				$campos.=", day_week_schedule='".$this->day_week_schedule."'";
			}
			
		}
		
		if(!empty($this->date_schedule_start)){
			if ($first) {
				$campos.=" date_schedule_start='".$this->date_schedule_start."'";
				$first = false;
			} else {
				$campos.=", date_schedule_start='".$this->date_schedule_start."'";
			}
			
		}
		
		if(!empty($this->date_schedule_end)){
			if ($first) {
				$campos.=" date_schedule_end='".$this->date_schedule_end."'";
				$first = false;
			} else {
				$campos.=", date_schedule_end='".$this->date_schedule_end."'";
			}
			
		}
		
		if(!empty($this->date_time_start)){
			if ($first) {
				$campos.=" date_time_start='".$this->date_time_start."'";
				$first = false;
			} else {
				$campos.=", date_time_start='".$this->date_time_start."'";
			}
			
		}
		
		if(!empty($this->date_time_end)){
			if ($first) {
				$campos.=" date_time_end='".$this->date_time_end."'";
				$first = false;
			} else {
				$campos.=", date_time_end='".$this->date_time_end."'";
			}
			
		}
		
		if(!empty($this->break_time_start)){
			if ($first) {
				$campos.=" break_time_start='".$this->break_time_start."'";
				$first = false;
			} else {
				$campos.=", break_time_start='".$this->break_time_start."'";
			}
			
		}
		
		if(!empty($this->break_time_end)){
			if ($first) {
				$campos.=" break_time_end='".$this->break_time_end."'";
				$first = false;
			} else {
				$campos.=", break_time_end='".$this->break_time_end."'";
			}
			
		}
		
		if(!empty($this->blocked_ses)){
			if ($first) {
				$campos.=" blocked_ses=".$this->blocked_ses;
				$first = false;
			} else {
				$campos.=", blocked_ses=".$this->blocked_ses;
			}
			
		}	
		
		if ($first) {
		    $campos .= " is_occ=" . $this->is_occ.",who_occ=$this->who_occ,id_course_occ=$this->id_course_occ,from_flex=$this->from_flex";
		    $first = false;
		} else {
		    $campos .= ", is_occ=" . $this->is_occ.",who_occ=$this->who_occ,id_course_occ=$this->id_course_occ,from_flex=$this->from_flex";
		}


	return parent::update($campos, $where);
	}
	
	public function updateBlocked(){
	
		$where = "id_coach=".$this->id_coach." AND time_from_schedule='".$this->time_from_schedule."' AND day_week_schedule='".$this->day_week_schedule."'";
		
		$campos = " blocked_ses=".$this->blocked_ses;
		
		return parent::update($campos,$where);
	}
	
	public function updateBlockedDate(){
	
		$where = "id_coach=".$this->id_coach." AND time_from_schedule='".$this->time_from_schedule."' AND day_week_schedule='".$this->day_week_schedule."'"
			. " AND date_schedule_start <='$this->date_schedule_start' AND date_schedule_end >= '$this->date_schedule_start' "
			 . "AND date_schedule_start <= '$this->date_schedule_end' AND date_schedule_end >= '$this->date_schedule_end'";
		
		$campos = " blocked_ses=".$this->blocked_ses;
		
		return parent::update($campos,$where);
	}
	
	public function updateOcc(){
	
		$where = "id_coach=".$this->id_coach." AND time_from_schedule='".$this->time_from_schedule."' AND day_week_schedule='".$this->day_week_schedule."'"
			. " AND date_schedule_start <='$this->date_schedule_start' AND date_schedule_end >= '$this->date_schedule_start' "
			 . "AND date_schedule_start <= '$this->date_schedule_end' AND date_schedule_end >= '$this->date_schedule_end'";
		
		$campos = " is_occ=".$this->is_occ;
		
		return parent::update($campos,$where);
	}
	
    public function updateBlockedSchedule() {

	$where = "id_coach=" . $this->id_coach . " AND id_schedule=" . $this->id_schedule;

	$campos = " blocked_ses=" . $this->blocked_ses;

	return parent::update($campos, $where);
    }

    public function delete($where) {
		return parent::delete($where);
	}
	
	function getIs_occ() {
	    return $this->is_occ;
	}

	function getWho_occ() {
	    return $this->who_occ;
	}

	function getFrom_flex() {
	    return $this->from_flex;
	}

	function setIs_occ($is_occ) {
	    $this->is_occ = $is_occ;
	}

	function setWho_occ($who_occ) {
	    $this->who_occ = $who_occ;
	}

	function setFrom_flex($from_flex) {
	    $this->from_flex = $from_flex;
	}
	
	function getDate_time_start() {
	    return $this->date_time_start;
	}

	function getDate_time_end() {
	    return $this->date_time_end;
	}

	function getBreak_time_start() {
	    return $this->break_time_start;
	}

	function getBreak_time_end() {
	    return $this->break_time_end;
	}

	function getId_course_occ() {
	    return $this->id_course_occ;
	}

	function setDate_time_start($date_time_start) {
	    $this->date_time_start = $date_time_start;
	}

	function setDate_time_end($date_time_end) {
	    $this->date_time_end = $date_time_end;
	}

	function setBreak_time_start($break_time_start) {
	    $this->break_time_start = $break_time_start;
	}

	function setBreak_time_end($break_time_end) {
	    $this->break_time_end = $break_time_end;
	}

	function setId_course_occ($id_course_occ) {
	    $this->id_course_occ = $id_course_occ;
	}
		
	function getId_schedule() {
		return $this->id_schedule;
	}

	function getId_coach() {
		return $this->id_coach;
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

	function setId_schedule($id_schedule) {
		$this->id_schedule = $id_schedule;
	}

	function setId_coach($id_coach) {
		$this->id_coach = $id_coach;
	}


	function setTime_from_schedule($time_from_schedule) {
		$this->time_from_schedule = $time_from_schedule;
	}

	function setTime_to_schedule($time_to_schedule) {
		$this->time_to_schedule = $time_to_schedule;
	}

	function setDay_week_schedule($day_week_schedule) {
		$this->day_week_schedule = $day_week_schedule;
	}

	function getDate_schedule_start() {
		return $this->date_schedule_start;
	}

	function getDate_schedule_end() {
		return $this->date_schedule_end;
	}

	function getBlocked_ses() {
		return $this->blocked_ses;
	}

	function setDate_schedule_start($date_schedule_start) {
		$this->date_schedule_start = $date_schedule_start;
	}

	function setDate_schedule_end($date_schedule_end) {
		$this->date_schedule_end = $date_schedule_end;
	}

	function setBlocked_ses($blocked_ses) {
		$this->blocked_ses = $blocked_ses;
	}


	
}
