<?php

/*
 * Developed by wilowi
 */

/**
 * Description of userLanguagesModel
 *
 * @author Sandra <wilowi.com>
 */
class usersLanguagesModel extends baseModel{
	
	private $id_user = 0;
	private $id_language = 0;	
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_users_languages');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $valores='') {
		
		$first = true;
		
		if (!empty($this->id_user)) {
			if ($first) {
				$indices .= "id_user";
				$valores .= $this->id_user;
				$first = false;
			} else {
				$indices .= ",id_user";
				$valores .= "," . $this->id_user;
			}
		}
		
		if (!empty($this->id_language)) {
			if ($first) {
				$indices .= "id_language";
				$valores .= $this->id_language;
				$first = false;
			} else {
				$indices .= ",id_language";
				$valores .= "," . $this->id_language;
			}
		}
		
		
		
		return parent::add($indices, $valores);
	}

	function getId_user() {
		return $this->id_user;
	}

	function getId_language() {
		return $this->id_language;
	}

	function setId_user($id_user) {
		$this->id_user = $id_user;
	}

	function setId_language($id_language) {
		$this->id_language = $id_language;
	}


	
}


?>