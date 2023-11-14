<?php

/*
 * Developed by wilowi
 */

/**
 * Description of studentsPaymentModel
 *
 * @author Sandra <wilowi.com>
 */
class studentsPaymentModel extends baseModel {

    private $id_user = 0;
    private $enroll_id = 0;
    private $id_course = 0;
    private $type_payment = '';
    private $paid_out = 0;
    private $value = 0;
    private $payment_id = '';
    private $payer_id = '';
    private $state = '';
    private $email_payment = '';
    private $date_payment = '';
    private $change_payment = '';
    private $id_course_old = 0;
    private $id_sale = '';
    private $payment_active = 0;
    private $offer_special = 0;

    function __construct() {

        parent::__construct();
        parent::setTable('lm_students_payment');
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

        if (!empty($this->enroll_id)) {
            if ($first) {
                $indices .= "enroll_id";
                $valores .= $this->enroll_id;
                $first = false;
            } else {
                $indices .= ",enroll_id";
                $valores .= "," . $this->enroll_id;
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

        if (!empty($this->paid_out)) {
            if ($first) {
                $indices .= "paid_out";
                $valores .= $this->paid_out;
                $first = false;
            } else {
                $indices .= ",paid_out";
                $valores .= "," . $this->paid_out;
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

        if (!empty($this->id_sale)) {
            if ($first) {
                $indices .= "id_sale";
                $valores .= "'" . $this->id_sale . "'";
                $first = false;
            } else {
                $indices .= ",id_sale";
                $valores .= ",'" . $this->id_sale . "'";
            }
        }

        if (!empty($this->payment_active)) {
            if ($first) {
                $indices .= "payment_active";
                $valores .= $this->payment_active;
                $first = false;
            } else {
                $indices .= ",payment_active";
                $valores .= "," . $this->payment_active;
            }
        }

        if (!empty($this->offer_special)) {
            if ($first) {
                $indices .= "offer_special";
                $valores .= $this->offer_special;
                $first = false;
            } else {
                $indices .= ",offer_special";
                $valores .= "," . $this->offer_special;
            }
        }


        return parent::add($indices, $valores);
    }

    public function updateChangePayment($campos = '', $where = '') {


        $where = 'id_user=' . $this->id_user . ' AND id_course=' . $this->id_course_old . ' AND enroll_id=' . $this->enroll_id;
        $first = true;

        if (!empty($this->id_course)) {
            if ($first) {
                $campos .= " id_course=" . $this->id_course;
                $first = false;
            } else {
                $campos .= ", id_course=" . $this->id_course;
            }
        }

        if (!empty($this->change_payment)) {
            if ($first) {
                $campos .= " change_payment='" . $this->change_payment . "'";
                $first = false;
            } else {
                $campos .= ", change_payment='" . $this->change_payment . "'";
            }
        }

        return parent::update($campos, $where);
    }
    
    public function updateEnroll($enroll_old) {


        $where = 'id_user=' . $this->id_user . ' AND enroll_id=' . $enroll_old;
        $first = true;

        $campos .= " enroll_id=" . $this->enroll_id;

        return parent::update($campos, $where);
    }

    public function updateDesCode($newCode) {


        $where = "payment_id='$this->payment_id'";

        $campos .= " payment_id='" . $newCode . "'";

        return parent::update($campos, $where);
    }

    public function updateActive($newCode) {


        $where = "payment_id='$this->payment_id'";

        $campos .= " payment_active=" . $this->payment_active;

        return parent::update($campos, $where);
    }

    function getChange_payment() {
        return $this->change_payment;
    }

    function getId_course_old() {
        return $this->id_course_old;
    }

    function setChange_payment($change_payment) {
        $this->change_payment = $change_payment;
    }

    function setId_course_old($id_course_old) {
        $this->id_course_old = $id_course_old;
    }

    function getId_user() {
        return $this->id_user;
    }

    function getType_payment() {
        return $this->type_payment;
    }

    function getPaid_out() {
        return $this->paid_out;
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

    function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    function setType_payment($type_payment) {
        $this->type_payment = $type_payment;
    }

    function setPaid_out($paid_out) {
        $this->paid_out = $paid_out;
    }

    function setValue($value) {
        $this->value = $value;
    }

    function setPayment_id($payment_id) {
        $this->payment_id = $payment_id;
    }

    function setPayer_id($payer_id) {
        $this->payer_id = $payer_id;
    }

    function setState($state) {
        $this->state = $state;
    }

    function setEmail_payment($email_payment) {
        $this->email_payment = $email_payment;
    }

    function setDate_payment($date_payment) {
        $this->date_payment = $date_payment;
    }

    function getId_course() {
        return $this->id_course;
    }

    function setId_course($id_course) {
        $this->id_course = $id_course;
    }

    function getId_sale() {
        return $this->id_sale;
    }

    function setId_sale($id_sale) {
        $this->id_sale = $id_sale;
    }

    function getEnroll_id() {
        return $this->enroll_id;
    }

    function setEnroll_id($enroll_id): void {
        $this->enroll_id = $enroll_id;
    }

    function getPayment_active() {
        return $this->payment_active;
    }

    function setPayment_active($payment_active): void {
        $this->payment_active = $payment_active;
    }
    
    function getOffer_special() {
        return $this->offer_special;
    }

    function setOffer_special($offer_special): void {
        $this->offer_special = $offer_special;
    }



}

?>