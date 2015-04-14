<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_billing extends CI_Model {

// Get all details ehich store in "products" table in database.
    public function get_all() {
        $query = $this->db->get('products');
        return $query->result_array();
    }
public function get_user(){
    $query1 = $this->db->get('users');
        return $query1->result_array();
}
    public function get_all_user($username) {
        $query = $this->db->get_where('users', array('username' => $username));
        if ($query->num_rows() > 0) {
            $query = $query->row_array();
            $user_name = $query['username'];
            if ($username === $user_name) {
                $userdata = array('user_name' => $user_name);
                $this->session->set_userdata($userdata);
                return true;
            } else {
                return false;
            }
        }
    }

// Insert customer details in "customer" table in database.
    public function insert_customer($data) {
        $this->db->insert('customers', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

// Insert order date with customer id in "orders" table in database.
    public function insert_order($data) {
        $this->db->insert('orders', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

// Insert ordered product detail in "order_detail" table in database.
    public function insert_order_detail($data) {
        $this->db->insert('order_detail', $data);
    }

    public function insert_order_complete($data) {
        $order_detail = $this->db->get('order_detail');
        $customer = $this->db->get('customer');
        $order_complete = $this->db->insert('order_complete', $customer);
        $order_complete = $this->db->insert('order_complete', $order_detail);
        $this->db->select('(SELECT serial, name, email, address, phone FROM customers WHERE customers.serial=order_detail.orderid');
    }

    public function complete() {
        $order_detail = $this->db->get('order_detail');
        $order_complete = $this->db->insert('order_complete', $order_complete);
    }

}
