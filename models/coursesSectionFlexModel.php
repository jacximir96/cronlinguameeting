<?php

/* 
 * Developed by wilowi
 */

class coursesSectionFlexModel extends baseModel {

	private $id_course_section = 0;
	private $id_course = 0;
	private $name_section = '';
	private $id_teacher = 0;
	private $students_section = 0;
	private $code = '';
	private $see_recording_students = 0;
	private $heritage_section = 0;
	private $code_lingro = '';
	private $make_ups_inst_section = 0;
	private $make_ups_inst_section_used = 0;
	private $is_Flex = 0;
	private $free_section = 0;
        private $inst_coaches = '';
        private $textbook_section = '';

	function __construct() {

		parent::__construct();
		parent::setTable('lm_courses_sections_flex');
	}
	
	public function autoCommit($value = true) {
		parent::autoCommit($value);
	}

	public function commit() {
		parent::commit();
	}

	public function rollBack() {
		parent::rollBack();
	}

	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

	public function add($valores='',$indices='') {

		$first = true;
		$indices = '';
		$valores = '';
		

		if (!empty($this->id_course_section)) {
			if ($first) {
				$indices .= "id_course_section";
				$valores .= $this->id_course_section;
				$first = false;
			} else {
				$indices .= ",id_course_section";
				$valores .= "," . $this->id_course_section;
			}
		}
		
		if (!empty($this->id_course)) {
			if ($first) {
				$indices .= "id_course";
				$valores .= $this->id_course;
				$first = false;
			} else {
				$indices .= ",id_course";
				$valores .= "," . $this->id_course;
			}
		}
		
		if (!empty($this->name_section)) {
			if ($first) {
				$indices .= "name_section";
				$valores .= "'" . $this->name_section . "'";
				$first = false;
			} else {
				$indices .= ",name_section";
				$valores .= ",'" . $this->name_section . "'";
			}
		}
		
		
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
		
		if (!empty($this->students_section)) {
			if ($first) {
				$indices .= "students_section";
				$valores .= $this->students_section;
				$first = false;
			} else {
				$indices .= ",students_section";
				$valores .= "," . $this->students_section;
			}
		}
		
		if (!empty($this->code)) {
			if ($first) {
				$indices .= "code";
				$valores .= "'" . $this->code . "'";
				$first = false;
			} else {
				$indices .= ",code";
				$valores .= ",'" . $this->code . "'";
			}
		}
		
		if (!empty($this->see_recording_students)) {
			if ($first) {
				$indices .= "see_recording_students";
				$valores .= $this->see_recording_students;
				$first = false;
			} else {
				$indices .= ",see_recording_students";
				$valores .= "," . $this->see_recording_students;
			}
		}
		
		if (!empty($this->heritage_section)) {
			if ($first) {
				$indices .= "heritage_section";
				$valores .= $this->heritage_section;
				$first = false;
			} else {
				$indices .= ",heritage_section";
				$valores .= "," . $this->heritage_section;
			}
		}
		
		if (!empty($this->code_lingro)) {
			if ($first) {
				$indices .= "code_lingro";
				$valores .= "'" . $this->code_lingro . "'";
				$first = false;
			} else {
				$indices .= ",code_lingro";
				$valores .= ",'" . $this->code_lingro . "'";
			}
		}
		
		if (!empty($this->make_ups_inst_section)) {
			if ($first) {
				$indices .= "make_ups_inst_section";
				$valores .= $this->make_ups_inst_section;
				$first = false;
			} else {
				$indices .= ",make_ups_inst_section";
				$valores .= "," . $this->make_ups_inst_section;
			}
		}
		
		if (!empty($this->make_ups_inst_section_used)) {
			if ($first) {
				$indices .= "make_ups_inst_section_used";
				$valores .= $this->make_ups_inst_section_used;
				$first = false;
			} else {
				$indices .= ",make_ups_inst_section_used";
				$valores .= "," . $this->make_ups_inst_section_used;
			}
		}
		
		if (!empty($this->is_Flex)) {
			if ($first) {
				$indices .= "is_Flex";
				$valores .= $this->is_Flex;
				$first = false;
			} else {
				$indices .= ",is_Flex";
				$valores .= "," . $this->is_Flex;
			}
		}
		
		
		if (!empty($this->free_section)) {
			if ($first) {
				$indices .= "free_section";
				$valores .= $this->free_section;
				$first = false;
			} else {
				$indices .= ",free_section";
				$valores .= "," . $this->free_section;
			}
		}
                
                if (!empty($this->inst_coaches)) {
			if ($first) {
				$indices .= "inst_coaches";
				$valores .= "'" . $this->inst_coaches . "'";
				$first = false;
			} else {
				$indices .= ",inst_coaches";
				$valores .= ",'" . $this->inst_coaches . "'";
			}
		}
                
                if (!empty($this->textbook_section)) {
			if ($first) {
				$indices .= "textbook_section";
				$valores .= "'" . $this->textbook_section . "'";
				$first = false;
			} else {
				$indices .= ",textbook_section";
				$valores .= ",'" . $this->textbook_section . "'";
			}
		}

		return parent::add($indices, $valores);
	}

	public function update($campos='', $where = '') {
		
		
		$where = 'id_course='.$this->id_course.' AND id_course_section='.$this->id_course_section;
		$first = true;		

		if(!empty($this->name_section)){
			if ($first) {
				$campos.=" name_section='".$this->name_section."'";
				$first = false;
			} else {
				$campos.=", name_section='".$this->name_section."'";
			}
			
		}
		
		if(!empty($this->id_teacher)){
			if ($first) {
				$campos.=" id_teacher=".$this->id_teacher;
				$first = false;
			} else {
				$campos.=", id_teacher=".$this->id_teacher;
			}
			
		}
		
		if(!empty($this->students_section)){
			if ($first) {
				$campos.=" students_section=".$this->students_section;
				$first = false;
			} else {
				$campos.=", students_section=".$this->students_section;
			}
			
		}
		
		if(!empty($this->code)){
			if ($first) {
				$campos.=" code='".$this->code."'";
				$first = false;
			} else {
				$campos.=", code='".$this->code."'";
			}
			
		}
		
		if(!empty($this->code_lingro)){
			if ($first) {
				$campos.=" code_lingro='".$this->code_lingro."'";
				$first = false;
			} else {
				$campos.=", code_lingro='".$this->code_lingro."'";
			}
			
		}
		
		if ($first) {
			$campos .= " heritage_section=$this->heritage_section,is_Flex=$this->is_Flex,free_section=$this->free_section";
			$first = false;
		} else {
			$campos .= ", heritage_section=$this->heritage_section,is_Flex=$this->is_Flex,free_section=$this->free_section";
			
		}
		
		if(!empty($this->make_ups_inst_section)){
			if ($first) {
				$campos.=" make_ups_inst_section=".$this->make_ups_inst_section;
				$first = false;
			} else {
				$campos.=", make_ups_inst_section=".$this->make_ups_inst_section;
			}
			
		}
		
		if(!empty($this->make_ups_inst_section_used)){
			if ($first) {
				$campos.=" make_ups_inst_section_used=".$this->make_ups_inst_section_used;
				$first = false;
			} else {
				$campos.=", make_ups_inst_section_used=".$this->make_ups_inst_section_used;
			}
			
		}
                
                if(!empty($this->textbook_section)){
			if ($first) {
				$campos.=" textbook_section='".$this->textbook_section."'";
				$first = false;
			} else {
				$campos.=", textbook_section='".$this->textbook_section."'";
			}
			
		}
		
		return parent::update($campos, $where);
	}

	public function updateSeeRecording($campos='', $where = '') {		
		
		$where = 'id_course='.$this->id_course.' AND id_course_section='.$this->id_course_section;

		$campos = " see_recording_students=$this->see_recording_students";		
		
		return parent::update($campos, $where);
	}
        
        public function updateInstCoaches() {		
		
		$where = 'id_course='.$this->id_course.' AND id_course_section='.$this->id_course_section;

		$campos = " inst_coaches='$this->inst_coaches'";		
		
		return parent::update($campos, $where);
	}
	
	public function updateMakeUps($campos='',$where=''){
		
		$where = 'id_course_section='.$this->id_course_section;
		
		$campos = " make_ups_inst_section=$this->make_ups_inst_section";		
		
		return parent::update($campos, $where);
		
	}
	
	public function updateMakeUpsUsed($campos='',$where=''){
		
		$where = 'id_course_section='.$this->id_course_section;
		
		$campos = " make_ups_inst_section_used=$this->make_ups_inst_section_used";		
		
		return parent::update($campos, $where);
		
	}
        
        public function updateTextbook() {		
		
		$where = 'id_course='.$this->id_course.' AND id_course_section='.$this->id_course_section;

		$campos = " textbook_section='$this->textbook_section'";		
		
		return parent::update($campos, $where);
	}
	
	public function delete($where) {
		return parent::delete($where);
	}
	
	function getIs_Flex() {
		return $this->is_Flex;
	}

	function setIs_Flex($is_Flex) {
		$this->is_Flex = $is_Flex;
	}

	function getFree_section() {
		return $this->free_section;
	}

	function setFree_section($free_section) {
		$this->free_section = $free_section;
	}

			
	function getMake_ups_inst_section() {
		return $this->make_ups_inst_section;
	}

	function getMake_ups_inst_section_used() {
		return $this->make_ups_inst_section_used;
	}

	function setMake_ups_inst_section($make_ups_inst_section) {
		$this->make_ups_inst_section = $make_ups_inst_section;
	}

	function setMake_ups_inst_section_used($make_ups_inst_section_used) {
		$this->make_ups_inst_section_used = $make_ups_inst_section_used;
	}

		
	function getCode_lingro() {
		return $this->code_lingro;
	}

	function setCode_lingro($code_lingro) {
		$this->code_lingro = $code_lingro;
	}

		
	function getHeritage_section() {
		return $this->heritage_section;
	}

	function setHeritage_section($heritage_section) {
		$this->heritage_section = $heritage_section;
	}

		
	function getSee_recording_students() {
		return $this->see_recording_students;
	}

	function setSee_recording_students($see_recording_students) {
		$this->see_recording_students = $see_recording_students;
	}

		
	function getId_course_section() {
		return $this->id_course_section;
	}

	function getId_course() {
		return $this->id_course;
	}

	function getName_section() {
		return $this->name_section;
	}

	function getId_teacher() {
		return $this->id_teacher;
	}

	function getStudents_section() {
		return $this->students_section;
	}

	function getCode() {
		return $this->code;
	}

	function setId_course_section($id_course_section) {
		$this->id_course_section = $id_course_section;
	}

	function setId_course($id_course) {
		$this->id_course = $id_course;
	}

	function setName_section($name_section) {
		$this->name_section = $name_section;
	}

	function setId_teacher($id_teacher) {
		$this->id_teacher = $id_teacher;
	}

	function setStudents_section($students_section) {
		$this->students_section = $students_section;
	}

	function setCode($code) {
		$this->code = $code;
	}

        function getInst_coaches() {
            return $this->inst_coaches;
        }

        function setInst_coaches($inst_coaches): void {
            $this->inst_coaches = $inst_coaches;
        }

        function getTextbook_section() {
            return $this->textbook_section;
        }

        function setTextbook_section($textbook_section): void {
            $this->textbook_section = $textbook_section;
        }



}

?>