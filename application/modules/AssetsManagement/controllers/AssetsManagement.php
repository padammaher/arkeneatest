<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AssetsManagement extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->model(array('users', 'group_model', 'country', 'Assets'));
        // $this->load->helper(array('url', 'language'));
        $this->load->helper(array('url', 'language', 'form', 'master_helper'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    // redirect if needed, otherwise display the user list
    public function index() {
        
    }

    public function Assets_add() {


        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('Asset Management');
            //check user Permission
            userPermissionCheck($data['permission'], 'add');

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            //list the users
            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();
            $this->session->unset_userdata('rule_id');
            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Add Asset";


            $data['location_list'] = $this->Assets->CustomerLocation_list($user_id);
            $data['category_list'] = $this->Assets->AssetCategory_list($user_id);
            $data['type_list'] = $this->Assets->AssetType_list($user_id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $unique_Data_with_date = array(
                    'code' => $this->input->post('Assetcode'),
                    'createdby' => $user_id,
                    'startdate' => date("Y-m-d", strtotime($this->input->post('startdate'))),
                    'enddate' => date("Y-m-d", strtotime($this->input->post('enddate')))
                );

                $unique_Data = array(
                    'code' => $this->input->post('Assetcode'),
//                    'customer_locationid' => $this->input->post('Customerlocation'),
//                    'asset_catid' => $this->input->post('Assetcategory'),
//                    'asset_typeid' => $this->input->post('Assettype'),
//                    'serial_no' => $this->input->post('Assetserialno'),
//                    'make' => $this->input->post('Make'),
//                    'model' => $this->input->post('Modelno'),
//                    'ismovable' => $this->input->post('Movable'),
                    'createdby' => $user_id,
//                    'isactive' => ($this->input->post('isactive')) == 'on' ? '1' : '0',
                    'startdate' => date("Y-m-d", strtotime($this->input->post('startdate'))),
                    'enddate' => date("Y-m-d", strtotime($this->input->post('enddate')))
                );

                $this->form_validation->set_rules('Assetcode', 'Asset Code', 'required|alpha_numeric');
                $this->form_validation->set_rules('Customerlocation', 'User Location', 'required');
                $this->form_validation->set_rules('Assetcategory', 'Asset Cotegory', 'required');
                $this->form_validation->set_rules('Assettype', 'Asset Type', 'required');
                // $this->form_validation->set_rules('specification', 'Asset specification', 'required');
                $this->form_validation->set_rules('Assetserialno', 'Serial number', 'required|alpha_numeric');
                $this->form_validation->set_rules('Make', 'Make', 'required|alpha_numeric');
                $this->form_validation->set_rules('Modelno', 'Model', 'required|alpha_numeric');
                // $this->form_validation->set_rules('description', 'Description', 'required');
                $this->form_validation->set_rules('Movable', 'Movable / Immovable', 'required');
                $this->form_validation->set_rules('startdate', 'Start date', 'required');
                $this->form_validation->set_rules('enddate', 'End date', 'required');

                // $isUnique = $this->Assets->checkassetcodeIfExists('asset', $unique_Data);

                if ($this->form_validation->run() == TRUE) {
                    // var_dump($isUnique);die;
                    $Checkstartdate = $this->input->post('startdate');
                    $CheckEnddate = $this->input->post('enddate');

                    if (date("Y-m-d", strtotime($CheckEnddate)) <= date("Y-m-d", strtotime($Checkstartdate))) {

                        $this->session->set_flashdata('note_msg', 'In-valid date please Check the start and end date..!');
                        load_view_template($data, 'Assets/assets_add');
                    } else {

                        $isDateUnique = $this->Assets->checkassetcodeIfExists_or_scheduled_for_add('asset', $unique_Data_with_date);

                        if ($isDateUnique) {
                            $this->session->set_flashdata('note_msg', 'Assets Code already schedule..! please check start & end date');
                            load_view_template($data, 'Assets/assets_add');
                        } else {
//                    if ($isUnique) {
//
//                        $this->session->set_flashdata('error_msg', 'Assets already added!');
//                        load_view_template($data, 'Assets/assets_add');
//                    } else {
                            $assets_data = array(
                                'code' => $this->input->post('Assetcode'),
                                'customer_locationid' => $this->input->post('Customerlocation'),
                                'asset_catid' => $this->input->post('Assetcategory'),
                                'asset_typeid' => $this->input->post('Assettype'),
                                'specification' => $this->input->post('assetspecification'),
                                'serial_no' => $this->input->post('Assetserialno'),
                                'make' => $this->input->post('Make'),
                                'model' => $this->input->post('Modelno'),
                                'description' => $this->input->post('Description'),
                                'ismovable' => $this->input->post('Movable'),
                                'createdby' => $user_id,
                                'createdat' => date('Y-m-d'),
                                'isactive' => ($this->input->post('isactive')) == 'on' ? '1' : '0',
                                'isdeleted' => 0,
                                'startdate' => date("Y-m-d", strtotime($this->input->post('startdate'))),
                                'enddate' => date("Y-m-d", strtotime($this->input->post('enddate')))
                            );
                            //  echo "<pre>";
                            $insetreddata = $this->Assets->add_assets($assets_data);
                            if ($insetreddata) {
                                $this->session->set_flashdata('success_msg', 'Assets Successfully added');
                                redirect('Assets_list', 'refresh');
                            } else {
                                $this->session->set_flashdata('error_msg', 'Assets failed to Added');
                                redirect('Assets_list', 'refresh');
                            }
                        }
                    }
                } else {
                    load_view_template($data, 'Assets/assets_add');
                }
            } else {
                clearstatcache();

                load_view_template($data, 'Assets/assets_add');
            }
        }
    }

    public function Asset_List() {

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions(['Asset Management', 'Asset Location', 'Asset User', 'Asset Parameter Range']);
            //check user Permission
            userPermissionCheck($data['permission'], 'view', 'Asset Management');

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->session->unset_userdata('rule_id');
            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Asset Management";

            $data['assetlist'] = $this->Assets->assets_list($user_id);
            $data['assetlistinfo'] = $this->Assets->assets_list_info($user_id);
            $data['location_list'] = $this->Assets->CustomerLocation_list($user_id);
            $data['category_list'] = $this->Assets->AssetCategory_list($user_id);
            $data['type_list'] = $this->Assets->AssetType_list($user_id);
            //clear asset_id from session
            $this->session->unset_userdata('asset_id');
            load_view_template($data, 'Assets/assets_list');
        }
    }

    public function Asset_edit() {


        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('Asset Management');
            //check user Permission
            userPermissionCheck($data['permission'], 'update');

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Edit Asset";


            // $user_id = $this->session->userdata('user_id');
            $edit_asset_list_id = '';
            $data['location_list'] = $this->Assets->CustomerLocation_list($user_id);
            $data['category_list'] = $this->Assets->AssetCategory_list($user_id);
            $data['type_list'] = $this->Assets->AssetType_list($user_id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // $edit_asset_list_id = explode(" ", $this->input->post('edit_asset_list_id'));
                $form_action = $this->input->post('post');
                $edit_asset_list_id = $this->input->post('id');
                //var_dump($edit_asset_list_id[0]);die;
                $data['Assets_edit_data'] = $this->Assets->Asset_edit($edit_asset_list_id);

                if ($form_action == "edit") {
                    // $this->session->set_flashdata('error_msg', 'assets already existed!');
                    load_view_template($data, 'Assets/assets_edit');
                } else if ($form_action == "update") {
                    //   print_r($this->input->post());
                    //  exit;
                    $this->form_validation->set_rules('Assetcode', 'Asset Code', 'required');
                    $this->form_validation->set_rules('Customerlocation', 'User Location', 'required');
                    $this->form_validation->set_rules('Assetcategory', 'Asset Cotegory', 'required');
                    $this->form_validation->set_rules('Assettype', 'Asset Type', 'required');
                    // $this->form_validation->set_rules('specification', 'Asset specification', 'required');
                    $this->form_validation->set_rules('Assetserialno', 'Serial number', 'required|alpha_numeric');
                    $this->form_validation->set_rules('Make', 'Make', 'required|alpha_numeric');
                    $this->form_validation->set_rules('Modelno', 'Model', 'required|alpha_numeric');
                    // $this->form_validation->set_rules('description', 'Description', 'required');
                    $this->form_validation->set_rules('startdate', 'Start date', 'required');
                    $this->form_validation->set_rules('enddate', 'End date', 'required');

                    $this->form_validation->set_rules('Movable', 'Movable / Immovable', 'required');
                    $assets_data = array(
                        'code' => $this->input->post('Assetcode'),
                        'customer_locationid' => $this->input->post('Customerlocation'),
                        'asset_catid' => $this->input->post('Assetcategory'),
                        'asset_typeid' => $this->input->post('Assettype'),
                        'specification' => $this->input->post('assetspecification'),
                        'serial_no' => $this->input->post('Assetserialno'),
                        'make' => $this->input->post('Make'),
                        'model' => $this->input->post('Modelno'),
                        'description' => $this->input->post('Description'),
                        'ismovable' => $this->input->post('Movable'),
                        'serial_no' => $this->input->post('Assetserialno'),
                        'createdby' => $user_id,
                        'createdat' => date('Y-m-d'),
                        'isactive' => ($this->input->post('isactive')) == 'on' ? '1' : '0',
                        'startdate' => date("Y-m-d", strtotime($this->input->post('startdate'))),
                        'enddate' => date("Y-m-d", strtotime($this->input->post('enddate')))
                    );

                    $Checkstartdate = date("Y-m-d", strtotime($this->input->post('startdate')));
                    $CheckEnddate = date("Y-m-d", strtotime($this->input->post('enddate')));

                    if ($Checkstartdate >= $CheckEnddate) {
                        $this->session->set_flashdata('note_msg', 'In-valid date please Check the start and end date..!');
                        load_view_template($data, 'Assets/assets_edit');
                    } else {
                        $id = $edit_asset_list_id;
                        //  var_dump($id);die;
                        $unique_Data = array(
                            'code' => $this->input->post('Assetcode'),
                            'createdby' => $user_id,
                            'startdate' => date("Y-m-d", strtotime($this->input->post('startdate'))),
                            'enddate' => $CheckEnddate
                        );
                        $unique_Data_without_date = array(
//                        'code' => $this->input->post('Assetcode'),
                            'customer_locationid' => $this->input->post('Customerlocation'),
                            'asset_catid' => $this->input->post('Assetcategory'),
                            'asset_typeid' => $this->input->post('Assettype'),
                            'specification' => $this->input->post('assetspecification'),
                            'serial_no' => $this->input->post('Assetserialno'),
                            'make' => $this->input->post('Make'),
                            'model' => $this->input->post('Modelno'),
                            'description' => $this->input->post('Description'),
                            'ismovable' => $this->input->post('Movable'),
                            'serial_no' => $this->input->post('Assetserialno'),
                            'createdby' => $user_id,
                            'isactive' => ($this->input->post('isactive')) == 'on' ? '1' : '0',
//                         'startdate'=>date("Y-m-d",strtotime($this->input->post('startdate'))),
//                        'enddate'=>$CheckEnddate
                        );
//date validation  ---------------------  
                        if ($this->form_validation->run() == TRUE) {
                            if ($Checkstartdate != $this->input->post('oldstartdate') || $CheckEnddate != $this->input->post('oldenddate')) {
                                $isDateUnique = $this->Assets->checkassetcodeIfExists_or_scheduled('asset', $unique_Data);
                            } else {
                                $isDateUnique = $this->Assets->checkassetcodeIfExists('asset', $unique_Data);
                            }


                            if ($isDateUnique == 'DateProblem') {
                                $this->session->set_flashdata('note_msg', 'Assets successfully updated and already schedule this..! please check the date`s');
                                $updatedata = $this->Assets->update_assets($unique_Data_without_date, $id);
//                            load_view_template($data, 'Assets/assets_edit');
                                redirect(base_url('Assets_list'));
                            } elseif ($isDateUnique > 0 && $isDateUnique != 'DateProblem') {
                                $this->session->set_flashdata('note_msg', 'Assets Code already updated');
                                load_view_template($data, 'Assets/assets_edit');
                            } else {

//date validation  --------------------- 
//                         var_dump($isUnique);die;
//                        exit;
//                        if ($isUnique) {
//                            $this->session->set_flashdata('note_msg', 'Assets already updated');
//                            load_view_template($data, 'Assets/assets_edit');
//                        } else {
                                $updatedata = $this->Assets->update_assets($assets_data, $id);
                                if ($updatedata) {
                                    $this->session->set_flashdata('success_msg', 'Assets Successfully updated');
                                    redirect(base_url('Assets_list'));
                                } else {
                                    $this->session->set_flashdata('error_msg', 'Assets failed to Update');
                                    redirect(base_url('Assets_list'));
                                }
//                        }
                            }
                        } else {
                            load_view_template($data, 'Assets/assets_edit');
                        }
                    }
                    //              Assets_list
                } else if ($form_action == "delete") {

                    $id1 = $edit_asset_list_id;
                    // var_dump($edit_asset_list_id);die; 
                    $data = $this->Assets->delete_assets($edit_asset_list_id);
                    if ($data) {
                        $this->session->set_flashdata('success_msg', 'Assets Successfully deleted');
                        redirect(base_url('Assets_list'));
                    }
                }
            } else {

                //            $data['assetlist'] = $this->Assets->assets_list();

                load_view_template($data, 'Assets/assets_edit');
            }
        }
    }

    public function Asset_delete() {

        $data['permission'] = $this->users->get_permissions('Asset Management');
        //check user Permission
        userPermissionCheck($data['permission'], 'delete');

        $user_id = $this->session->userdata('user_id');
        $edit_asset_list_id = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $this->input->post('edit_asset_list_id');

            // $edit_asset_list_id=explode(" ",$this->input->post('edit_asset_list_id'));
            if ($edit_asset_list_id != NULL) {
                $assets_data = array(
                    'isactive' => 0
                );

                $id = $edit_asset_list_id[1];

                $data = $this->Assets->delete_assets($assets_data, $id);
                if ($data == 1) {
                    $this->session->set_flashdata('success_msg', 'Assets Deleted Successfully');
                } else {
                    $this->session->set_flashdata('error_msg', 'Assets failed to delete');
                }
                redirect(base_url('Assets_list'));
                //              Assets_list
            }
        }

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
            //            $data['assetlist'] = $this->Assets->assets_list();


            load_view_template($data, 'Assets/assets_edit');
        }
    }

    public function manage_assets_location() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('Asset Location');
            //check user Permission
            userPermissionCheck($data['permission'], 'update');

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->session->unset_userdata('rule_id');
            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Edit Asset Location";


            load_view_template($data, 'Assets/manage_assets_location');
        }
    }

    public function Assets_location_list() {

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('Asset Location');
            //check user Permission
            userPermissionCheck($data['permission'], 'view');

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $todaysdate = date('Y-m-d');
                $asset_loc_form_action = explode(" ", $this->input->post('asset_loc_form_action'));
                //                  print_r($sensor_form_action); asset_loc_form_action
                $form_action = $this->input->post('asset_location_post');
                $asset_loc_id = $this->input->post('asset_location_post_id');

                $this->form_validation->set_rules('assetcode', 'Asset Code', 'required');
                $this->form_validation->set_rules('asset_location', 'Asset Location', 'required');
                $this->form_validation->set_rules('asset_address', 'Asset address', 'required');

                // $this->form_validation->set_rules('specification', 'Asset specification', 'required');
                $this->form_validation->set_rules('asset_contactno', 'Contact number', 'required|numeric');
                $this->form_validation->set_rules('asset_contactperson', 'Contact person', 'required');
                $this->form_validation->set_rules('asset_contactemail', 'Email', 'required|valid_email');

                // print_r($this->input->post());
                // var_dump($isUnique);
                // die;
                $data['asset_code_list'] = $this->Assets->assetcode_list($user_id);
                $data['asset_location_list'] = $this->Assets->edit_assets_location($asset_loc_id);
                if ($form_action == 'edit') {
                    $data['dataHeader']['title'] = "Edit Asset Location";
                    load_view_template($data, 'Assets/assets_location_edit');
                }
                if ($form_action == 'update') {

                    $unique_Data = array(
                        'location' => $this->input->post('asset_location'),
                        'address' => $this->input->post('asset_address'),
                        'latitude' => $this->input->post('asset_lat'),
                        'contact_no' => $this->input->post('asset_contactno'),
                        'longitude' => $this->input->post('asset_long'),
                        'contact_person' => $this->input->post('asset_contactperson'),
                        'contact_email' => $this->input->post('asset_contactemail'),
                        'isactive' => ($this->input->post('status') == 'on') ? 1 : 0,
                    );
                    if ($this->form_validation->run() == TRUE) {
                        $isUnique = $this->Assets->checkasset_locationIfExists('asset_location', $unique_Data);
                        // echo $isUnique; exit;
                        if ($isUnique) {
                            //                        echo '<script>alert("Asset Code is already existed!");</script>';
                            //                         $this->session->set_flashdata('item', array('msg' => 'Asset Code is already existed!','class' => 'success'));
                            $this->session->set_flashdata('error_msg', 'Asset location is already existed');
                            $data['dataHeader']['title'] = "Edit Asset Location";
                            load_view_template($data, 'Assets/assets_location_edit');
                        } else {
                            $update_data = array('location' => $this->input->post('asset_location'),
                                'address' => $this->input->post('asset_address'),
                                'latitude' => $this->input->post('asset_lat'),
                                'contact_no' => $this->input->post('asset_contactno'),
                                'longitude' => $this->input->post('asset_long'),
                                'contact_person' => $this->input->post('asset_contactperson'),
                                'contact_email' => $this->input->post('asset_contactemail'),
                                'createdat' => $todaysdate,
                                'createdby' => $user_id,
                                'isactive' => ($this->input->post('status') == 'on') ? 1 : 0,
                                'asset_id' => $this->input->post('assetcode')
                            );

                            //                $inserteddata=$this->Assets->add_assets_location($insert_data);
                            //                        print_r($insert_data);
                            //                  exit;
                            $update_asset_location = $this->Assets->Update_asset_location($update_data, $asset_loc_id);
                            if ($update_asset_location) {
                                $this->session->set_flashdata('success_msg', 'Asset location successfully updated');
                                if (!empty($this->input->post('back_action'))) {
                                    return redirect($this->input->post('back_action'), 'refresh');
                                } else {
                                    return redirect('Assets_location_list', 'refresh');
                                }
                            } else {
                                load_view_template($data, 'Assets/assets_location_edit');
                            }
                        }
                    } else {
                        load_view_template($data, 'Assets/assets_location_edit');
                    }
                } elseif ($form_action == 'delete') {

                    //                      echo "delete".$asset_loc_form_action[1]; exit;
                    $delete_asset_location = $this->Assets->Delete_asset_location($asset_loc_id);
                    if ($delete_asset_location) {
                        $this->session->set_flashdata('success_msg', 'Asset location successfully deleted');
                        return redirect('Assets_location_list', 'refresh');
                    }
                }
            } else {
                $data['dataHeader']['title'] = "Asset Location List";
                $data['asset_location_list'] = $this->Assets->assets_location_list($user_id);
                load_view_template($data, 'Assets/assets_location_list');
            }
        }
    }

    public function Assets_location_add() {

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('Asset Location');
            //check user Permission
            userPermissionCheck($data['permission'], 'add');

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->session->unset_userdata('rule_id');
            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Add Asset Location";

            $todaysdate = date('Y-m-d');
            $user_id = $this->session->userdata('user_id');
            $data['asset_code_list'] = $this->Assets->assetcode_list_for_asset_location($user_id);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                //            exit;

                if ($this->input->post('manage_location_add') == 'manage_location_add') {
//                    echo "manage_location_add";                    
//                    print_r($this->input->post('manage_location_add'));
//                    exit;
                    load_view_template($data, 'Assets/assets_location_add');
                } else {
                    $this->form_validation->set_rules('assetcode', 'Asset Code', 'required');
                    $this->form_validation->set_rules('asset_location', 'Asset Location', 'required');
                    $this->form_validation->set_rules('asset_address', 'Asset address', 'required');

                    // $this->form_validation->set_rules('specification', 'Asset specification', 'required');
                    $this->form_validation->set_rules('asset_contactno', 'Contact number', 'required|numeric');
                    $this->form_validation->set_rules('asset_contactperson', 'Contact person', 'required');
                    $this->form_validation->set_rules('asset_contactemail', 'Email', 'required|valid_email');
                    // $this->form_validation->set_rules('description', 'Description', 'required');
                    // $this->form_validation->set_rules('Movable', 'Movable / Immovable', 'required');  
                    if ($this->form_validation->run() == TRUE) {
                        $unique_Data = array(
                            'location' => $this->input->post('asset_location'),
                            'address' => $this->input->post('asset_address'),
                            'latitude' => $this->input->post('asset_lat'),
                            'contact_no' => $this->input->post('asset_contactno'),
                            'longitude' => $this->input->post('asset_long'),
                            'contact_person' => $this->input->post('asset_contactperson'),
                            'contact_email' => $this->input->post('asset_contactemail'),
                            'createdby' => $user_id,
                            'isactive' => '1',
                            'asset_id' => $this->input->post('assetcode'),
                            'isactive' => ($this->input->post('status') == 'on') ? 1 : 0,
                        );
                        $isUnique = $this->Assets->checkasset_locationIfExists('asset_location', $unique_Data);
                        //            print_r($isUnique);
                        //              var_dump($isUnique);
                        //            die;
                        if ($isUnique) {

                            $this->session->set_flashdata('error_msg', 'Asset location is already added');
                            load_view_template($data, 'Assets/assets_location_add');
                        } else {

                            $isUnique = $this->Assets->checkasset_locationIfExists('asset_location', $unique_Data);
                            //            print_r($isUnique);
                            //              var_dump($isUnique);
                            //            die;
                            if ($isUnique) {

                                $this->session->set_flashdata('error_msg', 'Asset location is already added');
                                load_view_template($data, 'Assets/assets_location_add');
                            } else {
                                $insert_data = array('location' => $this->input->post('asset_location'),
                                    'address' => $this->input->post('asset_address'),
                                    'latitude' => $this->input->post('asset_lat'),
                                    'contact_no' => $this->input->post('asset_contactno'),
                                    'longitude' => $this->input->post('asset_long'),
                                    'contact_person' => $this->input->post('asset_contactperson'),
                                    'contact_email' => $this->input->post('asset_contactemail'),
                                    'createdat' => $todaysdate,
                                    'createdby' => $user_id,
                                    'isactive' => '1',
                                    'asset_id' => $this->input->post('assetcode'),
                                    'isdeleted' => 0
                                );


                                $inserteddata = $this->Assets->add_assets_location($insert_data);

                                if ($inserteddata) {
                                    $this->session->set_flashdata('success_msg', 'Asset location successfully added');

                                    if (!empty($this->input->post('back_action'))) {
                                        return redirect($this->input->post('back_action'), 'refresh');
                                    } else {
                                        return redirect('Assets_location_list', 'refresh');
                                    }
                                } else {
                                    load_view_template($data, 'Assets/assets_location_add');
                                }
                            }
                        }
                    } else {
                        load_view_template($data, 'Assets/assets_location_add');
                    }
                }
            } else {



                load_view_template($data, 'Assets/assets_location_add');
            }
        }
    }

    public function User_assets_list() {
        $this->load->helper('form');
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('Asset User');
            //check user Permission
            userPermissionCheck($data['permission'], 'view');

            // set the flash data error message if there is one
            $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Asset-User Management";

            $data['asset_user_list'] = $this->Assets->asset_user_list($user_id);

            load_view_template($data, 'Assets/user_assets_list');
        }
    }

    public function User_asset_add() {
        $this->load->helper('form');
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('Asset User');
            //check user Permission
            userPermissionCheck($data['permission'], 'add');

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');


            $data['asset_code_list'] = $this->Assets->assetcode_list($user_id);
            $data['asset_userid_list'] = $this->Assets->asset_userid_list($user_id);
//            $data['asset_userid_list'] = $this->Assets->asset_users($user_id);
            //                asset_user_form_action

            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Add Asset User";
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $todaysdate = date('Y-m-d');

                if ($this->input->post('manage_asset_add') == 'manage_asset_add') {
                    //echo "0000";die;
                    load_view_template($data, 'Assets/user_asset_add');
                } else {
                    $this->form_validation->set_rules('assetcode', 'Asset Code', 'required');
                    $this->form_validation->set_rules('assetuserid', 'User Name', 'required');

                    if ($this->form_validation->run() == TRUE) {

                        $asset_user_form_action = explode(" ", $this->input->post('asset_user_form_action'));
                        if ($asset_user_form_action[0] == 'add') {
                            $insert_data = array('asset_id' => $this->input->post('assetcode'),
                                'assetuser_id' => $this->input->post('assetuserid'),
                                'createdate' => $todaysdate,
                                'createdby' => $user_id,
                                'isdeleted' => 0,
                                'isactive' => ($this->input->post('status') == 'on') ? 1 : 0
                            );

                            $unique_Data = array('asset_id' => $this->input->post('assetcode'),
                                'assetuser_id' => $this->input->post('assetuserid'),
                                'createdby' => $user_id);
                            $isUnique = $this->Assets->checkasset_locationIfExists('asset_user', $unique_Data);
                            // exit;
                            // echo $isUnique;
                            if ($isUnique) {
                                //                

                                $this->session->set_flashdata('error_msg', 'Asset user is already added');
                                load_view_template($data, 'Assets/user_asset_add');
                            } else {
                                $inserteddata = $this->Assets->add_asset_user($insert_data);

                                if ($inserteddata) {
                                    $this->session->set_flashdata('success_msg', 'Asset user successfully added');
                                    if (!empty($this->input->post('back_action'))) {
                                        return redirect($this->input->post('back_action'), 'refresh');
                                    } else {
                                        return redirect('User_assets_list', 'refresh');
                                    }
                                } else {
                                    return redirect('User_assets_list', 'refresh');
                                }
                            }
                        }
                    } else {
                        load_view_template($data, 'Assets/user_asset_add');
                    }
                }
            } else {

                load_view_template($data, 'Assets/user_asset_add');
            }
        }
    }

    public function User_asset_edit() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('Asset User');
            //check user Permission
            userPermissionCheck($data['permission'], 'update');

            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Edit User Asset";

            $data['asset_code_list'] = $this->Assets->assetcode_list($user_id);
            $data['asset_userid_list'] = $this->Assets->asset_userid_list($user_id);




            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $todaysdate = date('Y-m-d');




                $asset_user_post_id = $this->input->post('asset_user_post_id');
                $asset_user_post = $this->input->post('asset_user_post');
//                 print_r($this->input->post()); exit;
                $data['asset_user_list_data'] = $this->Assets->edit_assets_user($asset_user_post_id);
//                 print_r($this->input->post()); exit;
                $this->form_validation->set_rules('assetcode', 'Asset Code', 'required');
                $this->form_validation->set_rules('assetuserid', 'User Name', 'required');


                if ($asset_user_post == 'edit') {
                    load_view_template($data, 'Assets/user_assets_edit');
                } else if ($asset_user_post == 'update') {
                    $todaysdate = date('Y-m-d');

                    if ($this->form_validation->run() == TRUE) {

                        $update_data = array('asset_id' => $this->input->post('assetcode'),
                            'assetuser_id' => $this->input->post('assetuserid'),
                            'createdate' => $todaysdate,
                            'createdby' => $user_id,
                            'isactive' => ($this->input->post('status') == 'on') ? 1 : 0
                        );


                        $unique_Data = array('asset_id' => $this->input->post('assetcode'),
                            'assetuser_id' => $this->input->post('assetuserid'),
                            'createdby' => $user_id,
                            'isactive' => ($this->input->post('status') == 'on') ? 1 : 0);

                        $isUnique = $this->Assets->checkasset_locationIfExists('asset_user', $unique_Data);
                        // echo $isUnique;
                        // print_r($update_data);exit;
                        if ($isUnique) {
                            //                

                            $this->session->set_flashdata('error_msg', 'Asset user is already updated');
                            load_view_template($data, 'Assets/user_assets_edit');
                        } else {
                            $asset_user_list_data = $this->Assets->update_asset_user($update_data, $asset_user_post_id);

                            if ($asset_user_list_data) {
                                $this->session->set_flashdata('success_msg', 'Asset user successfully updated');
                                if (!empty($this->input->post('back_action'))) {
                                    return redirect($this->input->post('back_action'), 'refresh');
                                } else {
                                    return redirect('User_assets_list', 'refresh');
                                }
                            } else {
                                return redirect('User_assets_list', 'refresh');
                            }
                        }
                    } else {
                        load_view_template($data, 'Assets/user_assets_edit');
                    }
                } else if ($asset_user_post == 'delete') {

                    $delete_user_list_data = $this->Assets->delete_asset_user($asset_user_post_id);
                    if ($delete_user_list_data) {
                        $this->session->set_flashdata('success_msg', 'Asset user successfully deleted');
                        return redirect('User_assets_list', 'refresh');
                    }
                } else {
                    return redirect('User_assets_list', 'refresh');
                }
            }
        }
    }

    public function asset_rule_list() {
        $data['permission'] = $this->users->get_permissions('Asset Rule');
        //check user Permission
        userPermissionCheck($data['permission'], 'view');

        if ($this->input->post('id')) {
            $this->session->unset_userdata('parameter_id');
            $this->session->unset_userdata('parameter_range_id');
            $parameter_range_id = $this->input->post('id');
            $this->session->set_userdata('parameter_range_id', $parameter_range_id);
        } else {
            $parameter_range_id = $this->session->userdata('parameter_range_id');
        }
        $this->session->unset_userdata('rule_id');
        $data['parameter_detail'] = $this->Assets->get_parameter_range($parameter_range_id);
        $this->session->set_userdata('parameter_id', $this->data['parameter_detail'][0]['parameter_id']);
        $user_id = $this->session->userdata('user_id');
        $data['dataHeader'] = $this->users->get_allData($user_id);
        $data['dataHeader']['title'] = "Rule & Action Master List";

        $data['parameter_id'] = $parameter_range_id;
        $data['asset_list'] = $this->Assets->get_asset_rule_list($parameter_range_id);

        load_view_template($data, 'asset_rules/rule_action_master_list');

//        $this->template->set_master_template('template.php', (isset($data) ? $data : NULL));
//        $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
//        $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
//        $this->template->write_view('content', 'asset_rules/rule_action_master_list', (isset($this->data) ? $this->data : NULL), TRUE);
//        $this->template->write_view('footer', 'snippets/footer', '', TRUE);
//        $this->template->render();
    }

    public function add_asset_rule() {
        $data['permission'] = $this->users->get_permissions('Asset Rule');
        //check user Permission
        userPermissionCheck($data['permission'], 'add');

        $parameter_id = $this->session->userdata('parameter_id');
        $user_id = $this->session->userdata('user_id');

        if ($this->input->post('asset_rule_id')) {
            $asset_rule_id = $this->input->post('asset_rule_id');
            $data['asset_detail'] = $this->Assets->get_asset_details($asset_rule_id);
        } else {
            $data['asset_detail'] = '';
        }
        $param_data = $this->Assets->get_paramiter_name($parameter_id);

        $data['param_id'] = (isset($param_data[0]['id'])) ? $param_data[0]['id'] : '';
        $data['parameter_name'] = (isset($param_data[0]['name'])) ? $param_data[0]['name'] : '';
        //print_r($param_data[0]['uom_type_id']); exit(); 
        if ($param_data[0]['uom_type_id'])
            $uom_data = $this->Assets->get_uom_list_type($param_data[0]['uom_type_id']);
        $data['uom_data'] = (isset($uom_data)) ? $uom_data : '';

        $parameter_range = $this->Assets->get_parameter_range_limits($parameter_id);
        $data['paramete_limit'] = $parameter_range;
        // if(isset($uom_data[0]['name']))   
        // $this->data['uom_name'] = $uom_data[0]['name'];
        // if(isset($uom_data[0]['id'])) 
        // $this->data['uom_id'] = $uom_data[0]['id'];

        $data['dataHeader'] = $this->users->get_allData($user_id);
        if ($this->input->post('asset_rule_id')) {
            $data['dataHeader']['title'] = "Edit Rule & Action Master";
        } else {
            $data['dataHeader']['title'] = "Add Rule & Action Master";
        }

        load_view_template($data, 'asset_rules/rule_action_master_add');
//        $this->template->set_master_template('template.php', (isset($data) ? $data : NULL));
//        $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
//        $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
//        $this->template->write_view('content', 'asset_rules/rule_action_master_add', (isset($this->data) ? $this->data : NULL), TRUE);
//        $this->template->write_view('footer', 'snippets/footer', '', TRUE);
//        $this->template->render();
    }

    public function add_asset_rule_detail() {

        $parameter_range_id = $this->session->userdata('parameter_range_id');
        $asset_rule_id = '';
        if ($this->input->post('asset_rule_id'))
            $asset_rule_id = $this->input->post('asset_rule_id');
        if ($this->input->post('rule_name'))
            $data['rule_name'] = $this->input->post('rule_name');
        if ($this->input->post('rule_des'))
            $data['rule_des '] = $this->input->post('rule_des');

        if ($this->input->post('parameter_id'))
            $data['parameter'] = $this->input->post('parameter_id');
        if ($parameter_range_id)
            $data['parameter_range_id'] = $parameter_range_id;

        if ($this->input->post('uom'))
            $data['uom'] = $this->input->post('uom');
        if ($this->input->post('green_value'))
            $data['green_value'] = $this->input->post('green_value');
        if ($this->input->post('orange_value'))
            $data['orange_value '] = $this->input->post('orange_value');
        if ($this->input->post('red_value'))
            $data['red_value '] = $this->input->post('red_value');
        if ($this->input->post('wef_date'))
            $data['wef_date'] = $this->input->post('wef_date');
        if ($this->input->post('rule_status')) {
            if ($this->input->post('rule_status') == 'on') {
                $data['rule_status'] = 1;
            } else {
                $data['rule_status'] = 0;
            }
        } else {
            $data['rule_status'] = 0;
        }

        if (!$asset_rule_id) {
            $insert_id = $this->Assets->add_asset_rule_detail($data, $parameter_range_id);
            if ($insert_id) {
                $this->session->set_flashdata('success_msg', 'Assets rules Added Successfully');
                redirect('Asset_Rule_list', 'refresh');
            } else {
                $this->session->set_flashdata('error_msg', 'Assets rules Added faield ');
                redirect('Asset_Rule_list', 'refresh');
            }
        } else {
            $update_id = $this->Assets->update_asset_rule_detail($data, $asset_rule_id);
            if ($update_id) {
                $this->session->set_flashdata('success_msg', 'Assets rules Added Successfully');
                redirect('Asset_Rule_list', 'refresh');
            } else {
                $this->session->set_flashdata('error_msg', 'Assets rules Added faield ');
                redirect('Asset_Rule_list', 'refresh');
            }
        }
        //   $user_id = $this->session->userdata('user_id');
        //   $data['dataHeader'] = $this->users->get_allData($user_id);
        //$this->data['asset_list']= $this->Assets->get_asset_rule_list(); 
        //   $this->template->set_master_template('template.php');
        //   $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        //   $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
        //   $this->template->write_view('content', 'asset_rules/rule_action_master_list', (isset($this->data) ? $this->data : NULL), TRUE);
        //   $this->template->write_view('footer', 'snippets/footer', '', TRUE);
        //   $this->template->render();
    }

    public function delete_asset_rule() {
        $data['permission'] = $this->users->get_permissions('Asset Rule');
        //check user Permission
        userPermissionCheck($data['permission'], 'delete');

        $asset_rule_id = $this->input->post('asset_rule_id');
        $this->Assets->delete_asset_rule($asset_rule_id);

        // $user_id = $this->session->userdata('user_id');
        // $data['dataHeader'] = $this->users->get_allData($user_id);
        // $this->data['asset_list'] = $this->Assets->get_asset_rule_list();
        redirect('Asset_Rule_list', 'refresh');
        // $this->template->set_master_template('template.php');
        // $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        // $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
        // $this->template->write_view('content', 'asset_rules/rule_action_master_list', (isset($this->data) ? $this->data : NULL), TRUE);
        // $this->template->write_view('footer', 'snippets/footer', '', TRUE);
        // $this->template->render();
    }

    public function asset_parameter_range_list() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions(['Asset Parameter Range', 'Asset Rule']);
            //check user Permission
            userPermissionCheck($data['permission'], 'view', 'Asset Parameter Range');

            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Asset Parameter Range List";
            $this->session->unset_userdata('rule_id');
            //get asset info
            if ($this->input->post('asset_id')) {
                $asset_id = $this->input->post('asset_id');
            } elseif ($this->session->userdata('asset_id')) {
                $asset_id = $this->session->userdata('asset_id');
            }

            $this->session->set_userdata('asset_id', $asset_id);
            $this->session->unset_userdata('paramrange_post');
            $data['asset_details'] = $this->Assets->assets_list($user_id, $asset_id);
            $data['parameter_range_info'] = $this->Assets->parameter_range_list($asset_id);

            load_view_template($data, 'assets_parameter/asset_parameter_range_list');
        }
    }

    public function asset_parameter_add() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('Asset Parameter Range');
            //check user Permission
            userPermissionCheck($data['permission'], 'add');

            $this->load->model('parametermodel');
            if ($this->session->userdata('user_id'))
                $user_id = $this->session->userdata('user_id');

            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                //Add the new parameter range
                $this->form_validation->set_rules('parameter', 'Parameter', 'required');
                $this->form_validation->set_rules('min_value', 'Minimum value', 'required|numeric');
                $this->form_validation->set_rules('max_value', 'Maximum value', 'required|numeric');
                $this->form_validation->set_rules('scaling_factor', 'Scaling factor', 'required|numeric');
                $this->form_validation->set_rules('uom', 'UOM', 'required');
                $this->form_validation->set_rules('bits_per_sign', 'Bits / Sign', 'required|alpha_numeric_spaces');
                if ($this->form_validation->run() == TRUE) {
                    $data = array(
                        'parameter_id' => $this->input->post('parameter'),
                        'min_value' => $this->input->post('min_value'),
                        'max_value' => $this->input->post('max_value'),
                        'scaling_factor' => $this->input->post('scaling_factor'),
                        'uom_id' => $this->input->post('uom'),
                        'bits_per_sign' => $this->input->post('bits_per_sign'),
                        'createddt' => date('Y-m-d H:i:s'),
                        'createdby' => $user_id,
                        'asset_id' => $this->session->userdata('asset_id'),
                    );
                    if ($this->input->post('status') == 'on') {
                        $data['isactive'] = 1;
                    } else {
                        $data['isactive'] = 0;
                    }
                    $count = $this->Assets->asset_parameter_add($data);

                    if (is_numeric($count) && $count > 0) {
                        $this->session->unset_userdata('paramrange_post');
                        $this->session->set_flashdata('success_msg', 'Parameter range added successfully');
                        redirect('asset_parameter_range_list');
                    } elseif ($count == "duplicate") {
                        $this->session->set_userdata('paramrange_post', $this->input->post());
                        $this->session->set_flashdata('error_msg', 'Parameter range already added');
                        redirect('asset_parameter_add');
                    } else {
                        $this->session->set_userdata('paramrange_post', $this->input->post());
                        $this->session->set_flashdata('error_msg', 'Failed to add parameter range');
                        redirect('asset_parameter_add');
                    }
                } else {
                    $data['dataHeader'] = $this->users->get_allData($user_id);
                    $data['parameter_list'] = $this->parametermodel->get_parameterlist($user_id);
                    $data['uom_list'] = $this->Assets->parameter_uom($this->input->post('parameter'));
                    load_view_template($data, 'assets_parameter/asset_parameter_add');
                }
            } else {
                $data['dataHeader'] = $this->users->get_allData($user_id);
                $data['dataHeader']['title'] = "Add Asset Parameter Range";
                $data['parameter_list'] = $this->parametermodel->get_parameterlist($user_id);
                if ($this->session->userdata('paramrange_post')) {
                    $post = $this->session->userdata('paramrange_post');
                    $data['uom_list'] = $this->Assets->parameter_uom($post['parameter']);
                }

                load_view_template($data, 'assets_parameter/asset_parameter_add');
            }
        }
    }

    public function asset_parameter_update() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $this->load->model('parametermodel');
            if ($this->session->userdata('user_id'))
                $user_id = $this->session->userdata('user_id');

            if ($this->input->post('edit_id')) {
                //Update the parameter range
                $this->form_validation->set_rules('parameter', 'Parameter', 'required');
                $this->form_validation->set_rules('min_value', 'Minimum value', 'required|numeric');
                $this->form_validation->set_rules('max_value', 'Maximum value', 'required|numeric');
                $this->form_validation->set_rules('scaling_factor', 'Scaling factor', 'required|numeric');
                $this->form_validation->set_rules('uom', 'UOM', 'required');
                $this->form_validation->set_rules('bits_per_sign', 'Bits / Sign', 'required|alpha_numeric_spaces');
                if ($this->form_validation->run() == TRUE) {
                    $data = array(
                        'parameter_id' => $this->input->post('parameter'),
                        'min_value' => $this->input->post('min_value'),
                        'max_value' => $this->input->post('max_value'),
                        'scaling_factor' => $this->input->post('scaling_factor'),
                        'uom_id' => $this->input->post('uom'),
                        'bits_per_sign' => $this->input->post('bits_per_sign'),
                    );
                    if ($this->input->post('status') == 'on') {
                        $data['isactive'] = 1;
                    } else {
                        $data['isactive'] = 0;
                    }
                    $count = $this->Assets->asset_parameter_update($data, $this->input->post('edit_id'));

                    if (is_numeric($count) && $count > 0) {
                        $this->session->unset_userdata('paramrange_post');
                        $this->session->set_flashdata('success_msg', 'Parameter range updated successfully');
                        redirect('asset_parameter_range_list');
                    } elseif ($count == "duplicate") {
                        $this->session->set_userdata('paramrange_post', $this->input->post());
                        $this->session->set_flashdata('error_msg', 'Parameter range already exist');
                        redirect('asset_parameter_update');
                    } else {
                        $this->session->set_userdata('paramrange_post', $this->input->post());
                        $this->session->set_flashdata('error_msg', 'Failed to update parameter range');
                        redirect('asset_parameter_update');
                    }
                } else {
                    $data['dataHeader'] = $this->users->get_allData($user_id);
                    $data['parameter_list'] = $this->parametermodel->get_parameterlist($user_id);
                    $data['uom_list'] = $this->Assets->parameter_uom($this->input->post('parameter'));

                    load_view_template($data, 'assets_parameter/asset_parameter_add');
                }
            } elseif ($this->input->post('post') == 'delete') {
                //Delete the parameter range
                $id = $this->input->post('id');
                $data = array('isdeleted' => 1);
                $response = $this->Assets->asset_parameter_update($data, $id);
                if ($response > 0) {
                    $this->session->set_flashdata('success_msg', 'Sucessfully deleted parameter range');
                } else {
                    $this->session->set_flashdata('error_msg', 'Failed to delete parameter range');
                }
                redirect('asset_parameter_range_list');
            } elseif ($this->input->post('post') == 'edit' || $this->session->userdata('paramrange_post')) {
                $data['permission'] = $this->users->get_permissions('Asset Parameter Range');
                //check user Permission
                userPermissionCheck($data['permission'], 'update');

                //Load the parameter range for update
                if ($this->input->post('id')) {
                    $id = $this->input->post('id');
                } elseif ($this->session->userdata('paramrange_post')) {
                    $post_data = $this->session->userdata('paramrange_post');
                    $id = $post_data['edit_id'];
                }

                if (isset($id)) {
                    $data['result'] = $this->Assets->parameter_range_list($this->session->userdata('asset_id'), $id);
                    $data['parameter_list'] = $this->parametermodel->get_parameterlist($user_id);
                    if (isset($data['result']) && !empty($data['result'])) {
                        $data['uom_list'] = $this->Assets->parameter_uom($data['result'][0]['param_id']);
                    }
                    $data['param_range_id'] = $id;
//                    echo "<pre>";
//                    echo print_r($data);
//                    exit();
                    $data['dataHeader'] = $this->users->get_allData($user_id);
                    $data['dataHeader']['title'] = "Edit Asset Parameter Range";
                    load_view_template($data, 'assets_parameter/asset_parameter_add');
                } else {
                    echo "Something Went wrong";
                }
            }
        }
    }

    public function parameter_uom() {
        if ($this->input->post('param_id')) {
            $param_id = $this->input->post('param_id');
            $uom_list = $this->Assets->parameter_uom($param_id);

            $option = "<option value=''>Select UOM</option>";
            if (isset($uom_list) && !empty($uom_list)) {
                if ($this->input->post('uom_id')) {
                    $uom_id = $this->input->post('uom_id');
                    foreach ($uom_list as $uom) {
                        if (isset($uom_id) && $uom['id'] == $uom_id) {
                            $selected = "selected";
                        }
                        $option.="<option value='" . $uom['id'] . "' " . $selected . ">" . $uom['name'] . "</option>";
                    }
                } else {
                    foreach ($uom_list as $uom) {
                        $option.="<option value='" . $uom['id'] . "'>" . $uom['name'] . "</option>";
                    }
                }
            }
            echo $option;
        }
    }

    public function trigger_list() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('Asset Trigger');
            //check user Permission
            userPermissionCheck($data['permission'], 'view');

            if ($this->input->post('rule_id')) {
                $rule_id = $this->input->post('rule_id');
            } else {
                $rule_id = '0';
            }
//            $set_rule_id='';
            if (!$this->session->userdata('rule_id')) {
                $this->session->set_userdata('rule_id', $rule_id);
            } else {
                
            }
            $user_id = $this->session->userdata('user_id');
            $set_rule_id = $this->session->userdata('rule_id');

            $asset_id = $this->session->userdata('asset_id');
            if (!$asset_id) {
                $this->session->set_flashdata('note_msg', 'session was expired');
                return redirect('Assets_list');
            }
            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['dataHeader']['title'] = "Trigger List";

            $data['asset_details'] = $this->Assets->assets_list($asset_id);

            $data['trigger_list'] = $this->Assets->trigger_list($set_rule_id, $user_id, $asset_id);

            $data['header_desc'] = $this->Assets->showdescription($set_rule_id, $user_id, $asset_id);

            load_view_template($data, 'trigger/trigger_list');
        }
    }

    public function trigger_add() {
        $trigger_post_id = '';
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $data['permission'] = $this->users->get_permissions('Asset Trigger');
            //check user Permission
            userPermissionCheck($data['permission'], 'add');

//            if ($this->input->post('rule_id')) {
//                echo$rule_id = $this->input->post('rule_id');
//            } else {
//               echo $rule_id = 5;
//            }
            $rule_id = $this->session->userdata('rule_id');
            $user_id = $this->session->userdata('user_id');
            $asset_id = $this->session->userdata('asset_id');
//            exit;
            if (!$asset_id) {
                $this->session->set_flashdata('note_msg', 'session was expired');
                return redirect('Assets_list');
            }
            $data['dataHeader'] = $this->users->get_allData($user_id);

//            $data['dataHeader'] = $this->users->get_allData($user_id);
            $todaysdate = date('Y-m-d');
            $data['trigger_edit_list'] = array();

            $data['header_desc'] = $this->Assets->showdescription($rule_id, $user_id, $asset_id);
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                $trigger_form_action = $this->input->post('trigger_form_action');
                $trigger_post_id = $this->input->post('trigger_post_id');

                $unique_Data = array('rule_id' => $rule_id,
                    'asset_id' => $this->session->userdata('asset_id'),
                    'trigger_name' => $this->input->post('trigger_name'),
                    'trigger_threshold_id' => $this->input->post('trigger_threshold'),
                    'email' => $this->input->post('email'),
                    'sms_contact_no' => $this->input->post('contactno'),
                    'createby' => $user_id
                );
//             if(!empty($trigger_post_id)) 
//                 {
                $data['trigger_edit_list'] = $this->Assets->edit_trigger_list($user_id, $asset_id, $trigger_post_id);
//                 }

                $trigger_input_data = array('rule_id' => $rule_id,
                    'asset_id' => $this->session->userdata('asset_id'),
                    'trigger_name' => $this->input->post('trigger_name'),
                    'trigger_threshold_id' => $this->input->post('trigger_threshold'),
                    'email' => $this->input->post('email'),
                    'sms_contact_no' => $this->input->post('contactno'),
                    'createdate' => $todaysdate,
                    'createby' => $user_id,
                    'isactive' => 1,
                    'isdeleted' => 0
                );
//              echo $trigger_form_action;
//               $data['trigger_threshold_option']= $this->Assets->Trigger_threshold($asset_id);
                $data['result'] = $this->Assets->Trigger_threshold($asset_id, $rule_id);
//              print_r($data['result']);
                if (isset($data['result']) && !empty($data['result'])) {
                    foreach ($data['result'] as $r) {
                        $data['threshold_array'][] = $r->trigger_threshold_id;
                    }
                }
                if ($trigger_form_action == 'addNew') {
                    $data['dataHeader']['title'] = "Add Trigger";
                    load_view_template($data, 'trigger/trigger_add');
                } else if ($trigger_form_action == "add") {
//                 print_r($this->input->post());exit;



                    $isUnique = $this->Assets->checkUnique('trigger', $unique_Data);

                    if ($isUnique) {
                        $data['dataHeader']['title'] = "Add Trigger";
                        $this->session->set_flashdata('error_msg', 'Alarm trigger alredy existed');
                        load_view_template($data, 'trigger/trigger_add');
                    } else {
                        $insert_data = $this->Assets->add_trigger($trigger_input_data);
                        if ($insert_data) {
                            $this->session->set_flashdata('success_msg', 'Alarm trigger successfully added');
                        } else {
                            $this->session->set_flashdata('note_msg', 'Oops ! something wrong..!');
                        }
                        return redirect('trigger_list', 'refresh');
                    }
                } else if ($trigger_form_action == 'edit') {
                    $data['dataHeader']['title'] = "Edit Trigger";
                    load_view_template($data, 'trigger/trigger_add');
                } else if ($trigger_form_action == 'update') {
//              echo $trigger_form_action.'--'.$trigger_post_id;exit;
                    $isUnique = $this->Assets->checkUnique('trigger', $unique_Data);
//             echo $isUnique;exit; 
//                 print_r($trigger_input_data);exit;
                    if ($isUnique) {
                        $data['dataHeader']['title'] = "Add Trigger";
                        $this->session->set_flashdata('error_msg', 'Alarm trigger alredy existed');
                        load_view_template($data, 'trigger/trigger_add');
                    } else {

                        $update_data = $this->Assets->update_trigger($trigger_input_data, $trigger_post_id);
                        if ($update_data) {
                            $this->session->set_flashdata('success_msg', 'Alarm trigger successfully updated');
                        } else {
                            $this->session->set_flashdata('note_msg', 'Oops ! something wrong..!');
                        }
                        return redirect('trigger_list', 'refresh');
                    }
                } else if ($trigger_form_action == 'delete') {
//                 echo "delete";exit;
                    $delete_data = $this->Assets->delete_trigger($trigger_post_id);
                    if ($delete_data) {
                        $this->session->set_flashdata('success_msg', 'Alarm trigger successfully deleted');
                    }
                    return redirect('trigger_list', 'refresh');
                }
            } else {
                return redirect('trigger_list', 'refresh');
            }
        }
    }

    public function asset_parameter_range_details() {
        if ($this->input->post('param_range_id')) {
            $id = explode('_', $this->input->post('param_range_id'));
            $data['sr_no'] = $id[1];
            $data['result'] = $this->Assets->parameter_range_list($this->session->userdata('asset_id'), $id[0]);

            $view = $this->load->view('AssetsManagement/Assets_Parameter/modal/parameter_range', $data);
            echo $view;
        }
    }

    function Check_assetcode_is_exist() {
        $data = 0;

        $user_id = $this->session->userdata('user_id');
        $assetcode = $this->input->post('assetcode');
        $devicedata = $this->Assets->Check_assetcode_is_exist($assetcode, $user_id);
        foreach ($devicedata as $devicedataVal) {
            $data = $devicedataVal->Cnt_number;
        }
        echo $data;
    }

}
