<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language', 'form'));
        $this->load->model(array('users', 'group_model', 'country'));
        $this->load->model("MasterModel");
        //$this->load->model("MY_Model");
        //modules::run('Auth/login'); 
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $CI = & get_instance();
    }

    public function assetcategory() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {

            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
//            $this->data['title'] = 'Asset Category';
//            $this->data['page'] = 'Master/AssetCategory';
            $this->load->view("AssetCategory", $data);
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'AssetCategory', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function assettype() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {

            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $this->load->view("AssetType", $data);
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'AssetCategory', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function sensortype() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {

            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $this->load->view("AssetType", $data);
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'SensorTypeList', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function parameter() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {

            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $this->load->view("AssetType", $data);
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'ParameterList', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function uomlist() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {

            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $this->load->view("AssetType", $data);
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'UomList', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

}
