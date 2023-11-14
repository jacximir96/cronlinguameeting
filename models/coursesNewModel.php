<?php

/*
 * Developed by wilowi
 */

/**
 * @author Sandra <wilowi.com>
 */
class coursesNewModel extends baseModel {

    private $course_id = 0;
    private $id_university = 0;
    private $semester_id = 0;
    private $id_language = 0;
    private $id_type_course = 0;
    private $level_id = 0;
    private $name_course = '';
    private $students_class = 0;
    private $duration_course = 0;
    private $year = 0;
    private $date_ini_course = '';
    private $date_end_course = '';
    private $description = '';
    private $textbook = '';
    private $free_course = 0;
    private $code_offer = '';
    private $url_survey = '';
    private $internal_comment = '';
    private $conversation_guides = 0;
    private $buy_makeups = 0;
    private $number_makeups = 0;
    private $closed = 0;
    private $date_closed = '';
    private $coaches_assigned = 0;
    private $created = null;
    private $created_by = '';
    private $modified = null;
    private $modified_by = '';
    private $days_holiday = '';
    private $discount = 0;
    private $discount_value = '';
    private $color = '';
    private $complimentary_makeup = 0;
    private $blocked = 0;
    private $blocked_admin = 0;

    function __construct() {

        parent::__construct();
        parent::setTable('lm_courses_new');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
        return parent::select($where, $as, $select, $join);
    }

    public function add($valores = '', $indices = '') {

        $first = true;

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

        if (!empty($this->semester_id)) {
            if ($first) {
                $indices .= "semester_id";
                $valores .= $this->semester_id;
                $first = false;
            } else {
                $indices .= ",semester_id";
                $valores .= "," . $this->semester_id;
            }
        }

        if (!empty($this->level_id)) {
            if ($first) {
                $indices .= "level_id";
                $valores .= $this->level_id;
                $first = false;
            } else {
                $indices .= ",level_id";
                $valores .= "," . $this->level_id;
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

        if (!empty($this->year)) {
            if ($first) {
                $indices .= "year";
                $valores .= $this->year;
                $first = false;
            } else {
                $indices .= ",year";
                $valores .= "," . $this->year;
            }
        }

        if (!empty($this->date_ini_course)) {
            if ($first) {
                $indices .= "date_ini_course";
                $valores .= "'" . $this->date_ini_course . "'";
                $first = false;
            } else {
                $indices .= ",date_ini_course";
                $valores .= ",'" . $this->date_ini_course . "'";
            }
        }


        if (!empty($this->date_end_course)) {
            if ($first) {
                $indices .= "date_end_course";
                $valores .= "'" . $this->date_end_course . "'";
                $first = false;
            } else {
                $indices .= ",date_end_course";
                $valores .= ",'" . $this->date_end_course . "'";
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

        if (!empty($this->free_course)) {
            if ($first) {
                $indices .= "free_course";
                $valores .= $this->free_course;
                $first = false;
            } else {
                $indices .= ",free_course";
                $valores .= "," . $this->free_course;
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

        if (!empty($this->buy_makeups)) {
            if ($first) {
                $indices .= "buy_makeups";
                $valores .= $this->buy_makeups;
                $first = false;
            } else {
                $indices .= ",buy_makeups";
                $valores .= "," . $this->buy_makeups;
            }
        }

        if (!empty($this->number_makeups)) {
            if ($first) {
                $indices .= "number_makeups";
                $valores .= $this->number_makeups;
                $first = false;
            } else {
                $indices .= ",number_makeups";
                $valores .= "," . $this->number_makeups;
            }
        }



        if (!empty($this->closed)) {
            if ($first) {
                $indices .= "closed";
                $valores .= $this->closed;
                $first = false;
            } else {
                $indices .= ",closed";
                $valores .= "," . $this->closed;
            }
        }

        if (!empty($this->date_closed)) {
            if ($first) {
                $indices .= "date_closed";
                $valores .= "'" . $this->date_closed . "'";
                $first = false;
            } else {
                $indices .= ",date_closed";
                $valores .= ",'" . $this->date_closed . "'";
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

        if (!empty($this->discount_value)) {
            if ($first) {
                $indices .= "discount_value";
                $valores .= "'" . $this->discount_value . "'";
                $first = false;
            } else {
                $indices .= ",discount_value";
                $valores .= ",'" . $this->discount_value . "'";
            }
        }

        if (!empty($this->days_holiday)) {
            if ($first) {
                $indices .= "days_holiday";
                $valores .= "'" . $this->days_holiday . "'";
                $first = false;
            } else {
                $indices .= ",days_holiday";
                $valores .= ",'" . $this->days_holiday . "'";
            }
        }

        if (!empty($this->discount)) {
            if ($first) {
                $indices .= "discount";
                $valores .= "'" . $this->discount . "'";
                $first = false;
            } else {
                $indices .= ",discount";
                $valores .= ",'" . $this->discount . "'";
            }
        }

        if (!empty($this->color)) {
            if ($first) {
                $indices .= "color";
                $valores .= "'" . $this->color . "'";
                $first = false;
            } else {
                $indices .= ",color";
                $valores .= ",'" . $this->color . "'";
            }
        }

        if ($first) {
            $indices .= "complimentary_makeup";
            $valores .= $this->complimentary_makeup;
            $first = false;
        } else {
            $indices .= ",complimentary_makeup";
            $valores .= "," . $this->complimentary_makeup;
        }
        
        if ($first) {
            $indices .= "blocked,blocked_admin";
            $valores .= $this->blocked . "," . $this->blocked_admin;
            $first = false;
        } else {
            $indices .= ",blocked,blocked_admin";
            $valores .= "," . $this->blocked . "," . $this->blocked_admin;
        }


        return parent::add($indices, $valores);
    }

    public function selectPagination($where = '', $join = '', $order = '', $limit = '', $select = '*') {
        return parent::selectPagination($where, $join, $order, $limit, $select);
    }

    public function update($campos = '', $where = '') {

        $where = 'course_id=' . $this->course_id;
        $first = true;

        if (!empty($this->id_university)) {
            if ($first) {
                $campos .= " id_university=" . $this->id_university;
                $first = false;
            } else {
                $campos .= ", id_university=" . $this->id_university;
            }
        }

        if (!empty($this->id_language)) {
            if ($first) {
                $campos .= " id_language=" . $this->id_language;
                $first = false;
            } else {
                $campos .= ", id_language=" . $this->id_language;
            }
        }

        if (!empty($this->id_type_course)) {
            if ($first) {
                $campos .= " id_type_course=" . $this->id_type_course;
                $first = false;
            } else {
                $campos .= ", id_type_course=" . $this->id_type_course;
            }
        }

        if (!empty($this->semester_id)) {
            if ($first) {
                $campos .= " semester_id=" . $this->semester_id;
                $first = false;
            } else {
                $campos .= ", semester_id=" . $this->semester_id;
            }
        }

        if (!empty($this->name_course)) {
            if ($first) {
                $campos .= " name_course='" . $this->name_course . "'";
                $first = false;
            } else {
                $campos .= ", name_course='" . $this->name_course . "'";
            }
        }

        if (!empty($this->students_class)) {
            if ($first) {
                $campos .= " students_class=" . $this->students_class;
                $first = false;
            } else {
                $campos .= ", students_class=" . $this->students_class;
            }
        }

        if (!empty($this->duration_course)) {
            if ($first) {
                $campos .= " duration_course=" . $this->duration_course;
                $first = false;
            } else {
                $campos .= ", duration_course=" . $this->duration_course;
            }
        }

        if (!empty($this->date_ini_course)) {
            if ($first) {
                $campos .= " date_ini_course='" . $this->date_ini_course . "'";
                $first = false;
            } else {
                $campos .= ", date_ini_course='" . $this->date_ini_course . "'";
            }
        }

        if (!empty($this->date_end_course)) {
            if ($first) {
                $campos .= " date_end_course='" . $this->date_end_course . "'";
                $first = false;
            } else {
                $campos .= ", date_end_course='" . $this->date_end_course . "'";
            }
        } else {
            if ($first) {
                $campos .= " date_end_course=null";
                $first = false;
            } else {
                $campos .= ", date_end_course=null";
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

        if (!empty($this->textbook)) {
            if ($first) {
                $campos .= " textbook='" . $this->textbook . "'";
                $first = false;
            } else {
                $campos .= ", textbook='" . $this->textbook . "'";
            }
        }

        if (!empty($this->modified)) {
            if ($first) {
                $campos .= " modified='" . $this->modified . "'";
                $first = false;
            } else {
                $campos .= ", modified='" . $this->modified . "'";
            }
        }
        if (!empty($this->modified_by)) {
            if ($first) {
                $campos .= " modified_by='" . $this->modified_by . "'";
                $first = false;
            } else {
                $campos .= ", modified_by='" . $this->modified_by . "'";
            }
        }

        if (!empty($this->url_survey)) {
            if ($first) {
                $campos .= " url_survey='" . $this->url_survey . "'";
                $first = false;
            } else {
                $campos .= ", url_survey='" . $this->url_survey . "'";
            }
        }

        if (!empty($this->color)) {
            if ($first) {
                $campos .= " color='" . $this->color . "'";
                $first = false;
            } else {
                $campos .= ", color='" . $this->color . "'";
            }
        }

        if ($first) {
            $campos .= " code_offer='$this->code_offer', year=$this->year, buy_makeups=$this->buy_makeups, free_course=$this->free_course,"
                    . "internal_comment='$this->internal_comment',conversation_guides='$this->conversation_guides',number_makeups=$this->number_makeups,"
                    . "days_holiday='$this->days_holiday',discount=$this->discount,discount_value='$this->discount_value',complimentary_makeup=$this->complimentary_makeup,"
                    . "blocked_admin=$this->blocked_admin";
            $first = false;
        } else {
            $campos .= ",code_offer='$this->code_offer',year=$this->year, buy_makeups=$this->buy_makeups, free_course=$this->free_course,"
                    . "internal_comment='$this->internal_comment',conversation_guides='$this->conversation_guides',number_makeups=$this->number_makeups,"
                    . "days_holiday='$this->days_holiday',discount=$this->discount,discount_value='$this->discount_value',complimentary_makeup=$this->complimentary_makeup,"
                    . "blocked_admin=$this->blocked_admin";
        }


        return parent::update($campos, $where);
    }

    public function updateBuyMakeUps($campos = '', $where = '') {

        $where = 'course_id=' . $this->course_id;

        $campos = " buy_makeups=$this->buy_makeups";

        return parent::update($campos, $where);
    }

    public function updateNumberMakeUps($campos = '', $where = '') {

        $where = 'course_id=' . $this->course_id;

        $campos = " number_makeups=$this->number_makeups";

        return parent::update($campos, $where);
    }

    public function updateSurvey($campos = '', $where = '') {

        $where = 'course_id=' . $this->course_id;

        $campos = " url_survey='$this->url_survey'";

        return parent::update($campos, $where);
    }

    public function updateClosed() {

        $where = 'course_id=' . $this->course_id;

        $campos = " closed=$this->closed,date_closed='$this->date_closed'";

        if (empty($this->closed)) {

            $campos .= ",date_end_course=null";
        }

        return parent::update($campos, $where);
    }

    public function updateBlock($campos = '', $where = '') {

        $where = 'course_id=' . $this->course_id . ' AND id_university=' . $this->id_university;
        $first = true;

        if (!empty($this->modified)) {
            if ($first) {
                $campos .= " modified='" . $this->modified . "'";
                $first = false;
            } else {
                $campos .= ", modified='" . $this->modified . "'";
            }
        }
        if (!empty($this->modified_by)) {
            if ($first) {
                $campos .= " modified_by='" . $this->modified_by . "'";
                $first = false;
            } else {
                $campos .= ", modified_by='" . $this->modified_by . "'";
            }
        }


        if ($first) {
            $campos .= " blocked=$this->blocked";
            $first = false;
        } else {
            $campos .= ", blocked=$this->blocked";
        }

        return parent::update($campos, $where);
    }

    public function updateBlockAdmin($campos = '', $where = '') {

        $where = 'course_id=' . $this->course_id . ' AND id_university=' . $this->id_university;
        $first = true;

        if (!empty($this->modified)) {
            if ($first) {
                $campos .= " modified='" . $this->modified . "'";
                $first = false;
            } else {
                $campos .= ", modified='" . $this->modified . "'";
            }
        }
        if (!empty($this->modified_by)) {
            if ($first) {
                $campos .= " modified_by='" . $this->modified_by . "'";
                $first = false;
            } else {
                $campos .= ", modified_by='" . $this->modified_by . "'";
            }
        }


        if ($first) {
            $campos .= " blocked_admin=$this->blocked_admin";
            $first = false;
        } else {
            $campos .= ", blocked_admin=$this->blocked_admin";
        }

        return parent::update($campos, $where);
    }

    function updateInternalComment() {

        $where = 'course_id=' . $this->course_id;

        $campos = " internal_comment='" . $this->internal_comment . "'";

        return parent::update($campos, $where);
    }

    function updateCoachesAssigned() {

        $where = 'course_id=' . $this->course_id;
        $campos = " coaches_assigned=" . $this->coaches_assigned;

        return parent::update($campos, $where);
    }

    function updateLevel() {

        $where = 'course_id=' . $this->course_id;
        $campos = " level_id=" . $this->level_id;

        return parent::update($campos, $where);
    }

    function updateBuyMakepsNumber() {

        $where = 'course_id=' . $this->course_id;
        $campos = " number_makeups=" . $this->number_makeups;

        return parent::update($campos, $where);
    }

    function blockCourse() {

        $where = 'course_id=' . $this->course_id;
        $campos = " blocked=" . $this->blocked;

        return parent::update($campos, $where);
    }

    function unLockCourse() {

        $where = 'course_id=' . $this->course_id;
        $campos = " blocked=" . $this->blocked;

        return parent::update($campos, $where);
    }

    function updateStudentsClassNumber() {

        $where = 'course_id=' . $this->course_id;
        $campos = " students_class=" . $this->students_class;

        return parent::update($campos, $where);
    }

    public function updateConversationGuides() {

        $where = 'course_id=' . $this->course_id;

        $campos = " conversation_guides=$this->conversation_guides";
        $campos .= ", textbook='" . $this->textbook . "'";


        return parent::update($campos, $where);
    }

    public function delete($where) {
        return parent::delete($where);
    }

    function getCourse_id() {
        return $this->course_id;
    }

    function getId_university() {
        return $this->id_university;
    }

    function getSemester_id() {
        return $this->semester_id;
    }

    function getId_language() {
        return $this->id_language;
    }

    function getId_type_course() {
        return $this->id_type_course;
    }

    function getLevel_id() {
        return $this->level_id;
    }

    function getName_course() {
        return $this->name_course;
    }

    function getStudents_class() {
        return $this->students_class;
    }

    function getDuration_course() {
        return $this->duration_course;
    }

    function getYear() {
        return $this->year;
    }

    function getDate_ini_course() {
        return $this->date_ini_course;
    }

    function getDate_end_course() {
        return $this->date_end_course;
    }

    function getDescription() {
        return $this->description;
    }

    function getTextbook() {
        return $this->textbook;
    }

    function getFree_course() {
        return $this->free_course;
    }

    function getCode_offer() {
        return $this->code_offer;
    }

    function getUrl_survey() {
        return $this->url_survey;
    }

    function getInternal_comment() {
        return $this->internal_comment;
    }

    function getConversation_guides() {
        return $this->conversation_guides;
    }

    function getBuy_makeups() {
        return $this->buy_makeups;
    }

    function getNumber_makeups() {
        return $this->number_makeups;
    }

    function getClosed() {
        return $this->closed;
    }

    function getDate_closed() {
        return $this->date_closed;
    }

    function getCoaches_assigned() {
        return $this->coaches_assigned;
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

    function setCourse_id($course_id): void {
        $this->course_id = $course_id;
    }

    function setId_university($id_university): void {
        $this->id_university = $id_university;
    }

    function setSemester_id($semester_id): void {
        $this->semester_id = $semester_id;
    }

    function setId_language($id_language): void {
        $this->id_language = $id_language;
    }

    function setId_type_course($id_type_course): void {
        $this->id_type_course = $id_type_course;
    }

    function setLevel_id($level_id): void {
        $this->level_id = $level_id;
    }

    function setName_course($name_course): void {
        $this->name_course = $name_course;
    }

    function setStudents_class($students_class): void {
        $this->students_class = $students_class;
    }

    function setDuration_course($duration_course): void {
        $this->duration_course = $duration_course;
    }

    function setYear($year): void {
        $this->year = $year;
    }

    function setDate_ini_course($date_ini_course): void {
        $this->date_ini_course = $date_ini_course;
    }

    function setDate_end_course($date_end_course): void {
        $this->date_end_course = $date_end_course;
    }

    function setDescription($description): void {
        $this->description = $description;
    }

    function setTextbook($textbook): void {
        $this->textbook = $textbook;
    }

    function setFree_course($free_course): void {
        $this->free_course = $free_course;
    }

    function setCode_offer($code_offer): void {
        $this->code_offer = $code_offer;
    }

    function setUrl_survey($url_survey): void {
        $this->url_survey = $url_survey;
    }

    function setInternal_comment($internal_comment): void {
        $this->internal_comment = $internal_comment;
    }

    function setConversation_guides($conversation_guides): void {
        $this->conversation_guides = $conversation_guides;
    }

    function setBuy_makeups($buy_makeups): void {
        $this->buy_makeups = $buy_makeups;
    }

    function setNumber_makeups($number_makeups): void {
        $this->number_makeups = $number_makeups;
    }

    function setClosed($closed): void {
        $this->closed = $closed;
    }

    function setDate_closed($date_closed): void {
        $this->date_closed = $date_closed;
    }

    function setCoaches_assigned($coaches_assigned): void {
        $this->coaches_assigned = $coaches_assigned;
    }

    function setCreated($created): void {
        $this->created = $created;
    }

    function setCreated_by($created_by): void {
        $this->created_by = $created_by;
    }

    function setModified($modified): void {
        $this->modified = $modified;
    }

    function setModified_by($modified_by): void {
        $this->modified_by = $modified_by;
    }

    function getDays_holiday() {
        return $this->days_holiday;
    }

    function getDiscount() {
        return $this->discount;
    }

    function getDiscount_value() {
        return $this->discount_value;
    }

    function setDays_holiday($days_holiday): void {
        $this->days_holiday = $days_holiday;
    }

    function setDiscount($discount): void {
        $this->discount = $discount;
    }

    function setDiscount_value($discount_value): void {
        $this->discount_value = $discount_value;
    }

    function getColor() {
        return $this->color;
    }

    function setColor($color): void {
        $this->color = $color;
    }
    
    function getComplimentary_makeup() {
        return $this->complimentary_makeup;
    }

    function setComplimentary_makeup($complimentary_makeup): void {
        $this->complimentary_makeup = $complimentary_makeup;
    }

    function getBlocked() {
        return $this->blocked;
    }

    function getBlocked_admin() {
        return $this->blocked_admin;
    }

    function setBlocked($blocked): void {
        $this->blocked = $blocked;
    }

    function setBlocked_admin($blocked_admin): void {
        $this->blocked_admin = $blocked_admin;
    }



}

?>