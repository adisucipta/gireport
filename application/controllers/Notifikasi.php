<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        // jika belum login, redirect ke halaman login
        if ($this->session->userdata('username') == NULL) {
            $newdata = array(
                'pesan' => "Anda harus login untuk mengakses halaman tersebut",
                'urlke' => current_url()
            );
            $this->session->set_userdata($newdata);
            redirect('auth/fals');
        }
        $this->load->helper('date');
        $this->load->helper('number');
    }

    public function index() {
        // mengaktifkan menu notifikasi
        $datah['menu_notif'] = TRUE;
        
        $this->load->view('header', $datah);
        $this->load->view('notifikasi');
        $this->load->view('footer');
    }

}