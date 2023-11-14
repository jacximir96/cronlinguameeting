<?php

/*
 * Developed by wilowi
 */

/**
 * Description of universityTeachersModel
 *
 * @author Sandra <wilowi.com>
 */
class universityTeachersModel extends baseModel{
	
	private $id_university = 0;
	private $id_user = 0;
	private $description_teach = '';

	function __construct() {

		parent::__construct();
		parent::setTable('lm_university_teachers');
	}

	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

	public function add($indices = '', $valores = '') {

		$first = true;		

		if (!empty($this->id_university)) {
			if ($first) {
				$indices .= "id_university";
				$valores .= $this->id_university;
				$first = false;
			} else {
				$indices .= ",id_university";
				$valores .= "," . $this->id_university;
			}
		}
		
		if (!empty($this->id_user)) {
			if ($first) {
				$indices .= "id_user";
				$valores .= $this->id_user;
				$first = false;
			} else {
				$indices .= ",id_user";
				$valores .= "," . $this->id_user;
			}
		}
		
	
		if (!empty($this->description_teach)) {
			if ($first) {
				$indices .= "description_teach";
				$valores .= "'" . $this->description_teach . "'";
				$first = false;
			} else {
				$indices .= ",description_teach";
				$valores .= ",'" . $this->description_teach . "'";
			}
		}
		

		return parent::add($indices, $valores);
	}

	function getId_university() {
		return $this->id_university;
	}

	function getId_user() {
		return $this->id_user;
	}

	function getDescription() {
		return $this->description_teach;
	}

	function setId_university($id_university) {
		$this->id_university = $id_university;
	}

	function setId_user($id_user) {
		$this->id_user = $id_user;
	}

	function setDescription($description) {
		$this->description_teach = $description;
	}



}
