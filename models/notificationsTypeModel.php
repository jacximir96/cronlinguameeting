<?php

/*
 * Developed by wilowi
 */

/**
 * Description of notificationsType
 *
 * @author Sandra <wilowi.com>
 */
class notificationsTypeModel extends baseModel{
	
	private $id_type_notification = 0;
	private $id_level_notification = 0;
	private $name_notification = '';
	private $description_notification = '';
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_notifications_type');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

	function getId_type_notification() {
		return $this->id_type_notification;
	}

	function getId_level_notification() {
		return $this->id_level_notification;
	}

	function getName_notification() {
		return $this->name_notification;
	}

	function getDescription_notification() {
		return $this->description_notification;
	}

	function setId_type_notification($id_type_notification) {
		$this->id_type_notification = $id_type_notification;
	}

	function setId_level_notification($id_level_notification) {
		$this->id_level_notification = $id_level_notification;
	}

	function setName_notification($name_notification) {
		$this->name_notification = $name_notification;
	}

	function setDescription_notification($description_notification) {
		$this->description_notification = $description_notification;
	}


	
}
?>