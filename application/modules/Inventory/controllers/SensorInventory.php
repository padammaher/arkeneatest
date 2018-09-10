<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AssetsManagement extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->model(array('users', 'group_model', 'country'));
        // $this->load->helper(array('url', 'language'));
        $this->load->helper(array('url', 'language', 'form'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    // redirect if needed, otherwise display the user list
    public function index() {

     
    }
      public function Assets_add() {
           $this->load->helper('form');
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
             
//            $data['save_btn'] = array(
//                'name' => 'assets_edit',
//                'id'   => 'assets_edit',
//                'value' => 'assets_edit',
//                'class' => 'btn btn-info'
//            );
           
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/assets_add', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
        
      }
         
       public function Asset_List() {
           $this->load->helper('form');
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
             
//            $data['save_btn'] = array(
//                'name' => 'assets_edit',
//                'id'   => 'assets_edit',
//                'value' => 'assets_edit',
//                'class' => 'btn btn-info'
//            );
           
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/assets_list', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
        
      }
        public function Asset_edit() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);


            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/assets_edit', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
      }  
       
        
    public function manage_assets_location() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);


            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/manage_assets_location', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }
        
          public function User_asset_edit() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);


            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/user_assets_edit', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }
    
      public function Assets_location_list() {
           $this->load->helper('form');
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
             
//            $data['save_btn'] = array(
//                'name' => 'assets_edit',
//                'id'   => 'assets_edit',
//                'value' => 'assets_edit',
//                'class' => 'btn btn-info'
//            );
           
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/assets_location_list', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
        
      }
      
      
         public function Assets_location_add() {
           $this->load->helper('form');
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
             
//            $data['save_btn'] = array(
//                'name' => 'assets_edit',
//                'id'   => 'assets_edit',
//                'value' => 'assets_edit',
//                'class' => 'btn btn-info'
//            );
          
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/assets_location_add', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
        
      }
      
      
        public function User_assets_list() {
           $this->load->helper('form');
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
             
//            $data['save_btn'] = array(
//                'name' => 'assets_edit',
//                'id'   => 'assets_edit',
//                'value' => 'assets_edit',
//                'class' => 'btn btn-info'
//            );
          
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/user_assets_list', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
        
      }
      
             public function User_asset_add() {
           $this->load->helper('form');
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
             
//            $data['save_btn'] = array(
//                'name' => 'assets_edit',
//                'id'   => 'assets_edit',
//                'value' => 'assets_edit',
//                'class' => 'btn btn-info'
//            );
          
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/user_asset_add', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
        
      } 
}
   