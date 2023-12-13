<?php

/* 
 * Developed by wilowi
 */

class configModel extends baseModel{

	private $id = 0;
	private $surveyable_type = '';
	private $surveyable_id = 0;
	private $description = '';
	private $active = 0;
	private $url = '';
	private $observations = '';
	private $created_at = '';
	private $updated_at = '';
	private $deleted_at = '';
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('survey');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	
	public function add($indices = '', $valores = '') {

		$first = true;

		if (!empty($this->surveyable_type)) {
			if ($first) {
				$indices .= "surveyable_type";
				$valores .= "'".$this->surveyable_type."'";
				$first = false;
			} else {
				$indices .= ",surveyable_type";
				$valores .= ",'" . $this->surveyable_type."'";
			}
		}

		if (!empty($this->surveyable_id)) {
            if ($first) {
                $indices .= "surveyable_id";
                $valores .= $this->surveyable_id;
                $first = false;
            } else {
                $indices .= ",surveyable_id";
                $valores .= "," . $this->surveyable_id;
            }
        }

		if (!empty($this->description)) {
			if ($first) {
				$indices .= "description";
				$valores .= "'".$this->description."'";
				$first = false;
			} else {
				$indices .= ",description";
				$valores .= ",'" . $this->description."'";
			}
		}

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

		if (!empty($this->url)) {
			if ($first) {
				$indices .= "url";
				$valores .= "'".$this->url."'";
				$first = false;
			} else {
				$indices .= ",url";
				$valores .= ",'" . $this->url."'";
			}
		}

		if (!empty($this->observations)) {
			if ($first) {
				$indices .= "observations";
				$valores .= "'".$this->observations."'";
				$first = false;
			} else {
				$indices .= ",observations";
				$valores .= ",'" . $this->observations."'";
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
		
        $where = 'id=' . $this->id;
        $first = true;

		if (!empty($this->surveyable_type)) {
            if ($first) {
                $campos .= " surveyable_type='" . $this->surveyable_type . "'";
                $first = false;
            } else {
                $campos .= ", surveyable_type='" . $this->surveyable_type . "'";
            }
        }

		if (!empty($this->surveyable_id)) {
            if ($first) {
                $campos .= " surveyable_id=" . $this->surveyable_id;
                $first = false;
            } else {
                $campos .= ", surveyable_id=" . $this->surveyable_id;
            }
        }

		if (!empty($this->description)) {
            if ($first) {
                $campos .= " description='" . $this->description . "'";
                $first = false;
            } else {
                $campos .= ", description='" . $this->description . "'";
            }
        }

		if (!empty($this->active)) {
            if ($first) {
                $campos .= " active=" . $this->active;
                $first = false;
            } else {
                $campos .= ", active=" . $this->active;
            }
        }

		if (!empty($this->url)) {
            if ($first) {
                $campos .= " url='" . $this->url . "'";
                $first = false;
            } else {
                $campos .= ", url='" . $this->url . "'";
            }
        }

		if (!empty($this->observations)) {
            if ($first) {
                $campos .= " observations='" . $this->observations . "'";
                $first = false;
            } else {
                $campos .= ", observations='" . $this->observations . "'";
            }
        }

		if (!empty($this->created_at)) {
            if ($first) {
                $campos .= " created_at='" . $this->created_at . "'";
                $first = false;
            } else {
                $campos .= ", created_at='" . $this->created_at . "'";
            }
        }

		if (!empty($this->updated_at)) {
            if ($first) {
                $campos .= " updated_at='" . $this->updated_at . "'";
                $first = false;
            } else {
                $campos .= ", updated_at='" . $this->updated_at . "'";
            }
        }

		if (!empty($this->deleted_at)) {
            if ($first) {
                $campos .= " deleted_at='" . $this->deleted_at . "'";
                $first = false;
            } else {
                $campos .= ", deleted_at='" . $this->deleted_at . "'";
            }
        }
		
		return parent::update($campos, $where);
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
	 * Get the value of surveyable_type
	 */ 
	public function getSurveyable_type()
	{
		return $this->surveyable_type;
	}

	/**
	 * Set the value of surveyable_type
	 *
	 * @return  self
	 */ 
	public function setSurveyable_type($surveyable_type) : void
	{
		$this->surveyable_type = $surveyable_type;
	}

	/**
	 * Get the value of surveyable_id
	 */ 
	public function getSurveyable_id()
	{
		return $this->surveyable_id;
	}

	/**
	 * Set the value of surveyable_id
	 *
	 * @return  self
	 */ 
	public function setSurveyable_id($surveyable_id) : void
	{
		$this->surveyable_id = $surveyable_id;
	}

	/**
	 * Get the value of description
	 */ 
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Set the value of description
	 *
	 * @return  self
	 */ 
	public function setDescription($description) : void
	{
		$this->description = $description;
	}

	/**
	 * Get the value of active
	 */ 
	public function getActive()
	{
		return $this->active;
	}

	/**
	 * Set the value of active
	 *
	 * @return  self
	 */ 
	public function setActive($active) : void
	{
		$this->active = $active;
	}

	/**
	 * Get the value of url
	 */ 
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * Set the value of url
	 *
	 * @return  self
	 */ 
	public function setUrl($url) : void
	{
		$this->url = $url;
	}

	/**
	 * Get the value of observations
	 */ 
	public function getObservations()
	{
		return $this->observations;
	}

	/**
	 * Set the value of observations
	 *
	 * @return  self
	 */ 
	public function setObservations($observations) : void
	{
		$this->observations = $observations;
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