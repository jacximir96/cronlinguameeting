<?php

/*
 * Developed by wilowi
 */

/**
 * Description of coursesCoordinatorsModel
 *
 * @author Sandra <wilowi.com>
 */
class coursesCoordinatorsModel extends baseModel{
	
	private $id_course = 0;
	private $id_coor = 0;
	private $see_course = 0;
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_courses_coordinators');
	}

	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

	
	public function add($indices = '', $valores = '') {

		$first = true;		

		if (!empty($this->id_coor)) {
			if ($first) {
				$indices .= "id_coor";
				$valores .= $this->id_coor;
				$first = false;
			} else {
				$indices .= ",id_coor";
				$valores .= "," . $this->id_coor;
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

		if ($first) {
			$indices .= "see_course";
			$valores .= $this->see_course;
			$first = false;
		} else {
			$indices .= ",see_course";
			$valores .= ",".$this->see_course;
		}

		return parent::add($indices, $valores);
	}
	
	public function update($campos='', $where = '') {
		
		$where = 'id_course='.$this->id_course.' AND id_coor='.$this->id_coor;
		$first = true;

		
		if ($first) {
			$campos .= " see_course=$this->see_course";
			$first = false;
		} else {
			$campos .= ", see_course=$this->see_course";
			
		}		
		
		return parent::update($campos, $where);
	}
	
	
	public function delete($where) {
		return parent::delete($where);
	}

	function getId_course() {
		return $this->id_course;
	}

	function getId_coor() {
		return $this->id_coor;
	}

	function getSee_course() {
		return $this->see_course;
	}

	function setId_course($id_course) {
		$this->id_course = $id_course;
	}

	function setId_coor($id_coor) {
		$this->id_coor = $id_coor;
	}

	function setSee_course($see_course) {
		$this->see_course = $see_course;
	}


	
}

?>