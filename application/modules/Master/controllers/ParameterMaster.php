<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ParameterMaster extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'session'));
        $this->load->helper(array('url', 'language', 'form', 'master_helper'));
        $this->load->model(array('users', 'group_model', 'country', 'parametermodel', 'uommodel'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function parameterlist() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('Parameter');
            //check user Permission
            userPermissionCheck($data['permission'], 'view');

            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Parameter List";
            $data['parameter_list'] = $this->parametermodel->get_parameterlist($user_id);
            $this->session->unset_userdata('param_post');
            $this->session->unset_userdata('parame_post');
            load_view_template($data, 'master/ParameterList');
        }
    }

    public function add_parameter() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        $data['permission'] = $this->users->get_permissions('Parameter');
        //check user Permission
        userPermissionCheck($data['permission'], 'add');

        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('param_name', 'param_name', 'required');
            $this->form_validation->set_rules('uom_type', 'uom_type', 'required');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $this->input->post('param_name'),
                    'uom_type_id' => $this->input->post('uom_type'),
                    'createdat' => date('Y-m-d H:i:s'),
                    'createdby' => $user_id,
                );
                if ($this->input->post('param_description')) {
                    $data['description'] = $this->input->post('param_description');
                }
                if ($this->input->post('status') == 'on') {
                    $data['isactive'] = 1;
                } else {
                    $data['isactive'] = 0;
                }


                $count = $this->parametermodel->insert_parameter($data);

                if (is_numeric($count) && $count > 0) {
                    $this->session->unset_userdata('param_post');
                    $this->session->set_flashdata('success_msg', 'Parameter added successfully');
                    redirect('parameterlist');
                } elseif ($count == "duplicate") {
                    $this->session->set_userdata('param_post', $this->input->post());
                    $this->session->set_flashdata('error_msg', 'Parameter already added');
                    redirect('addParameter');
                } else {
                    $this->session->set_userdata('param_post', $this->input->post());
                    $this->session->set_flashdata('error_msg', 'Failed to add Parameter');
                    redirect('addParameter');
                }
            } else {
                $data['dataHeader'] = $this->users->get_allData($user_id);
                $data['dataHeader']['title'] = "Add Parameter";
                $data['uom_types'] = $this->parametermodel->get_uomtypes($user_id);
                load_view_template($data, 'master/add_parameter');
            }
        } else {
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Add Parameter";
            $data['uom_types'] = $this->parametermodel->get_uomtypes($user_id);

            load_view_template($data, 'master/add_parameter');
        }
    }

    public function parameter_update() {

        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }

        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($this->input->post('editsubmit')) {

            $this->form_validation->set_rules('param_name', 'param_name', 'required');
            $this->form_validation->set_rules('uom_type', 'uom_type', 'required');
            if ($this->form_validation->run() == TRUE) {
                $id = $this->input->post('edit_id');
                $data = array(
                    'name' => $this->input->post('param_name'),
                    'uom_type_id' => $this->input->post('uom_type'),
                    'description' => $this->input->post('param_description')
                );
                if ($this->input->post('status') == 'on') {
                    $data['isactive'] = 1;
                } else {
                    $data['isactive'] = 0;
                }

                $response = $this->parametermodel->parameter_update($id, $data);

                if (is_numeric($response) && $response > 0) {
                    $this->session->unset_userdata('parame_post');
                    $this->session->set_flashdata('success_msg', 'Parameter updated successfully');
                    redirect('parameterlist');
                } else {
                    $this->session->set_userdata('parame_post', $this->input->post());
                    $this->session->set_flashdata('error_msg', 'Failed to update Parameter');
                    redirect('updateParameter');
                }
            } else {
                $data['dataHeader'] = $this->users->get_allData($user_id);
                $data['dataHeader']['title'] = "Edit Parameter";
                $data['uom_types'] = $this->uommodel->get_uomtypes($user_id);
                load_view_template($data, 'master/edit_parameter');
            }
        }
        if ($this->input->post('post') == 'delete') {
            $data['permission'] = $this->users->get_permissions('Parameter');
            //check user Permission
            userPermissionCheck($data['permission'], 'delete');
            $id = $this->input->post('id');
//            $check = $this->parametermodel->check_parameter_in_use($id);
//            if ($check > 0) {
//                $this->session->set_flashdata('error_msg', 'Parameter is already in Use');
//            } else {
            $data = array('isdeleted' => 1);
            $response = $this->parametermodel->parameter_update($id, $data);
            if ($response > 0) {
                $this->session->set_flashdata('success_msg', 'Sucessfully deleted an parameter');
            } else {
                $this->session->set_flashdata('error_msg', 'Failed to delete parameter');
            }
//            }
            redirect('parameterlist');
        }
        if ($this->input->post('post') == 'edit' || $this->session->userdata('parame_post')) {
            $data['permission'] = $this->users->get_permissions('Parameter');
            //check user Permission
            userPermissionCheck($data['permission'], 'update');

            if ($this->input->post('id')) {
                $id = $this->input->post('id');
            } elseif ($this->session->userdata('parame_post')) {
                $post_data = $this->session->userdata('parame_post');
                $id = $post_data['edit_id'];
            }

            if (isset($id)) {
                $data['result'] = $this->parametermodel->get_parameter($id);
                $data['uom_types'] = $this->parametermodel->get_uomtypes($user_id);
                $data['param_id'] = $id;

                $data['dataHeader'] = $this->users->get_allData($user_id);
                $data['dataHeader']['title'] = "Edit Parameter";
                load_view_template($data, 'master/edit_parameter');
            } else {
                echo "Something Went wrong";
            }
        }
    }

    public function parameter_details() {
        if ($this->input->post('param_id')) {
            $user_id = $this->session->userdata('user_id');
            $id = explode('_', $this->input->post('param_id'));
            $data['sr_no'] = $id[1];
            $data['result'] = $this->parametermodel->get_parameterlist($user_id, $id[0]);

            $view = $this->load->view('master/modal/parameter_type', $data);
            echo $view;
        }
    }

}
