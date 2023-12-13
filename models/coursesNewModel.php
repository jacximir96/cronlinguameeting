<?php

/*
 * Developed by wilowi
 */

/**
 * @author Sandra <wilowi.com>
 */
class coursesNewModel extends baseModel {

    private $id = 0;
    private $service_type_id = 0; 
    private $university_id = 0; 
    private $language_id = 0; 
    private $level_id = 0; 
    private $conversation_package_id = 0;
    private $conversation_guide_id = 0; 
    private $semester_id = 0; 
    private $creator_id = 0; 
    private $experience_type_id = 0; 
    private $year = 0;
    private $start_date = ''; 
    private $end_date = ''; 
    private $name = '';
    private $student_class = 0; 
    private $duration = 0; 
    private $is_flex = 0; 
    private $description = ''; 
    private $internal_comment = ''; 
    private $url_survey = ''; 
    private $is_free = 0; 
    private $is_lingro = 0; 
    private $buy_makeups = 0; 
    private $number_makeups = 0; 
    private $coaches_assigned = 0; 
    private $amount_discount = 0; 
    private $currency_discount = ''; 
    private $color = ''; 
    private $complimentary_makeup = 0; 
    private $is_blocked = 0; 
    private $is_blocked_admin = 0; 
    private $closed_date = ''; 
    private $created_at = ''; 
    private $updated_at = ''; 
    private $deleted_at = '';

    function __construct() {

        parent::__construct();
        parent::setTable('course');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
        return parent::select($where, $as, $select, $join);
    }

    public function add($valores = '', $indices = '') {

        $first = true;

        if (!empty($this->university_id)) {
            if ($first) {
                $indices .= "university_id";
                $valores .= $this->university_id;
                $first = false;
            } else {
                $indices .= ",university_id";
                $valores .= "," . $this->university_id;
            }
        }

        if (!empty($this->language_id)) {
            if ($first) {
                $indices .= "language_id";
                $valores .= $this->language_id;
                $first = false;
            } else {
                $indices .= ",language_id";
                $valores .= "," . $this->language_id;
            }
        }

        if (!empty($this->service_type_id)) {
            if ($first) {
                $indices .= "service_type_id";
                $valores .= $this->service_type_id;
                $first = false;
            } else {
                $indices .= ",service_type_id";
                $valores .= "," . $this->service_type_id;
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


        if (!empty($this->name)) {
            if ($first) {
                $indices .= "name";
                $valores .= "'" . $this->name . "'";
                $first = false;
            } else {
                $indices .= ",name";
                $valores .= ",'" . $this->name . "'";
            }
        }

        if (!empty($this->student_class)) {
            if ($first) {
                $indices .= "student_class";
                $valores .= $this->student_class;
                $first = false;
            } else {
                $indices .= ",student_class";
                $valores .= "," . $this->student_class;
            }
        }


        if (!empty($this->duration)) {
            if ($first) {
                $indices .= "duration";
                $valores .= $this->duration;
                $first = false;
            } else {
                $indices .= ",duration";
                $valores .= "," . $this->duration;
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

        if (!empty($this->start_date)) {
            if ($first) {
                $indices .= "start_date";
                $valores .= "'" . $this->start_date . "'";
                $first = false;
            } else {
                $indices .= ",start_date";
                $valores .= ",'" . $this->start_date . "'";
            }
        }


        if (!empty($this->end_date)) {
            if ($first) {
                $indices .= "end_date";
                $valores .= "'" . $this->end_date . "'";
                $first = false;
            } else {
                $indices .= ",end_date";
                $valores .= ",'" . $this->end_date . "'";
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

        if (!empty($this->currency_discount)) {
            if ($first) {
                $indices .= "currency_discount";
                $valores .= "'" . $this->currency_discount . "'";
                $first = false;
            } else {
                $indices .= ",currency_discount";
                $valores .= ",'" . $this->currency_discount . "'";
            }
        }

        if (!empty($this->is_lingro)) {
            if ($first) {
                $indices .= "is_lingro";
                $valores .= $this->is_lingro;
                $first = false;
            } else {
                $indices .= ",is_lingro";
                $valores .= "," . $this->is_lingro;
            }
        }

        if (!empty($this->is_free)) {
            if ($first) {
                $indices .= "is_free";
                $valores .= $this->is_free;
                $first = false;
            } else {
                $indices .= ",is_free";
                $valores .= "," . $this->is_free;
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

        if (!empty($this->creator_id)) {
            if ($first) {
                $indices .= "creator_id";
                $valores .= $this->creator_id;
                $first = false;
            } else {
                $indices .= ",creator_id";
                $valores .= "," . $this->creator_id;
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

        if (!empty($this->amount_discount)) {
            if ($first) {
                $indices .= "amount_discount";
                $valores .= $this->amount_discount;
                $first = false;
            } else {
                $indices .= ",amount_discount";
                $valores .= "," . $this->amount_discount;
            }
        }

        if (!empty($this->created_at)) {
            if ($first) {
                $indices .= "created_at";
                $valores .= "'" . $this->created_at . "'";
                $first = false;
            } else {
                $indices .= ",created_at";
                $valores .= ",'" . $this->created_at . "'";
            }
        }
        if (!empty($this->deleted_at)) {
            if ($first) {
                $indices .= "deleted_at";
                $valores .= "'" . $this->deleted_at . "'";
                $first = false;
            } else {
                $indices .= ",deleted_at";
                $valores .= ",'" . $this->deleted_at . "'";
            }
        }
        if (!empty($this->updated_at)) {
            if ($first) {
                $indices .= "updated_at";
                $valores .= "'" . $this->updated_at . "'";
                $first = false;
            } else {
                $indices .= ",updated_at";
                $valores .= ",'" . $this->updated_at . "'";
            }
        }
        if (!empty($this->closed_date)) {
            if ($first) {
                $indices .= "closed_date";
                $valores .= "'" . $this->closed_date . "'";
                $first = false;
            } else {
                $indices .= ",closed_date";
                $valores .= ",'" . $this->closed_date . "'";
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

        if (!empty($this->is_flex)) {
            if ($first) {
                $indices .= "is_flex";
                $valores .= $this->is_flex;
                $first = false;
            } else {
                $indices .= ",is_flex";
                $valores .= "," . $this->is_flex;
            }
        }

        if (!empty($this->experience_type_id)) {
            if ($first) {
                $indices .= "experience_type_id";
                $valores .= $this->experience_type_id;
                $first = false;
            } else {
                $indices .= ",experience_type_id";
                $valores .= "," . $this->experience_type_id;
            }
        }

        if (!empty($this->conversation_guide_id)) {
            if ($first) {
                $indices .= "conversation_guide_id";
                $valores .= $this->conversation_guide_id;
                $first = false;
            } else {
                $indices .= ",conversation_guide_id";
                $valores .= "," . $this->conversation_guide_id;
            }
        }

        if (!empty($this->conversation_package_id)) {
            if ($first) {
                $indices .= "conversation_package_id";
                $valores .= $this->conversation_package_id;
                $first = false;
            } else {
                $indices .= ",conversation_package_id";
                $valores .= "," . $this->conversation_package_id;
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
            $indices .= "is_blocked,is_blocked_admin";
            $valores .= $this->is_blocked . "," . $this->is_blocked_admin;
            $first = false;
        } else {
            $indices .= ",is_blocked,is_blocked_admin";
            $valores .= "," . $this->is_blocked . "," . $this->is_blocked_admin;
        }


        return parent::add($indices, $valores);
    }

    public function selectPagination($where = '', $join = '', $order = '', $limit = '', $select = '*') {
        return parent::selectPagination($where, $join, $order, $limit, $select);
    }

    public function update($campos = '', $where = '') {

        $where = 'id=' . $this->id;
        $first = true;

        if (!empty($this->service_type_id)) {
            if ($first) {
                $campos .= " service_type_id=" . $this->service_type_id;
                $first = false;
            } else {
                $campos .= ", service_type_id=" . $this->service_type_id;
            }
        }

        if (!empty($this->university_id)) {
            if ($first) {
                $campos .= " university_id=" . $this->university_id;
                $first = false;
            } else {
                $campos .= ", university_id=" . $this->university_id;
            }
        }

        if (!empty($this->language_id)) {
            if ($first) {
                $campos .= " language_id=" . $this->language_id;
                $first = false;
            } else {
                $campos .= ", language_id=" . $this->language_id;
            }
        }

        if (!empty($this->level_id)) {
            if ($first) {
                $campos .= " level_id=" . $this->level_id;
                $first = false;
            } else {
                $campos .= ", level_id=" . $this->level_id;
            }
        }

        if (!empty($this->conversation_package_id)) {
            if ($first) {
                $campos .= " conversation_package_id=" . $this->conversation_package_id;
                $first = false;
            } else {
                $campos .= ", conversation_package_id=" . $this->conversation_package_id;
            }
        }

        if (!empty($this->conversation_guide_id)) {
            if ($first) {
                $campos .= " conversation_guide_id=" . $this->conversation_guide_id;
                $first = false;
            } else {
                $campos .= ", conversation_guide_id=" . $this->conversation_guide_id;
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

        if (!empty($this->creator_id)) {
            if ($first) {
                $campos .= " creator_id=" . $this->creator_id;
                $first = false;
            } else {
                $campos .= ", creator_id=" . $this->creator_id;
            }
        }

        if (!empty($this->experience_type_id)) {
            if ($first) {
                $campos .= " experience_type_id=" . $this->experience_type_id;
                $first = false;
            } else {
                $campos .= ", experience_type_id=" . $this->experience_type_id;
            }
        }

        if (!empty($this->year)) {
            if ($first) {
                $campos .= " year=" . $this->year;
                $first = false;
            } else {
                $campos .= ", year=" . $this->year;
            }
        }

        if (!empty($this->start_date)) {
            if ($first) {
                $campos .= " start_date='" . $this->start_date . "'";
                $first = false;
            } else {
                $campos .= ", start_date='" . $this->start_date . "'";
            }
        }

        if (!empty($this->end_date)) {
            if ($first) {
                $campos .= " end_date='" . $this->end_date . "'";
                $first = false;
            } else {
                $campos .= ", end_date='" . $this->end_date . "'";
            }
        }

        if (!empty($this->name)) {
            if ($first) {
                $campos .= " name='" . $this->name . "'";
                $first = false;
            } else {
                $campos .= ", name='" . $this->name . "'";
            }
        }

        if (!empty($this->student_class)) {
            if ($first) {
                $campos .= " student_class=" . $this->student_class;
                $first = false;
            } else {
                $campos .= ", student_class=" . $this->student_class;
            }
        }

        if (!empty($this->duration)) {
            if ($first) {
                $campos .= " duration=" . $this->duration;
                $first = false;
            } else {
                $campos .= ", duration=" . $this->duration;
            }
        }

        if (!empty($this->is_flex)) {
            if ($first) {
                $campos .= " is_flex=" . $this->is_flex;
                $first = false;
            } else {
                $campos .= ", is_flex=" . $this->is_flex;
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

        if (!empty($this->internal_comment)) {
            if ($first) {
                $campos .= " internal_comment='" . $this->internal_comment . "'";
                $first = false;
            } else {
                $campos .= ", internal_comment='" . $this->internal_comment . "'";
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

        if (!empty($this->is_free)) {
            if ($first) {
                $campos .= " is_free=" . $this->is_free;
                $first = false;
            } else {
                $campos .= ", is_free=" . $this->is_free;
            }
        }

        if (!empty($this->is_lingro)) {
            if ($first) {
                $campos .= " is_lingro=" . $this->is_lingro;
                $first = false;
            } else {
                $campos .= ", is_lingro=" . $this->is_lingro;
            }
        }

        if (!empty($this->buy_makeups)) {
            if ($first) {
                $campos .= " buy_makeups=" . $this->buy_makeups;
                $first = false;
            } else {
                $campos .= ", buy_makeups=" . $this->buy_makeups;
            }
        }

        if (!empty($this->number_makeups)) {
            if ($first) {
                $campos .= " number_makeups=" . $this->number_makeups;
                $first = false;
            } else {
                $campos .= ", number_makeups=" . $this->number_makeups;
            }
        }

        if (!empty($this->coaches_assigned)) {
            if ($first) {
                $campos .= " coaches_assigned=" . $this->coaches_assigned;
                $first = false;
            } else {
                $campos .= ", coaches_assigned=" . $this->coaches_assigned;
            }
        }

        if (!empty($this->amount_discount)) {
            if ($first) {
                $campos .= " amount_discount=" . $this->amount_discount;
                $first = false;
            } else {
                $campos .= ", amount_discount=" . $this->amount_discount;
            }
        }

        if (!empty($this->currency_discount)) {
            if ($first) {
                $campos .= " currency_discount='" . $this->currency_discount . "'";
                $first = false;
            } else {
                $campos .= ", currency_discount='" . $this->currency_discount . "'";
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

        if (!empty($this->complimentary_makeup)) {
            if ($first) {
                $campos .= " complimentary_makeup=" . $this->complimentary_makeup;
                $first = false;
            } else {
                $campos .= ", complimentary_makeup=" . $this->complimentary_makeup;
            }
        }

        if (!empty($this->is_blocked)) {
            if ($first) {
                $campos .= " is_blocked=" . $this->is_blocked;
                $first = false;
            } else {
                $campos .= ", is_blocked=" . $this->is_blocked;
            }
        }

        if (!empty($this->is_blocked_admin)) {
            if ($first) {
                $campos .= " is_blocked_admin=" . $this->is_blocked_admin;
                $first = false;
            } else {
                $campos .= ", is_blocked_admin=" . $this->is_blocked_admin;
            }
        }

        if (!empty($this->closed_date)) {
            if ($first) {
                $campos .= " closed_date='" . $this->closed_date . "'";
                $first = false;
            } else {
                $campos .= ", closed_date='" . $this->closed_date . "'";
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
     * Get the value of service_type_id
     */ 
    public function getService_type_id()
    {
        return $this->service_type_id;
    }

    /**
     * Set the value of service_type_id
     *
     * @return  self
     */ 
    public function setService_type_id($service_type_id) : void
    {
        $this->service_type_id = $service_type_id;
    }

    /**
     * Get the value of university_id
     */ 
    public function getUniversity_id()
    {
        return $this->university_id;
    }

    /**
     * Set the value of university_id
     *
     * @return  self
     */ 
    public function setUniversity_id($university_id) : void
    {
        $this->university_id = $university_id;
    }

    /**
     * Get the value of language_id
     */ 
    public function getLanguage_id()
    {
        return $this->language_id;
    }

    /**
     * Set the value of language_id
     *
     * @return  self
     */ 
    public function setLanguage_id($language_id) : void
    {
        $this->language_id = $language_id;
    }

    /**
     * Get the value of level_id
     */ 
    public function getLevel_id()
    {
        return $this->level_id;
    }

    /**
     * Set the value of level_id
     *
     * @return  self
     */ 
    public function setLevel_id($level_id) : void
    {
        $this->level_id = $level_id;
    }

    /**
     * Get the value of conversation_package_id
     */ 
    public function getConversation_package_id()
    {
        return $this->conversation_package_id;
    }

    /**
     * Set the value of conversation_package_id
     *
     * @return  self
     */ 
    public function setConversation_package_id($conversation_package_id) : void
    {
        $this->conversation_package_id = $conversation_package_id;
    }

    /**
     * Get the value of conversation_guide_id
     */ 
    public function getConversation_guide_id()
    {
        return $this->conversation_guide_id;
    }

    /**
     * Set the value of conversation_guide_id
     *
     * @return  self
     */ 
    public function setConversation_guide_id($conversation_guide_id) : void
    {
        $this->conversation_guide_id = $conversation_guide_id;
    }

    /**
     * Get the value of semester_id
     */ 
    public function getSemester_id()
    {
        return $this->semester_id;
    }

    /**
     * Set the value of semester_id
     *
     * @return  self
     */ 
    public function setSemester_id($semester_id) : void
    {
        $this->semester_id = $semester_id;
    }

    /**
     * Get the value of creator_id
     */ 
    public function getCreator_id()
    {
        return $this->creator_id;
    }

    /**
     * Set the value of creator_id
     *
     * @return  self
     */ 
    public function setCreator_id($creator_id) : void
    {
        $this->creator_id = $creator_id;
    }

    /**
     * Get the value of experience_type_id
     */ 
    public function getExperience_type_id()
    {
        return $this->experience_type_id;
    }

    /**
     * Set the value of experience_type_id
     *
     * @return  self
     */ 
    public function setExperience_type_id($experience_type_id) : void
    {
        $this->experience_type_id = $experience_type_id;
    }

    /**
     * Get the value of year
     */ 
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */ 
    public function setYear($year) : void
    {
        $this->year = $year;
    }

    /**
     * Get the value of start_date
     */ 
    public function getStart_date()
    {
        return $this->start_date;
    }

    /**
     * Set the value of start_date
     *
     * @return  self
     */ 
    public function setStart_date($start_date) : void
    {
        $this->start_date = $start_date;
    }

    /**
     * Get the value of end_date
     */ 
    public function getEnd_date()
    {
        return $this->end_date;
    }

    /**
     * Set the value of end_date
     *
     * @return  self
     */ 
    public function setEnd_date($end_date) : void
    {
        $this->end_date = $end_date;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name) : void
    {
        $this->name = $name;
    }

    /**
     * Get the value of student_class
     */ 
    public function getStudent_class()
    {
        return $this->student_class;
    }

    /**
     * Set the value of student_class
     *
     * @return  self
     */ 
    public function setStudent_class($student_class) : void
    {
        $this->student_class = $student_class;
    }

    /**
     * Get the value of duration
     */ 
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set the value of duration
     *
     * @return  self
     */ 
    public function setDuration($duration) : void
    {
        $this->duration = $duration;
    }

    /**
     * Get the value of is_flex
     */ 
    public function getIs_flex()
    {
        return $this->is_flex;
    }

    /**
     * Set the value of is_flex
     *
     * @return  self
     */ 
    public function setIs_flex($is_flex) : void
    {
        $this->is_flex = $is_flex;
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
     * Get the value of internal_comment
     */ 
    public function getInternal_comment()
    {
        return $this->internal_comment;
    }

    /**
     * Set the value of internal_comment
     *
     * @return  self
     */ 
    public function setInternal_comment($internal_comment) : void
    {
        $this->internal_comment = $internal_comment;
    }

    /**
     * Get the value of url_survey
     */ 
    public function getUrl_survey()
    {
        return $this->url_survey;
    }

    /**
     * Set the value of url_survey
     *
     * @return  self
     */ 
    public function setUrl_survey($url_survey) : void
    {
        $this->url_survey = $url_survey;
    }

    /**
     * Get the value of is_free
     */ 
    public function getIs_free()
    {
        return $this->is_free;
    }

    /**
     * Set the value of is_free
     *
     * @return  self
     */ 
    public function setIs_free($is_free) : void
    {
        $this->is_free = $is_free;
    }

    /**
     * Get the value of is_lingro
     */ 
    public function getIs_lingro()
    {
        return $this->is_lingro;
    }

    /**
     * Set the value of is_lingro
     *
     * @return  self
     */ 
    public function setIs_lingro($is_lingro) : void
    {
        $this->is_lingro = $is_lingro;
    }

    /**
     * Get the value of buy_makeups
     */ 
    public function getBuy_makeups()
    {
        return $this->buy_makeups;
    }

    /**
     * Set the value of buy_makeups
     *
     * @return  self
     */ 
    public function setBuy_makeups($buy_makeups) : void
    {
        $this->buy_makeups = $buy_makeups;
    }

    /**
     * Get the value of number_makeups
     */ 
    public function getNumber_makeups()
    {
        return $this->number_makeups;
    }

    /**
     * Set the value of number_makeups
     *
     * @return  self
     */ 
    public function setNumber_makeups($number_makeups) : void
    {
        $this->number_makeups = $number_makeups;
    }

    /**
     * Get the value of coaches_assigned
     */ 
    public function getCoaches_assigned()
    {
        return $this->coaches_assigned;
    }

    /**
     * Set the value of coaches_assigned
     *
     * @return  self
     */ 
    public function setCoaches_assigned($coaches_assigned) : void
    {
        $this->coaches_assigned = $coaches_assigned;
    }

    /**
     * Get the value of amount_discount
     */ 
    public function getAmount_discount()
    {
        return $this->amount_discount;
    }

    /**
     * Set the value of amount_discount
     *
     * @return  self
     */ 
    public function setAmount_discount($amount_discount) : void
    {
        $this->amount_discount = $amount_discount;
    }

    /**
     * Get the value of currency_discount
     */ 
    public function getCurrency_discount()
    {
        return $this->currency_discount;
    }

    /**
     * Set the value of currency_discount
     *
     * @return  self
     */ 
    public function setCurrency_discount($currency_discount) : void
    {
        $this->currency_discount = $currency_discount;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color) : void
    {
        $this->color = $color;
    }

    /**
     * Get the value of complimentary_makeup
     */ 
    public function getComplimentary_makeup()
    {
        return $this->complimentary_makeup;
    }

    /**
     * Set the value of complimentary_makeup
     *
     * @return  self
     */ 
    public function setComplimentary_makeup($complimentary_makeup) : void
    {
        $this->complimentary_makeup = $complimentary_makeup;
    }

    /**
     * Get the value of is_blocked
     */ 
    public function getIs_blocked()
    {
        return $this->is_blocked;
    }

    /**
     * Set the value of is_blocked
     *
     * @return  self
     */ 
    public function setIs_blocked($is_blocked) : void
    {
        $this->is_blocked = $is_blocked;
    }

    /**
     * Get the value of is_blocked_admin
     */ 
    public function getIs_blocked_admin()
    {
        return $this->is_blocked_admin;
    }

    /**
     * Set the value of is_blocked_admin
     *
     * @return  self
     */ 
    public function setIs_blocked_admin($is_blocked_admin) : void
    {
        $this->is_blocked_admin = $is_blocked_admin;
    }

    /**
     * Get the value of closed_date
     */ 
    public function getClosed_date()
    {
        return $this->closed_date;
    }

    /**
     * Set the value of closed_date
     *
     * @return  self
     */ 
    public function setClosed_date($closed_date) : void
    {
        $this->closed_date = $closed_date;
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