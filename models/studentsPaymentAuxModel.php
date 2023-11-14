<?php

/*
 * Developed by David Camacho
 */

/**
 * Description of studentsPaymentAuxModel
 *
 * @author David Camacho
 */
class studentsPaymentAuxModel extends baseModel {

    private $id_user = 0;
    private $name_user = '';
    private $lastname_user = '';
    private $email = '';
    private $amount = 0;
    private $id_paypal = '';
    private $payment_date = '';
    private $id_paypal_equals = '';

    function __construct() {

        parent::__construct();
        parent::setTable('lm_students_payment_aux');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
        return parent::select($where, $as, $select, $join);
    }

    public function add($indices = '', $valores = '') {

        $first = true;

        if (!empty($this->id_user)) {
            if ($first) {
                $indices .= "id_user";
                $valores .= $this->id_user;
                $first = false;
            } else {
                $indices .= ",id_user";
                $valores .= "," . $this->id_user;
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

        if (!empty($this->amount)) {
            if ($first) {
                $indices .= "amount";
                $valores .= "'" . $this->amount . "'";
                $first = false;
            } else {
                $indices .= ",amount";
                $valores .= ",'" . $this->amount . "'";
            }
        }

        if (!empty($this->id_paypal)) {
            if ($first) {
                $indices .= "id_paypal";
                $valores .= "'" . $this->id_paypal . "'";
                $first = false;
            } else {
                $indices .= ",id_paypal";
                $valores .= ",'" . $this->id_paypal . "'";
            }
        }

        if (!empty($this->payment_date)) {
            if ($first) {
                $indices .= "payment_date";
                $valores .= "'" . $this->payment_date . "'";
                $first = false;
            } else {
                $indices .= ",payment_date";
                $valores .= ",'" . $this->payment_date . "'";
            }
        }

        return parent::add($indices, $valores);
    }

    function getId_user() {
        return $this->id_user;
    }

    function getName_user() {
        return $this->name_user;
    }

    function getLastname_user() {
        return $this->lastname_user;
    }

    function getEmail() {
        return $this->email;
    }

    function getAmount() {
        return $this->amount;
    }

    function getIdPaypal() {
        return $this->id_paypal;
    }

    function getPaymentDate() {
        return $this->payment_date;
    }

    function getIdPaypalEquals() {
        return $this->id_paypal_equals;
    }

    function setId_user($id_user): void {
        $this->id_user = $id_user;
    }

    function setName_user($name_user) {
        $this->name_user = $name_user;
    }

    function setLastname_user($lastname_user) {
        $this->lastname_user = $lastname_user;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setAmount($amount){
        $this->amount = $amount;
    }

    function setIdPaypal($id_paypal): void {
        $this->id_paypal = $id_paypal;
    }

    function setPaymentDate($payment_date): void {
        $this->payment_date = $payment_date;
    }

    function setIdPaypalEquals($id_paypal_equals): void {
        $this->id_paypal_equals = $id_paypal_equals;
    }
}
?>