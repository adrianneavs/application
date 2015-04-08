<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


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
 public function __construct()
   {
        parent::__construct();
    }

    public function index (){
        $this->loginform();
        
        //something with () in the end is a function
}

public function indexproduct(){
    $view_data = array();
        //load  m_products model
        $this->load->model('m_products');

        //past products data to view
        $view_data['products'] = $this->m_products->get_products();
        
        //call view
        $this->load->view('v_products', $view_data);
}
 public function loginform (){
        $this->load->view('v_login');
}

public function order (){
    //$this->load->view('v_members');
    if ($this->session->userdata('is_logged_in')){
        $this->load->view('v_food');
    } else {
        redirect('mainlogin/restricted');
    }
    
}

public function cart_update(){
$view_data = array();
        //load  m_products model
        $this->load->model('m_products');

        //past products data to view
        $view_data['products'] = $this->m_products->get_products();
        
        //call view
        $this->load->view('v_products', $view_data);
    }

public function confirm(){
    if ($this->session->userdata('is_logged_in')){
        $this->load->view('v_confirm');
    } else {
        redirect('mainlogin/restricted');
    }
}

public function restricted(){
    $this->load->view('v_restricted');
}

public function login_valid(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username','Username', 
            'required|trim|xss_clean|callback_validate_credentials');
    $this->form_validation->set_rules('password','Password', 'required|md5|trim');
    
    if ($this->form_validation->run()){
        $data = array(
            'username' => $this->input->post('username'), 'is_logged_in' => 1
        );
        $this->session->set_userdata($data);
        redirect('mainlogin/order');
    } else {
        $this->load->view('v_login');
    }
}

public function signup_valid(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email','Email', 
            'required|trim|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password','Password', 'required|trim|min_length[6]|max_length[30]');
    $this->form_validation->set_rules('firstname','Firstname', 'required|alpha');
    $this->form_validation->set_rules('lastname','Lastname', 'required|alpha');
    $this->form_validation->set_rules('username','Username', 
            'required|trim|is_unique[users.username]');
    
  
    if ($this->form_validation->run()){
$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/send
    mail';
$this->email->initialize($config);        
//generate random key
        $key = md5(uniqid());
        $email = $this->input->post('email');
        $this->load->library('email');
        //$email = $this->session->userdata('email');
        //$email_code = $this->email_code;
        $this->load->model('m_user');
        
        $this->email->set_mailtype('html');
        $this->email->from('admin@orenjiebi.com', "Admin");
        $this->email->to($email);
        $this->email->subject('Confirm your account');
        
        $message = "<p>Thanks a bunch of love for signing up.</p>";
        $message .= "<p><a href='".base_url()."main/register_user/$key'>Click me</a> to confirm your account</p>";
                     
        $this->email->message($message);
        
        if ($this->m_user->prosessignup($key)){
        if ($this->email->send()){
        echo "email has been sent";
        print_r ($this->load->view('v_login'));
        } else echo "email cannot be sent";
         } else echo "failed add to database";
        
        
    } else {
  $this->load->view('v_signup');
    }
    //if ($this->form_validation->run()){
      //  echo "yes";
    //}else {
      //  echo "no";
        //$this->load->view('v_signup');
    //}
    
}

public function validate_credentials(){
    $this->load->model('m_user');
    
    if ($this->m_user->proseslogin()){
        return true;
        } else {
            $this->form_validation->set_message('validate_credentials', 'PLEASE enter correct username and password');
            return false;
        }
    
}

public function userlogout(){
    $this->session->sess_destroy();
    redirect('mainlogin/loginform');
}

public function signup(){
    $this->load->view('v_signup');
}
//public function hi (){
  //  $this->load->model('m_user');
        
        /*    if($param1=FALSE){
                $view_data['msg'] = 'PArameter 2 is required';
            }else{*/
    //    $view_data = array();
      //  $view_data['detailuser'] = $this->m_user->get_users($username); 
        //$this->load->view('v_members', $view_data);
//}
//put your code here
}
?>