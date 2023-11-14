<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of feedbacksSuggestionsModel
 *
 * @author Sandra
 */
class feedbacksSuggestionsModel extends baseModel{
     //put your code here

    private $id_feed_sugg = 0;
    private $id_feed_type = 0;
    private $id_feed_sub = 0;
    private $title_spa = '';
    private $title_eng = '';

    function __construct() {

	parent::__construct();
	parent::setTable('lm_feedbacks_suggestions');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
	return parent::select($where, $as, $select, $join);
    }

    public function add($indices = '', $values = '') {

	$first = true;
	
	if (!empty($this->id_feed_type)) {
	    if ($first) {
		$indices .= "id_feed_type";
		$values .= $this->id_feed_type;
		$first = false;
	    } else {
		$indices .= ",id_feed_type";
		$values .= "," . $this->id_feed_type;
	    }
	}
	
	if (!empty($this->id_feed_sub)) {
	    if ($first) {
		$indices .= "id_feed_sub";
		$values .= $this->id_feed_sub;
		$first = false;
	    } else {
		$indices .= ",id_feed_sub";
		$values .= "," . $this->id_feed_sub;
	    }
	}

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


	$where = 'id_feed_sugg=' . $this->id_feed_sugg;
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
    
    function getId_feed_sugg() {
	return $this->id_feed_sugg;
    }

    function getId_feed_type() {
	return $this->id_feed_type;
    }

    function getId_feed_sub() {
	return $this->id_feed_sub;
    }

    function getTitle_spa() {
	return $this->title_spa;
    }

    function getTitle_eng() {
	return $this->title_eng;
    }

    function setId_feed_sugg($id_feed_sugg) {
	$this->id_feed_sugg = $id_feed_sugg;
    }

    function setId_feed_type($id_feed_type) {
	$this->id_feed_type = $id_feed_type;
    }

    function setId_feed_sub($id_feed_sub) {
	$this->id_feed_sub = $id_feed_sub;
    }

    function setTitle_spa($title_spa) {
	$this->title_spa = $title_spa;
    }

    function setTitle_eng($title_eng) {
	$this->title_eng = $title_eng;
    }


    
}
