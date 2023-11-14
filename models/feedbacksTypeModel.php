<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of feedbacksTypeModel
 *
 * @author Sandra
 */
class feedbacksTypeModel extends baseModel{
    
    //put your code here

    private $id_feed_type = 0;
    private $title_spa = '';
    private $title_eng = '';

    function __construct() {

	parent::__construct();
	parent::setTable('lm_feedbacks_types');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
	return parent::select($where, $as, $select, $join);
    }

    public function add($indices = '', $values = '') {

	$first = true;

	if (!empty($this->title_spa)) {
	    if ($first) {
		$indices .= "title_spa";
		$values .= "'" . $this->title_spa . "'";
		$first = false;
	    } else {
		$indices .= ",title_spa";
		$values .= ",'" . $this->title_spa . "'";
	    }
	}

	if (!empty($this->title_eng)) {
	    if ($first) {
		$indices .= "title_eng";
		$values .= "'" . $this->title_eng . "'";
		$first = false;
	    } else {
		$indices .= ",title_eng";
		$values .= ",'" . $this->title_eng . "'";
	    }
	}

	return parent::add($indices, $values);
    }

    public function delete($where) {
	return parent::delete($where);
    }

    public function update($campos = '', $where = '') {


	$where = 'id_feed_type=' . $this->id_feed_type;
	$first = true;


	if (!empty($this->title_spa)) {
	    if ($first) {
		$campos .= " title_spa='" . $this->title_spa . "'";
		$first = false;
	    } else {
		$campos .= ", title_spa='" . $this->title_spa . "'";
	    }
	}

	if (!empty($this->title_eng)) {
	    if ($first) {
		$campos .= " title_eng='" . $this->title_eng . "'";
		$first = false;
	    } else {
		$campos .= ", title_eng='" . $this->title_eng . "'";
	    }
	}

	return parent::update($campos, $where);
    }
    
    function getId_feed_type() {
	return $this->id_feed_type;
    }

    function getTitle_spa() {
	return $this->title_spa;
    }

    function getTitle_eng() {
	return $this->title_eng;
    }

    function setId_feed_type($id_feed_type) {
	$this->id_feed_type = $id_feed_type;
    }

    function setTitle_spa($title_spa) {
	$this->title_spa = $title_spa;
    }

    function setTitle_eng($title_eng) {
	$this->title_eng = $title_eng;
    }


    
}
