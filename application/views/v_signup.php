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
                    <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url('boots/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('boots/css/bootstrap-theme.min.css'); ?>">
        <script src="<?php echo base_url('boots/js/bootstrap.min.js'); ?>"></script></head>
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
