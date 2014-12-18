<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Controller {

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

        // load helper dan database
        $this->load->helper('date');
        $this->load->helper('number');
        //$this->load->model('model_cobakp', '', TRUE);

        $datestring = "%Y-%m-%d";
        $time = time();
        $this->tanggal['hari_ini'] = mdate($datestring, $time);
    }

    public function index() {
        
    }

    public function antrian() {
        // notifikasi
        $this->load->model('model_notif', '', true);
        $this->load->model('model_counter', '', true);
        $this->load->model('model_antrian', '', true);
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        $data['counter'] = $this->model_counter->get_counter();
        $data['flotdata'] = $this->model_antrian->get_totaldata()->row();
        //$data['user'] = $this->model_user->get_user();
        $datah['menu_antrian'] = TRUE;
        $datah['menu_report'] = TRUE;
        //$datah['list_nsa'] = $this->model_cobakp->getnsa()->result();
        $this->load->view('header', $datah);
        $this->load->view('antrian_view', $data);
        $this->load->view('footer');
    }
    public function pengunjung() {
        // notifikasi
        $this->load->model('model_notif', '', true);
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        
        //$data['user'] = $this->model_user->get_user();
        $datah['menu_pengunjung'] = TRUE;
        $datah['menu_report'] = TRUE;
        //$datah['list_nsa'] = $this->model_cobakp->getnsa()->result();
        $this->load->view('header', $datah);
        $this->load->view('pengunjung_view');
        $this->load->view('footer');
    }
    public function survei() {
        // notifikasi
        $this->load->model('model_notif', '', true);
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        
        //$data['user'] = $this->model_user->get_user();
        $datah['menu_survei'] = TRUE;
        $datah['menu_report'] = TRUE;
        //$datah['list_nsa'] = $this->model_cobakp->getnsa()->result();
        $this->load->view('header', $datah);
        $this->load->view('queue_view');
        $this->load->view('footer');
    }

}