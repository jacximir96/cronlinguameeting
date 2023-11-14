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
class experiencesUniversitiesModel extends baseModel {

    //put your code here
    private $experience_id = 0;
    private $id_university = 0;

    function __construct() {

        parent::__construct();
        parent::setTable('lm_experiences_universities');
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

        
        return parent::add($indices, $valores);
    }
    
    function getExperience_id() {
        return $this->experience_id;
    }

    function getId_university() {
        return $this->id_university;
    }

    function setExperience_id($experience_id): void {
        $this->experience_id = $experience_id;
    }

    function setId_university($id_university): void {
        $this->id_university = $id_university;
    }



}
