<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('model_user', '', true);
        //$this->load->model('model_notif', '', true);
    }

    public function index() {
        // fungsi yang pertama kali di-load -- generate view login
        if (is_login()) {
            redirect('home');
        }
        $this->load->view('login_view');
    }

    // fungsi untuk login
    public function login() {
        $this->load->library('form_validation');
        // mengambil username dan password dari text field yang ada di form login
        $this->form_validation->set_rules('username', 'Username','trim|required|strip_tags');
        $this->form_validation->set_rules('password', 'Password','trim|required');
        $this->session->unset_userdata('urlke');
        $urlke = $this->session->userdata('urlke') == NULL ? 'home' : $this->session->userdata('urlke');
        
        if ($this->form_validation->run() == TRUE) {
            $this->form_validation->set_rules('token', 'token', 'callback_check_login');
            if ($this->form_validation->run() == FALSE) {
                //Jika login gagal
                $status['status'] = 0;
                $status['error'] = validation_errors();
            } else {
                //Jika sukses
                $status['status'] = 1;
            }
        } else {
            //Jika form validasi gagal
            $status['status'] = 0;
            $status['error'] = validation_errors();
        }
        
        if($status['status'] == 1) {
            redirect($urlke);
        } else {
            $this->load->view('login_view', $status);
        }
        
    }
    
    function check_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $login = $this->access->login($username, $password);
        if ($login == 1) {
            return TRUE;
        } else if ($login == 2) {
            $this->form_validation->set_message('check_login', 'Password yang dimasukkan salah');
            return FALSE;
        } else if ($login == 3) {
            $this->form_validation->set_message('check_login', 'Anda tidak punya hak untuk mengakses Dashboard');
            return FALSE;
        } else {
            $this->form_validation->set_message('check_login', 'Username yang dimasukkan tidak dikenal');
            return FALSE;
        }
    }

    // buat mengirimkan informasi kesalahan
    public function fals() {
        $data['error'] = $this->session->userdata('pesan');
        $this->load->view('login_view', $data);
    }

    // buat logout
    public function logout() {
        $datanotif = array(
            'notif_teks' => "User " . $this->session->userdata('username') . " logout",
            'notif_tipe' => "3",
            'notif_baca' => "0"
        );
        $data = array(
            'user_status' => "0",
            'user_pos' => "0"
        );
        $this->model_user->update($this->session->userdata('user_id'), $data);
        $this->model_notif->insert($datanotif);
        $this->session->sess_destroy();
        redirect('auth');
    }
    public function reset() {
        // ambil value dari form
        $uname = $this->input->post('username');
        $pass1 = $this->input->post('password');
        $pass2 = $this->input->post('password2');
        
        $cekuser = $cekpass = FALSE;
        $pesan = "";
        
        $data = array(
            'user_name' => $uname
        );
        $cek = $this->model_user->reset($data);
        if(!is_null($cek)) {
            $cekuser = TRUE;
            if($pass1 == $pass2) {
                $cekpass = TRUE;
                redirect('auth');
            }
        }
        
        if(!$cekuser) $pesan = "Username tidak terdaftar";
        elseif(!$cekpass) $pesan = "Password tidak sama";

        $newdata = array(
            'pesan' => $pesan
        );
        $this->session->set_userdata($newdata);
        redirect('auth/fals');
    }

}
