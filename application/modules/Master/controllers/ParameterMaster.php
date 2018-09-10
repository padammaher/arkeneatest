<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ParameterMaster extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'session'));
        $this->load->helper(array('url', 'language', 'form'));
        $this->load->model(array('users', 'group_model', 'country', 'parametermodel', 'uommodel'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $CI = & get_instance();
    }

    public function parameterlist() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {

            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['parameter_list'] = $this->parametermodel->get_parameterlist();

            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'master/ParameterList', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function add_parameter() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
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
                    'isactive' => 1
                );
                if ($this->input->post('param_description')) {
                    $data['description'] = $this->input->post('param_description');
                }
//                if ($this->input->post('status')) {
//                    $data['isactive'] = $this->input->post('status') ? 1 : 0;
//                }

                $count = $this->parametermodel->insert_parameter($data);

                if (is_numeric($count) && $count > 0) {
                    $this->session->set_flashdata('success_msg', 'Parameter added successfully');
                } elseif ($count == "duplicate") {
                    $this->session->set_flashdata('error_msg', 'Parameter already added');
                } else {
                    $this->session->set_flashdata('error_msg', 'Failed to add Parameter');
                }
                redirect('parameterlist');
            }
        } else {
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['uom_types'] = $this->uommodel->get_uomtypes($user_id);

            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'master/add_parameter', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
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

                $count = $this->parametermodel->parameter_update($id, $data);

                if (is_numeric($count) && $count > 0) {
                    $this->session->set_flashdata('success_msg', 'Parameter updated successfully');
                } else {
                    $this->session->set_flashdata('error_msg', 'Failed to update Parameter');
                }
                redirect('parameterlist');
            }
        }
        if ($this->input->post('post') == 'delete') {
            $id = $this->input->post('id');
            $data = array('isactive' => 0);
            $response = $this->parametermodel->parameter_update($id, $data);
            if ($response > 0) {
                $this->session->set_flashdata('success_msg', 'Sucessfully deleted an parameter');
            } else {
                $this->session->set_flashdata('error_msg', 'Failed to delete parameter');
            }
            redirect('parameterlist');
        }
        if ($this->input->post('post') == 'edit') {
            $id = $this->input->post('id');
            $data['result'] = $this->parametermodel->get_parameter($id);
            $data['uom_types'] = $this->uommodel->get_uomtypes($user_id);
            $data['param_id'] = $id;

            $data['dataHeader'] = $this->users->get_allData($user_id);
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'master/edit_parameter', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

}
