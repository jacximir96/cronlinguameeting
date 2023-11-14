<?php

/**
 * Description of faqTypeModel
 *
 * @author Sandra
 */
class faqDestinationModel extends baseModel {

    private $id_faq_destination = 0;
    private $destiantion_rol = 0;
    private $description_description = '';

    function __construct() {

	parent::__construct();
	parent::setTable('lm_faq_destination');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
	return parent::select($where, $as, $select, $join);
    }

    public function add($valores = '', $indices = '') {

	$first = true;
	
	if (!empty($this->destiantion_rol)) {
	    if ($first) {
		$indices .= "destiantion_rol";
		$valores .= $this->destiantion_rol;
		$first = false;
	    } else {
		$indices .= ",destiantion_rol";
		$valores .= "," . $this->destiantion_rol;
	    }
	}

	if (!empty($this->description_description)) {
	    if ($first) {
		$indices .= "description_description";
		$valores .= "'" . $this->description_description . "'";
		$first = false;
	    } else {
		$indices .= ",description_description";
		$valores .= ",'" . $this->description_description . "'";
	    }
	}
	
	return parent::add($indices, $valores);
    }

    public function delete($where) {
	return parent::delete($where);
    }
    
    function getId_faq_destination() {
	return $this->id_faq_destination;
    }

    function getDestiantion_rol() {
	return $this->destiantion_rol;
    }

    function getDescription_description() {
	return $this->description_description;
    }

    function setId_faq_destination($id_faq_destination) {
	$this->id_faq_destination = $id_faq_destination;
    }

    function setDestiantion_rol($destiantion_rol) {
	$this->destiantion_rol = $destiantion_rol;
    }

    function setDescription_description($description_description) {
	$this->description_description = $description_description;
    }



}
