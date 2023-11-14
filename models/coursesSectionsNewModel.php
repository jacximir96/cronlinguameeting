<?php

/* 
 * Developed by wilowi
 */

class coursesSectionsNewModel extends baseModel {

	private $section_id = 0;
	private $course_id = 0;
	private $name_section = '';
	private $id_teacher = 0;
	private $students_section = 0;
	private $code = '';
	private $see_recording_students = 0;
	private $heritage_section = 0;
	private $code_lingro = '';
	private $make_ups_inst_section = 0;
	private $make_ups_inst_section_used = 0;
	private $free_section = 0;
        private $inst_coaches = '';
        private $textbook_section = '';

	function __construct() {

		parent::__construct();
		parent::setTable('lm_courses_sections_new');
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
		

		if (!empty($this->section_id)) {
			if ($first) {
				$indices .= "section_id";
				$valores .= $this->section_id;
				$first = false;
			} else {
				$indices .= ",section_id";
				$valores .= "," . $this->section_id;
			}
		}
		
		if (!empty($this->course_id)) {
			if ($first) {
				$indices .= "course_id";
				$valores .= $this->course_id;
				$first = false;
			} else {
				$indices .= ",course_id";
				$valores .= "," . $this->course_id;
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
		
		
		$where = 'course_id='.$this->course_id.' AND section_id='.$this->section_id;
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
			$campos .= " heritage_section=$this->heritage_section,free_section=$this->free_section,inst_coaches";
			$first = false;
		} else {
			$campos .= ", heritage_section=$this->heritage_section,free_section=$this->free_section";
			
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
		
		$where = 'course_id='.$this->course_id.' AND section_id='.$this->section_id;

		$campos = " see_recording_students=$this->see_recording_students";		
		
		return parent::update($campos, $where);
	}
        
        public function updateInstCoaches() {		
		
		$where = 'course_id='.$this->course_id.' AND section_id='.$this->section_id;

		$campos = " inst_coaches='$this->inst_coaches'";		
		
		return parent::update($campos, $where);
	}
        
        public function updateTextbook() {		
		
		$where = 'course_id='.$this->course_id.' AND section_id='.$this->section_id;

		$campos = " textbook_section='$this->textbook_section'";		
		
		return parent::update($campos, $where);
	}
	
	public function updateMakeUps($campos='',$where=''){
		
		$where = 'section_id='.$this->section_id;
		
		$campos = " make_ups_inst_section=$this->make_ups_inst_section";		
		
		return parent::update($campos, $where);
		
	}
	
	public function updateMakeUpsUsed($campos='',$where=''){
		
		$where = 'section_id='.$this->section_id;
		
		$campos = " make_ups_inst_section_used=$this->make_ups_inst_section_used";		
		
		return parent::update($campos, $where);
		
	}
        
        public function updateTeacher(){
		
		$where = 'section_id='.$this->section_id;
		
		$campos = " id_teacher=$this->id_teacher";		
		
		return parent::update($campos, $where);
		
	}
	
	public function delete($where) {
		return parent::delete($where);
	}
	
	function getSection_id() {
            return $this->section_id;
        }

        function getCourse_id() {
            return $this->course_id;
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

        function getSee_recording_students() {
            return $this->see_recording_students;
        }

        function getHeritage_section() {
            return $this->heritage_section;
        }

        function getCode_lingro() {
            return $this->code_lingro;
        }

        function getMake_ups_inst_section() {
            return $this->make_ups_inst_section;
        }

        function getMake_ups_inst_section_used() {
            return $this->make_ups_inst_section_used;
        }

        function getFree_section() {
            return $this->free_section;
        }

        function getInst_coaches() {
            return $this->inst_coaches;
        }

        function getTextbook_section() {
            return $this->textbook_section;
        }

        function setSection_id($section_id): void {
            $this->section_id = $section_id;
        }

        function setCourse_id($course_id): void {
            $this->course_id = $course_id;
        }

        function setName_section($name_section): void {
            $this->name_section = $name_section;
        }

        function setId_teacher($id_teacher): void {
            $this->id_teacher = $id_teacher;
        }

        function setStudents_section($students_section): void {
            $this->students_section = $students_section;
        }

        function setCode($code): void {
            $this->code = $code;
        }

        function setSee_recording_students($see_recording_students): void {
            $this->see_recording_students = $see_recording_students;
        }

        function setHeritage_section($heritage_section): void {
            $this->heritage_section = $heritage_section;
        }

        function setCode_lingro($code_lingro): void {
            $this->code_lingro = $code_lingro;
        }

        function setMake_ups_inst_section($make_ups_inst_section): void {
            $this->make_ups_inst_section = $make_ups_inst_section;
        }

        function setMake_ups_inst_section_used($make_ups_inst_section_used): void {
            $this->make_ups_inst_section_used = $make_ups_inst_section_used;
        }

        function setFree_section($free_section): void {
            $this->free_section = $free_section;
        }

        function setInst_coaches($inst_coaches): void {
            $this->inst_coaches = $inst_coaches;
        }

        function setTextbook_section($textbook_section): void {
            $this->textbook_section = $textbook_section;
        }




}

?>