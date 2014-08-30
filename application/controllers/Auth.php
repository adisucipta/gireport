<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_user', '', true);
        $this->load->model('model_notif', '', true);
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
        $valid = $hak = false;
        $users = $this->model_user->get_user();
        // mengambil username dari text field yang ada di form login
        $name = $this->input->post('username');
        // mengambil password dari text field yang ada di form login
        $password = $this->input->post('password');
        $urlke = $this->session->userdata('urlke') == NULL ? 'home' : $this->session->userdata('urlke');
        // kondisi pengecekan apakah username dan password yang dimasukkan telah sesuai atau tidak
        foreach ($users->result() as $row) {
            if ($name == $row->user_name && md5($password) == $row->user_pass) {
                $valid = true;
                if($row->user_role == '1') {
                    $hak = true;

                    $role = 'Administrator';
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
                } // cek hak
            } // cek username dan password
        } // end foreach
        
        // apabila login berhasil maka user akan masuk halaman utama
        if ($valid && $hak) {
            $data = array(
                'user_status' => "1",
                'user_pos' => "1"
            );
            $datanotif = array(
                'notif_teks' => "User ". $name ." login",
                'notif_tipe' => "1",
                'notif_baca' => "0"
            );
            $this->model_user->update($row->user_id, $data);
            $this->model_notif->insert($datanotif);
            redirect($urlke);
        }
        // apabila login gagal maka user akan kembali ke halaman login
        else {
            $pesan = "";
            if(!$valid) $pesan = "Username / Password salah";
            elseif(!$hak) $pesan = "Anda tidak punya hak untuk mengakses Dashboard";
            
            $newdata = array(
                'pesan' => $pesan
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
        $datanotif = array(
            'notif_teks' => "User " . $this->session->userdata('username') . " logout",
            'notif_tipe' => "3",
            'notif_baca' => "0"
        );
        $data = array(
            'user_status' => "0",
            'user_pos' => "0"
        );
        $this->model_user->update($this->session->userdata('id'), $data);
        $this->model_notif->insert($datanotif);
        $this->session->sess_destroy();
        redirect('auth');
    }

}
