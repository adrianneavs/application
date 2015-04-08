<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up Page</title>
    <h1> Sign Up!! </h1>
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
	
    </head>
    <body>
        <div id ="body">
        <?php
        
        echo form_open('mainlogin/signup_valid');
                
        echo validation_errors();
        
    
        echo "<p>";
        echo 'Firstname_' . form_input('firstname', $this->input->post('firstname'));
        echo "</p>";
        
        echo "<p>";
        echo 'Lastname__' . form_input('lastname', $this->input->post('lastname'));
        echo "</p>";
        
        echo "<p>";
        echo 'Email_____' . form_input('email', $this->input->post('email'));
        echo "</p>";
          
        echo "<p>";
        echo 'Username__' . form_input('username', $this->input->post('username'));
        echo "</p>";
        
        echo "<p>";
        echo 'Password__' . form_password('password', $this->input->post('password'));
        echo "</p>";
        
        
        echo "<p>";
        echo form_submit('signup_submit', 'SIGN UP');
        echo "</p>";
        
        echo form_close();
        // put your code here
        ?>
        </div>
    </body>
</html>
