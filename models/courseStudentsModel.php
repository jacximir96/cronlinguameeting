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
class courseStudentsModel extends baseModel{
	
	private $id_course = 0;
	private $id_section = 0;
	private $id_student = 0;
	private $date_assign = null;
	private $active_course = 0;
	private $is_Flex = 0;
	private $end_register_flex = null;
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_course_students');
		
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
		
		if (!empty($this->id_student)) {
			if ($first) {
				$indices .= "id_student";
				$valores .= $this->id_student;
				$first = false;
			} else {
				$indices .= ",id_student";
				$valores .= "," . $this->id_student;
			}
		}
		
		if (!empty($this->id_section)) {
			if ($first) {
				$indices .= "id_section";
				$valores .= $this->id_section;
				$first = false;
			} else {
				$indices .= ",id_section";
				$valores .= "," . $this->id_section;
			}
		}
		
		if (!empty($this->date_assign)) {
			if ($first) {
				$indices .= "date_assign";
				$valores .= "'" . $this->date_assign . "'";
				$first = false;
			} else {
				$indices .= ",date_assign";
				$valores .= ",'" . $this->date_assign . "'";
			}
		}
		
		if (!empty($this->active_course)) {
			if ($first) {
				$indices .= "active_course";
				$valores .= $this->active_course;
				$first = false;
			} else {
				$indices .= ",active_course";
				$valores .= "," . $this->active_course;
			}
		}
		
		if (!empty($this->is_Flex)) {
			if ($first) {
				$indices .= "is_Flex";
				$valores .= $this->is_Flex;
				$first = false;
			} else {
				$indices .= ",is_Flex";
				$valores .= "," . $this->is_Flex;
			}
		}

		if (!empty($this->end_register_flex)) {
			if ($first) {
				$indices .= "end_register_flex";
				$valores .= "'" . $this->end_register_flex . "'";
				$first = false;
			} else {
				$indices .= ",end_register_flex";
				$valores .= ",'" . $this->end_register_flex . "'";
			}
		}
	
		return parent::add($indices, $valores);
	}
	
	public function desactiveCourse(){
		
		$where = "id_course=".$this->id_course." AND id_student=".$this->id_student;
		
		$campos = "active_course=0";
		
		return parent::update($campos, $where);
	}
	
	public function updateActive(){
		
		$where = "id_course=".$this->id_course." AND id_student=".$this->id_student." AND id_section=".$this->id_section;
		
		$campos = "active_course=1";
		
		return parent::update($campos, $where);
	}
	
	public function updateSection(){
		
		$where = "id_course=".$this->id_course." AND id_student=".$this->id_student;
		
		$campos = "id_section=$this->id_section";
		
		return parent::update($campos, $where);
	}
	
	public function deleteSection(){
		
		$where = "id_course=".$this->id_course." AND id_student=".$this->id_student;
		
		$campos = "id_section=0";
		
		return parent::update($campos, $where);
	}
	
	function getIs_Flex() {
		return $this->is_Flex;
	}

	function getEnd_register_flex() {
		return $this->end_register_flex;
	}

	function setIs_Flex($is_Flex) {
		$this->is_Flex = $is_Flex;
	}

	function setEnd_register_flex($end_register_flex) {
		$this->end_register_flex = $end_register_flex;
	}

		
	function getId_course() {
		return $this->id_course;
	}

	function getId_student() {
		return $this->id_student;
	}

	function setId_course($id_course) {
		$this->id_course = $id_course;
	}

	function setId_student($id_student) {
		$this->id_student = $id_student;
	}
	
	function getId_section() {
		return $this->id_section;
	}

	function getDate_assign() {
		return $this->date_assign;
	}

	function setId_section($id_section) {
		$this->id_section = $id_section;
	}

	function setDate_assign($date_assign) {
		$this->date_assign = $date_assign;
	}

	function getActive_course() {
		return $this->active_course;
	}

	function setActive_course($active_course) {
		$this->active_course = $active_course;
	}




}
