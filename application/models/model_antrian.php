<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_user extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($data) {
        $this->db->insert('gi_user', $data);
    }

    function delete($id) {
        $this->db->where('user_id', $id);
        $this->db->delete('gi_user');
    }

    function selectone($id) {
        $this->db->select('*');
        $this->db->from('gi_user');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query;
    }

    function update($id, $data) {
        $this->db->where('user_id', $id);
        $this->db->update('gi_user', $data);
    }

    function get_user() {
        $this->db->select('*');
        $this->db->from('gi_user');
        $query = $this->db->get();
        return $query;
    }

}

?>