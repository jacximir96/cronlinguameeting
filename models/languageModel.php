<?php

/* 
 * Developed by wilowi
 */

class languageModel extends baseModel{
	
	private $id_language = 0;
	private $name_language = '';
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_languages');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function autoCommit($value = true) {
		parent::autoCommit($value);
	}

	public function commit() {
		parent::commit();
	}

	public function rollBack() {
		parent::rollBack();
	}

	public function add($indices='', $values='') {
		
		$first = true;
	
		if (!empty($this->name_language)) {
			if ($first) {
				$indices .= "name_language";
				$values .= "'" . $this->name_language . "'";
				$first = false;
			} else {
				$indices .= ",name_language";
				$values .= ",'" . $this->name_language . "'";
			}
		}		
		
		return parent::add($indices, $values);
	}
	
	public function update($campos='', $where = ''){
		
		$where = "id_language=".$this->id_language;
		
		$campos = "name_language='".$this->name_language."'";
		
		return parent::update($campos, $where);
	}

	public function delete($where) {
		return parent::delete($where);
	}
	
	function getId_language() {
		return $this->id_language;
	}

	function getName_language() {
		return $this->name_language;
	}

	function setId_language($id_language) {
		$this->id_language = $id_language;
	}

	function setName_language($name_language) {
		$this->name_language = $name_language;
	}


	
}

?>

