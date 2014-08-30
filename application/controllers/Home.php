<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->load->model('model_antrian', '', true);
        $this->load->model('model_counter', '', true);
        $this->load->model('model_survei', '', true);
    }

    public function index() {
        // notifikasi
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        // mengaktifkan menu dashboard
        $datah['menu_dashboard'] = TRUE;
        
        // data buat box
        $data['boxlayani'] = $this->model_antrian->get_total("3",TRUE);
        $data['boxcounter'] = $this->model_counter->get_total("1");
        $data['boxantri'] = $this->model_antrian->get_total("1",TRUE);
        $data['boxsurvei'] = $this->model_survei->get_total();
        
        // data buat grafik
        $data['laygraf'] = $this->model_antrian->get_totalayanan();
        $data['cougraf'] = $this->model_antrian->get_totalcounter();
        $data['listlay'] = $this->model_antrian->get_layanan();
        $data['listcou'] = $this->model_counter->get_counter();
        
        // memberikan salam ke user yg login
        $datestring = "%H:%i:%s";
        $tglstring = "%d-%m-%Y";
        $waktu = '';
        $time = gmt_to_local(now(), "UP5");
        $jam = mdate($datestring, $time);
        $tanggal = mdate($tglstring, $time);
        if ($jam < 4) {
            $waktu = "Dini Hari ";
        } else if ($jam < 11) {
            $waktu = "Pagi ";
        } else if ($jam < 15) {
            $waktu = "Siang ";
        } else if ($jam < 18) {
            $waktu = "Sore ";
        } else if ($jam < 24) {
            $waktu = "Malam ";
        }
        $data['welcome_message'] = "Selamat " . $waktu . ucfirst($this->session->userdata('username')) . ". Hari ini tanggal " . $tanggal;
        
        // generate view
        $this->load->view('header',$datah);
        $this->load->view('dashboard_view',$data);
        $this->load->view('footer');
    }

}