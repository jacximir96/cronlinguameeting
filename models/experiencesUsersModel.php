<?php

/*
 * Developed by wilowi
 */

/**
 * Description of studentsPaymentModel
 *
 * @author Sandra <wilowi.com>
 */
class experiencesUsersModel extends baseModel {

    private $id = 0;
    private $experience_id = 0;
    private $user_id = 0;
    private $registered_at = '';
    private $joined_at = '';
    private $attendance = 0;
    private $created_at = '';
    private $updated_at = '';
    private $deleted_at = '';

    function __construct() {

        parent::__construct();
        parent::setTable('experience_register');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
        return parent::select($where, $as, $select, $join);
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

        if (!empty($this->registered_at)) {
            if ($first) {
                $indices .= "registered_at";
                $valores .= "'" . $this->registered_at . "'";
                $first = false;
            } else {
                $indices .= ",registered_at";
                $valores .= ",'" . $this->registered_at . "'";
            }
        }

        if (!empty($this->joined_at)) {
            if ($first) {
                $indices .= "joined_at";
                $valores .= "'" . $this->joined_at . "'";
                $first = false;
            } else {
                $indices .= ",joined_at";
                $valores .= ",'" . $this->joined_at . "'";
            }
        }

        if (!empty($this->attendance)) {
            if ($first) {
                $indices .= "attendance";
                $valores .= $this->attendance;
                $first = false;
            } else {
                $indices .= ",attendance";
                $valores .= "," . $this->attendance;
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

        $where = "experience_id=$this->experience_id AND user_id=$this->user_id";
        $first = true;

        if (!empty($this->registered_at)) {
            if ($first) {
                $campos .= " registered_at='" . $this->registered_at . "'";
                $first = false;
            } else {
                $campos .= ", registered_at='" . $this->registered_at . "'";
            }
        }

        if (!empty($this->joined_at)) {
            if ($first) {
                $campos .= " joined_at='" . $this->joined_at . "'";
                $first = false;
            } else {
                $campos .= ", joined_at='" . $this->joined_at . "'";
            }
        }

        if (!empty($this->attendance)) {
            if ($first) {
                $campos .= " attendance=" . $this->attendance;
                $first = false;
            } else {
                $campos .= ", attendance=" . $this->attendance;
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

    /*public function updatePaid() {
        $where = "experience_id=$this->experience_id AND user_id=$this->user_id";
        $first = true;

        if (!empty($this->paid)) {
            if ($first) {
                $campos .= " paid=" . $this->paid;
                $first = false;
            } else {
                $campos .= ", paid=" . $this->paid;
            }
        }


        if (!empty($this->type_payment)) {
            if ($first) {
                $campos .= " type_payment='" . $this->type_payment . "'";
                $first = false;
            } else {
                $campos .= ", type_payment='" . $this->type_payment . "'";
            }
        }

        if (!empty($this->value)) {
            if ($first) {
                $campos .= " value='" . $this->value . "'";
                $first = false;
            } else {
                $campos .= ", value='" . $this->value . "'";
            }
        }

        if (!empty($this->payment_id)) {
            if ($first) {
                $campos .= " payment_id='" . $this->payment_id . "'";
                $first = false;
            } else {
                $campos .= ", payment_id='" . $this->payment_id . "'";
            }
        }

        if (!empty($this->payer_id)) {
            if ($first) {
                $campos .= " payer_id='" . $this->payer_id . "'";
                $first = false;
            } else {
                $campos .= ", payer_id='" . $this->payer_id . "'";
            }
        }

        if (!empty($this->state)) {
            if ($first) {
                $campos .= " state='" . $this->state . "'";
                $first = false;
            } else {
                $campos .= ", state='" . $this->state . "'";
            }
        }

        if (!empty($this->email_payment)) {
            if ($first) {
                $campos .= " email_payment='" . $this->email_payment . "'";
                $first = false;
            } else {
                $campos .= ", email_payment='" . $this->email_payment . "'";
            }
        }

        if (!empty($this->date_payment)) {
            if ($first) {
                $campos .= " date_payment='" . $this->date_payment . "'";
                $first = false;
            } else {
                $campos .= ", date_payment='" . $this->date_payment . "'";
            }
        }

        return parent::update($campos, $where);
    }*/
    
    /*public function updateJoin() {
        
        $where = "experience_id=$this->experience_id AND user_id=$this->user_id";
        $first = true;

        
        if (!empty($this->date_join)) {
            if ($first) {
                $campos .= " date_join='" . $this->date_join . "'";
                $first = false;
            } else {
                $campos .= ", date_join='" . $this->date_join . "'";
            }
        }


        if ($first) {
            $campos .= " attendance=$this->attendance";
            $first = false;
        } else {
            $campos .= ", attendance=$this->attendance";
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
     * Get the value of experience_id
     */ 
    public function getExperience_id()
    {
        return $this->experience_id;
    }

    /**
     * Set the value of experience_id
     *
     * @return  self
     */ 
    public function setExperience_id($experience_id) : void
    {
        $this->experience_id = $experience_id;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id) : void
    {
        $this->user_id = $user_id;
    }

    /**
     * Get the value of registered_at
     */ 
    public function getRegistered_at()
    {
        return $this->registered_at;
    }

    /**
     * Set the value of registered_at
     *
     * @return  self
     */ 
    public function setRegistered_at($registered_at) : void
    {
        $this->registered_at = $registered_at;
    }

    /**
     * Get the value of joined_at
     */ 
    public function getJoined_at()
    {
        return $this->joined_at;
    }

    /**
     * Set the value of joined_at
     *
     * @return  self
     */ 
    public function setJoined_at($joined_at) : void
    {
        $this->joined_at = $joined_at;
    }

    /**
     * Get the value of attendance
     */ 
    public function getAttendance()
    {
        return $this->attendance;
    }

    /**
     * Set the value of attendance
     *
     * @return  self
     */ 
    public function setAttendance($attendance) : void
    {
        $this->attendance = $attendance;
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