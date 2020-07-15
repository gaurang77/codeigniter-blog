<?php
class login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if(isset($_SESSION['uname'])){
            redirect('Users/welcome');
        }
    }

    public function index(){
        $data['title']='Login';
        //print_r($_SESSION);
        $this->load->view('login/header',$data);
        $this->load->view('login/loginScreen');
        $this->load->view('login/footer');        
    }
    public function valid(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('uname','username','required');
        $this->form_validation->set_rules('upass','password','required|min_length[3]');

        if($this->form_validation->run()){
            //input class from FORM helper
            $uname = $this->input->post('uname');
            $upass = $this->input->post('upass');
            $this->load->model('loginmodel');
            $id = $this->loginmodel->isvalidate($uname,$upass);
        
            if($id->id){
                //redirect is a function from 'url' helper
                //autoload the url helper 
                //$this->load->library('session');
                $_SESSION['uname']=$id->username;
                //$this->session->set_userdata('uname',$id->username);
                $this->session->set_userdata('uid',$id->id);
                //redirects to Users controller
                return redirect('Users/welcome');
            }else{
                //logic fails
                $this->session->set_flashdata('login_err','Username or Password is incorrect');
                redirect('login/index');
            }
        }else{
            //echo validation_errors();
            $this->index();
        }
    }
}
?>