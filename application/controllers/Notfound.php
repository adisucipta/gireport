<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notfound extends CI_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('error404');
        $this->load->view('footer');
    }

}