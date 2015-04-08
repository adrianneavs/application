<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_order
 *
 * @author haha
 */
class M_order extends CI_Model {
public function get_order(){
      return $result=$this->db->get('order');
        
  }        
//put your code here
}
