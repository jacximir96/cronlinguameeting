<?php

/**
 * Description of coachScheduleOccModel
 *
 * @author sandra
 */
class coachScheduleOccModel extends baseModel{	
	
	private $id_schedule_occ = 0;
	private $id_schedule = 0;
	private $date_ini_sch_occ = null;
	private $date_end_sch_occ = null;
	private $id_course_normal = 0;
	private $id_course_flex = 0;
	private $by_flex = 0;
	private $old_schedule = 0;
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_coach_schedule_occ');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $valores='') {		
		
		$first = true;
		
		if (!empty($this->id_schedule)) {
			if ($first) {
				$indices .= "id_schedule";
				$valores .= $this->id_schedule;
				$first = false;
			} else {
				$indices .= ",id_schedule";
				$valores .= "," . $this->id_schedule;
			}
		}
		
		if (!empty($this->date_ini_sch_occ)) {
			if ($first) {
				$indices .= "date_ini_sch_occ";
				$valores .= "'" . $this->date_ini_sch_occ . "'";
				$first = false;
			} else {
				$indices .= ",date_ini_sch_occ";
				$valores .= ",'" . $this->date_ini_sch_occ . "'";
			}
		}
		
		if (!empty($this->date_end_sch_occ)) {
			if ($first) {
				$indices .= "date_end_sch_occ";
				$valores .= "'" . $this->date_end_sch_occ . "'";
				$first = false;
			} else {
				$indices .= ",date_end_sch_occ";
				$valores .= ",'" . $this->date_end_sch_occ . "'";
			}
		}

		if (!empty($this->id_course_normal)) {
			if ($first) {
				$indices .= "id_course_normal";
				$valores .= $this->id_course_normal;
				$first = false;
			} else {
				$indices .= ",id_course_normal";
				$valores .= "," . $this->id_course_normal;
			}
		}
		
		if (!empty($this->id_course_flex)) {
			if ($first) {
				$indices .= "id_course_flex";
				$valores .= $this->id_course_flex;
				$first = false;
			} else {
				$indices .= ",id_course_flex";
				$valores .= "," . $this->id_course_flex;
			}
		}
		
		if (!empty($this->by_flex)) {
			if ($first) {
				$indices .= "by_flex";
				$valores .= $this->by_flex;
				$first = false;
			} else {
				$indices .= ",by_flex";
				$valores .= "," . $this->by_flex;
			}
		}
		
		if (!empty($this->old_schedule)) {
			if ($first) {
				$indices .= "old_schedule";
				$valores .= $this->old_schedule;
				$first = false;
			} else {
				$indices .= ",old_schedule";
				$valores .= "," . $this->old_schedule;
			}
		}
		
		
		return parent::add($indices, $valores);
	}
	
	public function update($campos='', $where = '') {
		
		
		$where = 'id_schedule_occ='.$this->id_schedule_occ.' AND id_schedule='.$this->id_schedule;
		$first = true;		
		
		
		if(!empty($this->date_ini_sch_occ)){
			if ($first) {
				$campos.=" date_ini_sch_occ='".$this->date_ini_sch_occ."'";
				$first = false;
			} else {
				$campos.=", date_ini_sch_occ='".$this->date_ini_sch_occ."'";
			}
			
		}
		
		if(!empty($this->date_end_sch_occ)){
			if ($first) {
				$campos.=" date_end_sch_occ='".$this->date_end_sch_occ."'";
				$first = false;
			} else {
				$campos.=", date_end_sch_occ='".$this->date_end_sch_occ."'";
			}
			
		}
	
		
		if ($first) {
		    $campos .= " id_course_normal=" . $this->id_course_normal.",id_course_flex=$this->id_course_flex,by_flex=$this->by_flex,old_schedule=$this->old_schedule";
		    $first = false;
		} else {
		    $campos .= ", id_course_normal=" . $this->id_course_normal.",id_course_flex=$this->id_course_flex,by_flex=$this->by_flex,old_schedule=$this->old_schedule";
		}


	return parent::update($campos, $where);
	}
	
	public function delete($where) {
		return parent::delete($where);
	}
	
	function getId_schedule_occ() {
	    return $this->id_schedule_occ;
	}

	function getId_schedule() {
	    return $this->id_schedule;
	}

	function getDate_ini_sch_occ() {
	    return $this->date_ini_sch_occ;
	}

	function getDate_end_sch_occ() {
	    return $this->date_end_sch_occ;
	}

	function getId_course_normal() {
	    return $this->id_course_normal;
	}

	function getId_course_flex() {
	    return $this->id_course_flex;
	}

	function getBy_flex() {
	    return $this->by_flex;
	}

	function setId_schedule_occ($id_schedule_occ) {
	    $this->id_schedule_occ = $id_schedule_occ;
	}

	function setId_schedule($id_schedule) {
	    $this->id_schedule = $id_schedule;
	}

	function setDate_ini_sch_occ($date_ini_sch_occ) {
	    $this->date_ini_sch_occ = $date_ini_sch_occ;
	}

	function setDate_end_sch_occ($date_end_sch_occ) {
	    $this->date_end_sch_occ = $date_end_sch_occ;
	}

	function setId_course_normal($id_course_normal) {
	    $this->id_course_normal = $id_course_normal;
	}

	function setId_course_flex($id_course_flex) {
	    $this->id_course_flex = $id_course_flex;
	}

	function setBy_flex($by_flex) {
	    $this->by_flex = $by_flex;
	}

	function getOld_schedule() {
	    return $this->old_schedule;
	}

	function setOld_schedule($old_schedule) {
	    $this->old_schedule = $old_schedule;
	}



}
