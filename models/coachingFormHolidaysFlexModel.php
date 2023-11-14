<?php

/**
 * Description of coachingFormHolidaysFlexModel
 *
 * @author sandra
 */
class coachingFormHolidaysFlexModel extends baseModel {
	
	private $id_coaching_form_holi = 0;
	private $id_form_flex = 0;
	private $days_holiday = '';
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_coaching_form_holidays_flex');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $valores='') {		
		
		$first = true;
		
		if (!empty($this->id_form_flex)) {
			if ($first) {
				$indices .= "id_form_flex";
				$valores .= $this->id_form_flex;
				$first = false;
			} else {
				$indices .= ",id_form_flex";
				$valores .= "," . $this->id_form_flex;
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
		
		$where = 'id_form_flex='.$this->id_form_flex;
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

	function getDays_holiday() {
		return $this->days_holiday;
	}

	function setId_coaching_form_holi($id_coaching_form_holi) {
		$this->id_coaching_form_holi = $id_coaching_form_holi;
	}

	function setDays_holiday($days_holiday) {
		$this->days_holiday = $days_holiday;
	}

	function getId_form_flex() {
		return $this->id_form_flex;
	}

	function setId_form_flex($id_form_flex) {
		$this->id_form_flex = $id_form_flex;
	}



}
