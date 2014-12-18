<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('notifikasiFunc')) {

    function sessionExist() {
        $CI = & get_instance();
        // load model
        $CI->load->model('model_notif', '', true);
        // memanggil fungsi dari modek
        $CI->my_model->do_something();
        return (bool) $CI->session->userdata('userId');
    }

}
?>
