<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author haha
 */
class Mainlogin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_billing');
        $this->load->library('cart');
    }

    public function halamanutama() {
        $this->loginform();

        //something with () in the end is a function
    }

    public function cart() {
        parent::Controller();
        $this->load - model('m_products');
    }

    public function indexproduct() {
        $data['products'] = $this->load->model('m_products')->update_prod();
        print_r($data['products']);
    }

    public function loginform() {
        $this->load->view('v_login');
    }

    public function restricted() {
        $this->load->view('v_restricted');
    }

    public function tocontinue() {
        $this->load->view('v_continue');
    }

    public function login_valid() {
        $this->load->library('form_validation');
        $this->load->model('m_user');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean|callback_check_database');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('v_login');
        } else {
            redirect('mainlogin/index');
        }
    }

    public function getusername() {
        
    }
public function signupy(){
    $this->load->view('v_signupy');
}
    public function signup_valid() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|max_length[30]');
        $this->form_validation->set_rules('firstname', 'Firstname', 'required|alpha');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required|alpha');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');
//            $this->form_validation->set_rules('address', 'Address', 'required');
//            $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');

        if ($this->form_validation->run()) {
            $this->load->view('v_signupy');
            ?>
            
                
            <?php
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
        } else {
            $this->load->view('v_signup');
        }
    }

    public function check_database($password) {
        $username = $this->input->post('username');
        $result = $this->m_user->proseslogin($username, $password);
        $view_data = array();
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username,
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('validate_credentials', 'Invalid username or password');
            return FALSE;
        }
    }

    public function userlogout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('loginform', 'refresh');
    }

    public function signup() {
        $this->load->view('v_signup');
    }

    public function show_username() {
        $username = $this->uri->segment(3);
        $data['userdata'] = $this->m_billing->get_user();
        $data['userdata1'] = $this->m_billing->show_username($username);
        $this->load->view('v_profile', $data);
    }

    public function profile() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];

            $this->load->model('m_user');
            $users = $this->m_user->get();

            $this->load->view('v_profile', $data);
        }
    }

    public function updateprofile() {

        $id = $this->uri->segment(3);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname', 'Firstname', 'required|callback_alpha_rules');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required|callback_alpha_rules');
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[10]|callback_valid_id');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]|callback_verifiedlogin');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->updateform();
        } else {

            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
            );
            $this->db->where('username', $username);
            $this->db->update('users', $data);
            redirect('mainlogin/updated');
        }
    }

    public function updated() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];

            $data['products'] = $this->m_billing->get_all();
            echo "profile updated";
            $this->load->view('v_shop', $data);

//                $this->load->view('v_shop', $data1);
        } else {
            redirect('mainlogin/restricted');
        }
    }

//                
//                $id = $this->input->post('aidi');
//                $data = array(
//                    'firstname' => $this->input->post('firstname'),
//                    'lastname' => $this->input->post('lastname'),
//                    'email' => $this->input->post('email'),
//                    'username' => $this->input->post('username'),
//                    'password' => $this->input->post('password')
//                );
//
//                $this->m_billing->edituser($id,$data);
//                $this->profile();


    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];

            $data['products'] = $this->m_billing->get_all();
            //$this->load->view('v_billing', $data);
            //send all product data to "v_shop", which fetch from database.		
            $this->load->view('v_shop', $data);

//                $this->load->view('v_shop', $data1);
        } else {
            redirect('mainlogin/restricted');
        }
    }

    function add() {
        // Set array for send data.
        $insert_data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'qty' => 1,
        );

        // This function add items into cart.
        $this->cart->insert($insert_data);
//
//                $customer = array(
//                    'name' => $this->input->post('name'),
//                    'email' => $this->input->post('email'),
//                    'address' => $this->input->post('address'),
//                    'phone' => $this->input->post('phone')
//                );
//                // And store user imformation in database.
//                $cust_id = $this->m_billing->insert_customer($customer);
//
//                $order = array(
//                    'date' => date('Y-m-d'),
//                    'customerid' => $cust_id
//                );
//
//                $ord_id = $this->m_billing->insert_order($order);
        // This will show insert data in cart.
        redirect('mainlogin/index');
    }

    function remove($rowid) {
        // Check rowid value.
        if ($rowid === "all") {
            // Destroy data which store in  session.
            $this->cart->destroy();
        } else {
            // Destroy selected rowid in session.
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            // Update cart data, after cancle.
            $this->cart->update($data);
        }

        // This will show cancle data in cart.
        redirect('mainlogin/index');
    }

    public function deleteorder($prd_id = "", $id = "", $rowid = "") {
        $this->db->delete('order_detail', array('orderid' => $id, 'productid' => $prd_id));
        $updatedata = array(
            'rowid' => $rowid,
            'qty' => 0
        );

        // This function add items into cart.
        $this->cart->update($updatedata);

        $this->load->view('v_success', array('orderid' => $id));
    }

    function update_cart() {

        // Recieve post values,calcute them and update
        $cart_info = $_POST['cart'];
        foreach ($cart_info as $id => $cart) {
            $rowid = $cart['rowid'];
            $price = $cart['price'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];

            $data = array(
                'rowid' => $rowid,
                'price' => $price,
                'amount' => $amount,
                'qty' => $qty
            );

            $this->cart->update($data);
        }
        redirect('mainlogin/index');
    }

    function billing_view() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
//                    $this->load->library('form_validation');
//                    $this->form_validation->set_rules('qty', 'required|integer');
//                    if ($this->form_validation->run() == TRUE) {

            $this->load->view('v_billing', $data);
//                    }
        } else {
            redirect('mainlogin/restricted');
        }
    }

    public function complete_order() {
        $complete = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'qty' => 1
        );
    }

    public function save_order() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('custname', 'Name', 'required|alpha|trim');
            $this->form_validation->set_rules('address', 'Address', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|alpha|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required|integer');
            //            $this->form_validation->set_rules('address', 'Address', 'required');
//            $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');

            if ($this->form_validation->run()) {

// This will store all values which inserted  from user.
                $customer = array(
                    'name' => $this->input->post('custname'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone')
                );
                // And store user imformation in database.
                $cust_id = $this->m_billing->insert_customer($customer);

                $order = array(
                    'date' => date('Y-m-d'),
                    'customerid' => $cust_id
                );

                $ord_id = $this->m_billing->insert_order($order);

                if ($cart = $this->cart->contents()):
                    foreach ($cart as $item):
                        $order_detail = array(
                            'orderid' => $ord_id,
                            'productid' => $item['id'],
                            'quantity' => $item['qty'],
                            'price' => $item['price']
                        );

                        // Insert product imformation with order detail, store in cart also store in database. 

                        $cust_id = $this->m_billing->insert_order_detail($order_detail);
                    endforeach;
                endif;

                // After storing all imformation in database load "billing_success".
                $this->load->view('v_success', array('orderid' => $ord_id)); //pass order id to view
            }
        }
    }

    public function checkout() {
        $this->load->view('v_checkout');
    }

}
?>
