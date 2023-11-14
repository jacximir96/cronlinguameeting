<?php

/*
 * Developed by wilowi
 */

/**
 * Description of coachIncentiveModel
 *
 * @author Sandra <wilowi.com>
 */
class coachPaymentModel extends baseModel {

    private $id_coach = 0;
    private $year = '';
    private $month = '';
    private $value = '';
    private $is_paid = null;

    function __construct() {

	parent::__construct();
	parent::setTable('lm_coach_payment');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
	return parent::select($where, $as, $select, $join);
    }

    public function add($indices = '', $values = '') {

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

	if (!empty($this->year)) {
	    if ($first) {
		$indices .= "year";
		$values .= "'" . $this->year . "'";
		$first = false;
	    } else {
		$indices .= ",year";
		$values .= ",'" . $this->year . "'";
	    }
	}

	if (!empty($this->month)) {
	    if ($first) {
		$indices .= "month";
		$values .= "'" . $this->month . "'";
		$first = false;
	    } else {
		$indices .= ",month";
		$values .= ",'" . $this->month . "'";
	    }
	}

	if (!empty($this->value)) {
	    if ($first) {
		$indices .= "value";
		$values .= "'" . $this->value . "'";
		$first = false;
	    } else {
		$indices .= ",value";
		$values .= ",'" . $this->value . "'";
	    }
	}

	if (!empty($this->is_paid)) {
	    if ($first) {
		$indices .= "is_paid";
		$values .= $this->is_paid;
		$first = false;
	    } else {
		$indices .= ",is_paid";
		$values .= "," . $this->is_paid;
	    }
	}

	return parent::add($indices, $values);
    }

    public function updatePaid() {

	$where = "id_coach=$this->id_coach AND year='$this->year' AND month='$this->month'";
	$first = true;


	if ($first) {
	    $campos .= " is_paid=$this->is_paid";
	    $first = false;
	} else {
	    $campos .= ", is_paid=$this->is_paid";
	}


	return parent::update($campos, $where);
    }

    public function updateValue() {

	$where = "id_coach=$this->id_coach AND year='$this->year' AND month='$this->month'";
	$first = true;


	if ($first) {
	    $campos .= " value='$this->value'";
	    $first = false;
	} else {
	    $campos .= ", value='$this->value'";
	}


	return parent::update($campos, $where);
    }

    public function delete($where) {
	return parent::delete($where);
    }

    function getId_coach() {
	return $this->id_coach;
    }

    function getYear() {
	return $this->year;
    }

    function getMonth() {
	return $this->month;
    }

    function getValue() {
	return $this->value;
    }

    function getIs_paid() {
	return $this->is_paid;
    }

    function setId_coach($id_coach) {
	$this->id_coach = $id_coach;
    }

    function setYear($year) {
	$this->year = $year;
    }

    function setMonth($month) {
	$this->month = $month;
    }

    function setValue($value) {
	$this->value = $value;
    }

    function setIs_paid($is_paid) {
	$this->is_paid = $is_paid;
    }

}
