<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->model(array('users', 'group_model', 'country', 'Inventory_model','Assets'));
        // $this->load->helper(array('url', 'language'));
        $this->load->helper(array('url', 'language', 'form', 'master_helper'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    // redirect if needed, otherwise display the user list
    public function index() {

//     echo "Inventory";exit;
    }

    public function Add_deviceinventory() {



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
            $data['location_list'] = $this->Assets->CustomerLocation_list($user_id);
            $todaysdate = date('Y-m-d');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $form_action = $this->input->post('post');

                $isactivestatus = ($this->input->post('device_status') == "on") ? '1' : '0';
                $stockdate = date('Y-m-d', strtotime($this->input->post('stockdate')));
                $insert_data = array(
                    'user_id' => $user_id,
                    'number' => $this->input->post('devicename'),
                    'serial_no' => $this->input->post('serialnumber'),
                    'make' => $this->input->post('devicemake'),
                    'model' => $this->input->post('devicemodel'),                    
                    'description' => $this->input->post('devicedescription'),
                    'communication_type' => $this->input->post('comm_type'),
                    'gsm_number' => $this->input->post('gsmnumber'),
                    'communication_status' => '',
                    'communication_history' => '',
                    'communication_protocol' => $this->input->post('comm_protocol'),
                    'createdat' => $todaysdate,
                    'createdby' => $user_id,
                    'isactive`' => $isactivestatus,
                    'stock_date' => $stockdate,
                    'oem_ser_interval_type' => $this->input->post('oem_ser_interval_type'),
                    'oem_ser_interval_number' => $this->input->post('oem_ser_interval_type_count'),
                    'service_after_type' => $this->input->post('service_after'),
                    'service_after_number' => $this->input->post('service_type_count'),
                    'isdeleted'=>0,
                    'customer_location_id'=>$this->input->post('Customerlocation')
                );
                $unique_data = array(
                    'user_id' => $user_id,
                    'number' => $this->input->post('devicename'),
                    'serial_no' => $this->input->post('serialnumber'),
                    'make' => $this->input->post('devicemake'),
                    'model' => $this->input->post('devicemodel'),
                    'communication_type' => $this->input->post('comm_type'),
                    'gsm_number' => $this->input->post('gsmnumber'),
                    'communication_protocol' => $this->input->post('comm_protocol'),
                    'createdby' => $user_id,
                    'isactive`' => $isactivestatus,
                    'customer_location_id'=>$this->input->post('Customerlocation')
                );

                $this->form_validation->set_rules('devicename', 'Device number', 'required|alpha_numeric');
                $this->form_validation->set_rules('serialnumber', 'Serial number', 'required|alpha_numeric');
                $this->form_validation->set_rules('devicemake', 'Make', 'required|alpha_numeric');
                $this->form_validation->set_rules('devicemodel', 'Model', 'required|alpha_numeric');
                $this->form_validation->set_rules('comm_type', 'Communication Type', 'required');
                // $this->form_validation->set_rules('specification', 'Asset specification', 'required');
                $this->form_validation->set_rules('gsmnumber', 'GSM Number', 'required|numeric');
                $this->form_validation->set_rules('comm_protocol', 'Communication Protocol', 'required|alpha');
                $this->form_validation->set_rules('stockdate', 'Stock date', 'required');
                $this->form_validation->set_rules('oem_ser_interval_type', 'OEM Service Interval', 'required');
                $this->form_validation->set_rules('oem_ser_interval_type_count', 'Interval Type', 'required');
                $this->form_validation->set_rules('service_after', 'Service after', 'required');
                $this->form_validation->set_rules('service_type_count', 'Service Type', 'required');
                 $this->form_validation->set_rules('Customerlocation', 'Customer location', 'required');

                if ($this->form_validation->run() == TRUE) {
                    $isUnique = $this->Inventory_model->checkUnique('device_inventory', $unique_data);
//exit;
                    if ($isUnique) {
                        $this->session->set_flashdata('error_msg', 'Device inventory already added!');
                        load_view_template($data, 'DeviceInventory/add_device_inventory');
                    } else {
                        $inserteddata = $this->Inventory_model->Add_deviceinventory($insert_data);
                        if ($inserteddata) {
                            $this->session->set_flashdata('success_msg', 'Device inventory successfully added');
                            return redirect('Device_inventory_list');
                        }
                    }
                } else {
                    load_view_template($data, 'DeviceInventory/add_device_inventory');
                }
            } else {

                load_view_template($data, 'DeviceInventory/add_device_inventory');
            }
        }
    }

    public function Device_inventory_list() {

        $dev_inv_id = '';

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

            $data['Device_inventory_list_data'] = $this->Inventory_model->Device_inventory_list($user_id);

            load_view_template($data, 'DeviceInventory/device_inventory_list');


//           }
        }
    }

    public function Edit_deviceinventory() {

        $form_action_type = '';
        $dev_inv_id = '';
        $todaysdate = date('Y-m-d');
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

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $form_action_type = $this->input->post('post');
//                post
                $dev_inv_id = $this->input->post('id');
                $data['location_list'] = $this->Assets->CustomerLocation_list($user_id);
                if ($form_action_type == 'edit') {
//                $dev_inv_id=$this->input->post('dev_inv_id');              
                    $data['Edit_deviceinventory_data'] = $this->Inventory_model->edit_deviceinventory($dev_inv_id);

                    load_view_template($data, 'DeviceInventory/edit_device_inventory');
                } else if ($form_action_type == 'update') {
                    $stockdate = date('Y-m-d', strtotime($this->input->post('stockdate')));
                    $insert_data = array('id' => $this->input->post('deviceid'),
                        'user_id' => $user_id,
                        'number' => $this->input->post('devicename'),
                        'serial_no' => $this->input->post('serialnumber'),
                        'make' => $this->input->post('devicemake'),
                        'model' => $this->input->post('devicemodel'),
                        'description' => $this->input->post('devicedescription'),
                        'communication_type' => $this->input->post('comm_type'),
                        'gsm_number' => $this->input->post('gsmnumber'),
                        'communication_status' => '',
                        'communication_history' => '',
                        'communication_protocol' => $this->input->post('comm_protocol'),
                        'createdat' => $todaysdate,
                        'createdby' => $user_id,
                        'isactive`' => ($this->input->post('isactive') == "on") ? '1' : '0',
                        'stock_date' => $stockdate,
                        'oem_ser_interval_type' => $this->input->post('oem_ser_interval_type'),
                        'oem_ser_interval_number' => $this->input->post('oem_ser_interval_type_count'),
                        'service_after_type' => $this->input->post('service_after'),
                        'service_after_number' => $this->input->post('service_type_count'),
                        'customer_location_id'=>$this->input->post('Customerlocation')    
                    );
                    $unique_data = array('id' => $this->input->post('deviceid'),
                        'user_id' => $user_id,
                        'number' => $this->input->post('devicename'),
                        'serial_no' => $this->input->post('serialnumber'),
                        'make' => $this->input->post('devicemake'),
                        'model' => $this->input->post('devicemodel'),
                        'communication_type' => $this->input->post('comm_type'),
                        'gsm_number' => $this->input->post('gsmnumber'),
                        'communication_protocol' => $this->input->post('comm_protocol'),
                        'createdby' => $user_id,
                        'isactive`' => ($this->input->post('isactive') == "on") ? '1' : '0',
                        'customer_location_id'=>$this->input->post('Customerlocation')
                    );

                    $this->form_validation->set_rules('devicename', 'Device number', 'required|alpha_numeric');
                    $this->form_validation->set_rules('serialnumber', 'Serial number', 'required|alpha_numeric');
                    $this->form_validation->set_rules('devicemake', 'Make', 'required|alpha_numeric');
                    $this->form_validation->set_rules('devicemodel', 'Model', 'required|alpha_numeric');
                    $this->form_validation->set_rules('comm_type', 'Communication Type', 'required');
                    // $this->form_validation->set_rules('specification', 'Asset specification', 'required');
                    $this->form_validation->set_rules('gsmnumber', 'GSM Number', 'required|numeric');
                    $this->form_validation->set_rules('comm_protocol', 'Communication Protocol', 'required|alpha');
                    $this->form_validation->set_rules('stockdate', 'Stock date', 'required');
                    $this->form_validation->set_rules('oem_ser_interval_type', 'OEM Service Interval', 'required');
                    $this->form_validation->set_rules('oem_ser_interval_type_count', 'Interval Type', 'required');
                    $this->form_validation->set_rules('service_after', 'Service after', 'required');
                    $this->form_validation->set_rules('service_type_count', 'Service Type', 'required');
                    $this->form_validation->set_rules('Customerlocation', 'Customer location', 'required');
                    
                    $isUnique = $this->Inventory_model->checkUnique('device_inventory', $unique_data);
                    $data['Edit_deviceinventory_data'] = $this->Inventory_model->edit_deviceinventory($dev_inv_id);
                    if ($this->form_validation->run() == TRUE) {
                        if ($isUnique) {
                            $this->session->set_flashdata('error_msg', 'Device inventory already updated!');

                            load_view_template($data, 'DeviceInventory/edit_device_inventory');
                        } else {
                            //                exit;
                            $Update_data = $this->Inventory_model->update_deviceinventory($insert_data, $dev_inv_id);
                            //                exit;
                            if ($Update_data) {
                                $this->session->set_flashdata('success_msg', 'Device inventory successfully updated');
                                return redirect('Device_inventory_list');
                            }
                        }
                    } else {
                        load_view_template($data, 'DeviceInventory/edit_device_inventory');
                    }
                } elseif ($form_action_type == 'delete') {


                    $data = $this->Inventory_model->Delete_Device_inventory($dev_inv_id);
                    if ($data) {
                        $this->session->set_flashdata('success_msg', 'Device inventory successfully deleted');
                        return redirect('Device_inventory_list');
                    }
                }
            } else {
                return redirect('Device_inventory_list');
            }
        }
    }

//------------------sensor inventpry---------------------

    public function Add_device_sensors() {

//                 $form_action_type=$this->input->post('add_sensor_int_button');                


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
//             $data['device_list']=$this->Inventory_model->device_list($user_id);              
            $data['device_list'] = $this->Inventory_model->device_list($user_id);
            $data['sensorid_list'] = $this->Inventory_model->sensorid_list($user_id);
//             sensor_inventory
            
            $todaysdate = date('Y-m-d');
            $user_id = $this->session->userdata('user_id');

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//                  $add_sen_inv_form_action=explode(" ",$this->input->post('add_sen_inv_form_action'));
//               if() 
                
                if($this->input->post('dev_sen_post_add') == 'dev_sen_post_add')
                {
//                    print_r($this->input->post());
//                    exit;
                    load_view_template($data, 'DeviceInventory/add_device_sensor');
                }
                else{
                $unique_Data = array(
                    'device_id' => $this->input->post('deviceid'),
                    'sensor_id' => $this->input->post('sensorid'),
                    'createdby' => $user_id,
                    'isactive' => ($this->input->post('device_sen_status')) == "on" ? '1' : '0'
                );
                $insert_data = array(
                    'device_id' => $this->input->post('deviceid'),
                    'sensor_id' => $this->input->post('sensorid'),
                    'createdat' => $todaysdate,
                    'createdby' => $user_id,
                    'isactive' => ($this->input->post('device_sen_status')) == "on" ? '1' : '0',
                    'isdeleted'=>0
                );

                $this->form_validation->set_rules('deviceid', 'Device ID', 'required');
                $this->form_validation->set_rules('sensorid', 'Sensor ID', 'required');
//                echo $form_action_type ; 
//                print_r($this->input->post());
//                exit;
                $isUnique = $this->Inventory_model->checkUnique('device_sensor_mapping', $unique_Data);

                if ($this->form_validation->run() == TRUE) {
                    if ($isUnique) {
                        //                $data['error'] = 'Category name is already existed!';
                        $this->session->set_flashdata('error_msg', 'Device sensor already added!');
                        load_view_template($data, 'DeviceInventory/add_device_sensor');
                    } else {

                        $inserteddata = $this->Inventory_model->add_devicesensor($insert_data);
                        if ($inserteddata) {
                            $this->session->set_flashdata('success_msg', 'Device sensor successfully added');
                            return redirect('Device_sensor_list');
                        } else {
                            return redirect('Device_sensor_list');
                        }
                    }
                } else {
                    load_view_template($data, 'DeviceInventory/add_device_sensor');
                }
                }
            } else {


                load_view_template($data, 'DeviceInventory/add_device_sensor');
            }
        }
    }

    public function Edit_device_sensors() {

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
//            echo $this->input->post('post');
//exit;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//                exit;
                $form_action = ($this->input->post('post')) == '' ? $this->input->post('dev_sen_post') : $this->input->post('post');
                $sen_inv_id = ($this->input->post('id')) == '' ? $this->input->post('dev_sen_post_id') : $this->input->post('id');
                $this->form_validation->set_rules('deviceid', 'Device ID', 'required');
                $this->form_validation->set_rules('sensorid', 'Sensor ID', 'required');

                $data['device_list'] = $this->Inventory_model->device_list($user_id);
                $data['sensorid_list'] = $this->Inventory_model->sensorid_list($user_id);
                $data['Edit_device_sensors_data'] = $this->Inventory_model->Edit_device_sensors_model($sen_inv_id);

                // print_r( $data['Edit_device_sensors_data']);exit;
                if ($form_action == 'edit') {

                    load_view_template($data, 'DeviceInventory/edit_device_sensor');
                } else if ($form_action == 'update') {
                    $todaysdate = date('Y-m-d');
//                     $user_id = $this->session->userdata('user_id');

                    $unique_Data = array(
                        'device_id' => $this->input->post('deviceid'),
                        'sensor_id' => $this->input->post('sensorid'),
                        'createdby' => $user_id,
                        'isactive' => ($this->input->post('isactive')) == "on" ? '1' : '0'
                    );

                    $update_data = array(
                        'device_id' => $this->input->post('deviceid'),
                        'sensor_id' => $this->input->post('sensorid'),
                        'createdat' => $todaysdate,
                        'createdby' => $user_id,
                        'isactive' => ($this->input->post('isactive')) == "on" ? '1' : '0'
                    );
//                       print_r($update_data);exit;
//                          exit;
                    if ($this->form_validation->run() == TRUE) {
                        $isUnique = $this->Inventory_model->checkUnique('device_sensor_mapping', $unique_Data);

                        if ($isUnique) {
                            $this->session->set_flashdata('error_msg', 'Device sensor already updated!');
                            load_view_template($data, 'DeviceInventory/edit_device_sensor');
                        } else {

                            $update_device_sensors_data = $this->Inventory_model->Update_device_sensors_model($update_data, $sen_inv_id);
                            if ($update_device_sensors_data) {
                                $this->session->set_flashdata('success_msg', 'Device sensor successfully updated');
                                return redirect('Device_sensor_list');
                            }
                        }
                    } else {
                        load_view_template($data, 'DeviceInventory/edit_device_sensor');
                    }
                } else {
                    return redirect('Device_sensor_list');
                }
//                  exit;
            } else {
                return redirect('Device_sensor_list');
            }
        }
    }

    public function Device_sensor_list() {



        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            // set the flash data error message if there is one


            $user_id = $this->session->userdata('user_id');


//            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

//            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $form_action = $this->input->post('post');
                $sen_inv_id = $this->input->post('id');
                $data['sensor_type'] = $this->Inventory_model->sensor_type_list($user_id);
                $data['parameter_list'] = $this->Inventory_model->parameter_list($user_id);
                $data['sensor_inventory_list_data'] = $this->Inventory_model->edit_sensor_inventory_list($user_id, $sen_inv_id);
                if ($this->input->post('post') == 'edit') {

                    load_view_template($data, 'DeviceInventory/add_device_sensor');
                }
//                  $sensor_form_action=explode(" ",$this->input->post('sensor_form_action'));
                  
                else if ($this->input->post('post') == 'delete') {
//                      $form_action_type[1];
//                    echo $sen_inv_id;
//                    print_r( $this->input->post());exit;
                    $delete_sensor_data = $this->Inventory_model->Delete_Device_sensor($sen_inv_id);
                    if ($delete_sensor_data) {
                        $this->session->set_flashdata('success_msg', 'Device Sensor successfully deleted');
                        return redirect('Device_sensor_list', 'refresh');
                    } else {
                        $this->session->set_flashdata('error_msg', 'Device Sensor failed delete');
                        return redirect('Device_sensor_list', 'refresh');
                    }
                }
            } else {
                $data['device_sensors_list'] = $this->Inventory_model->device_sensors_list($user_id);

                load_view_template($data, 'DeviceInventory/Device_sensor_list');
            }
        }
    }

    public function Sensor_inventory_list() {



        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            // set the flash data error message if there is one


            $user_id = $this->session->userdata('user_id');


            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $form_action = $this->input->post('post');
                $sen_inv_id = $this->input->post('id');
                $data['sensor_type'] = $this->Inventory_model->sensor_type_list($user_id);
                $data['parameter_list'] = $this->Inventory_model->parameter_list($user_id);
                $data['location_list'] = $this->Assets->CustomerLocation_list($user_id);
                $data['sensor_inventory_list_data'] = $this->Inventory_model->edit_sensor_inventory_list($user_id, $sen_inv_id);
                if ($this->input->post('post') == 'edit') {
                
                    load_view_template($data, 'SensorInventory/edit_sensor_inventory_1');

                    
                }
//                  $sensor_form_action=explode(" ",$this->input->post('sensor_form_action'));
//                  print_r($sensor_form_action);
                else if ($this->input->post('post') == 'delete') {
//                      $form_action_type[1];
                    $delete_sensor_data = $this->Inventory_model->Delete_sensor_inventory($sen_inv_id);
                    if ($delete_sensor_data) {
                        $this->session->set_flashdata('success_msg', 'Sensor inventory successfully deleted');
                        return redirect('Sensor_inventory_list', 'refresh');
                    } else {
                        $this->session->set_flashdata('error_msg', 'Sensor inventory failed delete');
                        return redirect('Sensor_inventory_list', 'refresh');
                    }
                }
            } else {
                $data['sensor_inventory_list'] = $this->Inventory_model->sensor_inventory_list($user_id);

                load_view_template($data, 'SensorInventory/sensor_inventory_list_1');
                
            }
        }
    }

    public function add_sensor_inventory() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            // set the flash data error message if there is one


            $user_id = $this->session->userdata('user_id');


            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
            $todaysdate = date('Y-m-d');
            $data['sensor_type'] = $this->Inventory_model->sensor_type_list($user_id);
            $data['parameter_list'] = $this->Inventory_model->parameter_list($user_id);
            $data['location_list'] = $this->Assets->CustomerLocation_list($user_id);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $add_sen_inv_form_action = explode(" ", $this->input->post('add_sen_inv_form_action'));

                $sensor_form_action = explode(" ", $this->input->post('sensor_form_action'));
                $unique_Data = array('sensor_no' => $this->input->post('sensornum'),
                    'sensor_type_id' => $this->input->post('sensortype'),
                    'make' => $this->input->post('make'),
                    'model' => $this->input->post('model'),
                    // 'description' =>$this->input->post('description'),
                    'parameter_id' => $this->input->post('Parameter'),
                    'uom_type_id' => $this->input->post('UOM'),
                    'createdby' => $user_id,
                    'isactive' => ($this->input->post('isactive')) == "on" ? '1' : '0',
                    'customer_location_id'=>$this->input->post('Customerlocation'));

                $insert_data = array('sensor_no' => $this->input->post('sensornum'),
                    'sensor_type_id' => $this->input->post('sensortype'),
                    'make' => $this->input->post('make'),
                    'model' => $this->input->post('model'),
                    'description' => $this->input->post('description'),
                    'parameter_id' => $this->input->post('Parameter'),
                    'uom_type_id' => $this->input->post('UOM'),
                    'createdat' => $todaysdate,
                    'createdby' => $user_id,
                    'isactive' => ($this->input->post('isactive')) == "on" ? '1' : '0',
                    'isdeleted'=>0,
                    'customer_location_id'=>$this->input->post('Customerlocation'));

                $this->form_validation->set_rules('sensornum', 'Sensor number', 'required');
                $this->form_validation->set_rules('sensortype', 'Sensor type', 'required');

                $this->form_validation->set_rules('make', 'Make', 'required');
                $this->form_validation->set_rules('model', 'Model', 'required');

                $this->form_validation->set_rules('Parameter', 'Parameter', 'required');
                $this->form_validation->set_rules('UOM', 'UOM', 'required');


                if ($this->form_validation->run() == TRUE) {
                    if ($add_sen_inv_form_action[0] == "add") {

                        $isUnique = $this->Inventory_model->checkUnique('sensor_inventory', $unique_Data);
                        if ($isUnique) {

                            //                $data['error'] = 'Category name is already existed!';
                            //             echo "allready";
                            $this->session->set_flashdata('error_msg', 'Sensor inventory already added!');
                            load_view_template($data, 'SensorInventory/add_sensor_inventory');
                        } else {
                            $insertdata = $this->Inventory_model->add_sensor_inventory($insert_data);
                            if ($insertdata) {
                                $this->session->set_flashdata('success_msg', 'Sensor inventory successfully addedd!');
                                return redirect('Sensor_inventory_list', 'refresh');
                            }
                        }
//                        echo "<pre>";
//                        echo print_r($this->input->post());
//                        exit();
                    } else if ($add_sen_inv_form_action[0] == "update") {
                        $isUnique = $this->Inventory_model->checkUnique('sensor_inventory', $unique_Data);
                        if ($isUnique) {

                            //                $data['error'] = 'Category name is already existed!';
                            //             echo "allready";
                            $this->session->set_flashdata('error_msg', 'Sensor inventory already updated!');
                            load_view_template($data, 'SensorInventory/add_sensor_inventory');
                        } else {
                            $insertdata = $this->Inventory_model->update_sensor_inventory($insert_data,$add_sen_inv_form_action[1]);
                            if ($insertdata) {
                                $this->session->set_flashdata('success_msg', 'Sensor inventory successfully addedd!');
                                return redirect('Sensor_inventory_list', 'refresh');
                            }
                        }
//                        echo "<pre>";
//                        echo print_r($this->input->post());
//                        exit();
                    } else {
                        return redirect('Sensor_inventory_list', 'refresh');
                    }
                } else {
                    load_view_template($data, 'SensorInventory/add_sensor_inventory');
                }
            } else {
                load_view_template($data, 'SensorInventory/add_sensor_inventory');
            }
        }
    }

//----------device asset list

    public function Device_assets_list() {
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
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $form_action = ($this->input->post('post')) == '' ? $this->input->post('dev_asset_post') : $this->input->post('post');
                $sen_inv_id = ($this->input->post('id')) == '' ? $this->input->post('dev_asset_id') : $this->input->post('id');
//echo $sen_inv_id;
            } else {
                $data['device_asset_list'] = $this->Inventory_model->device_asset_list($user_id);

                load_view_template($data, 'DeviceInventory/device_assets_list');
            }
        }
    }

    public function Device_assets_add() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');


            $data['device_list'] = $this->Inventory_model->device_list($user_id);
            $data['assetcode_list'] = $this->Inventory_model->assetcode_list($user_id);

            $todaysdate = date('Y-m-d');
            $data['dataHeader'] = $this->users->get_allData($user_id);



            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                if($this->input->post('dev_asset_post_add') == 'dev_asset_post_add') 
                {
                    load_view_template($data, 'DeviceInventory/device_assets_add');
                }else{
                
                $this->form_validation->set_rules('deviceid', 'Device ID', 'required');
                $this->form_validation->set_rules('assetid', 'Asset ID', 'required');
                $this->form_validation->set_rules('wef_date', 'Wef date', 'required');
                $insert_data = array(
                    'device_id' => $this->input->post('deviceid'),
                    'asset_id' => $this->input->post('assetid'),
                    'createdate' =>  date('Y-m-d',strtotime($this->input->post('wef_date'))),
                    'createdby' => $user_id,
                    'isdeleted'=>0
                );
                $unique_data = array(
                    'device_id' => $this->input->post('deviceid'),
                    'asset_id' => $this->input->post('assetid'),
                    'createdby' => $user_id
                );

                if ($this->form_validation->run() == TRUE) {

                    $isUnique = $this->Inventory_model->checkUnique('device_asset', $unique_data);

                    if ($isUnique) {

                        $this->session->set_flashdata('error_msg', 'Device asset already added!');
                        load_view_template($data, 'DeviceInventory/device_assets_add');
                    } else {
                        $inserteddata = $this->Inventory_model->add_device_asset($insert_data);
                        if ($inserteddata) {
                            $this->session->set_flashdata('success_msg', 'Device asset successfully added');
                            return redirect('Device_assets_list');
                        } else {
                            return redirect('Device_assets_list');
                        }
                    }
                } else {
                    load_view_template($data, 'DeviceInventory/device_assets_add');
                }
                }
            } else {

                load_view_template($data, 'DeviceInventory/device_assets_add');
            }
        }
    }

    public function Device_assets_edit() {
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
            $data['assetcode_list'] = $this->Inventory_model->assetcode_list($user_id);
//            asset_form_action

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->form_validation->set_rules('deviceid', 'Device ID', 'required');
                $this->form_validation->set_rules('assetid', 'Asset ID', 'required');
                $this->form_validation->set_rules('wef_date', 'Wef date', 'required');
//                   $form_action=$this->input->post('post');
//                  $sen_inv_id=$this->input->post('id');
                $form_action = ($this->input->post('post')) == '' ? $this->input->post('dev_asset_post') : $this->input->post('post');
                $sen_inv_id = ($this->input->post('id')) == '' ? $this->input->post('dev_asset_id') : $this->input->post('id');
                $data['Edit_device_asset_data'] = $this->Inventory_model->Edit_device_asset_model($sen_inv_id);
                if ($form_action == 'edit') {
                    // echo $form_action;
                    // print_r($this->input->post());exit;
                    load_view_template($data, 'DeviceInventory/device_assets_edit');
                } else if ($form_action == 'update') {
                    $todaysdate = date('Y-m-d');
//                     $user_id = $this->session->userdata('user_id');


                    $update_data = array(
                        'device_id' => $this->input->post('deviceid'),
                        'asset_id' => $this->input->post('assetid'),
                        'createdate' => date('Y-m-d',strtotime($this->input->post('wef_date'))),
                        'createdby' => $user_id
                    );
                    
                    $unique_data = array(
                        'device_id' => $this->input->post('deviceid'),
                        'asset_id' => $this->input->post('assetid'),
                        'createdby' => $user_id
                    );
                    if ($this->form_validation->run() == TRUE) {

                        $isUnique = $this->Inventory_model->checkUnique('device_asset', $unique_data);


                        if ($isUnique) {

                            $this->session->set_flashdata('error_msg', 'Device asset already existed!');
                            load_view_template($data, 'DeviceInventory/device_assets_edit');
                        } else {
                            $update_device_asset_data = $this->Inventory_model->Update_device_asset_model($update_data, $sen_inv_id);

                            if ($update_device_asset_data) {
                                $this->session->set_flashdata('success_msg', 'Device asset successfully updated');
                                return redirect('Device_assets_list');
                            }
                        }
                    } else {
                        load_view_template($data, 'DeviceInventory/device_assets_edit');
                    }
                } else if ($form_action == 'delete') {
//                      $form_action_type[1];
                    $delete_dev_asset_data = $this->Inventory_model->Delete_device_asset($sen_inv_id);
                    if ($delete_dev_asset_data) {
                        $this->session->set_flashdata('success_msg', 'Device asset successfully deleted');
                        return redirect('Device_assets_list', 'refresh');
                    } else {
                        $this->session->set_flashdata('error_msg', 'Device asset failed delete');
                        return redirect('Device_assets_list', 'refresh');
                    }
                } else {
                    return redirect('Device_assets_list');
                }
//                  exit;
            } else {
                return redirect('Device_assets_list');
            }
        }
    }

//      -------------ajax -----------------------
    function load_uomtype_by_parameter() {
        $data = '';

        $user_id = $this->session->userdata('user_id');
        $parameter = $this->input->post('parameterid');
        $uomtypedata = $this->Inventory_model->uomtype_list($parameter, $user_id);

        echo json_encode($uomtypedata);
    }

    function Check_devicenum_is_exist() {
        $data = 0;

        $user_id = $this->session->userdata('user_id');
        $devicenum = $this->input->post('devicenum');
        $devicedata = $this->Inventory_model->Check_devicenum_is_exist($devicenum, $user_id);
        foreach ($devicedata as $devicedataVal) {
            $data = $devicedataVal->Cnt_number;
        }
        echo $data;
    }
    
     function Check_serialnum_is_exist() {
        $data = 0;

        $user_id = $this->session->userdata('user_id');
        $serialnum = $this->input->post('serialnum');
        $devicedata = $this->Inventory_model->Check_serialnum_is_exist($serialnum, $user_id);
        foreach ($devicedata as $devicedataVal) {
            $data = $devicedataVal->Cnt_number;
        }
        echo $data;
    }

}
