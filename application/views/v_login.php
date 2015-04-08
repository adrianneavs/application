<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
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
        
        
	</style>
	
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
