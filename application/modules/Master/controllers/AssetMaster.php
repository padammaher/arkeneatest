<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AssetMaster extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'session'));
        $this->load->helper(array('url', 'language', 'form', 'assets_helper'));
        $this->load->model(array('users', 'group_model', 'country', 'assetmodel'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
//        $CI = & get_instance();
    }

    public function assetcategory() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $this->data['asset_categories'] = $this->assetmodel->get_AssetCategoryList();
//            $data1['asset_categories'] = $this->assetmodel->get_AssetCategoryList();

            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'master/AssetCategory', (isset($this->data) ? $this->data : NULL), TRUE);
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
            $this->data['asset_type'] = $this->assetmodel->get_assettypeList();

            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'master/AssetType', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function add_asset_category() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('assetcat_name', 'Asset Category', 'required');
            $this->form_validation->set_rules('assetcat_description', 'Asset Description', 'required');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $this->input->post('assetcat_name'),
                    'description' => $this->input->post('assetcat_description'),
                    'createdat' => date('Y-m-d H:i:s'),
                    'createdby' => $user_id,
                    'isactive' => 1
                );
                if ($this->input->post('status')) {
                    $data['isactive'] = $this->input->post('status') ? 1 : 0;
                }
                $count = $this->assetmodel->insert_asset_category($data);

                if (is_numeric($count) && $count > 0) {
//                    $this->session->unset_userdata('assetcat_post');
                    $this->session->set_flashdata('success_msg', 'Asset Category added successfully');
                } elseif ($count == "duplicate") {
//                    $this->session->set_userdata('assetcat_post', $this->input->post());
                    $this->session->set_flashdata('error_msg', 'Asset Category already added');
                    redirect('addAssetCategory');
                } else {
//                    $this->session->set_userdata('assetcat_post', $this->input->post());
                    $this->session->set_flashdata('error_msg', 'Failed to add Asset Category');
//                    $data['post'] = $this->input->post();
                    redirect('addAssetCategory');
                }
                redirect('assetcategory');
            } else {

                $data['dataHeader'] = $this->users->get_allData($user_id);
                load_view_template($data, 'master/add_asset_category');
            }
        } else {
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'master/add_asset_category', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function assetcategory_update() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($this->input->post('editsubmit')) {
            $this->form_validation->set_rules('asset_category', 'Asset Category', 'required');
            if ($this->form_validation->run() == TRUE) {
                $id = $this->input->post('edit_id');
                $data = array(
                    'name' => $this->input->post('asset_category'),
                    'description' => $this->input->post('asset_description'),
                );
                $response = $this->assetmodel->assetcategory_update($id, $data);

                if ($response > 0) {
                    $this->session->set_flashdata('success_msg', 'Asset category updated successfully');
                } else {
                    $this->session->set_flashdata('error_msg', 'Failed to update asset category');
                }

                redirect('assetcategory');
            } else {
                $data['dataHeader'] = $this->users->get_allData($user_id);
                load_view_template($data, 'master/edit_asset_category');
            }
        }
        if ($this->input->post('post') == 'delete') {
            $id = $this->input->post('id');
            $data = array('isactive' => 0);
            $response = $this->assetmodel->assetcategory_update($id, $data);
            if ($response > 0) {
                $this->session->set_flashdata('success_msg', 'Sucessfully deleted an asset category');
            } else {
                $this->session->set_flashdata('error_msg', 'Failed to delete asset category');
            }
            redirect('assetcategory');
        } elseif ($this->input->post('post') == 'edit') {

            $id = $this->input->post('id');
            $data['result'] = $this->assetmodel->get_asset_category($id);
            $this->data['ast_cat_id'] = $id;

            $data['dataHeader'] = $this->users->get_allData($user_id);
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'master/edit_asset_category', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function add_asset_type() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('asset_type', 'Asset Type', 'required');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $this->input->post('asset_type'),
                    'createdat' => date('Y-m-d H:i:s'),
                    'createdby' => $user_id,
                    'isactive' => 1
                );
                if ($this->input->post('type_description')) {
                    $data['description'] = $this->input->post('type_description');
                }

                $count = $this->assetmodel->insert_asset_type($data);
//                echo $count;
//                exit;
                if (is_numeric($count) && $count > 0) {
                    $this->session->set_flashdata('success_msg', 'Asset Type added successfully');
                } elseif ($count == "duplicate") {
                    $this->session->set_flashdata('error_msg', 'Asset Type already added');
                } else {
                    $this->session->set_flashdata('error_msg', 'Failed to add Asset Type');
                }
                redirect('assettype');
            } else {
                $data['dataHeader'] = $this->users->get_allData($user_id);
                load_view_template($data, 'master/add_asset_type');
            }
        } else {
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'master/add_asset_type', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function assettype_update() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($this->input->post('editsubmit')) {
            $this->form_validation->set_rules('asset_type', 'Asset Type', 'required');
            if ($this->form_validation->run() == TRUE) {
                $id = $this->input->post('edit_id');
                $data = array(
                    'name' => $this->input->post('asset_type'),
                    'description' => $this->input->post('type_description')
                );

                $response = $this->assetmodel->assettype_update($id, $data);

                if ($response > 0) {
                    $this->session->set_flashdata('success_msg', 'Asset type updated successfully');
                } else {
                    $this->session->set_flashdata('error_msg', 'Failed to update asset type');
                }

                redirect('assettype');
            } else {
                $data['dataHeader'] = $this->users->get_allData($user_id);
                load_view_template($data, 'master/edit_asset_type');
            }
        }
        if ($this->input->post('post') == 'delete') {
            $id = $this->input->post('id');
            $data = array('isactive' => 0);
            $response = $this->assetmodel->assettype_update($id, $data);
            if ($response > 0) {
                $this->session->set_flashdata('success_msg', 'Successfully deleted an asset type');
            } else {
                $this->session->set_flashdata('error_msg', 'Failed to delete asset type');
            }
            redirect('assettype');
        } elseif ($this->input->post('post') == 'edit') {

            $id = $this->input->post('id');
            $data['result'] = $this->assetmodel->get_asset_type($id);
            $this->data['ast_type_id'] = $id;

            $data['dataHeader'] = $this->users->get_allData($user_id);
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            $this->template->write_view('content', 'master/edit_asset_type', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

}
