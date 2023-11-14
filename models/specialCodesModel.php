<?php

/*
 * Developed by wilowi
 */

/**
 * Description of specialCodesModel
 *
 * @author Sandra <wilowi.com>
 */
class specialCodesModel extends baseModel{
	
	private $id_special_code = 0;
	private $id_course = 0;
	private $id_university = 0;
	private $id_type_course = 0;
	private $code_special = '';
	private $used = 0;
	private $url_pdf = '';
	private $date_ini_use = '';
	private $date_end_use = '';
        private $request_id = 0;
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_special_codes');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;
		
		if (!empty($this->id_university)) {
			if ($first) {
				$indices .= "id_university";
				$values .= $this->id_university;
				$first = false;
			} else {
				$indices .= ",id_university";
				$values .= "," . $this->id_university;
			}
		}
		
		if (!empty($this->id_type_course)) {
			if ($first) {
				$indices .= "id_type_course";
				$values .= $this->id_type_course;
				$first = false;
			} else {
				$indices .= ",id_type_course";
				$values .= "," . $this->id_type_course;
			}
		}
		
		if (!empty($this->id_course)) {
			if ($first) {
				$indices .= "id_course";
				$values .= $this->id_course;
				$first = false;
			} else {
				$indices .= ",id_course";
				$values .= "," . $this->id_course;
			}
		}
		
		if (!empty($this->code_special)) {
			if ($first) {
				$indices .= "code_special";
				$values .= "'" . $this->code_special . "'";
				$first = false;
			} else {
				$indices .= ",code_special";
				$values .= ",'" . $this->code_special . "'";
			}
		}
		
		if (!empty($this->used)) {
			if ($first) {
				$indices .= "used";
				$values .= $this->used;
				$first = false;
			} else {
				$indices .= ",used";
				$values .= "," . $this->used;
			}
		}
		
		if (!empty($this->url_pdf)) {
			if ($first) {
				$indices .= "url_pdf";
				$values .= "'" . $this->url_pdf . "'";
				$first = false;
			} else {
				$indices .= ",url_pdf";
				$values .= ",'" . $this->url_pdf . "'";
			}
		}
		
		if (!empty($this->date_ini_use)) {
			if ($first) {
				$indices .= "date_ini_use";
				$values .= "'" . $this->date_ini_use . "'";
				$first = false;
			} else {
				$indices .= ",date_ini_use";
				$values .= ",'" . $this->date_ini_use . "'";
			}
		}
		
		if (!empty($this->date_end_use)) {
			if ($first) {
				$indices .= "date_end_use";
				$values .= "'" . $this->date_end_use . "'";
				$first = false;
			} else {
				$indices .= ",date_end_use";
				$values .= ",'" . $this->date_end_use . "'";
			}
		}
                
                if (!empty($this->request_id)) {
			if ($first) {
				$indices .= "request_id";
				$values .= $this->request_id;
				$first = false;
			} else {
				$indices .= ",request_id";
				$values .= "," . $this->request_id;
			}
		}
		
		
		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}
	
	
	public function updateUsed($campos='',$where=''){
		
		$where = "id_special_code=".$this->id_special_code;
		
		$campos = "used=".$this->used;
		
		return parent::update($campos, $where);
		
	}
	
	function getId_university() {
		return $this->id_university;
	}

	function getId_type_course() {
		return $this->id_type_course;
	}

	function getUsed() {
		return $this->used;
	}

	function getUrl_pdf() {
		return $this->url_pdf;
	}

	function setId_university($id_university) {
		$this->id_university = $id_university;
	}

	function setId_type_course($id_type_course) {
		$this->id_type_course = $id_type_course;
	}

	function setUsed($used) {
		$this->used = $used;
	}

	function setUrl_pdf($url_pdf) {
		$this->url_pdf = $url_pdf;
	}

		
	
	function getId_special_code() {
		return $this->id_special_code;
	}

	function getId_course() {
		return $this->id_course;
	}

	function getCode_special() {
		return $this->code_special;
	}

	function setId_special_code($id_special_code) {
		$this->id_special_code = $id_special_code;
	}

	function setId_course($id_course) {
		$this->id_course = $id_course;
	}

	function setCode_special($code_special) {
		$this->code_special = $code_special;
	}


	function getDate_ini_use() {
		return $this->date_ini_use;
	}

	function getDate_end_use() {
		return $this->date_end_use;
	}

	function setDate_ini_use($date_ini_use) {
		$this->date_ini_use = $date_ini_use;
	}

	function setDate_end_use($date_end_use) {
		$this->date_end_use = $date_end_use;
	}

        function getRequest_id() {
            return $this->request_id;
        }

        function setRequest_id($request_id): void {
            $this->request_id = $request_id;
        }


	
}
