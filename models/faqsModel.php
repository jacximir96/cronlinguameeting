<?php

/**
 * Description of faqsModel
 *
 * @author Sandra
 */
class faqsModel extends baseModel {

    private $id_faq = 0;
    private $id_faq_type = 0;
    private $id_faq_destination = 0;
    private $faq_title = '';
    private $faq_description_spanish = '';
    private $faq_description_english = '';
    private $faq_description_french = '';
    private $faq_description_italian = '';
    private $faq_response_spanish = '';
    private $faq_response_english = '';
    private $faq_response_french = '';
    private $faq_response_italian = '';
    private $created = null;
    private $created_by = '';
    private $modified = null;
    private $modified_by = '';

    function __construct() {

	parent::__construct();
	parent::setTable('lm_faqs');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
	return parent::select($where, $as, $select, $join);
    }
    
    public function selectPagination($where = '',$join = '',$order = '',$limit = '', $select='*') {
	return parent::selectPagination($where, $join, $order, $limit, $select);
    }

    public function add($valores = '', $indices = '') {

	$first = true;

	if (!empty($this->id_faq_type)) {
	    if ($first) {
		$indices .= "id_faq_type";
		$valores .= $this->id_faq_type;
		$first = false;
	    } else {
		$indices .= ",id_faq_type";
		$valores .= "," . $this->id_faq_type;
	    }
	}

	if (!empty($this->id_faq_destination)) {
	    if ($first) {
		$indices .= "id_faq_destination";
		$valores .= $this->id_faq_destination;
		$first = false;
	    } else {
		$indices .= ",id_faq_destination";
		$valores .= "," . $this->id_faq_destination;
	    }
	}

	if (!empty($this->faq_title)) {
	    if ($first) {
		$indices .= "faq_title";
		$valores .= "'" . $this->faq_title . "'";
		$first = false;
	    } else {
		$indices .= ",faq_title";
		$valores .= ",'" . $this->faq_title . "'";
	    }
	}



	if (!empty($this->faq_description_english)) {
	    if ($first) {
		$indices .= "faq_description_english";
		$valores .= "'" . $this->faq_description_english . "'";
		$first = false;
	    } else {
		$indices .= ",faq_description_english";
		$valores .= ",'" . $this->faq_description_english . "'";
	    }
	}

	if (!empty($this->faq_description_french)) {
	    if ($first) {
		$indices .= "faq_description_french";
		$valores .= "'" . $this->faq_description_french . "'";
		$first = false;
	    } else {
		$indices .= ",faq_description_french";
		$valores .= ",'" . $this->faq_description_french . "'";
	    }
	}


	if (!empty($this->faq_description_italian)) {
	    if ($first) {
		$indices .= "faq_description_italian";
		$valores .= "'" . $this->faq_description_italian . "'";
		$first = false;
	    } else {
		$indices .= ",faq_description_italian";
		$valores .= ",'" . $this->faq_description_italian . "'";
	    }
	}

	if (!empty($this->faq_description_spanish)) {
	    if ($first) {
		$indices .= "faq_description_spanish";
		$valores .= "'" . $this->faq_description_spanish . "'";
		$first = false;
	    } else {
		$indices .= ",faq_description_spanish";
		$valores .= ",'" . $this->faq_description_spanish . "'";
	    }
	}

	if (!empty($this->faq_response_english)) {
	    if ($first) {
		$indices .= "faq_response_english";
		$valores .= "'" . $this->faq_response_english . "'";
		$first = false;
	    } else {
		$indices .= ",faq_response_english";
		$valores .= ",'" . $this->faq_response_english . "'";
	    }
	}

	if (!empty($this->faq_response_french)) {
	    if ($first) {
		$indices .= "faq_response_french";
		$valores .= "'" . $this->faq_response_french . "'";
		$first = false;
	    } else {
		$indices .= ",faq_response_french";
		$valores .= ",'" . $this->faq_response_french . "'";
	    }
	}


	if (!empty($this->faq_response_italian)) {
	    if ($first) {
		$indices .= "faq_response_italian";
		$valores .= "'" . $this->faq_response_italian . "'";
		$first = false;
	    } else {
		$indices .= ",faq_response_italian";
		$valores .= ",'" . $this->faq_response_italian . "'";
	    }
	}

	if (!empty($this->faq_response_spanish)) {
	    if ($first) {
		$indices .= "faq_response_spanish";
		$valores .= "'" . $this->faq_response_spanish . "'";
		$first = false;
	    } else {
		$indices .= ",faq_response_spanish";
		$valores .= ",'" . $this->faq_response_spanish . "'";
	    }
	}
	
	if (!empty($this->created)) {
	    if ($first) {
		$indices .= "created";
		$valores .= "'" . $this->created . "'";
		$first = false;
	    } else {
		$indices .= ",created";
		$valores .= ",'" . $this->created . "'";
	    }
	}


	if (!empty($this->created_by)) {
	    if ($first) {
		$indices .= "created_by";
		$valores .= "'" . $this->created_by . "'";
		$first = false;
	    } else {
		$indices .= ",created_by";
		$valores .= ",'" . $this->created_by . "'";
	    }
	}
	if (!empty($this->modified)) {
	    if ($first) {
		$indices .= "modified";
		$valores .= "'" . $this->modified . "'";
		$first = false;
	    } else {
		$indices .= ",modified";
		$valores .= ",'" . $this->modified . "'";
	    }
	}
	if (!empty($this->modified_by)) {
	    if ($first) {
		$indices .= "modified_by";
		$valores .= "'" . $this->modified_by . "'";
		$first = false;
	    } else {
		$indices .= ",modified_by";
		$valores .= ",'" . $this->modified_by . "'";
	    }
	}

	return parent::add($indices, $valores);
    }

    public function update($campos = '', $where = '') {

	$where = 'id_faq=' . $this->id_faq;

	$campos = " id_faq_type=$this->id_faq_type, id_faq_destination=$this->id_faq_destination, faq_title='$this->faq_title', faq_description_english='$this->faq_description_english',"
		. "faq_description_french='$this->faq_description_french', faq_description_italian='$this->faq_description_italian', faq_description_spanish='$this->faq_description_spanish',"
		. "faq_response_english='$this->faq_response_english',faq_response_french='$this->faq_response_french', faq_response_italian='$this->faq_response_italian',"
		. "faq_response_spanish='$this->faq_response_spanish',modified='$this->modified',modified_by='$this->modified_by'";


	return parent::update($campos, $where);
    }

    public function delete($where) {
	return parent::delete($where);
    }
    
    function getId_faq() {
	return $this->id_faq;
    }

    function getId_faq_type() {
	return $this->id_faq_type;
    }

    function getId_faq_destination() {
	return $this->id_faq_destination;
    }

    function getFaq_title() {
	return $this->faq_title;
    }

    function getFaq_description_spanish() {
	return $this->faq_description_spanish;
    }

    function getFaq_description_english() {
	return $this->faq_description_english;
    }

    function getFaq_description_french() {
	return $this->faq_description_french;
    }

    function getFaq_description_italian() {
	return $this->faq_description_italian;
    }

    function getFaq_response_spanish() {
	return $this->faq_response_spanish;
    }

    function getFaq_response_english() {
	return $this->faq_response_english;
    }

    function getFaq_response_french() {
	return $this->faq_response_french;
    }

    function getFaq_response_italian() {
	return $this->faq_response_italian;
    }

    function getCreated() {
	return $this->created;
    }

    function getCreated_by() {
	return $this->created_by;
    }

    function getModified() {
	return $this->modified;
    }

    function getModified_by() {
	return $this->modified_by;
    }

    function setId_faq($id_faq) {
	$this->id_faq = $id_faq;
    }

    function setId_faq_type($id_faq_type) {
	$this->id_faq_type = $id_faq_type;
    }

    function setId_faq_destination($id_faq_destination) {
	$this->id_faq_destination = $id_faq_destination;
    }

    function setFaq_title($faq_title) {
	$this->faq_title = $faq_title;
    }

    function setFaq_description_spanish($faq_description_spanish) {
	$this->faq_description_spanish = $faq_description_spanish;
    }

    function setFaq_description_english($faq_description_english) {
	$this->faq_description_english = $faq_description_english;
    }

    function setFaq_description_french($faq_description_french) {
	$this->faq_description_french = $faq_description_french;
    }

    function setFaq_description_italian($faq_description_italian) {
	$this->faq_description_italian = $faq_description_italian;
    }

    function setFaq_response_spanish($faq_response_spanish) {
	$this->faq_response_spanish = $faq_response_spanish;
    }

    function setFaq_response_english($faq_response_english) {
	$this->faq_response_english = $faq_response_english;
    }

    function setFaq_response_french($faq_response_french) {
	$this->faq_response_french = $faq_response_french;
    }

    function setFaq_response_italian($faq_response_italian) {
	$this->faq_response_italian = $faq_response_italian;
    }

    function setCreated($created) {
	$this->created = $created;
    }

    function setCreated_by($created_by) {
	$this->created_by = $created_by;
    }

    function setModified($modified) {
	$this->modified = $modified;
    }

    function setModified_by($modified_by) {
	$this->modified_by = $modified_by;
    }



}
