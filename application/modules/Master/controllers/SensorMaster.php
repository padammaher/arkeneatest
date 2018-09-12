<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SensorMaster extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'session'));
        $this->load->helper(array('url', 'language', 'form', 'master_helper'));
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
            $data['sensor_type_details'] = $this->sensormodel->get_sensortypeList($user_id);
            $this->session->unset_userdata('sensor_post');
            $this->session->unset_userdata('sensore_post');

            load_view_template($data, 'master/SensorTypeList');
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
                    $this->session->unset_userdata('sensor_post');
                    $this->session->set_flashdata('success_msg', 'Sensor Type added successfully');
                    redirect('sensortype');
                } elseif ($count == "duplicate") {
                    $this->session->set_userdata('sensor_post', $this->input->post());
                    $this->session->set_flashdata('error_msg', 'Sensor Type already added');
                    redirect('addSensorType');
                } else {
                    $this->session->set_userdata('sensor_post', $this->input->post());
                    $this->session->set_flashdata('error_msg', 'Failed to add Sensor Type');
                    redirect('addSensorType');
                }
                redirect('sensortype');
            } else {
                $data['dataHeader'] = $this->users->get_allData($user_id);
                load_view_template($data, 'master/add_sensor_type');
            }
        } else {
            $data['dataHeader'] = $this->users->get_allData($user_id);
            load_view_template($data, 'master/add_sensor_type');
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
                    'description' => $this->input->post('sensor_description')
                );

                $response = $this->sensormodel->sensortype_update($id, $data);

                if ($response > 0) {
                    $this->session->unset_userdata('sensore_post');
                    $this->session->set_flashdata('success_msg', 'Sensor type updated successfully');
                    redirect('sensortype');
                } else {
                    $this->session->set_userdata('sensore_post', $this->input->post());
                    $this->session->set_flashdata('error_msg', 'Failed to update sensor type');
                    redirect('updateSensorType');
                }
            } else {
                $data['dataHeader'] = $this->users->get_allData($user_id);
                load_view_template($data, 'master/edit_sensor_type');
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
        } elseif ($this->input->post('post') == 'edit' || $this->session->userdata('sensore_post')) {
            if ($this->input->post('id')) {
                $id = $this->input->post('id');
            } elseif ($this->session->userdata('sensore_post')) {
                $post_data = $this->session->userdata('sensore_post');
                $id = $post_data['edit_id'];
            }
            if (isset($id)) {
                $data['result'] = $this->sensormodel->get_sensor_type($id);
                $data['sensortype_id'] = $id;

                $data['dataHeader'] = $this->users->get_allData($user_id);
                load_view_template($data, 'master/edit_sensor_type');
            } else {
                echo "Something Went wrong";
            }
        }
    }

}
