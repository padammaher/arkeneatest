<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UomMaster extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'session'));
        $this->load->helper(array('url', 'language', 'form', 'master_helper'));
        $this->load->model(array('users', 'group_model', 'country', 'uommodel'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
//        $CI = & get_instance();
    }

    public function uom_type_list() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['uom_type_list'] = $this->uommodel->get_uomtypes($user_id);

            load_view_template($data, 'master/Uom_type_List');
        }
    }

    public function uomlist() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['uom_type_list'] = $this->uommodel->get_uomtypes($user_id);

            load_view_template($data, 'master/UomList');
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
            $this->form_validation->set_rules('uom_name[]', 'uom_name', 'required');
            if ($this->form_validation->run() == TRUE) {
                $uom_name_array = $this->input->post('uom_name');
                if (is_array($uom_name_array)) {
                    foreach ($uom_name_array as $uom_name) {
                        if ($uom_name && $uom_name != 'null') {
                            $uom_data = array(
                                'name' => $uom_name,
                                'createdat' => date('Y-m-d H:i:s'),
                                'createdby' => $user_id,
                                'isactive' => 1,
                                'uom_type_id' => $this->input->post('uom_type'),
                            );
                        }
                        $count = $this->uommodel->insert_uom($uom_data);
                    }
                } else {
                    $uom_data = array(
                        'name' => $this->input->post('uom_name'),
                        'createdat' => date('Y-m-d H:i:s'),
                        'createdby' => $user_id,
                        'isactive' => 1
                    );
                    $count = $this->uommodel->insert_uom($uom_data);
                }

                if (is_numeric($count) && $count > 0) {
                    $this->session->set_flashdata('success_msg', 'UOM added successfully');
                    redirect('uomlist');
                } elseif ($count == "duplicate") {
                    $this->session->set_flashdata('error_msg', 'UOM already added');
                    $data['post'] = $this->input->post();
                    redirect('addUomList');
                } else {
                    $this->session->set_flashdata('error_msg', 'Failed to add UOM');
                    $data['post'] = $this->input->post();
                    redirect('addUomList');
                }
            } else {
                $data['post'] = $this->input->post();
                redirect('addUomList');
            }
        } else {
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['uom_list'] = $this->uommodel->get_uom($user_id);
            $data['uom_type_list'] = $this->uommodel->get_uomtypes($user_id);
//            echo "<pre>"; 
//            print_r( $data['uom_type_list']); exit(); 
            load_view_template($data, 'master/add_uom');
        }
    }

    public function add_uomType_list() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('uom_type', 'uom_type', 'required');
//            $this->form_validation->set_rules('uom_name', 'uom_name', 'required');
            if ($this->form_validation->run() == TRUE) {

                $data = array(
                    'name' => $this->input->post('uom_type'),
                    'createdat' => date('Y-m-d H:i:s'),
                    'createdby' => $user_id,
                    'isactive' => 1
                );

                $count = $this->uommodel->insert_uom_type($data);

                if (is_numeric($count) && $count > 0) {
                    $this->session->set_flashdata('success_msg', 'UOM Type added successfully');
                    redirect('uom_type_list');
                } elseif ($count == "duplicate") {
                    $this->session->set_flashdata('error_msg', 'UOM Type already added');
                    $data['post'] = $this->input->post();
                    redirect('addUomTypeList');
                } else {
                    $this->session->set_flashdata('error_msg', 'Failed to add UOM Type');
                    $data['post'] = $this->input->post();
                    redirect('addUomTypeList');
                }
            } else {
                $data['post'] = $this->input->post();
                redirect('addUomTypeList');
            }
        } else {
            $data['dataHeader'] = $this->users->get_allData($user_id);
//            $data['uom_list'] = $this->uommodel->get_uom($user_id);
            load_view_template($data, 'master/add_uom_type');
        }
    }

    public function uomtypelist_update() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($this->input->post('editsubmit')) {
            $this->form_validation->set_rules('uom_type', 'uom_type', 'required');
//            $this->form_validation->set_rules('uom_name', 'uom_name', 'required');
            if ($this->form_validation->run() == TRUE) {
                $id = $this->input->post('edit_id');

                $data = array(
                    'name' => $this->input->post('uom_type'),
                );
                $count = $this->uommodel->uomtype_update($id, $data);

                if ((is_numeric($count) && $count > 0)) {
                    $this->session->set_flashdata('success_msg', 'UOM Type updated successfully');
                    redirect('uom_type_list');
                } elseif ($count == "duplicate") {
                    $this->session->set_flashdata('error_msg', 'UOM Type already added');
                    $this->session->set_userdata('edit_uom_type', $this->input->post('edit_id'));
                    redirect('updateUomTypeList');
                } else {
                    $this->session->set_flashdata('error_msg', 'Failed to update UOM Type');
                    $this->session->set_userdata('edit_uom_type', $this->input->post('edit_id'));
                    $data['post'] = $this->input->post();
                    redirect('updateUomTypeList');
                }
            } else {
                $this->session->set_userdata('edit_uom_type', $this->input->post('edit_id'));
                $data['post'] = $this->input->post();
                redirect('updateUomTypeList');
            }
        }
        if ($this->input->post('post') == 'delete') {
            $id = $this->input->post('id');
            $data = array('isdeleted' => 1);
            $response = $this->uommodel->uomtype_update($id, $data);

            if ($response > 0) {
                $this->session->set_flashdata('success_msg', 'Successfully deleted an UOM type');
            } else {
                $this->session->set_flashdata('error_msg', 'Failed to delete an UOM type');
            }
            redirect('uom_type_list');
        }
        if ($this->input->post('post') == 'edit' || $this->session->userdata('edit_uom_type')) {
            if ($this->input->post('id')) {
                $id = $this->input->post('id');
                $data['uom_type_id'] = $id;
            } elseif ($this->session->userdata('edit_uom_type')) {
                $id = $this->session->userdata('edit_uom_type');
                $data['uom_type_id'] = $id;
            }

//           $data['uom_list'] = $this->uommodel->get_uom($user_id);
            $data['result'] = $this->uommodel->get_uom_type($id);

            $data['dataHeader'] = $this->users->get_allData($user_id);
            $this->session->unset_userdata('edit_uom_type');
            load_view_template($data, 'master/edit_uom_type');
        }
    }

    public function uomlist_update() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($this->input->post('editsubmit')) {
            // print_r($_POST); exit;
            $this->form_validation->set_rules('uom_type', 'uom_type', 'required');
            $this->form_validation->set_rules('uom_name[]', 'uom_name', 'required');
            if ($this->form_validation->run() == TRUE) {
                $id = $this->input->post('edit_id');

                $uom_name_array = $this->input->post('uom_name');
                //$this->uommodel->delete_uom($id);
                ///  print_r($uom_name_array);                    exit(); 
                if (is_array($uom_name_array)) {
                     $data = array('isdeleted' => 1);
                     $this->uommodel->delete_uom_record($id, $data); 
                    foreach ($uom_name_array as $uom_name) {                      
                        if ($uom_name && $uom_name != 'null') {
                            $alreadyexist= $this->uommodel->check_exist_uom($id,$uom_name);                            
                            if(count($alreadyexist)>0){
                                $data = array('isdeleted' => 0);
                              $count= $this->uommodel->update_uom_record($id,$uom_name,$data);
                            }else{
                                $uom_data = array(
                                'name' => $uom_name,
                                'createdat' => date('Y-m-d H:i:s'),
                                'createdby' => $user_id,
                                'isactive' => 1,
                                'uom_type_id' => $this->input->post('edit_id'),
                            );
                            $count = $this->uommodel->insert_uom($uom_data);
                                
                            } 
                        }
                    }
                } else {

                    $uom_data = array(
                        'name' => $this->input->post('uom_name'),
                        'createdat' => date('Y-m-d H:i:s'),
                        'createdby' => $user_id,
                        'isactive' => 1
                    );
                    $count = $this->uommodel->insert_uom($uom_data);
                }



                if ((is_numeric($count) && $count > 0) || (is_numeric($um_count) && $um_count > 0)) {
                    $this->session->set_flashdata('success_msg', 'UOM Type updated successfully');
                    redirect('uomlist');
                } else {
                    $this->session->set_flashdata('error_msg', 'Failed to update UOM Type');
                    $this->session->set_userdata('edit_uom_type', $this->input->post('edit_id'));
                    $data['post'] = $this->input->post();
                    redirect('updateUomList');
                }
            } else {
                $this->session->set_userdata('edit_uom_type', $this->input->post('edit_id'));
                $data['post'] = $this->input->post();
                redirect('updateUomList');
            }
        }
        if ($this->input->post('post') == 'delete') {
            $id = $this->input->post('id');
            $data = array('isdeleted' => 1);
            $response = $this->uommodel->delete_uom_record($id, $data);
            if ($response > 0) {
                $this->session->set_flashdata('success_msg', 'Successfully deleted an UOM type');
            } else {
                $this->session->set_flashdata('error_msg', 'Failed to delete an UOM type');
            }
            redirect('uomlist');
        }
        if ($this->input->post('post') == 'edit' || $this->session->userdata('edit_uom_type')) {
            if ($this->input->post('id')) {
                $id = $this->input->post('id');
                $data['uom_type_id'] = $id;
            } elseif ($this->session->userdata('edit_uom_type')) {
                $id = $this->session->userdata('edit_uom_type');
                $data['uom_type_id'] = $id;
            }

            $data['uom_list'] = $this->uommodel->get_uomtypes($user_id);
            $data['result'] = $this->uommodel->get_uom_type($id);
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $this->session->unset_userdata('edit_uom_type');
            load_view_template($data, 'master/edit_uom');
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

    public function getuom_autocomplete_c() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        $keyword = $this->input->post('term');
//        $this->TaskModel->getTask_autocomplete($keyword);
    }

    public function uom_details() {
        if ($this->input->post('uom_id')) {
            $id = explode('_', $this->input->post('uom_id'));
            $data['sr_no'] = $id[1];
            $data['result'] = $this->uommodel->get_uom_type($id[0]);

            $view = $this->load->view('master/modal/uom_type', $data);
            echo $view;
        }
    }

}
