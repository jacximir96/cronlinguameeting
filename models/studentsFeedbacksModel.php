<?php

/*
 * Developed by wilowi
 */

/**
 * Description of studentsFeedbackModel
 *
 * @author Sandra <wilowi.com>
 */
class studentsFeedbacksModel extends baseModel{
	
	private $id_feedback = 0;
	private $id_student = 0;
	private $id_student_course_session = 0;
	private $id_puntuality = 0;
	private $id_prepared = 0;
	private $id_participation = 0;
	private $is_puntual_session = 0;
	private $observations = '';
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_students_feedbacks');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;
		
		if (!empty($this->id_feedback)) {
			if ($first) {
				$indices .= "id_feedback";
				$values .= $this->id_feedback;
				$first = false;
			} else {
				$indices .= ",id_feedback";
				$values .= "," . $this->id_feedback;
			}
		}

		if (!empty($this->id_student)) {
			if ($first) {
				$indices .= "id_student";
				$values .= $this->id_student;
				$first = false;
			} else {
				$indices .= ",id_student";
				$values .= "," . $this->id_student;
			}
		}

		if (!empty($this->id_student_course_session)) {
			if ($first) {
				$indices .= "id_student_course_session";
				$values .= $this->id_student_course_session;
				$first = false;
			} else {
				$indices .= ",id_student_course_session";
				$values .= "," . $this->id_student_course_session;
			}
		}
		
		if (!empty($this->id_puntuality)) {
			if ($first) {
				$indices .= "id_puntuality";
				$values .= $this->id_puntuality;
				$first = false;
			} else {
				$indices .= ",id_puntuality";
				$values .= "," . $this->id_puntuality;
			}
		}

		
		if (!empty($this->id_prepared)) {
			if ($first) {
				$indices .= "id_prepared";
				$values .= $this->id_prepared;
				$first = false;
			} else {
				$indices .= ",id_prepared";
				$values .= "," . $this->id_prepared;
			}
		}
		
		if (!empty($this->id_participation)) {
			if ($first) {
				$indices .= "id_participation";
				$values .= $this->id_participation;
				$first = false;
			} else {
				$indices .= ",id_participation";
				$values .= "," . $this->id_participation;
			}
		}
		
		if (!empty($this->is_puntual_session)) {
			if ($first) {
				$indices .= "is_puntual_session";
				$values .= $this->is_puntual_session;
				$first = false;
			} else {
				$indices .= ",is_puntual_session";
				$values .= "," . $this->is_puntual_session;
			}
		}

		
		if (!empty($this->observations)) {
			if ($first) {
				$indices .= "observations";
				$values .= "'" . $this->observations . "'";
				$first = false;
			} else {
				$indices .= ",observations";
				$values .= ",'" . $this->observations . "'";
			}
		}
		
		
		return parent::add($indices, $values);
	}
	
	
	public function update($campos='', $where='') {
		
		$where = 'id_feedback='.$this->id_feedback;
		$first = true;
		
		if(!empty($this->id_puntuality)){
			if ($first) {
				$campos.=" id_puntuality='".$this->id_puntuality."'";
				$first = false;
			} else {
				$campos.=", id_puntuality='".$this->id_puntuality."'";
			}
			
		}

		if(!empty($this->id_participation)){
			if ($first) {
				$campos.=" id_participation=".$this->id_participation;
				$first = false;
			} else {
				$campos.=", id_participation=".$this->id_participation;
			}
			
		}
		
		
		if(!empty($this->observations)){
			if ($first) {
				$campos.=" observations='".$this->observations."'";
				$first = false;
			} else {
				$campos.=", observations='".$this->observations."'";
			}
			
		}
		if(!empty($this->id_prepared)){
			if ($first) {
				$campos.=" id_prepared=".$this->id_prepared;
				$first = false;
			} else {
				$campos.=", id_prepared=".$this->id_prepared;
			}
			
		}
		
		if(!empty($this->is_puntual_session)){
			if ($first) {
				$campos.=" is_puntual_session=".$this->is_puntual_session;
				$first = false;
			} else {
				$campos.=", is_puntual_session=".$this->is_puntual_session;
			}
			
		}
		
		
		return parent::update($campos, $where);
	}

    public function updateFeedbackStudents($where = '', $campos = '') {

        $where = "id_feedback=".$this->id_feedback." and id_student=".$this->id_student;

        $campos = "id_puntuality=".$this->id_puntuality.", id_prepared=".$this->id_prepared.", id_participation=".$this->id_participation;

        return parent::update($campos, $where);
    }

	public function delete($where) {
		return parent::delete($where);
	}
	
	function getIs_puntual_session() {
		return $this->is_puntual_session;
	}

	function setIs_puntual_session($is_puntual_session) {
		$this->is_puntual_session = $is_puntual_session;
	}

		
	function getId_feedback() {
		return $this->id_feedback;
	}

	function getId_student() {
		return $this->id_student;
	}

	function getId_student_course_session() {
		return $this->id_student_course_session;
	}

	function getId_puntuality() {
		return $this->id_puntuality;
	}

	function getId_prepared() {
		return $this->id_prepared;
	}

	function getId_participation() {
		return $this->id_participation;
	}

	function getObservations() {
		return $this->observations;
	}

	function setId_feedback($id_feedback) {
		$this->id_feedback = $id_feedback;
	}

	function setId_student($id_student) {
		$this->id_student = $id_student;
	}

	function setId_student_course_session($id_student_course_session) {
		$this->id_student_course_session = $id_student_course_session;
	}

	function setId_puntuality($id_puntuality) {
		$this->id_puntuality = $id_puntuality;
	}

	function setId_prepared($id_prepared) {
		$this->id_prepared = $id_prepared;
	}

	function setId_participation($id_participation) {
		$this->id_participation = $id_participation;
	}

	function setObservations($observations) {
		$this->observations = $observations;
	}


	
}
