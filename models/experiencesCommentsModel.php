<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of experiencesCommentsModel
 *
 * @author Sandra
 */
class experiencesCommentsModel extends baseModel {

    //put your code here
    private $id = 0;
    private $experience_id = 0;
    private $comment = '';
    private $stars = 0;
    private $user_id = 0;
    private $name = '';
    private $lastname = '';
    private $email = '';

    function __construct() {

        parent::__construct();
        parent::setTable('lm_experiences_comments');
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

        if (!empty($this->comment)) {
            if ($first) {
                $indices .= "comment";
                $valores .= "'" . $this->comment . "'";
                $first = false;
            } else {
                $indices .= ",comment";
                $valores .= ",'" . $this->comment . "'";
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

        if (!empty($this->lastname)) {
            if ($first) {
                $indices .= "lastname";
                $valores .= "'" . $this->lastname . "'";
                $first = false;
            } else {
                $indices .= ",lastname";
                $valores .= ",'" . $this->lastname . "'";
            }
        }

        if (!empty($this->email)) {
            if ($first) {
                $indices .= "email";
                $valores .= "'" . $this->email . "'";
                $first = false;
            } else {
                $indices .= ",email";
                $valores .= ",'" . $this->email . "'";
            }
        }

        if (!empty($this->stars)) {
            if ($first) {
                $indices .= "stars";
                $valores .= $this->stars;
                $first = false;
            } else {
                $indices .= ",stars";
                $valores .= "," . $this->stars;
            }
        }
        
        if (!empty($this->user_id)) {
            if ($first) {
                $indices .= "user_id";
                $valores .= $this->user_id;
                $first = false;
            } else {
                $indices .= ",user_id";
                $valores .= "," . $this->user_id;
            }
        }
       

        return parent::add($indices, $valores);
    }
    
    
    function getId() {
        return $this->id;
    }

    function getExperience_id() {
        return $this->experience_id;
    }

    function getComment() {
        return $this->comment;
    }

    function getStars() {
        return $this->stars;
    }

    function getUser_id() {
        return $this->user_id;
    }

    function getName() {
        return $this->name;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setExperience_id($experience_id): void {
        $this->experience_id = $experience_id;
    }

    function setComment($comment): void {
        $this->comment = $comment;
    }

    function setStars($stars): void {
        $this->stars = $stars;
    }

    function setUser_id($user_id): void {
        $this->user_id = $user_id;
    }

    function setName($name): void {
        $this->name = $name;
    }

    function setLastname($lastname): void {
        $this->lastname = $lastname;
    }

    function setEmail($email): void {
        $this->email = $email;
    }



}
