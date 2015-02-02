<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

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
        
        // mengaktifkan menu notifikasi
        $datah['menu_notif'] = TRUE;
        $datah['title'] = "Notifikasi";
        
        // daftar notifikasi
        $data['notif'] = $this->model_notif->get_notif()->result();
        
        $this->load->view('header_view', $datah);
        $this->load->view('notifikasi_view', $data);
        $this->load->view('footer_view');
    }
    function hapusnotif(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hapus-id', 'Role ID','required|strip_tags');

        if($this->form_validation->run() == TRUE){
            $id = addslashes($this->input->post('hapus-id', TRUE));
            if($id == 1) {
                $this->model_notif->deleteall();
                $newdata = array(
                    'pesannotif' => "Semua notifikasi berhasil dihapus",
                );
                $this->session->set_userdata($newdata);

                $status['status'] = 1;
                $status['pesan'] = 'Semua notifikasi berhasil dihapus';
            } else {
                $status['status'] = 0;
                $status['pesan'] = 'Anda tidak punya hak untuk menghapus notifikasi';
            }
        }else{
            $status['status'] = 0;
            $status['pesan'] = validation_errors();
        }

        echo json_encode($status);
    }

    function bacasemua(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('baca-id', 'Role ID','required|strip_tags');

        if($this->form_validation->run() == TRUE){
            $id = addslashes($this->input->post('baca-id', TRUE));
            if($id == 1) {
                $this->model_notif->updatebaca();
                $newdata = array(
                    'pesannotif' => "Semua notifikasi berhasil ditandai telah dibaca",
                );
                $this->session->set_userdata($newdata);

                $status['status'] = 1;
                $status['pesan'] = 'Semua notifikasi berhasil ditandai telah dibaca';
            } else {
                $status['status'] = 0;
                $status['pesan'] = 'Anda tidak punya hak untuk menandai notifikasi';
            }
        }else{
            $status['status'] = 0;
            $status['pesan'] = validation_errors();
        }

        echo json_encode($status);
    }

}