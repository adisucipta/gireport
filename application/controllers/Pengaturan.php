<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

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
        $this->load->library('image_CRUD'); 
    }

    public function index() {
        // notifikasi
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        $datah['menu_atur'] = TRUE;
        $datah['title'] = "Pengaturan";
        
        $this->load->view('header_view',$datah);
        $this->load->view('pengaturan_view');
        $this->load->view('footer_view');
    }
    
    public function profil() {
        // load model user
        $this->load->model('model_user', '', true);
        
        // data header
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        $datah['menu_atur'] = TRUE;
        $datah['menu_profil'] = TRUE;
        $datah['title'] = "Profil";
        
        // dapetin user
        $user = $this->model_user->get_user($this->access->get_userid());
        
        
        $data['tanggalbuat'] = $user->user_created;
        $data['profil_user'] = $user->user_name;
        $data['profil_nama'] = $user->user_data;
        
        $this->load->view('header_view',$datah);
        $this->load->view('profil_view',$data);
        $this->load->view('footer_view');
    }
    
    public function counter() {
        // data header
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        $datah['menu_atur'] = TRUE;
        $datah['menu_counter'] = TRUE;
        $datah['title'] = "Counter";
        
        $this->load->view('header_view',$datah);
        $this->load->view('counter_view');
        $this->load->view('footer_view');
    }
    
    public function user() {
        $this->load->model('model_user', '', true);
        // data header
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        $datah['menu_atur'] = TRUE;
        $datah['menu_user'] = TRUE;
        $datah['title'] = "User";
        // data badan
        $data['opsirole'] = $this->model_user->get_role();
        
        $this->load->view('header_view',$datah);
        $this->load->view('user_view',$data);
        $this->load->view('footer_view');
    }

    public function gui() {
        $this->load->model('model_user', '', true);
        // data header
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        $datah['menu_atur'] = TRUE;
        $datah['menu_gui'] = TRUE;
        $datah['title'] = "GUI Layanan";
        // data badan
        //$data['opsirole'] = $this->model_user->get_role();

        // data crud image
        $image_crud = new image_CRUD();
        
        $image_crud->set_primary_key_field('gambar_id');
        $image_crud->set_url_field('url');
        $image_crud->set_table('gi_gambar')
            ->set_image_path('assets/guigambar');
            
        $data['imgcrud'] = $image_crud->render();
        
        $this->load->view('header_view',$datah);
        $this->load->view('gui_view',$data);
        $this->load->view('footer_view');
    }

}