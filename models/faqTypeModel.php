<?php

/**
 * Description of faqTypeModel
 *
 * @author Sandra
 */
class faqTypeModel extends baseModel {

    private $id_faq_type = 0;
    private $description_faq_type = '';
    private $code_faq = '';

    function __construct() {

	parent::__construct();
	parent::setTable('lm_faq_type');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
	return parent::select($where, $as, $select, $join);
    }
    
    public function selectPagination($where = '',$join = '',$order = '',$limit = '', $select='*') {
	return parent::selectPagination($where, $join, $order, $limit, $select);
    }

    public function add($valores = '', $indices = '') {

	$first = true;

	if (!empty($this->description_faq_type)) {
	    if ($first) {
		$indices .= "description_faq_type";
		$valores .= "'" . $this->description_faq_type . "'";
		$first = false;
	    } else {
		$indices .= ",description_faq_type";
		$valores .= ",'" . $this->description_faq_type . "'";
	    }
	}
	
	if (!empty($this->code_faq)) {
	    if ($first) {
		$indices .= "code_faq";
		$valores .= "'" . $this->code_faq . "'";
		$first = false;
	    } else {
		$indices .= ",code_faq";
		$valores .= ",'" . $this->code_faq . "'";
	    }
	}
	
	return parent::add($indices, $valores);
    }

    public function delete($where) {
	return parent::delete($where);
    }
    
    function getCode_faq() {
	return $this->code_faq;
    }

    function setCode_faq($code_faq) {
	$this->code_faq = $code_faq;
    }

        
    function getId_faq_type() {
	return $this->id_faq_type;
    }

    function getDescription_faq_type() {
	return $this->description_faq_type;
    }

    function setId_faq_type($id_faq_type) {
	$this->id_faq_type = $id_faq_type;
    }

    function setDescription_faq_type($description_faq_type) {
	$this->description_faq_type = $description_faq_type;
    }



}
