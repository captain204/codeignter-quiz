<?php
class Quiz extends CI_Controller{

    public function index()
    {
        $data['questions'] = $this->Question_model->getAll();
        $this->load->view('quiz\index', $data);
    }

    public function submit()
    {
        $result = 0;
        foreach ($_POST['questionsId'] as $question_id){
            if($this->Question_model->getAnswerIdCorrect($question_id) == $_POST['question_'.$question_id])
            {
                $result +=10;
            }
            $this->session->set_userdata('correct',$this->Question_model->getAnswerIdCorrect($question_id));
            $this->session->set_userdata('selected',$_POST['question_'.$question_id]);
        }
        // Submission check
        $submission = $this->Submission_model->get_by_id($this->session->userdata('id'));
        if(!$submission)
        {
            $data = array(
                'user_id'=>$this->session->userdata('id'),
                'score'=>$result,
            );
            $this->Submission_model->insert($data);
        }
        
        $data['submission'] = $submission;
        $data['questions'] = $this->Question_model->getAll();
        $data['result'] =$result;
        $this->load->view('quiz\result',$data);
    }





}

?>