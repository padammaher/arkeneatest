<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UomMaster extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'session'));
        $this->load->helper(array('url', 'language', 'form'));
        $this->load->model(array('users', 'group_model', 'country', 'uommodel'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $CI = & get_instance();
    }

    public function uomlist() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['uom_type_list'] = $this->uommodel->get_uomtypes($user_id);

            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'master/UomList', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function add_uom_list() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('uom_type', 'uom_type', 'required');
            $this->form_validation->set_rules('uom_id', 'uom_id', 'required|numeric');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $this->input->post('uom_type'),
                    'uom_id' => $this->input->post('uom_id'),
                    'createdat' => date('Y-m-d H:i:s'),
                    'createdby' => $user_id,
                    'isactive' => 1
                );

                $count = $this->uommodel->insert_uom($data);
//                echo $count;
//                exit;
                if (is_numeric($count) && $count > 0) {
                    $this->session->set_flashdata('success_msg', 'UOM Type added successfully');
                } elseif ($count == "duplicate") {
                    $this->session->set_flashdata('error_msg', 'UOM Type already added');
                } else {
                    $this->session->set_flashdata('error_msg', 'Failed to add UOM Type');
                }
                redirect('uomlist');
            }
        } else {
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['uom_list'] = $this->uommodel->get_uom($user_id);

            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'master/add_uom', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function uomlist_update() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($this->input->post('editsubmit')) {
            $this->form_validation->set_rules('uom_type', 'uom_type', 'required');
            $this->form_validation->set_rules('uom_id', 'uom_id', 'required|numeric');
            if ($this->form_validation->run() == TRUE) {
                $id = $this->input->post('edit_id');
                $data = array(
                    'name' => $this->input->post('uom_type'),
                    'uom_id' => $this->input->post('uom_id'),
                );

                $count = $this->uommodel->uomtype_update($id, $data);

                if (is_numeric($count) && $count > 0) {
                    $this->session->set_flashdata('success_msg', 'UOM Type updated successfully');
                } else {
                    $this->session->set_flashdata('error_msg', 'Failed to update UOM Type');
                }
                redirect('uomlist');
            }
        }
        if ($this->input->post('post') == 'delete') {
            $id = $this->input->post('id');
            $data = array('isactive' => 0);
            $response = $this->uommodel->uomtype_update($id, $data);
            if ($response > 0) {
                $this->session->set_flashdata('success_msg', 'Successfully deleted an UOM type');
            } else {
                $this->session->set_flashdata('error_msg', 'Failed to delete an UOM type');
            }
            redirect('uomlist');
        }
        if ($this->input->post('post') == 'edit') {
            $id = $this->input->post('id');
            $data['uom_type_id'] = $id;
            $data['uom_list'] = $this->uommodel->get_uom($user_id);
            $data['result'] = $this->uommodel->get_uom_type($id);

            $data['dataHeader'] = $this->users->get_allData($user_id);
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'master/edit_uom', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function get_uom() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        $data['uom_list'] = $this->uommodel->get_uom($user_id, 'json');
    }

}
