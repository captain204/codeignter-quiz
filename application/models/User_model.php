<?php

class User_model extends CI_Model
 {


    function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('users')->row();
    }
   
    // insert data
    function insert($data)
    {
        $this->db->insert('users', $data);
    }

    public function login($name,$reg_id){

        $this->db->where('name',$name);
        $query = $this->db->get('users');
        $result = $query->row_array();
        if(!empty($result)){
            return $result;
        }else{

            return false;
        }

    }




}






?>