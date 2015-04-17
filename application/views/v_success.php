<html>
    <head>
        <title>Codeigniter cart class</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <style>
            body {

                background-color: #aec6cf;    
            }
            .jumbotron {

                background-color: #204d74;    
            }
            h2 {

                color: white;    
            }
        </style>
    </head>
    <body>
        <?php echo $username;?>
        <div class="jumbotron">
            <h2 align="center">Order History</h2>
        </div>
        <table class="table table-bordered" border="4" cellpadding="5px" cellspacing="1px">

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
// Calculate grand total.
            if ($cart = $this->cart->contents()) {
                foreach ($cart as $item => $value) {
                    ?>

                    <tr>
                        <td>
                            <?php echo $i++; ?>
                        </td>
                        <td>
                            <?php echo $value['name']; ?>
                        </td>

                        <td>
                            $ <?php echo number_format($value['price'], 2); ?>
                        </td>
                        <td>
                            <?php echo form_input('cart[' . $value['id'] . '][qty]', $value['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
                        </td>
                        <?php $grand_total = $grand_total + $value['subtotal']; ?>
                        <td>
                            $ <?php echo number_format($value['subtotal'], 2) ?>
                        </td>

                        <td>

                            <?php
                            echo anchor('mainlogin/deleteorder/' . $value['id'] . '/' . $orderid . '/' . $value['rowid'], 'X');
                            ?>
                                        <!--                        <input type="submit" onclick="window.location = 'deleteorder'" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></input>-->
                        </td>


                        <!--//        $grand_total = $grand_total + $item['subtotal'];
                        //        $name = $item['name'];
                        //        $qty = $item['qty'];-->
                        <?php
                    }
                }
                ?>



        </table>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php echo form_open('mainlogin/checkout');?>
            <input type="button" name="checkout" class="btn btn-primary" value="Checkout">

            </input>
            <?php echo form_close();?>
        </div>
        <div class="col-md-4"></div>

    </body>
</html>
