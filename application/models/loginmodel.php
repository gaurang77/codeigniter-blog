<?php 
class loginmodel extends CI_Model{
    //autoload "database" library 
    //$this->db is only accesible when "database" library worrks
    public function isvalidate($username,$password){
       $q = $this->db->where(['username'=>$username,'password'=>$password])
        ->get('users');
        if($q->num_rows()){
            return $q->row();
        }else{
            return false;
        }
    }
    // public function __construct(){
    //     parent::construct();
    //     $this->load->library('database');
    // }
    public function addUser($arr){
        $query = $this->db->insert('users',$arr);
        if($this->db->affected_rows()==1){
            $this->session->set_flashdata('login','user added succesfullly now Log-In');
            redirect('login/index');
        }else{
            echo "error:soemthing wrong with the database";
        }
    }
    
}
