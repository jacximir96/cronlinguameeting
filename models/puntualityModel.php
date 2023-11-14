<?php

/*
 * Developed by wilowi
 */

/**
 * Description of puntualityModel
 *
 * @author Sandra <wilowi.com>
 */
class puntualityModel extends baseModel{
	
	private $id_puntuality = 0;
	private $description_puntuality = '';
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_puntuality');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;
		
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
		
		if (!empty($this->description_puntuality)) {
			if ($first) {
				$indices .= "description_puntuality";
				$values .= "'" . $this->description_puntuality . "'";
				$first = false;
			} else {
				$indices .= ",description_puntuality";
				$values .= ",'" . $this->description_puntuality . "'";
			}
		}
		
		
		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}
	
	function getId_puntuality() {
		return $this->id_puntuality;
	}

	function getDescription_puntuality() {
		return $this->description_puntuality;
	}

	function setId_puntuality($id_puntuality) {
		$this->id_puntuality = $id_puntuality;
	}

	function setDescription_puntuality($description_puntuality) {
		$this->description_puntuality = $description_puntuality;
	}


	
}
