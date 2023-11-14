<?php

/*
 * Developed by wilowi
 */

/**
 * Description of participationModel
 *
 * @author Sandra <wilowi.com>
 */
class participationModel extends baseModel{
	
	private $id_participation = 0;
	private $description_participation = '';
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_participation');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;
		
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
		
		if (!empty($this->description_participation)) {
			if ($first) {
				$indices .= "description_participation";
				$values .= "'" . $this->description_participation . "'";
				$first = false;
			} else {
				$indices .= ",description_participation";
				$values .= ",'" . $this->description_participation . "'";
			}
		}
		
		
		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}
	
	function getId_participation() {
		return $this->id_participation;
	}

	function getDescription_participation() {
		return $this->description_participation;
	}

	function setId_participation($id_participation) {
		$this->id_participation = $id_participation;
	}

	function setDescription_participation($description_participation) {
		$this->description_participation = $description_participation;
	}


}
