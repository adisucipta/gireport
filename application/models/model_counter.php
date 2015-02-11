<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_counter extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($data) {
        $this->db->insert('gi_counter', $data);
    }
    
    function update($id, $data) {
        $this->db->where('counter_id', $id);
        $this->db->update('gi_counter', $data);
    }

    function delete($id) {
        $this->db->where('counter_id', $id);
        $this->db->delete('gi_counter');
    }

    function selectone($id) {
        $this->db->select('*');
        $this->db->from('gi_counter');
        $this->db->where('counter_id', $id);
        $query = $this->db->get();
        return $query;
    }
    
    function cek($parameter) {
        //$nama = $parameter['counter_name'];
        //$ip = $parameter['counter_ip'];
        
        //$query = $this->db->query('SELECT * from `gi_counter` WHERE `counter_name` = "'.$nama.'" OR `counter_ip` = "'.$ip.'"');
        $this->db->select('*');
        $this->db->from('gi_counter');
        $this->db->where($parameter);
        $query = $this->db->get();
        return $query;
    }
    
    function get_online() {
        $this->db->select('*');
        $this->db->from('gi_counter');
        $this->db->where('counter_status', "1");
        $query = $this->db->get();
        return $query;
    }
    
    function get_total($parameter) {
        $query = $this->db->query('SELECT count(*) as Total 
            FROM `gi_counter` 
            WHERE `gi_counter`.`counter_status` = "'. $parameter .'"');
        return $query->row()->Total;
    }

    function get_counter() {
        $this->db->select('*');
        $this->db->from('gi_counter');
        $this->db->where('counter_id!=',0);
        $query = $this->db->get();
        return $query;
    }
    
    function get_daftarcounter($start, $rows, $search) {
        
        $sql = "SELECT 
            `gi_counter`.`counter_id` AS ID,
            `gi_counter`.`counter_name` AS Nama,
            `gi_counter`.`counter_ip` AS IP,
            `gi_counter`.`counter_status` AS Status
        FROM `gi_counter`
        WHERE `gi_counter`.`counter_id` != 0 AND (`gi_counter`.`counter_id` LIKE '%".$search."%' 
                OR `gi_counter`.`counter_name` LIKE '%".$search."%' 
                OR `gi_counter`.`counter_ip` LIKE '%".$search."%'
                OR `gi_counter`.`counter_status` LIKE '%".$search."%') 
        ORDER BY `gi_counter`.`counter_id` LIMIT ".$start.",".$rows."";
        
        return $this->db->query($sql);
    }
    
    function get_count_daftarcounter($search) {
               
        $sql = "SELECT 
            COUNT(*) AS Total
        FROM `gi_counter`
        WHERE `gi_counter`.`counter_id` != 0 AND (`gi_counter`.`counter_id` LIKE '%".$search."%' 
                OR `gi_counter`.`counter_name` LIKE '%".$search."%' 
                OR `gi_counter`.`counter_ip` LIKE '%".$search."%'
                OR `gi_counter`.`counter_status` LIKE '%".$search."%')";
        
        return $this->db->query($sql);
    }

    function getgui() {
        $query = $this->db->query("select * from gi_guiconfig");
        return $query->row();
    }

    function updategui($data) {
        $this->db->update('gi_guiconfig', $data);
    }

}

?>