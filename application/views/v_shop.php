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
        </script>
        <style>
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

        </style>
    </head>
    <body>
        <div id='content'>
            <div id='tag'>

<!--                    <img src="<?php echo base_url(); ?>images/cross.png"/>-->
            </div>
            <a href ='<?php echo base_url() . "mainlogin/profile" ?>'>Edit Profile</a>
            <div id="cart" >
                <div id = "heading">
                    <h2 align="center">Products on Your Shopping Cart</h2>
                </div>

                <div id="text"> 
                    <?php
                    $cart_check = $this->cart->contents();

                    // If cart is empty, this will show below message.
                    if (empty($cart_check)) {
                        echo 'To add products to your shopping cart click on "Add to Cart" Button';
                    }
                
                    ?> </div>
                <table id="table" border="0" cellpadding="5px" cellspacing="1px">
                    <?php
                    // All values of cart store in "$cart". 
                    if ($cart = $this->cart->contents()):
                        ?>
                        <tr id= "main_heading">
                            <td>Serial</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Qty</td>
                            <td>Amount</td>
                            <td>Cancel Product</td>
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
        <!--                            <span class = "glyphicon glyphicon-remove"></span>  -->
                                    <?php
                                    // cancle image.
//                            $path = "<img src='D:/KREYDLEPROJ/ajenglocal/ci_tutorial/images/cross.png'  width='50px' height='50px'>";
                                    echo anchor('mainlogin/remove/' . $item['rowid'], 'X');
                                    ?>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <td><b>Order Total: $<?php
                                    //Grand Total.
                                    echo number_format($grand_total, 2);
                                    ?></b></td>

                            <?php // "clear cart" button call javascript confirmation message   ?>
                            <td colspan="5" align="right"><input type="button" class ='fg-button teal' value="Clear Cart" onclick="clear_cart()">

                                <?php //submit button.   ?>
                                <input type="submit" class ='fg-button teal' value="Update Cart">
                                <?php echo form_close(); ?>

                                <!-- "Place order button" on click send "billing" controller  -->
                                <input type="button" class ='fg-button teal' value="Place Order" onclick="window.location = 'billing_view'"></td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>

            <h2 id="head" align="center">Products</h2>
            <?php
            // "$products" send from "shopping" controller,its stores all product which available in database. 
            foreach ($products as $product) {
                $id = $product['serial'];
                $name = $product['name'];
                $description = $product['description'];
                $price = $product['price'];
                ?>
                <div class="img">
                    <img src="<?php echo base_url() . $product['picture'] ?>" class="img-circle" width="300" height="300"/>

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
                            'class' => 'btn btn-success',
                            'value' => 'Add to Cart',
                            'name' => 'action'
                        );

                        // Submit Button.
                        echo form_submit($btn);
                        echo form_close();
                        //echo form_close();
                        ?>
                    </div>

                </div>
            </div>
        <?php } ?>



        <a href ='<?php echo base_url() . "mainlogin/userlogout" ?>'>LOGOUT</a>
    </body>
</html>
