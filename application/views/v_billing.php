
<?php
$grand_total = 0;
$i = 1;
// Calculate grand total.
if ($cart = $this->cart->contents()) {
    foreach ($cart as $item => $value) {
        ?>
        <?php $grand_total = $grand_total + $value['subtotal']; ?>

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

            <?php // Create form for enter user imformation and send values 'shopping/save_order' function   
            echo validation_errors();
            ?>
            <div class ="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="page-header">
                                    <h1>Billing Info</h1>
                                </div>
                                <form name="billing" method="post" action="<?php echo base_url() . 'mainlogin/save_order' ?>" >
                                    <input type="hidden" name="command" />

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Order Total</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" name="ordertotal" class="form-control" value="$<?php echo number_format($grand_total, 2); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" name="custname" class="form-control" placeholder="Name"  required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" name="address" class="form-control" placeholder="Full Address" required="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" name="email" class="form-control" placeholder="E.g me@example.com" required="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" name="phone" class="form-control" placeholder="E.g 748743734" required="" >
                                        </div>
                                    </div>


                                    <?php
                                    // This button for redirect main page.
                                    echo "<a class ='fg-button teal' id='back' href=" . base_url() . "mainlogin/index>Back</a>";
                                    ?>
                                    <input type="submit" class ='btn btn-success' value="Place Order" name="place" /></td></tr> 



                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>

    </body>
</html>