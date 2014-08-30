<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_antrian extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function selectone($id) {
        $this->db->select('*');
        $this->db->from('gi_queue');
        $this->db->where('queue_id', $id);
        $query = $this->db->get();
        return $query;
    }
    
    function get_totaldata() {
        $today = date("d-m-Y H"); 
        $query = $this->db->query('SELECT count(*) as Total 
            FROM `gi_queue` 
            WHERE DATE_FORMAT(`gi_queue`.`queue_tanggal`,"%d-%m-%Y %H") = "'. $today .'"');
        return $query;
    }
    
    function get_total($parameter, $tanggal = FALSE) {
        if($tanggal == TRUE){ 
            $tanggal = mdate("%d-%m-%Y", gmt_to_local(now(), "UP5")); 
            
            $query = $this->db->query('SELECT count(*) as Total 
                FROM `gi_queue` 
                WHERE `gi_queue`.`queue_status` = "'. $parameter .'"
                    AND DATE_FORMAT(`gi_queue`.`queue_tanggal`,"%d-%m-%Y") = "'. $tanggal .'"');
            return $query->row()->Total;
        }else{
            $query = $this->db->query('SELECT count(*) as Total 
                FROM `gi_queue` 
                WHERE `gi_queue`.`queue_status` = "'. $parameter .'"');
            return $query->row()->Total;
        }
    }
    
    function get_totalayanan($tanggal = '') {
        if($tanggal == ''){ 
            $tanggal = mdate("%d-%m-%Y", gmt_to_local(now(), "UP5"));
        }
            
        $query = $this->db->query('SELECT `gi_layanan`.`layanan_name` AS Layanan,
            SUM(CASE WHEN (`gi_statusantri`.`antri_status`="SELESAI") THEN 1 ELSE 0 END)AS Selesai, 
            SUM(CASE WHEN (`gi_statusantri`.`antri_status`="MENUNGGU") THEN 1 ELSE 0 END)AS Menunggu,
            SUM(CASE WHEN (`gi_statusantri`.`antri_status`="DILAYANI") THEN 1 ELSE 0 END)AS Dilayani,
            COUNT(`gi_statusantri`.`antri_status`) AS Total 
            FROM `gi_queue`,`gi_statusantri`,`gi_layanan`
            WHERE `gi_statusantri`.`antri_id` = `gi_queue`.`queue_status` 
                    AND  DATE_FORMAT(`gi_queue`.`queue_tanggal`,"%d-%m-%Y") = "'. $tanggal .'"
                    AND `gi_layanan`.`layanan_id` = `gi_queue`.`queue_layanan`
            GROUP BY Layanan
            ORDER BY Layanan');
        return (count($query->result_array()) > 0 ? $query : NULL);;
    }
    
    function get_totalcounter($tanggal = '') {
        if($tanggal == ''){ 
            $tanggal = mdate("%d-%m-%Y", gmt_to_local(now(), "UP5"));
        }
            
        $query = $this->db->query('SELECT `gi_counter`.`counter_name` AS Counter,
            SUM(CASE WHEN (`gi_queue`.`queue_layanan`="1") THEN 1 ELSE 0 END)AS Gff, 
            SUM(CASE WHEN (`gi_queue`.`queue_layanan`="2") THEN 1 ELSE 0 END)AS Ticket,
            SUM(CASE WHEN (`gi_queue`.`queue_layanan`="3") THEN 1 ELSE 0 END)AS City,
            COUNT(`gi_queue`.`queue_layanan`) AS Total 
            FROM `gi_queue`,`gi_counter`
            WHERE `gi_counter`.`counter_id` = `gi_queue`.`queue_counter` 
                AND  DATE_FORMAT(`gi_queue`.`queue_tanggal`,"%d-%m-%Y") = "'. $tanggal .'"
                AND `gi_counter`.`counter_status` = "1"
            GROUP BY Counter
            ORDER BY Counter');
        return (count($query->result_array()) > 0 ? $query : NULL);;
    }

    function update($id, $data) {
        $this->db->where('counter_id', $id);
        $this->db->update('gi_counter', $data);
    }

    function get_layanan() {
        $this->db->select('*');
        $this->db->from('gi_layanan');
        $query = $this->db->get();
        return $query;
    }

}

?>