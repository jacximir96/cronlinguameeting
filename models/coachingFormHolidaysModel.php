<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of coachingFormHolidaysModel
 *
 * @author sandra
 */
class coachingFormHolidaysModel extends baseModel {
	
	private $id_coaching_form_holi = 0;
	private $id_form = 0;
	private $days_holiday = '';
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_coaching_form_holidays');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $valores='') {		
		
		$first = true;
		
		if (!empty($this->id_form)) {
			if ($first) {
				$indices .= "id_form";
				$valores .= $this->id_form;
				$first = false;
			} else {
				$indices .= ",id_form";
				$valores .= "," . $this->id_form;
			}
		}

		if (!empty($this->days_holiday)) {
			if ($first) {
				$indices .= "days_holiday";
				$valores .= "'" . $this->days_holiday . "'";
				$first = false;
			} else {
				$indices .= ",days_holiday";
				$valores .= ",'" . $this->days_holiday . "'";
			}
		}
		
		
		return parent::add($indices, $valores);
	}
	
	public function update($campos='', $where = '') {
		
		$where = 'id_form='.$this->id_form;
		$first = true;

		if(!empty($this->days_holiday)){
			if ($first) {
				$campos.=" days_holiday='".$this->days_holiday."'";
				$first = false;
			} else {
				$campos.=", days_holiday='".$this->days_holiday."'";
			}
			
		}
		
		return parent::update($campos, $where);
	}
	
	public function delete($where) {
		return parent::delete($where);
	}
	
	function getId_coaching_form_holi() {
		return $this->id_coaching_form_holi;
	}

	function getId_form() {
		return $this->id_form;
	}

	function getDays_holiday() {
		return $this->days_holiday;
	}

	function setId_coaching_form_holi($id_coaching_form_holi) {
		$this->id_coaching_form_holi = $id_coaching_form_holi;
	}

	function setId_form($id_form) {
		$this->id_form = $id_form;
	}

	function setDays_holiday($days_holiday) {
		$this->days_holiday = $days_holiday;
	}

	

}
