<?php

/*
 * Developed by wilowi
 */

/**
 * Description of zoomUsersModel
 *
 * @author Sandra <wilowi.com>
 */
class zoomUsersModel extends baseModel{
	
	private $id_user = 0;
	private $id_user_zoom = '';
	private $zoom_mail = '';
	private $pmi = '';
	private $host_id = '';
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_zoom_users');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;

		if (!empty($this->id_user)) {
			if ($first) {
				$indices .= "id_user";
				$values .= $this->id_user;
				$first = false;
			} else {
				$indices .= ",id_user";
				$values .= "," . $this->id_user;
			}
		}

		if (!empty($this->id_user_zoom)) {
			if ($first) {
				$indices .= "id_user_zoom";
				$values .= "'" . $this->id_user_zoom . "'";
				$first = false;
			} else {
				$indices .= ",id_user_zoom";
				$values .= ",'" . $this->id_user_zoom . "'";
			}
		}
		
		if (!empty($this->zoom_mail)) {
			if ($first) {
				$indices .= "zoom_mail";
				$values .= "'" . $this->zoom_mail . "'";
				$first = false;
			} else {
				$indices .= ",zoom_mail";
				$values .= ",'" . $this->zoom_mail . "'";
			}
		}
		
		if (!empty($this->pmi)) {
			if ($first) {
				$indices .= "pmi";
				$values .= "'" . $this->pmi . "'";
				$first = false;
			} else {
				$indices .= ",pmi";
				$values .= ",'" . $this->pmi . "'";
			}
		}
		
		if (!empty($this->host_id)) {
			if ($first) {
				$indices .= "host_id";
				$values .= "'" . $this->host_id . "'";
				$first = false;
			} else {
				$indices .= ",host_id";
				$values .= ",'" . $this->host_id . "'";
			}
		}
	
		return parent::add($indices, $values);
	}

	public function update($campos='', $where = '') {
		
		$where = 'id_user='.$this->id_user;
		$first = true;
		
		if(!empty($this->id_user_zoom)){
			if ($first) {
				$campos.=" id_user_zoom='".$this->id_user_zoom."'";
				$first = false;
			} else {
				$campos.=", id_user_zoom='".$this->id_user_zoom."'";
			}
			
		}
		
		if(!empty($this->zoom_mail)){
			if ($first) {
				$campos.=" zoom_mail='".$this->zoom_mail."'";
				$first = false;
			} else {
				$campos.=", zoom_mail='".$this->zoom_mail."'";
			}
			
		}

		if(!empty($this->pmi)){
			if ($first) {
				$campos.=" pmi='".$this->pmi."'";
				$first = false;
			} else {
				$campos.=", pmi='".$this->pmi."'";
			}
			
		}
		
		if(!empty($this->host_id)){
			if ($first) {
				$campos.=" host_id='".$this->host_id."'";
				$first = false;
			} else {
				$campos.=", host_id='".$this->host_id."'";
			}
			
		}		
		
		return parent::update($campos, $where);
	}
	
	public function updateHostid(){
		
		$where = 'id_user='.$this->id_user;
		
		$campos =" host_id='".$this->host_id."'";
		
		return parent::update($campos, $where);
	}
	
	public function autoCommit($value = true) {
		parent::autoCommit($value);
	}

	public function commit() {
		parent::commit();
	}

	public function delete($where) {
		return parent::delete($where);
	}

	public function rollBack() {
		parent::rollBack();
	}
	
	function getHost_id() {
		return $this->host_id;
	}

	function setHost_id($host_id) {
		$this->host_id = $host_id;
	}

	
	function getId_user() {
		return $this->id_user;
	}

	function getId_user_zoom() {
		return $this->id_user_zoom;
	}

	function getZoom_mail() {
		return $this->zoom_mail;
	}

	function getPmi() {
		return $this->pmi;
	}

	function setId_user($id_user) {
		$this->id_user = $id_user;
	}

	function setId_user_zoom($id_user_zoom) {
		$this->id_user_zoom = $id_user_zoom;
	}

	function setZoom_mail($zoom_mail) {
		$this->zoom_mail = $zoom_mail;
	}

	function setPmi($pmi) {
		$this->pmi = $pmi;
	}



	
}
