<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
                <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url('boots/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('boots/css/bootstrap-theme.min.css'); ?>">
        <script src="<?php echo base_url('boots/js/bootstrap.min.js'); ?>"></script>
	
    </head>
    <body>
<div id ="body">
    <h1>Log In!!</h1>
        <?php
        
      echo form_open('mainlogin/login_valid');//
      
        echo validation_errors();
        
        echo "<p>";
        echo 'Username' . form_input('username');
        echo "</p>";
        
        echo "<p>";
        echo 'Password' . form_password('password');
        echo "</p>";
        
        echo "<p>";
        echo form_submit('login_submit', 'LOG IN');
        echo "</p>";
        
        echo form_close();
        
        echo 'Doesn`t have account?';
        ?>
    <a href = '<?php echo base_url()."mainlogin/signup"; ?>'>SIGN UP</a>
</div>
    </body>
</html>
