<?php
/* 
 * Developed by wilowi
 */

/**
 * @author Sandra <wilowi.com>
 */
class courseModel extends baseModel {

	private $id_course = 0;
	private $id_university = 0;
	private $id_form = 0;
	private $id_language = 0;
	private $id_type_course = 0;
	private $name_course = '';
	private $students_class = 0;
	private $sessions_rec = 0;
	private $sessions_extra = 0;
	private $onholiday = 0;
	private $duration_course = 0;
	private $alternative_weeks = 0;
	private $description = '';
	private $textbook = '';
	private $intensive_course = 0;
	private $free_course = 0;
	private $code_offer = '';
	private $created = null;
	private $created_by = '';
	private $modified = null;
	private $modified_by = '';
	private $make_ups_inst = 0;
	private $make_ups_inst_used = 0;
	private $url_survey = '';
	private $code_lingro = '';
	private $internal_comment = '';
        private $conversation_guides = 0;

	function __construct() {

		parent::__construct();
		parent::setTable('lm_courses');
	}

	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

	public function add($valores='',$indices='') {

		$first = true;
		
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
		
		if (!empty($this->id_university)) {
			if ($first) {
				$indices .= "id_university";
				$valores .= $this->id_university;
				$first = false;
			} else {
				$indices .= ",id_university";
				$valores .= "," . $this->id_university;
			}
		}
		
		if (!empty($this->id_form)) {
			if ($first) {
				$indices .= "id_form";
				$valores .= $this->id_form;
				$first = false;
			} else {
				$indices .= ",id_form";
				$valores .= "," . $this->id_form;
			}
		}
		
		if (!empty($this->id_type_course)) {
			if ($first) {
				$indices .= "id_type_course";
				$valores .= $this->id_type_course;
				$first = false;
			} else {
				$indices .= ",id_type_course";
				$valores .= "," . $this->id_type_course;
			}
		}
		
		if (!empty($this->id_language)) {
			if ($first) {
				$indices .= "id_language";
				$valores .= $this->id_language;
				$first = false;
			} else {
				$indices .= ",id_language";
				$valores .= "," . $this->id_language;
			}
		}

		if (!empty($this->name_course)) {
			if ($first) {
				$indices .= "name_course";
				$valores .= "'" . $this->name_course . "'";
				$first = false;
			} else {
				$indices .= ",name_course";
				$valores .= ",'" . $this->name_course . "'";
			}
		}
		
		if (!empty($this->students_class)) {
			if ($first) {
				$indices .= "students_class";
				$valores .= $this->students_class;
				$first = false;
			} else {
				$indices .= ",students_class";
				$valores .= "," . $this->students_class;
			}
		}
		
		if (!empty($this->sessions_rec)) {
			if ($first) {
				$indices .= "sessions_rec";
				$valores .= $this->sessions_rec;
				$first = false;
			} else {
				$indices .= ",sessions_rec";
				$valores .= "," . $this->sessions_rec;
			}
		}
		
		if (!empty($this->sessions_extra)) {
			if ($first) {
				$indices .= "sessions_extra";
				$valores .= $this->sessions_extra;
				$first = false;
			} else {
				$indices .= ",sessions_extra";
				$valores .= "," . $this->sessions_extra;
			}
		}
		
		if (!empty($this->duration_course)) {
			if ($first) {
				$indices .= "duration_course";
				$valores .= $this->duration_course;
				$first = false;
			} else {
				$indices .= ",duration_course";
				$valores .= "," . $this->duration_course;
			}
		}
		
		if (!empty($this->alternative_weeks)) {
			if ($first) {
				$indices .= "alternative_weeks";
				$valores .= $this->alternative_weeks;
				$first = false;
			} else {
				$indices .= ",alternative_weeks";
				$valores .= "," . $this->alternative_weeks;
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
		
		if (!empty($this->textbook)) {
			if ($first) {
				$indices .= "textbook";
				$valores .= "'" . $this->textbook . "'";
				$first = false;
			} else {
				$indices .= ",textbook";
				$valores .= ",'" . $this->textbook . "'";
			}
		}
		
		if (!empty($this->code_offer)) {
			if ($first) {
				$indices .= "code_offer";
				$valores .= "'" . $this->code_offer . "'";
				$first = false;
			} else {
				$indices .= ",code_offer";
				$valores .= ",'" . $this->code_offer . "'";
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
		
		if (!empty($this->make_ups_inst)) {
			if ($first) {
				$indices .= "make_ups_inst";
				$valores .= $this->make_ups_inst;
				$first = false;
			} else {
				$indices .= ",make_ups_inst";
				$valores .= "," . $this->make_ups_inst;
			}
		}
		
		if (!empty($this->make_ups_inst_used)) {
			if ($first) {
				$indices .= "make_ups_inst_used";
				$valores .= $this->make_ups_inst_used;
				$first = false;
			} else {
				$indices .= ",make_ups_inst_used";
				$valores .= "," . $this->make_ups_inst_used;
			}
		}
		
		if (!empty($this->url_survey)) {
			if ($first) {
				$indices .= "url_survey";
				$valores .= "'" . $this->url_survey . "'";
				$first = false;
			} else {
				$indices .= ",url_survey";
				$valores .= ",'" . $this->url_survey . "'";
			}
		}
		
		if (!empty($this->code_lingro)) {
			if ($first) {
				$indices .= "code_lingro";
				$valores .= "'" . $this->code_lingro . "'";
				$first = false;
			} else {
				$indices .= ",url_survey";
				$valores .= ",'" . $this->code_lingro . "'";
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
                
                if (!empty($this->conversation_guides)) {
			if ($first) {
				$indices .= "conversation_guides";
				$valores .= $this->conversation_guides;
				$first = false;
			} else {
				$indices .= ",conversation_guides";
				$valores .= "," . $this->conversation_guides;
			}
		}
		
		if ($first) {
			$indices .= "onholiday,intensive_course,free_course";
			$valores .= $this->onholiday.','.$this->intensive_course.','.$this->free_course;
			$first = false;
		} else {
			$indices .= ",onholiday,intensive_course,free_course";
			$valores .= "," . $this->onholiday.','.$this->intensive_course.','.$this->free_course;
		}
		

		return parent::add($indices, $valores);
	}

	public function selectPagination($where = '', $join = '', $order = '', $limit = '', $select='*') {
		return parent::selectPagination($where, $join, $order, $limit,$select);
	}
	

	public function update($campos='', $where = '') {		
		
		$where = 'id_course='.$this->id_course;
		$first = true;		
		
		if(!empty($this->id_university)){
			if ($first) {
				$campos.=" id_university=".$this->id_university;
				$first = false;
			} else {
				$campos.=", id_university=".$this->id_university;
			}
			
		}
		
		if(!empty($this->id_form)){
			if ($first) {
				$campos.=" id_form=".$this->id_form;
				$first = false;
			} else {
				$campos.=", id_form=".$this->id_form;
			}
			
		}
		
		if(!empty($this->id_language)){
			if ($first) {
				$campos.=" id_language=".$this->id_language;
				$first = false;
			} else {
				$campos.=", id_language=".$this->id_language;
			}
			
		}
		
		if(!empty($this->id_type_course)){
			if ($first) {
				$campos.=" id_type_course=".$this->id_type_course;
				$first = false;
			} else {
				$campos.=", id_type_course=".$this->id_type_course;
			}
			
		}
		
		if(!empty($this->name_course)){
			if ($first) {
				$campos.=" name_course='".$this->name_course."'";
				$first = false;
			} else {
				$campos.=", name_course='".$this->name_course."'";
			}
			
		}
		
		if(!empty($this->students_class)){
			if ($first) {
				$campos.=" students_class=".$this->students_class;
				$first = false;
			} else {
				$campos.=", students_class=".$this->students_class;
			}
			
		}
		
		if(!empty($this->duration_course)){
			if ($first) {
				$campos.=" duration_course=".$this->duration_course;
				$first = false;
			} else {
				$campos.=", duration_course=".$this->duration_course;
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
		
		if(!empty($this->textbook)){
			if ($first) {
				$campos.=" textbook='".$this->textbook."'";
				$first = false;
			} else {
				$campos.=", textbook='".$this->textbook."'";
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
		
		if(!empty($this->url_survey)){
			if ($first) {
				$campos.=" url_survey='".$this->url_survey."'";
				$first = false;
			} else {
				$campos.=", url_survey='".$this->url_survey."'";
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
			$campos .= " sessions_rec=$this->sessions_rec, sessions_extra=$this->sessions_extra, onHoliday=$this->onholiday, code_offer='$this->code_offer',"
					. "alternative_weeks=$this->alternative_weeks, intensive_course=$this->intensive_course, free_course=$this->free_course,"
                                . "internal_comment='$this->internal_comment',conversation_guides='$this->conversation_guides'";
			$first = false;
		} else {
			$campos .= ", sessions_rec=$this->sessions_rec, sessions_extra=$this->sessions_extra, onHoliday=$this->onholiday, code_offer='$this->code_offer',"
					. "alternative_weeks=$this->alternative_weeks, intensive_course=$this->intensive_course, free_course=$this->free_course,"
                                . "internal_comment='$this->internal_comment',conversation_guides='$this->conversation_guides'";
			
		}
		
		
		return parent::update($campos, $where);
	}
        
        public function updateStudentsClass(){
            
            $where = 'id_course='.$this->id_course;
            
            $campos =" students_class=".$this->students_class;           
            
            return parent::update($campos, $where);
        }
        
        public function updateConversationGuides(){
            
            $where = 'id_course='.$this->id_course;
            
            $campos = " conversation_guides=$this->conversation_guides";
            $campos.=", textbook='".$this->textbook."'";

            
            return parent::update($campos, $where);
            
        }
	
	public function updateMakeUps($campos='',$where=''){
		
		$where = 'id_course='.$this->id_course;
		
		$campos = " make_ups_inst=$this->make_ups_inst";		
		
		return parent::update($campos, $where);
		
	}
	
	public function updateMakeUpsUsed($campos='',$where=''){
		
		$where = 'id_course='.$this->id_course;
		
		$campos = " make_ups_inst_used=$this->make_ups_inst_used";		
		
		return parent::update($campos, $where);
		
	}
	
	public function updateSurvey($campos='',$where=''){
		
		$where = 'id_course='.$this->id_course;
		
		$campos = " url_survey='$this->url_survey'";		
		
		return parent::update($campos, $where);
		
	}
	
	function updateInternalComment(){
	    
	    $where = 'id_course='.$this->id_course;
	    
	    $campos = " internal_comment='".$this->internal_comment."'";
	    
	    return parent::update($campos, $where);
	    
	}
	
	public function delete($where) {
		return parent::delete($where);
	}
	
	function getCode_lingro() {
		return $this->code_lingro;
	}

	function setCode_lingro($code_lingro) {
		$this->code_lingro = $code_lingro;
	}

		
	function getMake_ups_inst() {
		return $this->make_ups_inst;
	}

	function getMake_ups_inst_used() {
		return $this->make_ups_inst_used;
	}

	function setMake_ups_inst($make_ups_inst) {
		$this->make_ups_inst = $make_ups_inst;
	}

	function setMake_ups_inst_used($make_ups_inst_used) {
		$this->make_ups_inst_used = $make_ups_inst_used;
	}

		
	function getId_course() {
		return $this->id_course;
	}

	function getId_university() {
		return $this->id_university;
	}

	function getId_form() {
		return $this->id_form;
	}

	function getId_language() {
		return $this->id_language;
	}

	function getId_type_course() {
		return $this->id_type_course;
	}

	function getName_course() {
		return $this->name_course;
	}

	function getStudents_class() {
		return $this->students_class;
	}

	function getSessions_rec() {
		return $this->sessions_rec;
	}

	function getSessions_extra() {
		return $this->sessions_extra;
	}

	function getOnholiday() {
		return $this->onholiday;
	}

	function getDuration_course() {
		return $this->duration_course;
	}

	function getAlternative_weeks() {
		return $this->alternative_weeks;
	}

	function getDescription() {
		return $this->description;
	}

	function getTextbook() {
		return $this->textbook;
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
	
	function getIntensive_course() {
		return $this->intensive_course;
	}

	function getFree_course() {
		return $this->free_course;
	}

	function getCode_offer() {
		return $this->code_offer;
	}

	
	function setId_course($id_course) {
		$this->id_course = $id_course;
	}

	function setId_university($id_university) {
		$this->id_university = $id_university;
	}

	function setId_form($id_form) {
		$this->id_form = $id_form;
	}

	function setId_language($id_language) {
		$this->id_language = $id_language;
	}

	function setId_type_course($id_type_course) {
		$this->id_type_course = $id_type_course;
	}

	function setName_course($name_course) {
		$this->name_course = $name_course;
	}

	function setStudents_class($students_class) {
		$this->students_class = $students_class;
	}

	function setSessions_rec($sessions_rec) {
		$this->sessions_rec = $sessions_rec;
	}

	function setSessions_extra($sessions_extra) {
		$this->sessions_extra = $sessions_extra;
	}

	function setOnholiday($onholiday) {
		$this->onholiday = $onholiday;
	}

	function setDuration_course($duration_course) {
		$this->duration_course = $duration_course;
	}

	function setAlternative_weeks($alternative_weeks) {
		$this->alternative_weeks = $alternative_weeks;
	}

	function setDescription($description) {
		$this->description = $description;
	}

	function setTextbook($textbook) {
		$this->textbook = $textbook;
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

	function setIntensive_course($intensive_course) {
		$this->intensive_course = $intensive_course;
	}
	function setFree_course($free_course) {
		$this->free_course = $free_course;
	}

	function setCode_offer($code_offer) {
		$this->code_offer = $code_offer;
	}

	function getUrl_survey() {
		return $this->url_survey;
	}

	function setUrl_survey($url_survey) {
		$this->url_survey = $url_survey;
	}

	function getInternal_comment() {
	    return $this->internal_comment;
	}

	function setInternal_comment($internal_comment) {
	    $this->internal_comment = $internal_comment;
	}
        
        function getConversation_guides() {
            return $this->conversation_guides;
        }

        function setConversation_guides($conversation_guides): void {
            $this->conversation_guides = $conversation_guides;
        }



}

?>