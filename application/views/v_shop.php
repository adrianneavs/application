<html>
    <head>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            // To conform clear all data in cart.
            function clear_cart() {
                var result = confirm('Are you sure want to clear all bookings?');

                if (result) {
                    window.location = "<?php echo base_url(); ?>index.php/mainlogin/remove/all";
                } else {
                    return false; // cancel button
                }
            }
            function myFunction() {
                document.getElementById("coba").readOnly = false;
            }
            function bigImg(x)
            {
                x.style.height = "500px";
                x.style.width = "500px";
            }
            function oriImg(x)
            {
                x.style.height = "200px";
                x.style.width = "200px";
            }
        </script>
        <style>
            body {
                /*                background-color: #ff6961;    */
                background-color: #fdfd96;    
            }
            h2{
                color: black;
            }
            h4{
                color: #cfcfc4;
            }

            td {
                color:black;
            }
            div.img {
                margin: 5px;
                padding: 5px;

                height: auto;
                width: auto;
                float: left;
                text-align: center;
            }	

            div.img img {
                display: inline;
                margin: 5px;
                border: 1px solid #ffffff;
            }

            div.img a:hover img {
                border: 1px solid #0000ff;
            }

            div.desc {
                text-align: right;
                font-weight: normal;
                width: 120px;
                margin: 5px;
            }
            .jumbotron{
                background-color:#ffffff;
                color:white;
            }

        </style>
    </head>
    <body>
        <div id='content'>
            <div id='tag'>

<!--                    <img src="<?php echo base_url(); ?>images/cross.png"/>-->
            </div>
            <?php
//            $query = $this->db->get('users');
//            $query1 = $query->result();
//            $getuser = $query1->username; {
//                
            ?><div class="col-md-4"></div>
            <div class="col-md-4"></div>

            <div class="col-md-4">
                <span class="glyphicon glyphicon-wrench"><a href ='<?php echo base_url() . "mainlogin/profile/" . $username ?>'>EDIT PROFILE</a></span>
                <span class="glyphicon glyphicon-off"><a href ='<?php echo base_url() . "mainlogin/userlogout" ?>'>LOGOUT</a></span>
            </div>
            <br>
            <br>
            <div id="cart" >

                <div id="text"> 
                    <?php
                    $cart_check = $this->cart->contents();

                    // If cart is empty, this will show below message.
                    if (empty($cart_check)) {
                        echo '<h4>To add products to your shopping cart click on "Add to Cart" Button</h4>';
                    }
                    ?> </div>
                <table class="table table-hover" border="4" cellpadding="5px" cellspacing="1px">
                    <?php
                    // All values of cart store in "$cart". 
                    if ($cart = $this->cart->contents()):
                        ?>

                        <tr id= "main_heading">
                            <td><strong>Serial</strong></td>
                            <td><strong>Name</strong></td>
                            <td><strong>Price</strong></td>
                            <td><strong>Qty</strong></td>
                            <td><strong>Total</strong></td>

                            <td><strong>Cancel</strong></td>
                        </tr>

                        <?php
                        // Create form and send all values in "shopping/update_cart" function.
                        echo form_open('mainlogin/update_cart');
                        $grand_total = 0;
                        $i = 1;

                        foreach ($cart as $item):
                            //   echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                            //  Will produce the following output.
                            // <input type="hidden" name="cart[1][id]" value="1" />

                            echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                            echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                            echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                            echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                            echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo $item['name']; ?>
                                </td>

                                <td>
                                    $ <?php echo number_format($item['price'], 2); ?>
                                </td>
                                <td>
                                    <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
                                </td>
                                <?php $grand_total = $grand_total + $item['subtotal']; ?>
                                <td>
                                    $ <?php echo number_format($item['subtotal'], 2) ?>
                                </td>

                                <td>

                                    <?php
                                    echo anchor('mainlogin/remove/' . $item['rowid'], 'X');
                                    ?>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    </table>
                    <tr>
                        <td><b>Order Total: $<?php
                                //Grand Total.
                                echo number_format($grand_total, 2);
                                ?></b></td>

                        <?php // "clear cart" button call javascript confirmation message          ?>
                        <td colspan="5" align="right"><input type="button" class ='btn btn-danger' value="Clear Cart" onclick="clear_cart()">

                            <?php //submit button.           ?>
                            <input type="submit" class ='btn btn-info' value="Update Cart">
                            <?php echo form_close(); ?>

                            <!-- "Place order button" on click send "billing" controller  -->
                            <input type="button" class ='btn btn-success' value="Place Order" onclick="window.location = 'billing_view'"></td>
                    </tr>
                <?php endif; ?>

            </div>
            <br>

            <div class="jumbotron">
                <h2 id="head" align="center">Products</h2></div>
            <?php
// "$products" send from "shopping" controller,its stores all product which available in database. 
            foreach ($products as $product) {
                $id = $product['serial'];
                $name = $product['name'];
                $description = $product['description'];
                $price = $product['price'];
                ?>
                <div class="img">
                    <img src="<?php echo base_url() . $product['picture'] ?>" onmouseover="bigImg(this)" onmouseout="oriImg(this)" class="img-circle" width="200" height="200"/>

                    <!--                            <div class="desc">-->
                    <div id='name'><?php echo $name; ?></div>
                    <div id='desc'>  <?php echo $description; ?></div>
                    <div id='rs'><b>Price</b>:<big style="color:green">
                            $<?php echo $price; ?></big></div>
                    <?php
                    // Create form and send values in 'shopping/add' function.
                    echo form_open('mainlogin/add');
                    //echo form_open();
                    echo form_hidden('id', $id);
                    echo form_hidden('name', $name);
                    echo form_hidden('price', $price);
                    ?>
                    <!--                        </div> -->
                    <div id='add_button'>
                        <?php
                        $btn = array(
                            'class' => 'btn btn-warning',
                            'value' => 'Add to Cart',
                            'name' => 'action'
                        );

                        // Submit Button.
                        echo form_submit($btn);
                        echo form_close();
                        //echo form_close();
                        echo '</br>';
                        echo '</br>';
                        ?>
                    </div>

                </div>
            </div>

        <?php } ?>


    </body>
</html>
