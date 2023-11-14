<?php

/*
 * Developed by wilowi
 */

/**
 * Description of offersCodesModel
 *
 * @author Sandra <wilowi.com>
 */
class offersCodesModel extends baseModel{
	
	private $id_offer = 0;
	private $id_university = 0;
	private $id_type_course_offer = 0;
	private $num_courses = 0;
	private $code_offer = '';
	private $type_each_course = '';
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_offers_codes');
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
		
		if (!empty($this->id_type_course_offer)) {
			if ($first) {
				$indices .= "id_type_course_offer";
				$valores .= $this->id_type_course_offer;
				$first = false;
			} else {
				$indices .= ",id_type_course_offer";
				$valores .= "," . $this->id_type_course_offer;
			}
		}
		
		if (!empty($this->num_courses)) {
			if ($first) {
				$indices .= "num_courses";
				$valores .= $this->num_courses;
				$first = false;
			} else {
				$indices .= ",num_courses";
				$valores .= "," . $this->num_courses;
			}
		}
		
	
		if (!empty($this->code_offer)) {
			if ($first) {
				$indices .= "code_offer";
				$valores .= "'" . $this->code_offer . "'";
				$first = false;
			} else {
				$indices .= ",code_offer";
				$valores .= ",'" . $this->code_offer . "'";
			}
		}
		
		if (!empty($this->type_each_course)) {
			if ($first) {
				$indices .= "type_each_course";
				$valores .= "'" . $this->type_each_course . "'";
				$first = false;
			} else {
				$indices .= ",type_each_course";
				$valores .= ",'" . $this->type_each_course . "'";
			}
		}
		

		return parent::add($indices, $valores);
	}
	
	
	public function update($campos = '', $where = '') {

		$where = 'id_offer='.$this->id_offer.' AND id_university='.$this->id_university;
		$first = true;		

		if(!empty($this->id_type_course_offer)){
			if ($first) {
				$campos.=" id_type_course_offer=".$this->id_type_course_offer;
				$first = false;
			} else {
				$campos.=", id_type_course_offer=".$this->id_type_course_offer;
			}
			
		}
		
		if(!empty($this->num_courses)){
			if ($first) {
				$campos.=" num_courses=".$this->num_courses;
				$first = false;
			} else {
				$campos.=", num_courses=".$this->num_courses;
			}
			
		}
		
		if(!empty($this->code_offer)){
			if ($first) {
				$campos.=" code_offer='".$this->code_offer."'";
				$first = false;
			} else {
				$campos.=", code_offer='".$this->code_offer."'";
			}
			
		}
		
		if(!empty($this->type_each_course)){
			if ($first) {
				$campos.=" type_each_course='".$this->type_each_course."'";
				$first = false;
			} else {
				$campos.=", type_each_course='".$this->type_each_course."'";
			}
			
		}


		return parent::update($campos, $where);
	}

	public function delete($where) {
		return parent::delete($where);
	}
	
	function getId_offer() {
		return $this->id_offer;
	}

	function getId_university() {
		return $this->id_university;
	}

	function getId_type_course_offer() {
		return $this->id_type_course_offer;
	}

	function getNum_courses() {
		return $this->num_courses;
	}

	function getCode_offer() {
		return $this->code_offer;
	}

	function setId_offer($id_offer) {
		$this->id_offer = $id_offer;
	}

	function setId_university($id_university) {
		$this->id_university = $id_university;
	}

	function setId_type_course_offer($id_type_course_offer) {
		$this->id_type_course_offer = $id_type_course_offer;
	}

	function setNum_courses($num_courses) {
		$this->num_courses = $num_courses;
	}

	function setCode_offer($code_offer) {
		$this->code_offer = $code_offer;
	}

	function getType_each_course() {
	    return $this->type_each_course;
	}

	function setType_each_course($type_each_course) {
	    $this->type_each_course = $type_each_course;
	}
	
	
}


?>
