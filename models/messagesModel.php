<?php

/*
 * Developed by wilowi
 */

/**
 * Description of messagesModel
 *
 * @author Sandra <wilowi.com>
 */
class messagesModel extends baseModel{
	
	private $id_messages = 0;
	private $id_user_sender = 0;
	private $id_user_receiver = 0;
	private $subject_mes = '';
	private $body_mes = '';
	private $attach = '';
	private $read_mes = 0;
	private $date_send_mes = null;
	private $date_read_mes = null;
	private $delete_sender = 0;
	private $delete_receiver = 0;
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_messages');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;
		
		if (!empty($this->id_user_sender)) {
			if ($first) {
				$indices .= "id_user_sender";
				$values .= $this->id_user_sender;
				$first = false;
			} else {
				$indices .= ",id_user_sender";
				$values .= "," . $this->id_user_sender;
			}
		}

		if (!empty($this->id_user_receiver)) {
			if ($first) {
				$indices .= "id_user_receiver";
				$values .= $this->id_user_receiver;
				$first = false;
			} else {
				$indices .= ",id_user_receiver";
				$values .= "," . $this->id_user_receiver;
			}
		}

		if (!empty($this->subject_mes)) {
			if ($first) {
				$indices .= "subject_mes";
				$values .= "'" . $this->subject_mes . "'";
				$first = false;
			} else {
				$indices .= ",subject_mes";
				$values .= ",'" . $this->subject_mes . "'";
			}
		}
		
		if (!empty($this->body_mes)) {
			if ($first) {
				$indices .= "body_mes";
				$values .= "'" . $this->body_mes . "'";
				$first = false;
			} else {
				$indices .= ",body_mes";
				$values .= ",'" . $this->body_mes . "'";
			}
		}
		
		if (!empty($this->attach)) {
			if ($first) {
				$indices .= "attach";
				$values .= "'" . $this->attach . "'";
				$first = false;
			} else {
				$indices .= ",attach";
				$values .= ",'" . $this->attach . "'";
			}
		}
		
		
		if (!empty($this->read_mes)) {
			if ($first) {
				$indices .= "read_mes";
				$values .= $this->read_mes;
				$first = false;
			} else {
				$indices .= ",read_mes";
				$values .= "," . $this->read_mes;
			}
		}
		
		if (!empty($this->date_send_mes)) {
			if ($first) {
				$indices .= "date_send_mes";
				$values .= "'" . $this->date_send_mes . "'";
				$first = false;
			} else {
				$indices .= ",date_send_mes";
				$values .= ",'" . $this->date_send_mes . "'";
			}
		}
		
		if (!empty($this->date_read_mes)) {
			if ($first) {
				$indices .= "date_read_mes";
				$values .= "'" . $this->date_read_mes . "'";
				$first = false;
			} else {
				$indices .= ",date_read_mes";
				$values .= ",'" . $this->date_read_mes . "'";
			}
		}
		

		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}

	public function updateRead($campos='', $where = '') {		
		
		$where = 'id_messages='.$this->id_messages;
		$first = true;
		
		if(!empty($this->read_mes)){
			if ($first) {
				$campos.=" read_mes=".$this->read_mes;
				$first = false;
			} else {
				$campos.=", read_mes=".$this->read_mes;
			}
			
		}
		
		if(!empty($this->date_read_mes)){
			if ($first) {
				$campos.=" date_read_mes='".$this->date_read_mes."'";
				$first = false;
			} else {
				$campos.=", date_read_mes='".$this->date_read_mes."'";
			}
			
		}

		return parent::update($campos, $where);
	}
	
	public function updateReadAll($campos='', $where = '') {		
		
		$where = 'id_user_receiver='.$this->id_user_receiver;
		$first = true;
		
		if(!empty($this->read_mes)){
			if ($first) {
				$campos.=" read_mes='".$this->read_mes."'";
				$first = false;
			} else {
				$campos.=", read_mes='".$this->read_mes."'";
			}
			
		}
		
		if(!empty($this->date_read_mes)){
			if ($first) {
				$campos.=" date_read_mes='".$this->date_read_mes."'";
				$first = false;
			} else {
				$campos.=", date_read_mes='".$this->date_read_mes."'";
			}
			
		}

		return parent::update($campos, $where);
	}
	
	public function updateDeleteSender($campos='', $where = '') {		
		
		$where = 'id_messages='.$this->id_messages;
		$first = true;
		
		if(!empty($this->delete_sender)){
			if ($first) {
				$campos.=" delete_sender='".$this->delete_sender."'";
				$first = false;
			} else {
				$campos.=", delete_sender='".$this->delete_sender."'";
			}
			
		}


		return parent::update($campos, $where);
	}
	
	public function updateDeleteReceiver($campos='', $where = '') {		
		
		$where = 'id_messages='.$this->id_messages;
		$first = true;
		
		if(!empty($this->delete_receiver)){
			if ($first) {
				$campos.=" delete_receiver='".$this->delete_receiver."'";
				$first = false;
			} else {
				$campos.=", delete_receiver='".$this->delete_receiver."'";
			}
			
		}

		return parent::update($campos, $where);
	}
	
	function getDelete_sender() {
		return $this->delete_sender;
	}

	function getDelete_receiver() {
		return $this->delete_receiver;
	}

	function setDelete_sender($delete_sender) {
		$this->delete_sender = $delete_sender;
	}

	function setDelete_receiver($delete_receiver) {
		$this->delete_receiver = $delete_receiver;
	}

		
	function getId_messages() {
		return $this->id_messages;
	}

	function getId_user_sender() {
		return $this->id_user_sender;
	}

	function getId_user_receiver() {
		return $this->id_user_receiver;
	}

	function getSubject_mes() {
		return $this->subject_mes;
	}

	function getBody_mes() {
		return $this->body_mes;
	}

	function getAttach() {
		return $this->attach;
	}

	function getRead() {
		return $this->read_mes;
	}

	function getDate_send_mes() {
		return $this->date_send_mes;
	}

	function getDate_read_mes() {
		return $this->date_read_mes;
	}

	function setId_messages($id_messages) {
		$this->id_messages = $id_messages;
	}

	function setId_user_sender($id_user_sender) {
		$this->id_user_sender = $id_user_sender;
	}

	function setId_user_receiver($id_user_receiver) {
		$this->id_user_receiver = $id_user_receiver;
	}

	function setSubject_mes($subject_mes) {
		$this->subject_mes = $subject_mes;
	}

	function setBody_mes($body_mes) {
		$this->body_mes = $body_mes;
	}

	function setAttach($attach) {
		$this->attach = $attach;
	}

	function setRead($read) {
		$this->read_mes = $read;
	}

	function setDate_send_mes($date_send_mes) {
		$this->date_send_mes = $date_send_mes;
	}

	function setDate_read_mes($date_read_mes) {
		$this->date_read_mes = $date_read_mes;
	}


	
}
