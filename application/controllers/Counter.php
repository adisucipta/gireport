<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Counter extends CI_Controller {

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
        $this->load->model('model_counter', '', true);
    }

    public function index() {
        
    }
    
    function tambahcounter(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tambah-nama', 'Nama','required|strip_tags|callback_cek_nama');
        $this->form_validation->set_rules('tambah-ip', 'IP Address','required|strip_tags|callback_cek_ip');
        //$status = array('status' => NULL, 'error' => NULL);

        if($this->form_validation->run() == TRUE){
            //$this->form_validation->set_rules('token', 'token', 'callback_cek_counter');
            //$this->load->model('model_counter');
            
            //if ($this->form_validation->run() == FALSE) {
            //    $status['status'] = 0;
            //    $status['error'] = validation_errors();
            //} else {
                $nama = addslashes($this->input->post('tambah-nama', TRUE));
                $ip = addslashes($this->input->post('tambah-ip', TRUE));
                $this->model_counter->insert(array('counter_name' => $nama,'counter_ip' => $ip,'counter_status' => 0));
                
                $status['status'] = 1;
                $status['error'] = '';
            //}
        }else{
            $status['status'] = 0;
            $status['error'] = validation_errors();
        }
        
        echo json_encode($status);
    }
    
    function editcounter(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('edit-nama', 'Nama','required|strip_tags');
        $this->form_validation->set_rules('edit-ip', 'IP Address','required|strip_tags');
        $this->form_validation->set_rules('edit-id', 'Counter ID','required|strip_tags');
        $status = array('status' => NULL, 'error' => NULL);

        if($this->form_validation->run() == TRUE){
            
            
            //$this->form_validation->set_rules('edit-id', 'Counter ID','callback_cek_id');
            //$this->load->model('model_counter');
            
            
            //} else {
                $nama = addslashes($this->input->post('edit-nama', TRUE));
                $ip = addslashes($this->input->post('edit-ip', TRUE));
                $tempnama = addslashes($this->input->post('edit-tempnama', TRUE));
                $tempip = addslashes($this->input->post('edit-tempip', TRUE));
                $id = addslashes($this->input->post('edit-id', TRUE));
                
                if($nama != $tempnama) {
                    $this->form_validation->set_rules('edit-nama', 'Nama','callback_cek_nama');
                    if ($this->form_validation->run() == FALSE) {
                        $status['status'] = 0;
                        $status['error'] = validation_errors();
                    } else {
                        $this->model_counter->update($id,array('counter_name' => $nama));
                        $status['status'] = 1;
                        $status['error'] = '';
                    }
                } elseif ($ip != $tempip) {
                    $this->form_validation->set_rules('edit-ip', 'IP Address','callback_cek_ip');
                    if ($this->form_validation->run() == FALSE) {
                        $status['status'] = 0;
                        $status['error'] = validation_errors();
                    } else {
                        $this->model_counter->update($id,array('counter_ip' => $ip));
                        $status['status'] = 1;
                        $status['error'] = '';
                    }
                } elseif ($nama != $tempnama && $ip != $tempip) {
                    $this->form_validation->set_rules('edit-nama', 'Nama','callback_cek_nama');
                    $this->form_validation->set_rules('edit-ip', 'IP Address','callback_cek_ip');
                    if ($this->form_validation->run() == FALSE) {
                        $status['status'] = 0;
                        $status['error'] = validation_errors();
                    } else {
                        $this->model_counter->update($id,array('counter_name' => $nama,'counter_ip' => $ip));
                        $status['status'] = 1;
                        $status['error'] = '';
                    }
                }
                
        }else{
            $status['status'] = 0;
            $status['error'] = validation_errors();
        }
        
        echo json_encode($status);
    }
    
    function hapuscounter(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hapus-id', 'Counter ID','required|strip_tags');

        if($this->form_validation->run() == TRUE){
            //$this->load->model('model_counter');
            $id = addslashes($this->input->post('hapus-id', TRUE));
            $this->model_counter->delete($id);

            $status['status'] = 1;
            $status['error'] = '';
        }else{
            $status['status'] = 0;
            $status['error'] = validation_errors();
        }
        
        echo json_encode($status);
    }
    
    function cek_nama($str) {
        //$this->load->model('model_counter');
        $c_nama = $this->model_counter->cek(array('counter_name' => $str));
        
        if($c_nama->num_rows() > 0){
            $this->form_validation->set_message('cek_nama', 'Nama sudah digunakan, silakan coba yang lain !!');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    function cek_ip($str) {
        //$this->load->model('model_counter');
        $c_ip = $this->model_counter->cek(array('counter_ip' => $str));
        
        if($c_ip->num_rows() > 0){
            $this->form_validation->set_message('cek_ip', 'IP Address sudah digunakan, silakan coba yang lain !!');
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
    
    public function getcounter() {
        //$this->load->model('model_counter');
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
        $query = $this->model_counter->get_daftarcounter($start, $rows, $search);
        $iFilteredTotal = $query->num_rows();
        $iTotal = $this->model_counter->get_count_daftarcounter($search)->row()->Total;

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
            $record[] = $temp->Nama;
            $record[] = $temp->IP;
            $record[] = $temp->Status == 1 ? 'ON' : 'OFF';
            $record[] = '<a onclick="modaledit(\''.$temp->ID.'\', \''.addslashes($temp->Nama).'\', \''.addslashes($temp->IP).'\')" class="btn btn-info btn-xs">Edit</a> 
                         <a onclick="modalhapus(\''.$temp->ID.'\', \''.addslashes($temp->Nama).'\', \''.addslashes($temp->IP).'\')" class="btn btn-danger btn-xs">Hapus</a>';

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