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
    <script src="<?php echo base_url('boots/js/bootstrap.min.js'); ?>"></script></head>
<body>

    <br><br>
    <div class ="container">
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="page-header">

                            <h1>Sign Up Zone</h1>
                        </div>

                        <form class="form-horizontal" action="<?php echo base_url() . "mainlogin/signup_valid"; ?>" method="post">
                            <?php echo validation_errors();?>
                            <div class="form-group">
                                <label for="inputfn3" class="col-sm-2 control-label">Firstname</label>
                                <div class="col-sm-10">
                                    <input type="text" name="firstname" class="form-control" id="inputfn3" placeholder="No Space">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputfn3" class="col-sm-2 control-label">Lastname</label>
                                <div class="col-sm-10">
                                    <input type="text" name="lastname" class="form-control" id="inputfn3" placeholder="No Space">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputfn3" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" class="form-control" id="inputfn3" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                    <button type="button" class="btn btn-success" onclick="window.location = 'loginform'">Log In</button>
                                </div>
                            </div>
                        </form>                        </div>
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
