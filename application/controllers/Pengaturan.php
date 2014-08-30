<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

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
        $datah['menu_atur'] = TRUE;
        
        $this->load->view('header',$datah);
        $this->load->view('pengaturan_view');
        $this->load->view('footer');
    }
    
    public function profil() {
        // notifikasi
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        $datah['menu_atur'] = TRUE;
        $datah['menu_profil'] = TRUE;
        
        $this->load->view('header',$datah);
        $this->load->view('profil_view');
        $this->load->view('footer');
    }

}