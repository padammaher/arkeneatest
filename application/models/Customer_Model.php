<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->config->load('ion_auth', TRUE);
        $this->load->helper('cookie');
        $this->load->helper('date');
        $this->lang->load('ion_auth');
    }

    public function add_customer($data) {
        $alreadyexit = $this->db->from('user_details')->where('user_id', $user_id)->get()->result();
        if (!$alreadyexit) {
            $this->db->insert('user_details', $data);
        } else {
            echo "user already added";
        }
        return true;
    }

    public function get_customer_detail($user_id) {
        //$this->db->select('id,customer_name,customer_address,contact_per_name,Telephone,Mobile,Email,user_id');
        $this->db->from('users');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        $resultdata = $query->result();
        return $resultdata;
    }

    public function update_customer_detail($data, $user_id) {
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
        return true;
    }

    public function get_client_list($user_id){
        $client_data=$this->db->from('branch_user')->where('user_id',$user_id)->get()->result();
        return $client_data; 

    }
    public function add_client_detail($data) {
        //  print_r($data['client_username']); exit() ;
        $alreadyexit = $this->db->select('id')->from('branch_user')->where('client_username', $data['client_username'])->get()->result();
        if (count($alreadyexit) > 0) {

            return 2;
        } else {
            $this->db->insert('branch_user', $data);
            return 1;
        }

    }

  /*  public function get_client_list() {
        $client_data = $this->db->from('branch_user')->get()->result();
//        $this->db->select('branch_user.id,branch_user.client_name,branch_user.client_username,customer_business_location.location_name as client_location');
//        $this->db->from('branch_user');
//        $this->db->join('customer_business_location', 'branch_user.client_location=customer_business_location.id');
//        $client_data = $this->db->get()->result();

        return $client_data;
    }*/

    public function get_client_detail($user_id) {
        $client_data = $this->db->from('branch_user')->where('id', $user_id)->get()->result();
        return $client_data;
    }

    public function update_client_detail($data, $id) {
        //print_r($id); exit();
        $this->db->where('id', $id);
        $this->db->update('branch_user', $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return false;
        }
    }

    public function delete_client_detail($client_id) {
        $this->db->where('id', $client_id);
        $this->db->delete('branch_user');
        return true;
    }

    public function add_business_location($data) {
        $this->db->insert('customer_business_location', $data);
        return true;
    }

    /*public function get_business_list($user_id){
       
        $this->db->select('customer_business_location.*,city.name as city_name,country.name as country_name,state.name as state_name'); 
        $this->db->from('customer_business_location'); 
    }*/

    public function get_business_list($user_id) {

        $this->db->select('customer_business_location.*,city.name as city_name,country.name as country_name,state.name as state_name');
        $this->db->from('customer_business_location');

        $this->db->join('city', 'customer_business_location.city = city.id', 'left');
        $this->db->join('country', 'customer_business_location.country = country.id', 'left');
        $this->db->join('state', 'customer_business_location.state = state.id', 'left');
        $this->db->where('user_id', $user_id);        
        $this->db->order_by("customer_business_location.id", "desc");
        $query = $this->db->get();
        $business_data = $query->result();
        //$client_data=$this->db->from('customer_business_location')->where('id',$user_id)->get()->result();
        //var_dump($business_data); exit(); 
        return $business_data;
    }

    public function get_business_detail($id) {
        $busineess_data = $this->db->from('customer_business_location')->where('id', $id)->get()->result();
        return $busineess_data;
    }

    public function update_busineess_location($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('customer_business_location', $data);
        return true;
    }

    public function delete_business_location_data($business_id) {
        $this->db->where('id', $business_id);
        $this->db->delete('customer_business_location');
        return true;
    }

    public function get_country() {
        $country_data = $this->db->select('id,name')->from('country')->get()->result();
        return $country_data;
    }

    public function get_state_list($id) {
        $state_data = $this->db->select('id,name')->from('state')->where('country_id', $id)->get()->result();
        return $state_data;
    }

    public function get_city_list($id) {

        $city_data = $this->db->select('id,name')->from('city')->where('state_id', $id)->get()->result();

        return $city_data;
    }

    public function get_customer_location() {

        $location_data = $this->db->select('DISTINCT(location_name)')->from('customer_business_location')->get()->result();
        return $location_data;
    }

}
