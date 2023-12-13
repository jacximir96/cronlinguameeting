<?php

/* 
 * Developed by wilowi
 */

class managerOptionsModel extends baseModel
{

	private $enable_chat = 0;
	private $hour_ini_chat = '';
	private $hour_end_chat = '';
	private $emails_sent = 0;
	private $date_emails = '';

	function __construct()
	{

		parent::__construct();
		parent::setTable('manager_option');
	}

	public function select($where = '', $as = '', $select = '*', $join = '')
	{
		return parent::select($where, $as, $select, $join);
	}


	public function add($indices = '', $valores = '')
	{
		$first = true;

		if (!empty($this->enable_chat)) {
			if ($first) {
				$indices .= "enable_chat";
				$valores .= $this->enable_chat;
				$first = false;
			} else {
				$indices .= ",enable_chat";
				$valores .= "," . $this->enable_chat;
			}
		}

		if (!empty($this->hour_ini_chat)) {
			if ($first) {
				$indices .= "hour_ini_chat";
				$valores .= "'" . $this->hour_ini_chat . "'";
				$first = false;
			} else {
				$indices .= ",hour_ini_chat";
				$valores .= ",'" . $this->hour_ini_chat . "'";
			}
		}

		if (!empty($this->hour_end_chat)) {
			if ($first) {
				$indices .= "hour_end_chat";
				$valores .= "'" . $this->hour_end_chat . "'";
				$first = false;
			} else {
				$indices .= ",hour_end_chat";
				$valores .= ",'" . $this->hour_end_chat . "'";
			}
		}

		if (!empty($this->emails_sent)) {
			if ($first) {
				$indices .= "emails_sent";
				$valores .= $this->emails_sent;
				$first = false;
			} else {
				$indices .= ",emails_sent";
				$valores .= "," . $this->emails_sent;
			}
		}

		if (!empty($this->date_emails)) {
			if ($first) {
				$indices .= "date_emails";
				$valores .= "'" . $this->date_emails . "'";
				$first = false;
			} else {
				$indices .= ",date_emails";
				$valores .= ",'" . $this->date_emails . "'";
			}
		}

		return parent::add($indices, $valores);
	}


	public function updateHoursChat($campos = '', $where = '')
	{
		if (!empty($this->hour_ini_chat) && !empty($this->hour_end_chat)) {
			$campos = "hour_ini_chat='" . $this->hour_ini_chat . "',hour_end_chat='" . $this->hour_end_chat . "'";
			return parent::update($campos, $where);
		} else {
			return true;
		}
	}

	public function updateChat($campos = '', $where = '')
	{
		$campos = "enable_chat=$this->enable_chat";
		return parent::update($campos, $where);
	}

	public function updateEmailsSent()
	{
		$campos = "emails_sent=$this->emails_sent, date_emails='$this->date_emails'";
		return parent::update($campos, '');
	}

	/*public function updateEmailsSessionsSent()
	{
		$campos = "emails_sessions_sent=$this->emails_sessions_sent, date_emails_sessions='$this->date_emails_sessions'";
		return parent::update($campos, '');
	}*/

	/**
	 * Get the value of enable_chat
	 */ 
	public function getEnable_chat()
	{
		return $this->enable_chat;
	}

	/**
	 * Set the value of enable_chat
	 *
	 * @return  self
	 */ 
	public function setEnable_chat($enable_chat) : void
	{
		$this->enable_chat = $enable_chat;
	}

	/**
	 * Get the value of hour_ini_chat
	 */ 
	public function getHour_ini_chat()
	{
		return $this->hour_ini_chat;
	}

	/**
	 * Set the value of hour_ini_chat
	 *
	 * @return  self
	 */ 
	public function setHour_ini_chat($hour_ini_chat) : void
	{
		$this->hour_ini_chat = $hour_ini_chat;
	}

	/**
	 * Get the value of hour_end_chat
	 */ 
	public function getHour_end_chat()
	{
		return $this->hour_end_chat;
	}

	/**
	 * Set the value of hour_end_chat
	 *
	 * @return  self
	 */ 
	public function setHour_end_chat($hour_end_chat) : void
	{
		$this->hour_end_chat = $hour_end_chat;
	}

	/**
	 * Get the value of emails_sent
	 */ 
	public function getEmails_sent()
	{
		return $this->emails_sent;
	}

	/**
	 * Set the value of emails_sent
	 *
	 * @return  self
	 */ 
	public function setEmails_sent($emails_sent) : void
	{
		$this->emails_sent = $emails_sent;
	}

	/**
	 * Get the value of date_emails
	 */ 
	public function getDate_emails()
	{
		return $this->date_emails;
	}

	/**
	 * Set the value of date_emails
	 *
	 * @return  self
	 */ 
	public function setDate_emails($date_emails) : void
	{
		$this->date_emails = $date_emails;
	}
}
