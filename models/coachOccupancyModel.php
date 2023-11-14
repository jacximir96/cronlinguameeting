<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of coachOccupancyModel
 *
 * @author sandra
 */
class coachOccupancyModel extends baseModel{
	
	private $id_course_session = 0;
	private $id_coach = 0;
	private $occupancy_session = 0;
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_coach_occupancy');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $valores='') {		
		
		$first = true;
		
		if (!empty($this->id_course_session)) {
			if ($first) {
				$indices .= "id_course_session";
				$valores .= $this->id_course_session;
				$first = false;
			} else {
				$indices .= ",id_course_session";
				$valores .= "," . $this->id_course_session;
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
		
		if (!empty($this->occupancy_session)) {
			if ($first) {
				$indices .= "personal_occ";
				$valores .= $this->occupancy_session;
				$first = false;
			} else {
				$indices .= ",personal_occ";
				$valores .= "," . $this->occupancy_session;
			}
		}


		return parent::add($indices, $valores);
	}
	
	public function update($campos='', $where = '') {		
		
		$where = 'id_course_session='.$this->id_course_session.' AND id_coach='.$this->id_coach;
		$first = true;		

		
		if ($first) {
			$campos .= " personal_occ=$this->occupancy_session";
			$first = false;
		} else {
			$campos .= ", personal_occ=$this->occupancy_session";
			
		}
		
		
		return parent::update($campos, $where);
	}
	
	public function delete($where) {
		return parent::delete($where);
	}
	
	function getId_course_session() {
		return $this->id_course_session;
	}

	function getId_coach() {
		return $this->id_coach;
	}

	function getOccupancy_session() {
		return $this->occupancy_session;
	}

	function setId_course_session($id_course_session) {
		$this->id_course_session = $id_course_session;
	}

	function setId_coach($id_coach) {
		$this->id_coach = $id_coach;
	}

	function setOccupancy_session($occupancy_session) {
		$this->occupancy_session = $occupancy_session;
	}


	
}
