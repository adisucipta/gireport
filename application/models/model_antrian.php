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
    
    function get_totaldata($tanggal = FALSE) {
        if($tanggal == TRUE) {
            $tanggal = mdate("%d-%m-%Y", now());
            $query = $this->db->query('SELECT count(*) as Total 
                FROM `gi_queue` 
                WHERE DATE_FORMAT(`gi_queue`.`queue_ambil`,"%d-%m-%Y") = "' . $tanggal . '"');
            return $query->row()->Total;
        } else {
            $query = $this->db->query('SELECT count(*) as Total FROM `gi_queue`');
            return $query->row()->Total;
        }
        
    }
    
    function get_total($parameter, $tanggal = FALSE) {
        if($tanggal == TRUE){ 
            $tanggal = mdate("%d-%m-%Y", now()); 
            
            $query = $this->db->query('SELECT count(*) as Total 
                FROM `gi_queue` 
                WHERE `gi_queue`.`queue_status` = "'. $parameter .'"
                    AND DATE_FORMAT(`gi_queue`.`queue_ambil`,"%d-%m-%Y") = "'. $tanggal .'"');
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
            $tanggal = mdate("%d-%m-%Y", now());
        }
            
        $query = $this->db->query('SELECT `gi_layanan`.`layanan_name` AS Layanan,
            SUM(CASE WHEN (`gi_statusantri`.`antri_status`="SELESAI") THEN 1 ELSE 0 END)AS Selesai, 
            SUM(CASE WHEN (`gi_statusantri`.`antri_status`="MENUNGGU") THEN 1 ELSE 0 END)AS Menunggu,
            SUM(CASE WHEN (`gi_statusantri`.`antri_status`="DILAYANI") THEN 1 ELSE 0 END)AS Dilayani,
            COUNT(`gi_statusantri`.`antri_status`) AS Total 
            FROM `gi_queue`,`gi_statusantri`,`gi_layanan`
            WHERE `gi_statusantri`.`antri_id` = `gi_queue`.`queue_status` 
                    AND  DATE_FORMAT(`gi_queue`.`queue_ambil`,"%d-%m-%Y") = "'. $tanggal .'"
                    AND `gi_layanan`.`layanan_id` = `gi_queue`.`queue_layanan`
                    AND `gi_layanan`.`layanan_enable` = "1"
            GROUP BY Layanan
            ORDER BY Layanan');
        return (count($query->result_array()) > 0 ? $query : NULL);
    }
    
    function get_totalcounter($tanggal = '') {
        if($tanggal == ''){ 
            $tanggal = mdate("%d-%m-%Y", now());
        }
            
        $query = $this->db->query('SELECT `gi_counter`.`counter_name` AS Counter,
            SUM(CASE WHEN (`gi_queue`.`queue_layanan`="1") THEN 1 ELSE 0 END)AS Gff, 
            SUM(CASE WHEN (`gi_queue`.`queue_layanan`="2") THEN 1 ELSE 0 END)AS Ticket,
            SUM(CASE WHEN (`gi_queue`.`queue_layanan`="3") THEN 1 ELSE 0 END)AS City,
            COUNT(`gi_queue`.`queue_layanan`) AS Total 
            FROM `gi_queue`,`gi_counter`
            WHERE `gi_counter`.`counter_id` = `gi_queue`.`queue_counter` 
                AND  DATE_FORMAT(`gi_queue`.`queue_ambil`,"%d-%m-%Y") = "'. $tanggal .'"
                AND `gi_counter`.`counter_status` = "1"
            GROUP BY Counter
            ORDER BY Counter');
        return (count($query->result_array()) > 0 ? $query : NULL);
    }
    
    function get_daftarantrian($tanggal = '',$start, $rows, $search) {
        if($tanggal == ''){ 
            $tanggal = mdate("%d-%m-%Y", now());
        }
        
        $sql = "SELECT 
            CONCAT(`gi_layanan`.`layanan_huruf`, LPAD(`gi_queue`.`queue_urutan`, 4, '0' )) AS Nomor,
            `gi_counter`.`counter_name` AS Counter,
            `gi_layanan`.`layanan_name` AS Layanan,
            `gi_statusantri`.`antri_status` AS Status,
            `gi_queue`.`queue_ambil` AS Tanggal,
            `gi_queue`.`queue_layani` AS Layani,
            `gi_queue`.`queue_selesai` AS Selesai
        FROM `gi_queue`,`gi_layanan`,`gi_counter`,`gi_statusantri`
        WHERE `gi_queue`.`queue_layanan` = `gi_layanan`.`layanan_id` 
            AND `gi_queue`.`queue_status`= `gi_statusantri`.`antri_id`
            AND `gi_queue`.`queue_counter` = `gi_counter`.`counter_id`
            AND DATE_FORMAT(`gi_queue`.`queue_ambil`,'%d-%m-%Y') = '".$tanggal."'
            AND (CONCAT(`gi_layanan`.`layanan_huruf`, LPAD(`gi_queue`.`queue_urutan`, 4, '0' )) LIKE '%".$search."%' 
                OR `gi_counter`.`counter_name` LIKE '%".$search."%' 
                OR `gi_layanan`.`layanan_name` LIKE '%".$search."%'
                OR `gi_statusantri`.`antri_status` LIKE '%".$search."%'
                OR `gi_queue`.`queue_ambil` LIKE '%".$search."%') 
        ORDER BY Tanggal DESC LIMIT ".$start.",".$rows."";
        
        return $this->db->query($sql);
    }
    
    function get_count_daftarantrian($tanggal = '', $search) {
        if($tanggal == ''){ 
            $tanggal = mdate("%d-%m-%Y", now());
        }
        
        $sql = "SELECT 
            COUNT(*) AS Total
        FROM `gi_queue`
        INNER JOIN `gi_layanan` ON (`gi_queue`.`queue_layanan` = `gi_layanan`.`layanan_id`)
        INNER JOIN `gi_counter` ON (`gi_queue`.`queue_counter` = `gi_counter`.`counter_id`)
        INNER JOIN `gi_statusantri` ON (`gi_queue`.`queue_status`= `gi_statusantri`.`antri_id`)
        WHERE 
            DATE_FORMAT(`gi_queue`.`queue_ambil`,'%d-%m-%Y') = '".$tanggal."'
            AND (CONCAT(`gi_layanan`.`layanan_huruf`, LPAD(`gi_queue`.`queue_urutan`, 4, '0' )) LIKE '%".$search."%' 
                OR `gi_counter`.`counter_name` LIKE '%".$search."%' 
                OR `gi_layanan`.`layanan_name` LIKE '%".$search."%'
                OR `gi_statusantri`.`antri_status` LIKE '%".$search."%'
                OR `gi_queue`.`queue_ambil` LIKE '%".$search."%')";
        
        return $this->db->query($sql);
    }

    function update($id, $data) {
        $this->db->where('counter_id', $id);
        $this->db->update('gi_counter', $data);
    }

    function get_layanan() {
        $this->db->select('*');
        $this->db->from('gi_layanan');
        $this->db->where('layanan_enable', "1");
        $query = $this->db->get();
        return $query;
    }

}

?>