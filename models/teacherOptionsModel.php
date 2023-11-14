<?php

/*
 * Developed by wilowi
 */

/**
 * Description of teacherOptionsModel
 *
 * @author Sandra <wilowi.com>
 */
class teacherOptionsModel extends baseModel{
	
	private $id_teacher = 0;
	private $id_section = 0;
	private $sendReportWeek = 0;
	private $is_flex = 0;
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_teacher_options');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $valores='') {		
		
		$first = true;
		
		if (!empty($this->id_teacher)) {
			if ($first) {
				$indices .= "id_teacher";
				$valores .= $this->id_teacher;
				$first = false;
			} else {
				$indices .= ",id_teacher";
				$valores .= "," . $this->id_teacher;
			}
		}

		if (!empty($this->id_section)) {
			if ($first) {
				$indices .= "id_section";
				$valores .= $this->id_section;
				$first = false;
			} else {
				$indices .= ",id_section";
				$valores .= "," . $this->id_section;
			}
		}
		
		if (!empty($this->sendReportWeek)) {
			if ($first) {
				$indices .= "sendReportWeek";
				$valores .= $this->sendReportWeek;
				$first = false;
			} else {
				$indices .= ",sendReportWeek";
				$valores .= "," . $this->sendReportWeek;
			}
		}
		
		if (!empty($this->is_flex)) {
			if ($first) {
				$indices .= "is_flex";
				$valores .= $this->is_flex;
				$first = false;
			} else {
				$indices .= ",is_flex";
				$valores .= "," . $this->is_flex;
			}
		}
				

		return parent::add($indices, $valores);
	}
	
	public function updateSendReport($campos='', $where = '') {		
		
		$where = 'id_teacher='.$this->id_teacher.' AND id_section='.$this->id_section.' AND is_flex='.$this->is_flex;

		$campos = " sendReportWeek=$this->sendReportWeek";		
		
		return parent::update($campos, $where);
	}
	
	function getIs_flex() {
	    return $this->is_flex;
	}

	function setIs_flex($is_flex) {
	    $this->is_flex = $is_flex;
	}

		
	function getId_teacher() {
		return $this->id_teacher;
	}

	function getId_section() {
		return $this->id_section;
	}


	function setId_teacher($id_teacher) {
		$this->id_teacher = $id_teacher;
	}

	function setId_section($id_section) {
		$this->id_section = $id_section;
	}

	function getSendReportWeek() {
		return $this->sendReportWeek;
	}

	function setSendReportWeek($sendReportWeek) {
		$this->sendReportWeek = $sendReportWeek;
	}


	
}
