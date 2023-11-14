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
	
	private $id_zoom_meeting = 0;
	private $id_user = 0;
	private $zoom_id = '';
	private $uuid = '';
	private $start_url = '';
	private $join_url = '';
	private $date_ini_meeting = '';
	private $date_end_meeting = '';
	private $active_meeting = 1;
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_zoom_meetings');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;
		
		if (!empty($this->id_zoom_meeting)) {
			if ($first) {
				$indices .= "id_zoom_meeting";
				$values .= $this->id_zoom_meeting;
				$first = false;
			} else {
				$indices .= ",id_zoom_meeting";
				$values .= "," . $this->id_zoom_meeting;
			}
		}

		if (!empty($this->id_user)) {
			if ($first) {
				$indices .= "id_user";
				$values .= $this->id_user;
				$first = false;
			} else {
				$indices .= ",id_user";
				$values .= "," . $this->id_user;
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
		
		if (!empty($this->date_ini_meeting)) {
			if ($first) {
				$indices .= "date_ini_meeting";
				$values .= "'" . $this->date_ini_meeting . "'";
				$first = false;
			} else {
				$indices .= ",date_ini_meeting";
				$values .= ",'" . $this->date_ini_meeting . "'";
			}
		}
		
		if (!empty($this->date_end_meeting)) {
			if ($first) {
				$indices .= "date_end_meeting";
				$values .= "'" . $this->date_end_meeting . "'";
				$first = false;
			} else {
				$indices .= ",date_end_meeting";
				$values .= ",'" . $this->date_end_meeting . "'";
			}
		}
		
		if ($first) {
			$indices .= "active_meeting";
			$values .= "'" . $this->active_meeting . "'";
			$first = false;
		} else {
			$indices .= ",active_meeting";
			$values .= ",'" . $this->active_meeting . "'";
		}


		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}

	public function update($campos='', $where = '') {
		
		
		$where = 'id_user='.$this->id_user;
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
		
		if(!empty($this->date_ini_meeting)){
			if ($first) {
				$campos.=" date_ini_meeting='".$this->date_ini_meeting."'";
				$first = false;
			} else {
				$campos.=", date_ini_meeting='".$this->date_ini_meeting."'";
			}
			
		}
		
		if(!empty($this->date_end_meeting)){
			if ($first) {
				$campos.=" date_end_meeting='".$this->date_end_meeting."'";
				$first = false;
			} else {
				$campos.=", date_end_meeting='".$this->date_end_meeting."'";
			}
			
		}
				
		if ($first) {
			$campos .= " active_meeting='" . $this->active_meeting . "'";
			$first = false;
		} else {
			$campos .= ", active_meeting='" . $this->active_meeting . "'";
		}

		return parent::update($campos, $where);
	}

	
	function getId_zoom_meeting() {
		return $this->id_zoom_meeting;
	}

	function getId_user() {
		return $this->id_user;
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
		return $this->date_ini_meeting;
	}

	function getDate_end_meeting() {
		return $this->date_end_meeting;
	}

	function getActive_meeting() {
		return $this->active_meeting;
	}

	function setId_zoom_meeting($id_zoom_meeting) {
		$this->id_zoom_meeting = $id_zoom_meeting;
	}

	function setId_user($id_user) {
		$this->id_user = $id_user;
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

	function setDate_ini_meeting($date_ini_meeting) {
		$this->date_ini_meeting = $date_ini_meeting;
	}

	function setDate_end_meeting($date_end_meeting) {
		$this->date_end_meeting = $date_end_meeting;
	}

	function setActive_meeting($active_meeting) {
		$this->active_meeting = $active_meeting;
	}


	
}
