<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('load_view_template')) {

    function load_view_template($data, $view) {
        $CI = & get_instance();
        $CI->template->set_master_template('template.php');
        $CI->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        $CI->template->write_view('sidebar', 'snippets/sidebar', (isset($data) ? $data : NULL));
        $CI->template->write_view('content', $view, (isset($data) ? $data : NULL), TRUE);
        $CI->template->write_view('footer', 'snippets/footer', '', TRUE);
        $CI->template->render();
    }

}
if (!function_exists('userPermissionCheck')) {

    function userPermissionCheck($permission, $type) {
        if (isset($permission) && !empty($permission)) {
            $CI = & get_instance();
            $CI->load->model('users');
            if (isset($permission) && !empty($permission)) {
                switch ($type) {
                    case "view":
                        if ($permission[0]->viewpermission == 1) {
                            
                        } else {
                            redirect('acces_forbidden', 'refresh');
                        }
                        break;
                    case "update":
                        if ($permission[0]->editpermission == 1) {
                            
                        } else {
                            redirect('acces_forbidden', 'refresh');
                        }
                        break;
                    case "add":
                        if ($permission[0]->addpermission == 1) {
                            
                        } else {
                            redirect('acces_forbidden', 'refresh');
                        }
                        break;
                    case "delete":
                        if ($permission[0]->deletepermission == 1) {
                            
                        } else {
                            redirect('acces_forbidden', 'refresh');
                        }
                        break;
                }
            }
        }
    }

}

