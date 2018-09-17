<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->model(array('users', 'group_model', 'country', 'Customer_Model'));
        // $this->load->helper(array('url', 'language'));
        $this->load->helper(array('url', 'language', 'form', 'master_helper'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }

    // redirect if needed, otherwise display the user list
    public function index() {
        $user_id = $this->session->userdata('user_id');
        $this->data['dataHeader'] = $this->users->get_allData($user_id);
        load_view_template($this->data, 'add_customer');
        // $this->template->set_master_template('template.php');
        // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
        // $this->template->write_view('content', 'add_customer', (isset($this->data) ? $this->data : NULL), TRUE);
        // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
        // $this->template->render();
    }

    public function AddCustomer() {

        $user_id = $this->session->userdata('user_id');
        $user = $this->ion_auth->user($user_id)->row();
        $this->data['country'] = $country = $this->Customer_Model->get_country();
        $this->data['user_name'] = $user->first_name . ' ' . $user->last_name;
        $this->data['user_id'] = $user_id;
        $this->template->set_master_template('template.php');
        $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
        $this->template->write_view('content', 'add_customer', (isset($this->data) ? $this->data : NULL), TRUE);
        $this->template->write_view('footer', 'snippets/footer', '', TRUE);
        $this->template->render();
    }

    public function add_customer_detail() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        } else {

            if ($this->input->post('customer_address'))
                $additional_data['customer_address'] = $this->input->post('customer_address');
            if ($this->input->post('contact_person'))
                $additional_data['contact_person'] = $this->input->post('contact_person');
            if ($this->input->post('country_id'))
                $additional_data['country_id'] = $this->input->post('country_id');
            if ($this->input->post('state_id'))
                $additional_data['state_id'] = $this->input->post('state_id');
            if ($this->input->post('city_id'))
                $additional_data['city_id'] = $this->input->post('city_id');
            if ($this->input->post('pincode'))
                $additional_data['pincode'] = $this->input->post('pincode');
            if ($this->input->post('phone'))
                $additional_data['phone'] = $this->input->post('phone');
            if ($this->input->post('mobile'))
                $additional_data['mobile'] = $this->input->post('mobile');
            if ($this->input->post('email'))
                $additional_data['email'] = $this->input->post('email');

            $this->Customer_Model->add_customer($additional_data);
            $user_id = $this->session->userdata('user_id');
            $this->data['user_detail'] = $this->Customer_Model->get_customer_detail($user_id);
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'customer_info', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function edit_customer_detail() {

        $user_id = $this->session->userdata('user_id');
        $this->data['user_detail'] = $user_data = $this->Customer_Model->get_customer_detail($user_id);
        $this->data['country'] = $country = $this->Customer_Model->get_country();
        // print_r($user_data); exit(); 
        if (isset($user_data[0]->country_id))
            $this->data['state'] = $this->Customer_Model->get_state_list($user_data[0]->country_id);
        if (isset($user_data[0]->state_id))
            $this->data['city'] = $this->Customer_Model->get_city_list($user_data[0]->state_id);

        // $this->data['user_name']=$user->first_name.' '.$user->last_name; 
        $this->data['user_id'] = $user_id;
        // print_r($this->data); exit(); 
        $this->data['dataHeader'] = $this->users->get_allData($user_id);
        load_view_template($this->data, 'Edit_customer_info');
        // $this->template->set_master_template('template.php');
        // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
        // $this->template->write_view('content', 'Edit_customer_info', (isset($this->data) ? $this->data : NULL), TRUE);
        // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
        // $this->template->render();
    }

    public function update_cutomer_info() {
        if (!$this->ion_auth->logged_in() ) {
            redirect('auth', 'refresh');
        } else {
            $user_id = $this->session->userdata('user_id');
            if ($this->input->post('customer_address'))
                $additional_data['customer_address'] = $this->input->post('customer_address');
            if ($this->input->post('contact_person'))
                $additional_data['contact_person'] = $this->input->post('contact_person');
            if ($this->input->post('country_id'))
                $additional_data['country_id'] = $this->input->post('country_id');
            if ($this->input->post('state_id'))
                $additional_data['state_id'] = $this->input->post('state_id');
            if ($this->input->post('city_id'))
                $additional_data['city_id'] = $this->input->post('city_id');
            if ($this->input->post('pincode'))
                $additional_data['pincode'] = $this->input->post('pincode');
            if ($this->input->post('phone'))
                $additional_data['phone'] = $this->input->post('phone');
            if ($this->input->post('mobile'))
                $additional_data['mobile'] = $this->input->post('mobile');
            if ($this->input->post('email'))
                $additional_data['email'] = $this->input->post('email');
            if ($this->input->post('user_id'))
                $update_user_id = $this->input->post('user_id');

            $this->Customer_Model->update_customer_detail($additional_data, $update_user_id);

            $this->session->set_flashdata('success_msg', 'customer information update sucessfully');
            redirect('Customerinfo', 'refresh');
            //  $this->data['user_detail'] =$this->Customer_Model->get_customer_detail($update_user_id); 
            //  $this->data['dataHeader'] = $this->users->get_allData($user_id);
            //  load_view_template($this->data, 'customer_info');
            //  $this->template->set_master_template('template.php');
            //  $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            //  $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            //  $this->template->write_view('content', 'customer_info', (isset($this->data) ? $this->data : NULL), TRUE);
            //  $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            //  $this->template->render();
        }
    }

    public function customer_info() {
        $user_id = $this->session->userdata('user_id');
        $this->data['dataHeader'] = $this->users->get_allData($user_id);
        $this->data['user_detail'] = $this->Customer_Model->get_customer_detail($user_id);
        load_view_template($this->data, 'customer_info');
    }




    public function client_user_list() {
        $user_id = $this->session->userdata('user_id');
        $this->data['client_details'] = $this->Customer_Model->get_client_list();
        $data1['client_details'] = $this->Customer_Model->get_client_list();


        $this->data['dataHeader'] = $this->users->get_allData($user_id);
        load_view_template($this->data, 'client_user_list');
        // $this->template->set_master_template('template.php');
        // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
        // $this->template->write_view('content', 'client_user_list', (isset($this->data) ? $this->data : NULL), TRUE);
        // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
        // $this->template->render();
    }

    public function client_user_add() {
        $user_id = $this->session->userdata('user_id');
        $this->data['user_id'] = $user_id;

        $this->data['country'] = $country = $this->Customer_Model->get_customer_location();
        $this->data['dataHeader'] = $this->users->get_allData($user_id);
        load_view_template($this->data, 'client_user_add');
        // $this->template->set_master_template('template.php');
        // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
        // $this->template->write_view('content', 'client_user_add', (isset($this->data) ? $this->data : NULL), TRUE);
        // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
        // $this->template->render();
    }

    public function add_client_detail() {

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        } else {
            if ($this->input->post('admin_user_id'))
                $additional_data['user_id'] = $this->input->post('admin_user_id');
            if ($this->input->post('client_name'))
                $additional_data['client_name'] = $this->input->post('client_name');
            if ($this->input->post('client_location'))
                $additional_data['client_location'] = $this->input->post('client_location');
            if ($this->input->post('client_username'))
                $additional_data['client_username'] = $this->input->post('client_username');
            if ($this->input->post('password'))
                $additional_data['password'] = $this->input->post('password');
            if ($this->input->post('status'))
                $additional_data['status'] = $this->input->post('status');

            $alreadyexist = $this->Customer_Model->add_client_detail($additional_data);
            if ($alreadyexist == 2) {
                $this->session->set_flashdata('error_msg', 'This user name already Exist');
                $user_id = $this->session->userdata('user_id');
                $this->data['user_id'] = $user_id;
                $this->data['dataHeader'] = $this->users->get_allData($user_id);
                load_view_template($this->data, 'client_user_add');
                // $this->template->set_master_template('template.php');
                // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
                // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
                // $this->template->write_view('content', 'client_user_add', (isset($this->data) ? $this->data : NULL), TRUE);
                // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
                // $this->template->render();
            } else {
                $this->session->set_flashdata('success_msg', 'Client added sucessfully');
                redirect('Customer/client_user_list', 'refresh');
                // $this->data['client_details']= $this->Customer_Model->get_client_list();
                // $this->data['dataHeader'] = $this->users->get_allData($user_id);
                // load_view_template($this->data, 'client_user_list');
                // $this->template->set_master_template('template.php');
                // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
                // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
                // $this->template->write_view('content', 'client_user_list', (isset($this->data) ? $this->data : NULL), TRUE);
                // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
                // $this->template->render();
            }
        }
        // 
    }

    public function edit_client_user() {
        $user_id = $this->session->userdata('user_id');
        $client_id = $this->input->get('client_id');
        $this->data['client_details'] = $this->Customer_Model->get_client_detail($client_id);
        $this->data['dataHeader'] = $this->users->get_allData($user_id);
        load_view_template($this->data, 'edit_client_user');
        // $this->template->set_master_template('template.php');
        // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
        // $this->template->write_view('content', 'edit_client_user', (isset($this->data) ? $this->data : NULL), TRUE);
        // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
        // $this->template->render();
    }

   /* public function update_client_detail() {
        $user_id = $this->session->userdata('user_id');
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        } else {

            if ($this->input->post('id'))
                $id = $this->input->post('id');

            if ($this->input->post('srno'))
                $additional_data['srno'] = $this->input->post('srno');
            if ($this->input->post('client_name'))
                $additional_data['client_name'] = $this->input->post('client_name');
            if ($this->input->post('client_location'))
                $additional_data['client_location'] = $this->input->post('client_location');
            if ($this->input->post('client_username'))
                $additional_data['client_username'] = $this->input->post('client_username');
            if ($this->input->post('password'))
                $additional_data['password'] = $this->input->post('password');
            if ($this->input->post('status'))
                $additional_data['status'] = $this->input->post('status');

            $update_record = $this->Customer_Model->update_client_detail($additional_data, $id);
            if ($update_record) {
                $this->session->set_flashdata('success_msg', 'This user record update sucessfully');
            } else {
                $this->session->set_flashdata('error_msg', 'This user record update failed');
            }
            redirect('Customer/client_user_list', 'refresh');
            //    $this->data['client_details']= $this->Customer_Model->get_client_list();
            //     $this->data['dataHeader'] = $this->users->get_allData($user_id);
            //     load_view_template($this->data, 'client_user_list');
            // $this->template->set_master_template('template.php');
            // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            // $this->template->write_view('content', 'client_user_list', (isset($this->data) ? $this->data : NULL), TRUE);
            // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            // $this->template->render();
        }
    }*/

    public function delete_client_user() {
        $client_id = $this->input->get('client_id');
        $this->data['client_details'] = $this->Customer_Model->delete_client_detail($client_id);
        $this->data['client_details'] = $this->Customer_Model->get_client_list();
        $this->session->set_flashdata('success_msg', 'This client record delete sucessfully');
        $user_id = $this->session->userdata('user_id');
        $this->data['dataHeader'] = $this->users->get_allData($user_id);
        load_view_template($this->data, 'client_user_list');
        // $this->template->set_master_template('template.php');
        // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
        // $this->template->write_view('content', 'client_user_list', (isset($this->data) ? $this->data : NULL), TRUE);
        // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
        // $this->template->render();
    }

   public function update_client_detail()
   {
    $user_id = $this->session->userdata('user_id');
    if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
        redirect('auth', 'refresh');
    }else{   
    
     if($this->input->post('id'))
      $id=$this->input->post('id');

     if($this->input->post('srno'))
      $additional_data['srno']=$this->input->post('srno');
     if($this->input->post('client_name'))
     $additional_data['client_name']=$this->input->post('client_name'); 
     if($this->input->post('client_location'))
     $additional_data['client_location']=$this->input->post('client_location');
     if($this->input->post('client_username'))
     $additional_data['client_username']=$this->input->post('client_username'); 
     if($this->input->post('password'))
     $additional_data['password']=$this->input->post('password'); 
     if($this->input->post('status'))
     $additional_data['status']=$this->input->post('status');
     
    $update_record= $this->Customer_Model->update_client_detail($additional_data,$id); 
    if($update_record){
        $this->session->set_flashdata('success_msg','This user record update sucessfully');
    }else{
        $this->session->set_flashdata('error_msg','This user record update failed');
    }
    redirect('Customer/client_user_list', 'refresh');
    //    $this->data['client_details']= $this->Customer_Model->get_client_list();
    //     $this->data['dataHeader'] = $this->users->get_allData($user_id);
    //     load_view_template($this->data, 'client_user_list');
    // $this->template->set_master_template('template.php');
    // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
    // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
    // $this->template->write_view('content', 'client_user_list', (isset($this->data) ? $this->data : NULL), TRUE);
    // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
    // $this->template->render();
    }
   }

   /*public function delete_client_user()
   {
    $client_id= $this->input->get('client_id'); 
    $this->data['client_details']= $this->Customer_Model->delete_client_detail($client_id);
    $this->data['client_details']= $this->Customer_Model->get_client_list();
    $this->session->set_flashdata('success_msg','This client record delete sucessfully');
    $user_id = $this->session->userdata('user_id');
    $this->data['dataHeader'] = $this->users->get_allData($user_id);
    load_view_template($this->data, 'client_user_list');
    // $this->template->set_master_template('template.php');
    // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
    // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
    // $this->template->write_view('content', 'client_user_list', (isset($this->data) ? $this->data : NULL), TRUE);
    // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
    // $this->template->render();
   }*/
   public function customer_business_location_list()
   {
       $user_id = $this->session->userdata('user_id');
    $this->data['location_detail']=  $this->Customer_Model->get_business_list($user_id); 
    
    $this->data['dataHeader'] = $this->users->get_allData($user_id);
    load_view_template($this->data, 'customer_business_location_list');
    // $this->template->set_master_template('template.php');
    // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
    // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
    // $this->template->write_view('content', 'customer_business_location_list', (isset($this->data) ? $this->data : NULL), TRUE);
    // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
    // $this->template->render();

   }

   public function add_customer_business_location()
   {
    $this->data['country']=$country=$this->Customer_Model->get_country();
    $user_id = $this->session->userdata('user_id');
    $this->data['dataHeader'] = $this->users->get_allData($user_id);
    load_view_template($this->data, 'customer_business_location_add');
    // $this->template->set_master_template('template.php');
    // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
    // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
    // $this->template->write_view('content', 'customer_business_location_add', (isset($this->data) ? $this->data : NULL), TRUE);
    // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
    // $this->template->render();

   }
   public function add_business_location(){
    if (!$this->ion_auth->logged_in() ) {
        redirect('auth', 'refresh');
    }else{  

        if($this->input->post('location_name'))
        $additional_data['location_name']=$this->input->post('location_name');
        if($this->input->post('address'))
        $additional_data['address']=$this->input->post('address'); 
        if($this->input->post('contact_person_name'))
        $additional_data['contact_person_name']=$this->input->post('contact_person_name');
        if($this->input->post('city'))
        $additional_data['city']=$this->input->post('city'); 
        if($this->input->post('state'))
        $additional_data['state']=$this->input->post('state'); 
        if($this->input->post('country'))
        $additional_data['country']=$this->input->post('country'); 
        if($this->input->post('pincode'))
        $additional_data['pincode']=$this->input->post('pincode'); 
        if($this->input->post('telephone'))
        $additional_data['telephone']=$this->input->post('telephone');
        if($this->input->post('mobile'))
        $additional_data['mobile']=$this->input->post('mobile');
        if($this->input->post('email'))
        $additional_data['email']=$this->input->post('email');
        $additional_data['user_id']=$this->session->userdata('user_id');
        
        $this->Customer_Model->add_business_location($additional_data); 
       // $this->data['location_detail']=  $this->Customer_Model->get_business_list(); 

       $this->session->set_flashdata('success_msg','Business location added sucessfully');
       redirect('Customer/customer_business_location_list', 'refresh');
    //    $user_id = $this->session->userdata('user_id');
    //    $this->data['dataHeader'] = $this->users->get_allData($user_id);
    //    load_view_template($this->data, 'customer_business_location_list');
    //   $this->template->set_master_template('template.php');
    //   $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
    //   $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
    //   $this->template->write_view('content', 'customer_business_location_list', (isset($this->data) ? $this->data : NULL), TRUE);
    //   $this->template->write_view('footer', 'snippets/footer', '', TRUE);
    //   $this->template->render();
      
    }
   }

   public function edit_business_location(){
      $business_id= $this->input->get('business_id'); 
      $this->data['business_detail']= $this->Customer_Model->get_business_detail($business_id); 
      $this->data['country']=$country=$this->Customer_Model->get_country();
      $user_id = $this->session->userdata('user_id');
       $this->data['dataHeader'] = $this->users->get_allData($user_id);
       load_view_template($this->data, 'customer_business_location_edit');

   
   }
   public function update_business_location(){
    if (!$this->ion_auth->logged_in()) {
        redirect('auth', 'refresh');
    }else{  
        if($this->input->post('id'))
        $id= $this->input->post('id');
        if($this->input->post('location_name'))
        $additional_data['location_name']=$this->input->post('location_name');
        if($this->input->post('address'))
        $additional_data['address']=$this->input->post('address'); 
        if($this->input->post('contact_person_name'))
        $additional_data['contact_person_name']=$this->input->post('contact_person_name');
        if($this->input->post('city'))
        $additional_data['city']=$this->input->post('city'); 
        if($this->input->post('state'))
        $additional_data['state']=$this->input->post('state'); 
        if($this->input->post('country'))
        $additional_data['country']=$this->input->post('country'); 
        if($this->input->post('pincode'))
        $additional_data['pincode']=$this->input->post('pincode'); 
        if($this->input->post('telephone'))
        $additional_data['telephone']=$this->input->post('telephone');
        if($this->input->post('mobile'))
        $additional_data['mobile']=$this->input->post('mobile');
        if($this->input->post('email'))
        $additional_data['email']=$this->input->post('email');
         $additional_data['user_id']=$this->session->userdata('user_id');
        $this->Customer_Model->update_busineess_location($additional_data,$id); 
       // $this->data['location_detail']=  $this->Customer_Model->get_business_list(); 
        $this->session->set_flashdata('success_msg','Business location update sucessfully');
        redirect('Customer/customer_business_location_list', 'refresh');
        // $user_id = $this->session->userdata('user_id');
        // $this->data['dataHeader'] = $this->users->get_allData($user_id);
        // load_view_template($this->data, 'customer_business_location_list');

    }
   }
    /*public function customer_business_location_list() {
        $this->data['location_detail'] = $this->Customer_Model->get_business_list();
        $user_id = $this->session->userdata('user_id');
        $this->data['dataHeader'] = $this->users->get_allData($user_id);
        load_view_template($this->data, 'customer_business_location_list');
        // $this->template->set_master_template('template.php');
        // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
        // $this->template->write_view('content', 'customer_business_location_list', (isset($this->data) ? $this->data : NULL), TRUE);
        // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
        // $this->template->render();
    }*/

   /* public function add_customer_business_location() {
        $this->data['country'] = $country = $this->Customer_Model->get_country();
        $user_id = $this->session->userdata('user_id');
        $this->data['dataHeader'] = $this->users->get_allData($user_id);
        load_view_template($this->data, 'customer_business_location_add');
        // $this->template->set_master_template('template.php');
        // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
        // $this->template->write_view('content', 'customer_business_location_add', (isset($this->data) ? $this->data : NULL), TRUE);
        // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
        // $this->template->render();
    }*/

   /* public function add_business_location() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        } else {

            if ($this->input->post('location_name'))
                $additional_data['location_name'] = $this->input->post('location_name');
            if ($this->input->post('address'))
                $additional_data['address'] = $this->input->post('address');
            if ($this->input->post('contact_person_name'))
                $additional_data['contact_person_name'] = $this->input->post('contact_person_name');
            if ($this->input->post('city'))
                $additional_data['city'] = $this->input->post('city');
            if ($this->input->post('state'))
                $additional_data['state'] = $this->input->post('state');
            if ($this->input->post('country'))
                $additional_data['country'] = $this->input->post('country');
            if ($this->input->post('pincode'))
                $additional_data['pincode'] = $this->input->post('pincode');
            if ($this->input->post('telephone'))
                $additional_data['telephone'] = $this->input->post('telephone');
            if ($this->input->post('mobile'))
                $additional_data['mobile'] = $this->input->post('mobile');
            if ($this->input->post('email'))
                $additional_data['email'] = $this->input->post('email');
            $this->Customer_Model->add_business_location($additional_data);
            // $this->data['location_detail']=  $this->Customer_Model->get_business_list(); 

            $this->session->set_flashdata('success_msg', 'Business location added sucessfully');
            redirect('Customer/customer_business_location_list', 'refresh');
            //    $user_id = $this->session->userdata('user_id');
            //    $this->data['dataHeader'] = $this->users->get_allData($user_id);
            //    load_view_template($this->data, 'customer_business_location_list');
            //   $this->template->set_master_template('template.php');
            //   $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            //   $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            //   $this->template->write_view('content', 'customer_business_location_list', (isset($this->data) ? $this->data : NULL), TRUE);
            //   $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            //   $this->template->render();
        }
    }*/

  /*  public function edit_business_location() {
        $business_id = $this->input->get('business_id');
        $this->data['business_detail'] = $this->Customer_Model->get_business_detail($business_id);
        $this->data['country'] = $country = $this->Customer_Model->get_country();
        $user_id = $this->session->userdata('user_id');
        $this->data['dataHeader'] = $this->users->get_allData($user_id);
        load_view_template($this->data, 'customer_business_location_edit');
        //   $this->template->set_master_template('template.php');
        //   $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        //   $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
        //   $this->template->write_view('content', 'customer_business_location_edit', (isset($this->data) ? $this->data : NULL), TRUE);
        //   $this->template->write_view('footer', 'snippets/footer', '', TRUE);
        //   $this->template->render();
    }

    public function update_business_location() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        } else {
            if ($this->input->post('id'))
                $id = $this->input->post('id');
            if ($this->input->post('location_name'))
                $additional_data['location_name'] = $this->input->post('location_name');
            if ($this->input->post('address'))
                $additional_data['address'] = $this->input->post('address');
            if ($this->input->post('contact_person_name'))
                $additional_data['contact_person_name'] = $this->input->post('contact_person_name');
            if ($this->input->post('city'))
                $additional_data['city'] = $this->input->post('city');
            if ($this->input->post('state'))
                $additional_data['state'] = $this->input->post('state');
            if ($this->input->post('country'))
                $additional_data['country'] = $this->input->post('country');
            if ($this->input->post('pincode'))
                $additional_data['pincode'] = $this->input->post('pincode');
            if ($this->input->post('telephone'))
                $additional_data['telephone'] = $this->input->post('telephone');
            if ($this->input->post('mobile'))
                $additional_data['mobile'] = $this->input->post('mobile');
            if ($this->input->post('email'))
                $additional_data['email'] = $this->input->post('email');
            $this->Customer_Model->update_busineess_location($additional_data, $id);
            // $this->data['location_detail']=  $this->Customer_Model->get_business_list(); 
            $this->session->set_flashdata('success_msg', 'Business location update sucessfully');
            redirect('Customer/customer_business_location_list', 'refresh');
            // $user_id = $this->session->userdata('user_id');
            // $this->data['dataHeader'] = $this->users->get_allData($user_id);
            // load_view_template($this->data, 'customer_business_location_list');
            // $this->template->set_master_template('template.php');
            // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            // $this->template->write_view('content', 'customer_business_location_list', (isset($this->data) ? $this->data : NULL), TRUE);
            // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            // $this->template->render();
        }
    }*/

    public function delete_business_location() {
        $business_id = $this->input->get('business_id');
        $this->Customer_Model->delete_business_location_data($business_id);
        $this->data['location_detail'] = $this->Customer_Model->get_business_list();
        $this->session->set_flashdata('success_msg', 'Business location deleted sucessfully');
        $user_id = $this->session->userdata('user_id');
        $this->data['dataHeader'] = $this->users->get_allData($user_id);
        load_view_template($this->data, 'customer_business_location_list');
        // $this->template->set_master_template('template.php');
        // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
        // $this->template->write_view('content', 'customer_business_location_list', (isset($this->data) ? $this->data : NULL), TRUE);
        // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
        // $this->template->render();
    }

    Public function get_state() {
        $data = '';
        $country_id = $this->input->post('country_id');
        $data = "<option>select state</option>";
        $state_list = $this->Customer_Model->get_state_list($country_id);
        foreach ($state_list as $state) {
            $data.="<option value=$state->id>$state->name</option>";
        }
        echo $data;
    }

    Public function get_city() {
        $data = "<option>select city</option>";
        $city_id = $this->input->post('city_id');

        $city_list = $this->Customer_Model->get_city_list($city_id);

        foreach ($city_list as $city) {
            $data.="<option value=$city->id>$city->name</option>";
        }
        echo $data;
    }

}
