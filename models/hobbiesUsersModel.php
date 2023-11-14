<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of hobbiesUsersModel
 *
 * @author sandra
 */
class hobbiesUsersModel extends baseModel{
	
	private $id_hobby = 0;
	private $id_user = 0;
	private $description_hobby = '';
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_hobbies_users');
		
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

		if (!empty($this->description_hobby)) {
			if ($first) {
				$indices .= "description_hobby";
				$valores .= "'" . $this->description_hobby . "'";
				$first = false;
			} else {
				$indices .= ",description_hobby";
				$valores .= ",'" . $this->description_hobby . "'";
			}
		}
		
		return parent::add($indices, $valores);
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

	
	function getId_hobby() {
		return $this->id_hobby;
	}

	function getId_user() {
		return $this->id_user;
	}

	function getDescription_hobby() {
		return $this->description_hobby;
	}

	function setId_hobby($id_hobby) {
		$this->id_hobby = $id_hobby;
	}

	function setId_user($id_user) {
		$this->id_user = $id_user;
	}

	function setDescription_hobby($description_hobby) {
		$this->description_hobby = $description_hobby;
	}


	
}
