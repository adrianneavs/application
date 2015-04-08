<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of shop
 *
 * @author haha
 */
class Buy extends CI_Controller{
    public function buyhome(){
        $this->load->view('v_food');
    }
    public function pay(){
        $this->load->view('v_pay');
        
    }
}
