<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        $currency = '$'; //Currency sumbol or code
        ?>

        <style type="text/css">
            h1 {
                color: #444;
                background-color: transparent;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            body {
                background-color: #add8e6;
                margin: 40px;
                font: 15px/20px Arial;
                color: #4F5155;
            }
            #body{
                margin: 0 15px 0 15px;
            }



            signup_submit{
                color: white;
                border-radius: 4px;
                text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
                background: rgb(28, 184, 65);
            }
        </style>

        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>HI</h1>
        <h1>Products</h1>
        <div class="products">
            <?php
            $currency = '$'; //Currency symbol or code
//fetch results set as object and output HTML
            foreach ($products as $product) {
                echo '<div class="product">';
                echo form_open('/mainlogin/cart_update');
                //echo '<form method="post" action="cart_update">';
                echo '<div class="product-thumb"><img src="D:/KREYDLEPROJ/ajenglocal/' . $product->product_img_name . '"></div>';
                echo '<div class="product-content"><h3>' . $product->product_name . '</h3>';
                echo '<div class="product-desc">' . $product->product_desc . '</div>';
                echo '<div class="product-info">';
                echo 'Price ' . $currency . $product->price . ' | ';
                echo 'Qty <select name="product_qty">'
                . '<option value="1">1</option>'
                . '<option value="2">2</option>'
                . '</select>';
                echo '<button class="add_to_cart" name="addtocart">Add To Cart</button>';
                echo '</div></div>';
                echo '<input type="hidden" name="id" value="' . $product->id . '" />';


                echo form_close();
                //echo '</form>';
                echo '</div>';
            }
            ?>
            <h2>Cart</h2>
            <?php
            foreach ($cart as $cart_itm) {
                $total = 0;
                echo '<li class="cart-itm">';
                echo form_open('/mainlogin/cart_update');
                echo '<button name="addtocart">Add To Cart</button>';
                //echo '<name="remove"><a href="cart_update".$cart_itm["code"]>&times;</a>';
                echo '<h3>' . $cart_itm["name"] . '</h3>';
                echo '<div class="p-code">P code : ' . $cart_itm["code"] . '</div>';
                echo '<div class="p-qty">Qty : ' . $cart_itm["qty"] . '</div>';
                echo '<div class="p-price">Price :' . $currency . $cart_itm["price"] . '</div>';
                echo '</li>';
                $subtotal = ($cart_itm["price"] * $cart_itm["qty"]);
                $total = ($total + $subtotal);
                echo form_close();
            }
            echo '</ol>';

            echo '<span class="check-out-txt"><strong>Total : ' . $currency . $total . '</strong> </br> <a href="checkout">Check-out!</a></span>';
            echo '</br>';
            echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url="> Empty Cart</a></span>';
            ?>

            </br></br>
            <a href ='<?php echo base_url() . "mainlogin/userlogout" ?>'>LOGOUT</a>
    </body>
</html>
