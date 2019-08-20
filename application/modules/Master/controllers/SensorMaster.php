<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SensorMaster extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'session'));
        $this->load->helper(array('url', 'language', 'form', 'master_helper'));
        $this->load->model(array('users', 'group_model', 'country', 'SensorModel'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function sensortype() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('Sensor Type');
            //check user Permission
            userPermissionCheck($data['permission'], 'view');

            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Sensor Type List";
            $data['sensor_type_details'] = $this->SensorModel->get_sensortypeList($user_id);
            $this->session->unset_userdata('sensor_post');
            $this->session->unset_userdata('sensore_post');

            load_view_template($data, 'Master/SensorTypeList');
        }
    }

    public function add_sensor_type() {

        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        $data['permission'] = $this->users->get_permissions('Sensor Type');
        //check user Permission
        userPermissionCheck($data['permission'], 'add');

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
                if ($this->input->post('status') == 'on') {
                    $data['isactive'] = 1;
                } else {
                    $data['isactive'] = 0;
                }

                $count = $this->SensorModel->insert_sensor_type($data);
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
                $data['dataHeader']['title'] = "Add Sensor Type";
                load_view_template($data, 'Master/add_sensor_type');
            }
        } else {
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Add Sensor Type";
            load_view_template($data, 'Master/add_sensor_type');
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
                if ($this->input->post('status') == 'on') {
                    $data['isactive'] = 1;
                } else {
                    $data['isactive'] = 0;
                }
                $response = $this->SensorModel->sensortype_update($id, $data);

                if ($response == "duplicate") {
                    $this->session->set_userdata('sensore_post', $this->input->post());
                    $this->session->set_flashdata('error_msg', 'Sensor Type already exists');
                    redirect('updateSensorType');
                } elseif ($response > 0) {
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
                $data['dataHeader']['title'] = "Edit Sensor Type";
                load_view_template($data, 'Master/edit_sensor_type');
            }
        }
        if ($this->input->post('post') == 'delete') {
            $data['permission'] = $this->users->get_permissions('Sensor Type');
            //check user Permission
            userPermissionCheck($data['permission'], 'delete');

            $id = $this->input->post('id');
//            $check = $this->SensorModel->check_sensortype_in_use($id);
//            if (count($check) > 0) {
//                $this->session->set_flashdata('error_msg', 'Sensor type is in Use');
//            } else {
            $data = array('isdeleted' => 1);
            $response = $this->SensorModel->sensortype_update($id, $data);
            if ($response > 0) {
                $this->session->set_flashdata('success_msg', 'Successfully deleted an sensor type');
            } else {
                $this->session->set_flashdata('error_msg', 'Failed to delete sensor type');
            }
//            }
            redirect('sensortype');
        } elseif ($this->input->post('post') == 'edit' || $this->session->userdata('sensore_post')) {
            $data['permission'] = $this->users->get_permissions('Sensor Type');
            //check user Permission
            userPermissionCheck($data['permission'], 'update');

            if ($this->input->post('id')) {
                $id = $this->input->post('id');
            } elseif ($this->session->userdata('sensore_post')) {
                $post_data = $this->session->userdata('sensore_post');
                $id = $post_data['edit_id'];
            }
            if (isset($id)) {
                $data['result'] = $this->SensorModel->get_sensor_type($id);
                $data['sensortype_id'] = $id;

                $data['dataHeader'] = $this->users->get_allData($user_id);
                $data['dataHeader']['title'] = "Edit Sensor Type";
                load_view_template($data, 'Master/edit_sensor_type');
            } else {
                echo "Something Went wrong";
            }
        }
    }

    public function sensor_details() {
        if ($this->input->post('sensor_id')) {
            $id = explode('_', $this->input->post('sensor_id'));
            $data['sr_no'] = $id[1];
            $data['result'] = $this->SensorModel->get_sensor_type($id[0]);

            $view = $this->load->view('Master/modal/sensor_type', $data);
            echo $view;
        }
    }

}
