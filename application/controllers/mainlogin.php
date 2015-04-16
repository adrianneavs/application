<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>

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
            $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|callback_validate_credentials');
            $this->form_validation->set_rules('password', 'Password', 'required|md5|trim');


            if ($this->form_validation->run()) {



//                $this->session->set_userdata($data);
//                $data1['welcome'] = $this->session->userdata('username');
//                $data2['username'] = $username;
//                $this->load->view('v_shop', $data1);

                redirect('mainlogin/index');
            } else {
                redirect('mainlogin/loginform');
            }
        }

        public function getusername() {
            
        }

        public function signup_valid() {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|max_length[30]');
            $this->form_validation->set_rules('firstname', 'Firstname', 'required|alpha');
            $this->form_validation->set_rules('lastname', 'Lastname', 'required|alpha');
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');

            if ($this->form_validation->run()) {
                ?><div class ="col-md-4"></div>
                <div class ="col-md-4">
                    <div class="alert alert-success" role="alert">Succeed! Thanks for signing up</div>
                    <p>now <a href = '<?php echo base_url() . "mainlogin/loginform"; ?>'>Login</a>
                </div>
                <div class ="col-md-4"></div>
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
                echo "no";
                $this->load->view('v_signup');
            }
        }

        public function validate_credentials() {
            $this->load->model('m_billing');

            if ($this->m_billing->proseslogin()) {
                return true;
            } else {
                $this->form_validation->set_message('validate_credentials', 'PLEASE enter correct username and password');
                return false;
            }
        }

        public function userlogout() {
            $this->session->sess_destroy();
            redirect('mainlogin/loginform');
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
            if ($this->session->userdata('is_logged_in')) {
                $username = $this->input->post('username');
                $data = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                );
                $this->m_billing->profile($username, $data);
                $this->show_username();
                $this->load->view('v_profile');
            }
//         else {
//        $this->load->view('404_page');
//        }
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
            if ($this->session->userdata('is_logged_in')) {
//                $data1['userdetail'] = $this->m_billing->get_all_user();
//                $this->load->view('v_shop', $data1);
//                }
//                else {
//                    echo "";
//                }
//                $data1['username'] = $this->m_billing->get_username();
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
            if ($this->session->userdata('is_logged_in')) {
// Load "billing_view".
                $this->load->view('v_billing');
            } else {
                redirect('mainlogin/tocontinue');
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
    ?>
</html>