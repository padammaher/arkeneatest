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

        if ($this->input->post('submit')) {
            $data = array(
                'asset_category' => $this->input->post('asset_category'),
                'description' => $this->input->post('asset_description'),
                'createdby' => $user_id,
                'createdat' => date('Y-m-d H:i:s'),
            );

            $this->uommodel->insert($data);
            // echo $this->db->last_query();die;
            $this->session->set_flashdata('msg', 'Asset Category details added successfully');
            redirect('master/add_project');
        } else {
            $data['dataHeader'] = $this->users->get_allData($user_id);
//            $data['uom_list'] = $this->uommodel->get_uom($user_id);

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

        if ($this->input->post('submit')) {
            $data = array(
                'asset_category' => $this->input->post('asset_category'),
                'description' => $this->input->post('asset_description'),
            );
            $this->uommodel->update($id, $data);
            // echo $this->db->last_query();die;
            $this->session->set_flashdata('msg', 'Asset category details updated successfully');
            redirect('parametermaster/uomlist');
        }
        if ($this->input->post('delete')) {
            $id = $this->input->post('edit_id');
            $data = array('status' => 0);
            $this->uommodel->company_edit($id, $data);
            $this->session->set_flashdata('msg', 'Sucessfully deleted an asset category');
            redirect('parametermaster/uomlist');
        }
        if ($this->input->post('edit') || $id) {
            $data['result'] = $this->uommodel->asset_category_update($id);
            $data['ast_cat_id'] = $id;

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

        $data['uom_list'] = $this->uommodel->get_uom($user_id);
    }

}
