<?php

/*
 * Developed by wilowi
 */

/**
 * Description of studentsPaymentModel
 *
 * @author Sandra <wilowi.com>
 */
class studentsPaymentsRefundModel extends baseModel{
	
	private $id_refund = 0;
	private $id_refund_paypal = '';
	private $id_payment_normal = '';
	private $id_payment_flex = '';
	private $state = '';
	private $amount = 0;
	private $amount_refunded = 0;
	private $amount_from_received = 0;
	private $amount_from_fee = 0;
	private $date_refund = '';
	private $id_user = 0;
	
	function __construct() {
		
		parent::__construct();		
		parent::setTable('lm_students_payments_refund');
		
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $valores='') {		
		
		$first = true;

		
		if (!empty($this->id_refund_paypal)) {
			if ($first) {
				$indices .= "id_refund_paypal";
				$valores .= "'" . $this->id_refund_paypal . "'";
				$first = false;
			} else {
				$indices .= ",id_refund_paypal";
				$valores .= ",'" . $this->id_refund_paypal . "'";
			}
		}
		
		if (!empty($this->id_payment_normal)) {
			if ($first) {
				$indices .= "id_payment_normal";
				$valores .= "'" . $this->id_payment_normal . "'";
				$first = false;
			} else {
				$indices .= ",id_payment_normal";
				$valores .= ",'" . $this->id_payment_normal . "'";
			}
		}
		
		if (!empty($this->id_payment_flex)) {
			if ($first) {
				$indices .= "id_payment_flex";
				$valores .= "'" . $this->id_payment_flex . "'";
				$first = false;
			} else {
				$indices .= ",id_payment_flex";
				$valores .= ",'" . $this->id_payment_flex . "'";
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
		
		if (!empty($this->amount_refunded)) {
			if ($first) {
				$indices .= "amount_refunded";
				$valores .= "'" . $this->amount_refunded . "'";
				$first = false;
			} else {
				$indices .= ",amount_refunded";
				$valores .= ",'" . $this->amount_refunded . "'";
			}
		}
		
		if (!empty($this->amount_from_received)) {
			if ($first) {
				$indices .= "amount_from_received";
				$valores .= "'" . $this->amount_from_received . "'";
				$first = false;
			} else {
				$indices .= ",amount_from_received";
				$valores .= ",'" . $this->amount_from_received . "'";
			}
		}
		
		if (!empty($this->amount_from_fee)) {
			if ($first) {
				$indices .= "amount_from_fee";
				$valores .= "'" . $this->amount_from_fee . "'";
				$first = false;
			} else {
				$indices .= ",amount_from_fee";
				$valores .= ",'" . $this->amount_from_fee . "'";
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
		
		
		if (!empty($this->date_refund)) {
			if ($first) {
				$indices .= "date_refund";
				$valores .= "'" . $this->date_refund . "'";
				$first = false;
			} else {
				$indices .= ",date_refund";
				$valores .= ",'" . $this->date_refund . "'";
			}
		}
		
		if (!empty($this->id_user)) {
			if ($first) {
				$indices .= "id_user";
				$valores .= "'" . $this->id_user . "'";
				$first = false;
			} else {
				$indices .= ",id_user";
				$valores .= ",'" . $this->id_user . "'";
			}
		}
		
		
		return parent::add($indices, $valores);
	}
	
	
	function getId_refund() {
	    return $this->id_refund;
	}

	function getId_refund_paypal() {
	    return $this->id_refund_paypal;
	}

	function getId_payment_normal() {
	    return $this->id_payment_normal;
	}

	function getId_payment_flex() {
	    return $this->id_payment_flex;
	}

	function getState() {
	    return $this->state;
	}

	function getAmount() {
	    return $this->amount;
	}

	function getAmount_refunded() {
	    return $this->amount_refunded;
	}

	function getAmount_from_received() {
	    return $this->amount_from_received;
	}

	function getAmount_from_fee() {
	    return $this->amount_from_fee;
	}

	function getDate_refund() {
	    return $this->date_refund;
	}

	function setId_refund($id_refund) {
	    $this->id_refund = $id_refund;
	}

	function setId_refund_paypal($id_refund_paypal) {
	    $this->id_refund_paypal = $id_refund_paypal;
	}

	function setId_payment_normal($id_payment_normal) {
	    $this->id_payment_normal = $id_payment_normal;
	}

	function setId_payment_flex($id_payment_flex) {
	    $this->id_payment_flex = $id_payment_flex;
	}

	function setState($state) {
	    $this->state = $state;
	}

	function setAmount($amount) {
	    $this->amount = $amount;
	}

	function setAmount_refunded($amount_refunded) {
	    $this->amount_refunded = $amount_refunded;
	}

	function setAmount_from_received($amount_from_received) {
	    $this->amount_from_received = $amount_from_received;
	}

	function setAmount_from_fee($amount_from_fee) {
	    $this->amount_from_fee = $amount_from_fee;
	}

	function setDate_refund($date_refund) {
	    $this->date_refund = $date_refund;
	}

	function getId_user() {
	    return $this->id_user;
	}

	function setId_user($id_user) {
	    $this->id_user = $id_user;
	}


	
	
}

?>