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

    private $user_id = 0;
    private $experience_id = 0;
    private $type_payment = '';
    private $value = 0;
    private $payment_id = '';
    private $payer_id = '';
    private $state = '';
    private $email_payment = '';
    private $date_payment = '';
    private $date_register = '';
    private $date_join = '';
    private $paid = 0;
    private $attendance = 0;

    function __construct() {

        parent::__construct();
        parent::setTable('lm_experiences_users');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
        return parent::select($where, $as, $select, $join);
    }

    public function add($indices = '', $valores = '') {

        $first = true;

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

        if (!empty($this->type_payment)) {
            if ($first) {
                $indices .= "type_payment";
                $valores .= "'" . $this->type_payment . "'";
                $first = false;
            } else {
                $indices .= ",type_payment";
                $valores .= ",'" . $this->type_payment . "'";
            }
        }

        if (!empty($this->paid)) {
            if ($first) {
                $indices .= "paid";
                $valores .= $this->paid;
                $first = false;
            } else {
                $indices .= ",paid";
                $valores .= "," . $this->paid;
            }
        }

        if (!empty($this->value)) {
            if ($first) {
                $indices .= "value";
                $valores .= "'" . $this->value . "'";
                $first = false;
            } else {
                $indices .= ",value";
                $valores .= ",'" . $this->value . "'";
            }
        }

        if (!empty($this->payment_id)) {
            if ($first) {
                $indices .= "payment_id";
                $valores .= "'" . $this->payment_id . "'";
                $first = false;
            } else {
                $indices .= ",payment_id";
                $valores .= ",'" . $this->payment_id . "'";
            }
        }

        if (!empty($this->payer_id)) {
            if ($first) {
                $indices .= "payer_id";
                $valores .= "'" . $this->payer_id . "'";
                $first = false;
            } else {
                $indices .= ",payer_id";
                $valores .= ",'" . $this->payer_id . "'";
            }
        }

        if (!empty($this->state)) {
            if ($first) {
                $indices .= "state";
                $valores .= "'" . $this->state . "'";
                $first = false;
            } else {
                $indices .= ",state";
                $valores .= ",'" . $this->state . "'";
            }
        }

        if (!empty($this->email_payment)) {
            if ($first) {
                $indices .= "email_payment";
                $valores .= "'" . $this->email_payment . "'";
                $first = false;
            } else {
                $indices .= ",email_payment";
                $valores .= ",'" . $this->email_payment . "'";
            }
        }

        if (!empty($this->date_payment)) {
            if ($first) {
                $indices .= "date_payment";
                $valores .= "'" . $this->date_payment . "'";
                $first = false;
            } else {
                $indices .= ",date_payment";
                $valores .= ",'" . $this->date_payment . "'";
            }
        }

        if (!empty($this->date_register)) {
            if ($first) {
                $indices .= "date_register";
                $valores .= "'" . $this->date_register . "'";
                $first = false;
            } else {
                $indices .= ",date_register";
                $valores .= ",'" . $this->date_register . "'";
            }
        }

        if (!empty($this->date_join)) {
            if ($first) {
                $indices .= "date_join";
                $valores .= "'" . $this->date_join . "'";
                $first = false;
            } else {
                $indices .= ",date_join";
                $valores .= ",'" . $this->date_join . "'";
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

        return parent::add($indices, $valores);
    }

    public function update($campos = '', $where = '') {

        $where = "experience_id=$this->experience_id AND user_id=$this->user_id";
        $first = true;

        if (!empty($this->paid)) {
            if ($first) {
                $campos .= " paid=" . $this->title;
                $first = false;
            } else {
                $campos .= ", paid=" . $this->paid;
            }
        }

        if (!empty($this->date_register)) {
            if ($first) {
                $campos .= " date_register='" . $this->date_register . "'";
                $first = false;
            } else {
                $campos .= ", date_register='" . $this->date_register . "'";
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

        
        if (!empty($this->date_join)) {
            if ($first) {
                $campos .= " date_join='" . $this->date_join . "'";
                $first = false;
            } else {
                $campos .= ", date_join='" . $this->date_join . "'";
            }
        }


        return parent::update($campos, $where);
    }

    public function updatePaid() {


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
    }
    
    public function updateJoin(){
        
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
        
    }
    
    

    function getUser_id() {
        return $this->user_id;
    }

    function getExperience_id() {
        return $this->experience_id;
    }

    function getType_payment() {
        return $this->type_payment;
    }

    function getValue() {
        return $this->value;
    }

    function getPayment_id() {
        return $this->payment_id;
    }

    function getPayer_id() {
        return $this->payer_id;
    }

    function getState() {
        return $this->state;
    }

    function getEmail_payment() {
        return $this->email_payment;
    }

    function getDate_payment() {
        return $this->date_payment;
    }

    function getDate_register() {
        return $this->date_register;
    }

    function getDate_join() {
        return $this->date_join;
    }


    function getPaid() {
        return $this->paid;
    }

    function getAttendance() {
        return $this->attendance;
    }

    function setUser_id($user_id): void {
        $this->user_id = $user_id;
    }

    function setExperience_id($experience_id): void {
        $this->experience_id = $experience_id;
    }

    function setType_payment($type_payment): void {
        $this->type_payment = $type_payment;
    }

    function setValue($value): void {
        $this->value = $value;
    }

    function setPayment_id($payment_id): void {
        $this->payment_id = $payment_id;
    }

    function setPayer_id($payer_id): void {
        $this->payer_id = $payer_id;
    }

    function setState($state): void {
        $this->state = $state;
    }

    function setEmail_payment($email_payment): void {
        $this->email_payment = $email_payment;
    }

    function setDate_payment($date_payment): void {
        $this->date_payment = $date_payment;
    }

    function setDate_register($date_register): void {
        $this->date_register = $date_register;
    }

    function setDate_join($date_join): void {
        $this->date_join = $date_join;
    }

 

    function setPaid($paid): void {
        $this->paid = $paid;
    }

    function setAttendance($attendance): void {
        $this->attendance = $attendance;
    }



}

?>