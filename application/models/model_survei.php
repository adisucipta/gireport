<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_survei extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($data) {
        $this->db->insert('gi_customersurv', $data);
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
    
    function get_total($tanggal = FALSE) {
        if($tanggal == TRUE){ 
            $parameter = date("d-m-Y"); 
            $query = $this->db->query('SELECT count(DISTINCT `customer_id`) as Total 
                FROM `gi_customersurv` 
                WHERE DATE_FORMAT(`gi_customersurv`.`tanggal`,"%d-%m-%Y") = "'. $parameter .'"');
            return $query->row()->Total;
        } else {
            $query = $this->db->query('SELECT count(DISTINCT `customer_id`) as Total FROM `gi_customersurv`');
            return $query->row()->Total;
        }
        
    }

    function get_survei() {
        $this->db->select('*');
        $this->db->from('gi_counter');
        $query = $this->db->get();
        return $query;
    }

}

?>