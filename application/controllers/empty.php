<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ini_set('memory_limit', '-1');

class Update extends CI_Controller {

    public $data = array();
    public $pillookup;

    public function __construct() {

        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->model('model_user', '', true);
        $this->load->model('model_cobakp', '', TRUE);
        //$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        if ($this->session->userdata('username') == NULL)
            redirect('auth');
    }

    public function index() {
        $this->lookup();
    }

    //untuk mengambil data dari form excel
    public function lookup() {
        $data['user'] = $this->model_user->get_user();
        $data['menu_lookup'] = TRUE;
        $datah['update'] = TRUE;
        $datah['list_nsa'] = $this->model_cobakp->getnsa()->result();


        if ($this->input->post('save')) {
            $fileName = $_FILES['import']['name'];

            $config['upload_path'] = './assets/files/';
            $config['file_name'] = $fileName;
            $config['allowed_types'] = 'xls|xlsx|csv';
            $config['max_size'] = 100000;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('import')) {
                //$this->upload->display_errors();
                $data['gagal'] = TRUE;
                $data['errorMsg'] = $this->upload->error_msg;
            } else {
                $media = $this->upload->data('import');
                $this->load->library('excel_reader');
                $this->excel_reader->setOutputEncoding('CP1251');

                $file = $media['full_path'];
                $this->excel_reader->read($file);
                //$baris = $data->rowcount($sheet_index=0);
                error_reporting(E_ALL ^ E_NOTICE);

                $pillookup = $this->input->post('pillookup');

                if ($pillookup == "2G") {
                    // Sheet 1
                    $dataread = $this->excel_reader->sheets[0];
                    $dataexcel = Array();
                    $this->load->model('Lookup_model');

                    if ($dataread['cells'][1][1] == "RC NAME") { // RC NAME hanya ada di 3G
                        $data['gagal'] = TRUE;
                        $data['errorMsg'] = "Invalid format 2G";
                    }

                    //	if ($a == $dataread['numRows']) {
                    if (!$data['gagal']) { // jika tidak error
                        mysql_query("TRUNCATE TABLE lookup_2g");
                        for ($i = 2; $i <= $dataread['numRows']; $i++) {
                            if ($dataread['cells'][$i][1] == '')
                                break;
                            $dataexcel['mbsc_name'] = "MBSC_" . $dataread['cells'][$i][1];
                            $dataexcel['bsc_name'] = $dataread['cells'][$i][1];
                            $dataexcel['msc_name'] = $dataread['cells'][$i][3];
                            $dataexcel['cell_id'] = $dataread['cells'][$i][5];
                            $dataexcel['bts_id'] = $dataread['cells'][$i][6];
                            $dataexcel['bsc_name_cell_id'] = $dataread['cells'][$i][7];
                            $dataexcel['site_id_sec'] = $dataread['cells'][$i][8];
                            $dataexcel['site_id'] = $dataread['cells'][$i][9];
                            $dataexcel['sites'] = $dataread['cells'][$i][10];
                            $dataexcel['site_name'] = $dataread['cells'][$i][12];
                            $dataexcel['bts_name'] = $dataread['cells'][$i][13];
                            $dataexcel['lac'] = $dataread['cells'][$i][15];
                            $dataexcel['cell_name_btsn'] = str_replace("N_", "", $dataread['cells'][$i][18]);
                            $dataexcel['kecamatan'] = $dataread['cells'][$i][20];
                            $dataexcel['kelurahan'] = empty($dataread['cells'][$i][21]) == TRUE ? "-" : $dataread['cells'][$i][21];
                            $dataexcel['kabupaten'] = $dataread['cells'][$i][22];
                            $dataexcel['nsa'] = $dataread['cells'][$i][23];
                            $dataexcel['sub_branch'] = $dataread['cells'][$i][24];
                            $dataexcel['cluster'] = $dataread['cells'][$i][25];
                            $dataexcel['rtpo_area'] = $dataread['cells'][$i][26];
                            $dataexcel['alamat'] = empty($dataread['cells'][$i][27]) == TRUE ? "-" : $dataread['cells'][$i][27];
                            $this->Lookup_model->tambahlookup2g($dataexcel);
                        }
                        //$this->load->model('Lookup_model');
                        //$this->Lookup_model->tambahlookup2g($dataexcel);
                        $data['sukses'] = "Upload Berhasil";
                        $data['rowSukses'] = $dataread['numRows'] - 1;
                    }

                    //	}
                } // akhir if pillookup 2G
                else if ($pillookup == "3G") {
                    $dataread = $this->excel_reader->sheets[0];
                    $dataexcel = Array();
                    $this->load->model('Lookup_model');

                    for ($a = 2; $a <= $dataread['numRows']; $a++) {
                        if (strlen($dataread['cells'][$i][3]) > 5) {
                            $data['gagal'] = TRUE;
                            $data['errorMsg'] = "Invalid format 3G";
                            break;
                        }
                    }

                    mysql_query("TRUNCATE TABLE lookup_3g");
                    //	if ($a == $dataread['numRows']) {
                    for ($i = 2; $i <= $dataread['numRows']; $i++) {
                        if ($dataread['cells'][$i][1] == '')
                            break;
                        $dataexcel['rnc_name'] = empty($dataread['cells'][$i][1]) == TRUE ? "-" : $dataread['cells'][$i][1];
                        $dataexcel['rnc_id'] = $dataread['cells'][$i][2];
                        $dataexcel['cell_id'] = $dataread['cells'][$i][3];
                        $dataexcel['site_id'] = $dataread['cells'][$i][5];
                        $dataexcel['site'] = $dataread['cells'][$i][6];
                        $dataexcel['site_name'] = $dataread['cells'][$i][8];
                        $dataexcel['node_b_name'] = $dataread['cells'][$i][9];
                        $dataexcel['lac'] = $dataread['cells'][$i][11];
                        $dataexcel['sac'] = $dataread['cells'][$i][12];
                        $dataexcel['rac'] = $dataread['cells'][$i][14];
                        $dataexcel['cell_name'] = str_replace("N_", "", $dataread['cells'][$i][18]);
                        $dataexcel['kecamatan'] = $dataread['cells'][$i][19];
                        $dataexcel['kelurahan'] = empty($dataread['cells'][$i][20]) == TRUE ? "-" : $dataread['cells'][$i][20];
                        $dataexcel['kabupaten'] = $dataread['cells'][$i][21];
                        $dataexcel['nsa'] = $dataread['cells'][$i][22];
                        $dataexcel['sub_branch'] = $dataread['cells'][$i][23];
                        $dataexcel['cluster'] = $dataread['cells'][$i][24];
                        $dataexcel['alamat'] = $dataread['cells'][$i][26];
                        $this->Lookup_model->tambahlookup3g($dataexcel);
                    }
                    //$this->load->model('Lookup_model');
                    //$this->Lookup_model->tambahlookup3g($dataexcel);
                    $data['sukses'] = "Upload Berhasil";
                    $data['rowSukses'] = $dataread['numRows'] - 1;
                    //	} //if $a
                } // if lookup 3g
            }
            //delete_files($media['file_path']);
        }
        $this->load->view('header', $datah);
        $this->load->view('import_view', $data);
        $this->load->view('footer');
    }

}