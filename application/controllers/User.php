<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

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
        
        // load model
        $this->load->model('model_user', '', true);
    }

    public function index() {
        
    }
    
    function tambahuser(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tambah-nama', 'Nama','trim|required|strip_tags');
        $this->form_validation->set_rules('tambah-username', 'Username','trim|required|strip_tags|min_length[3]|callback_cek_uname');
        $this->form_validation->set_rules('tambah-pass', 'Password','trim|required|strip_tags|matches[tambah-passconf]|min_length[5]');
        $this->form_validation->set_rules('tambah-passconf', 'Konfirmasi Password','trim|required|strip_tags');
        
        if($this->form_validation->run() == TRUE){
                $data = array(
                    'user_name' => addslashes($this->input->post('tambah-username', TRUE)),
                    'user_pass' => sha1(addslashes($this->input->post('tambah-pass', TRUE))),
                    'user_data' => addslashes($this->input->post('tambah-nama', TRUE)),
                    'user_role' => addslashes($this->input->post('tambah-role', TRUE))
                );
                
                $this->model_user->insert($data);
                
                $status['status'] = 1;
                $status['error'] = '';
            //}
        }else{
            $status['status'] = 0;
            $status['error'] = validation_errors();
        }
        
        echo json_encode($status);
    }
    
    function edituser(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('edit-nama', 'Nama','trim|required|strip_tags');
        $this->form_validation->set_rules('edit-id', 'User ID','required|strip_tags');

        if($this->form_validation->run() == TRUE){
                $data = array(
                    'user_data' => addslashes($this->input->post('edit-nama', TRUE)),
                    'user_role' => addslashes($this->input->post('edit-role', TRUE))
                );
                $id = addslashes($this->input->post('edit-id', TRUE));
                
                $this->model_user->update($id,$data);
                $status['status'] = 1;
                $status['error'] = '';
        }else{
            $status['status'] = 0;
            $status['error'] = validation_errors();
        }
        
        echo json_encode($status);
    }
    
    function hapususer(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hapus-id', 'User ID','required|strip_tags');

        if($this->form_validation->run() == TRUE){
            $id = addslashes($this->input->post('hapus-id', TRUE));
            $this->model_user->delete($id);

            $status['status'] = 1;
            $status['error'] = '';
        }else{
            $status['status'] = 0;
            $status['error'] = validation_errors();
        }
        
        echo json_encode($status);
    }
    
    function gantipassword(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pass-lama', 'Password Lama','trim|required|strip_tags');
        $this->form_validation->set_rules('pass-baru', 'Password Baru','trim|required|strip_tags|matches[pass-conf]|min_length[5]');
        $this->form_validation->set_rules('pass-conf', 'Konfirmasi Password Baru','trim|required|strip_tags');

        if($this->form_validation->run() == TRUE){
            //} else {
                $passlama = addslashes($this->input->post('pass-lama', TRUE));
                $passbaru = addslashes($this->input->post('pass-baru', TRUE));
                $id = addslashes($this->input->post('pass-id', TRUE));
                
                $query = $this->model_user->get_user($id);
                
                if($query->user_pass == md5($passlama)) {
                    $this->model_user->update($id,array('user_pass' => md5($passbaru)));
                    $status['status'] = 1;
                    $status['error'] = '';
                } else {
                    $status['status'] = 0;
                    $status['error'] = "Password Lama yang Anda masukkan salah";
                } 
                
        }else{
            $status['status'] = 0;
            $status['error'] = validation_errors();
        }
        
        echo json_encode($status);
    }
    
    function gantinama(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama-lama', 'Nama','trim|required|strip_tags');

        if($this->form_validation->run() == TRUE){
                $nama = addslashes($this->input->post('nama-lama', TRUE));
                $id = addslashes($this->input->post('nama-id', TRUE));
                
                $this->model_user->update($id,array('user_data' => $nama));
                $this->session->set_userdata('nama', $nama);
                $status['status'] = 1;
                $status['error'] = '';
        }else{
            $status['status'] = 0;
            $status['error'] = validation_errors();
        }
        
        echo json_encode($status);
    }
    
    function cek_uname($str) {
        $c_nama = $this->model_user->cek(array('user_name' => $str));
        
        if($c_nama->num_rows() > 0){
            $this->form_validation->set_message('cek_uname', 'Username sudah digunakan, silakan coba yang lain !!');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    function cek_id($str) {
        //$this->load->model('model_counter');
        $c_id = $this->model_counter->cek(array('counter_id' => $str));
        $nama = $this->input->post('edit-nama');
        $ip = $this->input->post('edit-ip');
        
        echo "nama "+ $nama + ", ip " + $ip + ", id" + $str;
        
        if($c_id->num_rows() == 1){
            $flag = FALSE;
            if($nama == $c_id->row()->counter_name || $ip == $c_id->row()->counter_ip) { $flag = TRUE; }
            if($nama != $c_id->row()->counter_name) { 
                $flag = $this->cek_nama($nama); 
                if($flag == FALSE)
                    $this->form_validation->set_message('cek_id', 'Nama sudah digunakan, silakan coba yang lain !!');
            }
            if($ip != $c_id->row()->counter_ip) { 
                $flag = $this->cek_ip($ip); 
                if($flag == FALSE)
                    $this->form_validation->set_message('cek_id', 'IP Address sudah digunakan, silakan coba yang lain !!');
            }
            
            return flag;            
        } else {
            $this->form_validation->set_message('cek_id', 'Counter ID tidak ditemukan !!');
            return FALSE;
        }
    }
    
    public function getuser() {
        // variable initialization
        $search = "";
        $start = 0;
        $rows = 10;

        // get search value (if any)
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $search = $_GET['sSearch'];
        }

        // limit
        $start = $this->get_start();
        $rows = $this->get_rows();

        // run query to get user listing
        $query = $this->model_user->get_daftaruser($start, $rows, $search);
        $iFilteredTotal = $query->num_rows();
        $iTotal = $this->model_user->get_count_daftaruser($search)->row()->Total;

        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iTotal,
            "aaData" => array()
        );

        // get result after running query and put it in array
        $i = $start;
        $counter = $query->result();
        foreach ($counter as $temp) {
            $record = array();
            $record[] = $temp->ID;
            $record[] = $temp->Username;
            $record[] = $temp->Nama;
            $record[] = $temp->Dibuat;
            $record[] = $temp->Role;
            $record[] = $temp->Status;
            $record[] = '<div class="btn-group">
                            <button type="button" class="btn btn-info btn-xs btn-flat" data-toggle="dropdown">Opsi
                                <span class="fa fa-caret-down"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#" onclick="modaledit(\''.$temp->ID.'\', \''.addslashes($temp->Username).'\', \''.addslashes($temp->Nama).'\', \''.addslashes($temp->Role).'\', \''.addslashes($temp->Dibuat).'\')" >Edit</a></li>
                                <li><a href="#" onclick="modalhapus(\''.$temp->ID.'\', \''.addslashes($temp->Username).'\', \''.addslashes($temp->Role).'\')" >Hapus</a></li>
                                <li><a href="#" onclick="modalpassword(\''.$temp->ID.'\', \''.addslashes($temp->Username).')" >Password</a></li>
                            </ul>
                        </div>';
            //$record[] = '<a onclick="modaledit(\''.$temp->ID.'\', \''.addslashes($temp->Username).'\', \''.addslashes($temp->Nama).'\', \''.addslashes($temp->Role).'\', \''.addslashes($temp->Dibuat).'\')" class="btn btn-info btn-xs">Edit</a> 
            //             <a onclick="modalhapus(\''.$temp->ID.'\', \''.addslashes($temp->Nama).'\', \''.addslashes($temp->Role).'\')" class="btn btn-danger btn-xs">Hapus</a>
            //             <a onclick="modalpass(\''.$temp->ID.'\', \''.addslashes($temp->Username).')" class="btn btn-success btn-xs">Password</a>';

            $output['aaData'][] = $record;
        }
        // format it to JSON, this output will be displayed in datatable
        echo json_encode($output);
    }

    /**
     * fungsi tambahan 
     * 
     * 
     */
    function get_start() {
        $start = 0;
        if (isset($_GET['iDisplayStart'])) {
            $start = intval($_GET['iDisplayStart']);

            if ($start < 0)
                $start = 0;
        }

        return $start;
    }

    function get_rows() {
        $rows = 10;
        if (isset($_GET['iDisplayLength'])) {
            $rows = intval($_GET['iDisplayLength']);
            if ($rows < 5 || $rows > 500) {
                $rows = 10;
            }
        }

        return $rows;
    }

    function get_sort_dir() {
        $sort_dir = "ASC";
        $sdir = strip_tags($_GET['sSortDir_0']);
        if (isset($sdir)) {
            if ($sdir != "asc") {
                $sort_dir = "DESC";
            }
        }

        return $sort_dir;
    }

    
}