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
	
	private $id_student = 0;
	private $log_description = '';
	private $date_log = '';	
	private $ip_log = '';
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_students_logs');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;
		
		if (!empty($this->id_student)) {
			if ($first) {
				$indices .= "id_student";
				$values .= $this->id_student;
				$first = false;
			} else {
				$indices .= ",id_student";
				$values .= "," . $this->id_student;
			}
		}

		
		if (!empty($this->log_description)) {
			if ($first) {
				$indices .= "log_description";
				$values .= "'" . $this->log_description . "'";
				$first = false;
			} else {
				$indices .= ",log_description";
				$values .= ",'" . $this->log_description . "'";
			}
		}
		
		if (!empty($this->date_log)) {
			if ($first) {
				$indices .= "date_log";
				$values .= "'" . $this->date_log . "'";
				$first = false;
			} else {
				$indices .= ",date_log";
				$values .= ",'" . $this->date_log . "'";
			}
		}
		
		if (!empty($this->ip_log)) {
			if ($first) {
				$indices .= "ip_log";
				$values .= "'" . $this->ip_log . "'";
				$first = false;
			} else {
				$indices .= ",ip_log";
				$values .= ",'" . $this->ip_log . "'";
			}
		}
		
		
		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}
	
	function getIp_log() {
		return $this->ip_log;
	}

	function setIp_log($ip_log) {
		$this->ip_log = $ip_log;
	}

		
	function getId_student() {
		return $this->id_student;
	}

	function getLog_description() {
		return $this->log_description;
	}

	function getDate_log() {
		return $this->date_log;
	}

	function setId_student($id_student) {
		$this->id_student = $id_student;
	}

	function setLog_description($log_description) {
		$this->log_description = $log_description;
	}

	function setDate_log($date_log) {
		$this->date_log = $date_log;
	}


	
}
?>