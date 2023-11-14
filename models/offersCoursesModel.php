<?php

/*
 * Developed by wilowi
 */

/**
 * Description of offersCoursesModel
 *
 * @author Sandra <wilowi.com>
 */
class offersCoursesModel extends baseModel{
	
	private $id_course = 0;
	private $id_offer = 0;

	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_offers_courses');
	}

	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

	
	public function add($indices = '', $valores = '') {

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
		
		if (!empty($this->id_offer)) {
			if ($first) {
				$indices .= "id_offer";
				$valores .= $this->id_offer;
				$first = false;
			} else {
				$indices .= ",id_offer";
				$valores .= "," . $this->id_offer;
			}
		}
		
		

		return parent::add($indices, $valores);
	}
	
	public function update($campos='',$where=''){
		
		$where = "id_course=".$this->id_course;
		
		$campos = "id_offer=".$this->id_offer;
		
		return parent::update($campos, $where);
		
	}
	
	function getId_course() {
		return $this->id_course;
	}

	function getId_offer() {
		return $this->id_offer;
	}

	function setId_course($id_course) {
		$this->id_course = $id_course;
	}

	function setId_offer($id_offer) {
		$this->id_offer = $id_offer;
	}


	
}

?>