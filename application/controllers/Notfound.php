<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notfound extends CI_Controller {

    public function index() {
        // notifikasi
        $this->load->model('model_notif', '', true);
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        
        // generate view
        $this->load->view('header',$datah);
        $this->load->view('error404');
        $this->load->view('footer');
    }

}