<?php

/*
 * Developed by wilowi
 */

/**
 * Description of zoomRecordingsModel
 *
 * @author Sandra <wilowi.com>
 */
class zoomRecordingsModel extends baseModel{
	
	private $id_recording = 0;
	private $account_id = '';
	private $host_id = '';
	private $uuid = '';
	private $id_recording_zoom = '';
	private $recording_start = null;
	private $recording_end = null;
	private $timezone = '';
	private $file_type = '';
	private $play_url = '';
	private $download_url = '';
	private $status = '';
	private $chat_file = '';

	function __construct() {

		parent::__construct();
		parent::setTable('lm_zoom_recordings');
	}

	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

	public function add($valores='',$indices='') {

		$first = true;

		if (!empty($this->account_id)) {
			if ($first) {
				$indices .= "account_id";
				$valores .= "'" . $this->account_id . "'";
				$first = false;
			} else {
				$indices .= ",account_id";
				$valores .= ",'" . $this->account_id . "'";
			}
		}
		
		
		if (!empty($this->host_id)) {
			if ($first) {
				$indices .= "host_id";
				$valores .= "'" . $this->host_id . "'";
				$first = false;
			} else {
				$indices .= ",host_id";
				$valores .= ",'" . $this->host_id . "'";
			}
		}
		
		if (!empty($this->uuid)) {
			if ($first) {
				$indices .= "uuid";
				$valores .= "'" . $this->uuid . "'";
				$first = false;
			} else {
				$indices .= ",uuid";
				$valores .= ",'" . $this->uuid . "'";
			}
		}
		
		if (!empty($this->id_recording_zoom)) {
			if ($first) {
				$indices .= "id_recording_zoom";
				$valores .= "'" . $this->id_recording_zoom . "'";
				$first = false;
			} else {
				$indices .= ",id_recording_zoom";
				$valores .= ",'" . $this->id_recording_zoom . "'";
			}
		}
		
		if (!empty($this->recording_start)) {
			if ($first) {
				$indices .= "recording_start";
				$valores .= "'" . $this->recording_start . "'";
				$first = false;
			} else {
				$indices .= ",recording_start";
				$valores .= ",'" . $this->recording_start . "'";
			}
		}
		if (!empty($this->recording_end)) {
			if ($first) {
				$indices .= "recording_end";
				$valores .= "'" . $this->recording_end . "'";
				$first = false;
			} else {
				$indices .= ",recording_end";
				$valores .= ",'" . $this->recording_end . "'";
			}
		}
		if (!empty($this->timezone)) {
			if ($first) {
				$indices .= "timezone";
				$valores .= "'" . $this->timezone . "'";
				$first = false;
			} else {
				$indices .= ",timezone";
				$valores .= ",'" . $this->timezone . "'";
			}
		}
		if (!empty($this->file_type)) {
			if ($first) {
				$indices .= "file_type";
				$valores .= "'" . $this->file_type . "'";
				$first = false;
			} else {
				$indices .= ",file_type";
				$valores .= ",'" . $this->file_type . "'";
			}
		}
		
		if (!empty($this->play_url)) {
			if ($first) {
				$indices .= "play_url";
				$valores .= "'" . $this->play_url . "'";
				$first = false;
			} else {
				$indices .= ",play_url";
				$valores .= ",'" . $this->play_url . "'";
			}
		}
		if (!empty($this->download_url)) {
			if ($first) {
				$indices .= "download_url";
				$valores .= "'" . $this->download_url . "'";
				$first = false;
			} else {
				$indices .= ",download_url";
				$valores .= ",'" . $this->download_url . "'";
			}
		}
		if (!empty($this->status)) {
			if ($first) {
				$indices .= "status";
				$valores .= "'" . $this->status . "'";
				$first = false;
			} else {
				$indices .= ",status";
				$valores .= ",'" . $this->status . "'";
			}
		}
		
		if (!empty($this->chat_file)) {
			if ($first) {
				$indices .= "chat_file";
				$valores .= "'" . $this->chat_file . "'";
				$first = false;
			} else {
				$indices .= ",chat_file";
				$valores .= ",'" . $this->chat_file . "'";
			}
		}
		

		return parent::add($indices, $valores);
	}

	public function selectPagination($where = '', $join = '', $order = '', $limit = '', $select='*') {
		return parent::selectPagination($where, $join, $order, $limit,$select);
	}
	

	public function update($campos='', $where = '') {		
		
		$where = 'id_recording='.$this->id_recording.' AND account_id='.$this->account_id. ' AND host_id='
				.$this->host_id.' AND uuid='.$this->uuid.' AND id_recording_zoom='.$this->id_recording_zoom;
		$first = true;	
		
		
		if(!empty($this->recording_start)){
			if ($first) {
				$campos.=" recording_start='".$this->recording_start."'";
				$first = false;
			} else {
				$campos.=", recording_start='".$this->recording_start."'";
			}
			
		}
		
		
		if(!empty($this->recording_end)){
			if ($first) {
				$campos.=" recording_end='".$this->recording_end."'";
				$first = false;
			} else {
				$campos.=", recording_end='".$this->recording_end."'";
			}
			
		}
		
		if(!empty($this->timezone)){
			if ($first) {
				$campos.=" timezone='".$this->timezone."'";
				$first = false;
			} else {
				$campos.=", timezone='".$this->timezone."'";
			}
			
		}

		if(!empty($this->file_type)){
			if ($first) {
				$campos.=" file_type='".$this->file_type."'";
				$first = false;
			} else {
				$campos.=", file_type='".$this->file_type."'";
			}
			
		}
		if(!empty($this->play_url)){
			if ($first) {
				$campos.=" play_url='".$this->play_url."'";
				$first = false;
			} else {
				$campos.=", play_url='".$this->play_url."'";
			}
			
		}
		
		if(!empty($this->download_url)){
			if ($first) {
				$campos.=" download_url='".$this->download_url."'";
				$first = false;
			} else {
				$campos.=", download_url='".$this->download_url."'";
			}
			
		}
		
		if(!empty($this->status)){
			if ($first) {
				$campos.=" status='".$this->status."'";
				$first = false;
			} else {
				$campos.=", status='".$this->status."'";
			}
			
		}
		
		if(!empty($this->chat_file)){
			if ($first) {
				$campos.=" chat_file='".$this->chat_file."'";
				$first = false;
			} else {
				$campos.=", chat_file='".$this->chat_file."'";
			}
			
		}
		
				
		return parent::update($campos, $where);
	}
	
	public function updateChat(){
	    
	    $where = 'id_recording='.$this->id_recording;
	    
	    $campos =" chat_file='".$this->chat_file."'";
	    
	    return parent::update($campos, $where);
	}
	
	public function delete($where) {
		return parent::delete($where);
	}
	
	function getId_recording() {
		return $this->id_recording;
	}

	function getAccount_id() {
		return $this->account_id;
	}

	function getHost_id() {
		return $this->host_id;
	}

	function getUuid() {
		return $this->uuid;
	}

	function getId_recording_zoom() {
		return $this->id_recording_zoom;
	}

	function getRecording_start() {
		return $this->recording_start;
	}

	function getRecording_end() {
		return $this->recording_end;
	}

	function getTimezone() {
		return $this->timezone;
	}

	function getFile_type() {
		return $this->file_type;
	}

	function getPlay_url() {
		return $this->play_url;
	}

	function getDownload_url() {
		return $this->download_url;
	}

	function getStatus() {
		return $this->status;
	}

	function setId_recording($id_recording) {
		$this->id_recording = $id_recording;
	}

	function setAccount_id($account_id) {
		$this->account_id = $account_id;
	}

	function setHost_id($host_id) {
		$this->host_id = $host_id;
	}

	function setUuid($uuid) {
		$this->uuid = $uuid;
	}

	function setId_recording_zoom($id_recording_zoom) {
		$this->id_recording_zoom = $id_recording_zoom;
	}

	function setRecording_start($recording_start) {
		$this->recording_start = $recording_start;
	}

	function setRecording_end($recording_end) {
		$this->recording_end = $recording_end;
	}

	function setTimezone($timezone) {
		$this->timezone = $timezone;
	}

	function setFile_type($file_type) {
		$this->file_type = $file_type;
	}

	function setPlay_url($play_url) {
		$this->play_url = $play_url;
	}

	function setDownload_url($download_url) {
		$this->download_url = $download_url;
	}

	function setStatus($status) {
		$this->status = $status;
	}


	function getChat_file() {
	    return $this->chat_file;
	}

	function setChat_file($chat_file) {
	    $this->chat_file = $chat_file;
	}


	
}
