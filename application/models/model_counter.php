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

    function delete($id) {
        $this->db->where('counter_id', $id);
        $this->db->delete('gi_user');
    }

    function selectone($id) {
        $this->db->select('*');
        $this->db->from('gi_counter');
        $this->db->where('counter_id', $id);
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

    function update($id, $data) {
        $this->db->where('counter_id', $id);
        $this->db->update('gi_counter', $data);
    }

    function get_counter() {
        $this->db->select('*');
        $this->db->from('gi_counter');
        $query = $this->db->get();
        return $query;
    }

}

?>