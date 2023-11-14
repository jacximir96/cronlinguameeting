<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of guidesTypeModel
 *
 * @author Sandra
 */
class guidesTypeModel extends baseModel{
    //put your code here
    
    private $id_guide = 0;
    private $id_language = 0;
    private $guide_name = '';
    private $download_zip = '';
    private $guide_type = 0;
    
    function __construct() {

	parent::__construct();
	parent::setTable('lm_guides_type');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
	return parent::select($where, $as, $select, $join);
    }
    
    public function delete($where) {
	return parent::delete($where);
    }
    
    
    public function add($indices = '', $values = '') {

	$first = true;

	if (!empty($this->id_language)) {
	    if ($first) {
		$indices .= "id_language";
		$values .= $this->id_language;
		$first = false;
	    } else {
		$indices .= ",id_language";
		$values .= "," . $this->id_language;
	    }
	}

	if (!empty($this->guide_name)) {
	    if ($first) {
		$indices .= "guide_name";
		$values .= "'" . $this->guide_name . "'";
		$first = false;
	    } else {
		$indices .= ",guide_name";
		$values .= ",'" . $this->guide_name . "'";
	    }
	}

	if (!empty($this->download_zip)) {
	    if ($first) {
		$indices .= "download_zip";
		$values .= "'" . $this->download_zip . "'";
		$first = false;
	    } else {
		$indices .= ",download_zip";
		$values .= ",'" . $this->download_zip . "'";
	    }
	}
        
        if (!empty($this->guide_type)) {
	    if ($first) {
		$indices .= "guide_type";
		$values .= $this->guide_type;
		$first = false;
	    } else {
		$indices .= ",guide_type";
		$values .= "," . $this->guide_type;
	    }
	}


	return parent::add($indices, $values);
    }

    public function update() {

	$where = "id_guide=$this->id_guide";
	$first = true;


	if (!empty($this->guide_name)) {

            if ($first) {
                $campos .= " guide_name='$this->guide_name'";
                $first = false;
            } else {
                $campos .= ", guide_name='$this->guide_name'";
            }
        }

        if (!empty($this->download_zip)) {
            if ($first) {
                $campos .= " download_zip='$this->download_zip'";
                $first = false;
            } else {
                $campos .= ", download_zip='$this->download_zip'";
            }
        }
        
        
        if ($first) {
                $campos .= " guide_type=$this->guide_type";
                $first = false;
            } else {
                $campos .= ", guide_type=$this->guide_type";
            }

	return parent::update($campos, $where);
    }
    
    function getId_guide() {
        return $this->id_guide;
    }

    function getId_language() {
        return $this->id_language;
    }

    function getGuide_name() {
        return $this->guide_name;
    }

    function getDownload_zip() {
        return $this->download_zip;
    }

    function setId_guide($id_guide): void {
        $this->id_guide = $id_guide;
    }

    function setId_language($id_language): void {
        $this->id_language = $id_language;
    }

    function setGuide_name($guide_name): void {
        $this->guide_name = $guide_name;
    }

    function setDownload_zip($download_zip): void {
        $this->download_zip = $download_zip;
    }

    function getGuide_type() {
        return $this->guide_type;
    }

    function setGuide_type($guide_type): void {
        $this->guide_type = $guide_type;
    }


    
}
