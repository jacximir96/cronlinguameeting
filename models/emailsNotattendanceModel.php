<?php

/*
 * Developed by wilowi
 */

/**
 * Description of emailsNotattendanceModel
 *
 * @author Sandra <wilowi.com>
 */
class emailsNotattendanceModel extends baseModel{	
	
	private $id_email = 0;
	private $id_user_receiver = 0;
	private $email_receiver = '';
	private $subject_mail = '';
	private $body_mail = '';
	private $attach = '';
	private $date_send_mes = null;
	private $type_message = '';
	private $id_session = 0;
	private $by_flex = 0;
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_emails_notattendance');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;

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
		
		if (!empty($this->email_receiver)) {
			if ($first) {
				$indices .= "email_receiver";
				$values .= "'" . $this->email_receiver . "'";
				$first = false;
			} else {
				$indices .= ",email_receiver";
				$values .= ",'" . $this->email_receiver . "'";
			}
		}

		if (!empty($this->subject_mail)) {
			if ($first) {
				$indices .= "subject_mail";
				$values .= "'" . $this->subject_mail . "'";
				$first = false;
			} else {
				$indices .= ",subject_mail";
				$values .= ",'" . $this->subject_mail . "'";
			}
		}
		
		if (!empty($this->body_mail)) {
			if ($first) {
				$indices .= "body_mail";
				$values .= "'" . $this->body_mail . "'";
				$first = false;
			} else {
				$indices .= ",body_mail";
				$values .= ",'" . $this->body_mail . "'";
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
		
		if (!empty($this->type_message)) {
			if ($first) {
				$indices .= "type_message";
				$values .= "'" . $this->type_message . "'";
				$first = false;
			} else {
				$indices .= ",type_message";
				$values .= ",'" . $this->type_message . "'";
			}
		}
		
		if (!empty($this->id_session)) {
			if ($first) {
				$indices .= "id_session";
				$values .= $this->id_session;
				$first = false;
			} else {
				$indices .= ",id_session";
				$values .= "," . $this->id_session;
			}
		}
		
		if (!empty($this->by_flex)) {
			if ($first) {
				$indices .= "by_flex";
				$values .= $this->by_flex;
				$first = false;
			} else {
				$indices .= ",by_flex";
				$values .= "," . $this->by_flex;
			}
		}
		
		
		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}
	
	function getType_message() {
		return $this->type_message;
	}

	function setType_message($type_message) {
		$this->type_message = $type_message;
	}

		
	function getId_email() {
		return $this->id_email;
	}

	function getId_user_receiver() {
		return $this->id_user_receiver;
	}

	function getEmail_receiver() {
		return $this->email_receiver;
	}

	function getSubject_mail() {
		return $this->subject_mail;
	}

	function getBody_mail() {
		return $this->body_mail;
	}

	function getAttach() {
		return $this->attach;
	}

	function getDate_send_mes() {
		return $this->date_send_mes;
	}

	function setId_email($id_email) {
		$this->id_email = $id_email;
	}

	function setId_user_receiver($id_user_receiver) {
		$this->id_user_receiver = $id_user_receiver;
	}

	function setEmail_receiver($email_receiver) {
		$this->email_receiver = $email_receiver;
	}

	function setSubject_mail($subject_mail) {
		$this->subject_mail = $subject_mail;
	}

	function setBody_mail($body_mail) {
		$this->body_mail = $body_mail;
	}

	function setAttach($attach) {
		$this->attach = $attach;
	}

	function setDate_send_mes($date_send_mes) {
		$this->date_send_mes = $date_send_mes;
	}

	function getId_session() {
	    return $this->id_session;
	}

	function getBy_flex() {
	    return $this->by_flex;
	}

	function setId_session($id_session) {
	    $this->id_session = $id_session;
	}

	function setBy_flex($by_flex) {
	    $this->by_flex = $by_flex;
	}


	
}
