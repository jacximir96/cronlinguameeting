<?php

/*
 * Developed by wilowi
 */

/**
 * Description of notificationsModel
 *
 * @author Sandra <wilowi.com>
 */
class notificationsModel extends baseModel{
	
	private $id_notification = 0;
	private $id_type_not = 0;	
	private $read = 0;
	private $data = '';
	private $dest_user = 0;
	private $dest_rol = '';
	private $date_insert = '';
	private $date_read = '';
	private $date_erased = '';
	private $erased = 0;
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_notifications');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

	public function add($indices = '', $valores = '') {
		
		$first = true;

		if (!empty($this->id_notification)) {
			if ($first) {
				$indices .= "id_notification";
				$valores .= $this->id_notification;
				$first = false;
			} else {
				$indices .= ",id_notification";
				$valores .= "," . $this->id_notification;
			}
		}


		if (!empty($this->id_type_not)) {
			if ($first) {
				$indices .= "id_type_not";
				$valores .= $this->id_type_not;
				$first = false;
			} else {
				$indices .= ",id_type_not";
				$valores .= "," . $this->id_type_not;
			}
		}
		
		if (!empty($this->read)) {
			if ($first) {
				$indices .= "read";
				$valores .= $this->read;
				$first = false;
			} else {
				$indices .= ",read";
				$valores .= "," . $this->read;
			}
		}

		if (!empty($this->data)) {
			if ($first) {
				$indices .= "data";
				$valores .= "'" . $this->data . "'";
				$first = false;
			} else {
				$indices .= ",data";
				$valores .= ",'" . $this->data . "'";
			}
		}


		if (!empty($this->dest_user)) {
			if ($first) {
				$indices .= "dest_user";
				$valores .= $this->dest_user;
				$first = false;
			} else {
				$indices .= ",dest_user";
				$valores .= "," . $this->dest_user;
			}
		}
		
		if (!empty($this->dest_rol)) {
			if ($first) {
				$indices .= "dest_rol";
				$valores .= $this->dest_rol;
				$first = false;
			} else {
				$indices .= ",dest_rol";
				$valores .= "," . $this->dest_rol;
			}
		}
		
		if (!empty($this->date_insert)) {
			if ($first) {
				$indices .= "date_insert";
				$valores .= "'" . $this->date_insert . "'";
				$first = false;
			} else {
				$indices .= ",date_insert";
				$valores .= ",'" . $this->date_insert . "'";
			}
		}
		
		if (!empty($this->date_read)) {
			if ($first) {
				$indices .= "date_read";
				$valores .= "'" . $this->date_read . "'";
				$first = false;
			} else {
				$indices .= ",date_read";
				$valores .= ",'" . $this->date_read . "'";
			}
		}
				
		if ($first) {
			$indices .= "erased";
			$valores .= $this->erased;
			$first = false;
		} else {
			$indices .= ",erased";
			$valores .= ",".$this->erased;
		}
		
		
		
		return parent::add($indices, $valores);
	}
	
	public function update($campos='', $where = '') {
		return parent::update($campos, $where);
	}
	
	public function updateErased($campos='', $where = ''){
		
		$where = "id_notification=".$this->id_notification;
		
		$campos = "erased=".$this->erased;
		
		if (!empty($this->date_erased)) {
		    if ($first) {
			$campos .= " date_erased='" . $this->date_erased . "'";
			$first = false;
		    } else {
			$campos .= ", date_erased='" . $this->date_erased . "'";
		    }
		}
		
		return parent::update($campos, $where);
	}
	
	public function updateErasedAll($campos='', $where = ''){
		
		$where = "dest_user=".$this->dest_user;
		
		$campos = "erased=".$this->erased;
		
		if (!empty($this->date_erased)) {
		    if ($first) {
			$campos .= " date_erased='" . $this->date_erased . "'";
			$first = false;
		    } else {
			$campos .= ", date_erased='" . $this->date_erased . "'";
		    }
		}
		
		return parent::update($campos, $where);
	}
	
    public function updateRead($campos = '', $where = '') {

	$where = "id_notification=" . $this->id_notification;
	$first = true;

	if ($first) {
	    $campos .= " lm_notifications.read='" . $this->read . "'";
	    $first = false;
	} else {
	    $campos .= ", lm_notifications.read='" . $this->read . "'";
	}

	if (!empty($this->date_read)) {
	    if ($first) {
		$campos .= " date_read='" . $this->date_read . "'";
		$first = false;
	    } else {
		$campos .= ", date_read='" . $this->date_read . "'";
	    }
	}

	return parent::update($campos, $where);
    }

    public function updateReadAll($campos = '', $where = '') {

	$where = "dest_user=" . $this->dest_user;
	$first = true;

	if ($first) {
	    $campos .= " lm_notifications.read='" . $this->read . "'";
	    $first = false;
	} else {
	    $campos .= ", lm_notifications.read='" . $this->read . "'";
	}

	if (!empty($this->date_read)) {
	    if ($first) {
		$campos .= " date_read='" . $this->date_read . "'";
		$first = false;
	    } else {
		$campos .= ", date_read='" . $this->date_read . "'";
	    }
	}

	return parent::update($campos, $where);
    }

    public function delete($where) {
		return parent::delete($where);
	}

	function getId_notification() {
		return $this->id_notification;
	}
	
	function getDate_erased() {
	    return $this->date_erased;
	}

	function setDate_erased($date_erased) {
	    $this->date_erased = $date_erased;
	}

	
	function getId_type_not() {
		return $this->id_type_not;
	}

	function getRead() {
		return $this->read;
	}

	function getData() {
		return $this->data;
	}

	function getDest_user() {
		return $this->dest_user;
	}

	function getDest_rol() {
		return $this->dest_rol;
	}

	function getDate_insert() {
		return $this->date_insert;
	}

	function getDate_read() {
		return $this->date_read;
	}

	function getErased() {
		return $this->erased;
	}

	function setId_notification($id_notification) {
		$this->id_notification = $id_notification;
	}

	function setId_type_not($id_type_not) {
		$this->id_type_not = $id_type_not;
	}

	function setRead($read) {
		$this->read = $read;
	}

	function setData($data) {
		$this->data = $data;
	}

	function setDest_user($dest_user) {
		$this->dest_user = $dest_user;
	}

	function setDest_rol($dest_rol) {
		$this->dest_rol = $dest_rol;
	}

	function setDate_insert($date_insert) {
		$this->date_insert = $date_insert;
	}

	function setDate_read($date_read) {
		$this->date_read = $date_read;
	}

	function setErased($erased) {
		$this->erased = $erased;
	}


}
?>