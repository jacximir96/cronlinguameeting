<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of coursesDuedatesModel
 *
 * @author sandra
 */
class coursesDuedatesModel extends baseModel{
	
	private $week_id = 0;
	private $course_id = 0;
	private $date_start = null;
	private $date_end = null;
	private $order_week = 0;
        private $week_occ = 0;
        private $is_makeUp = 0;
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_courses_duedates');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $valores='') {		
		
		$first = true;
		
		if (!empty($this->course_id)) {
			if ($first) {
				$indices .= "course_id";
				$valores .= $this->course_id;
				$first = false;
			} else {
				$indices .= ",course_id";
				$valores .= "," . $this->course_id;
			}
		}

		if (!empty($this->date_start)) {
			if ($first) {
				$indices .= "date_start";
				$valores .= "'" . $this->date_start . "'";
				$first = false;
			} else {
				$indices .= ",date_start";
				$valores .= ",'" . $this->date_start . "'";
			}
		}
		
		if (!empty($this->date_end)) {
			if ($first) {
				$indices .= "date_end";
				$valores .= "'" . $this->date_end . "'";
				$first = false;
			} else {
				$indices .= ",date_end";
				$valores .= ",'" . $this->date_end . "'";
			}
		}
		
		if (!empty($this->order_week)) {
			if ($first) {
				$indices .= "order_week";
				$valores .= $this->order_week;
				$first = false;
			} else {
				$indices .= ",order_week";
				$valores .= "," . $this->order_week;
			}
		}
                
                if (!empty($this->week_occ)) {
			if ($first) {
				$indices .= "week_occ";
				$valores .= $this->week_occ;
				$first = false;
			} else {
				$indices .= ",week_occ";
				$valores .= "," . $this->week_occ;
			}
		}
                
                if (!empty($this->is_makeUp)) {
			if ($first) {
				$indices .= "is_makeUp";
				$valores .= $this->is_makeUp;
				$first = false;
			} else {
				$indices .= ",is_makeUp";
				$valores .= "," . $this->is_makeUp;
			}
		}
		
		return parent::add($indices, $valores);
	}
	
	public function delete($where) {
		return parent::delete($where);
	}

	
	public function updateWeek(){
		
		$where = "week_id='".$this->week_id."'";
		
		$campos = "order_week='".$this->order_week."'"
                        . ",date_start='$this->date_start'"
                        . ",date_end='$this->date_end'";
		
		return parent::update($campos, $where);
	}
	
        function getWeek_id() {
            return $this->week_id;
        }

        function getCourse_id() {
            return $this->course_id;
        }

        function getDate_start() {
            return $this->date_start;
        }

        function getDate_end() {
            return $this->date_end;
        }

        function getOrder_week() {
            return $this->order_week;
        }

        function getWeek_occ() {
            return $this->week_occ;
        }

        function getIs_makeUp() {
            return $this->is_makeUp;
        }

        function setWeek_id($week_id): void {
            $this->week_id = $week_id;
        }

        function setCourse_id($course_id): void {
            $this->course_id = $course_id;
        }

        function setDate_start($date_start): void {
            $this->date_start = $date_start;
        }

        function setDate_end($date_end): void {
            $this->date_end = $date_end;
        }

        function setOrder_week($order_week): void {
            $this->order_week = $order_week;
        }

        function setWeek_occ($week_occ): void {
            $this->week_occ = $week_occ;
        }

        function setIs_makeUp($is_makeUp): void {
            $this->is_makeUp = $is_makeUp;
        }




}

?>