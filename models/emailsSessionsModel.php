<?php

/*
 * Developed by wilowi
 */

/**
 * Description of emailsModel
 *
 * @author Sandra <wilowi.com>
 */
class emailsSessionsModel extends baseModel{	
	
	private $id_email_session = 0;
	private $id_user_receiver = 0;
	private $email_receiver = '';
	private $subject_mail = '';
	private $body_mail = '';
	private $attach = '';
	private $date_send_mes = null;
	private $type_message = '';
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_emails_sessions');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;

		if (!empty($this->id_user_receiver)) {
			if ($first) {
				$indices .= "id_user_receiver";
				$values .= $this->id_user_receiver;
				$first = false;
			} else {
				$indices .= ",id_user_receiver";
				$values .= "," . $this->id_user_receiver;
			}
		}
		
		if (!empty($this->email_receiver)) {
			if ($first) {
				$indices .= "email_receiver";
				$values .= "'" . $this->email_receiver . "'";
				$first = false;
			} else {
				$indices .= ",email_receiver";
				$values .= ",'" . $this->email_receiver . "'";
			}
		}

		if (!empty($this->subject_mail)) {
			if ($first) {
				$indices .= "subject_mail";
				$values .= "'" . $this->subject_mail . "'";
				$first = false;
			} else {
				$indices .= ",subject_mail";
				$values .= ",'" . $this->subject_mail . "'";
			}
		}
		
		if (!empty($this->body_mail)) {
			if ($first) {
				$indices .= "body_mail";
				$values .= "'" . $this->body_mail . "'";
				$first = false;
			} else {
				$indices .= ",body_mail";
				$values .= ",'" . $this->body_mail . "'";
			}
		}
		
		if (!empty($this->attach)) {
			if ($first) {
				$indices .= "attach";
				$values .= "'" . $this->attach . "'";
				$first = false;
			} else {
				$indices .= ",attach";
				$values .= ",'" . $this->attach . "'";
			}
		}
		

		if (!empty($this->date_send_mes)) {
			if ($first) {
				$indices .= "date_send_mes";
				$values .= "'" . $this->date_send_mes . "'";
				$first = false;
			} else {
				$indices .= ",date_send_mes";
				$values .= ",'" . $this->date_send_mes . "'";
			}
		}
		
		if (!empty($this->type_message)) {
			if ($first) {
				$indices .= "type_message";
				$values .= "'" . $this->type_message . "'";
				$first = false;
			} else {
				$indices .= ",type_message";
				$values .= ",'" . $this->type_message . "'";
			}
		}
		
		
		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}
	
	public function getId_email_session() {
            return $this->id_email_session;
        }

        public function getId_user_receiver() {
            return $this->id_user_receiver;
        }

        public function getEmail_receiver() {
            return $this->email_receiver;
        }

        public function getSubject_mail() {
            return $this->subject_mail;
        }

        public function getBody_mail() {
            return $this->body_mail;
        }

        public function getAttach() {
            return $this->attach;
        }

        public function getDate_send_mes() {
            return $this->date_send_mes;
        }

        public function getType_message() {
            return $this->type_message;
        }

        public function setId_email_session($id_email_session): void {
            $this->id_email_session = $id_email_session;
        }

        public function setId_user_receiver($id_user_receiver): void {
            $this->id_user_receiver = $id_user_receiver;
        }

        public function setEmail_receiver($email_receiver): void {
            $this->email_receiver = $email_receiver;
        }

        public function setSubject_mail($subject_mail): void {
            $this->subject_mail = $subject_mail;
        }

        public function setBody_mail($body_mail): void {
            $this->body_mail = $body_mail;
        }

        public function setAttach($attach): void {
            $this->attach = $attach;
        }

        public function setDate_send_mes($date_send_mes): void {
            $this->date_send_mes = $date_send_mes;
        }

        public function setType_message($type_message): void {
            $this->type_message = $type_message;
        }



		
	


	
}
