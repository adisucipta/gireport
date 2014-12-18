<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tentang extends CI_Controller {

    function __construct() {
        parent::__construct();
        // jika belum login, redirect ke halaman login
        if (!is_login()) {
            $newdata = array(
                'pesan' => "Anda harus login untuk mengakses halaman tersebut",
                'urlke' => current_url()
            );
            $this->session->set_userdata($newdata);
            redirect('auth/fals');
        }
        $this->load->model('model_notif', '', true);
    }

    public function index() {
        // notifikasi
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        
        // mengaktifkan menu tentang
        $datah['menu_tentang'] = TRUE;
        $datah['title'] = "Tentang";
        
        $this->load->view('header_view', $datah);
        $this->load->view('tentang_view');
        $this->load->view('footer_view');
    }

}