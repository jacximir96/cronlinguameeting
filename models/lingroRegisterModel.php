<?php

/*
 * Developed by wilowi
 */

/**
 * Description of lingroRegisterModel
 *
 * @author Sandra <wilowi.com>
 */
class lingroRegisterModel extends baseModel{
	
	private $id_lingro_reg = 0;
	private $name_user_lingro = '';
	private $email_user_lingro = '';
	private $lastname_user_lingro = '';
	private $code_section = '';
	private $date = '';
	private $update_profile = 0;
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_lingro_register');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;
		
		if (!empty($this->name_user_lingro)) {
			if ($first) {
				$indices .= "name_user_lingro";
				$values .= "'" . $this->name_user_lingro . "'";
				$first = false;
			} else {
				$indices .= ",name_user_lingro";
				$values .= ",'" . $this->name_user_lingro . "'";
			}
		}

		if (!empty($this->lastname_user_lingro)) {
			if ($first) {
				$indices .= "lastname_user_lingro";
				$values .= "'" . $this->lastname_user_lingro . "'";
				$first = false;
			} else {
				$indices .= ",lastname_user_lingro";
				$values .= ",'" . $this->lastname_user_lingro . "'";
			}
		}
		
		if (!empty($this->email_user_lingro)) {
			if ($first) {
				$indices .= "email_user_lingro";
				$values .= "'" . $this->email_user_lingro . "'";
				$first = false;
			} else {
				$indices .= ",email_user_lingro";
				$values .= ",'" . $this->email_user_lingro . "'";
			}
		}
		
		if (!empty($this->code_section)) {
			if ($first) {
				$indices .= "code_section";
				$values .= "'" . $this->code_section . "'";
				$first = false;
			} else {
				$indices .= ",code_section";
				$values .= ",'" . $this->code_section . "'";
			}
		}
		

		if (!empty($this->date)) {
			if ($first) {
				$indices .= "date";
				$values .= "'" . $this->date . "'";
				$first = false;
			} else {
				$indices .= ",date";
				$values .= ",'" . $this->date . "'";
			}
		}
		
		if (!empty($this->update_profile)) {
			if ($first) {
				$indices .= "update_profile";
				$values .= $this->update_profile;
				$first = false;
			} else {
				$indices .= ",update_profile";
				$values .= "," . $this->update_profile;
			}
		}
		
		
		return parent::add($indices, $values);
	}
	
	public function updateProfile(){
		
		$where = "id_lingro_reg=".$this->id_lingro_reg." AND email_user_lingro='".$this->email_user_lingro."'";
		
		$campos = " update_profile=".$this->update_profile;
		
		return parent::update($campos, $where);
	}
	
	

	public function delete($where) {
		return parent::delete($where);
	}
	
	function getUpdate_profile() {
		return $this->update_profile;
	}

	function setUpdate_profile($update_profile) {
		$this->update_profile = $update_profile;
	}

		
	function getId_lingro_reg() {
		return $this->id_lingro_reg;
	}

	function getName_user_lingro() {
		return $this->name_user_lingro;
	}

	function getEmail_user_lingro() {
		return $this->email_user_lingro;
	}

	function getLastname_user_lingro() {
		return $this->lastname_user_lingro;
	}

	function getCode_section() {
		return $this->code_section;
	}

	function getDate() {
		return $this->date;
	}

	function setId_lingro_reg($id_lingro_reg) {
		$this->id_lingro_reg = $id_lingro_reg;
	}

	function setName_user_lingro($name_user_lingro) {
		$this->name_user_lingro = $name_user_lingro;
	}

	function setEmail_user_lingro($email_user_lingro) {
		$this->email_user_lingro = $email_user_lingro;
	}

	function setLastname_user_lingro($lastname_user_lingro) {
		$this->lastname_user_lingro = $lastname_user_lingro;
	}

	function setCode_section($code_section) {
		$this->code_section = $code_section;
	}

	function setDate($date) {
		$this->date = $date;
	}


	
}


?>