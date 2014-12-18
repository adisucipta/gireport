<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_notif extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->CI = get_instance();
    }
    
    function insert($data) {
        $this->db->insert('gi_notif', $data);
    }

    function delete($id) {
        $this->db->where('user_id', $id);
        $this->db->delete('gi_notif');
    }

    function selectone($id) {
        $this->db->select('*');
        $this->db->from('gi_notif');
        $this->db->where('notif_id', $id);
        $query = $this->db->get();
        return $query;
    }

    function update($id, $data) {
        $this->db->where('notif_id', $id);
        $this->db->update('gi_notif', $data);
    }
    
    function updatebaca() {
        $this->db->query('UPDATE `gi_notif`
            SET `notif_baca`="1"
            WHERE `notif_baca`="0"');
//        $data = array(
//            'notif_baca' => '1'
//        );
//        $this->db->update('gi_notif', $data, "notif_baca = '0'");
    }

    function get_notif() {
        $today = date("d-m-Y"); 
        $query = $this->db->query('SELECT `gi_notif`.`notif_id`,`gi_notif`.`notif_teks`,`gi_notif`.`notif_tanggal`,`gi_notiftipe`.`tipe_nama` 
            FROM `gi_notif`,`gi_notiftipe`
            WHERE `gi_notif`.`notif_tipe` = `gi_notiftipe`.`tipe_id`
                AND DATE_FORMAT(`gi_notif`.`notif_tanggal`,"%d-%m-%Y") = "'. $today .'" 
            ORDER BY `gi_notif`.`notif_tanggal` DESC');
        return $query;
    }
    
    function get_notifunread() {
        $query = $this->db->query('SELECT `gi_notif`.`notif_teks`,`gi_notiftipe`.`tipe_nama` 
            FROM `gi_notif`,`gi_notiftipe` 
            WHERE `gi_notif`.`notif_tipe` = `gi_notiftipe`.`tipe_id`
            ORDER BY `notif_tanggal` DESC 
            LIMIT 0,5');
        return $query;
    }
    
    function get_tipe($id) {
        $this->db->select('tipe_nama');
        $this->db->from('gi_notiftipe');
        $this->db->where('tipe_id', $id);
        $query = $this->db->get();
        return $query;
    }
    
    function get_count() {
        $this->db->select('count(*) as Total');
        $this->db->from('gi_notif');
        $query = $this->db->get();
        return $query;
    }
    
    function get_countunread() {
        $this->db->select('count(*) as Total');
        $this->db->from('gi_notif');
        $this->db->where('notif_baca', "0");
        $query = $this->db->get();
        return $query;
    }

}

?>