<?php

/*
 * Developed by wilowi
 */

/**
 * Description of emailsModel
 *
 * @author Sandra <wilowi.com>
 */
class emailsNextModel extends baseModel{	

	private $id = 0;
	private $receiver_id = 0;
	private $email = '';
	private $subject = '';
	private $body = '';
	private $attach = '';
	private $date_send_mes = '';
	private $type_message = '';
	private $created_at = '';
	private $updated_at = '';
	private $deleted_at = '';

	
	function __construct() {

		parent::__construct();
		parent::setTable('email_next');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;

		if (!empty($this->receiver_id)) {
			if ($first) {
				$indices .= "receiver_id";
				$values .= $this->receiver_id;
				$first = false;
			} else {
				$indices .= ",receiver_id";
				$values .= "," . $this->receiver_id;
			}
		}
		
		if (!empty($this->email)) {
			if ($first) {
				$indices .= "email";
				$values .= "'" . $this->email . "'";
				$first = false;
			} else {
				$indices .= ",email";
				$values .= ",'" . $this->email . "'";
			}
		}

		if (!empty($this->subject)) {
			if ($first) {
				$indices .= "subject";
				$values .= "'" . $this->subject . "'";
				$first = false;
			} else {
				$indices .= ",subject";
				$values .= ",'" . $this->subject . "'";
			}
		}
		
		if (!empty($this->body)) {
			if ($first) {
				$indices .= "body";
				$values .= "'" . $this->body . "'";
				$first = false;
			} else {
				$indices .= ",body";
				$values .= ",'" . $this->body . "'";
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

		if (!empty($this->created_at)) {
			if ($first) {
				$indices .= "created_at";
				$values .= "'" . $this->created_at . "'";
				$first = false;
			} else {
				$indices .= ",created_at";
				$values .= ",'" . $this->created_at . "'";
			}
		}

		if (!empty($this->updated_at)) {
			if ($first) {
				$indices .= "updated_at";
				$values .= "'" . $this->updated_at . "'";
				$first = false;
			} else {
				$indices .= ",updated_at";
				$values .= ",'" . $this->updated_at . "'";
			}
		}

		if (!empty($this->deleted_at)) {
			if ($first) {
				$indices .= "deleted_at";
				$values .= "'" . $this->deleted_at . "'";
				$first = false;
			} else {
				$indices .= ",deleted_at";
				$values .= ",'" . $this->deleted_at . "'";
			}
		}

		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}

	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */ 
	public function setId($id) : void
	{
		$this->id = $id;
	}

	/**
	 * Get the value of receiver_id
	 */ 
	public function getReceiver_id()
	{
		return $this->receiver_id;
	}

	/**
	 * Set the value of receiver_id
	 *
	 * @return  self
	 */ 
	public function setReceiver_id($receiver_id) : void
	{
		$this->receiver_id = $receiver_id;
	}

	/**
	 * Get the value of email
	 */ 
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set the value of email
	 *
	 * @return  self
	 */ 
	public function setEmail($email) : void
	{
		$this->email = $email;
	}

	/**
	 * Get the value of subject
	 */ 
	public function getSubject()
	{
		return $this->subject;
	}

	/**
	 * Set the value of subject
	 *
	 * @return  self
	 */ 
	public function setSubject($subject) : void
	{
		$this->subject = $subject;
	}

	/**
	 * Get the value of body
	 */ 
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * Set the value of body
	 *
	 * @return  self
	 */ 
	public function setBody($body) : void
	{
		$this->body = $body;
	}

	/**
	 * Get the value of attach
	 */ 
	public function getAttach()
	{
		return $this->attach;
	}

	/**
	 * Set the value of attach
	 *
	 * @return  self
	 */ 
	public function setAttach($attach) : void
	{
		$this->attach = $attach;
	}

	/**
	 * Get the value of date_send_mes
	 */ 
	public function getDate_send_mes()
	{
		return $this->date_send_mes;
	}

	/**
	 * Set the value of date_send_mes
	 *
	 * @return  self
	 */ 
	public function setDate_send_mes($date_send_mes) : void
	{
		$this->date_send_mes = $date_send_mes;
	}

	/**
	 * Get the value of type_message
	 */ 
	public function getType_message()
	{
		return $this->type_message;
	}

	/**
	 * Set the value of type_message
	 *
	 * @return  self
	 */ 
	public function setType_message($type_message) : void
	{
		$this->type_message = $type_message;
	}

	/**
	 * Get the value of created_at
	 */ 
	public function getCreated_at()
	{
		return $this->created_at;
	}

	/**
	 * Set the value of created_at
	 *
	 * @return  self
	 */ 
	public function setCreated_at($created_at) : void
	{
		$this->created_at = $created_at;
	}

	/**
	 * Get the value of updated_at
	 */ 
	public function getUpdated_at()
	{
		return $this->updated_at;
	}

	/**
	 * Set the value of updated_at
	 *
	 * @return  self
	 */ 
	public function setUpdated_at($updated_at) : void
	{
		$this->updated_at = $updated_at;
	}

	/**
	 * Get the value of deleted_at
	 */ 
	public function getDeleted_at()
	{
		return $this->deleted_at;
	}

	/**
	 * Set the value of deleted_at
	 *
	 * @return  self
	 */ 
	public function setDeleted_at($deleted_at)
	{
		$this->deleted_at = $deleted_at;
	}
}
