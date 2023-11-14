<?php

/*
 * Developed by wilowi
 */

/**
 * Description of coachEvaluationManagerModel
 *
 * @author Sandra <wilowi.com>
 */
class coachEvaluationManagerModel extends baseModel{
	//put your code here
	
	private $id_evaluation = 0;	
	private $id_coach = 0;
	private $evaluation_1 = '';
	private $evaluation_2 = '';
	private $date_evaluation_1 = '';
	private $date_evaluation_2 = '';
	
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_coach_evaluation_manager');
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


		if (!empty($this->evaluation_1)) {
			if ($first) {
				$indices .= "evaluation_1";
				$values .= "'" . $this->evaluation_1 . "'";
				$first = false;
			} else {
				$indices .= ",evaluation_1";
				$values .= ",'" . $this->evaluation_1 . "'";
			}
		}
		
		if (!empty($this->evaluation_2)) {
			if ($first) {
				$indices .= "evaluation_2";
				$values .= "'" . $this->evaluation_2 . "'";
				$first = false;
			} else {
				$indices .= ",evaluation_2";
				$values .= ",'" . $this->evaluation_2 . "'";
			}
		}
		
		if (!empty($this->date_evaluation_1)) {
			if ($first) {
				$indices .= "date_evaluation_1";
				$values .= "'" . $this->date_evaluation_1 . "'";
				$first = false;
			} else {
				$indices .= ",date_evaluation_1";
				$values .= ",'" . $this->date_evaluation_1 . "'";
			}
		}
		
		if (!empty($this->date_evaluation_2)) {
			if ($first) {
				$indices .= "date_evaluation_2";
				$values .= "'" . $this->date_evaluation_2 . "'";
				$first = false;
			} else {
				$indices .= ",date_evaluation_2";
				$values .= ",'" . $this->date_evaluation_2 . "'";
			}
		}
		

		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}

	public function update($campos='', $where = '') {
		
		
		$where = 'id_coach='.$this->id_coach;
		$first = true;

		
		if(!empty($this->evaluation_1)){
			if ($first) {
				$campos.=" evaluation_1='".$this->evaluation_1."'";
				$first = false;
			} else {
				$campos.=", evaluation_1='".$this->evaluation_1."'";
			}
			
		}

		if(!empty($this->evaluation_2)){
			if ($first) {
				$campos.=" evaluation_2='".$this->evaluation_2."'";
				$first = false;
			} else {
				$campos.=", evaluation_2='".$this->evaluation_2."'";
			}
			
		}
		
		if(!empty($this->date_evaluation_1)){
			if ($first) {
				$campos.=" date_evaluation_1='".$this->date_evaluation_1."'";
				$first = false;
			} else {
				$campos.=", date_evaluation_1='".$this->date_evaluation_1."'";
			}
			
		}

		if(!empty($this->date_evaluation_2)){
			if ($first) {
				$campos.=" date_evaluation_2='".$this->date_evaluation_2."'";
				$first = false;
			} else {
				$campos.=", date_evaluation_2='".$this->date_evaluation_2."'";
			}
			
		}
		
			return parent::update($campos, $where);
	}
	
	function getId_evaluation() {
		return $this->id_evaluation;
	}

	function getId_coach() {
		return $this->id_coach;
	}

	function getEvaluation_1() {
		return $this->evaluation_1;
	}

	function getEvaluation_2() {
		return $this->evaluation_2;
	}

	function getDate_evaluation_1() {
		return $this->date_evaluation_1;
	}

	function getDate_evaluation_2() {
		return $this->date_evaluation_2;
	}

	function setId_evaluation($id_evaluation) {
		$this->id_evaluation = $id_evaluation;
	}

	function setId_coach($id_coach) {
		$this->id_coach = $id_coach;
	}

	function setEvaluation_1($evaluation_1) {
		$this->evaluation_1 = $evaluation_1;
	}

	function setEvaluation_2($evaluation_2) {
		$this->evaluation_2 = $evaluation_2;
	}

	function setDate_evaluation_1($date_evaluation_1) {
		$this->date_evaluation_1 = $date_evaluation_1;
	}

	function setDate_evaluation_2($date_evaluation_2) {
		$this->date_evaluation_2 = $date_evaluation_2;
	}


	
}
