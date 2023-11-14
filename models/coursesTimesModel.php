<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of coursesTimesModel
 *
 * @author sandra
 */
class coursesTimesModel extends baseModel{
	
	private $id_time = 0;
	private $id_course = 0;
	private $time_from = '';
	private $time_to = '';
	private $days_week = '';
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_courses_times');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
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

		if (!empty($this->time_from)) {
			if ($first) {
				$indices .= "time_from";
				$valores .= "'" . $this->time_from . "'";
				$first = false;
			} else {
				$indices .= ",time_from";
				$valores .= ",'" . $this->time_from . "'";
			}
		}
		
		if (!empty($this->time_to)) {
			if ($first) {
				$indices .= "time_to";
				$valores .= "'" . $this->time_to . "'";
				$first = false;
			} else {
				$indices .= ",time_to";
				$valores .= ",'" . $this->time_to . "'";
			}
		}
		
		if (!empty($this->days_week)) {
			if ($first) {
				$indices .= "days_week";
				$valores .= "'" . $this->days_week . "'";
				$first = false;
			} else {
				$indices .= ",days_week";
				$valores .= ",'" . $this->days_week . "'";
			}
		}
		
		return parent::add($indices, $valores);
	}
	
	public function delete($where) {
		return parent::delete($where);
	}

	function getId_time() {
		return $this->id_time;
	}

	function getId_course() {
		return $this->id_course;
	}

	function getTime_from() {
		return $this->time_from;
	}

	function getTime_to() {
		return $this->time_to;
	}

	function getDays_week() {
		return $this->days_week;
	}

	function setId_time($id_time) {
		$this->id_time = $id_time;
	}

	function setId_course($id_course) {
		$this->id_course = $id_course;
	}

	function setTime_from($time_from) {
		$this->time_from = $time_from;
	}

	function setTime_to($time_to) {
		$this->time_to = $time_to;
	}

	function setDays_week($days_week) {
		$this->days_week = $days_week;
	}


	
}
?>