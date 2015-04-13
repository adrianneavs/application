<?php

class M_user extends CI_Model {
  function __costruct(){
      parent::__construct();
        
  }
  public function get_user(){
      return $result=$this->db->get('users');
        
  }
  public function get_users($id=FALSE){
      $this->db->where('id',$id);
      return $this->db->get('users')->row(); /*users using () is table's name*/
    
  }

  public function proseslogin(){
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));
        $query = $this->db->get('users');
        
        if ($query->num_rows() == 1){
            return true;
        } else {
            return false;
        }
        
  }

  public function prosessignup(){
      $data = array(
          'firstname' => $this->input->post('firstname'),
          'lastname' => $this->input->post('lastname'),
          'email' => $this->input->post('email'),
          'username' => $this->input->post('username'),
          'password' => $this->input->post('password'),
              'key' => $key
      );
      
      $query = $this->db->insert('users', $data);
      if ($query){
          return true;
      } else {
          return false;
      }
      
  }
   // public function delete($id=FALSE, $role=1){
    //$this->db->where('id',$id);
    //$this->db->where('role',$role);
  //  $this->db->delete('user');
    
//}

}


