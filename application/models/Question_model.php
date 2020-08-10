<?php

class Question_model extends CI_Model
{
    
    public function getAll()
    {
        
        return $this->db->get('question')->result();
    }


    public function getAnswerByQuestion($question_id)
    {
        $this->db->where('question_id',$question_id);
        return $this->db->get('answer')->result();
    }
    

    public function getAnswerIdCorrect($question_id)
    {
        $this->db->where('question_id',$question_id);
        $this->db->where('correct',1);
        return $this->db->get('answer')->row()->id;
    }









}






?>