<?php

/**
 * Description of newsModel
 *
 * @author Sandra
 */
class newsModel extends baseModel {

    private $id_new = 0;
    private $close = 0;
    private $title = '';
    private $description = '';
    private $document = '';
    private $image = '';
    private $date_new = '';
    private $date_end = '';
    private $level = '';

    function __construct() {

	parent::__construct();
	parent::setTable('lm_news');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
	return parent::select($where, $as, $select, $join);
    }
    
    public function selectPagination($where = '',$join = '',$order = '',$limit = '', $select='*') {
	return parent::selectPagination($where, $join, $order, $limit, $select);
    }

    public function add($valores = '', $indices = '') {

	$first = true;


	if (!empty($this->close)) {
	    if ($first) {
		$indices .= "close";
		$valores .= $this->close;
		$first = false;
	    } else {
		$indices .= ",close";
		$valores .= "," . $this->close;
	    }
	}

	if (!empty($this->title)) {
	    if ($first) {
		$indices .= "title";
		$valores .= "'" . $this->title . "'";
		$first = false;
	    } else {
		$indices .= ",title";
		$valores .= ",'" . $this->title . "'";
	    }
	}



	if (!empty($this->description)) {
	    if ($first) {
		$indices .= "description";
		$valores .= "'" . $this->description . "'";
		$first = false;
	    } else {
		$indices .= ",description";
		$valores .= ",'" . $this->description . "'";
	    }
	}

	if (!empty($this->document)) {
	    if ($first) {
		$indices .= "document";
		$valores .= "'" . $this->document . "'";
		$first = false;
	    } else {
		$indices .= ",document";
		$valores .= ",'" . $this->document . "'";
	    }
	}


	if (!empty($this->image)) {
	    if ($first) {
		$indices .= "image";
		$valores .= "'" . $this->image . "'";
		$first = false;
	    } else {
		$indices .= ",image";
		$valores .= ",'" . $this->image . "'";
	    }
	}

	if (!empty($this->date_new)) {
	    if ($first) {
		$indices .= "date_new";
		$valores .= "'" . $this->date_new . "'";
		$first = false;
	    } else {
		$indices .= ",date_new";
		$valores .= ",'" . $this->date_new . "'";
	    }
	}

	if (!empty($this->date_end)) {
	    if ($first) {
		$indices .= "date_end";
		$valores .= "'" . $this->date_end . "'";
		$first = false;
	    } else {
		$indices .= ",date_end";
		$valores .= ",'" . $this->date_end . "'";
	    }
	}

	if (!empty($this->level)) {
	    if ($first) {
		$indices .= "level";
		$valores .= "'" . $this->level . "'";
		$first = false;
	    } else {
		$indices .= ",level";
		$valores .= ",'" . $this->level . "'";
	    }
	}


	return parent::add($indices, $valores);
    }

    public function update($campos = '', $where = '') {

	$where = 'id_new=' . $this->id_new;
	$first = true;

	if (!empty($this->title)) {
	    if ($first) {
		$campos .= " title='" . $this->title . "'";
		$first = false;
	    } else {
		$campos .= ", title='" . $this->title . "'";
	    }
	}
	
	if (!empty($this->description)) {
	    if ($first) {
		$campos .= " description='" . $this->description . "'";
		$first = false;
	    } else {
		$campos .= ", description='" . $this->description . "'";
	    }
	}
	
	if (!empty($this->document)) {
	    if ($first) {
		$campos .= " document='" . $this->document . "'";
		$first = false;
	    } else {
		$campos .= ", document='" . $this->document . "'";
	    }
	}
	
	if (!empty($this->image)) {
	    if ($first) {
		$campos .= " image='" . $this->image . "'";
		$first = false;
	    } else {
		$campos .= ", image='" . $this->image . "'";
	    }
	}
	
	if (!empty($this->date_end)) {
	    if ($first) {
		$campos .= " date_end='" . $this->date_end . "'";
		$first = false;
	    } else {
		$campos .= ", date_end='" . $this->date_end . "'";
	    }
	}
	
	if (!empty($this->level)) {
	    if ($first) {
		$campos .= " level='" . $this->level . "'";
		$first = false;
	    } else {
		$campos .= ", level='" . $this->level . "'";
	    }
	}

	if ($first) {
		$campos.= " close=$this->close";
		$first = false;
	    } else {
		$campos.= ", close=$this->close";
	    }


	return parent::update($campos, $where);
    }
    
    public function updateClose($campos = '', $where = '') {

	$where = 'id_new=' . $this->id_new;

	$campos .= " close=$this->close";

	return parent::update($campos, $where);
    }

    public function delete($where) {
	return parent::delete($where);
    }
    
    function getId_new() {
	return $this->id_new;
    }

    function getClose() {
	return $this->close;
    }

    function getTitle() {
	return $this->title;
    }

    function getDescription() {
	return $this->description;
    }

    function getDocument() {
	return $this->document;
    }

    function getImage() {
	return $this->image;
    }

    function getDate_new() {
	return $this->date_new;
    }

    function getDate_end() {
	return $this->date_end;
    }

    function getLevel() {
	return $this->level;
    }

    function setId_new($id_new) {
	$this->id_new = $id_new;
    }

    function setClose($close) {
	$this->close = $close;
    }

    function setTitle($title) {
	$this->title = $title;
    }

    function setDescription($description) {
	$this->description = $description;
    }

    function setDocument($document) {
	$this->document = $document;
    }

    function setImage($image) {
	$this->image = $image;
    }

    function setDate_new($date_new) {
	$this->date_new = $date_new;
    }

    function setDate_end($date_end) {
	$this->date_end = $date_end;
    }

    function setLevel($level) {
	$this->level = $level;
    }



}
