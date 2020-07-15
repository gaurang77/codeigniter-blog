<?php
class articleModel extends CI_Model{

  public function articleList(){
    $userID = $this->session->userdata['uid'];
    $q=$this->db->select('*')->from('articles')
    ->where(['user_id'=>$userID])->get();
    return $q->result();
  }

  public function add($arr){
    $this->db->insert('articles',$arr);
  }
  
  public function delete($id){
    $this->db->where('id',$id)
    ->delete('articles');
  }
  
  public function get($id){
    //$this->db->get_where('articles',array('id'=>$id));
    return $this->db->select()->where('id',$id)->get('articles');
  }

  public function update($arr){
    //echo $arr['id'];
    return $this->db->where('id',$arr['id'])->update('articles',$arr);
  }
}