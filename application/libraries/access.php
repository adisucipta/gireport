<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Access {

    public $user;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->helper('cookie');
        $this->CI->load->model('model_user');
        $this->CI->load->model('model_notif');

        $this->model_user = & $this->CI->model_user;
        $this->model_notif = & $this->CI->model_notif;
    }
    
    /**
     * proses login
     * 0 = username tak ada
     * 1 = sukses
     * 2 = password salah
     * 3 = tak punya hak akses 
     * @param unknown_type $username
     * @param unknown_type $password
     * @return boolean
     */
    function login($username, $password) {
        $result = $this->model_user->get_login_info($username);
        if ($result) {
            $password = sha1($password);
            if ($password == $result->user_pass) {
                if($result->user_role == '1' || $result->user_role == '3') {
                    $this->CI->session->set_userdata('user_id', $result->user_id);
                    $this->CI->session->set_userdata('username', $result->user_name);
                    $this->CI->session->set_userdata('role', $result->rolename);
                    $this->CI->session->set_userdata('nama', $result->user_data);
                    $this->CI->session->set_userdata('role_id', $result->user_role);
                    
                    $data = array(
                        'user_status' => "1",
                    );
                    $datanotif = array(
                        'notif_teks' => "User " . $result->user_name . " login di Web Report",
                        'notif_tipe' => "1",
                        'notif_baca' => "0"
                    );
                    $this->model_user->update($result->user_id, $data);
                    $this->model_notif->insert($datanotif);
                    
                    return 1;
                } else {
                    return 3;
                }                
            } else {
                return 2;
            }
        }
        return 0;
    }
    
    /**
     * cek apakah sudah login
     * @return boolean
     */
    function is_login() {
        return (($this->CI->session->userdata('user_id')) ? TRUE : FALSE);
    }

    function cek_akses($kode_menu) {
        $level_cookie = $this->CI->session->userdata('level');
        if ($this->users_model->get_akses($kode_menu, $level_cookie) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function cek_akses_level($kode_menu, $level) {
        if ($this->users_model->get_akses($kode_menu, $level) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_username() {
        return $this->CI->session->userdata('username');
    }

    function get_nama() {
        return $this->CI->session->userdata('nama');
    }

    function get_role() {
        return $this->CI->session->userdata('role');
    }
    
    function get_roleid() {
        return $this->CI->session->userdata('role_id');
    }
    
    function get_userid() {
        return $this->CI->session->userdata('user_id');
    }

//    /**
//     * logout
//     */
//    function logout() {
//        $this->CI->session->unset_userdata('user_id');
//        $this->CI->session->unset_userdata('level');
//        $this->CI->session->unset_userdata('nama');
//    }

}