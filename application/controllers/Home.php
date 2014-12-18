<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

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
        
        // load model
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
        $datah['title'] = "Dashboard";
        
        // data buat grafik
        $data['laygraf'] = $this->model_antrian->get_totalayanan();
        $data['cougraf'] = $this->model_antrian->get_totalcounter();
        $data['listlay'] = $this->model_antrian->get_layanan();
        $data['listcou'] = $this->model_counter->get_counter();
        
        // memberikan salam ke user yg login
        $datestring = "%H:%i:%s";
        $tglstring = "%d-%m-%Y";
        $waktu = '';
        $jam = mdate($datestring, now());
        $tanggal = mdate($tglstring, now());
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
        $this->load->view('header_view',$datah);
        $this->load->view('dashboard_view',$data);
        $this->load->view('footer_view');
    }
    
    public function get_jumlahdatabox() {
        // data buat box
        $data['boxlayani'] = $this->model_antrian->get_total("3",TRUE);
        $data['boxcounter'] = $this->model_counter->get_total("1");
        $data['boxantri'] = $this->model_antrian->get_total("1",TRUE);
        $data['boxsurvei'] = $this->model_survei->get_total();
        
        echo json_encode($data);
    }
    
    public function get_jumlahdatacounter() {
        // data buat grafik
        //$data['laygraf'] = $this->model_antrian->get_totalayanan();
        $data['cougraf'] = $this->model_antrian->get_totalcounter();
//        $data['listlay'] = $this->model_antrian->get_layanan();
        $data['listcou'] = $this->model_counter->get_counter();
        if(is_null($data['cougraf'])) {
            foreach ($data['listcou']->result() as $key) {
                $cougraf[] = array(
                    'counter' => $key->counter_name,'a' => 0,'b' => 0,'c' => 0
                );       
            }
        } else {
            foreach ($data['cougraf']->result() as $key) {
                $cougraf[] = array(
                    'counter' => $key->Counter,'a' => $key->Gff,'b' => $key->Ticket,'c' => $key->City
                );       
            }
        }
        
        
        echo json_encode($cougraf);
    }
    
    public function get_jumlahdatalayanan() {
        // data buat grafik
        $data['laygraf'] = $this->model_antrian->get_totalayanan();
        $data['listlay'] = $this->model_antrian->get_layanan();
//        $data['listcou'] = $this->model_counter->get_counter();
        
        if(is_null($data['laygraf'])) {
            foreach ($data['listlay']->result() as $key) {
                $laygraf[] = array(
                    'layanan' => $key->layanan_name,'a' => 0,'b' => 0,'c' => 0
                );       
            }
        } else {
            foreach ($data['laygraf']->result() as $key) {
                $laygraf[] = array(
                    'layanan' => $key->Layanan,'a' => $key->Selesai,'b' => $key->Menunggu,'c' => $key->Dilayani
                );       
            }
        }
        
        
        echo json_encode($laygraf);
    }

}