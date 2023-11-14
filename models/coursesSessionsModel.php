<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of coursesSessionsModel
 *
 * @author sandra
 */
class coursesSessionsModel extends baseModel{	
	
	private $id_course_session = 0;
	private $id_course = 0;
	private $id_coach = 0;
	private $time_from_session = '';
	private $time_to_session = '';
	private $day_week_session = '';
	private $occupancy = 0;
	private $date_ini_week = '';
	private $daylight_assig = 0;
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_courses_sessions');
		
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
	
	public function selectPagination($where = '', $join = '', $order = '', $limit = '', $select='*') {
		return parent::selectPagination($where, $join, $order, $limit,$select);
	}
	
	public function add($indices='', $valores='') {		
		
		$first = true;

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
		
		if (!empty($this->time_from_session)) {
			if ($first) {
				$indices .= "time_from_session";
				$valores .= "'" . $this->time_from_session . "'";
				$first = false;
			} else {
				$indices .= ",time_from_session";
				$valores .= ",'" . $this->time_from_session . "'";
			}
		}
		
		if (!empty($this->time_to_session)) {
			if ($first) {
				$indices .= "time_to_session";
				$valores .= "'" . $this->time_to_session . "'";
				$first = false;
			} else {
				$indices .= ",time_to_session";
				$valores .= ",'" . $this->time_to_session . "'";
			}
		}
		
		if (!empty($this->day_week_session)) {
			if ($first) {
				$indices .= "day_week_session";
				$valores .= "'" . $this->day_week_session . "'";
				$first = false;
			} else {
				$indices .= ",day_week_session";
				$valores .= ",'" . $this->day_week_session . "'";
			}
		}
		
		if (!empty($this->date_ini_week)) {
			if ($first) {
				$indices .= "date_ini_week";
				$valores .= "'" . $this->date_ini_week . "'";
				$first = false;
			} else {
				$indices .= ",date_ini_week";
				$valores .= ",'" . $this->date_ini_week . "'";
			}
		}
		
		if ($first) {
			$indices .= "occupancy,daylight_assig";
			$valores .= $this->occupancy.",".$this->daylight_assig;
			$first = false;
		} else {
			$indices .= ",occupancy,daylight_assig";
			$valores .= "," . $this->occupancy.",".$this->daylight_assig;
		}


		return parent::add($indices, $valores);
	}
	
	
	public function update($campos='', $where = '') {
		
		
		$where = 'id_course_session='.$this->id_course_session.' AND id_course='.$this->id_course;
		$first = true;		
		
		if(!empty($this->id_coach)){
			if ($first) {
				$campos.=" id_coach=".$this->id_coach;
				$first = false;
			} else {
				$campos.=", id_coach=".$this->id_coach;
			}
			
		}		
		
		if(!empty($this->time_from_session)){
			if ($first) {
				$campos.=" time_from_session='".$this->time_from_session."'";
				$first = false;
			} else {
				$campos.=", time_from_session='".$this->time_from_session."'";
			}
			
		}
		
		
		if(!empty($this->time_to_session)){
			if ($first) {
				$campos.=" time_to_session='".$this->time_to_session."'";
				$first = false;
			} else {
				$campos.=", time_to_session='".$this->time_to_session."'";
			}
			
		}
		
		if(!empty($this->day_week_session)){
			if ($first) {
				$campos.=" day_week_session='".$this->day_week_session."'";
				$first = false;
			} else {
				$campos.=", day_week_session='".$this->day_week_session."'";
			}
			
		}
		
		if(!empty($this->occupancy)){
			if ($first) {
				$campos.=" occupancy=".$this->occupancy;
				$first = false;
			} else {
				$campos.=", occupancy=".$this->occupancy;
			}
			
		}
		
		if(!empty($this->date_ini_week)){
			if ($first) {
				$campos.=" date_ini_week='".$this->date_ini_week."'";
				$first = false;
			} else {
				$campos.=", date_ini_week='".$this->date_ini_week."'";
			}
			
		}
		
		/*if ($first) {
			$campos .= " daylight_assig=".$this->daylight_assig;
			$first = false;
		} else {
			$campos .= ", daylight_assig=".$this->daylight_assig;
		}*/
		
		return parent::update($campos, $where);
	}
	
	public function updateOccupancy() {		
		
		$where = 'id_course_session='.$this->id_course_session.' AND id_course='.$this->id_course;

		$campos =" occupancy=".$this->occupancy;
		
		return parent::update($campos, $where);
	}
	
	public function updateDateIniWeek(){
		
		$where = 'id_course_session='.$this->id_course_session.' AND id_course='.$this->id_course;

		$campos =" date_ini_week='".$this->date_ini_week."'";
		
		return parent::update($campos, $where);
	}
	
	public function updateDaylight(){
		
		$where = 'id_course_session='.$this->id_course_session.' AND id_course='.$this->id_course;

		$campos =" daylight_assig=".$this->daylight_assig;
		
		return parent::update($campos, $where);
	}

	function getDate_ini_week() {
		return $this->date_ini_week;
	}

	function setDate_ini_week($date_ini_week) {
		$this->date_ini_week = $date_ini_week;
	}

		
	public function delete($where) {
		return parent::delete($where);
	}
	
	function getId_course_session() {
		return $this->id_course_session;
	}

	function getId_course() {
		return $this->id_course;
	}

	function getId_coach() {
		return $this->id_coach;
	}

	function getTime_from_session() {
		return $this->time_from_session;
	}

	function getTime_to_session() {
		return $this->time_to_session;
	}

	function getDay_week_session() {
		return $this->day_week_session;
	}

	function getOccupancy() {
		return $this->occupancy;
	}

	function setId_course_session($id_course_session) {
		$this->id_course_session = $id_course_session;
	}

	function setId_course($id_course) {
		$this->id_course = $id_course;
	}

	function setId_coach($id_coach) {
		$this->id_coach = $id_coach;
	}

	function setTime_from_session($time_from_session) {
		$this->time_from_session = $time_from_session;
	}

	function setTime_to_session($time_to_session) {
		$this->time_to_session = $time_to_session;
	}

	function setDay_week_session($day_week_session) {
		$this->day_week_session = $day_week_session;
	}

	function setOccupancy($occupancy) {
		$this->occupancy = $occupancy;
	}

	function getDaylight_assig() {
	    return $this->daylight_assig;
	}

	function setDaylight_assig($daylight_assig) {
	    $this->daylight_assig = $daylight_assig;
	}



}
?>