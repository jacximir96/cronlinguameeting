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
class experiencesSectionsModel extends baseModel {

    //put your code here
    private $experience_id = 0;
    private $id_section = 0;
    private $is_flex = 0;

    function __construct() {

        parent::__construct();
        parent::setTable('lm_experiences_sections');
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

        if (!empty($this->id_section)) {
            if ($first) {
                $indices .= "id_section";
                $valores .= $this->id_section;
                $first = false;
            } else {
                $indices .= ",id_section";
                $valores .= "," . $this->id_section;
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

    function getId_section() {
        return $this->id_section;
    }

    function getIs_flex() {
        return $this->is_flex;
    }

    function setExperience_id($experience_id): void {
        $this->experience_id = $experience_id;
    }

    function setId_section($id_section): void {
        $this->id_section = $id_section;
    }

    function setIs_flex($is_flex): void {
        $this->is_flex = $is_flex;
    }




}
