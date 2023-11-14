<?php

/*
 * Developed by wilowi
 */

/**
 * Description of studentPreregisterModel
 *
 * @author Sandra <wilowi.com>
 */
class studentPreregisterModel extends baseModel {

    private $id_preregister = 0;
    private $name_student = '';
    private $lastname_student = '';
    private $email_student = '';
    private $password = '';
    private $code_section = '';
    private $id_type_course = 0;
    private $id_course = 0;
    private $id_section = 0;
    private $offer_special = 0;
    private $payment_id = '';
    private $isFlex = 0;

    function __construct() {

	parent::__construct();
	parent::setTable('lm_student_preregister');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
	return parent::select($where, $as, $select, $join);
    }

    public function add($indices = '', $valores = '') {

	$first = true;

	if (!empty($this->email_student)) {
	    if ($first) {
		$indices .= "email_student";
		$valores .= "'" . $this->email_student . "'";
		$first = false;
	    } else {
		$indices .= ",email_student";
		$valores .= ",'" . $this->email_student . "'";
	    }
	}

	if (!empty($this->password)) {
	    if ($first) {
		$indices .= "password";
		$valores .= "'" . $this->password . "'";
		$first = false;
	    } else {
		$indices .= ",password";
		$valores .= ",'" . $this->password . "'";
	    }
	}


	if (!empty($this->name_student)) {
	    if ($first) {
		$indices .= "name_student";
		$valores .= "'" . $this->name_student . "'";
		$first = false;
	    } else {
		$indices .= ",name_student";
		$valores .= ",'" . $this->name_student . "'";
	    }
	}

	if (!empty($this->lastname_student)) {
	    if ($first) {
		$indices .= "lastname_student";
		$valores .= "'" . $this->lastname_student . "'";
		$first = false;
	    } else {
		$indices .= ",lastname_student";
		$valores .= ",'" . $this->lastname_student . "'";
	    }
	}

	if (!empty($this->code_section)) {
	    if ($first) {
		$indices .= "code_section";
		$valores .= "'" . $this->code_section . "'";
		$first = false;
	    } else {
		$indices .= ",code_section";
		$valores .= ",'" . $this->code_section . "'";
	    }
	}


	if (!empty($this->id_type_course)) {
	    if ($first) {
		$indices .= "id_type_course";
		$valores .= $this->id_type_course;
		$first = false;
	    } else {
		$indices .= ",id_type_course";
		$valores .= "," . $this->id_type_course;
	    }
	}

	if (!empty($this->id_course)) {
	    if ($first) {
		$indices .= "id_course";
		$valores .= $this->id_course;
		$first = false;
	    } else {
		$indices .= ",id_course";
		$valores .= "," . $this->id_course;
	    }
	}

	if (!empty($this->id_section)) {
	    if ($first) {
		$indices .= "id_section";
		$valores .= $this->id_section;
		$first = false;
	    } else {
		$indices .= ",id_section";
		$valores .= "," . $this->id_section;
	    }
	}

	if (!empty($this->offer_special)) {
	    if ($first) {
		$indices .= "offer_special";
		$valores .= $this->offer_special;
		$first = false;
	    } else {
		$indices .= ",offer_special";
		$valores .= "," . $this->offer_special;
	    }
	}

	if (!empty($this->payment_id)) {
	    if ($first) {
		$indices .= "payment_id";
		$valores .= "'" . $this->payment_id . "'";
		$first = false;
	    } else {
		$indices .= ",payment_id";
		$valores .= ",'" . $this->payment_id . "'";
	    }
	}

	if (!empty($this->isFlex)) {
	    if ($first) {
		$indices .= "isFlex";
		$valores .= $this->isFlex;
		$first = false;
	    } else {
		$indices .= ",isFlex";
		$valores .= "," . $this->isFlex;
	    }
	}

	return parent::add($indices, $valores);
    }

    public function update($campos = '', $where = '') {


	$where = 'id_preregister=' . $this->id_preregister;
	$first = true;

	if (!empty($this->id_course)) {
	    if ($first) {
		$campos .= " id_course=" . $this->id_course;
		$first = false;
	    } else {
		$campos .= ", id_course=" . $this->id_course;
	    }
	}

	if (!empty($this->id_section)) {
	    if ($first) {
		$campos .= " id_section=" . $this->id_section;
		$first = false;
	    } else {
		$campos .= ", id_section=" . $this->id_section;
	    }
	}

	if (!empty($this->code_section)) {
	    if ($first) {
		$campos .= " code_section='" . $this->code_section . "'";
		$first = false;
	    } else {
		$campos .= ", code_section='" . $this->code_section . "'";
	    }
	}


	return parent::update($campos, $where);
    }

    public function updateMigrate($campos = '', $where = '') {

	$where.= "email_student='$this->email_student'";
	$first = true;

	if (!empty($this->id_course)) {
	    if ($first) {
		$campos .= " id_course=" . $this->id_course;
		$first = false;
	    } else {
		$campos .= ", id_course=" . $this->id_course;
	    }
	}

	if (!empty($this->id_section)) {
	    if ($first) {
		$campos .= " id_section=" . $this->id_section;
		$first = false;
	    } else {
		$campos .= ", id_section=" . $this->id_section;
	    }
	}
	
	if (!empty($this->id_type_course)) {
	    if ($first) {
		$campos .= " id_type_course=" . $this->id_type_course;
		$first = false;
	    } else {
		$campos .= ", id_type_course=" . $this->id_type_course;
	    }
	}

	if (!empty($this->code_section)) {
	    if ($first) {
		$campos .= " code_section='" . $this->code_section . "'";
		$first = false;
	    } else {
		$campos .= ", code_section='" . $this->code_section . "'";
	    }
	}
	
	if (!empty($this->isFlex)) {
	    if ($first) {
		$campos .= " isFlex=" . $this->isFlex;
		$first = false;
	    } else {
		$campos .= ", isFlex=" . $this->isFlex;
	    }
	}


	return parent::update($campos, $where);
    }

    public function delete($where) {
	return parent::delete($where);
    }

    function getIsFlex() {
	return $this->isFlex;
    }

    function setIsFlex($isFlex) {
	$this->isFlex = $isFlex;
    }

    function getId_preregister() {
	return $this->id_preregister;
    }

    function getName_student() {
	return $this->name_student;
    }

    function getLastname_student() {
	return $this->lastname_student;
    }

    function getEmail_student() {
	return $this->email_student;
    }

    function getPassword() {
	return $this->password;
    }

    function getCode_section() {
	return $this->code_section;
    }

    function getId_type_course() {
	return $this->id_type_course;
    }

    function getId_course() {
	return $this->id_course;
    }

    function getId_section() {
	return $this->id_section;
    }

    function getPayment_id() {
	return $this->payment_id;
    }

    function setId_preregister($id_preregister) {
	$this->id_preregister = $id_preregister;
    }

    function setName_student($name_student) {
	$this->name_student = $name_student;
    }

    function setLastname_student($lastname_student) {
	$this->lastname_student = $lastname_student;
    }

    function setEmail_student($email_student) {
	$this->email_student = $email_student;
    }

    function setPassword($password) {
	$this->password = $password;
    }

    function setCode_section($code_section) {
	$this->code_section = $code_section;
    }

    function setId_type_course($id_type_course) {
	$this->id_type_course = $id_type_course;
    }

    function setId_course($id_course) {
	$this->id_course = $id_course;
    }

    function setId_section($id_section) {
	$this->id_section = $id_section;
    }

    function setPayment_id($payment_id) {
	$this->payment_id = $payment_id;
    }

    function getOffer_special() {
	return $this->offer_special;
    }

    function setOffer_special($offer_special) {
	$this->offer_special = $offer_special;
    }

}
