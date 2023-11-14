<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sessionsOccupancyModel
 *
 * @author sandra
 */
class sessionsOccupancyModel extends baseModel{
	
	private $id_course_session = 0;
	private $id_course_week = 0;
	private $occupancy_session = 0;
	private $by_flex = 0;
	private $not_attended_by_coach = 0;
	private $comments = '';
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_sessions_occupancy');
		
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

		if (!empty($this->id_course_week)) {
			if ($first) {
				$indices .= "id_course_week";
				$valores .= $this->id_course_week;
				$first = false;
			} else {
				$indices .= ",id_course_week";
				$valores .= "," . $this->id_course_week;
			}
		}
		
		if (!empty($this->occupancy_session)) {
			if ($first) {
				$indices .= "occupancy_session";
				$valores .= $this->occupancy_session;
				$first = false;
			} else {
				$indices .= ",occupancy_session";
				$valores .= "," . $this->occupancy_session;
			}
		}
		
		if (!empty($this->by_flex)) {
			if ($first) {
				$indices .= "by_flex";
				$valores .= $this->by_flex;
				$first = false;
			} else {
				$indices .= ",by_flex";
				$valores .= "," . $this->by_flex;
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
				$valores .= "'".$this->comments."'";
				$first = false;
			} else {
				$indices .= ",comments";
				$valores .= ",'" . $this->comments."'";
			}
		}


		return parent::add($indices, $valores);
	}
	
	public function update($campos='', $where = '') {		
		
		$where = 'id_course_session='.$this->id_course_session.' AND id_course_week='.$this->id_course_week;
		$first = true;		
		
		if ($first) {
			$campos .= " occupancy_session=$this->occupancy_session";
			$first = false;
		} else {
			$campos .= ", occupancy_session=$this->occupancy_session";
			
		}
		
		
		return parent::update($campos, $where);
	}
	
	public function updateFlex() {		
		
		$where = 'id_course_session='.$this->id_course_session.' AND id_course_week='.$this->id_course_week;	
		
		$campos = " by_flex=$this->by_flex";
		
		
		return parent::update($campos, $where);
	}
	
	public function updateReclame() {		
		
		$where = 'id_course_session='.$this->id_course_session.' AND id_course_week='.$this->id_course_week;	
		
		$campos = " not_attended_by_coach=$this->not_attended_by_coach";
		
		$campos.= ", comments='$this->comments'";
		
		
		return parent::update($campos, $where);
	}
	
	public function delete($where) {
		return parent::delete($where);
	}
	
	function getBy_flex() {
		return $this->by_flex;
	}

	function setBy_flex($by_flex) {
		$this->by_flex = $by_flex;
	}

		
	function getId_course_session() {
		return $this->id_course_session;
	}

	function getId_course_week() {
		return $this->id_course_week;
	}

	function getOccupancy_session() {
		return $this->occupancy_session;
	}

	function setId_course_session($id_course_session) {
		$this->id_course_session = $id_course_session;
	}

	function setId_course_week($id_course_week) {
		$this->id_course_week = $id_course_week;
	}

	function setOccupancy_session($occupancy_session) {
		$this->occupancy_session = $occupancy_session;
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
