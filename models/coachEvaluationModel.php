<?php

/*
 * Developed by wilowi
 */

/**
 * Description of coachEvaluationModel
 *
 * @author Sandra <wilowi.com>
 */
class coachEvaluationModel extends baseModel{
	
	private $id_evaluation_other = 0;	
	private $id_coach = 0;
	private $id_user_feedback = 0;
	private $evaluation_inst = '';
	private $evaluation_stu = '';
	private $date_evaluation_other = '';	
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_coach_evaluation');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;
		
		if (!empty($this->id_coach)) {
			if ($first) {
				$indices .= "id_coach";
				$values .= $this->id_coach;
				$first = false;
			} else {
				$indices .= ",id_coach";
				$values .= "," . $this->id_coach;
			}
		}
		
		if (!empty($this->id_user_feedback)) {
			if ($first) {
				$indices .= "id_user_feedback";
				$values .= $this->id_user_feedback;
				$first = false;
			} else {
				$indices .= ",id_user_feedback";
				$values .= "," . $this->id_user_feedback;
			}
		}


		if (!empty($this->evaluation_inst)) {
			if ($first) {
				$indices .= "evaluation_inst";
				$values .= "'" . $this->evaluation_inst . "'";
				$first = false;
			} else {
				$indices .= ",evaluation_inst";
				$values .= ",'" . $this->evaluation_inst . "'";
			}
		}
		
		if (!empty($this->evaluation_stu)) {
			if ($first) {
				$indices .= "evaluation_stu";
				$values .= "'" . $this->evaluation_stu . "'";
				$first = false;
			} else {
				$indices .= ",evaluation_stu";
				$values .= ",'" . $this->evaluation_stu . "'";
			}
		}
		
		if (!empty($this->date_evaluation_other)) {
			if ($first) {
				$indices .= "date_evaluation_other";
				$values .= "'" . $this->date_evaluation_other . "'";
				$first = false;
			} else {
				$indices .= ",date_evaluation_other";
				$values .= ",'" . $this->date_evaluation_other . "'";
			}
		}
		
		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}

	public function update($campos='', $where = '') {
		
		
		$where = 'id_coach='.$this->id_coach.' AND id_user_feedback='.$this->id_user_feedback;
		$first = true;

		
		if(!empty($this->evaluation_inst)){
			if ($first) {
				$campos.=" evaluation_inst='".$this->evaluation_inst."'";
				$first = false;
			} else {
				$campos.=", evaluation_inst='".$this->evaluation_inst."'";
			}
			
		}

		if(!empty($this->evaluation_stu)){
			if ($first) {
				$campos.=" evaluation_stu='".$this->evaluation_stu."'";
				$first = false;
			} else {
				$campos.=", evaluation_stu='".$this->evaluation_stu."'";
			}
			
		}
		
		if(!empty($this->date_evaluation_other)){
			if ($first) {
				$campos.=" date_evaluation_other='".$this->date_evaluation_other."'";
				$first = false;
			} else {
				$campos.=", date_evaluation_other='".$this->date_evaluation_other."'";
			}
			
		}

		
			return parent::update($campos, $where);
	}
	
	function getId_evaluation_other() {
		return $this->id_evaluation_other;
	}

	function getId_coach() {
		return $this->id_coach;
	}

	function getId_user_feedback() {
		return $this->id_user_feedback;
	}

	function getEvaluation_inst() {
		return $this->evaluation_inst;
	}

	function getEvaluation_stu() {
		return $this->evaluation_stu;
	}

	function getDate_evaluation_other() {
		return $this->date_evaluation_other;
	}

	function setId_evaluation_other($id_evaluation_other) {
		$this->id_evaluation_other = $id_evaluation_other;
	}

	function setId_coach($id_coach) {
		$this->id_coach = $id_coach;
	}

	function setId_user_feedback($id_user_feedback) {
		$this->id_user_feedback = $id_user_feedback;
	}

	function setEvaluation_inst($evaluation_inst) {
		$this->evaluation_inst = $evaluation_inst;
	}

	function setEvaluation_stu($evaluation_stu) {
		$this->evaluation_stu = $evaluation_stu;
	}

	function setDate_evaluation_other($date_evaluation_other) {
		$this->date_evaluation_other = $date_evaluation_other;
	}



	
	
}
