<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('load_view_template')) {

    function load_view_template($data, $view) {
        $CI = & get_instance();
        $CI->template->set_master_template('template.php', (isset($data) ? $data : NULL));
        $CI->template->write_view('header', 'snippets/header', (isset($data) ? $data : NULL));
        $CI->template->write_view('sidebar', 'snippets/sidebar_1', (isset($data) ? $data : NULL));
        $CI->template->write_view('content', $view, (isset($data) ? $data : NULL), TRUE);
        $CI->template->write_view('footer', 'snippets/footer', '', TRUE);
        $CI->template->render();
    }

}
if (!function_exists('userPermissionCheck')) {

    function userPermissionCheck($permission, $type, $menu = null) {
        if (isset($permission) && !empty($permission)) {
            $CI = & get_instance();
            $CI->load->model('users');
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

