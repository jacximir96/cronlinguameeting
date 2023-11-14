<?php

/*
 * Developed by wilowi
 */

/**
 * Description of salaryCountryModel
 *
 * @author Sandra <wilowi.com>
 */
class salaryCountryModel extends baseModel{
	
	private $id_salary = 0;
	private $id_country = 0;
	private $salary_country = 0;
	private $salary_euro = 0;
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_salary_country');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;
		
		if (!empty($this->id_country)) {
			if ($first) {
				$indices .= "id_country";
				$values .= $this->id_country;
				$first = false;
			} else {
				$indices .= ",id_country";
				$values .= "," . $this->id_country;
			}
		}
		
		if (!empty($this->salary_country)) {
			if ($first) {
				$indices .= "salary_country";
				$values .= "'" . $this->salary_country . "'";
				$first = false;
			} else {
				$indices .= ",salary_country";
				$values .= ",'" . $this->salary_country . "'";
			}
		}
		
		if (!empty($this->salary_euro)) {
			if ($first) {
				$indices .= "salary_euro";
				$values .= "'" . $this->salary_euro . "'";
				$first = false;
			} else {
				$indices .= ",salary_euro";
				$values .= ",'" . $this->salary_euro . "'";
			}
		}
		
		
		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}
	
	public function update($campos='', $where = '') {		
		
		//$where = 'id_salary='.$this->id_salary.' AND id_country='.$this->id_country;
		$where = 'id_country='.$this->id_country;
		$first = true;
		
		if(!empty($this->salary_country)){
			if ($first) {
				$campos.=" salary_country='".$this->salary_country."'";
				$first = false;
			} else {
				$campos.=", salary_country='".$this->salary_country."'";
			}
			
		}
		
		if(!empty($this->salary_euro)){
			if ($first) {
				$campos.=" salary_euro='".$this->salary_euro."'";
				$first = false;
			} else {
				$campos.=", salary_euro='".$this->salary_euro."'";
			}
			
		}
		
			return parent::update($campos, $where);
	}
	
	function getId_salary() {
		return $this->id_salary;
	}

	function getId_country() {
		return $this->id_country;
	}

	function getSalary_country() {
		return $this->salary_country;
	}

	function setId_salary($id_salary) {
		$this->id_salary = $id_salary;
	}

	function setId_country($id_country) {
		$this->id_country = $id_country;
	}

	function setSalary_country($salary_country) {
		$this->salary_country = $salary_country;
	}
	
	function getSalary_euro() {
		return $this->salary_euro;
	}

	function setSalary_euro($salary_euro) {
		$this->salary_euro = $salary_euro;
	}




}
