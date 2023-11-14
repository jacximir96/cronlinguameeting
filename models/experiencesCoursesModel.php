<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of experiencesUniversitiesModel
 *
 * @author Sandra
 */
class experiencesCoursesModel extends baseModel {

    //put your code here
    private $experience_id = 0;
    private $id_course = 0;
    private $is_flex = 0;

    function __construct() {

        parent::__construct();
        parent::setTable('lm_experiences_courses');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
        return parent::select($where, $as, $select, $join);
    }

    public function delete($where) {
        return parent::delete($where);
    }

    public function add($indices = '', $valores = '') {

        $first = true;

        if (!empty($this->experience_id)) {
            if ($first) {
                $indices .= "experience_id";
                $valores .= $this->experience_id;
                $first = false;
            } else {
                $indices .= ",experience_id";
                $valores .= "," . $this->experience_id;
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

        
        return parent::add($indices, $valores);
    }
    
    function getExperience_id() {
        return $this->experience_id;
    }

    function getId_course() {
        return $this->id_course;
    }

    function getIs_flex() {
        return $this->is_flex;
    }

    function setExperience_id($experience_id): void {
        $this->experience_id = $experience_id;
    }

    function setId_course($id_course): void {
        $this->id_course = $id_course;
    }

    function setIs_flex($is_flex): void {
        $this->is_flex = $is_flex;
    }






}
