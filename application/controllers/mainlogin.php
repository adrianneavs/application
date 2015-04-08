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
 
    public function index (){
        $this->loginform();
        //something with () in the end is a function
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
$currency = '$'; //Currency sumbol or code
$db_username = 'root';
$db_password = '';
$db_name = 'sample_db';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);

if(isset($_GET["emptycart"]) && $_GET["emptycart"]==1)
{
	$return_url = base64_decode($_GET["return_url"]); //return url
	session_destroy();
	header('Location:'.$return_url);
}

    if (isset($_POST["type"]) && $_POST["type"]=='add'){
        $product_code = filter_var($_POST["product_code"],FILTER_SANITIZE_STRING);
        $product_qty 	= filter_var($_POST["product_qty"], FILTER_SANITIZE_NUMBER_INT); //product code
	$return_url 	= base64_decode($_POST["return_url"]); //return url
	
	//MySqli query - get details of item from db using product code
	$results = $mysqli->query("SELECT product_name,price FROM products WHERE product_code='$product_code' LIMIT 1");
	$obj = $results->fetch_object();
	
	if ($results) { //we have the product info 
		
		//prepare array for the session variable
		$new_product = array(array('name'=>$obj->product_name, 'code'=>$product_code, 'qty'=>$product_qty, 'price'=>$obj->price));
		
		if(isset($_SESSION["products"])) //if we have the session
		{
			$found = false; //set found item to false
			
			foreach ($_SESSION["products"] as $cart_itm) //loop through session array
			{
				if($cart_itm["code"] == $product_code){ //the item exist in array

					$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$product_qty, 'price'=>$cart_itm["price"]);
					$found = true;
				}else{
					//item doesn't exist in the list, just retrive old info and prepare array for session var
					$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
				}
			}
			
			if($found == false) //we didn't find item in array
			{
				//add new user item in array
				$_SESSION["products"] = array_merge($product, $new_product);
			}else{
				//found user item in array list, and increased the quantity
				$_SESSION["products"] = $product;
			}
		}else{
			//create a new session var if does not exist
			$_SESSION["products"] = $new_product;
		}
	}//redirect back to original page
	header('Location:'.$return_url);
}
if(isset($_GET["removep"]) && isset($_GET["return_url"]) && isset($_SESSION["products"]))
{
	$product_code 	= $_GET["removep"]; //get the product code to remove
	$return_url 	= base64_decode($_GET["return_url"]); //get return url

	
	foreach ($_SESSION["products"] as $cart_itm) //loop through session array var
	{
		if($cart_itm["code"]!=$product_code){ //item does,t exist in the list
			$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
		}
		
		//create a new product list for cart
		$_SESSION["products"] = $product;
	}
	
	//redirect back to original page
	header('Location:'.$return_url);
}

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