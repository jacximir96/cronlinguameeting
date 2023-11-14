<?php

/* 
 * Developed by wilowi
 */

class managerOptionsModel extends baseModel{

	private $enable_chat = '';
	private $hour_ini_chat = '';
	private $hour_end_chat = '';
	private $emails_sent = 0;
	private $date_emails = '';
        private $emails_sessions_sent = 0;
        private $date_emails_sessions = '';
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_manager_options');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	
	public function add($indices = '', $valores = '') {

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
				$valores .= "'".$this->hour_ini_chat."'";
				$first = false;
			} else {
				$indices .= ",hour_ini_chat";
				$valores .= ",'" . $this->hour_ini_chat."'";
			}
		}

		if (!empty($this->hour_end_chat)) {
			if ($first) {
				$indices .= "hour_end_chat";
				$valores .= "'".$this->hour_end_chat."'";
				$first = false;
			} else {
				$indices .= ",hour_end_chat";
				$valores .= ",'" . $this->hour_end_chat."'";
			}
		}
		
		if (!empty($this->emails_sent)) {
			if ($first) {
				$indices .= "emails_sent";
				$valores .= "'".$this->emails_sent."'";
				$first = false;
			} else {
				$indices .= ",emails_sent";
				$valores .= ",'" . $this->emails_sent."'";
			}
		}
		
		if (!empty($this->date_emails)) {
			if ($first) {
				$indices .= "date_emails";
				$valores .= "'".$this->date_emails."'";
				$first = false;
			} else {
				$indices .= ",date_emails";
				$valores .= ",'" . $this->date_emails."'";
			}
		}
                
                if (!empty($this->emails_sessions_sent)) {
			if ($first) {
				$indices .= "emails_sessions_sent";
				$valores .= "'".$this->emails_sessions_sent."'";
				$first = false;
			} else {
				$indices .= ",emails_sessions_sent";
				$valores .= ",'" . $this->emails_sessions_sent."'";
			}
		}
		
		if (!empty($this->date_emails_sessions)) {
			if ($first) {
				$indices .= "date_emails_sessions";
				$valores .= "'".$this->date_emails_sessions."'";
				$first = false;
			} else {
				$indices .= ",date_emails_sessions";
				$valores .= ",'" . $this->date_emails_sessions."'";
			}
		}

		return parent::add($indices, $valores);
	}
	
	
	public function updateHoursChat($campos='', $where = ''){
		
	    if(!empty($this->hour_ini_chat) && !empty($this->hour_end_chat)){
		
		$campos = "hour_ini_chat='".$this->hour_ini_chat."',hour_end_chat='".$this->hour_end_chat."'";
		
		return parent::update($campos, $where);
		
	    }else{
		return true;
	    }
		
	}
	
	public function updateChat($campos='',$where = ''){
	    
	    $campos = "enable_chat=$this->enable_chat";
		
	    return parent::update($campos, $where);
	    
	}
	
	public function updateEmailsSent(){
	    
	    $campos = "emails_sent=$this->emails_sent, date_emails='$this->date_emails'";
		
	    return parent::update($campos, '');
	    
	}
        
        public function updateEmailsSessionsSent(){
	    
	    $campos = "emails_sessions_sent=$this->emails_sessions_sent, date_emails_sessions='$this->date_emails_sessions'";
		
	    return parent::update($campos, '');
	    
	}


	function getEnable_chat() {
	    return $this->enable_chat;
	}

	function getHour_ini_chat() {
	    return $this->hour_ini_chat;
	}

	function getHour_end_chat() {
	    return $this->hour_end_chat;
	}

	function setEnable_chat($enable_chat) {
	    $this->enable_chat = $enable_chat;
	}

	function setHour_ini_chat($hour_ini_chat) {
	    $this->hour_ini_chat = $hour_ini_chat;
	}

	function setHour_end_chat($hour_end_chat) {
	    $this->hour_end_chat = $hour_end_chat;
	}
	
	function getEmails_sent() {
	    return $this->emails_sent;
	}

	function getDate_emails() {
	    return $this->date_emails;
	}

	function setEmails_sent($emails_sent) {
	    $this->emails_sent = $emails_sent;
	}

	function setDate_emails($date_emails) {
	    $this->date_emails = $date_emails;
	}

        public function getEmails_sessions_sent() {
            return $this->emails_sessions_sent;
        }

        public function getDate_emails_sessions() {
            return $this->date_emails_sessions;
        }

        public function setEmails_sessions_sent($emails_sessions_sent): void {
            $this->emails_sessions_sent = $emails_sessions_sent;
        }

        public function setDate_emails_sessions($date_emails_sessions): void {
            $this->date_emails_sessions = $date_emails_sessions;
        }

        
	
}

?>