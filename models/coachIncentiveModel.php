<?php

/*
 * Developed by wilowi
 */

/**
 * Description of coachIncentiveModel
 *
 * @author Sandra <wilowi.com>
 */
class coachIncentiveModel extends baseModel{
	
	private $id_incentive = 0;
	private $id_coach = 0;
	private $type_incentive = 0;
	private $incentive = 0;
	private $date_incentive = null;
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_coach_incentive');
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
		
		if (!empty($this->type_incentive)) {
			if ($first) {
				$indices .= "type_incentive";
				$values .= $this->type_incentive;
				$first = false;
			} else {
				$indices .= ",type_incentive";
				$values .= "," . $this->type_incentive;
			}
		}
		
		if (!empty($this->incentive)) {
			if ($first) {
				$indices .= "incentive";
				$values .= "'" . $this->incentive . "'";
				$first = false;
			} else {
				$indices .= ",incentive";
				$values .= ",'" . $this->incentive . "'";
			}
		}
		
		if (!empty($this->date_incentive)) {
			if ($first) {
				$indices .= "date_incentive";
				$values .= "'" . $this->date_incentive . "'";
				$first = false;
			} else {
				$indices .= ",date_incentive";
				$values .= ",'" . $this->date_incentive . "'";
			}
		}
				
		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}
	
	function getId_incentive() {
		return $this->id_incentive;
	}

	function getId_coach() {
		return $this->id_coach;
	}

	function getType_incentive() {
		return $this->type_incentive;
	}

	function getIncentive() {
		return $this->incentive;
	}

	function getDate_incentive() {
		return $this->date_incentive;
	}

	function setId_incentive($id_incentive) {
		$this->id_incentive = $id_incentive;
	}

	function setId_coach($id_coach) {
		$this->id_coach = $id_coach;
	}

	function setType_incentive($type_incentive) {
		$this->type_incentive = $type_incentive;
	}

	function setIncentive($incentive) {
		$this->incentive = $incentive;
	}

	function setDate_incentive($date_incentive) {
		$this->date_incentive = $date_incentive;
	}

	
}
