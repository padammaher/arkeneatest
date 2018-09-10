<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->model(array('users', 'group_model', 'country','Inventory_model'));
        // $this->load->helper(array('url', 'language'));
        $this->load->helper(array('url', 'language', 'form'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    // redirect if needed, otherwise display the user list
    public function index() {

//     echo "Inventory";exit;
    }
      public function Add_deviceinventory() {
           $this->load->helper('form');
           
//           print_r($_SERVER['REQUEST_METHOD']);EXIT;
//            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           if($_SERVER['REQUEST_METHOD'] == 'POST')
           { 
              // print_r($_POST);
               $inserteddata=$this->Inventory_model->Add_deviceinventory($_POST);
               if($inserteddata)
               {
                   $this->session->set_flashdata('success_msg', 'Device inventory successfully added');
                   return redirect('Device_inventory_list');
               }
//               echo $inserteddata;
//           exit;
           }
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
            
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'DeviceInventory/add_device_inventory', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
        
      }
         
       public function Device_inventory_list() {
           
           $dev_inv_id='';
            if($_SERVER['REQUEST_METHOD'] == 'POST')
           { 
                $form_action_type=explode(" ",$this->input->post('dev_inv_id'));
                if(!empty($form_action_type[0]))
                {
                    $form_action_type[1];
                     $data =$this->Inventory_model->Delete_Device_inventory($form_action_type[1]);
                    if($data) {
                        $this->session->set_flashdata('success_msg', 'Device inventory successfully added');                         
                }
                    return redirect('Device_inventory_list','refresh');
                }   
           }         
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
             
            $data['Device_inventory_list_data'] =$this->Inventory_model->Device_inventory_list();
           
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'DeviceInventory/device_inventory_list', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
        
      }
        public function Edit_deviceinventory() {
            
            $form_action_type='';
            $dev_inv_id='';
            if($_SERVER['REQUEST_METHOD'] == 'POST')
           { 
                $form_action_type=$this->input->post('form_action_type');
                if(empty($form_action_type))
                {    
                $dev_inv_id=$this->input->post('dev_inv_id');              
               $data['Edit_deviceinventory_data']=$this->Inventory_model->edit_deviceinventory($dev_inv_id);
                }
                else 
                {
                    
                        $insert_data=array(
                                'id'=>$this->input->post('deviceid'),
                                'number'=>$this->input->post('devicename'),
                                'serial_no'=>$this->input->post('serialnumber'),
                                'make'=>$this->input->post('devicemake'),
                                'model'=>$this->input->post('devicemodel'),
                                'description'=>$this->input->post('devicedescription'),
                                'communication_type'=>$this->input->post('comm_type'),
                                'gsm_number'=>$this->input->post('gsmnumber'),
                                'communication_status'=>$this->input->post('comm_status'),
                                'communication_history'=>$this->input->post('comm_history'),
                                'communication_protocol'=>$this->input->post('comm_protocol')                                
                              );
              //  echo $form_action_type ; 
//                print_r($insert_data);
//                exit;
                $Update_data=$this->Inventory_model->update_deviceinventory($insert_data,$form_action_type);
//                exit;
                return redirect('Device_inventory_list');
                }
           }
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);


            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'DeviceInventory/edit_device_inventory', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
      }  
//------------------sensor inventpry---------------------
      
           public function Add_device_sensors() {
               
//                 $form_action_type=$this->input->post('add_sensor_int_button');                
              
           
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
             $data['device_list']=$this->Inventory_model->device_list();    
            $todaysdate=date('Y-m-d'); 
            $user_id = $this->session->userdata('user_id');
              if($_SERVER['REQUEST_METHOD'] == 'POST')
           { 
                   
                $insert_data=array(
                                'device_id'=>$this->input->post('deviceid'),
                                'sensor_id'=>$this->input->post('sensorid'),
                                'createdat'=>$todaysdate,
                                'createdby'=>$user_id
                              );
//                echo $form_action_type ; 
//                print_r($this->input->post());
//                exit;
                $inserteddata=$this->Inventory_model->add_devicesensor($insert_data);
                 if($inserteddata)
               {
                   $this->session->set_flashdata('success_msg', 'Device sensor successfully added');
                   return redirect('Sensor_inventory_list');
               }
            else {
                   return redirect('Sensor_inventory_list');
            }
            }
            else
            {             
            
                  
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'SensorInventory/add_sensor_inventory', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
            }
        }
        
      }
         
       public function Edit_device_sensors() {           
                
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);

            if($_SERVER['REQUEST_METHOD'] == 'POST')
            { 
                  $sensor_form_action=explode(" ",$this->input->post('sensor_form_action'));
//                  print_r($sensor_form_action);
                  if($sensor_form_action[0] == 'edit')
                  {
            $data['Edit_device_sensors_data']=$this->Inventory_model->Edit_device_sensors_model($sensor_form_action[1]);
//            print_r($data['Edit_device_sensors_data']);exit;
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'SensorInventory/edit_sensor_inventory', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();  
                  }
                  else if($sensor_form_action[0] == 'update')
                  {
                       $todaysdate=date('Y-m-d'); 
//                     $user_id = $this->session->userdata('user_id');
                       

                          $update_data=array(
                                          'device_id'=>$this->input->post('deviceid'),
                                          'sensor_id'=>$this->input->post('sensorid'),
                                          'createdat'=>$todaysdate,
                                          'createdby'=>$user_id
                                        );
//                       print_r($update_data);exit;
                         $update_device_sensors_data=$this->Inventory_model->Update_device_sensors_model($update_data,$sensor_form_action[1]); 
                         if($update_device_sensors_data)
                         {
                            $this->session->set_flashdata('success_msg', 'Device sensor successfully updated');
                            return redirect('Sensor_inventory_list');   
                         }
                         
                     }
                  else
                  {
                      return redirect('Sensor_inventory_list');
                  }
//                  exit;
             } else{
                 return redirect('Sensor_inventory_list');
             }
        }
        
      }
        public function Sensor_inventory_list() {
            
        

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            
            
            $user_id = $this->session->userdata('user_id');
            
            
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
             if($_SERVER['REQUEST_METHOD'] == 'POST')
            { 
                  $sensor_form_action=explode(" ",$this->input->post('sensor_form_action'));
//                  print_r($sensor_form_action);
                  if($sensor_form_action[0] == 'delete')
                  {
//                      $form_action_type[1];
                     $delete_sensor_data =$this->Inventory_model->Delete_sensor_inventory($sensor_form_action[1]);
                     if($delete_sensor_data){
                     $this->session->set_flashdata('success_msg', 'Device sensor successfully deleted');
                    return redirect('Sensor_inventory_list','refresh');
                     }else{
                          $this->session->set_flashdata('success_msg', 'Device sensor failed delete');
                         return redirect('Sensor_inventory_list','refresh');
                     }
                  }
            } else{      
            $data['sensor_inventory_list']=$this->Inventory_model->sensor_inventory_list();
                    
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'SensorInventory/sensor_inventory_list', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
            }
        }
      }  
      
//----------device asset list
      
          public function Device_assets_list() { 
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
             if($_SERVER['REQUEST_METHOD'] == 'POST')
            { 
                  $asset_form_action=explode(" ",$this->input->post('asset_form_action'));
//                  print_r($sensor_form_action);
                  if($asset_form_action[0] == 'delete')
                  {
//                      $form_action_type[1];
                     $delete_dev_asset_data =$this->Inventory_model->Delete_device_asset($asset_form_action[1]);
                     if($delete_dev_asset_data){
                     $this->session->set_flashdata('success_msg', 'Device asset successfully deleted');
                    return redirect('Device_assets_list','refresh');
                     }else{
                          $this->session->set_flashdata('success_msg', 'Device asset failed delete');
                         return redirect('Device_assets_list','refresh');
                     }
                  }
            } else{
            $data['device_asset_list']=$this->Inventory_model->device_asset_list();
            
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'DeviceInventory/device_assets_list', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
            }
        }
      }  
      
        public function Device_assets_add() { 
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');
             $data['device_list']=$this->Inventory_model->device_list(); 
             $data['assetcode_list']=$this->Inventory_model->assetcode_list(); 
             
            $todaysdate=date('Y-m-d'); 
            $data['dataHeader'] = $this->users->get_allData($user_id);
            if($_SERVER['REQUEST_METHOD'] == 'POST')
           { 
                   
                $insert_data=array(
                                'device_id'=>$this->input->post('deviceid'),
                                'asset_id'=>$this->input->post('assetid'),
                                'createdate'=>$todaysdate,
                                'createdby'=>$user_id
                              );
//                echo $form_action_type ; 
//                print_r($this->input->post());
//                exit;
                $inserteddata=$this->Inventory_model->add_device_asset($insert_data);
                 if($inserteddata)
               {
                   $this->session->set_flashdata('success_msg', 'Device sensor successfully added');
                   return redirect('Device_assets_list');
               }
            else {
                   return redirect('Device_assets_list');
            }
            }

            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'DeviceInventory/device_assets_add', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
      }  
      
        public function Device_assets_edit() { 
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');

            $data['dataHeader'] = $this->users->get_allData($user_id);
            $data['assetcode_list']=$this->Inventory_model->assetcode_list(); 
//            asset_form_action
             if($_SERVER['REQUEST_METHOD'] == 'POST')
            { 
                  $asset_form_action=explode(" ",$this->input->post('asset_form_action'));
//                  print_r($sensor_form_action);
                  if($asset_form_action[0] == 'edit')
                  {
            $data['Edit_device_asset_data']=$this->Inventory_model->Edit_device_asset_model($asset_form_action[1]);
//            print_r($data['Edit_device_sensors_data']);exit;
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'DeviceInventory/device_assets_edit', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
                  }
                  else if($asset_form_action[0] == 'update')
                  {
                       $todaysdate=date('Y-m-d'); 
//                     $user_id = $this->session->userdata('user_id');
                       

                          $update_data=array(
                                          'device_id'=>$this->input->post('deviceid'),
                                          'asset_id'=>$this->input->post('assetid'),
                                          'createdate'=>$todaysdate,
                                          'createdby'=>$user_id
                                        );
//                          echo $asset_form_action[1];
//                       print_r($update_data);exit;
                         $update_device_asset_data=$this->Inventory_model->Update_device_asset_model($update_data,$asset_form_action[1]); 
                         $update_device_asset_data;
//                         exit;
                         if($update_device_asset_data)
                         {
                            $this->session->set_flashdata('success_msg', 'Device asset successfully updated');
                            return redirect('Device_assets_list');   
                         }
                         
                     }
                  else
                  {
                      return redirect('Device_assets_list');
                  }
//                  exit;
             } else{
                 return redirect('Device_assets_list');
             }

        }
      }        
}
   