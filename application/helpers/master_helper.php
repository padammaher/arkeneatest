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
