<?php

/*
 * Developed by wilowi
 */

/**
 * Description of studentsFeedbackModel
 *
 * @author Sandra <wilowi.com>
 */
class studentsFeedbacksModel extends baseModel{

	private $id = 0;
	private $enrollment_session_id = 0;
	private $participation_type_id = 0;
	private $prepared_class_type_id = 0;
	private $puntuality_type_id = 0;
	private $observations = '';
	private $created_at = '';
	private $updated_at = '';
	private $deleted_at = '';

	function __construct() {

		parent::__construct();
		parent::setTable('student_review');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;

		if (!empty($this->enrollment_session_id)) {
			if ($first) {
				$indices .= "enrollment_session_id";
				$values .= $this->enrollment_session_id;
				$first = false;
			} else {
				$indices .= ",enrollment_session_id";
				$values .= "," . $this->enrollment_session_id;
			}
		}

		if (!empty($this->participation_type_id)) {
			if ($first) {
				$indices .= "participation_type_id";
				$values .= $this->participation_type_id;
				$first = false;
			} else {
				$indices .= ",participation_type_id";
				$values .= "," . $this->participation_type_id;
			}
		}
		
		if (!empty($this->prepared_class_type_id)) {
			if ($first) {
				$indices .= "prepared_class_type_id";
				$values .= $this->prepared_class_type_id;
				$first = false;
			} else {
				$indices .= ",prepared_class_type_id";
				$values .= "," . $this->prepared_class_type_id;
			}
		}

		if (!empty($this->puntuality_type_id)) {
			if ($first) {
				$indices .= "puntuality_type_id";
				$values .= $this->puntuality_type_id;
				$first = false;
			} else {
				$indices .= ",puntuality_type_id";
				$values .= "," . $this->puntuality_type_id;
			}
		}
	
		if (!empty($this->observations)) {
			if ($first) {
				$indices .= "observations";
				$values .= "'" . $this->observations . "'";
				$first = false;
			} else {
				$indices .= ",observations";
				$values .= ",'" . $this->observations . "'";
			}
		}

		if (!empty($this->created_at)) {
			if ($first) {
				$indices .= "created_at";
				$values .= "'" . $this->created_at . "'";
				$first = false;
			} else {
				$indices .= ",created_at";
				$values .= ",'" . $this->created_at . "'";
			}
		}

		if (!empty($this->updated_at)) {
			if ($first) {
				$indices .= "updated_at";
				$values .= "'" . $this->updated_at . "'";
				$first = false;
			} else {
				$indices .= ",updated_at";
				$values .= ",'" . $this->updated_at . "'";
			}
		}

		if (!empty($this->deleted_at)) {
			if ($first) {
				$indices .= "deleted_at";
				$values .= "'" . $this->deleted_at . "'";
				$first = false;
			} else {
				$indices .= ",deleted_at";
				$values .= ",'" . $this->deleted_at . "'";
			}
		}

		return parent::add($indices, $values);
	}
	
	
	public function update($campos='', $where='') {
		
		$where = 'id = '.$this->id;
		$first = true;

		if(!empty($this->enrollment_session_id)){
			if ($first) {
				$campos.=" enrollment_session_id=".$this->enrollment_session_id;
				$first = false;
			} else {
				$campos.=", enrollment_session_id=".$this->enrollment_session_id;
			}
		}

		if(!empty($this->participation_type_id)){
			if ($first) {
				$campos.=" participation_type_id=".$this->participation_type_id;
				$first = false;
			} else {
				$campos.=", participation_type_id=".$this->participation_type_id;
			}
		}

		if(!empty($this->prepared_class_type_id)){
			if ($first) {
				$campos.=" prepared_class_type_id=".$this->prepared_class_type_id;
				$first = false;
			} else {
				$campos.=", prepared_class_type_id=".$this->prepared_class_type_id;
			}
		}

		if(!empty($this->puntuality_type_id)){
			if ($first) {
				$campos.=" puntuality_type_id=".$this->puntuality_type_id;
				$first = false;
			} else {
				$campos.=", puntuality_type_id=".$this->puntuality_type_id;
			}
		}

		if(!empty($this->observations)){
			if ($first) {
				$campos.=" observations='".$this->observations."'";
				$first = false;
			} else {
				$campos.=", observations='".$this->observations."'";
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

		if(!empty($this->updated_at)){
			if ($first) {
				$campos.=" updated_at='".$this->updated_at."'";
				$first = false;
			} else {
				$campos.=", updated_at='".$this->updated_at."'";
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

		return parent::update($campos, $where);
	}

    /*public function updateFeedbackStudents($where = '', $campos = '') {

        $where = "id_feedback=".$this->id_feedback." and id_student=".$this->id_student;

        $campos = "id_puntuality=".$this->id_puntuality.", id_prepared=".$this->id_prepared.", id_participation=".$this->id_participation;

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
	 * Get the value of enrollment_session_id
	 */ 
	public function getEnrollment_session_id()
	{
		return $this->enrollment_session_id;
	}

	/**
	 * Set the value of enrollment_session_id
	 *
	 * @return  self
	 */ 
	public function setEnrollment_session_id($enrollment_session_id) : void
	{
		$this->enrollment_session_id = $enrollment_session_id;
	}

	/**
	 * Get the value of participation_type_id
	 */ 
	public function getParticipation_type_id()
	{
		return $this->participation_type_id;
	}

	/**
	 * Set the value of participation_type_id
	 *
	 * @return  self
	 */ 
	public function setParticipation_type_id($participation_type_id) : void
	{
		$this->participation_type_id = $participation_type_id;
	}

	/**
	 * Get the value of prepared_class_type_id
	 */ 
	public function getPrepared_class_type_id()
	{
		return $this->prepared_class_type_id;
	}

	/**
	 * Set the value of prepared_class_type_id
	 *
	 * @return  self
	 */ 
	public function setPrepared_class_type_id($prepared_class_type_id) : void
	{
		$this->prepared_class_type_id = $prepared_class_type_id;
	}

	/**
	 * Get the value of puntuality_type_id
	 */ 
	public function getPuntuality_type_id()
	{
		return $this->puntuality_type_id;
	}

	/**
	 * Set the value of puntuality_type_id
	 *
	 * @return  self
	 */ 
	public function setPuntuality_type_id($puntuality_type_id) : void
	{
		$this->puntuality_type_id = $puntuality_type_id;
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
