<?php

/*
 * Developed by wilowi
 */

/**
 * Description of coursesFlexModel
 *
 * @author Sandra <wilowi.com>
 */
class coursesCoachesModel extends baseModel{
	
	private $course_id = 0;
	private $id_coach = 0;
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_courses_coaches');
	}

	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

    public function add($valores='',$indices='') {

		$first = true;
		
		if (!empty($this->course_id)) {
			if ($first) {
				$indices .= "course_id";
				$valores .= $this->course_id;
				$first = false;
			} else {
				$indices .= ",course_id";
				$valores .= "," . $this->course_id;
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

        function getCourse_id() {
            return $this->course_id;
        }

        function getId_coach() {
            return $this->id_coach;
        }

        function setCourse_id($course_id): void {
            $this->course_id = $course_id;
        }

        function setId_coach($id_coach): void {
            $this->id_coach = $id_coach;
        }


	
}
