<?php

/*
 * Developed by wilowi
 */

/**
 * Implement a PayPal Checkout Server Integration
 * https://developer.paypal.com/docs/checkout/how-to/server-integration/#
 *
 * @author Sandra <wilowi.com>
 */
class paypal {

    private $account = '';
    private $acces_token = '';
    private $request_id = '';
    private $url = '';
    private $token_auth = '';
    private $client_id = '';
    private $secret = '';

    public function __construct() {

	if (_ENVIRONMENT == 'production') {

	    //$this->url = 'https://api.sandbox.paypal.com/v1/';
	    $this->url = 'https://api.paypal.com/v1/';
	    $this->client_id = 'AQezSiLuD7HqhcqEXenhYeQGnD_egax-h3zgo_ZTrKUNkP4p4_L-FJa2KaVmd98N1QONJft3F2p2Jvoh'; // PRODUCCION linguameeting
	    $this->secret = 'EO1x597Hp4xou4xGN9y_QwPi9zV0ngoYlYuepGbDtqwexR-YwTo00euhCIrIDDS67LPKuCCOln92SqxJ'; // PRODUCION linguameeting
	    // For Elena Paypal sandbox
	    //$this->account = 'casillaselena-facilitator@hotmail.com';
	    // testtest
	    //$this->acces_token = 'access_token$sandbox$9bkb4cg6ff5967wh$c2b431c1345abf1973cf49dca4161137';
	    //$this->client_id = 'ARwkxevJ1ZMXe2Mzsi-tvmZi7uWYnVGJO2wuu3mbACEaPGqR9EAnTk1a-jLxqoOVLJXXDjtcTPhz27Rb';
	    //$this->secret = 'EOOXkVKuKv7wmd7q5dYrcLH0_AJj7Vy18iRoNnavIzkavnjjRKBEKvCyw1wBRxujiM_7ktDbaRm43S4n';
	} else {

	    $this->url = 'https://api.sandbox.paypal.com/v1/';
	    
	    $this->client_id = 'ARwkxevJ1ZMXe2Mzsi-tvmZi7uWYnVGJO2wuu3mbACEaPGqR9EAnTk1a-jLxqoOVLJXXDjtcTPhz27Rb'; // elena test
	    $this->secret = 'EOOXkVKuKv7wmd7q5dYrcLH0_AJj7Vy18iRoNnavIzkavnjjRKBEKvCyw1wBRxujiM_7ktDbaRm43S4n'; //elena test
	    $this->account = 'casillaselena-facilitator@hotmail.com';

	    /*
	    $this->acces_token = 'access_token$sandbox$tc25qx2bg54v3jvf$b6eefa58554a10ff4145d4feb2833b7e';
	    $this->client_id = 'AS7CZJK8OIut3VUQ-Oi_jqLZYDhLW-pFIjQGsIm4Oxv8j6ZVyslxw4JeF42aUt7dYe2BnzCCIpuvvCBH'; // mi cuenta app envivolearning
	    $this->secret = 'EJrjskDwu3yybucfmw4IS9cAxvDxPhfq2YpxMCgh3ClCz71L3BivM8Nj1fX-QaFgkZiC0tzbtYPxbCFs'; // mi cuenta app envivolearning */
	}
    }
    
    public function setV2(){
	
	if (_ENVIRONMENT == 'production') {

	    $this->url = 'https://api.paypal.com/v2/';
	} else {

	    $this->url = 'https://api.sandbox.paypal.com/v2/';
	    
	}
    }
    
    public function setV1(){
	
	if (_ENVIRONMENT == 'production') {

	    $this->url = 'https://api.paypal.com/v1/';
	} else {

	    $this->url = 'https://api.sandbox.paypal.com/v1/';
	    
	}
    }

    private function sendRequest($request, $data = '', $type = '') {

	//$response = '';
	$data_send = json_encode($data);	
	$jwt = $this->generateJWT();
	
	// --- generate token
	$this->generateAuth();
	$this->setV2();
	$url = $this->url . $request;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_URL, $url);

	if (empty($data)) { // --- For GET request
	    curl_setopt($ch, CURLOPT_POST, FALSE);
	    curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
	} else { // --- For POST request
	    curl_setopt($ch, CURLOPT_POST, TRUE);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_send);
	}
	
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	// add token to the authorization header
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'Authorization: Bearer ' . $this->token_auth,
	    'Content-Type: application/json'
	));	

	$response = curl_exec($ch);
	curl_close($ch);

	//var_dump($res);		
	return json_decode($response);
    }
    
    private function sendRequest2($request, $data = '', $type = '') {

	//$response = '';
	$data_send = json_encode($data);
	
	
	//echo print_r($url);
	// --- generate token
	$this->generateAuth();
	$this->setV2();
	$url = $this->url . $request;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_URL, $url);

	if (empty($data)) { // --- For GET request
	    curl_setopt($ch, CURLOPT_POST, FALSE);
	    curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
	} else { // --- For POST request
	    curl_setopt($ch, CURLOPT_POST, TRUE);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_send);
	}

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'Authorization: Bearer ' . $this->token_auth,
	    'Content-Type: application/json'
	));	

	$response = curl_exec($ch);
	curl_close($ch);

	//var_dump($res);		
	return json_decode($response);
    }
    
    private function sendRequest3($request, $data = '', $type = '') {

	//$response = '';
	$data_send = json_encode($data);
	

	//echo print_r($url);
	// --- generate token
	$this->generateAuth();
	$this->setV2();
	$url = $this->url . $request;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_URL, $url);

	if (empty($data)) { // --- For GET request
	    curl_setopt($ch, CURLOPT_POST, FALSE);
	    curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
	} else { // --- For POST request
	    curl_setopt($ch, CURLOPT_POST, TRUE);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_send);
	}

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'Authorization: Bearer ' . $this->token_auth,
	    'Content-Type: application/json',
	    'PayPal-Request-Id: '.$this->request_id
	));	

	$response = curl_exec($ch);
	curl_close($ch);

			
	return json_decode($response);
    }

    private function sendRequestAuth($request, $data = '') {

	$response = '';
	$url = $this->url . $request;


	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
	//curl_setopt($ch, CURLOPT_SSLVERSION , 6);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_USERPWD, $this->client_id . ":" . $this->secret);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$response = curl_exec($ch);
	curl_close($ch);

	return json_decode($response);
    }

    public function generateAuth() {

	$request = 'oauth2/token';

	$data = 'grant_type=client_credentials';
	
	$this->setV1();
	$result = $this->sendRequestAuth($request, $data);

	$this->token_auth = $result->access_token;
    }
    
    public function generateJWT(){
	
	$jose = '{"alg":"none"}';
	$payload = '{"iss": "'.$this->client_id.'","client_id": "'.$this->client_id.'"}';
	$signature = '""';
	
	$result = base64_encode($jose).'.'. base64_encode($payload).'.'. base64_encode($signature);
	
	return $result;
	
    }

    public function createPayment($info) {

	$request = 'payments/payment';

	return $this->sendRequest($request, $info);
    }
    
    public function createPaymentV2($info){
	
	$request = 'checkout/orders';

	return $this->sendRequest($request, $info);
	
    }

    public function getPayment($id) {

	$request = 'payments/payment/' . $id;

	return $this->sendRequest2($request);
    }
    
    public function getCapture($id) {

	$request = 'payments/captures/' . $id;

	return $this->sendRequest2($request);
    }

    public function listPayments() {

	$request = 'payments/payment?count=20&start_index=0&sort_by=create_time&sort_order=desc';

	return $this->sendRequest2($request);
    }

    public function executePayment($id, $payer_id) {

	$request = 'payments/payment/' . $id . '/execute';

	$data = new stdClass();
	$data->payer_id = $payer_id;

	return $this->sendRequest($request, $data);
    }
    
    public function executePaymentV2($id,$payer_id) {

	$request = 'checkout/orders/' . $id . '/capture';
	$this->request_id = generarCodigo(8).'-'.generarCodigo(4).'-'.generarCodigo(4).'-'.generarCodigo(4).'-'.generarCodigo(12);

	$data = new stdClass();
	$data->payer_id = $payer_id;
	$data->order_id = $id;
	return $this->sendRequest3($request,$data);
    }

    public function getPaymentOrderV2($id) {
        $request = 'checkout/orders/' . $id;
        return $this->sendRequest2($request);
    }

    public function getSale($id) {

	$request = 'payments/sale/' . $id; // id sale
	return $this->sendRequest2($request);
    }

    public function createPaymentExperience() {

	$request = 'payment-experience/web-profiles';

	$data = new stdClass();
	$data->name = 'linguameetingProfile';
	$data->presentation = new stdClass();
	$data->presentation->logo_image = 'https://www.paypal.com';
	$data->input_fields = new stdClass();
	$data->input_fields->no_shipping = 1;
	$data->input_fields->address_override = 1;
	$data->flow_config = new stdClass();
	$data->flow_config->landing_page_type = 'billing';
	$data->flow_config->bank_txn_pending_url = 'https://www.paypal.com';

	return $this->sendRequest($request);
    }

    public function refund($id,$data) {
	
	$request = 'payments/sale/'.$id.'/refund';
	
	// --- Example: 123e4567-e89b-12d3-a456-426655440020
	$this->request_id = generarCodigo(8).'-'.generarCodigo(4).'-'.generarCodigo(4).'-'.generarCodigo(4).'-'.generarCodigo(12);
	
	return $this->sendRequest3($request,$data);
    }
    
    public function refundV2($id,$data) {
	
	$request = 'payments/captures/'.$id.'/refund';
	
	// --- Example: 123e4567-e89b-12d3-a456-426655440020
	$this->request_id = generarCodigo(8).'-'.generarCodigo(4).'-'.generarCodigo(4).'-'.generarCodigo(4).'-'.generarCodigo(12);
	
	return $this->sendRequest3($request,$data);
    }
    
    public function viewRefund($id) {
	
	$request = 'payments/refund/'.$id;
	
	return $this->sendRequest2($request);
    }
    
    public function viewRefundV2($id) {
	
	$request = 'payments/refund/'.$id;
	
	return $this->sendRequest2($request);
    }

}
