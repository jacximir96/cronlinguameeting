<?php

/*
 * Developed by wilowi
 */

/**
 * Description of salaryCoachesModel
 *
 * @author Sandra <wilowi.com>
 */
class salaryCoachesModel extends baseModel{
	
	private $id_salary_coach = 0;
	private $id_coach = 0;
	private $id_language = 0;
	private $salary_hour = 0;
	private $fixed_salary = 0;
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_salary_coaches');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;
		
		if (!empty($this->id_coach)) {
			if ($first) {
				$indices .= "id_coach";
				$values .= $this->id_coach;
				$first = false;
			} else {
				$indices .= ",id_coach";
				$values .= "," . $this->id_coach;
			}
		}
		
		/*if (!empty($this->id_language)) {
			if ($first) {
				$indices .= "id_language";
				$values .= $this->id_language;
				$first = false;
			} else {
				$indices .= ",id_language";
				$values .= "," . $this->id_language;
			}
		}*/
		
		if (!empty($this->salary_hour)) {
			if ($first) {
				$indices .= "salary_hour";
				$values .= "'" . $this->salary_hour . "'";
				$first = false;
			} else {
				$indices .= ",salary_hour";
				$values .= ",'" . $this->salary_hour . "'";
			}
		}
		
		if (!empty($this->fixed_salary)) {
			if ($first) {
				$indices .= "fixed_salary";
				$values .= $this->fixed_salary;
				$first = false;
			} else {
				$indices .= ",fixed_salary";
				$values .= "," . $this->fixed_salary;
			}
		}
		
		if ($first) {
			$indices .= "id_language";
			$values .= $this->id_language;
			$first = false;
		} else {
			$indices .= ",id_language";
			$values .= "," . $this->id_language;
		}


		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}
	
	public function updateGeneral($campos='', $where = '') {		
		
		$where = 'id_coach='.$this->id_coach;
		$first = true;
		
		if(!empty($this->salary_hour)){
			if ($first) {
				$campos.=" salary_hour='".$this->salary_hour."'";
				$first = false;
			} else {
				$campos.=", salary_hour='".$this->salary_hour."'";
			}
			
		}
		
		if(!empty($this->fixed_salary)){
			if ($first) {
				$campos.=" fixed_salary=".$this->fixed_salary;
				$first = false;
			} else {
				$campos.=", fixed_salary=".$this->fixed_salary;
			}
			
		}
		
			return parent::update($campos, $where);
	}
	
	public function updateLanguage($campos='', $where = '') {		
		
		$where = 'id_coach='.$this->id_coach.' AND id_language='.$this->id_language;
		$first = true;
		
		//if(!empty($this->salary_hour)){
			if ($first) {
				$campos.=" salary_hour='".$this->salary_hour."'";
				$first = false;
			} else {
				$campos.=", salary_hour='".$this->salary_hour."'";
			}
			
		//}
		
		//if(!empty($this->fixed_salary)){
			if ($first) {
				$campos.=" fixed_salary=".$this->fixed_salary;
				$first = false;
			} else {
				$campos.=", fixed_salary=".$this->fixed_salary;
			}
			
		//}
		
			return parent::update($campos, $where);
	}
	
	function getId_salary_coach() {
		return $this->id_salary_coach;
	}

	function getId_coach() {
		return $this->id_coach;
	}

	function getId_language() {
		return $this->id_language;
	}

	function getSalary_hour() {
		return $this->salary_hour;
	}

	function setId_salary_coach($id_salary_coach) {
		$this->id_salary_coach = $id_salary_coach;
	}

	function setId_coach($id_coach) {
		$this->id_coach = $id_coach;
	}

	function setId_language($id_language) {
		$this->id_language = $id_language;
	}

	function setSalary_hour($salary_hour) {
		$this->salary_hour = $salary_hour;
	}

	function getFixed_salary() {
	    return $this->fixed_salary;
	}

	function setFixed_salary($fixed_salary) {
	    $this->fixed_salary = $fixed_salary;
	}


	
}
