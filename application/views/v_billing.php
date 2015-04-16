<?php
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
                                    echo anchor('mainlogin/deleteorder/' . $value['id'], 'X');
                                    ?>
                                </td>
                           
                        </tr>
                    </table>

        <!--//        $grand_total = $grand_total + $item['subtotal'];
        //        $name = $item['name'];
        //        $qty = $item['qty'];-->
        <?php
    }
}
?>

<html>
            <head>
                <title>Codeigniter cart class</title>
                <link rel="stylesheet" type="text/css" href="style.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="<?php echo base_url('boots/css/bootstrap.min.css'); ?>">
                <link rel="stylesheet" href="<?php echo base_url('boots/css/bootstrap-theme.min.css'); ?>">
                <script src="<?php echo base_url('boots/js/bootstrap.min.js'); ?>"></script> 
                <style>
                    body {
                        background-color: #77dd77;    
                    }
                </style>
            </head>
            <body>
                <div id="bill_info">

                    <?php // Create form for enter user imformation and send values 'shopping/save_order' function   ?>
                    <form name="billing" method="post" action="<?php echo base_url() . 'mainlogin/save_order' ?>" >
                        <input type="hidden" name="command" />
                        <div align="center">
                            <h1 align="center">Billing Info</h1>
                            <table border="3" cellpadding="2px">
        <!--                            <tr><td>Meals:</td><td><strong><?php echo $name; ?></strong></td></tr>
                                <tr><td>Qty:</td><td><strong><?php echo $qty; ?></strong></td></tr>
                                -->                            
                                <tr><td>Order Total:</td><td><strong><input type="text" name="ordertotal" value="$<?php echo number_format($grand_total, 2); ?>"></strong></td></tr>
                                <tr><td>Your Name:</td><td><input type="text" name="custname" required=""/></td></tr>
                                <tr><td>Address:</td><td><input type="text" name="address" required="" /></td></tr>
                                <tr><td>Email:</td><td><input type="text" name="email" required="" /></td></tr>
                                <tr><td>Phone:</td><td><input type="text" name="phone"  required="" /></td></tr>
                                <tr><td><?php
                                        // This button for redirect main page.
                                        echo "<a class ='fg-button teal' id='back' href=" . base_url() . "mainlogin>Back</a>";
                                        ?>
                                    </td><td><input type="submit" class ='fg-button teal' value="Place Order" name="place" /></td></tr> 

                            </table>
                        </div>
                    </form>
                </div>
    </body>
</html>