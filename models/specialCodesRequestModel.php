<?php

/*
 * Developed by wilowi
 */

/**
 * Description of specialCodesRequestModel
 *
 * @author Sandra <wilowi.com>
 */
class specialCodesRequestModel extends baseModel{
	
	private $request_id = 0;
	private $university_id = 0;
	private $type_code = 0;
	private $number_codes = 0;
	private $url_pdf = '';
        private $request_date = '';
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_special_codes_request');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;
                
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
		
		if (!empty($this->university_id)) {
			if ($first) {
				$indices .= "university_id";
				$values .= $this->university_id;
				$first = false;
			} else {
				$indices .= ",university_id";
				$values .= "," . $this->university_id;
			}
		}
		
		if (!empty($this->type_code)) {
			if ($first) {
				$indices .= "type_code";
				$values .= $this->type_code;
				$first = false;
			} else {
				$indices .= ",type_code";
				$values .= "," . $this->type_code;
			}
		}
		

		
		if (!empty($this->number_codes)) {
			if ($first) {
				$indices .= "number_codes";
				$values .= $this->number_codes;
				$first = false;
			} else {
				$indices .= ",number_codes";
				$values .= "," . $this->number_codes;
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
		
		if (!empty($this->request_date)) {
			if ($first) {
				$indices .= "request_date";
				$values .= "'" . $this->request_date . "'";
				$first = false;
			} else {
				$indices .= ",request_date";
				$values .= ",'" . $this->request_date . "'";
			}
		}

		
		
		return parent::add($indices, $values);
	}
        
        
        	
	public function updateUrl(){
		
		$where = "request_id=".$this->request_id;
		
		$campos = "url_pdf='$this->url_pdf'";
		
		return parent::update($campos, $where);
		
	}
	

	public function delete($where) {
		return parent::delete($where);
	}

        function getRequest_id() {
            return $this->request_id;
        }

        function getUniversity_id() {
            return $this->university_id;
        }

        function getType_code() {
            return $this->type_code;
        }

        function getNumber_codes() {
            return $this->number_codes;
        }

        function getUrl_pdf() {
            return $this->url_pdf;
        }

        function getRequest_date() {
            return $this->request_date;
        }

        function setRequest_id($request_id): void {
            $this->request_id = $request_id;
        }

        function setUniversity_id($university_id): void {
            $this->university_id = $university_id;
        }

        function setType_code($type_code): void {
            $this->type_code = $type_code;
        }

        function setNumber_codes($number_codes): void {
            $this->number_codes = $number_codes;
        }

        function setUrl_pdf($url_pdf): void {
            $this->url_pdf = $url_pdf;
        }

        function setRequest_date($request_date): void {
            $this->request_date = $request_date;
        }



	
}
