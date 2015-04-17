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
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url('boots/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('boots/css/bootstrap-theme.min.css'); ?>">
        <script src="<?php echo base_url('boots/js/bootstrap.min.js'); ?>"></script>
        <style>
            body{
                background-image: url("http://s15.postimg.org/d1ksncly3/anigif.gif");
                background-repeat: no-repeat;
                background-size: 1900px 1062px;
            }
        </style>
    </head>
    <body>

        <br><br>
        <div class ="container">
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="page-header">

                                <h1>Sign Up Zone</h1>
                            </div>
                            <?php
                            $firstname = $this->input->post('firstname');
                            $lastname = $this->input->post('lastname');
                            $email = $this->input->post('email');
                            $username = $this->input->post('username');
                            $password = $this->input->post('password');
                            ?>
                            <form class="form-horizontal" action="<?php echo base_url() . "mainlogin/signup_valid"; ?>" method="post">
                                <?php echo validation_errors(); ?>
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-unchecked"></span></span>
                                        <input type="text" name="firstname" class="form-control" placeholder="No Space" value="<?php echo $firstname;?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lastname</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-unchecked"></span></span>
                                        <input type="text" name="lastname" class="form-control" placeholder="No Space" value="<?php echo $lastname;?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><span>@</span></span>
                                        <input type="email" name="email" class="form-control" placeholder="me@example.com" value="<?php echo $email;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-asterisk"></span></span>
                                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $password;?>">
                                    </div>
                                </div>

                        </div>
                        
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                                <a href ='<?php echo base_url() . "mainlogin/loginform" ?>'>Log In</a>
                        </form> 
                        </div>
                </div>
            </div>
        </div>

    </div>


    <!--
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
        </div>-->
</body>
</html>
