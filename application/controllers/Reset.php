<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reset extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_user', '', true);
    }

    public function index() {
        $this->load->view('reset_view');
    }

}
