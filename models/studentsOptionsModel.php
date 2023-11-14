<?php

/*
 * Developed by wilowi
 */

/**
 * Description of studentsOptionsModel
 *
 * @author Sandra <wilowi.com>
 */
class studentsOptionsModel extends baseModel{
	
	private $id_user = 0;
	private $make_up = 0;
	private $extra_session = 0;
	private $total_make_up = 0;
	private $total_extra_session = 0;
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_students_options');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $valores='') {		
		
		$first = true;
		
		if (!empty($this->id_user)) {
			if ($first) {
				$indices .= "id_user";
				$valores .= $this->id_user;
				$first = false;
			} else {
				$indices .= ",id_user";
				$valores .= "," . $this->id_user;
			}
		}

		if ($first) {
			$indices .= "make_up,extra_session,total_make_up,total_extra_session";
			$valores .= $this->make_up.','.$this->extra_session.','.$this->total_make_up.','.$this->total_extra_session;
			$first = false;
		} else {
			$indices .= ",make_up,extra_session,total_make_up,total_extra_session";
			$valores .= "," . $this->make_up.','.$this->extra_session.','.$this->total_make_up.','.$this->total_extra_session;
		}

		
		return parent::add($indices, $valores);
	}
	
	public function updateMakeup($campos='', $where = '') {		
		
		$where = 'id_user='.$this->id_user;

		$campos = " make_up=$this->make_up";

		
		
		return parent::update($campos, $where);
	}
	
	public function updateExtra($campos='', $where = '') {		
		
		$where = 'id_user='.$this->id_user;

		$campos = " extra_session=$this->extra_session";

		
		
		return parent::update($campos, $where);
	}
	
	public function updateTotal($campos='', $where = '') {		
		
		$where = 'id_user='.$this->id_user;

		$campos = " total_make_up=$this->total_make_up";
		
		
		return parent::update($campos, $where);
	}
	
	
	public function updateTotalExtra($campos='', $where = '') {		
		
		$where = 'id_user='.$this->id_user;

		$campos = " total_extra_session=$this->total_extra_session";
		
		
		return parent::update($campos, $where);
	}
	
	function getTotal_make_up() {
		return $this->total_make_up;
	}

	function setTotal_make_up($total_make_up) {
		$this->total_make_up = $total_make_up;
	}

	function getTotal_extra_session() {
		return $this->total_extra_session;
	}

	function setTotal_extra_session($total_extra_session) {
		$this->total_extra_session = $total_extra_session;
	}

	function getId_user() {
		return $this->id_user;
	}

	function getMake_up() {
		return $this->make_up;
	}

	function getExtra_session() {
		return $this->extra_session;
	}

	function setId_user($id_user) {
		$this->id_user = $id_user;
	}

	function setMake_up($make_up) {
		$this->make_up = $make_up;
	}

	function setExtra_session($extra_session) {
		$this->extra_session = $extra_session;
	}


	
}

?>