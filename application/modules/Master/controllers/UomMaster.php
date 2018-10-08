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
    }

    public function uom_type_list() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('UOM Type');
            //check user Permission
            userPermissionCheck($data['permission'], 'view');

            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "UOM Type List";
            $data['uom_type_list'] = $this->uommodel->uom_types($user_id);

            load_view_template($data, 'master/Uom_type_List');
        }
    }

    public function uomlist() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('UOM');
            //check user Permission
            userPermissionCheck($data['permission'], 'view');

            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "UOM List";
//            $data['uom_type_list'] = $this->uommodel->get_uomtypes($user_id);
            $data['uom_type_list'] = $this->uommodel->get_uomlistrecords();

            load_view_template($data, 'master/UomList');
        }
    }

    public function add_uom_list() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        $data['permission'] = $this->users->get_permissions('UOM');
        //check user Permission
        userPermissionCheck($data['permission'], 'add');

        $update_count = '';
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('uom_type', 'uom_type', 'required');
            if ($this->input->post('uom_name')) {
                $this->form_validation->set_rules('uom_name[]', 'uom_name', 'required');
            } else {
                $this->form_validation->set_rules('uom_name_input', 'uom_name', 'required');
            }
            if ($this->form_validation->run() == TRUE) {
                $uom_name_array = $this->input->post('uom_name');
                $uom_type_id = $this->input->post('uom_type');
                $dummyvalue = array_count_values($uom_name_array);
                foreach ($dummyvalue AS $values_key) {
                    if ($values_key == 2) {
                        $update_count = 1;
                    }
                }
                if (!$update_count) {
                    if (is_array($uom_name_array)) {
                        foreach ($uom_name_array as $uom_name) {
                            if ($uom_name && $uom_name != 'null') {
                                $qmlist = $this->uommodel->get_uom_data($uom_type_id);
                                foreach ($qmlist as $qm_name) {
                                    if (!in_array($qm_name['name'], $uom_name_array)) {
                                        $data = array('isdeleted' => 1);
                                        $this->uommodel->update_uom_record($uom_type_id, $qm_name['name'], $data);
                                    }
                                }

                                $alreadyexist = $this->uommodel->check_exist_uom($uom_type_id, $uom_name);

                                if (count($alreadyexist) > 0) {
                                    $count = 1;
                                } else {
                                    $uom_data = array(
                                        'name' => $uom_name,
                                        'createdat' => date('Y-m-d H:i:s'),
                                        'createdby' => $user_id,
                                        'uom_type_id' => $this->input->post('uom_type'),
                                    );
                                    if ($this->input->post('status') == 'on') {
                                        $uom_data['isactive'] = 1;
                                    } else {
                                        $uom_data['isactive'] = 0;
                                    }
                                    $count = $this->uommodel->insert_uom($uom_data);
                                }
                            }
                        }
                    } else {
                        $uom_data = array(
                            'name' => $this->input->post('uom_name'),
                            'createdat' => date('Y-m-d H:i:s'),
                            'createdby' => $user_id,
                        );
                        if ($this->input->post('status') == 'on') {
                            $uom_data['isactive'] = 1;
                        } else {
                            $uom_data['isactive'] = 0;
                        }
                        $count = $this->uommodel->insert_uom($uom_data);
                    }
                }

                if (is_numeric($count) && $count > 0) {
                    $this->session->set_flashdata('success_msg', 'UOM added successfully');
                    redirect('uomlist');
                } elseif ($update_count) {
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
            $data['dataHeader']['title'] = "Add UOM";
            $data['uom_list'] = $this->uommodel->get_uom($user_id);
//            $data['uom_type_list'] = $this->uommodel->get_uomtypes($user_id);
            $data['uom_type_list'] = $this->uommodel->uom_types($user_id);

            load_view_template($data, 'master/add_uom');
        }
    }

    public function add_uomType_list() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        $data['permission'] = $this->users->get_permissions('UOM Type');
        //check user Permission
        userPermissionCheck($data['permission'], 'add');

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
                );
                if ($this->input->post('status') == 'on') {
                    $data['isactive'] = 1;
                } else {
                    $data['isactive'] = 0;
                }
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
            $data['dataHeader']['title'] = "Add UOM Type";
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
                if ($this->input->post('status') == 'on') {
                    $data['isactive'] = 1;
                } else {
                    $data['isactive'] = 0;
                }
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
//            $check = $this->uommodel->check_uomtype_in_use($id);
//            if ($check > 0) {
//                $this->session->set_flashdata('error_msg', 'UOM Type is already in Use');
//            } else {
            $data = array('isdeleted' => 1);
            $response = $this->uommodel->uomtype_update($id, $data);

            if ($response > 0) {
                $this->session->set_flashdata('success_msg', 'Successfully deleted an UOM type');
            } else {
                $this->session->set_flashdata('error_msg', 'Failed to delete an UOM type');
            }
//            }
            redirect('uom_type_list');
        }
        if ($this->input->post('post') == 'edit' || $this->session->userdata('edit_uom_type')) {
            $data['permission'] = $this->users->get_permissions('UOM Type');
            //check user Permission
            userPermissionCheck($data['permission'], 'update');

            if ($this->input->post('id')) {
                $id = $this->input->post('id');
                $data['uom_type_id'] = $id;
            } elseif ($this->session->userdata('edit_uom_type')) {
                $id = $this->session->userdata('edit_uom_type');
                $data['uom_type_id'] = $id;
            }

//           $data['uom_list'] = $this->uommodel->get_uom($user_id);
            $data['result'] = $this->uommodel->uom_types($user_id, $id);

            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Edit UOM Type";
            $this->session->unset_userdata('edit_uom_type');
            load_view_template($data, 'master/edit_uom_type');
        }
    }

    public function uomlist_update() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        $update_count = '';
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');

        if ($this->input->post('editsubmit')) {
            // print_r($_POST); exit;
            $this->form_validation->set_rules('uom_type', 'uom_type', 'required');
            $this->form_validation->set_rules('uom_name[]', 'uom_name', 'required');
            if ($this->form_validation->run() == TRUE) {
                $id = $this->input->post('edit_id');
                $uom_name_array = $this->input->post('uom_name');
                $dummyvalue = array_count_values($uom_name_array);
                foreach ($dummyvalue AS $values_key) {
                    if ($values_key == 2) {
                        $update_count = 1;
                    }
                }
                if (!$update_count) {
                    if (is_array($uom_name_array)) {
                        foreach ($uom_name_array as $uom_name) {
                            if ($uom_name && $uom_name != 'null') {
                                $qmlist = $this->uommodel->get_uom_data($id);

                                foreach ($qmlist as $qm_name) {
                                    if (!in_array($qm_name['name'], $uom_name_array)) {
                                        $data = array('isdeleted' => 1);
                                        $this->uommodel->update_uom_record($id, $qm_name['name'], $data);
                                    }
                                }
                                if ($this->input->post('status') == 'on') {
                                    $isactive = 1;
                                } else {
                                    $isactive = 0;
                                }
                                $alreadyexist = $this->uommodel->check_exist_uom($id, $uom_name);
//                                echo "<pre>";
//                                echo print_r($alreadyexist);
//                                exit();
                                if (count($alreadyexist) > 0) {
                                    $count = 1;
                                    $uom_data = array(
                                        'isactive' => $isactive
                                    );

                                    $count = $this->uommodel->update_uom($alreadyexist[0]['id'], $uom_data);
                                } else {
                                    $uom_data = array(
                                        'name' => $uom_name,
                                        'createdat' => date('Y-m-d H:i:s'),
                                        'createdby' => $user_id,
                                        'uom_type_id' => $this->input->post('edit_id'),
                                        'isactive' => $isactive
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
                        );
                        if ($this->input->post('status') == 'on') {
                            $uom_data['isactive'] = 1;
                        } else {
                            $uom_data['isactive'] = 0;
                        }
                        $count = $this->uommodel->insert_uom($uom_data);
                    }
                }


                if ((is_numeric($count) && $count > 0) || (is_numeric($um_count) && $um_count > 0)) {
                    $this->session->set_flashdata('success_msg', 'UOM Type updated successfully');
                    redirect('uomlist');
                } else if (isset($update_count)) {
                    $this->session->set_flashdata('error_msg', 'Failed to update UOM Type Can not add duplicated UOM');
                    $this->session->set_userdata('edit_uom_type', $this->input->post('edit_id'));
                    $data['post'] = $this->input->post();
                    redirect('updateUomList');
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
//            $check = $this->uommodel->check_uom_in_use($id);
//            if ($check > 0) {
//                $this->session->set_flashdata('error_msg', 'UOM is already in Use');
//            } else {
            $data = array('isdeleted' => 1);
            $response = $this->uommodel->delete_uom_record($id, $data);
            if ($response > 0) {
                $this->session->set_flashdata('success_msg', 'Successfully deleted an UOM type');
            } else {
                $this->session->set_flashdata('error_msg', 'Failed to delete an UOM type');
            }
//            }
            redirect('uomlist');
        }
        if ($this->input->post('post') == 'edit' || $this->session->userdata('edit_uom_type')) {
            $data['permission'] = $this->users->get_permissions('UOM');
            //check user Permission
            userPermissionCheck($data['permission'], 'update');
            if ($this->input->post('id')) {
                $id = $this->input->post('id');
                $data['uom_type_id'] = $id;
            } elseif ($this->session->userdata('edit_uom_type')) {
                $id = $this->session->userdata('edit_uom_type');
                $data['uom_type_id'] = $id;
            }

            $data['uom_list'] = $this->uommodel->uom_types($user_id);
            $data['result'] = $this->uommodel->get_uom_type($id);
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Edit UOM";
            $this->session->unset_userdata('edit_uom_type');
            load_view_template($data, 'master/edit_uom');
        }
    }

    public function get_uom() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        $type_id = '';
        if ($this->session->userdata('user_id'))
            $user_id = $this->session->userdata('user_id');
        $data['uom_list'] = $this->uommodel->get_uom($user_id, 'json', $type_id);
    }

    public function get_uom_list_data() {
        $data = '';
//        $type_id='';
//        $uom_list='';
        if ($this->input->post('type_id')) {
            $type_id = $this->input->post('type_id');
        }

        if (isset($type_id))
            $uom_list = $this->uommodel->get_uom_data($type_id);

        if (isset($uom_list)) {
            foreach ($uom_list as $uml) {

                $data.='<span class="tag"><input type="hidden" class="form-control" id="uom_name" placeholder="UOM" name="uom_name[]" value="' . $uml['name'] . '">' . $uml['name'] . '</span>';
            }
            echo $data;
        }
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
//            $data['result'] = $this->uommodel->get_uom_type($id[0]);
            $data['result'] = $this->uommodel->get_uomlistrecords($id[0]);
//            $response = $this->uommodel->get_uomlistrecords('user_id');
            $view = $this->load->view('master/modal/uom', $data);
            echo $view;
        }
    }

    public function uom_type_details() {
        if ($this->input->post('uom_id')) {
            $user_id = $this->session->userdata('user_id');
            $id = explode('_', $this->input->post('uom_id'));
            $data['sr_no'] = $id[1];
            $data['result'] = $this->uommodel->uom_types($user_id, $id[0]);

            $view = $this->load->view('master/modal/uom_type', $data);
            echo $view;
        }
    }

    public function add_uom_icon() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } else {
            if ($this->session->userdata('user_id'))
                $user_id = $this->session->userdata('user_id');

            if ($_POST) {
                $this->form_validation->set_rules('uom', 'UOM Type', 'required');
                $this->form_validation->set_rules('icon_path', 'Icon Path', 'required');
                if ($this->form_validation->run() == TRUE) {
                    $uom_id = $this->input->post('uom');
                    $insert_data = array(
                        'iconpath' => $this->input->post('icon_path')
                    );

                    $response = $this->uommodel->update_uom_icon($uom_id, $insert_data);
                    if ($response > 0) {
                        $this->session->unset_userdata('uom_icon_post');
                        $this->session->set_flashdata('success_msg', 'UOM icon path updated successfully');
                        redirect('uomlist');
                    } else {
                        $this->session->set_userdata('uom_icon_post', $this->input->post());
                        $this->session->set_flashdata('error_msg', 'Failed to update UOM icon path');
                        redirect('manageIcon');
                    }
                } else {
                    $data['uom_id'] = $this->input->post('uom');
                    $data['dataHeader'] = $this->users->get_allData($user_id);
                    $data['dataHeader']['title'] = "Manage UOM Icon";
                    $data['uom_icon_data'] = $this->uommodel->getUOM();
                    load_view_template($data, 'master/uom_icon/add_view');
                }
            } else {
                $data['dataHeader'] = $this->users->get_allData($user_id);
                $data['dataHeader']['title'] = "Manage UOM Icon";
                $data['uom_icon_data'] = $this->uommodel->getUOM();
                load_view_template($data, 'master/uom_icon/add_view');
            }
        }
    }

    public function get_iconPath() {
        if ($this->input->post('uom_id')) {
            $id = $this->input->post('uom_id');
            $response = $this->uommodel->get_iconPath($id);
            if (isset($response)) {
                echo $response;
            }
        }
    }

}
