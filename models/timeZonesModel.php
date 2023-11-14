<?php

/* 
 * Developed by wilowi
 */

class timeZonesModel extends baseModel{
	
	private $id_zone = 0;
	private $large_name = '';
	private $description = '';
	private $brief_description = '';
	private $gmt = '';
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_time_zones');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

	function getId_zone() {
		return $this->id_zone;
	}

	function getLarge_name() {
		return $this->large_name;
	}

	function getDescription() {
		return $this->description;
	}

	function getBrief_description() {
		return $this->brief_description;
	}

	function getGmt() {
		return $this->gmt;
	}

	function setId_zone($id_zone) {
		$this->id_zone = $id_zone;
	}

	function setLarge_name($large_name) {
		$this->large_name = $large_name;
	}

	function setDescription($description) {
		$this->description = $description;
	}

	function setBrief_description($brief_description) {
		$this->brief_description = $brief_description;
	}

	function setGmt($gmt) {
		$this->gmt = $gmt;
	}



	
}

?>