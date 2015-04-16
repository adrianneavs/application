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
        <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    </head>
    <body>
       <div id='result_div'>
            <?php
            // this will show you thank you message.
            echo "<h1 align='center'>Thank You! your order has been placed!</h1>";
            echo "<span id='go_back'><a class='fg-button teal' href=" . base_url() . "mainlogin/index>Go back</a></span>";
            ?>
        </div>
    </body>
</html>
