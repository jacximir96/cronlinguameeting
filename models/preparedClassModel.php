<?php

/*
 * Developed by wilowi
 */

/**
 * Description of preparedClassModel
 *
 * @author Sandra <wilowi.com>
 */
class preparedClassModel extends baseModel{
	
	private $id_prepared = 0;
	private $description_prepared = '';
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_prepared_class');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;
		
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
		
		if (!empty($this->description_prepared)) {
			if ($first) {
				$indices .= "description_prepared";
				$values .= "'" . $this->description_prepared . "'";
				$first = false;
			} else {
				$indices .= ",description_prepared";
				$values .= ",'" . $this->description_prepared . "'";
			}
		}
		
		
		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}
	
	function getId_prepared() {
		return $this->id_prepared;
	}

	function getDescription_prepared() {
		return $this->description_prepared;
	}

	function setId_prepared($id_prepared) {
		$this->id_prepared = $id_prepared;
	}

	function setDescription_prepared($description_prepared) {
		$this->description_prepared = $description_prepared;
	}


	
}
