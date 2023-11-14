<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of guidesChaptersModel
 *
 * @author Sandra
 */
class guidesChaptersModel extends baseModel{
    //put your code here
    
    private $id_chapter = 0;
    private $id_guide = 0;
    private $chapter_name = '';
    private $url = '';
    
     function __construct() {

	parent::__construct();
	parent::setTable('lm_guides_chapters');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
	return parent::select($where, $as, $select, $join);
    }
    
    public function delete($where) {
	return parent::delete($where);
    }
    
    public function add($indices = '', $values = '') {

	$first = true;

	if (!empty($this->id_guide)) {
	    if ($first) {
		$indices .= "id_guide";
		$values .= $this->id_guide;
		$first = false;
	    } else {
		$indices .= ",id_guide";
		$values .= "," . $this->id_guide;
	    }
	}

	if (!empty($this->chapter_name)) {
	    if ($first) {
		$indices .= "chapter_name";
		$values .= "'" . $this->chapter_name . "'";
		$first = false;
	    } else {
		$indices .= ",chapter_name";
		$values .= ",'" . $this->chapter_name . "'";
	    }
	}

	if (!empty($this->url)) {
	    if ($first) {
		$indices .= "url";
		$values .= "'" . $this->url . "'";
		$first = false;
	    } else {
		$indices .= ",url";
		$values .= ",'" . $this->url . "'";
	    }
	}


	return parent::add($indices, $values);
    }

    public function update() {

	$where = "id_chapter=$this->id_chapter AND id_guide=$this->id_guide";
	$first = true;

        if (!empty($this->chapter_name)) {

            if ($first) {
                $campos .= " chapter_name=$this->chapter_name";
                $first = false;
            } else {
                $campos .= ", chapter_name=$this->chapter_name";
            }
        }

        if (!empty($this->url)) {
            if ($first) {
                $campos .= " is_paid=$this->is_paid";
                $first = false;
            } else {
                $campos .= ", is_paid=$this->is_paid";
            }
        }


        return parent::update($campos, $where);
    }
    
    function getId_chapter() {
        return $this->id_chapter;
    }

    function getId_guide() {
        return $this->id_guide;
    }

    function getChapter_name() {
        return $this->chapter_name;
    }

    function getUrl() {
        return $this->url;
    }

    function setId_chapter($id_chapter): void {
        $this->id_chapter = $id_chapter;
    }

    function setId_guide($id_guide): void {
        $this->id_guide = $id_guide;
    }

    function setChapter_name($chapter_name): void {
        $this->chapter_name = $chapter_name;
    }

    function setUrl($url): void {
        $this->url = $url;
    }


    
}
