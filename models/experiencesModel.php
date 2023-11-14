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
    private $id_experience = 0;
    private $title = '';
    private $description = '';
    private $day = '';
    private $hour = '';
    private $url_join = '';
    private $url_host = '';
    private $banner1 = '';
    private $banner2 = '';
    private $vocabulary = '';
    private $private = 0;
    private $public = 0;
    private $pay_private = 0;
    private $pay_public = 0;
    private $donate_private = 0;
    private $donate_public = 0;
    private $num_max_students = 0;
    private $video = '';
    private $coach_id = 0;
    private $name_coach = '';
    private $lastname_coach = '';
    private $code_offer = '';
    private $price = 0;
    private $hour_end= '';
    private $zoom_video = '';
    private $meeting_id = '';

    function __construct() {

        parent::__construct();
        parent::setTable('lm_experiences');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
        return parent::select($where, $as, $select, $join);
    }

    public function delete($where) {
        return parent::delete($where);
    }

    public function add($indices = '', $valores = '') {

        $first = true;

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
        
        if (!empty($this->price)) {
            if ($first) {
                $indices .= "price";
                $valores .= "'" . $this->price . "'";
                $first = false;
            } else {
                $indices .= ",price";
                $valores .= ",'" . $this->price . "'";
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

        if (!empty($this->day)) {
            if ($first) {
                $indices .= "day";
                $valores .= "'" . $this->day . "'";
                $first = false;
            } else {
                $indices .= ",day";
                $valores .= ",'" . $this->day . "'";
            }
        }

        if (!empty($this->hour)) {
            if ($first) {
                $indices .= "hour";
                $valores .= "'" . $this->hour . "'";
                $first = false;
            } else {
                $indices .= ",hour";
                $valores .= ",'" . $this->hour . "'";
            }
        }
        
        if (!empty($this->hour_end)) {
            if ($first) {
                $indices .= "hour_end";
                $valores .= "'" . $this->hour_end . "'";
                $first = false;
            } else {
                $indices .= ",hour_end";
                $valores .= ",'" . $this->hour_end . "'";
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

        if (!empty($this->banner1)) {
            if ($first) {
                $indices .= "banner1";
                $valores .= "'" . $this->banner1 . "'";
                $first = false;
            } else {
                $indices .= ",banner1";
                $valores .= ",'" . $this->banner1 . "'";
            }
        }

        if (!empty($this->banner2)) {
            if ($first) {
                $indices .= "banner2";
                $valores .= "'" . $this->banner2 . "'";
                $first = false;
            } else {
                $indices .= ",banner2";
                $valores .= ",'" . $this->banner2 . "'";
            }
        }

        if (!empty($this->vocabulary)) {
            if ($first) {
                $indices .= "vocabulary";
                $valores .= "'" . $this->vocabulary . "'";
                $first = false;
            } else {
                $indices .= ",vocabulary";
                $valores .= ",'" . $this->vocabulary . "'";
            }
        }

        if (!empty($this->video)) {
            if ($first) {
                $indices .= "video";
                $valores .= "'" . $this->video . "'";
                $first = false;
            } else {
                $indices .= ",video";
                $valores .= ",'" . $this->video . "'";
            }
        }

        if (!empty($this->num_max_students)) {
            if ($first) {
                $indices .= "num_max_students";
                $valores .= $this->num_max_students;
                $first = false;
            } else {
                $indices .= ",num_max_students";
                $valores .= "," . $this->num_max_students;
            }
        }
        
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
        
        if (!empty($this->name_coach)) {
            if ($first) {
                $indices .= "name_coach";
                $valores .= "'" . $this->name_coach . "'";
                $first = false;
            } else {
                $indices .= ",name_coach";
                $valores .= ",'" . $this->name_coach . "'";
            }
        }
        
        if (!empty($this->lastname_coach)) {
            if ($first) {
                $indices .= "lastname_coach";
                $valores .= "'" . $this->lastname_coach . "'";
                $first = false;
            } else {
                $indices .= ",lastname_coach";
                $valores .= ",'" . $this->lastname_coach . "'";
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


        if ($first) {
            $indices .= "private,public,pay_private,pay_public,donate_private,donate_public";
            $valores .= "$this->private,$this->public,$this->pay_private,$this->pay_public,$this->donate_private,$this->donate_public";
            $first = false;
        } else {
            $indices .= ",private,public,pay_private,pay_public,donate_private,donate_public";
            $valores .= ",$this->private,$this->public,$this->pay_private,$this->pay_public,$this->donate_private,$this->donate_public";
        }


        return parent::add($indices, $valores);
    }

    public function update($campos = '', $where = '') {

        $where = 'id_experience=' . $this->id_experience;
        $first = true;

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
        
        if (!empty($this->day)) {
            if ($first) {
                $campos .= " day='" . $this->day . "'";
                $first = false;
            } else {
                $campos .= ", day='" . $this->day . "'";
            }
        }
        
        if (!empty($this->hour)) {
            if ($first) {
                $campos .= " hour='" . $this->hour . "'";
                $first = false;
            } else {
                $campos .= ", hour='" . $this->hour . "'";
            }
        }
        if (!empty($this->hour_end)) {
            if ($first) {
                $campos .= " hour_end='" . $this->hour_end . "'";
                $first = false;
            } else {
                $campos .= ", hour_end='" . $this->hour_end . "'";
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
        
        if (!empty($this->video)) {
            if ($first) {
                $campos .= " video='" . $this->video . "'";
                $first = false;
            } else {
                $campos .= ", video='" . $this->video . "'";
            }
        }
        
        if (!empty($this->num_max_students)) {
            if ($first) {
                $campos .= " num_max_students=" . $this->num_max_students;
                $first = false;
            } else {
                $campos .= ", num_max_students=" . $this->num_max_students;
            }
        }
        
        if (!empty($this->coach_id)) {
            if ($first) {
                $campos .= " coach_id=" . $this->coach_id;
                $first = false;
            } else {
                $campos .= ", coach_id=" . $this->coach_id;
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
         
        
        if ($first) {
            $campos .= " private=$this->private, public=$this->public, pay_private=$this->pay_private, pay_public=$this->pay_public, donate_private=$this->donate_private,"
                    . " donate_public=$this->donate_public,name_coach='$this->name_coach',lastname_coach='$this->lastname_coach',code_offer='$this->code_offer',"
                    . " price='$this->price'";
            $first = false;
        } else {
            $campos .= ", private=$this->private, public=$this->public, pay_private=$this->pay_private, pay_public=$this->pay_public, donate_private=$this->donate_private,"
                    . " donate_public=$this->donate_public,name_coach='$this->name_coach',lastname_coach='$this->lastname_coach',code_offer='$this->code_offer',"
                    . " price='$this->price'";
        }

        return parent::update($campos, $where);
    }
    
    public function updateFiles(){
        
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
    }
    
    public function updateVideo(){
        
        $where = 'id_experience=' . $this->id_experience;
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
    
    public function updateMeetingId(){
        
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
    }


    function getTitle() {
        return $this->title;
    }

    function getDescription() {
        return $this->description;
    }

    function getDay() {
        return $this->day;
    }

    function getHour() {
        return $this->hour;
    }

    function getUrl_join() {
        return $this->url_join;
    }

    function getUrl_host() {
        return $this->url_host;
    }

    function getBanner1() {
        return $this->banner1;
    }

    function getBanner2() {
        return $this->banner2;
    }

    function getVocabulary() {
        return $this->vocabulary;
    }

    function getPrivate() {
        return $this->private;
    }

    function getPublic() {
        return $this->public;
    }

    function getPay_private() {
        return $this->pay_private;
    }

    function getPay_public() {
        return $this->pay_public;
    }

    function getDonate_private() {
        return $this->donate_private;
    }

    function getDonate_public() {
        return $this->donate_public;
    }

    function getNum_max_students() {
        return $this->num_max_students;
    }

    function getVideo() {
        return $this->video;
    }


    function setTitle($title): void {
        $this->title = $title;
    }

    function setDescription($description): void {
        $this->description = $description;
    }

    function setDay($day): void {
        $this->day = $day;
    }

    function setHour($hour): void {
        $this->hour = $hour;
    }

    function setUrl_join($url_join): void {
        $this->url_join = $url_join;
    }

    function setUrl_host($url_host): void {
        $this->url_host = $url_host;
    }

    function setBanner1($banner1): void {
        $this->banner1 = $banner1;
    }

    function setBanner2($banner2): void {
        $this->banner2 = $banner2;
    }

    function setVocabulary($vocabulary): void {
        $this->vocabulary = $vocabulary;
    }

    function setPrivate($private): void {
        $this->private = $private;
    }

    function setPublic($public): void {
        $this->public = $public;
    }

    function setPay_private($pay_private): void {
        $this->pay_private = $pay_private;
    }

    function setPay_public($pay_public): void {
        $this->pay_public = $pay_public;
    }

    function setDonate_private($donate_private): void {
        $this->donate_private = $donate_private;
    }

    function setDonate_public($donate_public): void {
        $this->donate_public = $donate_public;
    }

    function setNum_max_students($num_max_students): void {
        $this->num_max_students = $num_max_students;
    }

    function setVideo($video): void {
        $this->video = $video;
    }

    function getId_experience() {
        return $this->id_experience;
    }

    function setId_experience($id_experience): void {
        $this->id_experience = $id_experience;
    }

    function getCoach_id() {
        return $this->coach_id;
    }

    function setCoach_id($coach_id): void {
        $this->coach_id = $coach_id;
    }

    function getName_coach() {
        return $this->name_coach;
    }

    function getLastname_coach() {
        return $this->lastname_coach;
    }

    function getCode_offer() {
        return $this->code_offer;
    }

    function setName_coach($name_coach): void {
        $this->name_coach = $name_coach;
    }

    function setLastname_coach($lastname_coach): void {
        $this->lastname_coach = $lastname_coach;
    }

    function setCode_offer($code_offer): void {
        $this->code_offer = $code_offer;
    }

    function getPrice() {
        return $this->price;
    }

    function setPrice($price): void {
        $this->price = $price;
    }

    function getHour_end() {
        return $this->hour_end;
    }

    function setHour_end($hour_end): void {
        $this->hour_end = $hour_end;
    }

    function getZoom_video() {
        return $this->zoom_video;
    }

    function setZoom_video($zoom_video): void {
        $this->zoom_video = $zoom_video;
    }

    function getMeeting_id() {
        return $this->meeting_id;
    }

    function setMeeting_id($meeting_id): void {
        $this->meeting_id = $meeting_id;
    }



}
