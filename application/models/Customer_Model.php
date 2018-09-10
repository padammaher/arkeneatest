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
    public function add_customer($data){
       $alreadyexit=  $this->db->from('user_details')->where('user_id',$user_id)->get()->result(); 
       if(!$alreadyexit){
        $this->db->insert('user_details',$data); 
       }else{
         echo "user already added"; 
       }
        return true; 
    }
    public function get_customer_detail($user_id){
        //$this->db->select('id,customer_name,customer_address,contact_per_name,Telephone,Mobile,Email,user_id');
        $this->db->from('users'); 
        $this->db->where('id',$user_id); 
        $query= $this->db->get();
        $resultdata= $query->result(); 
       return $resultdata; 
    }
    public function update_customer_detail($data,$user_id){
        $this->db->where('id',$user_id); 
        $this->db->update('users', $data);  
        return true; 
    }

    public function add_client_detail($data){
        $this->db->insert('branch_user',$data); 
        return true; 

    }
    public function get_client_list(){
        $client_data=$this->db->from('branch_user')->get()->result();
        return $client_data; 
    }
    

    public function get_client_detail($user_id){
        $client_data=$this->db->from('branch_user')->where('id',$user_id)->get()->result();
        return $client_data; 
    }

    public function update_client_detail($data,$id){
        //print_r($id); exit();
        $this->db->where('id',$id); 
        $this->db->update('branch_user', $data);  
        return true; 
    }
    public function delete_client_detail($client_id){
        $this->db->where('id', $client_id);
        $this->db->delete('branch_user'); 
        return true;

    }
    public function add_business_location($data){
        $this->db->insert('customer_business_location',$data);
        return true; 
    }
    public function get_business_list(){
        $client_data=$this->db->from('customer_business_location')->get()->result();
        //$client_data=$this->db->from('customer_business_location')->where('id',$user_id)->get()->result();
        
        return $client_data; 
    }
    public function get_business_detail($id){
        $busineess_data=$this->db->from('customer_business_location')->where('id',$id)->get()->result();
        return $busineess_data; 
    }
    public function update_busineess_location($data,$id)
    {
        $this->db->where('id',$id); 
        $this->db->update('customer_business_location', $data);  
        return true; 
    }
    public function delete_business_location_data($business_id){
        $this->db->where('id', $business_id);
        $this->db->delete('customer_business_location'); 
        return true;
    }
    public function get_country(){
        $country_data=$this->db->select('id,name')->from('country')->get()->result();
       return $country_data;
    }
    public function get_state_list($id){
        $state_data=$this->db->select('id,name')->from('state')->where('country_id',$id)->get()->result();
       return $state_data;
    }
    public function get_city_list($id){
       
        $city_data=$this->db->select('id,name')->from('city')->where('state_id',$id)->get()->result();
        
        return $city_data;
    }
    
    
}
