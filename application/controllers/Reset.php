<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reset extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_user', '', true);
    }

    public function index() {
        $this->load->view('reset');
    }

    // Example method initializing KCFinder to enable uploads.
    public function login() {

        $valid = false;
        $users = $this->model_user->get_user();
        $name = $this->input->post('username'); // mengambil user nama dari text field yang ada di form login
        $password = $this->input->post('password'); // mengambil password dari text field yang ada di form login
        //kondisi pengecekan apakah username dan password yang dimasukkan telah sesuai dengan benar atau tidak
        foreach ($users->result() as $row) {
            if ($name == $row->user_name && md5($password) == $row->user_pass) {
                $valid = true;
                switch ($row->user_role) {
                    case 7:
                        $role = 'Admin';
                        break;
                    case 1:
                        $role = 'User';
                        break;
                    default:
                        $role = 'User Biasa';
                        break;
                }
                //setting session terhadap data user
                $newdata = array(
                    'username' => $name,
                    'role' => $role,
                    'nama' => $row->Nama,
                    'id' => $row->user_id
                );

                $this->session->set_userdata($newdata);

                break;
            }
        }//end foreach
        //apabila login telah sesuai dengan username dan password maka user akan masuk halaman utama
        if ($valid) {
            redirect('welcome');
            // redirect('homepage');
        }
        //apabila login tidak sesuai dengan username dan password maka user akan masuk halaman login
        else {
            redirect('auth/fals');
        }
    }

    public function fals() {
        $data['false'] = "Maaf Username / Password salah";
        $this->load->view('login', $data);
    }


}
