<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AssetsManagement extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->model(array('users', 'group_model', 'country', 'Assets'));
        // $this->load->helper(array('url', 'language'));
        $this->load->helper(array('url', 'language', 'form'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    // redirect if needed, otherwise display the user list
    public function index() {
        
    }

    public function Assets_add() {

//        print_r($_SERVER['REQUEST_METHOD']); exit;
        $this->load->helper('form');
        $user_id = $this->session->userdata('user_id');
//             print_r($_SERVER['REQUEST_METHOD']);
//            exit;
        // redirect them to the home page because they must be an administrator to view this
        // return show_error('You must be an administrator to view this page.');

        $data['location_list'] = $this->Assets->CustomerLocation_list();
        $data['category_list'] = $this->Assets->AssetCategory_list();
        $data['type_list'] = $this->Assets->AssetType_list();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
                'isactive' => 1
            );
            //  echo "<pre>";
//            print_r($this->input->post());
//              var_dump($assets_data);
//              exit;

            $this->Assets->add_assets($assets_data);

            $this->session->set_flashdata('msg', 'Assets Added Successfully');
        }

//        $this->template->set_master_template('template.php');
//        $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
//        $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
//
//        $this->template->write_view('content', 'Assets/assets_list', (isset($this->data) ? $this->data : NULL), TRUE);
//        $this->template->write_view('footer', 'snippets/footer', '', TRUE);
//        $this->template->render();

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();
            $data['dataHeader'] = $this->users->get_allData($user_id);
            clearstatcache();
//            $data['save_btn'] = array(
//                'name' => 'assets_edit',
//                'id'   => 'assets_edit',
//                'value' => 'assets_edit',
//                'class' => 'btn btn-info'
//           $user_id = $this->session->userdata('user_id');
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/assets_add', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function Asset_List() {
        $this->load->helper('form');
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
            $data['assetlist'] = $this->Assets->assets_list();
            $data['location_list'] = $this->Assets->CustomerLocation_list();
            $data['category_list'] = $this->Assets->AssetCategory_list();
            $data['type_list'] = $this->Assets->AssetType_list();

            //  var_dump($data['location_list']);die;
//            $data['save_btn'] = array(
//                'name' => 'assets_edit',
//                'id'   => 'assets_edit',
//                'value' => 'assets_edit',
//                'class' => 'btn btn-info'
//            );

            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/assets_list', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function Asset_edit() {

        $user_id = $this->session->userdata('user_id');
        $edit_asset_list_id = '';
        $data['location_list'] = $this->Assets->CustomerLocation_list();
        $data['category_list'] = $this->Assets->AssetCategory_list();
        $data['type_list'] = $this->Assets->AssetType_list();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $edit_asset_list_id = explode(" ", $this->input->post('edit_asset_list_id'));
            //var_dump($edit_asset_list_id[0]);die;
            if ($edit_asset_list_id[0] == "edit") {
                $data['Assets_edit_data'] = $this->Assets->Asset_edit($edit_asset_list_id[1]);
//                exit;
            } else if ($edit_asset_list_id[0] == "update") {
                //   print_r($this->input->post());
                //  exit;

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
                    'isactive' => 1
                );
                //var_dump($assets_data);die;
                //  echo "<pre>";
//            print_r($this->input->post());
//              var_dump($assets_data);
//              exit;
                $id = $edit_asset_list_id[1];
                //  var_dump($id);die;
                $data = $this->Assets->update_assets($assets_data, $id);
                if ($data == 1) {
                    $this->session->set_flashdata('msg', 'Assets Update Successfully');
                } else {
                    $this->session->set_flashdata('msg', 'Assets Not Updated');
                }
                redirect(base_url('Assets_list'));
//              Assets_list
            } else if ($edit_asset_list_id[0] == "delete") {
                $id1 = $edit_asset_list_id[1];
                // var_dump($id);die; 
                $data = $this->Assets->delete_assets($id1);
                redirect(base_url('Assets_list'));
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
//            $data['assetlist'] = $this->Assets->assets_list();

            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/assets_edit', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function Asset_delete() {

        $user_id = $this->session->userdata('user_id');
        $edit_asset_list_id = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $this->input->post('edit_asset_list_id');
            var_dump($id);
            die;
            // $edit_asset_list_id=explode(" ",$this->input->post('edit_asset_list_id'));
            if ($edit_asset_list_id != NULL) {
                $assets_data = array(
                    'isactive' => 0
                );

                $id = $edit_asset_list_id[1];
                var_dump($id);
                die;
                $data = $this->Assets->delete_assets($assets_data, $id);
                if ($data == 1) {
                    $this->session->set_flashdata('msg', 'Assets Update Successfully');
                } else {
                    $this->session->set_flashdata('msg', 'Assets Not Updated');
                }
                redirect(base_url('Assets_list'));
//              Assets_list
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
//            $data['assetlist'] = $this->Assets->assets_list();

            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/assets_edit', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function manage_assets_location() {
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

            $this->template->write_view('content', 'Assets/manage_assets_location', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

 

    public function Assets_location_list() {
        $this->load->helper('form');
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
                  $todaysdate=date('Y-m-d'); 
                 $asset_loc_form_action=explode(" ",$this->input->post('asset_loc_form_action'));
//                  print_r($sensor_form_action); asset_loc_form_action
                  if($asset_loc_form_action[0] == 'edit')
                  {
                                        
            $data['asset_code_list']=$this->Assets->assetcode_list();          
            $data['asset_location_list']=$this->Assets->edit_assets_location($asset_loc_form_action[1]);
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/assets_location_edit', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
                  }
                   if($asset_loc_form_action[0] == 'update')
                  {
//                       print_r($this->input->post());
                        $update_data=array('location' =>$this->input->post('asset_location'),
                                       'address' =>$this->input->post('asset_address'),
                                       'latitude' =>$this->input->post('asset_lat'),
                                       'contact_no' =>$this->input->post('asset_long'),
                                       'longitude' =>$this->input->post('asset_contactperson'),
                                       'contact_person' =>$this->input->post('asset_contactno'),
                                       'contact_email' =>$this->input->post('asset_contactemail'),
                                       'createdat'=>$todaysdate,
                                       'createdby'=>$user_id,
                                       'isactive'=>'1',
                                       'asset_id'=>$this->input->post('assetcode')
                                     );
 
//                $inserteddata=$this->Assets->add_assets_location($insert_data);
//                        print_r($insert_data);
//                  exit;
                  $update_asset_location=$this->Assets->Update_asset_location($update_data,$asset_loc_form_action[1]);
                     if($update_asset_location){
                     $this->session->set_flashdata('success_msg', 'Asset location successfully updated');
                    return redirect('Assets_location_list','refresh');
                     }
                   }
                  elseif($asset_loc_form_action[0] == 'delete')
                  {
//                      echo "delete".$asset_loc_form_action[1]; exit;
                      $delete_asset_location=$this->Assets->Delete_asset_location($asset_loc_form_action[1]);
                     if($delete_asset_location){
                     $this->session->set_flashdata('success_msg', 'Asset location successfully deleted');
                    return redirect('Assets_location_list','refresh');
                     }
                  }
              }
              else{
            $data['asset_location_list']=$this->Assets->assets_location_list();
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/assets_location_list', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
              }
        }
    }

    public function Assets_location_add() {
        $this->load->helper('form');
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
//             $data['device_list']=$this->Inventory_model->device_list();    
            
            $todaysdate=date('Y-m-d'); 
            $user_id = $this->session->userdata('user_id');
              if($_SERVER['REQUEST_METHOD'] == 'POST')
           { 
//                 if() 
//                  'code' =>$this->input->post('assetcode'),
                $insert_data=array(    'location' =>$this->input->post('asset_location'),
                                       'address' =>$this->input->post('asset_address'),
                                       'latitude' =>$this->input->post('asset_lat'),
                                       'contact_no' =>$this->input->post('asset_long'),
                                       'longitude' =>$this->input->post('asset_contactperson'),
                                       'contact_person' =>$this->input->post('asset_contactno'),
                                       'contact_email' =>$this->input->post('asset_contactemail'),
                                       'createdat'=>$todaysdate,
                                       'createdby'=>$user_id,
                                       'isactive'=>'1',
                                       'asset_id'=>$this->input->post('assetcode')
                                    );
 
                $inserteddata=$this->Assets->add_assets_location($insert_data);
                
                 if($inserteddata)
               {
                   $this->session->set_flashdata('success_msg', 'Asset location successfully added');
                   return redirect('Assets_location_list','refresh');
               }
            else {
                   return redirect('Assets_location_list','refresh');
            }
            }
            else{
             $data['asset_code_list']=$this->Assets->assetcode_list();      
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/assets_location_add', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
            }
        }
    }

    public function User_assets_list() {
        $this->load->helper('form');
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
            $data['assetuser_list']=$this->Assets->asset_user_list();
            
             $data['asset_user_list']=$this->Assets->asset_user_list();
            
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/user_assets_list', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function User_asset_add() {
        $this->load->helper('form');
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
            
            
            $data['asset_code_list']=$this->Assets->assetcode_list();    
            $data['asset_userid_list']=$this->Assets->asset_userid_list();
//                asset_user_form_action
            $data['dataHeader'] = $this->users->get_allData($user_id);
              if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                  $todaysdate=date('Y-m-d'); 
                 $asset_user_form_action=explode(" ",$this->input->post('asset_user_form_action'));
//                  print_r($sensor_form_action); asset_loc_form_action
                  if($asset_user_form_action[0] == 'add')
                  {
                      $insert_data=array('asset_id'=>$this->input->post('assetcode'),
                                         'assetuser_id'=>$this->input->post('assetuserid'),
                                         'createdate'=>$todaysdate,
                                         'createdby'=>$user_id);
//                      print_r($insert_data);
//                      exit;
                       $inserteddata=$this->Assets->add_asset_user($insert_data);
                
                        if($inserteddata)
                      {
                          $this->session->set_flashdata('success_msg', 'Asset user successfully added');
                          return redirect('User_assets_list','refresh');
                      }
                   else {
                          return redirect('User_assets_list','refresh');
                   }
                  }
                }
                else
                {
            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/user_asset_add', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
                }
        }
    }
    
       public function User_asset_edit() {
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
             
             $data['asset_code_list']=$this->Assets->assetcode_list();    
            $data['asset_userid_list']=$this->Assets->asset_userid_list();
            

             $this->template->set_master_template('template.php');
            if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                  $todaysdate=date('Y-m-d'); 
                 $asset_user_form_action=explode(" ",$this->input->post('asset_user_form_action'));
//                  print_r($sensor_form_action); asset_loc_form_action
                  if($asset_user_form_action[0] == 'edit')
                  {
                     $data['asset_user_list_data']=$this->Assets->edit_assets_user($asset_user_form_action[1]); 
//                     print_r($data['asset_user_list_data']);
//                      exit;
                    
                    $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
                    $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
            
                     $this->template->write_view('content', 'Assets/user_assets_edit', (isset($this->data) ? $this->data : NULL), TRUE);
//                    
//                        $insert_data=array('asset_id'=>$this->input->post('assetcode'),
//                                         'assetuser_id'=>$this->input->post('assetuserid'),
//                                         'createdate'=>$todaysdate,
//                                         'createdby'=>$user_id);
                      
                  }
                  else if($asset_user_form_action[0] == 'update')
                  {
                     $todaysdate=date('Y-m-d'); 
                    $update_data=array('asset_id'=>$this->input->post('assetcode'),
                                         'assetuser_id'=>$this->input->post('assetuserid'),
                                         'createdate'=>$todaysdate,
                                         'createdby'=>$user_id);  
                  $asset_user_list_data=$this->Assets->update_asset_user($update_data,$asset_user_form_action[1]); 
                  if($asset_user_list_data)
                  {
                      $this->session->set_flashdata('success_msg', 'Asset user successfully updated');
                      return redirect('User_assets_list','refresh');  
                  }
                  
                }else if($asset_user_form_action[0] == 'delete')
                {
                   $delete_user_list_data=$this->Assets->delete_asset_user($asset_user_form_action[1]); 
                   if($delete_user_list_data)
                  {
                      $this->session->set_flashdata('success_msg', 'Asset user successfully deleted');
                      return redirect('User_assets_list','refresh');  
                  }
                }
                else {
                     return redirect('User_assets_list','refresh');
                }
                
                }
           

            
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }


    public function asset_rule_list(){
        $user_id = $this->session->userdata('user_id');
        $data['dataHeader'] = $this->users->get_allData($user_id);
        $this->data['asset_list']= $this->Assets->get_asset_rule_list(); 
        $this->template->set_master_template('template.php');
        $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
        $this->template->write_view('content', 'asset_rules/rule_action_master_list', (isset($this->data) ? $this->data : NULL), TRUE);
        $this->template->write_view('footer', 'snippets/footer', '', TRUE);
        $this->template->render();


    }

    public function add_asset_rule()
    {
         $user_id = $this->session->userdata('user_id');
        if($this->input->get('asset_rule_id')){
            $asset_rule_id=$this->input->get('asset_rule_id'); 
           $this->data['asset_detail']= $this->Assets->get_asset_details($asset_rule_id); 
        }else{
            $this->data['asset_detail']=''; 
        }
       // print_r($this->data); exit(); 
       
        $data['dataHeader'] = $this->users->get_allData($user_id);
        $this->template->set_master_template('template.php');
        $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
        $this->template->write_view('content', 'asset_rules/rule_action_master_add', (isset($this->data) ? $this->data : NULL), TRUE);
        $this->template->write_view('footer', 'snippets/footer', '', TRUE);
        $this->template->render();
       

        
    }

    public function add_asset_rule_detail()
    {
        $asset_rule_id=''; 
       // print_r($_POST); exit(); 
        if($this->input->post('asset_rule_id'))
         $asset_rule_id=$this->input->post('asset_rule_id'); 

          if($this->input->post('rule_name'))
         $data['rule_name']=$this->input->post('rule_name'); 
          if($this->input->post('rule_des'))
         $data['rule_des ']=$this->input->post('rule_des'); 
          if($this->input->post('parameter'))
         $data['parameter']=$this->input->post('parameter'); 
          if($this->input->post('uom'))
         $data['uom']=$this->input->post('uom'); 
          if($this->input->post('green_value'))
         $data['green_value']=$this->input->post('green_value'); 
          if($this->input->post('orange_value'))
         $data['orange_value ']=$this->input->post('orange_value'); 
          if($this->input->post('red_value'))
         $data['red_value ']=$this->input->post('red_value'); 
          if($this->input->post('wef_date'))
         $data['wef_date']=$this->input->post('wef_date'); 
          if($this->input->post('rule_status')){
              if($this->input->post('rule_status')=='on')
              $data['rule_status']=1;
              else
              $data['rule_status']=0; 
          }

        $parameter_range_id= 1; 
          if(!$asset_rule_id){
            $insert_id=  $this->Assets->add_asset_rule_detail($data,$parameter_range_id);
               if($insert_id){
                    $this->session->set_flashdata('success_msg', 'Assets rules Added Successfully');
                }else{
                    $this->session->set_flashdata('error_msg', 'Assets rules Added faield ');
                }
          }else{
            $update_id=  $this->Assets->update_asset_rule_detail($data,$asset_rule_id);
            if($update_id){
                $this->session->set_flashdata('success_msg', 'Assets rules Added Successfully');
            }else{
                $this->session->set_flashdata('error_msg', 'Assets rules Added faield ');
            }
          }
          $user_id = $this->session->userdata('user_id');
          $data['dataHeader'] = $this->users->get_allData($user_id);

          $this->data['asset_list']= $this->Assets->get_asset_rule_list(); 

          $this->template->set_master_template('template.php');
          $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
          $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
          $this->template->write_view('content', 'asset_rules/rule_action_master_list', (isset($this->data) ? $this->data : NULL), TRUE);
          $this->template->write_view('footer', 'snippets/footer', '', TRUE);
          $this->template->render();
       
        }


        public function delete_asset_rule()
        {
          $asset_rule_id=$this->input->get('asset_rule_id'); 
            $this->Assets->delete_asset_rule($asset_rule_id); 

            $user_id = $this->session->userdata('user_id');
          $data['dataHeader'] = $this->users->get_allData($user_id);

          $this->data['asset_list']= $this->Assets->get_asset_rule_list(); 

          $this->template->set_master_template('template.php');
          $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
          $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));
          $this->template->write_view('content', 'asset_rules/rule_action_master_list', (isset($this->data) ? $this->data : NULL), TRUE);
          $this->template->write_view('footer', 'snippets/footer', '', TRUE);
          $this->template->render();

        }

    

}
