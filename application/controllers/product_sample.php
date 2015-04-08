<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @copyright Copyright (c) 2015 Kreydle Sdn Bhd
 * Description of account
 *
 * @author Kreydle Sdn Bhd <help@kreydle.com>
 * @version 4.0
 * @since Apr 8, 2015
 */
class Product_sample extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $view_data = array();
        //load  m_products model
        $this->load->model('m_products');

        //past products data to view
        $view_data['products'] = $this->m_products->get_products();
        
        //call view
        $this->load->view('v_products', $view_data);
    }

}
