<?php

/* 
 * Developed by wilowi
 */


class userModel extends baseModel{
	
	
	private $id_user = 0;
	private $email = '';
	private $password = '';
	private $rol = 0;
	private $active = 0;
	private $name_user = '';
	private $lastname_user = '';
	private $nickname = '';
	private $id_zone = 0;
	private $id_country = 0;
	private $id_country_live = 0;
	private $description = '';
	private $url_photo = '';
	private $is_private = 0;
	private $lingro_student = 0;
	private $phone = '';
	private $whatsapp = '';
	private $created = null;
	private $created_by = '';
	private $modified = null;
	private $modified_by = '';
	private $erased = 0;
	private $date_erased = null;
	private $attempts = 0;
	private $blocked = 0;
	private $last_login = '';
	private $who_login = '';
	private $hash_remember = '';
	private $skype = '';
	private $coach_trainee = 0;
	private $coach_flex = 0;
	private $emailsReception = 0;
        private $emailsMarketing = 0;
	private $internal_comment = '';
	private $coach_flex_assigned = 0;
	private $coach_pagador = 0;
        PRIVATE $coach_level = 0;
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_users');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function selectPagination($where = '', $join = '', $order = '', $limit = '', $select='*') {
		return parent::selectPagination($where, $join, $order, $limit, $select);
	}

	public function add($indices='', $valores='') {

		$first = true;

		if (!empty($this->email)) {
			if ($first) {
				$indices .= "email";
				$valores .= "'" . $this->email . "'";
				$first = false;
			} else {
				$indices .= ",email";
				$valores .= ",'" . $this->email . "'";
			}
		}
		
		if (!empty($this->password)) {
			if ($first) {
				$indices .= "password";
				$valores .= "'" . $this->password . "'";
				$first = false;
			} else {
				$indices .= ",password";
				$valores .= ",'" . $this->password . "'";
			}
		}
		
		if (!empty($this->rol)) {
			if ($first) {
				$indices .= "rol";
				$valores .= $this->rol;
				$first = false;
			} else {
				$indices .= ",rol";
				$valores .= "," . $this->rol;
			}
		}
		
		
		if (!empty($this->name_user)) {
			if ($first) {
				$indices .= "name_user";
				$valores .= "'" . $this->name_user . "'";
				$first = false;
			} else {
				$indices .= ",name_user";
				$valores .= ",'" . $this->name_user . "'";
			}
		}
		
		if (!empty($this->lastname_user)) {
			if ($first) {
				$indices .= "lastname_user";
				$valores .= "'" . $this->lastname_user . "'";
				$first = false;
			} else {
				$indices .= ",lastname_user";
				$valores .= ",'" . $this->lastname_user . "'";
			}
		}
		
		if (!empty($this->nickname)) {
			if ($first) {
				$indices .= "nickname";
				$valores .= "'" . $this->nickname . "'";
				$first = false;
			} else {
				$indices .= ",nickname";
				$valores .= ",'" . $this->nickname . "'";
			}
		}


		if (!empty($this->id_zone)) {
			if ($first) {
				$indices .= "id_zone";
				$valores .= $this->id_zone;
				$first = false;
			} else {
				$indices .= ",id_zone";
				$valores .= "," . $this->id_zone;
			}
		}
		
		if (!empty($this->id_country)) {
			if ($first) {
				$indices .= "id_country";
				$valores .= $this->id_country;
				$first = false;
			} else {
				$indices .= ",id_country";
				$valores .= "," . $this->id_country;
			}
		}
		
		if (!empty($this->id_country_live)) {
			if ($first) {
				$indices .= "id_country_live";
				$valores .= $this->id_country_live;
				$first = false;
			} else {
				$indices .= ",id_country_live";
				$valores .= "," . $this->id_country_live;
			}
		}


		if (!empty($this->description)) {
			if ($first) {
				$indices .= "description";
				$valores .= "'" . $this->description . "'";
				$first = false;
			} else {
				$indices .= ",description";
				$valores .= ",'" . $this->description . "'";
			}
		}

		if (!empty($this->url_photo)) {
			if ($first) {
				$indices .= "url_photo";
				$valores .= "'" . $this->url_photo . "'";
				$first = false;
			} else {
				$indices .= ",url_photo";
				$valores .= ",'" . $this->url_photo . "'";
			}
		}
		
		if (!empty($this->phone)) {
			if ($first) {
				$indices .= "phone";
				$valores .= "'" . $this->phone . "'";
				$first = false;
			} else {
				$indices .= ",phone";
				$valores .= ",'" . $this->phone . "'";
			}
		}
		
		if (!empty($this->whatsapp)) {
			if ($first) {
				$indices .= "whatsapp";
				$valores .= "'" . $this->whatsapp . "'";
				$first = false;
			} else {
				$indices .= ",whatsapp";
				$valores .= ",'" . $this->whatsapp . "'";
			}
		}

		if (!empty($this->created)) {
			if ($first) {
				$indices .= "created";
				$valores .= "'" . $this->created . "'";
				$first = false;
			} else {
				$indices .= ",created";
				$valores .= ",'" . $this->created . "'";
			}
		}
		
		if (!empty($this->created_by)) {
			if ($first) {
				$indices .= "created_by";
				$valores .= "'" . $this->created_by . "'";
				$first = false;
			} else {
				$indices .= ",created_by";
				$valores .= ",'" . $this->created_by . "'";
			}
		}
		
		if (!empty($this->modified)) {
			if ($first) {
				$indices .= "modified";
				$valores .= "'" . $this->modified . "'";
				$first = false;
			} else {
				$indices .= ",modified";
				$valores .= ",'" . $this->modified . "'";
			}
		}
		
		if (!empty($this->modified_by)) {
			if ($first) {
				$indices .= "modified_by";
				$valores .= "'" . $this->modified_by . "'";
				$first = false;
			} else {
				$indices .= ",modified_by";
				$valores .= ",'" . $this->modified_by . "'";
			}
		}
		
		if (!empty($this->date_erased)) {
			if ($first) {
				$indices .= "date_erased";
				$valores .= "'" . $this->date_erased . "'";
				$first = false;
			} else {
				$indices .= ",date_erased";
				$valores .= ",'" . $this->date_erased . "'";
			}
		}
		
		if (!empty($this->last_login)) {
			if ($first) {
				$indices .= "last_login";
				$valores .= "'" . $this->last_login . "'";
				$first = false;
			} else {
				$indices .= ",last_login";
				$valores .= ",'" . $this->last_login . "'";
			}
		}
		
		if (!empty($this->who_login)) {
			if ($first) {
				$indices .= "who_login";
				$valores .= "'" . $this->who_login . "'";
				$first = false;
			} else {
				$indices .= ",who_login";
				$valores .= ",'" . $this->who_login . "'";
			}
		}
		
		if (!empty($this->hash_remember)) {
			if ($first) {
				$indices .= "hash_remember";
				$valores .= "'" . $this->hash_remember . "'";
				$first = false;
			} else {
				$indices .= ",hash_remember";
				$valores .= ",'" . $this->hash_remember . "'";
			}
		}
		
		if (!empty($this->skype)) {
			if ($first) {
				$indices .= "skype";
				$valores .= "'" . $this->skype . "'";
				$first = false;
			} else {
				$indices .= ",skype";
				$valores .= ",'" . $this->skype . "'";
			}
		}

		if (!empty($this->internal_comment)) {
			if ($first) {
				$indices .= "internal_comment";
				$valores .= "'" . $this->internal_comment . "'";
				$first = false;
			} else {
				$indices .= ",internal_comment";
				$valores .= ",'" . $this->internal_comment . "'";
			}
		}
                
                if (!empty($this->coach_level)) {
			if ($first) {
				$indices .= "coach_level";
				$valores .= $this->coach_level;
				$first = false;
			} else {
				$indices .= ",coach_level";
				$valores .= "," . $this->coach_level;
			}
		}

		if ($first) {
			$indices .= "active,is_private,lingro_student,erased,attempts,blocked";
			$valores .= $this->active.','.$this->is_private.','.$this->lingro_student.','.$this->erased.','.$this->attempts.','.$this->blocked;
			$first = false;
		} else {
			$indices .= ",active,is_private,lingro_student,erased,attempts,blocked";
			$valores .= "," . $this->active.','.$this->is_private.','.$this->lingro_student.','.$this->erased.','.$this->attempts.','.$this->blocked;
		}

		return parent::add($indices, $valores);
	}
	
	public function update($campos='', $where='') {
		
		$where = 'id_user='.$this->id_user;
		$first = true;
		
		if(!empty($this->email)){
			if ($first) {
				$campos.=" email='".$this->email."'";
				$first = false;
			} else {
				$campos.=", email='".$this->email."'";
			}
			
		}
		if(!empty($this->password)){
			if ($first) {
				$campos.=" password='".$this->password."'";
				$first = false;
			} else {
				$campos.=", password='".$this->password."'";
			}
			
		}
		if(!empty($this->rol)){
			if ($first) {
				$campos.=" rol=".$this->rol;
				$first = false;
			} else {
				$campos.=", rol=".$this->rol;
			}
			
		}
		if(!empty($this->name_user)){
			if ($first) {
				$campos.=" name_user='".$this->name_user."'";
				$first = false;
			} else {
				$campos.=", name_user='".$this->name_user."'";
			}
			
		}
		
		if(!empty($this->lastname_user)){
			if ($first) {
				$campos.=" lastname_user='".$this->lastname_user."'";
				$first = false;
			} else {
				$campos.=", lastname_user='".$this->lastname_user."'";
			}
			
		}
		
		if(!empty($this->nickname)){
			if ($first) {
				$campos.=" nickname='".$this->nickname."'";
				$first = false;
			} else {
				$campos.=", nickname='".$this->nickname."'";
			}
			
		}
		if(!empty($this->id_zone)){
			if ($first) {
				$campos.=" id_zone=".$this->id_zone;
				$first = false;
			} else {
				$campos.=", id_zone=".$this->id_zone;
			}
			
		}
		
		if(!empty($this->id_country)){
			if ($first) {
				$campos.=" id_country=".$this->id_country;
				$first = false;
			} else {
				$campos.=", id_country=".$this->id_country;
			}
			
		}
		
		if(!empty($this->id_country_live)){
			if ($first) {
				$campos.=" id_country_live=".$this->id_country_live;
				$first = false;
			} else {
				$campos.=", id_country_live=".$this->id_country_live;
			}
			
		}
		
		if(!empty($this->description)){
			if ($first) {
				$campos.=" description='".$this->description."'";
				$first = false;
			} else {
				$campos.=", description='".$this->description."'";
			}
			
		}
		
		if(!empty($this->url_photo)){
			if ($first) {
				$campos.=" url_photo='".$this->url_photo."'";
				$first = false;
			} else {
				$campos.=", url_photo='".$this->url_photo."'";
			}
			
		}
		
		if(!empty($this->phone)){
			if ($first) {
				$campos.=" phone='".$this->phone."'";
				$first = false;
			} else {
				$campos.=", phone='".$this->phone."'";
			}
			
		}
		
		if(!empty($this->whatsapp)){
			if ($first) {
				$campos.=" whatsapp='".$this->whatsapp."'";
				$first = false;
			} else {
				$campos.=", whatsapp='".$this->whatsapp."'";
			}
			
		}

		if(!empty($this->modified)){
			if ($first) {
				$campos.=" modified='".$this->modified."'";
				$first = false;
			} else {
				$campos.=", modified='".$this->modified."'";
			}
			
		}
		if(!empty($this->modified_by)){
			if ($first) {
				$campos.=" modified_by='".$this->modified_by."'";
				$first = false;
			} else {
				$campos.=", modified_by='".$this->modified_by."'";
			}
			
		}
		
		if(!empty($this->date_erased)){
			if ($first) {
				$campos.=" date_erased='".$this->date_erased."'";
				$first = false;
			} else {
				$campos.=", date_erased='".$this->date_erased."'";
			}
			
		}
		
		if(!empty($this->last_login)){
			if ($first) {
				$campos.=" last_login='".$this->last_login."'";
				$first = false;
			} else {
				$campos.=", last_login='".$this->last_login."'";
			}
			
		}
		
		if(!empty($this->who_login)){
			if ($first) {
				$campos.=" who_login='".$this->who_login."'";
				$first = false;
			} else {
				$campos.=", who_login='".$this->who_login."'";
			}
			
		}
		
		if(!empty($this->hash_remember)){
			if ($first) {
				$campos.=" hash_remember='".$this->hash_remember."'";
				$first = false;
			} else {
				$campos.=", hash_remember='".$this->hash_remember."'";
			}
			
		}
		
		if(!empty($this->skype)){
			if ($first) {
				$campos.=" skype='".$this->skype."'";
				$first = false;
			} else {
				$campos.=", skype='".$this->skype."'";
			}
			
		}
                
                if(!empty($this->coach_level)){
			if ($first) {
				$campos.=" coach_level=".$this->coach_level;
				$first = false;
			} else {
				$campos.=", coach_level=".$this->coach_level;
			}
			
		}
		
		if ($first) {
			$campos .= " active=$this->active, is_private=$this->is_private, lingro_student=$this->lingro_student, erased=$this->erased, attempts=$this->attempts,"
					. " blocked=$this->blocked,internal_comment='$this->internal_comment'";
			$first = false;
		} else {
			$campos .= ", active=$this->active, is_private=$this->is_private, lingro_student=$this->lingro_student, erased=$this->erased, attempts=$this->attempts,"
					. " blocked=$this->blocked,internal_comment='$this->internal_comment'";
			
		}
		
		
		return parent::update($campos, $where);
	}
	
	function updateModified() {

	    $where = 'id_user=' . $this->id_user;

	    $campos .= " modified='" . $this->modified . "',modified_by='" . $this->modified_by . "'";


	    return parent::update($campos, $where);
	}

    function updateAttempts(){
		
		$where = 'id_user='.$this->id_user;
		$campos = " attempts=".$this->attempts;
		
		return parent::update($campos, $where);
		
	}
	
	function updateBlocked(){
		
		$where = 'id_user='.$this->id_user;		
		$campos = " blocked=".$this->blocked;
		
		return parent::update($campos, $where);
		
	}
	
	function updateTrainee(){
		
		$where = 'id_user='.$this->id_user;		
		$campos = " coach_trainee=".$this->coach_trainee;
		
		return parent::update($campos, $where);
		
	}
	
	function updateEmailsR(){
		
		$where = 'id_user='.$this->id_user;		
		$campos = " emailsReception=".$this->emailsReception;
		
		return parent::update($campos, $where);
		
	}
        
        function updateEmailsM(){
		
		$where = 'id_user='.$this->id_user;		
		$campos = " emailsMarketing=".$this->emailsMarketing;
		
		return parent::update($campos, $where);
		
	}
	
	function updateFlex(){
		
		$where = 'id_user='.$this->id_user;		
		$campos = " coach_flex=".$this->coach_flex;
		
		return parent::update($campos, $where);
		
	}
	
	function updateFlexAssigned(){
		
		$where = 'id_user='.$this->id_user;		
		$campos = " coach_flex_assigned=".$this->coach_flex_assigned;
		
		return parent::update($campos, $where);
		
	}
	
	function updateLastLogin(){
	    
	    $where = 'id_user='.$this->id_user;		
	    $campos = " last_login='".$this->last_login."'";
		
	    return parent::update($campos, $where);
	}
	
	function updateLingro(){
		
		$where = 'id_user='.$this->id_user;
		$campos = " lingro_student=".$this->lingro_student;
		
		$campos.=", modified='".$this->modified."'";
		
		$campos.=", modified_by='".$this->modified_by."'";

		
		return parent::update($campos, $where);
		
	}
	
	function updateActive(){
		
		$first = true;
		
		$where = 'id_user='.$this->id_user;
		
		if(!empty($this->modified)){
			if ($first) {
				$campos.=" modified='".$this->modified."'";
				$first = false;
			} else {
				$campos.=", modified='".$this->modified."'";
			}
			
		}
		if(!empty($this->modified_by)){
			if ($first) {
				$campos.=" modified_by='".$this->modified_by."'";
				$first = false;
			} else {
				$campos.=", modified_by='".$this->modified_by."'";
			}
			
		}
		
		if ($first) {
			$campos.= " active=".$this->active;
			$first = false;
		} else {
			$campos.= ", active=".$this->active;
			
		}
		
		return parent::update($campos, $where);
		
	}
	
	function updateErased(){
		
		$first = true;
		
		$where = 'id_user='.$this->id_user;
		
		if(!empty($this->modified)){
			if ($first) {
				$campos.=" modified='".$this->modified."'";
				$first = false;
			} else {
				$campos.=", modified='".$this->modified."'";
			}
			
		}
		if(!empty($this->modified_by)){
			if ($first) {
				$campos.=" modified_by='".$this->modified_by."'";
				$first = false;
			} else {
				$campos.=", modified_by='".$this->modified_by."'";
			}
			
		}
		
		if(!empty($this->date_erased)){
			if ($first) {
				$campos.=" date_erased='".$this->date_erased."'";
				$first = false;
			} else {
				$campos.=", date_erased='".$this->date_erased."'";
			}
			
		}
		
		if ($first) {
			$campos.= " erased=".$this->erased.",active=".$this->active;
			$first = false;
		} else {
			$campos.= ", erased=".$this->erased.",active=".$this->active;
			
		}
		
		return parent::update($campos, $where);
		
	}
	
	function updateTimeZone(){
		
		$first = true;
		
		$where = 'id_user='.$this->id_user;
		
		if(!empty($this->modified)){
			if ($first) {
				$campos.=" modified='".$this->modified."'";
				$first = false;
			} else {
				$campos.=", modified='".$this->modified."'";
			}
			
		}
		if(!empty($this->modified_by)){
			if ($first) {
				$campos.=" modified_by='".$this->modified_by."'";
				$first = false;
			} else {
				$campos.=", modified_by='".$this->modified_by."'";
			}
			
		}
		
		if ($first) {
			$campos.= " id_zone=".$this->id_zone;
			$first = false;
		} else {
			$campos.= ", id_zone=".$this->erased;
			
		}
		
		return parent::update($campos, $where);
		
	}
	
	function updatePassword(){
		
		$first = true;
		
		$where = 'id_user='.$this->id_user;
		
		if(!empty($this->modified)){
			if ($first) {
				$campos.=" modified='".$this->modified."'";
				$first = false;
			} else {
				$campos.=", modified='".$this->modified."'";
			}
			
		}
		if(!empty($this->modified_by)){
			if ($first) {
				$campos.=" modified_by='".$this->modified_by."'";
				$first = false;
			} else {
				$campos.=", modified_by='".$this->modified_by."'";
			}
			
		}
		
		if ($first) {
			$campos = " password='".$this->password."'";
			$first = false;
		} else {
			$campos .= ", password='".$this->password."'";
			
		}
		
		
		return parent::update($campos, $where);
		
	}
	
	function updateInternalComment(){
	    
	    $where = 'id_user='.$this->id_user;
	    
	    $campos = " internal_comment='".$this->internal_comment."'";
	    
	    return parent::update($campos, $where);
	    
	}
	
	function updatePagador(){
	    
	    $where = 'id_user='.$this->id_user;
	    
	    $campos = " coach_pagador='".$this->coach_pagador."'";
	    
	    return parent::update($campos, $where);
	}
	
	function getCoach_trainee() {
		return $this->coach_trainee;
	}

	function setCoach_trainee($coach_trainee) {
		$this->coach_trainee = $coach_trainee;
	}

	function getCoach_flex() {
		return $this->coach_flex;
	}

	function setCoach_flex($coach_flex) {
		$this->coach_flex = $coach_flex;
	}
		
	function getId_user() {
		return $this->id_user;
	}

	function getEmail() {
		return $this->email;
	}

	function getPassword() {
		return $this->password;
	}

	function getRol() {
		return $this->rol;
	}

	function getActive() {
		return $this->active;
	}

	function getName_user() {
		return $this->name_user;
	}

	function getLastname_user() {
		return $this->lastname_user;
	}

	function getNickname() {
		return $this->nickname;
	}

	function getId_zone() {
		return $this->id_zone;
	}

	function getId_country() {
		return $this->id_country;
	}

	function getDescription() {
		return $this->description;
	}

	function getUrl_photo() {
		return $this->url_photo;
	}

	function getIs_private() {
		return $this->is_private;
	}

	function getLingro_student() {
		return $this->lingro_student;
	}
	
	function getPhone() {
		return $this->phone;
	}

	function getWhatsapp() {
		return $this->whatsapp;
	}

	
	function getCreated() {
		return $this->created;
	}

	function getCreated_by() {
		return $this->created_by;
	}

	function getModified() {
		return $this->modified;
	}

	function getModified_by() {
		return $this->modified_by;
	}

	function getErased() {
		return $this->erased;
	}

	function getDate_erased() {
		return $this->date_erased;
	}
	
	function getAttempts() {
		return $this->attempts;
	}

	function getBlocked() {
		return $this->blocked;
	}

	
	function setId_user($id_user) {
		$this->id_user = $id_user;
	}

	function setEmail($email) {
		$this->email = $email;
	}

	function setPassword($password) {
		$this->password = $password;
	}

	function setRol($rol) {
		$this->rol = $rol;
	}

	function setActive($active) {
		$this->active = $active;
	}

	function setName_user($name_user) {
		$this->name_user = $name_user;
	}

	function setLastname_user($lastname_user) {
		$this->lastname_user = $lastname_user;
	}

	function setNickname($nickname) {
		$this->nickname = $nickname;
	}

	function setId_zone($id_zone) {
		$this->id_zone = $id_zone;
	}

	function setId_country($id_country) {
		$this->id_country = $id_country;
	}

	function setDescription($description) {
		$this->description = $description;
	}

	function setUrl_photo($url_photo) {
		$this->url_photo = $url_photo;
	}

	function setIs_private($is_private) {
		$this->is_private = $is_private;
	}

	function setLingro_student($lingro_student) {
		$this->lingro_student = $lingro_student;
	}

	function setPhone($phone) {
		$this->phone = $phone;
	}

	function setWhatsapp($whatsapp) {
		$this->whatsapp = $whatsapp;
	}

	function setCreated($created) {
		$this->created = $created;
	}

	function setCreated_by($created_by) {
		$this->created_by = $created_by;
	}

	function setModified($modified) {
		$this->modified = $modified;
	}

	function setModified_by($modified_by) {
		$this->modified_by = $modified_by;
	}

	function setErased($erased) {
		$this->erased = $erased;
	}

	function setDate_erased($date_erased) {
		$this->date_erased = $date_erased;
	}	
	function setAttempts($attempts) {
		$this->attempts = $attempts;
	}

	function setBlocked($blocked) {
		$this->blocked = $blocked;
	}

	function getLast_login() {
		return $this->last_login;
	}

	function getWho_login() {
		return $this->who_login;
	}

	function getHash_remember() {
		return $this->hash_remember;
	}

	function getSkype() {
		return $this->skype;
	}

	function setLast_login($last_login) {
		$this->last_login = $last_login;
	}

	function setWho_login($who_login) {
		$this->who_login = $who_login;
	}

	function setHash_remember($hash_remember) {
		$this->hash_remember = $hash_remember;
	}

	function setSkype($skype) {
		$this->skype = $skype;
	}

	function getId_country_live() {
	    return $this->id_country_live;
	}

	function setId_country_live($id_country_live) {
	    $this->id_country_live = $id_country_live;
	}

	function getEmailsReception() {
	    return $this->emailsReception;
	}

	function setEmailsReception($emailsReception) {
	    $this->emailsReception = $emailsReception;
	}

	function getInternal_comment() {
	    return $this->internal_comment;
	}

	function setInternal_comment($internal_comment) {
	    $this->internal_comment = $internal_comment;
	}


	function getCoach_flex_assigned() {
	    return $this->coach_flex_assigned;
	}

	function setCoach_flex_assigned($coach_flex_assigned) {
	    $this->coach_flex_assigned = $coach_flex_assigned;
	}

	function getCoach_pagador() {
	    return $this->coach_pagador;
	}

	function setCoach_pagador($coach_pagador) {
	    $this->coach_pagador = $coach_pagador;
	}

        function getCoach_level() {
            return $this->coach_level;
        }

        function setCoach_level($coach_level): void {
            $this->coach_level = $coach_level;
        }

        function getEmailsMarketing() {
            return $this->emailsMarketing;
        }

        function setEmailsMarketing($emailsMarketing): void {
            $this->emailsMarketing = $emailsMarketing;
        }

	
}



?>