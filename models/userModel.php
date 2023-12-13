<?php

/**
 * Description of enrollmentSessionModel
 *
 * @author Jacximir
 */

class userModel extends baseModel {
	
	private $id;
	private $active = 0;
	private $country_id = 0;
	private $country_live_id = 0;
	private $created_at = '';
	private $deleted_at = '';
	private $email = '';
	private $email_marketing = 0;
	private $email_reception = 0;
	private $email_verified_at = '';
	private $internal_comment = '';
	private $lastname = '';
	private $lingro_student = 0;
	private $locked = 0;
	private $name = '';
	private $nickname = '';
	private $password = '';
	private $phone = '';
	private $remember_token = '';
	private $skype = '';
	private $timezone_id = 0;
	private $updated_at = '';
	private $url_photo = '';
	private $whatsapp = '';
	
	function __construct() {

		parent::__construct();
		parent::setTable('user');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function selectPagination($where = '', $join = '', $order = '', $limit = '', $select='*') {
		return parent::selectPagination($where, $join, $order, $limit, $select);
	}

	public function add($indices='', $valores='') {

		$first = true;

		if (!empty($this->active)) {
			if ($first) {
				$indices .= "active";
				$valores .= $this->active;
				$first = false;
			} else {
				$indices .= ",active";
				$valores .= "," . $this->active;
			}
		}

		if (!empty($this->country_id)) {
			if ($first) {
				$indices .= "country_id";
				$valores .= $this->country_id;
				$first = false;
			} else {
				$indices .= ",country_id";
				$valores .= "," . $this->country_id;
			}
		}

		if (!empty($this->country_live_id)) {
			if ($first) {
				$indices .= "country_live_id";
				$valores .= $this->country_live_id;
				$first = false;
			} else {
				$indices .= ",country_live_id";
				$valores .= "," . $this->country_live_id;
			}
		}

		if (!empty($this->created_at)) {
			if ($first) {
				$indices .= "created_at";
				$valores .= "'" . $this->created_at . "'";
				$first = false;
			} else {
				$indices .= ",created_at";
				$valores .= ",'" . $this->created_at . "'";
			}
		}

		if (!empty($this->deleted_at)) {
			if ($first) {
				$indices .= "deleted_at";
				$valores .= "'" . $this->deleted_at . "'";
				$first = false;
			} else {
				$indices .= ",deleted_at";
				$valores .= ",'" . $this->deleted_at . "'";
			}
		}

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

		if (!empty($this->email_marketing)) {
			if ($first) {
				$indices .= "email_marketing";
				$valores .= $this->email_marketing;
				$first = false;
			} else {
				$indices .= ",email_marketing";
				$valores .= "," . $this->email_marketing;
			}
		}

		if (!empty($this->email_reception)) {
			if ($first) {
				$indices .= "email_reception";
				$valores .= $this->email_reception;
				$first = false;
			} else {
				$indices .= ",email_reception";
				$valores .= "," . $this->email_reception;
			}
		}

		if (!empty($this->email_verified_at)) {
			if ($first) {
				$indices .= "email_verified_at";
				$valores .= "'" . $this->email_verified_at . "'";
				$first = false;
			} else {
				$indices .= ",email_verified_at";
				$valores .= ",'" . $this->email_verified_at . "'";
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

		if (!empty($this->lastname)) {
			if ($first) {
				$indices .= "lastname";
				$valores .= "'" . $this->lastname . "'";
				$first = false;
			} else {
				$indices .= ",lastname";
				$valores .= ",'" . $this->lastname . "'";
			}
		}

		if (!empty($this->lingro_student)) {
			if ($first) {
				$indices .= "lingro_student";
				$valores .= $this->lingro_student;
				$first = false;
			} else {
				$indices .= ",lingro_student";
				$valores .= "," . $this->lingro_student;
			}
		}

		if (!empty($this->locked)) {
			if ($first) {
				$indices .= "locked";
				$valores .= $this->locked;
				$first = false;
			} else {
				$indices .= ",locked";
				$valores .= "," . $this->locked;
			}
		}

		if (!empty($this->name)) {
			if ($first) {
				$indices .= "name";
				$valores .= "'" . $this->name . "'";
				$first = false;
			} else {
				$indices .= ",name";
				$valores .= ",'" . $this->name . "'";
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

		if (!empty($this->remember_token)) {
			if ($first) {
				$indices .= "remember_token";
				$valores .= "'" . $this->remember_token . "'";
				$first = false;
			} else {
				$indices .= ",remember_token";
				$valores .= ",'" . $this->remember_token . "'";
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

		if (!empty($this->timezone_id)) {
			if ($first) {
				$indices .= "timezone_id";
				$valores .= $this->timezone_id;
				$first = false;
			} else {
				$indices .= ",timezone_id";
				$valores .= "," . $this->timezone_id;
			}
		}

		if (!empty($this->updated_at)) {
			if ($first) {
				$indices .= "updated_at";
				$valores .= "'" . $this->updated_at . "'";
				$first = false;
			} else {
				$indices .= ",updated_at";
				$valores .= ",'" . $this->updated_at . "'";
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

		return parent::add($indices, $valores);
	}
	
	public function update($campos='', $where='') {
		
		$where = 'id='.$this->id;
		$first = true;

		if(!empty($this->active)){
			if ($first) {
				$campos.=" active=".$this->active;
				$first = false;
			} else {
				$campos.=", active=".$this->active;
			}
		}

		if(!empty($this->country_id)){
			if ($first) {
				$campos.=" country_id=".$this->country_id;
				$first = false;
			} else {
				$campos.=", country_id=".$this->country_id;
			}
		}

		if(!empty($this->country_live_id)){
			if ($first) {
				$campos.=" country_live_id=".$this->country_live_id;
				$first = false;
			} else {
				$campos.=", country_live_id=".$this->country_live_id;
			}
		}
		
		if(!empty($this->created_at)){
			if ($first) {
				$campos.=" created_at='".$this->created_at."'";
				$first = false;
			} else {
				$campos.=", created_at='".$this->created_at."'";
			}
		}

		if(!empty($this->deleted_at)){
			if ($first) {
				$campos.=" deleted_at='".$this->deleted_at."'";
				$first = false;
			} else {
				$campos.=", deleted_at='".$this->deleted_at."'";
			}
		}

		if(!empty($this->email)){
			if ($first) {
				$campos.=" email='".$this->email."'";
				$first = false;
			} else {
				$campos.=", email='".$this->email."'";
			}
		}

		if(!empty($this->email_marketing)){
			if ($first) {
				$campos.=" email_marketing=".$this->email_marketing;
				$first = false;
			} else {
				$campos.=", email_marketing=".$this->email_marketing;
			}
		}

		if(!empty($this->email_reception)){
			if ($first) {
				$campos.=" email_reception=".$this->email_reception;
				$first = false;
			} else {
				$campos.=", email_reception=".$this->email_reception;
			}
		}

		if(!empty($this->email_verified_at)){
			if ($first) {
				$campos.=" email_verified_at='".$this->email_verified_at."'";
				$first = false;
			} else {
				$campos.=", email_verified_at='".$this->email_verified_at."'";
			}
		}

		if(!empty($this->internal_comment)){
			if ($first) {
				$campos.=" internal_comment='".$this->internal_comment."'";
				$first = false;
			} else {
				$campos.=", internal_comment='".$this->internal_comment."'";
			}
		}

		if(!empty($this->lastname)){
			if ($first) {
				$campos.=" lastname='".$this->lastname."'";
				$first = false;
			} else {
				$campos.=", lastname='".$this->lastname."'";
			}
		}

		if(!empty($this->lingro_student)){
			if ($first) {
				$campos.=" lingro_student=".$this->lingro_student;
				$first = false;
			} else {
				$campos.=", lingro_student=".$this->lingro_student;
			}
		}

		if(!empty($this->locked)){
			if ($first) {
				$campos.=" locked=".$this->locked;
				$first = false;
			} else {
				$campos.=", locked=".$this->locked;
			}
		}

		if(!empty($this->name)){
			if ($first) {
				$campos.=" name='".$this->name."'";
				$first = false;
			} else {
				$campos.=", name='".$this->name."'";
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

		if(!empty($this->password)){
			if ($first) {
				$campos.=" password='".$this->password."'";
				$first = false;
			} else {
				$campos.=", password='".$this->password."'";
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

		if(!empty($this->remember_token)){
			if ($first) {
				$campos.=" remember_token='".$this->remember_token."'";
				$first = false;
			} else {
				$campos.=", remember_token='".$this->remember_token."'";
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

		if(!empty($this->timezone_id)){
			if ($first) {
				$campos.=" timezone_id=".$this->timezone_id;
				$first = false;
			} else {
				$campos.=", timezone_id=".$this->timezone_id;
			}
		}

		if(!empty($this->updated_at)){
			if ($first) {
				$campos.=" updated_at='".$this->updated_at."'";
				$first = false;
			} else {
				$campos.=", updated_at='".$this->updated_at."'";
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

		if(!empty($this->whatsapp)){
			if ($first) {
				$campos.=" whatsapp='".$this->whatsapp."'";
				$first = false;
			} else {
				$campos.=", whatsapp='".$this->whatsapp."'";
			}
		}

		return parent::update($campos, $where);
	}
	
/* 	function updateModified() {

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
	} */

	/**
	 * Get the value of id
	 */ 
	function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */ 
	function setId($id) : void
	{
		$this->id = $id;
	}

	/**
	 * Get the value of active
	 */ 
	function getActive()
	{
		return $this->active;
	}

	/**
	 * Set the value of active
	 *
	 * @return  self
	 */ 
	function setActive($active) : void
	{
		$this->active = $active;
	}

	/**
	 * Get the value of country_id
	 */ 
	function getCountry_id()
	{
		return $this->country_id;
	}

	/**
	 * Set the value of country_id
	 *
	 * @return  self
	 */ 
	function setCountry_id($country_id) : void
	{
		$this->country_id = $country_id;
	}

	/**
	 * Get the value of country_live_id
	 */ 
	function getCountry_live_id()
	{
		return $this->country_live_id;
	}

	/**
	 * Set the value of country_live_id
	 *
	 * @return  self
	 */ 
	function setCountry_live_id($country_live_id) : void
	{
		$this->country_live_id = $country_live_id;
	}

	/**
	 * Get the value of created_at
	 */ 
	function getCreated_at()
	{
		return $this->created_at;
	}

	/**
	 * Set the value of created_at
	 *
	 * @return  self
	 */ 
	function setCreated_at($created_at) : void
	{
		$this->created_at = $created_at;
	}

	/**
	 * Get the value of deleted_at
	 */ 
	function getDeleted_at()
	{
		return $this->deleted_at;
	}

	/**
	 * Set the value of deleted_at
	 *
	 * @return  self
	 */ 
	function setDeleted_at($deleted_at) : void
	{
		$this->deleted_at = $deleted_at;
	}

	/**
	 * Get the value of email
	 */ 
	function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set the value of email
	 *
	 * @return  self
	 */ 
	function setEmail($email) : void
	{
		$this->email = $email;
	}

	/**
	 * Get the value of email_marketing
	 */ 
	function getEmail_marketing()
	{
		return $this->email_marketing;
	}

	/**
	 * Set the value of email_marketing
	 *
	 * @return  self
	 */ 
	function setEmail_marketing($email_marketing) : void
	{
		$this->email_marketing = $email_marketing;
	}

	/**
	 * Get the value of email_reception
	 */ 
	function getEmail_reception()
	{
		return $this->email_reception;
	}

	/**
	 * Set the value of email_reception
	 *
	 * @return  self
	 */ 
	function setEmail_reception($email_reception) : void
	{
		$this->email_reception = $email_reception;
	}

	/**
	 * Get the value of email_verified_at
	 */ 
	function getEmail_verified_at()
	{
		return $this->email_verified_at;
	}

	/**
	 * Set the value of email_verified_at
	 *
	 * @return  self
	 */ 
	function setEmail_verified_at($email_verified_at) : void
	{
		$this->email_verified_at = $email_verified_at;
	}

	/**
	 * Get the value of internal_comment
	 */ 
	function getInternal_comment()
	{
		return $this->internal_comment;
	}

	/**
	 * Set the value of internal_comment
	 *
	 * @return  self
	 */ 
	function setInternal_comment($internal_comment) : void
	{
		$this->internal_comment = $internal_comment;
	}

	/**
	 * Get the value of lastname
	 */ 
	function getLastname()
	{
		return $this->lastname;
	}

	/**
	 * Set the value of lastname
	 *
	 * @return  self
	 */ 
	function setLastname($lastname) : void
	{
		$this->lastname = $lastname;
	}

	/**
	 * Get the value of lingro_student
	 */ 
	function getLingro_student()
	{
		return $this->lingro_student;
	}

	/**
	 * Set the value of lingro_student
	 *
	 * @return  self
	 */ 
	function setLingro_student($lingro_student) : void
	{
		$this->lingro_student = $lingro_student;
	}

	/**
	 * Get the value of locked
	 */ 
	function getLocked()
	{
		return $this->locked;
	}

	/**
	 * Set the value of locked
	 *
	 * @return  self
	 */ 
	function setLocked($locked) : void
	{
		$this->locked = $locked;
	}

	/**
	 * Get the value of name
	 */ 
	function getName()
	{
		return $this->name;
	}

	/**
	 * Set the value of name
	 *
	 * @return  self
	 */ 
	function setName($name) : void
	{
		$this->name = $name;
	}

	/**
	 * Get the value of nickname
	 */ 
	function getNickname()
	{
		return $this->nickname;
	}

	/**
	 * Set the value of nickname
	 *
	 * @return  self
	 */ 
	function setNickname($nickname) : void
	{
		$this->nickname = $nickname;
	}

	/**
	 * Get the value of password
	 */ 
	function getPassword()
	{
		return $this->password;
	}

	/**
	 * Set the value of password
	 *
	 * @return  self
	 */ 
	function setPassword($password) : void
	{
		$this->password = $password;
	}

	/**
	 * Get the value of phone
	 */ 
	function getPhone()
	{
		return $this->phone;
	}

	/**
	 * Set the value of phone
	 *
	 * @return  self
	 */ 
	function setPhone($phone) : void
	{
		$this->phone = $phone;
	}

	/**
	 * Get the value of remember_token
	 */ 
	function getRemember_token()
	{
		return $this->remember_token;
	}

	/**
	 * Set the value of remember_token
	 *
	 * @return  self
	 */ 
	function setRemember_token($remember_token) : void
	{
		$this->remember_token = $remember_token;
	}

	/**
	 * Get the value of skype
	 */ 
	function getSkype()
	{
		return $this->skype;
	}

	/**
	 * Set the value of skype
	 *
	 * @return  self
	 */ 
	function setSkype($skype) : void
	{
		$this->skype = $skype;
	}

	/**
	 * Get the value of timezone_id
	 */ 
	function getTimezone_id()
	{
		return $this->timezone_id;
	}

	/**
	 * Set the value of timezone_id
	 *
	 * @return  self
	 */ 
	function setTimezone_id($timezone_id) : void
	{
		$this->timezone_id = $timezone_id;
	}

	/**
	 * Get the value of updated_at
	 */ 
	function getUpdated_at()
	{
		return $this->updated_at;
	}

	/**
	 * Set the value of updated_at
	 *
	 * @return  self
	 */ 
	function setUpdated_at($updated_at) : void
	{
		$this->updated_at = $updated_at;
	}

	/**
	 * Get the value of url_photo
	 */ 
	function getUrl_photo()
	{
		return $this->url_photo;
	}

	/**
	 * Set the value of url_photo
	 *
	 * @return  self
	 */ 
	function setUrl_photo($url_photo) : void
	{
		$this->url_photo = $url_photo;
	}

	/**
	 * Get the value of whatsapp
	 */ 
	function getWhatsapp()
	{
		return $this->whatsapp;
	}

	/**
	 * Set the value of whatsapp
	 *
	 * @return  self
	 */ 
	function setWhatsapp($whatsapp) : void
	{
		$this->whatsapp = $whatsapp;
	}
}



?>