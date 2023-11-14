<?php

/*
 * Developed by wilowi
 */

/**
 * Description of studentsCoursesFree
 *
 * @author Sandra <wilowi.com>
 */
class studentsCoursesFreeModel extends baseModel {

    private $id_student = 0;
    private $id_university = 0;
    private $code_course_free = '';
    private $number_courses_used = 0;
    private $isFlex = 0;

    public function __construct() {

	parent::__construct();
	parent::setTable('lm_students_courses_free');
    }

    public function add($indices = '', $valores = '') {

	$first = true;

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


	if (!empty($this->code_course_free)) {
	    if ($first) {
		$indices .= "code_course_free";
		$valores .= "'" . $this->code_course_free . "'";
		$first = false;
	    } else {
		$indices .= ",code_course_free";
		$valores .= ",'" . $this->code_course_free . "'";
	    }
	}

	if (!empty($this->number_courses_used)) {
	    if ($first) {
		$indices .= "number_courses_used";
		$valores .= $this->number_courses_used;
		$first = false;
	    } else {
		$indices .= ",number_courses_used";
		$valores .= "," . $this->number_courses_used;
	    }
	}
	
	if (!empty($this->isFlex)) {
	    if ($first) {
		$indices .= "isFlex";
		$valores .= $this->isFlex;
		$first = false;
	    } else {
		$indices .= ",isFlex";
		$valores .= "," . $this->isFlex;
	    }
	}

	return parent::add($indices, $valores);
    }

    public function update($campos = '', $where = '') {

	$where = "id_student=$this->id_student AND id_university=$this->id_university AND code_course_free='$this->code_course_free'";
	$first = true;

	/* if(!empty($this->code_course_free)){
	  if ($first) {
	  $campos.=" code_course_free='".$this->code_course_free."'";
	  $first = false;
	  } else {
	  $campos.=", code_course_free='".$this->code_course_free."'";
	  }

	  } */

	if (!empty($this->number_courses_used)) {
	    if ($first) {
		$campos .= " number_courses_used=" . $this->number_courses_used;
		$first = false;
	    } else {
		$campos .= ", number_courses_used=" . $this->number_courses_used;
	    }
	}

	return parent::update($campos, $where);
    }

    function getId_student() {
	return $this->id_student;
    }

    function getId_university() {
	return $this->id_university;
    }

    function getCode_course_free() {
	return $this->code_course_free;
    }

    function getNumber_courses_used() {
	return $this->number_courses_used;
    }

    function setId_student($id_student) {
	$this->id_student = $id_student;
    }

    function setId_university($id_university) {
	$this->id_university = $id_university;
    }

    function setCode_course_free($code_course_free) {
	$this->code_course_free = $code_course_free;
    }

    function setNumber_courses_used($number_courses_used) {
	$this->number_courses_used = $number_courses_used;
    }

    function getIsFlex() {
	return $this->isFlex;
    }

    function setIsFlex($isFlex) {
	$this->isFlex = $isFlex;
    }


}

?>