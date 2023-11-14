<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of coachOccupancyModel
 *
 * @author sandra
 */
class coachesCoorModel extends baseModel{
	
	private $id_user_coor = 0;
	private $id_user_coach = 0;
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_coaches_coor');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $valores='') {		
		
		$first = true;
		
		if (!empty($this->id_user_coor)) {
			if ($first) {
				$indices .= "id_user_coor";
				$valores .= $this->id_user_coor;
				$first = false;
			} else {
				$indices .= ",id_user_coor";
				$valores .= "," . $this->id_user_coor;
			}
		}

		if (!empty($this->id_user_coach)) {
			if ($first) {
				$indices .= "id_user_coach";
				$valores .= $this->id_user_coach;
				$first = false;
			} else {
				$indices .= ",id_user_coach";
				$valores .= "," . $this->id_user_coach;
			}
		}


		return parent::add($indices, $valores);
	}

	
	public function delete($where) {
		return parent::delete($where);
	}

	function getId_user_coor() {
		return $this->id_user_coor;
	}

	function getId_user_coach() {
		return $this->id_user_coach;
	}

	function setId_user_coor($id_user_coor) {
		$this->id_user_coor = $id_user_coor;
	}

	function setId_user_coach($id_user_coach) {
		$this->id_user_coach = $id_user_coach;
	}


	
}
