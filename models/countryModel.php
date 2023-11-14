<?php

/* 
 * Developed by wilowi
 */

class countryModel extends baseModel{
	
	private $id_country = 0;
	private $iso2 = '';
	private $name = '';
	private $nom = '';
	private $iso3 = '';
	private $num_code = '';
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_country');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

	function getId_country() {
		return $this->id_country;
	}

	function getIso2() {
		return $this->iso2;
	}

	function getName() {
		return $this->name;
	}

	function getNom() {
		return $this->nom;
	}

	function getIso3() {
		return $this->iso3;
	}

	function getNum_code() {
		return $this->num_code;
	}

	function setId_country($id_country) {
		$this->id_country = $id_country;
	}

	function setIso2($iso2) {
		$this->iso2 = $iso2;
	}

	function setName($name) {
		$this->name = $name;
	}

	function setNom($nom) {
		$this->nom = $nom;
	}

	function setIso3($iso3) {
		$this->iso3 = $iso3;
	}

	function setNum_code($num_code) {
		$this->num_code = $num_code;
	}

	
}

?>