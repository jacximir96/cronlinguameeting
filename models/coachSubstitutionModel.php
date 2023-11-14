<?php

/*
 * Developed by wilowi
 */

/**
 * Description of coachSubstitutionModel
 *
 * @author Sandra <wilowi.com>
 */
class coachSubstitutionModel extends baseModel{
	
	private $id_substitution = 0;
	private $id_coach = 0;
	private $id_sust = 0;
	private $day_sust = null;
	private $sessions_sust = 0;
	private $min_session = 0;
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_coach_substitution');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function delete($where) {
		return parent::delete($where);
	}

	
		
	public function add($indices='', $valores='') {		
		
		$first = true;
		
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

		if (!empty($this->id_sust)) {
			if ($first) {
				$indices .= "id_sust";
				$valores .= $this->id_sust;
				$first = false;
			} else {
				$indices .= ",id_sust";
				$valores .= "," . $this->id_sust;
			}
		}
		
		if (!empty($this->day_sust)) {
			if ($first) {
				$indices .= "day_sust";
				$valores .= "'" . $this->day_sust . "'";
				$first = false;
			} else {
				$indices .= ",day_sust";
				$valores .= ",'" . $this->day_sust . "'";
			}
		}
		
		if (!empty($this->sessions_sust)) {
			if ($first) {
				$indices .= "sessions_sust";
				$valores .= $this->sessions_sust;
				$first = false;
			} else {
				$indices .= ",sessions_sust";
				$valores .= "," . $this->sessions_sust;
			}
		}
		
		if (!empty($this->min_session)) {
			if ($first) {
				$indices .= "min_session";
				$valores .= $this->min_session;
				$first = false;
			} else {
				$indices .= ",min_session";
				$valores .= "," . $this->min_session;
			}
		}


		return parent::add($indices, $valores);
	}

	function getId_coach() {
		return $this->id_coach;
	}

	function getId_sust() {
		return $this->id_sust;
	}

	function getDay_sust() {
		return $this->day_sust;
	}

	function getSessions_sust() {
		return $this->sessions_sust;
	}

	function setId_coach($id_coach) {
		$this->id_coach = $id_coach;
	}

	function setId_sust($id_sust) {
		$this->id_sust = $id_sust;
	}

	function setDay_sust($day_sust) {
		$this->day_sust = $day_sust;
	}

	function setSessions_sust($sessions_sust) {
		$this->sessions_sust = $sessions_sust;
	}
	
	function getId_substitution() {
		return $this->id_substitution;
	}

	function setId_substitution($id_substitution) {
		$this->id_substitution = $id_substitution;
	}

	function getMin_session() {
	    return $this->min_session;
	}

	function setMin_session($min_session) {
	    $this->min_session = $min_session;
	}



	
}
