<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tentang extends CI_Controller {

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
    }

    public function index() {
        // mengaktifkan menu tentang
        $datah['menu_tentang'] = TRUE;
        
        $this->load->view('header', $datah);
        $this->load->view('tentang');
        $this->load->view('footer');
    }

}