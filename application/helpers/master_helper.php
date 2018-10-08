<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('load_view_template')) {

    function load_view_template($data, $view) {
        $CI = & get_instance();
        $CI->template->set_master_template('template.php', (isset($data) ? $data : NULL));
        $CI->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        $CI->template->write_view('sidebar', 'snippets/sidebar', (isset($data) ? $data : NULL));
        $CI->template->write_view('content', $view, (isset($data) ? $data : NULL), TRUE);
        $CI->template->write_view('footer', 'snippets/footer', '', TRUE);
        $CI->template->render();
    }

}
if (!function_exists('userPermissionCheck')) {

    function userPermissionCheck($permission, $type, $menu = null) {
        $CI = & get_instance();
        $login_flag = $CI->session->userdata('login_flag');
        if (isset($login_flag) && $login_flag == 0) {
            redirect('acces_forbidden', 'refresh');
        } else {
            if (isset($permission) && !empty($permission)) {
                $CI = & get_instance();
//            $CI->load->model('users');
                if (isset($permission) && !empty($permission)) {
                    if (isset($menu) && $menu !== null) {
                        foreach ($permission as $key => $value) {
                            if ($value->menuName == $menu) {
                                $index = $key;
                            }
                        }
                    } else {
                        $index = 0;
                    }

                    if (isset($index)) {
                        switch ($type) {
                            case "view":
                                if ($permission[$index]->viewpermission == 1) {
                                    
                                } else {
                                    redirect('acces_forbidden', 'refresh');
                                }
                                break;
                            case "update":
                                if ($permission[$index]->editpermission == 1) {
                                    
                                } else {
                                    redirect('acces_forbidden', 'refresh');
                                }
                                break;
                            case "add":
                                if ($permission[$index]->addpermission == 1) {
                                    
                                } else {
                                    redirect('acces_forbidden', 'refresh');
                                }
                                break;
                            case "delete":
                                if ($permission[$index]->deletepermission == 1) {
                                    
                                } else {
                                    redirect('acces_forbidden', 'refresh');
                                }
                                break;
                        }
                    } else {
                        redirect('acces_forbidden', 'refresh');
                    }
                }
            } else {
                redirect('acces_forbidden', 'refresh');
            }
        }
    }

    if (!function_exists('upload_logo')) {

        function upload_logo($file, $upload_path, $source_path) {
            $CI = & get_instance();
            $config = array();
            $logo = "";
            $name = $_FILES[$file]['name'];
            $size = $_FILES[$file]['size'];
            $type = $_FILES[$file]['type'];
            $tmp_name = $_FILES[$file]['tmp_name'];

            if (isset($name) && !empty($name)) {
//                $target_path = DOCUMENT_STORE_PATH . basename($_FILES[$file]['name']);

                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                $CI->load->library('upload', $config);

                if (!$CI->upload->do_upload($file)) {
                    echo $CI->upload->display_errors();
                } else {
                    $data1 = $CI->upload->data();

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $source_path . $data1["file_name"];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '60%';
                    $config['width'] = 200;
                    $config['height'] = 200;
                    $config['new_image'] = $source_path . $data1["file_name"];

                    $CI->image_lib->initialize($config);
                    $CI->image_lib->resize();

                    $path = $source_path . $data1["file_name"];
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data1 = file_get_contents($path);
                    $logo = base64_encode($data1);
                    unlink($path);
                }
            }
            return $logo;
        }

    }
}

    