<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    
    
    public function index(){
        $this->load->model('m_user');
        
        /*$this->load->library();
        $this->load->helper();
        */
        $view_data = array();
        $view_data['m_users']=$this->m_user->get_user()->result();
        $this->load->view('v_user',$view_data);
        /*echo '<pre>';
        print_r($users);
        echo '</pre>';*/
        
}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function detail($id=FALSE) {
	$this->load->model('m_user');
        
        /*    if($param1=FALSE){
                $view_data['msg'] = 'PArameter 2 is required';
            }else{*/
        $view_data = array();
        $view_data['detailuser'] = $this->m_user->get_users($id); 
        //everything in [] is up to me, it's variable name
        if (!isset($view_data['detailuser']->id)) {
          $view_data['msg']='RECORD NOT FOUND';
                } else {
                    
            }
        $this->load->view('v_user', $view_data);
	}
        /*public function profile(){
            echo 'this is profile page';
            $this->load->view('V_profile');
        }
}
*/
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
        }

?>