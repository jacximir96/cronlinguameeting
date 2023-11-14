<?php

/*
 * Developed by wilowi
 */

/**
 * Description of courseDocumentationModel
 *
 * @author Sandra <wilowi.com>
 */
class courseFlexDocumentationModel extends baseModel {

    private $id_documentation = 0;
    private $id_section = 0;
    private $id_chapter = 0;
    private $syllabus = '';
    private $assignment = '';
    private $extra_doc = '';
    private $guidelines = '';
    private $share_only_coaches = 0;
    private $id_guide = 0;
    private $ids_chapters = '';
    private $instructions_coaches = '';

    function __construct() {

	parent::__construct();
	parent::setTable('lm_course_flex_documentation');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
	return parent::select($where, $as, $select, $join);
    }

    public function add($indices = '', $values = '') {

	$first = true;

	if (!empty($this->id_section)) {
	    if ($first) {
		$indices .= "id_section";
		$values .= $this->id_section;
		$first = false;
	    } else {
		$indices .= ",id_section";
		$values .= "," . $this->id_section;
	    }
	}

	if (!empty($this->id_chapter)) {
	    if ($first) {
		$indices .= "id_chapter";
		$values .= $this->id_chapter;
		$first = false;
	    } else {
		$indices .= ",id_chapter";
		$values .= "," . $this->id_chapter;
	    }
	}

	if (!empty($this->syllabus)) {
	    if ($first) {
		$indices .= "syllabus";
		$values .= "'" . $this->syllabus . "'";
		$first = false;
	    } else {
		$indices .= ",syllabus";
		$values .= ",'" . $this->syllabus . "'";
	    }
	}

	if (!empty($this->assignment)) {
	    if ($first) {
		$indices .= "assignment";
		$values .= "'" . $this->assignment . "'";
		$first = false;
	    } else {
		$indices .= ",assignment";
		$values .= ",'" . $this->assignment . "'";
	    }
	}

	if (!empty($this->extra_doc)) {
	    if ($first) {
		$indices .= "extra_doc";
		$values .= "'" . $this->extra_doc . "'";
		$first = false;
	    } else {
		$indices .= ",extra_doc";
		$values .= ",'" . $this->extra_doc . "'";
	    }
	}

	if (!empty($this->guidelines)) {
	    if ($first) {
		$indices .= "guidelines";
		$values .= "'" . $this->guidelines . "'";
		$first = false;
	    } else {
		$indices .= ",guidelines";
		$values .= ",'" . $this->guidelines . "'";
	    }
	}

	if ($first) {
	    $indices .= "share_only_coaches";
	    $values .= $this->share_only_coaches;
	    $first = false;
	} else {
	    $indices .= ",share_only_coaches";
	    $values .= "," . $this->share_only_coaches;
	}

        if (!empty($this->id_guide)) {
	    if ($first) {
		$indices .= "id_guide";
		$values .= "'" . $this->id_guide . "'";
		$first = false;
	    } else {
		$indices .= ",id_guide";
		$values .= ",'" . $this->id_guide . "'";
	    }
	}
        
        if (!empty($this->ids_chapters)) {
	    if ($first) {
		$indices .= "ids_chapters";
		$values .= "'" . $this->ids_chapters . "'";
		$first = false;
	    } else {
		$indices .= ",ids_chapters";
		$values .= ",'" . $this->ids_chapters . "'";
	    }
	}
        
        if (!empty($this->instructions_coaches)) {
	    if ($first) {
		$indices .= "instructions_coaches";
		$values .= "'" . $this->instructions_coaches . "'";
		$first = false;
	    } else {
		$indices .= ",instructions_coaches";
		$values .= ",'" . $this->instructions_coaches . "'";
	    }
	}

	return parent::add($indices, $values);
    }

    public function delete($where) {
	return parent::delete($where);
    }

    public function update($campos = '', $where = '') {


	$where = 'id_section=' . $this->id_section . ' AND id_chapter=' . $this->id_chapter;
	$first = true;


	if (!empty($this->syllabus)) {
	    if ($first) {
		$campos .= " syllabus='" . $this->syllabus . "'";
		$first = false;
	    } else {
		$campos .= ", syllabus='" . $this->syllabus . "'";
	    }
	}

	if (!empty($this->assignment)) {
	    if ($first) {
		$campos .= " assignment='" . $this->assignment . "'";
		$first = false;
	    } else {
		$campos .= ", assignment='" . $this->assignment . "'";
	    }
	}

	if (!empty($this->extra_doc)) {
	    if ($first) {
		$campos .= " extra_doc='" . $this->extra_doc . "'";
		$first = false;
	    } else {
		$campos .= ", extra_doc='" . $this->extra_doc . "'";
	    }
	}

	if (!empty($this->guidelines)) {
	    if ($first) {
		$campos .= " guidelines='" . $this->guidelines . "'";
		$first = false;
	    } else {
		$campos .= ", guidelines='" . $this->guidelines . "'";
	    }
	}
        
        //if (!empty($this->ids_chapters)) {
	    if ($first) {
		$campos .= " ids_chapters='" . $this->ids_chapters . "'";
		$first = false;
	    } else {
		$campos .= ", ids_chapters='" . $this->ids_chapters . "'";
	    }
	//}
        
        if (!empty($this->instructions_coaches)) {
	    if ($first) {
		$campos .= " instructions_coaches='" . $this->instructions_coaches . "'";
		$first = false;
	    } else {
		$campos .= ", instructions_coaches='" . $this->instructions_coaches . "'";
	    }
	}
        
        if (!empty($this->id_guide)) {
	    if ($first) {
		$campos .= " id_guide='" . $this->id_guide."'";
		$first = false;
	    } else {
		$campos .= ", id_guide='" . $this->id_guide."'";
	    }
	}
	
	if ($first) {
	    $campos .= " share_only_coaches=" . $this->share_only_coaches;
	    $first = false;
	} else {
	    $campos .= ", share_only_coaches=" . $this->share_only_coaches;
	}

	return parent::update($campos, $where);
    }
    
    public function deleteSyllabus(){
	
	$where = 'id_documentation=' . $this->id_documentation;
	
	$campos = " syllabus=null";
	
	return parent::update($campos, $where);
	
    }
    
    public function deleteAssignment(){
	
	$where = 'id_documentation=' . $this->id_documentation;
	
	$campos = " assignment=null";
	
	return parent::update($campos, $where);
	
    }
    
    public function deleteGuidelines(){
	
	$where = 'id_documentation=' . $this->id_documentation;
	
	$campos = " guidelines=null";
	
	return parent::update($campos, $where);
	
    }
    
    public function deleteMoreInfo(){
	
	$where = 'id_documentation=' . $this->id_documentation;
	
	$campos = " extra_doc=null";
	
	return parent::update($campos, $where);
	
    }

    function getId_documentation() {
	return $this->id_documentation;
    }

    function getId_section() {
	return $this->id_section;
    }

    function getId_chapter() {
	return $this->id_chapter;
    }

    function getSyllabus() {
	return $this->syllabus;
    }

    function getAssignment() {
	return $this->assignment;
    }

    function setId_documentation($id_documentation) {
	$this->id_documentation = $id_documentation;
    }

    function setId_section($id_section) {
	$this->id_section = $id_section;
    }

    function setId_chapter($id_chapter) {
	$this->id_chapter = $id_chapter;
    }

    function setSyllabus($syllabus) {
	$this->syllabus = $syllabus;
    }

    function setAssignment($assignment) {
	$this->assignment = $assignment;
    }

    function getExtra_doc() {
	return $this->extra_doc;
    }

    function getGuidelines() {
	return $this->guidelines;
    }

    function setExtra_doc($extra_doc) {
	$this->extra_doc = $extra_doc;
    }

    function setGuidelines($guidelines) {
	$this->guidelines = $guidelines;
    }
    
    function getShare_only_coaches() {
	return $this->share_only_coaches;
    }

    function setShare_only_coaches($share_only_coaches) {
	$this->share_only_coaches = $share_only_coaches;
    }

    function getId_guide() {
        return $this->id_guide;
    }

    function getIds_chapters() {
        return $this->ids_chapters;
    }

    function getInstructions_coaches() {
        return $this->instructions_coaches;
    }

    function setId_guide($id_guide): void {
        $this->id_guide = $id_guide;
    }

    function setIds_chapters($ids_chapters): void {
        $this->ids_chapters = $ids_chapters;
    }

    function setInstructions_coaches($instructions_coaches): void {
        $this->instructions_coaches = $instructions_coaches;
    }

    

}
