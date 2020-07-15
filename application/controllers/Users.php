<?php
class Users extends CI_Controller {
    //HTML helper is autoloaded to access the link_tag() inside header.php
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('uname')){
            redirect('Login');
        }
    }
    public function index(){
        redirect('users/welcome');
    }
    public function welcome(){
        //autoload the session library
        print_r($_SESSION);
        $data['title']='dashboard';
        $this->load->model('articleModel');
        $art=$this->articleModel->articleList();
        $this->load->view('users/header',$data);
        $this->load->view('users/dashboard',['articles'=>$art]);
        $this->load->view('users/footer');
    } 
    
    public function addarticle($img_err = ''){
        $data['title']='ADD_ARTICLE';
        $data['id'] = $this->session->userdata['uid'];
        $data['upload_error']= $img_err; 
        $this->load->view('users/header',$data);
        $this->load->view('users/addArticle',$data);
        $this->load->view('users/footer');
    }

    public function addArt(){
        $arr = $this->input->post();
       //print_r($arr);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('article_title','Title','required');
        $this->form_validation->set_rules('article_body','Body','required');
        $this->form_validation->set_rules('userfile','Image','required');

        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);
       // $this->upload->do_upload('userfile');  
        if ( ! $this->upload->do_upload('userfile') && 
        !$this->form_validation->run())
        {
            $error = array('error' => $this->upload->display_errors());
            $this->addarticle($error);
        }
        else
        {   $data = $this->upload->data();
            $image_path = base_url("uploads/".$data['raw_name'].
            $data['file_ext']);
            $arr['image_path'] = $image_path;
            $this->load->model('articleModel','addArt');
            $this->addArt->add($arr); 
            redirect('users/welcome');
        }
    }
    
    public function logout(){
        //requires session helper, which is autoloaded in this case
        unset($_SESSION['uname']);
        unset($_SESSION['uid']);
        redirect('login');
    }
    public function deleteArt($id){
        $this->load->model('articleModel','delArt');
        $this->delArt->delete($id);
        redirect('users/welcome');
    }
    public function editArt($id,$error=''){
        $this->load->model('articleModel','getArt');
        $arr = $this->getArt->get($id);
        $data = $arr->row();
        //loading view
        $data->upload_error= $error;
        $dat['title']='EDIT_ARTICLE';
        $this->load->view('users/header',$dat);
        $this->load->view('users/editArticle',['article'=>$data]);
        $this->load->view('users/footer');

    }

    public function updateArt(){
        $arr = $this->input->post();
        print_r($arr);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('article_title','Title','required');
        $this->form_validation->set_rules('article_body','Body',
        'required');
        if($arr['changeImage'] == "yes")
        {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            // $this->upload->do_upload('userfile');  
            if ( ! $this->upload->do_upload('userfile') && 
            !$this->form_validation->run())
            {
                $error = array('error' => $this->upload->display_errors());
                $this->editArt($arr["id"],$error);
            }
            else
            {  
                $data = $this->upload->data();
                if($data['file_name'] !== ''){
                    $image_path = base_url("uploads/".$data['raw_name'].
                    $data['file_ext']);
                    $arr['image_path'] = $image_path;
                    $this->load->model('articleModel','updateArt');
                    unset($arr['changeImage']);
                    if($this->updateArt->update($arr)){
                        redirect('users/welcome');
                    }
                }
            }           
        }else{
            if( !$this->form_validation->run()){
                $this->editArt($arr["id"]);
            }else{
                $this->load->model('articleModel','updateArt');
                unset($arr['changeImage']);
                if($this->updateArt->update($arr)){
                    redirect('users/welcome');
                }
            }            
        }    
    }
}
?>