<?php

/*
 * Developed by wilowi
 */

/**
 * Description of coachBillingInfoModel
 *
 * @author Sandra <wilowi.com>
 */
class coachBillingInfoModel extends baseModel{
	
	private $id_user = 0;
	private $full_name = '';
	private $bank_name = '';
	private $bank_account = '';
	private $other_type_pay = 0;
	private $bank_observations = '';
	private $ind = '';
	private $currency = 0;
	private $swift = '';
	private $address = '';
	private $postal_code = 0;
	private $city = '';
	private $paypal_email = '';
	
	function __construct() {

		parent::__construct();
		parent::setTable('lm_coach_billing_info');
	}
	
	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function add($indices='', $values='') {
		
		$first = true;
		
		if (!empty($this->id_user)) {
			if ($first) {
				$indices .= "id_user";
				$values .= $this->id_user;
				$first = false;
			} else {
				$indices .= ",id_user";
				$values .= "," . $this->id_user;
			}
		}


		if (!empty($this->full_name)) {
			if ($first) {
				$indices .= "full_name";
				$values .= "'" . $this->full_name . "'";
				$first = false;
			} else {
				$indices .= ",full_name";
				$values .= ",'" . $this->full_name . "'";
			}
		}
		
		if (!empty($this->bank_account)) {
			if ($first) {
				$indices .= "bank_account";
				$values .= "'" . $this->bank_account . "'";
				$first = false;
			} else {
				$indices .= ",bank_account";
				$values .= ",'" . $this->bank_account . "'";
			}
		}
		
		if (!empty($this->bank_name)) {
			if ($first) {
				$indices .= "bank_name";
				$values .= "'" . $this->bank_name . "'";
				$first = false;
			} else {
				$indices .= ",bank_name";
				$values .= ",'" . $this->bank_name . "'";
			}
		}
		
		if (!empty($this->bank_observations)) {
			if ($first) {
				$indices .= "bank_observations";
				$values .= "'" . $this->bank_observations . "'";
				$first = false;
			} else {
				$indices .= ",bank_observations";
				$values .= ",'" . $this->bank_observations . "'";
			}
		}
		
		if (!empty($this->other_type_pay)) {
			if ($first) {
				$indices .= "other_type_pay";
				$values .= $this->other_type_pay;
				$first = false;
			} else {
				$indices .= ",other_type_pay";
				$values .= "," . $this->other_type_pay;
			}
		}
		
		if (!empty($this->ind)) {
			if ($first) {
				$indices .= "ind";
				$values .= "'" . $this->ind . "'";
				$first = false;
			} else {
				$indices .= ",ind";
				$values .= ",'" . $this->ind . "'";
			}
		}
		
		if (!empty($this->currency)) {
			if ($first) {
				$indices .= "currency";
				$values .= $this->currency;
				$first = false;
			} else {
				$indices .= ",currency";
				$values .= "," . $this->currency;
			}
		}
		
		if (!empty($this->swift)) {
			if ($first) {
				$indices .= "swift";
				$values .= "'" . $this->swift . "'";
				$first = false;
			} else {
				$indices .= ",swift";
				$values .= ",'" . $this->swift . "'";
			}
		}
		
		if (!empty($this->address)) {
			if ($first) {
				$indices .= "address";
				$values .= "'" . $this->address . "'";
				$first = false;
			} else {
				$indices .= ",address";
				$values .= ",'" . $this->address . "'";
			}
		}
		
		if (!empty($this->postal_code)) {
			if ($first) {
				$indices .= "postal_code";
				$values .= "'" . $this->postal_code . "'";
				$first = false;
			} else {
				$indices .= ",postal_code";
				$values .= ",'" . $this->postal_code . "'";
			}
		}
		
		if (!empty($this->city)) {
			if ($first) {
				$indices .= "city";
				$values .= "'" . $this->city . "'";
				$first = false;
			} else {
				$indices .= ",city";
				$values .= ",'" . $this->city . "'";
			}
		}
		
		if (!empty($this->paypal_email)) {
			if ($first) {
				$indices .= "paypal_email";
				$values .= "'" . $this->paypal_email . "'";
				$first = false;
			} else {
				$indices .= ",paypal_email";
				$values .= ",'" . $this->paypal_email . "'";
			}
		}
		
		return parent::add($indices, $values);
	}

	public function delete($where) {
		return parent::delete($where);
	}

	public function update($campos='', $where = '') {		
		
		$where = 'id_user='.$this->id_user;
		$first = true;
		
		if(!empty($this->full_name)){
			if ($first) {
				$campos.=" full_name='".$this->full_name."'";
				$first = false;
			} else {
				$campos.=", full_name='".$this->full_name."'";
			}
			
		}

		if(!empty($this->bank_name)){
			if ($first) {
				$campos.=" bank_name='".$this->bank_name."'";
				$first = false;
			} else {
				$campos.=", bank_name='".$this->bank_name."'";
			}
			
		}
		
		if(!empty($this->bank_account)){
			if ($first) {
				$campos.=" bank_account='".$this->bank_account."'";
				$first = false;
			} else {
				$campos.=", bank_account='".$this->bank_account."'";
			}
			
		}

		//if(!empty($this->bank_observations)){
			if ($first) {
				$campos.=" bank_observations='".$this->bank_observations."'";
				$first = false;
			} else {
				$campos.=", bank_observations='".$this->bank_observations."'";
			}
			
		//}		
		

			if ($first) {
				$campos.=" other_type_pay=".$this->other_type_pay;
				$first = false;
			} else {
				$campos.=", other_type_pay=".$this->other_type_pay;
			}

		
		if(!empty($this->ind)){
			if ($first) {
				$campos.=" ind='".$this->ind."'";
				$first = false;
			} else {
				$campos.=", ind='".$this->ind."'";
			}
			
		}	
		
		if(!empty($this->currency)){
			if ($first) {
				$campos.=" currency=".$this->currency;
				$first = false;
			} else {
				$campos.=", currency=".$this->currency;
			}
			
		}
		
		if(!empty($this->swift)){
			if ($first) {
				$campos.=" swift='".$this->swift."'";
				$first = false;
			} else {
				$campos.=", swift='".$this->swift."'";
			}
			
		}
		
		if(!empty($this->address)){
			if ($first) {
				$campos.=" address='".$this->address."'";
				$first = false;
			} else {
				$campos.=", address='".$this->address."'";
			}
			
		}
		
		if(!empty($this->postal_code)){
			if ($first) {
				$campos.=" postal_code='".$this->postal_code."'";
				$first = false;
			} else {
				$campos.=", postal_code='".$this->postal_code."'";
			}
			
		}
		
		if(!empty($this->city)){
			if ($first) {
				$campos.=" city='".$this->city."'";
				$first = false;
			} else {
				$campos.=", city='".$this->city."'";
			}
			
		}
		
		//if(!empty($this->city)){
			if ($first) {
				$campos.=" paypal_email='".$this->paypal_email."'";
				$first = false;
			} else {
				$campos.=", paypal_email='".$this->paypal_email."'";
			}
			
		//}
		
		
		
		return parent::update($campos, $where);
	}
	
	function getId_user() {
		return $this->id_user;
	}

	function getFull_name() {
		return $this->full_name;
	}

	function getBank_name() {
		return $this->bank_name;
	}

	function getBank_account() {
		return $this->bank_account;
	}

	function getOther_type_pay() {
		return $this->other_type_pay;
	}

	function getBank_observations() {
		return $this->bank_observations;
	}

	function setId_user($id_user) {
		$this->id_user = $id_user;
	}

	function setFull_name($full_name) {
		$this->full_name = $full_name;
	}

	function setBank_name($bank_name) {
		$this->bank_name = $bank_name;
	}

	function setBank_account($bank_account) {
		$this->bank_account = $bank_account;
	}

	function setOther_type_pay($other_type_pay) {
		$this->other_type_pay = $other_type_pay;
	}

	function setBank_observations($bank_observations) {
		$this->bank_observations = $bank_observations;
	}

	function getInd() {
		return $this->ind;
	}

	function getCurrency() {
		return $this->currency;
	}

	function setInd($ind) {
		$this->ind = $ind;
	}

	function setCurrency($currency) {
		$this->currency = $currency;
	}
	
	function getSwift() {
	    return $this->swift;
	}

	function getAddress() {
	    return $this->address;
	}

	function getPostal_code() {
	    return $this->postal_code;
	}

	function getCity() {
	    return $this->city;
	}

	function setSwift($swift) {
	    $this->swift = $swift;
	}

	function setAddress($address) {
	    $this->address = $address;
	}

	function setPostal_code($postal_code) {
	    $this->postal_code = $postal_code;
	}

	function setCity($city) {
	    $this->city = $city;
	}

	function getPaypal_email() {
	    return $this->paypal_email;
	}

	function setPaypal_email($paypal_email) {
	    $this->paypal_email = $paypal_email;
	}



	
}
