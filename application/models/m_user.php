<?php

class M_user extends CI_Model {

    public function get_all() {
        $query1 = $this->db->get('users');
        return $query1->result_array();
    }

    public function get_user() {
        return $result = $this->db->get('users');
    }

    public function get_users($id = FALSE) {
        $this->db->where('id', $id);
        return $this->db->get('users')->row(); /* users using () is table's name */
    }

    public function proseslogin($username, $password) {
        $this->db->select('username', 'password');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function prosessignup() {
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        $query = $this->db->insert('users', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//    public function displayup($username=null) {
//
//        if($username == null ){
//            $query = $this->db->get('users');
//        }
//        else {
//            $query = $this->db->get_where('username', ['username'=>$username]);
//        }
//        return $query -> result();
//    }


    public function get($id = null) {
        if ($id == null) {
            $query = $this->db->get('users');
        } else {
            $query = $this->db->get_where('users', ['id' => $id]);
        }
        return $query->result();
    }

    // public function delete($id=FALSE, $role=1){
    //$this->db->where('id',$id);
    //$this->db->where('role',$role);
    //  $this->db->delete('user');
//}
}
