<?php

/*
 * Developed by wilowi
 */

/**
 * Description of studentsPaymentModel
 *
 * @author Sandra <wilowi.com>
 */
class experiencesDonationsModel extends baseModel {

    private $id_donation = 0;
    private $user_id = 0;
    private $experience_id = 0;
    private $type_payment = '';
    private $value = 0;
    private $payment_id = '';
    private $payer_id = '';
    private $state = '';
    private $email_payment = '';
    private $date_donation = '';
    private $name_user = '';
    private $lastname_user = '';
    private $email_user = '';
    private $paid = 0;

    function __construct() {

        parent::__construct();
        parent::setTable('lm_experiences_donations');
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

        if (!empty($this->date_donation)) {
            if ($first) {
                $indices .= "date_donation";
                $valores .= "'" . $this->date_donation . "'";
                $first = false;
            } else {
                $indices .= ",date_donation";
                $valores .= ",'" . $this->date_donation . "'";
            }
        }

        if (!empty($this->name_user)) {
            if ($first) {
                $indices .= "name_user";
                $valores .= "'" . $this->name_user . "'";
                $first = false;
            } else {
                $indices .= ",name_user";
                $valores .= ",'" . $this->name_user . "'";
            }
        }

        if (!empty($this->lastname_user)) {
            if ($first) {
                $indices .= "lastname_user";
                $valores .= "'" . $this->lastname_user . "'";
                $first = false;
            } else {
                $indices .= ",lastname_user";
                $valores .= ",'" . $this->lastname_user . "'";
            }
        }

        if (!empty($this->email_user)) {
            if ($first) {
                $indices .= "email_user";
                $valores .= "'" . $this->email_user . "'";
                $first = false;
            } else {
                $indices .= ",email_user";
                $valores .= ",'" . $this->email_user . "'";
            }
        }



        return parent::add($indices, $valores);
    }

    public function update($campos = '', $where = '') {

        $where = "id_donation=$this->id_donation";
        $first = true;
        
        if (!empty($this->paid)) {
            if ($first) {
                $campos .= " paid=" . $this->title;
                $first = false;
            } else {
                $campos .= ", paid=" . $this->paid;
            }
        }

        if (!empty($this->name_user)) {
            if ($first) {
                $campos .= " name_user='" . $this->name_user . "'";
                $first = false;
            } else {
                $campos .= ", name_user='" . $this->name_user . "'";
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

        if (!empty($this->date_donation)) {
            if ($first) {
                $campos .= " date_donation='" . $this->date_donation . "'";
                $first = false;
            } else {
                $campos .= ", date_donation='" . $this->date_donation . "'";
            }
        }

        if (!empty($this->email_user)) {
            if ($first) {
                $campos .= " email_user='" . $this->email_user . "'";
                $first = false;
            } else {
                $campos .= ", email_user='" . $this->email_user . "'";
            }
        }
        
        if (!empty($this->lastname_user)) {
            if ($first) {
                $campos .= " lastname_user='" . $this->lastname_user . "'";
                $first = false;
            } else {
                $campos .= ", lastname_user='" . $this->lastname_user . "'";
            }
        }



        return parent::update($campos, $where);
    }
    
    public function updatePaid() {


        $where = "experience_id=$this->experience_id AND payment_id='$this->payment_id'";
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

        if (!empty($this->date_donation)) {
            if ($first) {
                $campos .= " date_donation='" . $this->date_donation . "'";
                $first = false;
            } else {
                $campos .= ", date_donation='" . $this->date_donation . "'";
            }
        }


        return parent::update($campos, $where);
    }

    function getId_donation() {
        return $this->id_donation;
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

    function getDate_donation() {
        return $this->date_donation;
    }

    function getName_user() {
        return $this->name_user;
    }

    function getLastname_user() {
        return $this->lastname_user;
    }

    function getEmail_user() {
        return $this->email_user;
    }

    function setId_donation($id_donation): void {
        $this->id_donation = $id_donation;
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

    function setDate_donation($date_donation): void {
        $this->date_donation = $date_donation;
    }

    function setName_user($name_user): void {
        $this->name_user = $name_user;
    }

    function setLastname_user($lastname_user): void {
        $this->lastname_user = $lastname_user;
    }

    function setEmail_user($email_user): void {
        $this->email_user = $email_user;
    }

    function getPaid() {
        return $this->paid;
    }

    function setPaid($paid): void {
        $this->paid = $paid;
    }




}

?>