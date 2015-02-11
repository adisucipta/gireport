<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_user extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_login_info($username) {
        $query = $this->db->query('SELECT 
            gi_user.user_id, gi_user.user_name, gi_user.user_pass, gi_user.user_role, gi_user.user_data, gi_role.role_name AS rolename
            FROM gi_user
            INNER JOIN gi_role ON (gi_user.user_role = gi_role.role_id)
            WHERE gi_user.user_name = "' . $username . '"
            LIMIT 1');
        //$this->db->where('username', $username);
        //$this->db->limit(1);
        //$query = $this->db->get('user');
        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }
    
    function get_role() {
        $this->db->select('*');
        $this->db->from('gi_role');
        $query = $this->db->get();
        return $query;
    }
    
    function cek($parameter) {
        $this->db->select('*');
        $this->db->from('gi_user');
        $this->db->where($parameter);
        $query = $this->db->get();
        return $query;
    }

    function insert($data) {
        $this->db->insert('gi_user', $data);
    }

    function delete($id) {
        $this->db->where('user_id', $id);
        $this->db->delete('gi_user');
    }

    function reset($data) {
        $this->db->select('*');
        $this->db->from('gi_user');
        $this->db->where($data);
        $query = $this->db->get();
        return (count($query->row_array()) > 0 ? $query : NULL);;
    }

    function update($id, $data) {
        $this->db->where('user_id', $id);
        $this->db->update('gi_user', $data);
    }

    function get_user($id = 0) {
        if($id == 0) {
            $this->db->select('gi_user.*, gi_role.role_name AS rolename');
            $this->db->from('gi_user');
            $this->db->join('gi_role', 'gi_user.user_role = gi_role.role_id');
            $query = $this->db->get();
            return $query;
        } else {
            $this->db->select('gi_user.*, gi_role.role_name AS rolename');
            $this->db->from('gi_user');
            $this->db->join('gi_role', 'gi_user.user_role = gi_role.role_id');
            $this->db->where('user_id',$id);
            $query = $this->db->get();
            return $query->row();
        } 
        
    }
    
    function get_daftaruser($start, $rows, $search) {
        
        $sql = "SELECT 
            `gi_user`.`user_id` AS ID,
            `gi_user`.`user_name` AS Username,
            `gi_user`.`user_data` AS Nama,
            `gi_user`.`user_created` AS Dibuat,
            `gi_role`.`role_name` AS Role,
            REPLACE(REPLACE(`gi_user`.`user_status`,'0','OFF'),'1','ON') AS Status
        FROM `gi_user` 
        INNER JOIN `gi_role` ON (`gi_user`.`user_role` = `gi_role`.`role_id`)
        WHERE `gi_user`.`user_id` LIKE '%".$search."%' 
                OR `gi_user`.`user_name` LIKE '%".$search."%' 
                OR `gi_user`.`user_data` LIKE '%".$search."%'
                OR REPLACE(REPLACE(`gi_user`.`user_status`,'0','OFF'),'1','ON') LIKE '%".$search."%'
                OR `gi_user`.`user_created` LIKE '%".$search."%'
                OR `gi_role`.`role_name` LIKE '%".$search."%'
        ORDER BY `gi_user`.`user_id` LIMIT ".$start.",".$rows."";
        
        return $this->db->query($sql);
    }
    
    function get_count_daftaruser($search) {
               
        $sql = "SELECT 
            COUNT(*) AS Total
        FROM `gi_user` 
        INNER JOIN `gi_role` ON (`gi_user`.`user_role` = `gi_role`.`role_id`)
        WHERE `gi_user`.`user_id` LIKE '%".$search."%' 
                OR `gi_user`.`user_name` LIKE '%".$search."%' 
                OR `gi_user`.`user_data` LIKE '%".$search."%'
                OR REPLACE(REPLACE(`gi_user`.`user_status`,'0','OFF'),'1','ON') LIKE '%".$search."%'
                OR `gi_user`.`user_created` LIKE '%".$search."%'
                OR `gi_role`.`role_name` LIKE '%".$search."%'";
        
        return $this->db->query($sql);
    }

    function getusercomp($q){
        $this->db->select('*');
        $this->db->like('user_name', $q);
        $query = $this->db->get('gi_user');
        
        if($query->num_rows > 0){
            foreach ($query->result_array() as $row){
                $new_row['label']=htmlentities(stripslashes($row['user_name']));
                $new_row['value']=htmlentities(stripslashes($row['user_id']));
                $row_set[] = $new_row; //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }

}

?>