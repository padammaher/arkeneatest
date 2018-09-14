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
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
        } else {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            //list the users

            //list the users
            $data['groups1'] = $this->group_model->get_allGroupData();

            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            
           
              $data['location_list'] = $this->Assets->CustomerLocation_list();
            $data['category_list'] = $this->Assets->AssetCategory_list();
            $data['type_list'] = $this->Assets->AssetType_list();
            
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $unique_Data = array(
                'code' => $this->input->post('Assetcode'),
            );
           
            $isUnique = $this->Assets->checkassetcodeIfExists('asset', $unique_Data);
            // var_dump($isUnique);die;
            if ($isUnique) {
                //echo '<script>alert("Asset Code is already existed!");</script>';
                // $this->session->set_flashdata('item', array('msg' => 'Asset Code is already existed!','class' => 'success'));
                $this->session->set_flashdata('error_msg', 'assets already existed!');
                $this->template->set_master_template('template.php');
                $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
                $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

                $this->template->write_view('content', 'Assets/assets_add', (isset($this->data) ? $this->data : NULL), TRUE);
                $this->template->write_view('footer', 'snippets/footer', '', TRUE);
                $this->template->render();
//                redirect('Assets_list', 'refresh');
            } else {
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
                'isactive' => ($this->input->post('isactive')) == 'on'? '1':'0'
            );
            //  echo "<pre>";
                $insetreddata = $this->Assets->add_assets($assets_data);
                if ($insetreddata ) {
                    $this->session->set_flashdata('success_msg', 'Assets Successfully added');
                    redirect('Assets_list', 'refresh');
                } else {
                    $this->session->set_flashdata('error_msg', 'Assets failed to Added');
                    redirect('Assets_list', 'refresh');
                }
            }
        } else {
            clearstatcache();

            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/assets_add', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }
    }

    public function Asset_List() {
        
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


            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/assets_list', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function Asset_edit() {


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


        // $user_id = $this->session->userdata('user_id');
        $edit_asset_list_id = '';
        $data['location_list'] = $this->Assets->CustomerLocation_list();
        $data['category_list'] = $this->Assets->AssetCategory_list();
        $data['type_list'] = $this->Assets->AssetType_list();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // $edit_asset_list_id = explode(" ", $this->input->post('edit_asset_list_id'));
            $form_action=$this->input->post('post');
            $edit_asset_list_id=$this->input->post('id');
            //var_dump($edit_asset_list_id[0]);die;
             $data['Assets_edit_data'] = $this->Assets->Asset_edit($edit_asset_list_id);

            if ($form_action == "edit") {
               
//                  $this->session->set_flashdata('error_msg', 'assets already existed!');
                $this->template->set_master_template('template.php');
                $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
                $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

                $this->template->write_view('content', 'Assets/assets_edit', (isset($this->data) ? $this->data : NULL), TRUE);
                $this->template->write_view('footer', 'snippets/footer', '', TRUE);
                $this->template->render();

            } else if ($form_action == "update") {
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
                    'isactive' => ($this->input->post('isactive'))=='on'? '1':'0'
                );
   
                $id = $edit_asset_list_id;
                //  var_dump($id);die;
          $unique_Data = array(
                        'code' => $this->input->post('Assetcode'),
                    );
                 $isUnique = $this->Assets->checkassetcodeIfExists('asset', $unique_Data);
            // var_dump($isUnique);die;
            if ($isUnique) {
                $this->session->set_flashdata('error_msg', 'assets already existed!');
                $this->template->set_master_template('template.php');
                $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
                $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

                $this->template->write_view('content', 'Assets/assets_edit', (isset($this->data) ? $this->data : NULL), TRUE);
                $this->template->write_view('footer', 'snippets/footer', '', TRUE);
                $this->template->render();

            }else{
                $data = $this->Assets->update_assets($assets_data, $id);
                if ($data) {
                    $this->session->set_flashdata('success_msg', 'Assets Successfully updated');
                     redirect(base_url('Assets_list'));
                } else {
                    $this->session->set_flashdata('error_msg', 'Assets failed to Update');
                     redirect(base_url('Assets_list'));
                }
            }
               
//              Assets_list
            } else if ($form_action == "delete") {
               
                $id1 = $edit_asset_list_id;
                // var_dump($edit_asset_list_id);die; 
                $data = $this->Assets->delete_assets($edit_asset_list_id);
                if($data)
                {
                    $this->session->set_flashdata('success_msg', 'Assets Successfully deleted');
                    redirect(base_url('Assets_list'));
                }
                
            }
        } else{
       
//            $data['assetlist'] = $this->Assets->assets_list();

            $this->template->set_master_template('template.php');
            $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
            $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

            $this->template->write_view('content', 'Assets/assets_edit', (isset($this->data) ? $this->data : NULL), TRUE);
            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        
        }
        }
    }

    public function Asset_delete() {

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
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $todaysdate = date('Y-m-d');
                $asset_loc_form_action = explode(" ", $this->input->post('asset_loc_form_action'));
//                  print_r($sensor_form_action); asset_loc_form_action
                $form_action=$this->input->post('asset_location_post');
                $asset_loc_id=$this->input->post('asset_location_post_id');

             
           // print_r($this->input->post());
             // var_dump($isUnique);
           // die;
                  $data['asset_code_list'] = $this->Assets->assetcode_list($user_id);
                  $data['asset_location_list'] = $this->Assets->edit_assets_location($asset_loc_id);
                if ($form_action == 'edit') {


                 // echo "fgffd";
                    $this->template->set_master_template('template.php');
                    $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
                    $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

                    $this->template->write_view('content', 'Assets/assets_location_edit', (isset($this->data) ? $this->data : NULL), TRUE);
                    $this->template->write_view('footer', 'snippets/footer', '', TRUE);
                    $this->template->render();
                }
                if ($form_action == 'update') {
//                       print_r($this->input->post());
                   $unique_Data = array(
                                    'address' => $this->input->post('asset_address'),
                                    'latitude' => $this->input->post('asset_lat'),
                                    'contact_no' => $this->input->post('asset_contactno'),
                                    'longitude' => $this->input->post('asset_long'),
                                    'contact_person' => $this->input->post('asset_contactperson'),
                                    'contact_email' => $this->input->post('asset_contactemail'),
                                );

                $isUnique = $this->Assets->checkasset_locationIfExists('asset_location', $unique_Data);
                // echo $isUnique; exit;
                    if ($isUnique) {
//                        echo '<script>alert("Asset Code is already existed!");</script>';
//                         $this->session->set_flashdata('item', array('msg' => 'Asset Code is already existed!','class' => 'success'));
                        $this->session->set_flashdata('error_msg', 'Asset location is already existed');
                        $this->template->set_master_template('template.php');
                        $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
                        $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

                        $this->template->write_view('content', 'Assets/assets_location_edit', (isset($this->data) ? $this->data : NULL), TRUE);
                        $this->template->write_view('footer', 'snippets/footer', '', TRUE);
                        $this->template->render();
                    } else {
                        $update_data=array('location' =>$this->input->post('asset_location'),
                                       'address' =>$this->input->post('asset_address'),
                                       'latitude' =>$this->input->post('asset_lat'),
                                       'contact_no' =>$this->input->post('asset_contactno'),
                                       'longitude' =>$this->input->post('asset_long'),
                                       'contact_person' =>$this->input->post('asset_contactperson'),
                                       'contact_email' =>$this->input->post('asset_contactemail'),
                                       'createdat'=>$todaysdate,
                                       'createdby'=>$user_id,
                                       'isactive'=>'1',
                                       'asset_id'=>$this->input->post('assetcode')
                                     );
 
//                $inserteddata=$this->Assets->add_assets_location($insert_data);
//                        print_r($insert_data);
//                  exit;
                  $update_asset_location=$this->Assets->Update_asset_location($update_data,$asset_loc_id);
                     if($update_asset_location){
                     $this->session->set_flashdata('success_msg', 'Asset location successfully updated');
                    return redirect('Assets_location_list','refresh');
                     }

                   }
                  }
                  else if($form_action == 'delete')
                  {

                    $update_data = array('location' => $this->input->post('asset_location'),
                        'address' => $this->input->post('asset_address'),
                        'latitude' => $this->input->post('asset_lat'),
                        'contact_no' => $this->input->post('asset_contactno'),
                        'longitude' =>$this->input->post('asset_long'),
                        'contact_person' => $this->input->post('asset_contactperson'),
                        'contact_email' => $this->input->post('asset_contactemail'),
                        'createdat' => $todaysdate,
                        'createdby' => $user_id,
                        'isactive' => '1',
                        'asset_id' => $this->input->post('assetcode')
                    );

//                $inserteddata=$this->Assets->add_assets_location($insert_data);
//                        print_r($insert_data);
//                  exit;
                    $update_asset_location = $this->Assets->Update_asset_location($update_data, $asset_loc_id);
                    if ($update_asset_location) {
                        $this->session->set_flashdata('success_msg', 'Asset location successfully updated');
                        return redirect('Assets_location_list', 'refresh');
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
                $data['asset_location_list'] = $this->Assets->assets_location_list($user_id);
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
        $user_id = $this->session->userdata('user_id');


        $todaysdate = date('Y-m-d');
        $user_id = $this->session->userdata('user_id');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//            exit;
            $unique_Data = array(
                'address' => $this->input->post('asset_address'),
                'latitude' => $this->input->post('asset_lat'),
                'contact_no' => $this->input->post('asset_long'),
                'longitude' => $this->input->post('asset_contactperson'),
                'contact_person' => $this->input->post('asset_contactno'),
                'contact_email' => $this->input->post('asset_contactemail'),
            );
            $isUnique = $this->Assets->checkasset_locationIfExists('asset_location', $unique_Data);
//            print_r($isUnique);
//              var_dump($isUnique);
//            die;
            if ($isUnique) {
//                echo '<script>alert("Asset Code is already existed!");</script>';
                // $this->session->set_flashdata('item', array('msg' => 'Asset Code is already existed!','class' => 'success'));
                    $this->session->set_flashdata('error_msg', 'Asset location is already existed');
                $this->template->set_master_template('template.php');
                $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
                $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

                $this->template->write_view('content', 'Assets/assets_location_add', (isset($this->data) ? $this->data : NULL), TRUE);
                $this->template->write_view('footer', 'snippets/footer', '', TRUE);
                $this->template->render();
//                redirect('Assets_list', 'refresh');
            } else {
                $insert_data = array('location' => $this->input->post('asset_location'),
                    'address' => $this->input->post('asset_address'),
                    'latitude' => $this->input->post('asset_lat'),
                    'contact_no' => $this->input->post('asset_long'),
                    'longitude' => $this->input->post('asset_contactperson'),
                    'contact_person' => $this->input->post('asset_contactno'),
                    'contact_email' => $this->input->post('asset_contactemail'),
                    'createdat' => $todaysdate,
                    'createdby' => $user_id,
                    'isactive' => '1',
                    'asset_id' => $this->input->post('assetcode')
                );


                $inserteddata = $this->Assets->add_assets_location($insert_data);

                if ($inserteddata) {
                    $this->session->set_flashdata('success_msg', 'Asset location successfully added');
                    return redirect('Assets_location_list', 'refresh');
                } else {
                    return redirect('Assets_location_list', 'refresh');
                }
            }
        }
           
          else {


                $data['asset_code_list'] = $this->Assets->assetcode_list();
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
            

            $data['asset_user_list'] = $this->Assets->asset_user_list();
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


            $data['asset_code_list'] = $this->Assets->assetcode_list();
            $data['asset_userid_list'] = $this->Assets->asset_userid_list();
//                asset_user_form_action
            $data['dataHeader'] = $this->users->get_allData($user_id);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $todaysdate = date('Y-m-d');
                $asset_user_form_action = explode(" ", $this->input->post('asset_user_form_action'));
//                  print_r($sensor_form_action); asset_loc_form_action
                if ($asset_user_form_action[0] == 'add') {
                    $insert_data = array('asset_id' => $this->input->post('assetcode'),
                        'assetuser_id' => $this->input->post('assetuserid'),
                        'createdate' => $todaysdate,
                        'createdby' => $user_id);

                      $unique_Data = array('asset_id' => $this->input->post('assetcode'),
                        'assetuser_id' => $this->input->post('assetuserid'),
                       'createdby' => $user_id);
                     $isUnique = $this->Assets->checkasset_locationIfExists('asset_user', $unique_Data);
// echo $isUnique;
            if ($isUnique) {
//                
               
                    $this->session->set_flashdata('error_msg', 'Asset user is already existed');
                     $this->template->set_master_template('template.php');
                $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
                $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

                $this->template->write_view('content', 'Assets/user_asset_add', (isset($this->data) ? $this->data : NULL), TRUE);
                $this->template->write_view('footer', 'snippets/footer', '', TRUE);
                $this->template->render();

                }else {
                    $inserteddata = $this->Assets->add_asset_user($insert_data);

                    if ($inserteddata) {
                        $this->session->set_flashdata('success_msg', 'Asset user successfully added');
                        return redirect('User_assets_list', 'refresh');
                    } else {
                        return redirect('User_assets_list', 'refresh');
                    }
                }
            }
            } else {
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

            $data['asset_code_list'] = $this->Assets->assetcode_list();
            $data['asset_userid_list'] = $this->Assets->asset_userid_list();


            $this->template->set_master_template('template.php');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $todaysdate = date('Y-m-d');

              

             
                $asset_user_post_id=$this->input->post('asset_user_post_id');
                $asset_user_post=$this->input->post('asset_user_post');
                // print_r($this->input->post()); exit;
            $data['asset_user_list_data'] = $this->Assets->edit_assets_user($asset_user_post_id);
                if ($asset_user_post == 'edit') {
                   
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

                } else if ($asset_user_post == 'update') {
                    $todaysdate = date('Y-m-d');
                    

                    $update_data = array('asset_id' => $this->input->post('assetcode'),
                        'assetuser_id' => $this->input->post('assetuserid'),
                        'createdate' => $todaysdate,
                        'createdby' => $user_id);

                      $unique_Data = array('asset_id' => $this->input->post('assetcode'),
                        'assetuser_id' => $this->input->post('assetuserid'),
                        'createdby' => $user_id);

                     $isUnique = $this->Assets->checkasset_locationIfExists('asset_user', $unique_Data);
// echo $isUnique;
                     // print_r($update_data);exit;
            if ($isUnique) {
//                
               
                    $this->session->set_flashdata('error_msg', 'Asset user is already existed');
                     $this->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
                    $this->template->write_view('sidebar', 'snippets/sidebar', (isset($this->data) ? $this->data : NULL));

                    $this->template->write_view('content', 'Assets/user_assets_edit', (isset($this->data) ? $this->data : NULL), TRUE);
                } else {
                    $asset_user_list_data = $this->Assets->update_asset_user($update_data, $asset_user_post_id);
                   
                    if ($asset_user_list_data) {
                        $this->session->set_flashdata('success_msg', 'Asset user successfully updated');
                        return redirect('User_assets_list', 'refresh');
                    }
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



            $this->template->write_view('footer', 'snippets/footer', '', TRUE);
            $this->template->render();
        }
    }

    public function asset_parameter_range_list() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this page
            // return show_error('You must be an administrator to view this page.');
        } else {
            $user_id = $this->session->userdata('user_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);

            //get asset info
            $asset_id = 63;
            $this->session->set_userdata('asset_id', $asset_id);
            $data['asset_details'] = $this->Assets->assets_list($asset_id);
            $data['parameter_range_info'] = $this->Assets->parameter_range_list($asset_id);
            load_view_template($data, 'assets_parameter/asset_parameter_range_list');
        }
    }

    public function asset_parameter_add() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this page
            // return show_error('You must be an administrator to view this page.');
        } else {
            $this->load->model('parametermodel');
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                
            } else {
                if ($this->input->post('param_range_id')) {
                    $data['edit_id'] = $this->input->post('param_range_id');
                }
                $user_id = $this->session->userdata('user_id');
                $data['dataHeader'] = $this->users->get_allData($user_id);
                $data['parameter_list'] = $this->parametermodel->get_parameterlist($user_id);

                load_view_template($data, 'assets_parameter/asset_parameter_add');
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
                        $option.="<option value=" . $uom['id'] . " " . $uom['id'] == $uom_id ? 'selected' : '' . ">" . $uom['name'] . "</option>";
                    }
                } else {
                    foreach ($uom_list as $uom) {
                        $option.="<option value=" . $uom['id'] . ">" . $uom['name'] . "</option>";
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
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this page
            // return show_error('You must be an administrator to view this page.');
        } else {
            $user_id = $this->session->userdata('user_id');
            $asset_id=$this->session->userdata('asset_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            
            $data['dataHeader'] = $this->users->get_allData($user_id); 
            $data['trigger_list']= $this->Assets->trigger_list($user_id,$asset_id);
             
            load_view_template($data, 'trigger/trigger_list');
        }
    }

    public function trigger_add() {
        $trigger_post_id='';
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) {
            $this->restricted();
            // redirect them to the home page because they must be an administrator to view this page
            // return show_error('You must be an administrator to view this page.');
        } else {  
            if($this->input->post('rule_id')){
                $rule_id=$this->input->post('rule_id');
            }else{
                $rule_id=2;
            }
            $user_id = $this->session->userdata('user_id');
             $asset_id=$this->session->userdata('asset_id');
            $data['dataHeader'] = $this->users->get_allData($user_id);
            
//            $data['dataHeader'] = $this->users->get_allData($user_id);
            $todaysdate = date('Y-m-d');
            $data['trigger_edit_list']=array();
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
             
             $trigger_form_action=$this->input->post('trigger_form_action');
             $trigger_post_id=$this->input->post('trigger_post_id');
             
                      $unique_Data=array('rule_id'=>$rule_id,
                                         'asset_id'=>$this->session->userdata('asset_id'),                                         
                                         'trigger_name' => $this->input->post('trigger_name'),
                                         'trigger_threshold_id'=> $this->input->post('trigger_threshold'),
                                         'email'=> $this->input->post('email'),
                                         'sms_contact_no'=>$this->input->post('contactno'),                                         
                                         'createby'=>$user_id                                         
                                        );               
//             if(!empty($trigger_post_id)) 
//                 {
                 $data['trigger_edit_list']= $this->Assets->edit_trigger_list($user_id,$asset_id,$trigger_post_id);                 
//                 }
                 
              $trigger_input_data=array('rule_id'=>$rule_id,
                                         'asset_id'=>$this->session->userdata('asset_id'),                                         
                                         'trigger_name' => $this->input->post('trigger_name'),
                                         'trigger_threshold_id'=> $this->input->post('trigger_threshold'),
                                         'email'=> $this->input->post('email'),
                                         'sms_contact_no'=>$this->input->post('contactno'), 
                                         'createdate'=>$todaysdate,
                                         'createby'=>$user_id,
                                         'isactive'=>1
                                        );
//              echo $trigger_form_action;
//               $data['trigger_threshold_option']= $this->Assets->Trigger_threshold($asset_id);
              $data['result']=$this->Assets->Trigger_threshold($asset_id,$rule_id);
//              print_r($data['result']);
                 if(isset($data['result']) && !empty($data['result'])){
                     foreach($data['result'] as $r){
                         $data['threshold_array'][]=$r->trigger_threshold_id;
                     }
                 }
             if($trigger_form_action =='addNew') 
             { 
//                 $data['result']=$this->Assets->Trigger_threshold($asset_id,$rule_id);
//                 if(isset($data['result']) && !empty($data['result'])){
//                     foreach($data['result'] as $r){
//                         $data['threshold_array'][]=$r->trigger_threshold_id;
//                     }
//                 }
                 load_view_template($data, 'trigger/trigger_add');
             }
             else if($trigger_form_action == "add")
             {
//                 print_r($this->input->post());exit;
              


                     $isUnique = $this->Assets->checkUnique('trigger', $unique_Data);
  
            if ($isUnique) {
                $this->session->set_flashdata('error_msg', 'Alarm trigger alredy existed'); 
                load_view_template($data, 'trigger/trigger_add');
                
             }else {
                 $insert_data=$this->Assets->add_trigger($trigger_input_data);
                 if($insert_data)
                 {
                     $this->session->set_flashdata('success_msg', 'Alarm trigger successfully added');                     
                 }
                 else{
                     $this->session->set_flashdata('note_msg', 'Oops ! something wrong..!');                     
                 }
                 return redirect('trigger_list','refresh');
                 
             }
             }
             else if($trigger_form_action=='edit')
             {
//                 echo $trigger_form_action.'--'.$trigger_post_id;exit;
                  load_view_template($data, 'trigger/trigger_add');
             }
             else if($trigger_form_action =='update')
             {
//              echo $trigger_form_action.'--'.$trigger_post_id;exit;
                $isUnique = $this->Assets->checkUnique('trigger', $unique_Data);
//             echo $isUnique;exit; 
//                 print_r($trigger_input_data);exit;
            if ($isUnique) {
                $this->session->set_flashdata('error_msg', 'Alarm trigger alredy existed'); 
                load_view_template($data, 'trigger/trigger_add');                
             }
             else
                {
                
                    $update_data=$this->Assets->update_trigger($trigger_input_data,$trigger_post_id);
                   if($update_data)
                   {
                       $this->session->set_flashdata('success_msg', 'Alarm trigger successfully updated');                     
                   }
                   else{
                       $this->session->set_flashdata('note_msg', 'Oops ! something wrong..!');                     
                   }
                   return redirect('trigger_list','refresh');
                }
             }
             else if($trigger_form_action=='delete')
             {
//                 echo "delete";exit;
                 $delete_data=$this->Assets->delete_trigger($trigger_post_id);
                   if($delete_data)
                   {
                       $this->session->set_flashdata('success_msg', 'Alarm trigger successfully deleted');                     
                   }
                   return redirect('trigger_list','refresh');
             }
            }else {
            return redirect('trigger_list','refresh');
            }
        }
    }

}
