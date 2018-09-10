<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SensorMaster extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'session'));
        $this->load->helper(array('url', 'language', 'form'));
        $this->load->model(array('users', 'group_model', 'country', 'sensormodel'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $CI = & get_instance();
    }

    public function sensortype() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $this->data['sensor_type_details'] = $this->sensormodel->get_sensortypeList();

            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'master/SensorTypeList', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function add_sensor_type() {

        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('sensor_type', 'sensor_type', 'required');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $this->input->post('sensor_type'),
                    'createdat' => date('Y-m-d H:i:s'),
                    'createdby' => $user_id,
                );
                if ($this->input->post('sensor_description')) {
                    $data['description'] = $this->input->post('sensor_description');
                }
                if ($this->input->post('status')) {
                    $data['isactive'] = $this->input->post('status') ? 1 : 0;
                }

                $count = $this->sensormodel->insert_sensor_type($data);
                if (is_numeric($count) && $count > 0) {
                    $this->session->set_flashdata('success_msg', 'Sensor Type added successfully');
                } elseif ($count == "duplicate") {
                    $this->session->set_flashdata('success_msg', 'Sensor Type already added');
                } else {
                    $this->session->set_flashdata('error_msg', 'Failed to add Sensor Type');
                }
                redirect('sensortype');
            }
        } else {
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'master/add_sensor_type', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function sensortype_update() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($this->input->post('editsubmit')) {

            $this->form_validation->set_rules('sensor_type', 'sensor_type', 'required');
            if ($this->form_validation->run() == TRUE) {
                $id = $this->input->post('edit_id');
                $data = array(
                    'name' => $this->input->post('sensor_type'),
                );
                if ($this->input->post('sensor_description')) {
                    $data['description'] = $this->input->post('sensor_description');
                }
                $response = $this->sensormodel->sensortype_update($id, $data);

                if ($response > 0) {
                    $this->session->set_flashdata('success_msg', 'Sensor type updated successfully');
                } else {
                    $this->session->set_flashdata('error_msg', 'Failed to update sensor type');
                }

                redirect('sensortype');
            }
        }
        if ($this->input->post('post') == 'delete') {
            $id = $this->input->post('id');
            $data = array('isactive' => 0);
            $response = $this->sensormodel->sensortype_update($id, $data);
            if ($response > 0) {
                $this->session->set_flashdata('success_msg', 'Successfully deleted an asset type');
            } else {
                $this->session->set_flashdata('error_msg', 'Failed to delete asset type');
            }
            redirect('sensortype');
        } elseif ($this->input->post('post') == 'edit') {

            $id = $this->input->post('id');
            $data['result'] = $this->sensormodel->get_sensor_type($id);
            $this->data['sensortype_id'] = $id;

            $data['dataHeader'] = $this->users->get_allData($user_id);
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'master/edit_sensor_type', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

}
