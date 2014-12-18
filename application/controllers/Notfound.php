<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notfound extends CI_Controller {

    public function index() {
        // notifikasi
        $this->load->model('model_notif', '', true);
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        $datah['title'] = "404 Error";
        
        // generate view
        $this->load->view('header_view',$datah);
        $this->load->view('error404_view');
        $this->load->view('footer_view');
    }

}