<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of universityLevelsModel
 *
 * @author Sandra
 */
class universityLevelsModel extends baseModel{
    //put your code here
    
    function __construct() {

        parent::__construct();
        parent::setTable('lm_university_levels');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
        return parent::select($where, $as, $select, $join);
    }
    
}
