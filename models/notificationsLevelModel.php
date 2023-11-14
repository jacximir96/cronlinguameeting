<?php

/*
 * Developed by wilowi
 */

/**
 * Description of notificationsLevel
 *
 * @author Sandra <wilowi.com>
 */
class notificationsLevelModel extends baseModel{
	
	private $id_level_notification = 0;
	private $name_level_not = '';
	private $color_level_not = '';
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_notifications_level');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

	function getId_level_notification() {
		return $this->id_level_notification;
	}

	function getName_level_not() {
		return $this->name_level_not;
	}

	function getColor_level_not() {
		return $this->color_level_not;
	}

	function setId_level_notification($id_level_notification) {
		$this->id_level_notification = $id_level_notification;
	}

	function setName_level_not($name_level_not) {
		$this->name_level_not = $name_level_not;
	}

	function setColor_level_not($color_level_not) {
		$this->color_level_not = $color_level_not;
	}


	
}
?>