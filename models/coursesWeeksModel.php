<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of coursesWeeksModel
 *
 * @author sandra
 */
class coursesWeeksModel extends baseModel{
	
	private $id_course_week = 0;
	private $id_course = 0;
	private $date_start = null;
	private $date_end = null;
	private $alternative = '';
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_courses_weeks');
		
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

		if (!empty($this->date_start)) {
			if ($first) {
				$indices .= "date_start";
				$valores .= "'" . $this->date_start . "'";
				$first = false;
			} else {
				$indices .= ",date_start";
				$valores .= ",'" . $this->date_start . "'";
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
		
		if (!empty($this->alternative)) {
			if ($first) {
				$indices .= "alternative";
				$valores .= "'" . $this->alternative . "'";
				$first = false;
			} else {
				$indices .= ",alternative";
				$valores .= ",'" . $this->alternative . "'";
			}
		}
		
		return parent::add($indices, $valores);
	}
	
	public function delete($where) {
		return parent::delete($where);
	}

	
	public function updateAlternative(){
		
		$where = "id_course_week='".$this->id_course_week."'";
		
		$campos = "alternative='".$this->alternative."'";
		
		return parent::update($campos, $where);
	}
	
	function getId_course_week() {
		return $this->id_course_week;
	}

	function getId_course() {
		return $this->id_course;
	}

	function getDate_start() {
		return $this->date_start;
	}

	function getDate_end() {
		return $this->date_end;
	}

	function getAlternative() {
		return $this->alternative;
	}

	function setId_course_week($id_course_week) {
		$this->id_course_week = $id_course_week;
	}

	function setId_course($id_course) {
		$this->id_course = $id_course;
	}

	function setDate_start($date_start) {
		$this->date_start = $date_start;
	}

	function setDate_end($date_end) {
		$this->date_end = $date_end;
	}

	function setAlternative($alternative) {
		$this->alternative = $alternative;
	}


}

?>