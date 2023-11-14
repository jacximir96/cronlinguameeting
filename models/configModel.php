<?php

/* 
 * Developed by wilowi
 */

class configModel extends baseModel{

	private $valueConfig = '';
	private $typeConfig = '';
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_config');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	
	public function add($indices = '', $valores = '') {

		$first = true;
		
		if (!empty($this->typeConfig)) {
			if ($first) {
				$indices .= "typeConfig";
				$valores .= "'".$this->typeConfig."'";
				$first = false;
			} else {
				$indices .= ",typeConfig";
				$valores .= ",'" . $this->typeConfig."'";
			}
		}

		if (!empty($this->valueConfig)) {
			if ($first) {
				$indices .= "valueConfig";
				$valores .= "'".$this->valueConfig."'";
				$first = false;
			} else {
				$indices .= ",valueConfig";
				$valores .= ",'" . $this->valueConfig."'";
			}
		}

		return parent::add($indices, $valores);
	}
	
	
	public function update($campos='', $where = ''){
		
		$where = "typeConfig='".$this->typeConfig."'";
		
		$campos = "valueConfig='".$this->valueConfig."'";
		
		return parent::update($campos, $where);
	}

	function getValueConfig() {
		return $this->valueConfig;
	}

	function getTypeConfig() {
		return $this->typeConfig;
	}

	function setValueConfig($valueConfig) {
		$this->valueConfig = $valueConfig;
	}

	function setTypeConfig($typeConfig) {
		$this->typeConfig = $typeConfig;
	}



	
}

?>