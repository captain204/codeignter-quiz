<?php
class Quiz extends CI_Controller{

public function index()
{
    $data['questions'] = $this->Question_model->getAll();
    $this->load->view('quiz\index', $data);
}

public function submit()
{
    
    $this->load->view('quiz\result');
}





}

?>