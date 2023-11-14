<?php

/*
 * Developed by wilowi
 */

/**
 * Description of coursesFlexModel
 *
 * @author Sandra <wilowi.com>
 */
class coursesFlexCoachesModel extends baseModel{
	
	private $id_course_flex = 0;
	private $id_coach = 0;
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_courses_flex_coaches');
	}

	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

    public function add($valores='',$indices='') {

		$first = true;
		
		if (!empty($this->id_course_flex)) {
			if ($first) {
				$indices .= "id_course_flex";
				$valores .= $this->id_course_flex;
				$first = false;
			} else {
				$indices .= ",id_course_flex";
				$valores .= "," . $this->id_course_flex;
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

		return parent::add($indices, $valores);
	}

	public function selectPagination($where = '', $join = '', $order = '', $limit = '', $select='*') {
		return parent::selectPagination($where, $join, $order, $limit,$select);
	}
	
	public function delete($where) {
		return parent::delete($where);
	}

	function getId_course_flex() {
	    return $this->id_course_flex;
	}

	function getId_coach() {
	    return $this->id_coach;
	}

	function setId_course_flex($id_course_flex) {
	    $this->id_course_flex = $id_course_flex;
	}

	function setId_coach($id_coach) {
	    $this->id_coach = $id_coach;
	}


	
}
