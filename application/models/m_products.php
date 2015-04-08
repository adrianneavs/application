<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
<<<<<<< HEAD
+ * @copyright Copyright (c) 2015 Kreydle Sdn Bhd
+ * Description of account
+ *
+ * @author Kreydle Sdn Bhd <help@kreydle.com>
+ * @version 4.0
+ * @since Apr 8, 2015
+ */

class M_products extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    /**
<<<<<<< HEAD
+     * get single product by id
+     * @param type $product_id
+     * @return type
+     */
    public function get_product($product_id)
    {
        $this->db->where('id', $product_id);
        return $this->db->get('products')->row();
    }

    /**
<<<<<<< HEAD
+     * get single product by product code
+     * @param type $product_code
+     * @return type
+     */
    public function get_product_by_code($product_code)
    {
        $this->db->where('product_code', $product_code);
        return $this->db->get('products')->row();
    }

    /**
     * get all products
<<<<<<< HEAD
+     * @return type
+     */
    public function get_products()
    {
        return $this->db->get('products')->result();
    }
}