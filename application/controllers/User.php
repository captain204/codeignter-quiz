<?php
class User extends CI_Controller{


    public function index()
    {
        $this->form_validation->set_rules('name','FullName','trim|required|min_length[4]');
        $this->form_validation->set_rules('reg_id','RegestrationID','trim|required|min_length[8]|max_length[8]');
        $name = $this->input->post('name');
        $reg_id = $this->input->post('reg_id');
        if($this->form_validation->run()==false){
            $this->load->view('users/login'); 
        }else{

        $user = $this->User_model->login($name,$reg_id);

        //Vallidating users data
        if($user){
            $result = $this->User_model->get_by_id($user['id']);
            $this->session->set_userdata('name',$result->name);
            $this->session->set_userdata('id',$result->id);
            $this->session->set_userdata('reg_id',$result->reg_id);
            $this->session->set_flashdata('login','You are currently logged in');
            redirect('quiz');      
                     
        }   else{
        // Set login error
            $this->session->set_flashdata('login_failed','Invalid  name or registration id');
            redirect('user');
        }

      }


    }



    public function CreateID(){ 

        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[25]');
        if ($this->form_validation->run()==false) {
                $this->load->view('users/create');            
        } else{
            //Generate 6 digit random number
            $random_number = mt_rand(100000,999999);
            $reg_id = 'ID'.$random_number;
            $data = array(
                'name'=>$this->input->post('name'),
                'reg_id'=>$reg_id,
            );

            $this->User_model->insert($data);
            $this->session->set_userdata('reg_id',$reg_id); 
            $this->session->set_flashdata('created','Your registeration Id has been generated');
            redirect('user/index');
            
        }

    }


    public function login(){
        
        $this->form_validation->set_rules('name','FullName','trim|required|min_length[4]');
        $this->form_validation->set_rules('reg_id','RegestrationID','trim|required|min_length[6]|max_length[6]');
        $name = $this->input->post('name');
        $reg_id = $this->input->post('reg_id');
        if($this->form_validation->run()==false){
            $this->load->view('users/login'); 
        }else{

        $user = $this->User_model->login($name,$reg_id);

        //Vallidating users data
        if($user){

            $result = $this->User_model->get_by_id($user['id']);
            $this->session->set_userdata('name',$result->name);
            $this->session->set_userdata('id',$result->id);
            $this->session->set_userdata('reg_id',$result->reg_id);
            $this->session->set_flashdata('login','You are currently logged in');
            redirect('quiz');
            
                     
        }   else{
        // Set login error
            $this->session->set_flashdata('fail','Invalid  name or registration id');
            redirect('user');
        }

    }
}

public function logout(){

    $this->session->unset_userdata('name');
    $this->session->unset_userdata('id');
    $this->session->unset_userdata('reg_id');
    $this->session->sess_destroy();
    redirect('user');
}






}

?>