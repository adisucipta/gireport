<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('is_login')) {

    function is_login() {
        $CI = & get_instance();
        return (($CI->session->userdata('user_id')) ? TRUE : FALSE);
    }

}

if (!function_exists('is_Admin')) {

    function is_Admin() {
        $CI = & get_instance();
        $isLoggedIn = $CI->session->userdata('role_id');
        if ($isLoggedIn == 1) {
            return TRUE;
        }
        return FALSE;
    }

}
?>
