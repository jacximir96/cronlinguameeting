<?php

/*
 * Developed by wilowi
 */

class courseTypeModel extends baseModel {

	private $id_type_course = 0;
	private $name_type_course = '';
	private $session_type_course = 0;
	private $sessions_duration = 0;
	private $isbn = '';
	private $type_group = '';
	private $price = '';
	private $make_up = 0;
	private $high_school = 0;
        private $experiences = 0;
        private $code_active = 0;

	function __construct() {

		parent::__construct();
		parent::setTable('lm_course_type');
	}

	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

	public function update($campos = '', $where = '') {



		return parent::update($campos, $where);
	}

	public function delete($where) {
		return parent::delete($where);
	}

	function getId_type_course() {
		return $this->id_type_course;
	}

	function getName_type_course() {
		return $this->name_type_course;
	}

	function getSession_type_course() {
		return $this->session_type_course;
	}

	function getSessions_duration() {
		return $this->sessions_duration;
	}

	function getType_week() {
		return $this->type_week;
	}

	function getIsbn() {
		return $this->isbn;
	}

	function getType_group() {
		return $this->type_group;
	}

	function getPrice() {
		return $this->price;
	}

	function setId_type_course($id_type_course) {
		$this->id_type_course = $id_type_course;
	}

	function setName_type_course($name_type_course) {
		$this->name_type_course = $name_type_course;
	}

	function setSession_type_course($session_type_course) {
		$this->session_type_course = $session_type_course;
	}

	function setSessions_duration($sessions_duration) {
		$this->sessions_duration = $sessions_duration;
	}

	function setType_week($type_week) {
		$this->type_week = $type_week;
	}

	function setIsbn($isbn) {
		$this->isbn = $isbn;
	}

	function setType_group($type_group) {
		$this->type_group = $type_group;
	}

	function setPrice($price) {
		$this->price = $price;
	}
	
	function getMake_up() {
		return $this->make_up;
	}

	function getHigh_school() {
		return $this->high_school;
	}

	function setMake_up($make_up) {
		$this->make_up = $make_up;
	}

	function setHigh_school($high_school) {
		$this->high_school = $high_school;
	}

        function getExperiences() {
            return $this->experiences;
        }

        function setExperiences($experiences): void {
            $this->experiences = $experiences;
        }

        function getCode_active() {
            return $this->code_active;
        }

        function setCode_active($code_active): void {
            $this->code_active = $code_active;
        }



}

?>
