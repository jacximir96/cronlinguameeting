<?php

/*
 * Developed by wilowi
 */

/**
 * Description of studentsLogsModel
 *
 * @author Sandra <wilowi.com>
 */
class studentsLogsModel extends baseModel{

	private $id = 0;
	private $log_name = '';
	private $description = '';
	private $subject_type = '';
	private $event = '';
	private $subject_id = 0;
	private $causer_type = '';
	private $causer_id = 0;
	private $properties = '';
	private $batch_uuid = '';
	private $created_at = '';
	private $updated_at = '';
	
	function __construct() {

		parent::__construct();
		parent::setTable('activity_log');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;

		if (!empty($this->log_name)) {
			if ($first) {
				$indices .= "log_name";
				$values .= "'" . $this->log_name . "'";
				$first = false;
			} else {
				$indices .= ",log_name";
				$values .= ",'" . $this->log_name . "'";
			}
		}
		
		if (!empty($this->description)) {
			if ($first) {
				$indices .= "description";
				$values .= "'" . $this->description . "'";
				$first = false;
			} else {
				$indices .= ",description";
				$values .= ",'" . $this->description . "'";
			}
		}
		
		if (!empty($this->subject_type)) {
			if ($first) {
				$indices .= "subject_type";
				$values .= "'" . $this->subject_type . "'";
				$first = false;
			} else {
				$indices .= ",subject_type";
				$values .= ",'" . $this->subject_type . "'";
			}
		}
		
		if (!empty($this->event)) {
			if ($first) {
				$indices .= "event";
				$values .= "'" . $this->event . "'";
				$first = false;
			} else {
				$indices .= ",event";
				$values .= ",'" . $this->event . "'";
			}
		}

		if (!empty($this->subject_id)) {
			if ($first) {
				$indices .= "subject_id";
				$values .= $this->subject_id;
				$first = false;
			} else {
				$indices .= ",subject_id";
				$values .= "," . $this->subject_id;
			}
		}

		if (!empty($this->causer_type)) {
			if ($first) {
				$indices .= "causer_type";
				$values .= "'" . $this->causer_type . "'";
				$first = false;
			} else {
				$indices .= ",causer_type";
				$values .= ",'" . $this->causer_type . "'";
			}
		}

		if (!empty($this->causer_id)) {
			if ($first) {
				$indices .= "causer_id";
				$values .= $this->causer_id;
				$first = false;
			} else {
				$indices .= ",causer_id";
				$values .= "," . $this->causer_id;
			}
		}

		if (!empty($this->properties)) {
			if ($first) {
				$indices .= "properties";
				$values .= "'" . $this->properties . "'";
				$first = false;
			} else {
				$indices .= ",properties";
				$values .= ",'" . $this->properties . "'";
			}
		}

		if (!empty($this->batch_uuid)) {
			if ($first) {
				$indices .= "batch_uuid";
				$values .= "'" . $this->batch_uuid . "'";
				$first = false;
			} else {
				$indices .= ",batch_uuid";
				$values .= ",'" . $this->batch_uuid . "'";
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
	 * Get the value of log_name
	 */ 
	public function getLog_name()
	{
		return $this->log_name;
	}

	/**
	 * Set the value of log_name
	 *
	 * @return  self
	 */ 
	public function setLog_name($log_name) : void
	{
		$this->log_name = $log_name;
	}

	/**
	 * Get the value of description
	 */ 
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Set the value of description
	 *
	 * @return  self
	 */ 
	public function setDescription($description) : void
	{
		$this->description = $description;
	}

	/**
	 * Get the value of subject_type
	 */ 
	public function getSubject_type()
	{
		return $this->subject_type;
	}

	/**
	 * Set the value of subject_type
	 *
	 * @return  self
	 */ 
	public function setSubject_type($subject_type) : void
	{
		$this->subject_type = $subject_type;
	}

	/**
	 * Get the value of event
	 */ 
	public function getEvent()
	{
		return $this->event;
	}

	/**
	 * Set the value of event
	 *
	 * @return  self
	 */ 
	public function setEvent($event) : void
	{
		$this->event = $event;
	}

	/**
	 * Get the value of subject_id
	 */ 
	public function getSubject_id()
	{
		return $this->subject_id;
	}

	/**
	 * Set the value of subject_id
	 *
	 * @return  self
	 */ 
	public function setSubject_id($subject_id) : void
	{
		$this->subject_id = $subject_id;
	}

	/**
	 * Get the value of causer_type
	 */ 
	public function getCauser_type()
	{
		return $this->causer_type;
	}

	/**
	 * Set the value of causer_type
	 *
	 * @return  self
	 */ 
	public function setCauser_type($causer_type) : void
	{
		$this->causer_type = $causer_type;
	}

	/**
	 * Get the value of causer_id
	 */ 
	public function getCauser_id()
	{
		return $this->causer_id;
	}

	/**
	 * Set the value of causer_id
	 *
	 * @return  self
	 */ 
	public function setCauser_id($causer_id) : void
	{
		$this->causer_id = $causer_id;
	}

	/**
	 * Get the value of properties
	 */ 
	public function getProperties()
	{
		return $this->properties;
	}

	/**
	 * Set the value of properties
	 *
	 * @return  self
	 */ 
	public function setProperties($properties) : void
	{
		$this->properties = $properties;
	}

	/**
	 * Get the value of batch_uuid
	 */ 
	public function getBatch_uuid()
	{
		return $this->batch_uuid;
	}

	/**
	 * Set the value of batch_uuid
	 *
	 * @return  self
	 */ 
	public function setBatch_uuid($batch_uuid) : void
	{
		$this->batch_uuid = $batch_uuid;
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
}
?>