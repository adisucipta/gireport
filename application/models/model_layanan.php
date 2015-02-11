<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_layanan extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($data) {
        $this->db->insert('gi_layanan', $data);
    }
    
    function update($id, $data) {
        $this->db->where('layanan_id', $id);
        $this->db->update('gi_layanan', $data);
    }

    function delete($id) {
        $this->db->where('layanan_id', $id);
        $this->db->delete('gi_layanan');
    }

    function getall() {
        $this->db->select('*');
        $this->db->from('gi_layanan');
        $query = $this->db->get();
        return $query;
    }
    

}

?>