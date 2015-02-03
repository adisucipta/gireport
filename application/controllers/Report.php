<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Controller {

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
        // load library
        $this->load->library('Datatables');
        //$this->load->library('DatatablesHelper');

        // load model
        $this->load->model('model_notif', '', true);
        $this->load->model('model_antrian', '', true);
        $this->load->model('model_counter', '', true);
        $this->load->model('model_survei', '', true);
    }

    public function index() {
        
    }
    
//    public function getantrian2() {
//        //$output = $this->model_antrian->get_daftarantrian("26-08-2014");
//        //echo json_encode($output);
//        //$mySQLResults = $this->model_antrian->get_daftarantrian("26-08-2014");
//	//$json = json_encode($mySQLResults["Result"], $mySQLResults["iTotalRecords"], $mySQLResults["iTotalDisplayRecords"]);
//			
//	//echo $json;	
//        $this->datatables
//                ->select('CONCAT(gi_layanan.layanan_huruf, LPAD(gi_queue.queue_urutan, 4, 0 )) AS Nomor', FALSE)
//                ->from('gi_queue')
//                ->join('gi_layanan', 'gi_queue.queue_layanan = gi_layanan.layanan_id')
//                ->select('gi_counter.counter_name AS Counter', FALSE)
//                ->join('gi_counter', 'gi_queue.queue_counter = gi_counter.counter_id')
//                ->select('gi_layanan.layanan_name AS Layanan', FALSE)
//                ->select('gi_statusantri.antri_status AS Status', FALSE)
//                ->join('gi_statusantri', 'gi_queue.queue_status = gi_statusantri.antri_id')
//                ->select('gi_queue.queue_tanggal AS Tanggal', FALSE);
//
//        echo $this->datatables->generate();
//    }
    
    public function get_jumlahdatabox() {
        // data buat box
        $data['boxlayani'] = $this->model_antrian->get_total("3",TRUE);
        $data['boxpengunjung'] = $this->model_antrian->get_totaldata(TRUE);
        $data['boxantri'] = $this->model_antrian->get_total("1",TRUE);
        $data['boxsurvei'] = $this->model_survei->get_total(TRUE);
        
        echo json_encode($data);
    }
    
    public function get_totaldatabox() {
        // data buat box
        $data['boxlayani'] = $this->model_antrian->get_total("3");
        $data['boxpengunjung'] = $this->model_antrian->get_totaldata();
        $data['boxbatal'] = $this->model_antrian->get_total("4");
        $data['boxsurvei'] = $this->model_survei->get_total();
        
        echo json_encode($data);
    }
    
    public function getantrian() {
        // variable initialization
        $search = "";
        $start = 0;
        $rows = 25;

        // get search value (if any)
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $search = $_GET['sSearch'];
        }

        // limit
        $start = $this->get_start();
        $rows = $this->get_rows();

        // run query to get user listing
        $query = $this->model_antrian->get_daftarantrian("",$start, $rows, $search);
        //$query = $this->siswa_model->get_siswa($start, $rows, $search);
        $iFilteredTotal = $query->num_rows();

        $iTotal = $this->model_antrian->get_count_daftarantrian("",$search)->row()->Total;

        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iTotal,
            "aaData" => array()
        );

        //$edit = $this->access->cek_akses('atur_pendaftar');
        //$edit_menu = '';
        // get result after running query and put it in array
        $i = $start;
        $antrian = $query->result();
        foreach ($antrian as $temp) {
            $record = array();

            /*if ($edit) {
                $edit_menu = '
                    <li><a href="#" onclick="modaledit(\'' . $temp->no_pendaftaran . '\')" >Edit</a></li>
                    <li><a href="#" onclick="modalhapus(\'' . $temp->no_pendaftaran . '\', \'' . $temp->nama . '\', \'' . $temp->asal_sekolah . '\')">Hapus</a></li>
                    ';
            }*/

            //$record[] = ++$i;
            $record[] = $temp->Nomor;
            $record[] = $temp->Counter;
            $record[] = $temp->Layanan;
            $record[] = $temp->Status;
            $record[] = $temp->Tanggal;
            $time = $this->humanTiming(strtotime($temp->Layani),strtotime($temp->Selesai));
            $record[] = '<button class="btn btn-xs btn-flat btn-info" onclick="modaldetail(\''.$temp->Nomor.'\', \''.addslashes($temp->Counter).'\', \''.addslashes($temp->Layanan).'\', \''.addslashes($temp->Status).'\', \''.addslashes($time).'\')"><i class="fa fa-eye"></i> Lihat Detail</button>';

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

    function humanTiming ($mulai, $akhir) {

        $time = $akhir - $mulai; // to get the time since that moment

        $tokens = array (
            31536000 => 'tahun',
            2592000 => 'bulan',
            604800 => 'minggu',
            86400 => 'hari',
            3600 => 'jam',
            60 => 'menit',
            1 => 'detik'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'':'');
        }

    }
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

    public function antrian() {
        // data header
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        $datah['menu_antrian'] = TRUE;
        $datah['menu_report'] = TRUE;
        $datah['title'] = "Antrian";
        
        // data body
        $data['counter'] = $this->model_counter->get_counter();

        // generate view
        $this->load->view('header_view', $datah);
        $this->load->view('antrian_view', $data);
        $this->load->view('footer_view');
    }
    public function rekapantrian() {
        // notifikasi
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        $datah['menu_rekap'] = TRUE;
        $datah['menu_report'] = TRUE;
        $datah['title'] = "Rekap Antrian";

        $this->load->view('header_view', $datah);
        $this->load->view('rekap_view');
        $this->load->view('footer_view');
    }
    public function survei() {
        // notifikasi
        $datah['unreadcount'] = $this->model_notif->get_countunread()->row();
        $datah['unreadnotif'] = $this->model_notif->get_notifunread();
        $datah['menu_survei'] = TRUE;
        $datah['menu_report'] = TRUE;
        $datah['title'] = "Survei";


        $this->load->view('header_view', $datah);
        $this->load->view('survei_view');
        $this->load->view('footer_view');
    }

}