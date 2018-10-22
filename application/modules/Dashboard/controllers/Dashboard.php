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
            load_view_template($data, "dashboard");
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

}
