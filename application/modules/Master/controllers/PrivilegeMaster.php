<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PrivilegeMaster extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'session'));
        $this->load->helper(array('url', 'language', 'form', 'master_helper'));
        $this->load->model(array('users', 'group_model', 'country', 'privilegemodel'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function list_privilleges() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } else {
            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Privileges List";
            $data['user_type'] = $this->privilegemodel->getUserTypeList($id = NULL, $user_id);
            load_view_template($data, 'master/privileges/list_view');
        }
    }

    public function add_privileges($id = null) {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } else {
            $user_id = $this->session->userdata('user_id');
            if ($_POST) {
                $post_array = array();
                $post_array = $_POST;
                $groupid_and_roleid = explode("_", $_POST['id_and_groupid']);

                $menucount = 0;
                $objects = $this->privilegemodel->getMenuList();
                foreach ($objects as $k => $data) {
                    $data_insert[$k]['object'] = $data->id;
                    $data_insert[$k]['role'] = $groupid_and_roleid[1];
                    $data_insert[$k]['group_id'] = $groupid_and_roleid[0];
                    $data_insert[$k]['createdby'] = $user_id;
                    $data_insert[$k]['modifiedby'] = '';
                    $data_insert[$k]['createddate'] = date("Y-m-d");
                    $data_insert[$k]['isactive'] = 1;
                    if (array_key_exists('permission_add_' . $data->id, $post_array))
                        $data_insert[$k]['addpermission'] = 1;
                    else
                        $data_insert[$k]['addpermission'] = 0;


                    if (array_key_exists('permission_edit_' . $data->id, $post_array))
                        $data_insert[$k]['editpermission'] = 1;
                    else
                        $data_insert[$k]['editpermission'] = 0;


                    if (array_key_exists('permission_delete_' . $data->id, $post_array))
                        $data_insert[$k]['deletepermission'] = 1;
                    else
                        $data_insert[$k]['deletepermission'] = 0;


                    if (array_key_exists('permission_view_' . $data->id, $post_array))
                        $data_insert[$k]['viewpermission'] = 1;
                    else
                        $data_insert[$k]['viewpermission'] = 0;
                    $menucount++;
                }

                $asset_user_list_data = $this->privilegemodel->update_Privileges('privileges', $data_insert, $groupid_and_roleid);
//                   echo $asset_user_list_data;
                if ($asset_user_list_data) {
                    $this->session->set_flashdata('success_msg', 'Privilleges successfully updated');
                    redirect('privilege', 'refresh');
                } else {
                    $this->session->set_flashdata('error_msg', 'Privilleges failed to updat');
                    redirect('privilege', 'refresh');
                }
            } else {
                $user_id = $this->session->userdata('user_id');
                $data['dataHeader'] = $this->users->get_allData($user_id);
                $data['dataHeader']['title'] = "Add Admin Privileges";
                $data['menu'] = $this->privilegemodel->getMenuList();
                $data['user_type'] = $this->privilegemodel->getUserTypeList($id, $user_id);
                $data['user_privilege_data'] = $this->privilegemodel->getUser_privilege_dataList($id, $user_id);
                load_view_template($data, 'master/privileges/add_view');
            }
        }
    }

}
