<?php

class Submission_model extends CI_Model
{


    function get_by_id($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->get('submission')->row();
    }
   
    // insert data
    function insert($data)
    {
        $this->db->insert('submission', $data);
    }











}