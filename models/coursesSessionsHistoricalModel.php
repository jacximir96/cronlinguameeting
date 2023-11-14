<?php

/*
 * Developed by wilowi
 */

/**
 * Description of coursesSessionsHistoricalModel
 *
 * @author Sandra <wilowi.com>
 */
class coursesSessionsHistoricalModel extends baseModel{
	
	private $id_course_session = 0;
	private $id_course = 0;
	private $id_coach = 0;
	private $date_ini_history = '';
	private $date_end_history = '';
	private $time_from_history = '';
	private $time_to_history = '';
	private $day_history = '';
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_courses_sessions_historical');
		
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
		
		if (!empty($this->date_ini_history)) {
			if ($first) {
				$indices .= "date_ini_history";
				$valores .= "'" . $this->date_ini_history . "'";
				$first = false;
			} else {
				$indices .= ",date_ini_history";
				$valores .= ",'" . $this->date_ini_history . "'";
			}
		}
		
		if (!empty($this->date_end_history)) {
			if ($first) {
				$indices .= "date_end_history";
				$valores .= "'" . $this->date_end_history . "'";
				$first = false;
			} else {
				$indices .= ",date_end_history";
				$valores .= ",'" . $this->date_end_history . "'";
			}
		}
		
		if (!empty($this->time_from_history)) {
			if ($first) {
				$indices .= "time_from_history";
				$valores .= "'" . $this->time_from_history . "'";
				$first = false;
			} else {
				$indices .= ",time_from_history";
				$valores .= ",'" . $this->time_from_history . "'";
			}
		}
		
		if (!empty($this->time_to_history)) {
			if ($first) {
				$indices .= "time_to_history";
				$valores .= "'" . $this->time_to_history . "'";
				$first = false;
			} else {
				$indices .= ",time_to_history";
				$valores .= ",'" . $this->time_to_history . "'";
			}
		}
		
		if (!empty($this->day_history)) {
			if ($first) {
				$indices .= "day_history";
				$valores .= "'" . $this->day_history . "'";
				$first = false;
			} else {
				$indices .= ",day_history";
				$valores .= ",'" . $this->day_history . "'";
			}
		}

		return parent::add($indices, $valores);
	}
	
	
	public function update($campos='', $where = '') {
		
		
		$where = 'id_course_session='.$this->id_course_session.' AND id_course='.$this->id_course.' AND id_coach='.$this->id_coach;
		$first = true;			
		
		if(!empty($this->date_ini_history)){
			if ($first) {
				$campos.=" date_ini_history='".$this->date_ini_history."'";
				$first = false;
			} else {
				$campos.=", date_ini_history='".$this->date_ini_history."'";
			}
			
		}
		
		
		if(!empty($this->date_end_history)){
			if ($first) {
				$campos.=" date_end_history='".$this->date_end_history."'";
				$first = false;
			} else {
				$campos.=", date_end_history='".$this->date_end_history."'";
			}
			
		}

		
		return parent::update($campos, $where);
	}
	
	public function updateEnd() {
		
		
		$where = 'id_course_session='.$this->id_course_session.' AND id_course='.$this->id_course.' AND id_coach='.$this->id_coach;
		$first = true;	
		
		
		if(!empty($this->date_end_history)){
			if ($first) {
				$campos.=" date_end_history='".$this->date_end_history."'";
				$first = false;
			} else {
				$campos.=", date_end_history='".$this->date_end_history."'";
			}
			
		}

		
		return parent::update($campos, $where);
	}
	
	public function updateStart() {
		
		
		$where = 'id_course_session='.$this->id_course_session.' AND id_course='.$this->id_course.' AND id_coach='.$this->id_coach;
		$first = true;			
		
		if(!empty($this->date_ini_history)){
			if ($first) {
				$campos.=" date_ini_history='".$this->date_ini_history."'";
				$first = false;
			} else {
				$campos.=", date_ini_history='".$this->date_ini_history."'";
			}
			
		}

		
		return parent::update($campos, $where);
	}
	
	public function updateOld() {
		
		
		$where = 'id_course_session='.$this->id_course_session.' AND id_course='.$this->id_course.' AND id_coach='.$this->id_coach;
		$first = true;			
		
		if(!empty($this->time_from_history)){
			if ($first) {
				$campos.=" time_from_history='".$this->time_from_history."'";
				$first = false;
			} else {
				$campos.=", time_from_history='".$this->time_from_history."'";
			}
			
		}
		
		if(!empty($this->time_to_history)){
			if ($first) {
				$campos.=" time_to_history='".$this->time_to_history."'";
				$first = false;
			} else {
				$campos.=", time_to_history='".$this->time_to_history."'";
			}
			
		}
		
		if(!empty($this->day_history)){
			if ($first) {
				$campos.=" day_history='".$this->day_history."'";
				$first = false;
			} else {
				$campos.=", day_history='".$this->day_history."'";
			}
			
		}

		
		return parent::update($campos, $where);
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

	function getDate_ini_history() {
		return $this->date_ini_history;
	}

	function getDate_end_history() {
		return $this->date_end_history;
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

	function setDate_ini_history($date_ini_history) {
		$this->date_ini_history = $date_ini_history;
	}

	function setDate_end_history($date_end_history) {
		$this->date_end_history = $date_end_history;
	}

	function getTime_from_history() {
	    return $this->time_from_history;
	}

	function getTime_to_history() {
	    return $this->time_to_history;
	}

	function getDay_history() {
	    return $this->day_history;
	}

	function setTime_from_history($time_from_history) {
	    $this->time_from_history = $time_from_history;
	}

	function setTime_to_history($time_to_history) {
	    $this->time_to_history = $time_to_history;
	}

	function setDay_history($day_history) {
	    $this->day_history = $day_history;
	}


	
	
}
