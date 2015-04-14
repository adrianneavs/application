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

    public function proseslogin() {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
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

    public function profile($username = null) {
        if ($this->session->userdata('username')) {
            $username = $this->session->userdata('username');
            $query = $this->db->get('users');
//          $userquery = $this->db->select('username');
            $userquery = $this->db->select("SELECT username FROM users where users.username = '$username'");
            if ($userquey->num_rows() > 1) {
                return $userquery->result();
            }
        }
//      
//      
//        if ($username == null) {
//            $query = $this->db->get('users');
//        } else {
//            $query = $this->db->get_where('users', ['username' => $username]);
//        }
//        return $query->result();
//    }
    }

    // public function delete($id=FALSE, $role=1){
    //$this->db->where('id',$id);
    //$this->db->where('role',$role);
    //  $this->db->delete('user');
//}



    

}
