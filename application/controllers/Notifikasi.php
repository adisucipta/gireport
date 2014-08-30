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
        $this->load->model('model_notif', '', true);
    }

    public function index() {  
        // notifikasi
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        
        // mengaktifkan menu notifikasi
        $datah['menu_notif'] = TRUE;
        
        // daftar notifikasi
        $data['notif'] = $this->model_notif->get_notif();
        
        $this->load->view('header', $datah);
        $this->load->view('notifikasi_view', $data);
        $this->load->view('footer');
    }
    
    public function bacasmua() {
        $newdata = array(
            'pesannotif' => "Semua notifikasi berhasil ditandai telah dibaca",
        );
        $this->model_notif->updatebaca();
        $this->session->set_userdata($newdata);
        redirect('notifikasi');
    }

}