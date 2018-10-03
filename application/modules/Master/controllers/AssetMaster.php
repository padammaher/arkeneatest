<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AssetMaster extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'session'));
        $this->load->helper(array('url', 'language', 'form', 'master_helper'));
        $this->load->model(array('users', 'group_model', 'country', 'assetmodel'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function assetcategory() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('Asset Category');
            //check user Permission
            userPermissionCheck($data['permission'], 'view');

            $this->session->unset_userdata('assetcat_post');
            $this->session->unset_userdata('assetcate_post');
            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Asset Category";
            $data['asset_categories'] = $this->assetmodel->get_AssetCategoryList($user_id);

            load_view_template($data, 'master/AssetCategory');
        }
    }

    public function assettype() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('Asset type');
            //check user Permission
            userPermissionCheck($data['permission'], 'view');

            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Asset Type";
            $data['asset_type'] = $this->assetmodel->get_assettypeList($user_id);
            $this->session->unset_userdata('assettype_post');
            $this->session->unset_userdata('assettypee_post');

            load_view_template($data, 'master/AssetType');
        }
    }

    public function add_asset_category() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        $data['permission'] = $this->users->get_permissions('Asset Category');
        //check user Permission
        userPermissionCheck($data['permission'], 'add');

        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('assetcat_name', 'Asset Category', 'required');
            if ($this->form_validation->run() == TRUE) {

                $data = array(
                    'name' => $this->input->post('assetcat_name'),
                    'description' => $this->input->post('assetcat_description'),
                    'createdat' => date('Y-m-d H:i:s'),
                    'createdby' => $user_id,
                );
                if ($this->input->post('status') == 'on') {
                    $data['isactive'] = 1;
                } else {
                    $data['isactive'] = 0;
                }

                $count = $this->assetmodel->insert_asset_category($data);

                if (is_numeric($count) && $count > 0) {
                    $this->session->unset_userdata('assetcat_post');
                    $this->session->set_flashdata('success_msg', 'Asset Category added successfully');
                    redirect('assetcategory');
                } elseif ($count == "duplicate") {
                    $this->session->set_userdata('assetcat_post', $this->input->post());
                    $this->session->set_flashdata('error_msg', 'Asset Category already added');
                    redirect('addAssetCategory');
                } else {
                    $this->session->set_userdata('assetcat_post', $this->input->post());
                    $this->session->set_flashdata('error_msg', 'Failed to add Asset Category');
                    redirect('addAssetCategory');
                }
            } else {
                $data['dataHeader'] = $this->users->get_allData($user_id);
                $data['dataHeader']['title'] = "Add Asset Category";
                load_view_template($data, 'master/add_asset_category');
            }
        } else {
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Add Asset Category";
            load_view_template($data, 'master/add_asset_category');
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
//            $this->form_validation->set_rules('asset_description', 'Asset Description', 'required');
            if ($this->form_validation->run() == TRUE) {
                $id = $this->input->post('edit_id');
                $data = array(
                    'name' => $this->input->post('asset_category'),
                    'description' => $this->input->post('asset_description'),
                );
                if ($this->input->post('status') == 'on') {
                    $data['isactive'] = 1;
                } else {
                    $data['isactive'] = 0;
                }

                $response = $this->assetmodel->assetcategory_update($id, $data);

                if ($response > 0) {
                    $this->session->unset_userdata('assetcate_post');
                    $this->session->set_flashdata('success_msg', 'Asset category updated successfully');
                    redirect('assetcategory');
                } else {
                    $this->session->set_userdata('assetcate_post', $this->input->post());
                    $this->session->set_flashdata('error_msg', 'Failed to update asset category');
                    redirect('updateAssetCategory');
                }
            } else {
//                $data['ast_cat_id'] = $this->input->post('edit_id');
//                $data['result'] = $this->assetmodel->get_asset_category($this->input->post('edit_id'));
                $data['dataHeader'] = $this->users->get_allData($user_id);
                $data['dataHeader']['title'] = "Edit Asset Category";
                load_view_template($data, 'master/edit_asset_category');
            }
        }
        if ($this->input->post('post') == 'delete') {
            $id = $this->input->post('id');
            $data = array('isdeleted' => 1);
            $response = $this->assetmodel->assetcategory_update($id, $data);
            if ($response > 0) {
                $this->session->set_flashdata('success_msg', 'Sucessfully deleted an asset category');
            } else {
                $this->session->set_flashdata('error_msg', 'Failed to delete asset category');
            }
            redirect('assetcategory');
        } elseif ($this->input->post('post') == 'edit' || $this->session->userdata('assetcate_post')) {
            $data['permission'] = $this->users->get_permissions('Asset Category');
            //check user Permission
            userPermissionCheck($data['permission'], 'update');

            if ($this->input->post('id')) {
                $id = $this->input->post('id');
            } elseif ($this->session->userdata('assetcate_post')) {
                $post_data = $this->session->userdata('assetcate_post');
                $id = $post_data['edit_id'];
            }
//            $id = $this->input->post('id');
            if (isset($id)) {
                $data['result'] = $this->assetmodel->get_asset_category($id);
                $data['ast_cat_id'] = $id;

                $data['dataHeader'] = $this->users->get_allData($user_id);
                $data['dataHeader']['title'] = "Edit Asset Category";
                load_view_template($data, 'master/edit_asset_category');
            } else {
                echo "Something Went wrong";
            }
        }
    }

    public function add_asset_type() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        $data['permission'] = $this->users->get_permissions('Asset type');
        //check user Permission
        userPermissionCheck($data['permission'], 'add');

        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('asset_type', 'Asset Type', 'required');
//            $this->form_validation->set_rules('type_description', 'Asset desc', 'required');
            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $this->input->post('asset_type'),
                    'createdat' => date('Y-m-d H:i:s'),
                    'createdby' => $user_id,
                );
                if ($this->input->post('type_description')) {
                    $data['description'] = $this->input->post('type_description');
                }
                if ($this->input->post('status') == 'on') {
                    $data['isactive'] = 1;
                } else {
                    $data['isactive'] = 0;
                }


                $count = $this->assetmodel->insert_asset_type($data);

                if (is_numeric($count) && $count > 0) {
                    $this->session->unset_userdata('assettype_post');
                    $this->session->set_flashdata('success_msg', 'Asset Type added successfully');
                    redirect('assettype');
                } elseif ($count == "duplicate") {
                    $this->session->set_userdata('assettype_post', $this->input->post());
                    $this->session->set_flashdata('error_msg', 'Asset Type already added');
                    redirect('addAssetType');
                } else {
                    $this->session->set_userdata('assettype_post', $this->input->post());
                    $this->session->set_flashdata('error_msg', 'Failed to add Asset Type');
                    redirect('addAssetType');
                }
            } else {
                $data['dataHeader'] = $this->users->get_allData($user_id);
                $data['dataHeader']['title'] = "Add Asset Type";
                load_view_template($data, 'master/add_asset_type');
            }
        } else {
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Add Asset Type";
            load_view_template($data, 'master/add_asset_type');
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
                if ($this->input->post('status') == 'on') {
                    $data['isactive'] = 1;
                } else {
                    $data['isactive'] = 0;
                }

                $response = $this->assetmodel->assettype_update($id, $data);

                if ($response > 0) {
                    $this->session->unset_userdata('assettypee_post');
                    $this->session->set_flashdata('success_msg', 'Asset type updated successfully');
                    redirect('assettype');
                } else {
                    $this->session->set_userdata('assettypee_post', $this->input->post());
                    $this->session->set_flashdata('error_msg', 'Failed to update asset type');
                    redirect('updateassettype');
                }
            } else {
                $data['dataHeader'] = $this->users->get_allData($user_id);
                $data['dataHeader']['title'] = "Edit Asset Type";
                load_view_template($data, 'master/edit_asset_type');
            }
        }
        if ($this->input->post('post') == 'delete') {
            $id = $this->input->post('id');
            $data = array('isdeleted' => 1);
            $response = $this->assetmodel->assettype_update($id, $data);
            if ($response > 0) {
                $this->session->set_flashdata('success_msg', 'Successfully deleted an asset type');
            } else {
                $this->session->set_flashdata('error_msg', 'Failed to delete asset type');
            }
            redirect('assettype');
        } elseif ($this->input->post('post') == 'edit' || $this->session->userdata('assettypee_post')) {
            $data['permission'] = $this->users->get_permissions('Asset type');
            //check user Permission
            userPermissionCheck($data['permission'], 'update');

            if ($this->input->post('id')) {
                $id = $this->input->post('id');
            } elseif ($this->session->userdata('assettypee_post')) {
                $post_data = $this->session->userdata('assettypee_post');
                $id = $post_data['edit_id'];
            }
            if (isset($id)) {
                $data['result'] = $this->assetmodel->get_asset_type($id);
                $data['ast_type_id'] = $id;

                $data['dataHeader'] = $this->users->get_allData($user_id);
                $data['dataHeader']['title'] = "Edit Asset Type";
                load_view_template($data, 'master/edit_asset_type');
            } else {
                echo "Something Went wrong";
            }
        }
    }

    public function asset_category_details() {
        if ($this->input->post('category_id')) {
            $id = explode('_', $this->input->post('category_id'));
            $data['sr_no'] = $id[1];
            $data['result'] = $this->assetmodel->get_asset_category($id[0]);

            $view = $this->load->view('master/modal/assetcategory', $data);
            echo $view;
        }
    }

    public function asset_type_details() {
        if ($this->input->post('assettype_id')) {
            $id = explode('_', $this->input->post('assettype_id'));
            $data['sr_no'] = $id[1];
            $data['result'] = $this->assetmodel->get_asset_type($id[0]);

            $view = $this->load->view('master/modal/asset_type', $data);
            echo $view;
        }
    }

}
