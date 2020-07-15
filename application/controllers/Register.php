<?php
class Register extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('uname')){
            redirect('Users/welcome');
        }
    }

    public function index($error=null){
        $data['title']='Register';
        $regi['error']=$error;
        $this->load->view('login/header',$data);
        $this->load->view('login/register',$regi);
        $this->load->view('login/footer'); 
    }

    public function check(){
        $this->load->library('form_validation');
        $this->form_validation->
        set_rules('firstname','firstname','required|alpha');
        $this->form_validation->
        set_rules('lastname','lastname','required|alpha');
        $this->form_validation->
        set_rules('username','username','required|max_length[7]|is_unique[users.username]',
        array('is_unique'=>
        'Username already exists, create a diiferent username')
        );
        $this->form_validation->
        set_rules('password','password','required|min_length[3]');
        $this->form_validation->
        set_rules('passwordC','password','required|min_length[3]');

        if($this->form_validation->run()){
            $post_array =  $this->input->post();
            if($post_array['password']!= $post_array['passwordC'] ){
                $error = 'passwords do not match';
                $this->index($error);
            }else{
                $this->load->model('loginmodel');
                unset($post_array['passwordC']);
                $this->loginmodel->addUser($post_array);

            }
        }else{
            //echo "<pre>";
            //print_r($this->form_validation->error_array());
            $this->index();
        }
    }
}