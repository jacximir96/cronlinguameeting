<?php

/*
 * Developed by wilowi
 */

/**
 * Description of teachersAssistant
 *
 * @author Sandra <wilowi.com>
 */
class teachersAssistantModel extends baseModel{
	
	private $id_teacher = 0;
	private $id_teacher_assistant = 0;

	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_teachers_assistant');
	}

	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

	
	public function add($indices = '', $valores = '') {

		$first = true;		

		if (!empty($this->id_teacher)) {
			if ($first) {
				$indices .= "id_teacher";
				$valores .= $this->id_teacher;
				$first = false;
			} else {
				$indices .= ",id_teacher";
				$valores .= "," . $this->id_teacher;
			}
		}
		
		if (!empty($this->id_teacher_assistant)) {
			if ($first) {
				$indices .= "id_teacher_assistant";
				$valores .= $this->id_teacher_assistant;
				$first = false;
			} else {
				$indices .= ",id_teacher_assistant";
				$valores .= "," . $this->id_teacher_assistant;
			}
		}		

		return parent::add($indices, $valores);
	}
	
	function getId_teacher() {
		return $this->id_teacher;
	}

	function getId_teacher_assistant() {
		return $this->id_teacher_assistant;
	}

	function setId_teacher($id_teacher) {
		$this->id_teacher = $id_teacher;
	}

	function setId_teacher_assistant($id_teacher_assistant) {
		$this->id_teacher_assistant = $id_teacher_assistant;
	}


}

?>