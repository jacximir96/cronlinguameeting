<?php

/*
 * Developed by wilowi
 */

/**
 * Description of notificationsModel
 *
 * @author Sandra <wilowi.com>
 */
class notificationsModel extends baseModel{

	private $id = 0;
	private $notification_type_id = 0;
	private $notifier_id = 0;
	private $content = '';
	private $extra = '';
	private $notification_at = '';
	private $created_at = '';
	private $updated_at = '';
	private $deleted_at = '';
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('notification');
		
	}
	
	public function select ($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

	public function add($indices = '', $valores = '') {
		
		$first = true;

		if (!empty($this->notification_type_id)) {
            if ($first) {
                $indices .= "notification_type_id";
                $valores .= $this->notification_type_id;
                $first = false;
            } else {
                $indices .= ",notification_type_id";
                $valores .= "," . $this->notification_type_id;
            }
        }

		if (!empty($this->notifier_id)) {
            if ($first) {
                $indices .= "notifier_id";
                $valores .= $this->notifier_id;
                $first = false;
            } else {
                $indices .= ",notifier_id";
                $valores .= "," . $this->notifier_id;
            }
        }

		if (!empty($this->content)) {
			if ($first) {
				$indices .= "content";
				$valores .= "'".$this->content."'";
				$first = false;
			} else {
				$indices .= ",content";
				$valores .= ",'" . $this->content."'";
			}
		}

		if (!empty($this->extra)) {
			if ($first) {
				$indices .= "extra";
				$valores .= "'".$this->extra."'";
				$first = false;
			} else {
				$indices .= ",extra";
				$valores .= ",'" . $this->extra."'";
			}
		}

		if (!empty($this->notification_at)) {
			if ($first) {
				$indices .= "notification_at";
				$valores .= "'".$this->notification_at."'";
				$first = false;
			} else {
				$indices .= ",notification_at";
				$valores .= ",'" . $this->notification_at."'";
			}
		}
		
		if (!empty($this->created_at)) {
			if ($first) {
				$indices .= "created_at";
				$valores .= "'".$this->created_at."'";
				$first = false;
			} else {
				$indices .= ",created_at";
				$valores .= ",'" . $this->created_at."'";
			}
		}

		if (!empty($this->updated_at)) {
			if ($first) {
				$indices .= "updated_at";
				$valores .= "'".$this->updated_at."'";
				$first = false;
			} else {
				$indices .= ",updated_at";
				$valores .= ",'" . $this->updated_at."'";
			}
		}

		if (!empty($this->deleted_at)) {
			if ($first) {
				$indices .= "deleted_at";
				$valores .= "'".$this->deleted_at."'";
				$first = false;
			} else {
				$indices .= ",deleted_at";
				$valores .= ",'" . $this->deleted_at."'";
			}
		}
		
		return parent::add($indices, $valores);
	}
	
	public function update($campos='', $where = '') {
		return parent::update($campos, $where);
	}
	
	/*public function updateErased($campos='', $where = '') {
		
		$where = "id_notification=".$this->id_notification;
		
		$campos = "erased=".$this->erased;
		
		if (!empty($this->date_erased)) {
		    if ($first) {
			$campos .= " date_erased='" . $this->date_erased . "'";
			$first = false;
		    } else {
			$campos .= ", date_erased='" . $this->date_erased . "'";
		    }
		}
		
		return parent::update($campos, $where);
	}*/
	
	/*public function updateErasedAll($campos='', $where = '') {
		
		$where = "dest_user=".$this->dest_user;
		
		$campos = "erased=".$this->erased;
		
		if (!empty($this->date_erased)) {
		    if ($first) {
			$campos .= " date_erased='" . $this->date_erased . "'";
			$first = false;
		    } else {
			$campos .= ", date_erased='" . $this->date_erased . "'";
		    }
		}
		
		return parent::update($campos, $where);
	}*/
	
    /*public function updateRead($campos = '', $where = '') {

		$where = "id_notification=" . $this->id_notification;
		$first = true;

		if ($first) {
			$campos .= " lm_notifications.read='" . $this->read . "'";
			$first = false;
		} else {
			$campos .= ", lm_notifications.read='" . $this->read . "'";
		}

		if (!empty($this->date_read)) {
			if ($first) {
			$campos .= " date_read='" . $this->date_read . "'";
			$first = false;
			} else {
			$campos .= ", date_read='" . $this->date_read . "'";
			}
		}

		return parent::update($campos, $where);
    }*/

    /*public function updateReadAll($campos = '', $where = '') {

		$where = "dest_user=" . $this->dest_user;
		$first = true;

		if ($first) {
			$campos .= " lm_notifications.read='" . $this->read . "'";
			$first = false;
		} else {
			$campos .= ", lm_notifications.read='" . $this->read . "'";
		}

		if (!empty($this->date_read)) {
			if ($first) {
			$campos .= " date_read='" . $this->date_read . "'";
			$first = false;
			} else {
			$campos .= ", date_read='" . $this->date_read . "'";
			}
		}

		return parent::update($campos, $where);
    }*/

    public function delete($where) {
		return parent::delete($where);
	}

	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */ 
	public function setId($id) : void
	{
		$this->id = $id;
	}

	/**
	 * Get the value of notification_type_id
	 */ 
	public function getNotification_type_id()
	{
		return $this->notification_type_id;
	}

	/**
	 * Set the value of notification_type_id
	 *
	 * @return  self
	 */ 
	public function setNotification_type_id($notification_type_id) : void
	{
		$this->notification_type_id = $notification_type_id;
	}

	/**
	 * Get the value of notifier_id
	 */ 
	public function getNotifier_id()
	{
		return $this->notifier_id;
	}

	/**
	 * Set the value of notifier_id
	 *
	 * @return  self
	 */ 
	public function setNotifier_id($notifier_id) : void
	{
		$this->notifier_id = $notifier_id;
	}

	/**
	 * Get the value of content
	 */ 
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * Set the value of content
	 *
	 * @return  self
	 */ 
	public function setContent($content) : void
	{
		$this->content = $content;
	}

	/**
	 * Get the value of extra
	 */ 
	public function getExtra()
	{
		return $this->extra;
	}

	/**
	 * Set the value of extra
	 *
	 * @return  self
	 */ 
	public function setExtra($extra) : void
	{
		$this->extra = $extra;
	}

	/**
	 * Get the value of notification_at
	 */ 
	public function getNotification_at()
	{
		return $this->notification_at;
	}

	/**
	 * Set the value of notification_at
	 *
	 * @return  self
	 */ 
	public function setNotification_at($notification_at) : void
	{
		$this->notification_at = $notification_at;
	}

	/**
	 * Get the value of created_at
	 */ 
	public function getCreated_at()
	{
		return $this->created_at;
	}

	/**
	 * Set the value of created_at
	 *
	 * @return  self
	 */ 
	public function setCreated_at($created_at) : void
	{
		$this->created_at = $created_at;
	}

	/**
	 * Get the value of updated_at
	 */ 
	public function getUpdated_at()
	{
		return $this->updated_at;
	}

	/**
	 * Set the value of updated_at
	 *
	 * @return  self
	 */ 
	public function setUpdated_at($updated_at) : void
	{
		$this->updated_at = $updated_at;
	}

	/**
	 * Get the value of deleted_at
	 */ 
	public function getDeleted_at()
	{
		return $this->deleted_at;
	}

	/**
	 * Set the value of deleted_at
	 *
	 * @return  self
	 */ 
	public function setDeleted_at($deleted_at) : void
	{
		$this->deleted_at = $deleted_at;
	}
}
?>