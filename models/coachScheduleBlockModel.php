<?php

/**
 * Description of coachScheduleBlockModel
 *
 * @author sandra
 */
class coachScheduleBlockModel extends baseModel {

    private $id_coach = 0;
    private $blocked = 0;
    private $blocked_admin = 0;

    function __construct() {

	parent::__construct();
	parent::setTable('lm_coach_schedule_block');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
	return parent::select($where, $as, $select, $join);
    }

    public function add($indices = '', $valores = '') {

	$first = true;

	if (!empty($this->id_coach)) {
	    if ($first) {
		$indices .= "id_coach";
		$valores .= $this->id_coach;
		$first = false;
	    } else {
		$indices .= ",id_coach";
		$valores .= "," . $this->id_coach;
	    }
	}

	if ($first) {
	    $indices .= "blocked,blocked_admin";
	    $valores .= $this->blocked.','.$this->blocked_admin;
	    $first = false;
	} else {
	    $indices .= ",blocked,blocked_admin";
	    $valores .= "," . $this->blocked.','.$this->blocked_admin;
	}


	return parent::add($indices, $valores);
    }

    public function update($campos = '', $where = '') {

	$where = 'id_coach=' . $this->id_coach;
	$first = true;


	if ($first) {
	    $campos .= " blocked=$this->blocked";
	    $first = false;
	} else {
	    $campos .= ", blocked=$this->blocked";
	}


	return parent::update($campos, $where);
    }
    
    public function updateAdmin($campos = '', $where = '') {

	$where = 'id_coach=' . $this->id_coach;
	$first = true;


	if ($first) {
	    $campos .= " blocked_admin=$this->blocked_admin";
	    $first = false;
	} else {
	    $campos .= ", blocked_admin=$this->blocked_admin";
	}


	return parent::update($campos, $where);
    }

    public function delete($where) {
	return parent::delete($where);
    }

    function getId_coach() {
	return $this->id_coach;
    }

    function getBlocked() {
	return $this->blocked;
    }

    function setId_coach($id_coach) {
	$this->id_coach = $id_coach;
    }

    function setBlocked($blocked) {
	$this->blocked = $blocked;
    }
    
    function getBlocked_admin() {
	return $this->blocked_admin;
    }

    function setBlocked_admin($blocked_admin) {
	$this->blocked_admin = $blocked_admin;
    }



}
