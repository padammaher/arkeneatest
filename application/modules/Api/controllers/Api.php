<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller {

    function __construct() {

        parent::__construct();
        $this->load->database();
        $this->load->helper('string');
   //     $this->load->model('language');
// Configure limits on our controller methods
// Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 500; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	    public function index_get() {
        $message = [
            'message' => 'Invalid method',
            'status' => 'Failed',
            'code' => '0',
        ];
        $this->set_response($message, REST_Controller::HTTP_OK);
    }

    public function index_getww() {
        $this->$message = [
            'message' => 'Invalid method',
            'status' => 'Failed',
            'code' => '0',
        ];
        $this->set_response($message, REST_Controller::HTTP_OK);
    }
	
	
	
	    public function login_post() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $check_auth_client = $this->ApiModel->check_auth_client();
            if ($check_auth_client == true) {
                $params = json_decode(file_get_contents('php://input'), TRUE);
				//var_dump($prams);
				//echo '-------';
				//var_dump($_POST);
                //$username = $params['username'];
                //$password = $params['password'];
				$username=$_POST['username'];				
				$password = $_POST['password'];
			
                $response = $this->ApiModel->login($username, $password);
                //json_output($response['status'], $response);
				$this->set_response($response, REST_Controller::HTTP_OK);
            }
        }
    }

    public function logout_post() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $check_auth_client = $this->ApiModel->check_auth_client();
            if ($check_auth_client == true) {
                $response = $this->ApiModel->logout();
                json_output($response['status'], $response);
            }
        }
    }

  	public function create_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->ApiModel->check_auth_client();
			if($check_auth_client == true){
		        $response = $this->ApiModel->auth();
		        $respStatus = $response['status'];
		        if($response['status'] == 200){
					$params = json_decode(file_get_contents('php://input'), TRUE);
					if ($params['serial_num'] == "") {
					//	if ($_POST['serial_num'] == "") {
						$respStatus = 400;
						$resp = array('status' => 400,'message' =>  'Fields empty');
					} else {
		        		$resp = $this->ApiModel->temp_create_data($params);
						//$resp = $this->ApiModel->temp_create_data($_POST);
					}
					//json_output($respStatus,$resp);
					$this->set_response($resp, REST_Controller::HTTP_OK);
		        }
			}
		}
	}

}
