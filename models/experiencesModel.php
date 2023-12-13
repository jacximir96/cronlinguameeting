<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of experiencesModel
 *
 * @author Sandra
 */
class experiencesModel extends baseModel {

    //put your code here
    private $id = 0;
    private $coach_id = 0;
    private $language_id = 0;
    private $code_offer_type_id = 0;
    private $title = '';
    private $description = '';
    private $start = '';
    private $end = '';
    private $coach_name = '';
    private $coach_lastname = '';
    private $url_join = '';
    private $url_host = '';
    private $is_public = 0;
    private $is_paid_public = 0;
    private $is_donate_public = 0;
    private $is_private = 0;
    private $is_paid_private = 0;
    private $is_donate_private = 0;
    private $max_students = 0;
    private $amount_price = 0;
    private $currency_price = '';
    private $zoom_video = '';
    private $meeting_id = '';
    private $created_at = '';
    private $updated_at = '';
    private $deleted_at = '';

    function __construct() {

        parent::__construct();
        parent::setTable('experience');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
        return parent::select($where, $as, $select, $join);
    }

    public function delete($where) {
        return parent::delete($where);
    }

    public function add($indices = '', $valores = '') {

        $first = true;

        if (!empty($this->coach_id)) {
            if ($first) {
                $indices .= "coach_id";
                $valores .= $this->coach_id;
                $first = false;
            } else {
                $indices .= ",coach_id";
                $valores .= "," . $this->coach_id;
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

        if (!empty($this->code_offer_type_id)) {
            if ($first) {
                $indices .= "code_offer_type_id";
                $valores .= $this->code_offer_type_id;
                $first = false;
            } else {
                $indices .= ",code_offer_type_id";
                $valores .= "," . $this->code_offer_type_id;
            }
        }

        if (!empty($this->title)) {
            if ($first) {
                $indices .= "title";
                $valores .= "'" . $this->title . "'";
                $first = false;
            } else {
                $indices .= ",title";
                $valores .= ",'" . $this->title . "'";
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

        if (!empty($this->start)) {
            if ($first) {
                $indices .= "start";
                $valores .= "'" . $this->start . "'";
                $first = false;
            } else {
                $indices .= ",start";
                $valores .= ",'" . $this->start . "'";
            }
        }

        if (!empty($this->end)) {
            if ($first) {
                $indices .= "end";
                $valores .= "'" . $this->end . "'";
                $first = false;
            } else {
                $indices .= ",end";
                $valores .= ",'" . $this->end . "'";
            }
        }

        if (!empty($this->coach_name)) {
            if ($first) {
                $indices .= "coach_name";
                $valores .= "'" . $this->coach_name . "'";
                $first = false;
            } else {
                $indices .= ",coach_name";
                $valores .= ",'" . $this->coach_name . "'";
            }
        }

        if (!empty($this->coach_lastname)) {
            if ($first) {
                $indices .= "coach_lastname";
                $valores .= "'" . $this->coach_lastname . "'";
                $first = false;
            } else {
                $indices .= ",coach_lastname";
                $valores .= ",'" . $this->coach_lastname . "'";
            }
        }

        if (!empty($this->url_join)) {
            if ($first) {
                $indices .= "url_join";
                $valores .= "'" . $this->url_join . "'";
                $first = false;
            } else {
                $indices .= ",url_join";
                $valores .= ",'" . $this->url_join . "'";
            }
        }

        if (!empty($this->url_host)) {
            if ($first) {
                $indices .= "url_host";
                $valores .= "'" . $this->url_host . "'";
                $first = false;
            } else {
                $indices .= ",url_host";
                $valores .= ",'" . $this->url_host . "'";
            }
        }

        if (!empty($this->is_public)) {
            if ($first) {
                $indices .= "is_public";
                $valores .= $this->is_public;
                $first = false;
            } else {
                $indices .= ",is_public";
                $valores .= "," . $this->is_public;
            }
        }

        if (!empty($this->is_paid_public)) {
            if ($first) {
                $indices .= "is_paid_public";
                $valores .= $this->is_paid_public;
                $first = false;
            } else {
                $indices .= ",is_paid_public";
                $valores .= "," . $this->is_paid_public;
            }
        }

        if (!empty($this->is_donate_public)) {
            if ($first) {
                $indices .= "is_donate_public";
                $valores .= $this->is_donate_public;
                $first = false;
            } else {
                $indices .= ",is_donate_public";
                $valores .= "," . $this->is_donate_public;
            }
        }

        if (!empty($this->is_private)) {
            if ($first) {
                $indices .= "is_private";
                $valores .= $this->is_private;
                $first = false;
            } else {
                $indices .= ",is_private";
                $valores .= "," . $this->is_private;
            }
        }

        if (!empty($this->is_paid_private)) {
            if ($first) {
                $indices .= "is_paid_private";
                $valores .= $this->is_paid_private;
                $first = false;
            } else {
                $indices .= ",is_paid_private";
                $valores .= "," . $this->is_paid_private;
            }
        }

        if (!empty($this->is_donate_private)) {
            if ($first) {
                $indices .= "is_donate_private";
                $valores .= $this->is_donate_private;
                $first = false;
            } else {
                $indices .= ",is_donate_private";
                $valores .= "," . $this->is_donate_private;
            }
        }

        if (!empty($this->max_students)) {
            if ($first) {
                $indices .= "max_students";
                $valores .= $this->max_students;
                $first = false;
            } else {
                $indices .= ",max_students";
                $valores .= "," . $this->max_students;
            }
        }

        if (!empty($this->amount_price)) {
            if ($first) {
                $indices .= "amount_price";
                $valores .= $this->amount_price;
                $first = false;
            } else {
                $indices .= ",amount_price";
                $valores .= "," . $this->amount_price;
            }
        }

        if (!empty($this->currency_price)) {
            if ($first) {
                $indices .= "currency_price";
                $valores .= "'" . $this->currency_price . "'";
                $first = false;
            } else {
                $indices .= ",currency_price";
                $valores .= ",'" . $this->currency_price . "'";
            }
        }

        if (!empty($this->zoom_video)) {
            if ($first) {
                $indices .= "zoom_video";
                $valores .= "'" . $this->zoom_video . "'";
                $first = false;
            } else {
                $indices .= ",zoom_video";
                $valores .= ",'" . $this->zoom_video . "'";
            }
        }

        if (!empty($this->meeting_id)) {
            if ($first) {
                $indices .= "meeting_id";
                $valores .= "'" . $this->meeting_id . "'";
                $first = false;
            } else {
                $indices .= ",meeting_id";
                $valores .= ",'" . $this->meeting_id . "'";
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

        return parent::add($indices, $valores);
    }

    public function update($campos = '', $where = '') {

        $where = 'id=' . $this->id;
        $first = true;

        if (!empty($this->coach_id)) {
            if ($first) {
                $campos .= " coach_id=" . $this->coach_id;
                $first = false;
            } else {
                $campos .= ", coach_id=" . $this->coach_id;
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

        if (!empty($this->code_offer_type_id)) {
            if ($first) {
                $campos .= " code_offer_type_id=" . $this->code_offer_type_id;
                $first = false;
            } else {
                $campos .= ", code_offer_type_id=" . $this->code_offer_type_id;
            }
        }

        if (!empty($this->title)) {
            if ($first) {
                $campos .= " title='" . $this->title . "'";
                $first = false;
            } else {
                $campos .= ", title='" . $this->title . "'";
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
        
        if (!empty($this->start)) {
            if ($first) {
                $campos .= " start='" . $this->start . "'";
                $first = false;
            } else {
                $campos .= ", start='" . $this->start . "'";
            }
        }
        
        if (!empty($this->end)) {
            if ($first) {
                $campos .= " end='" . $this->end . "'";
                $first = false;
            } else {
                $campos .= ", end='" . $this->end . "'";
            }
        }

        if (!empty($this->coach_name)) {
            if ($first) {
                $campos .= " coach_name='" . $this->coach_name . "'";
                $first = false;
            } else {
                $campos .= ", coach_name='" . $this->coach_name . "'";
            }
        }

        if (!empty($this->coach_lastname)) {
            if ($first) {
                $campos .= " coach_lastname='" . $this->coach_lastname . "'";
                $first = false;
            } else {
                $campos .= ", coach_lastname='" . $this->coach_lastname . "'";
            }
        }
        
        if (!empty($this->url_join)) {
            if ($first) {
                $campos .= " url_join='" . $this->url_join . "'";
                $first = false;
            } else {
                $campos .= ", url_join='" . $this->url_join . "'";
            }
        }
        
        if (!empty($this->url_host)) {
            if ($first) {
                $campos .= " url_host='" . $this->url_host . "'";
                $first = false;
            } else {
                $campos .= ", url_host='" . $this->url_host . "'";
            }
        }

        if (!empty($this->is_public)) {
            if ($first) {
                $campos .= " is_public=" . $this->is_public;
                $first = false;
            } else {
                $campos .= ", is_public=" . $this->is_public;
            }
        }

        if (!empty($this->is_paid_public)) {
            if ($first) {
                $campos .= " is_paid_public=" . $this->is_paid_public;
                $first = false;
            } else {
                $campos .= ", is_paid_public=" . $this->is_paid_public;
            }
        }

        if (!empty($this->is_donate_public)) {
            if ($first) {
                $campos .= " is_donate_public=" . $this->is_donate_public;
                $first = false;
            } else {
                $campos .= ", is_donate_public=" . $this->is_donate_public;
            }
        }

        if (!empty($this->is_private)) {
            if ($first) {
                $campos .= " is_private=" . $this->is_private;
                $first = false;
            } else {
                $campos .= ", is_private=" . $this->is_private;
            }
        }

        if (!empty($this->is_paid_private)) {
            if ($first) {
                $campos .= " is_paid_private=" . $this->is_paid_private;
                $first = false;
            } else {
                $campos .= ", is_paid_private=" . $this->is_paid_private;
            }
        }

        if (!empty($this->is_donate_private)) {
            if ($first) {
                $campos .= " is_donate_private=" . $this->is_donate_private;
                $first = false;
            } else {
                $campos .= ", is_donate_private=" . $this->is_donate_private;
            }
        }

        if (!empty($this->max_students)) {
            if ($first) {
                $campos .= " max_students=" . $this->max_students;
                $first = false;
            } else {
                $campos .= ", max_students=" . $this->max_students;
            }
        }

        if (!empty($this->amount_price)) {
            if ($first) {
                $campos .= " amount_price=" . $this->amount_price;
                $first = false;
            } else {
                $campos .= ", amount_price=" . $this->amount_price;
            }
        }

        if (!empty($this->currency_price)) {
            if ($first) {
                $campos .= " currency_price='" . $this->currency_price . "'";
                $first = false;
            } else {
                $campos .= ", currency_price='" . $this->currency_price . "'";
            }
        }

        if (!empty($this->zoom_video)) {
            if ($first) {
                $campos .= " zoom_video='" . $this->zoom_video . "'";
                $first = false;
            } else {
                $campos .= ", zoom_video='" . $this->zoom_video . "'";
            }
        }

        if (!empty($this->meeting_id)) {
            if ($first) {
                $campos .= " meeting_id='" . $this->meeting_id . "'";
                $first = false;
            } else {
                $campos .= ", meeting_id='" . $this->meeting_id . "'";
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
    
    /*public function updateFiles(){
        
        $where = 'id_experience=' . $this->id_experience;
        $first = true;
        
        if (!empty($this->banner1)) {
            if ($first) {
                $campos .= " banner1='" . $this->banner1 . "'";
                $first = false;
            } else {
                $campos .= ", banner1='" . $this->banner1 . "'";
            }
        }
        
        if (!empty($this->banner2)) {
            if ($first) {
                $campos .= " banner2='" . $this->banner2 . "'";
                $first = false;
            } else {
                $campos .= ", banner2='" . $this->banner2 . "'";
            }
        }
        
        if (!empty($this->vocabulary)) {
            if ($first) {
                $campos .= " vocabulary='" . $this->vocabulary . "'";
                $first = false;
            } else {
                $campos .= ", vocabulary='" . $this->vocabulary . "'";
            }
        }
        
        return parent::update($campos, $where);
    }*/
    
    public function updateVideo() {
        
        $where = 'id=' . $this->id;
        $first = true;
        
        if (!empty($this->zoom_video)) {
            if ($first) {
                $campos .= " zoom_video='" . $this->zoom_video . "'";
                $first = false;
            } else {
                $campos .= ", zoom_video='" . $this->zoom_video . "'";
            }
        }
        
        return parent::update($campos, $where);
        
    }
    
    /*public function updateMeetingId(){
        
        $where = 'id_experience=' . $this->id_experience;
        $first = true;
        
        if (!empty($this->meeting_id)) {
            if ($first) {
                $campos .= " meeting_id='" . $this->meeting_id . "'";
                $first = false;
            } else {
                $campos .= ", meeting_id='" . $this->meeting_id . "'";
            }
        }
        
        return parent::update($campos, $where);
    }*/

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
     * Get the value of coach_id
     */ 
    public function getCoach_id()
    {
        return $this->coach_id;
    }

    /**
     * Set the value of coach_id
     *
     * @return  self
     */ 
    public function setCoach_id($coach_id) : void
    {
        $this->coach_id = $coach_id;
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
     * Get the value of code_offer_type_id
     */ 
    public function getCode_offer_type_id()
    {
        return $this->code_offer_type_id;
    }

    /**
     * Set the value of code_offer_type_id
     *
     * @return  self
     */ 
    public function setCode_offer_type_id($code_offer_type_id) : void
    {
        $this->code_offer_type_id = $code_offer_type_id;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title) : void
    {
        $this->title = $title;
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
     * Get the value of start
     */ 
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set the value of start
     *
     * @return  self
     */ 
    public function setStart($start) : void
    {
        $this->start = $start;
    }

    /**
     * Get the value of end
     */ 
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set the value of end
     *
     * @return  self
     */ 
    public function setEnd($end) : void
    {
        $this->end = $end;
    }

    /**
     * Get the value of coach_name
     */ 
    public function getCoach_name()
    {
        return $this->coach_name;
    }

    /**
     * Set the value of coach_name
     *
     * @return  self
     */ 
    public function setCoach_name($coach_name) : void
    {
        $this->coach_name = $coach_name;
    }

    /**
     * Get the value of url_join
     */ 
    public function getUrl_join()
    {
        return $this->url_join;
    }

    /**
     * Set the value of url_join
     *
     * @return  self
     */ 
    public function setUrl_join($url_join) : void
    {
        $this->url_join = $url_join;
    }

    /**
     * Get the value of coach_lastname
     */ 
    public function getCoach_lastname()
    {
        return $this->coach_lastname;
    }

    /**
     * Set the value of coach_lastname
     *
     * @return  self
     */ 
    public function setCoach_lastname($coach_lastname) : void
    {
        $this->coach_lastname = $coach_lastname;
    }

    /**
     * Get the value of is_public
     */ 
    public function getIs_public()
    {
        return $this->is_public;
    }

    /**
     * Set the value of is_public
     *
     * @return  self
     */ 
    public function setIs_public($is_public) : void
    {
        $this->is_public = $is_public;
    }

    /**
     * Get the value of url_host
     */ 
    public function getUrl_host()
    {
        return $this->url_host;
    }

    /**
     * Set the value of url_host
     *
     * @return  self
     */ 
    public function setUrl_host($url_host) : void
    {
        $this->url_host = $url_host;
    }

    /**
     * Get the value of is_paid_public
     */ 
    public function getIs_paid_public()
    {
        return $this->is_paid_public;
    }

    /**
     * Set the value of is_paid_public
     *
     * @return  self
     */ 
    public function setIs_paid_public($is_paid_public) : void
    {
        $this->is_paid_public = $is_paid_public;
    }

    /**
     * Get the value of is_donate_public
     */ 
    public function getIs_donate_public()
    {
        return $this->is_donate_public;
    }

    /**
     * Set the value of is_donate_public
     *
     * @return  self
     */ 
    public function setIs_donate_public($is_donate_public) : void
    {
        $this->is_donate_public = $is_donate_public;
    }

    /**
     * Get the value of is_private
     */ 
    public function getIs_private()
    {
        return $this->is_private;
    }

    /**
     * Set the value of is_private
     *
     * @return  self
     */ 
    public function setIs_private($is_private) : void
    {
        $this->is_private = $is_private;
    }

    /**
     * Get the value of is_paid_private
     */ 
    public function getIs_paid_private()
    {
        return $this->is_paid_private;
    }

    /**
     * Set the value of is_paid_private
     *
     * @return  self
     */ 
    public function setIs_paid_private($is_paid_private) : void
    {
        $this->is_paid_private = $is_paid_private;
    }

    /**
     * Get the value of is_donate_private
     */ 
    public function getIs_donate_private()
    {
        return $this->is_donate_private;
    }

    /**
     * Set the value of is_donate_private
     *
     * @return  self
     */ 
    public function setIs_donate_private($is_donate_private) : void
    {
        $this->is_donate_private = $is_donate_private;
    }

    /**
     * Get the value of max_students
     */ 
    public function getMax_students()
    {
        return $this->max_students;
    }

    /**
     * Set the value of max_students
     *
     * @return  self
     */ 
    public function setMax_students($max_students) : void
    {
        $this->max_students = $max_students;
    }

    /**
     * Get the value of amount_price
     */ 
    public function getAmount_price()
    {
        return $this->amount_price;
    }

    /**
     * Set the value of amount_price
     *
     * @return  self
     */ 
    public function setAmount_price($amount_price) : void
    {
        $this->amount_price = $amount_price;
    }

    /**
     * Get the value of currency_price
     */ 
    public function getCurrency_price()
    {
        return $this->currency_price;
    }

    /**
     * Set the value of currency_price
     *
     * @return  self
     */ 
    public function setCurrency_price($currency_price) : void
    {
        $this->currency_price = $currency_price;
    }

    /**
     * Get the value of zoom_video
     */ 
    public function getZoom_video()
    {
        return $this->zoom_video;
    }

    /**
     * Set the value of zoom_video
     *
     * @return  self
     */ 
    public function setZoom_video($zoom_video) : void
    {
        $this->zoom_video = $zoom_video;
    }

    /**
     * Get the value of meeting_id
     */ 
    public function getMeeting_id()
    {
        return $this->meeting_id;
    }

    /**
     * Set the value of meeting_id
     *
     * @return  self
     */ 
    public function setMeeting_id($meeting_id) : void
    {
        $this->meeting_id = $meeting_id;
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
