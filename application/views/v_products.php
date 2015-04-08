<!DOCTYPE html>
<!--
<<<<<<< HEAD
+To change this license header, choose License Headers in Project Properties.
+To change this template file, choose Tools | Templates
+and open the template in the editor.
+-->
=======
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
>>>>>>> 51ac1428fddd9c18ed2038ac146fd746ed11123f
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
       <title>Sample Products list</title>
=======
        <title>Sample Products list</title>
>>>>>>> 51ac1428fddd9c18ed2038ac146fd746ed11123f
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h2>Lists of product</h2>
            <?php
            foreach ($products as $product) {
                ?>
                <div>
                    <strong><?php echo $product->product_name ;?></strong><br>
                    <?php echo $product->product_desc ;?><br>
                    <?php echo $product->product_code ;?><br>
                </div>
                <?php
            }
            ?>
        </div>
    </body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 51ac1428fddd9c18ed2038ac146fd746ed11123f
