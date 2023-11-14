<?php

/*
 * Developed by wilowi
 */

/**
 * Description of invoiceNumbers
 *
 * @author Sandra <wilowi.com>
 */
class invoiceNumbersModel extends baseModel{
	
	private $id_invoice = 0;
	private $number_invoice = '';
	private $id_user = 0;
	private $id_university = 0;
	private $confirmed = '';
	private $year_invoice = '';
	private $month_invoice = '';	
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_invoice_numbers');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;
		
		if (!empty($this->id_user)) {
			if ($first) {
				$indices .= "id_user";
				$values .= $this->id_user;
				$first = false;
			} else {
				$indices .= ",id_user";
				$values .= "," . $this->id_user;
			}
		}
		
		if (!empty($this->id_university)) {
			if ($first) {
				$indices .= "id_university";
				$values .= $this->id_university;
				$first = false;
			} else {
				$indices .= ",id_university";
				$values .= "," . $this->id_university;
			}
		}


		if (!empty($this->confirmed)) {
			if ($first) {
				$indices .= "confirmed";
				$values .= "'" . $this->confirmed . "'";
				$first = false;
			} else {
				$indices .= ",confirmed";
				$values .= ",'" . $this->confirmed . "'";
			}
		}
		
		if (!empty($this->year_invoice)) {
			if ($first) {
				$indices .= "year_invoice";
				$values .= "'" . $this->year_invoice . "'";
				$first = false;
			} else {
				$indices .= ",year_invoice";
				$values .= ",'" . $this->year_invoice . "'";
			}
		}
		
		if (!empty($this->month_invoice)) {
			if ($first) {
				$indices .= "month_invoice";
				$values .= "'" . $this->month_invoice . "'";
				$first = false;
			} else {
				$indices .= ",month_invoice";
				$values .= ",'" . $this->month_invoice . "'";
			}
		}
		
		if (!empty($this->number_invoice)) {
			if ($first) {
				$indices .= "number_invoice";
				$values .= "'" . $this->number_invoice . "'";
				$first = false;
			} else {
				$indices .= ",number_invoice";
				$values .= ",'" . $this->number_invoice . "'";
			}
		}
		
		
		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}

	public function updateConfirmed($campos='', $where = '') {		
		
		$where = "id_user=".$this->id_user." AND year_invoice=".$this->year_invoice." AND month_invoice='".$this->month_invoice."'";

		$campos.=" confirmed='".$this->confirmed."'";

		
		return parent::update($campos, $where);
	}
	
	function getId_invoice() {
		return $this->id_invoice;
	}

	function getNumber_invoice() {
		return $this->number_invoice;
	}

	function getId_user() {
		return $this->id_user;
	}

	function getId_university() {
		return $this->id_university;
	}

	function getConfirmed() {
		return $this->confirmed;
	}

	function getYear_invoice() {
		return $this->year_invoice;
	}

	function getMonth_invoice() {
		return $this->month_invoice;
	}

	function setId_invoice($id_invoice) {
		$this->id_invoice = $id_invoice;
	}

	function setNumber_invoice($number_invoice) {
		$this->number_invoice = $number_invoice;
	}

	function setId_user($id_user) {
		$this->id_user = $id_user;
	}

	function setId_university($id_university) {
		$this->id_university = $id_university;
	}

	function setConfirmed($confirmed) {
		$this->confirmed = $confirmed;
	}

	function setYear_invoice($year_invoice) {
		$this->year_invoice = $year_invoice;
	}

	function setMonth_invoice($month_invoice) {
		$this->month_invoice = $month_invoice;
	}


	
}
