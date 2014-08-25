<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_user', '', true);
    }

    public function index() {
        // fungsi yang pertama kali di-load -- generate view login
        if (!is_null($this->session->userdata('username'))) {
            redirect('home');
        }
        $this->load->view('login');
    }

    // fungsi untuk login
    public function login() {
        $valid = false;
        $users = $this->model_user->get_user();
        // mengambil username dari text field yang ada di form login
        $name = $this->input->post('username');
        // mengambil password dari text field yang ada di form login
        $password = $this->input->post('password');
        $urlke = $this->session->userdata('urlke') == NULL ? 'home' : $this->session->userdata('urlke');
        // kondisi pengecekan apakah username dan password yang dimasukkan telah sesuai atau tidak
        foreach ($users->result() as $row) {
            if ($name == $row->user_name && md5($password) == $row->user_pass) {
//            if ($name == "admin" && $password == "admin") {
                $valid = true;
                switch ($row->user_role) {
                    case 1:
                        $role = 'Administrator';
                        break;
                    case 2:
                        $role = 'Counter';
                        break;
                    default:
                        $role = 'User';
                        break;
                }
                // setting session terhadap data user
                $newdata = array(
                    'username' => $name,
                    'role' => $role,
                    'role_id' => $row->user_role,
                    'nama' => $row->user_data,
                    'id' => $row->user_id
                );

                $this->session->set_userdata($newdata);

                break;
            }
        } // end foreach
        // apabila login berhasil maka user akan masuk halaman utama
        if ($valid) {
            $data = array(
                'user_status' => "1",
                'user_pos' => "1"
            );
            $this->model_user->update($row->user_id, $data);
            redirect($urlke);
        }
        // apabila login gagal maka user akan kembali ke halaman login
        else {
            $newdata = array(
                'pesan' => "Username / Password salah"
            );
            $this->session->set_userdata($newdata);
            redirect('auth/fals');
        }
    }

    // buat mengirimkan informasi kesalahan
    public function fals() {
        $data['false'] = $this->session->userdata('pesan');
        $this->load->view('login', $data);
    }

    // buat logout
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }

}
