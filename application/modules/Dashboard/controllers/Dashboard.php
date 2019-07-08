<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation',));
        $this->load->model(array('users', 'group_model', 'country', 'dashboard_model'));
        // $this->load->helper(array('url', 'language'));
        $this->load->helper(array('url', 'language', 'form', 'master_helper'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }

    public function index() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Home";
            $data['dashboard_assets'] = $this->dashboard_model->load_dashboard_batch_data($user_id);
            $data['total_alarms'] = $this->dashboard_model->get_total_alarms($user_id);
            $data['total_assets'] = $this->dashboard_model->get_total_assets($user_id);
            if (isset($data['total_assets'])) {
                $active_asset = array();
                foreach ($data['total_assets'] as $asset) {
                    if ($asset->isactive == 1) {
                        $active_asset[] = $asset;
                    }
                }
            }
            $data['total_active_assets'] = isset($active_asset) ? count($active_asset) : 0;
            $data['Device_status'] = "";
            $data['asset_alerts'] = "";
            $data['device_status'] = $this->dashboard_model->get_device_status();
            $data['alarms_info'] = $this->dashboard_model->get_alarms();
            $group_id = $this->session->userdata('group_id');
            if ($group_id != 1) {
                $view = "dashboard";
            } else {
                $user = $this->ion_auth->user($user_id)->row();
                if ($user->login_flag == 0) {
                    //list the users
                    $data['users'] = $this->ion_auth->users()->result();
                    foreach ($data['users'] as $k => $user) {
                        $data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
                    }

                    $user_id = $this->session->userdata('user_id');
//                    $user = $this->ion_auth->user($user_id)->row();
                    $groups = $this->ion_auth->groups()->result_array();
                    $currentGroups = $this->ion_auth->get_users_groups($user_id)->result();
                    // display the edit user form
                    $data['csrf'] = $this->_get_csrf_nonce();

                    // set the flash data error message if there is one
                    $data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

                    // pass the user to the view
                    $data['user'] = $user;
                    $data['groups'] = $groups;
                    $data['currentGroups'] = $currentGroups;

                    $data['first_name'] = array(
                        'name' => 'first_name',
                        'id' => 'first_name',
                        'type' => 'text',
                        'value' => $this->form_validation->set_value('first_name', $user->first_name),
                    );
                    $data['last_name'] = array(
                        'name' => 'last_name',
                        'id' => 'last_name',
                        'type' => 'text',
                        'value' => $this->form_validation->set_value('last_name', $user->last_name),
                    );
                    $data['company'] = array(
                        'name' => 'company',
                        'id' => 'company',
                        'type' => 'text',
                        'value' => $this->form_validation->set_value('company', $user->company),
                    );
                    $data['phone'] = array(
                        'name' => 'phone',
                        'id' => 'phone',
                        'type' => 'text',
                        'value' => $this->form_validation->set_value('phone', $user->phone),
                    );
                    $data['password'] = array(
                        'name' => 'password',
                        'id' => 'password',
                        'type' => 'password'
                    );
                    $data['password_confirm'] = array(
                        'name' => 'password_confirm',
                        'id' => 'password_confirm',
                        'type' => 'password'
                    );
                    $data['country_list'] = (array('' => 'Select Country')) + $this->country->dropdown('name');
                    $view = "pre_dashboard";
                } else {
                    $view = "dashboard";
                }
            }
            load_view_template($data, $view);
        }
    }

    function load_data_by_asset() {
        $dashboarddata = '';

        $user_id = $this->session->userdata('user_id');
        $asset_id = $this->input->post('asset_id');
        $location_id = $this->input->post('location_id');

        $dashboarddata = $this->dashboard_model->get_data_by_assets($asset_id, $location_id, $user_id);

        echo json_encode($dashboarddata);
    }

    public function _get_csrf_nonce() {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    public function _valid_csrf_nonce() {
        $csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
        if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function _render_page($view, $data = null, $returnhtml = false) {//I think this makes more sense
        $this->viewdata = (empty($data)) ? $this->data : $data;

        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        if ($returnhtml)
            return $view_html; //This will return html on 3rd argument being true
    }

}
