<?php

/*
 * Developed by wilowi
 */

/**
 * Description of zoomMeetingsModel
 *
 * @author Sandra <wilowi.com>
 */
class zoomMeetingsModel extends baseModel{
	
	private $id = 0;
	private $user_id = 0;
	private $zoom_id = '';
	private $uuid = '';
	private $start_url = '';
	private $join_url = '';
	private $start_date = '';
	private $start_end = '';
	private $is_active = 1;
	
	function __construct() {

		parent::__construct();
		parent::setTable('zoom_meetings');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;
		
		if (!empty($this->id)) {
			if ($first) {
				$indices .= "id";
				$values .= $this->id;
				$first = false;
			} else {
				$indices .= ",id";
				$values .= "," . $this->id;
			}
		}

		if (!empty($this->user_id)) {
			if ($first) {
				$indices .= "user_id";
				$values .= $this->user_id;
				$first = false;
			} else {
				$indices .= ",user_id";
				$values .= "," . $this->user_id;
			}
		}

		if (!empty($this->zoom_id)) {
			if ($first) {
				$indices .= "zoom_id";
				$values .= "'" . $this->zoom_id . "'";
				$first = false;
			} else {
				$indices .= ",zoom_id";
				$values .= ",'" . $this->zoom_id . "'";
			}
		}
		
		if (!empty($this->uuid)) {
			if ($first) {
				$indices .= "uuid";
				$values .= "'" . $this->uuid . "'";
				$first = false;
			} else {
				$indices .= ",uuid";
				$values .= ",'" . $this->uuid . "'";
			}
		}
		
		if (!empty($this->start_url)) {
			if ($first) {
				$indices .= "start_url";
				$values .= "'" . $this->start_url . "'";
				$first = false;
			} else {
				$indices .= ",start_url";
				$values .= ",'" . $this->start_url . "'";
			}
		}
		
		if (!empty($this->join_url)) {
			if ($first) {
				$indices .= "join_url";
				$values .= "'" . $this->join_url . "'";
				$first = false;
			} else {
				$indices .= ",join_url";
				$values .= ",'" . $this->join_url . "'";
			}
		}
		
		if (!empty($this->start_date)) {
			if ($first) {
				$indices .= "start_date";
				$values .= "'" . $this->start_date . "'";
				$first = false;
			} else {
				$indices .= ",start_date";
				$values .= ",'" . $this->start_date . "'";
			}
		}
		
		if (!empty($this->start_end)) {
			if ($first) {
				$indices .= "start_end";
				$values .= "'" . $this->start_end . "'";
				$first = false;
			} else {
				$indices .= ",start_end";
				$values .= ",'" . $this->start_end . "'";
			}
		}
		
		if ($first) {
			$indices .= "is_active";
			$values .= "'" . $this->is_active . "'";
			$first = false;
		} else {
			$indices .= ",is_active";
			$values .= ",'" . $this->is_active . "'";
		}


		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}

	public function update($campos='', $where = '') {
		
		
		$where = 'user_id='.$this->user_id;
		$first = true;
		
		if(!empty($this->zoom_id)){
			if ($first) {
				$campos.=" zoom_id='".$this->zoom_id."'";
				$first = false;
			} else {
				$campos.=", zoom_id='".$this->zoom_id."'";
			}
			
		}
		
		if(!empty($this->uuid)){
			if ($first) {
				$campos.=" uuid='".$this->uuid."'";
				$first = false;
			} else {
				$campos.=", uuid='".$this->uuid."'";
			}
			
		}

		if(!empty($this->start_url)){
			if ($first) {
				$campos.=" start_url='".$this->start_url."'";
				$first = false;
			} else {
				$campos.=", start_url='".$this->start_url."'";
			}
			
		}
		
		if(!empty($this->join_url)){
			if ($first) {
				$campos.=" join_url='".$this->join_url."'";
				$first = false;
			} else {
				$campos.=", join_url='".$this->join_url."'";
			}
			
		}
		
		if(!empty($this->start_date)){
			if ($first) {
				$campos.=" start_date='".$this->start_date."'";
				$first = false;
			} else {
				$campos.=", start_date='".$this->start_date."'";
			}
			
		}
		
		if(!empty($this->start_end)){
			if ($first) {
				$campos.=" start_end='".$this->start_end."'";
				$first = false;
			} else {
				$campos.=", start_end='".$this->start_end."'";
			}
			
		}
				
		if ($first) {
			$campos .= " is_active='" . $this->is_active . "'";
			$first = false;
		} else {
			$campos .= ", is_active='" . $this->is_active . "'";
		}

		return parent::update($campos, $where);
	}

	
	function getId_zoom_meeting() {
		return $this->id;
	}

	function getId_user() {
		return $this->user_id;
	}

	function getZoom_id() {
		return $this->zoom_id;
	}

	function getUuid() {
		return $this->uuid;
	}

	function getStart_url() {
		return $this->start_url;
	}

	function getJoin_url() {
		return $this->join_url;
	}

	function getDate_ini_meeting() {
		return $this->start_date;
	}

	function getDate_end_meeting() {
		return $this->start_end;
	}

	function getActive_meeting() {
		return $this->is_active;
	}

	function setId_zoom_meeting($id) {
		$this->id = $id;
	}

	function setId_user($user_id) {
		$this->user_id = $user_id;
	}

	function setZoom_id($zoom_id) {
		$this->zoom_id = $zoom_id;
	}

	function setUuid($uuid) {
		$this->uuid = $uuid;
	}

	function setStart_url($start_url) {
		$this->start_url = $start_url;
	}

	function setJoin_url($join_url) {
		$this->join_url = $join_url;
	}

	function setDate_ini_meeting($start_date) {
		$this->start_date = $start_date;
	}

	function setDate_end_meeting($start_end) {
		$this->start_end = $start_end;
	}

	function setActive_meeting($is_active) {
		$this->is_active = $is_active;
	}


	
}
