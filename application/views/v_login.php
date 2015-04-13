<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <!--                <link rel="stylesheet" type="text/css" href="style.css">
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <link rel="stylesheet" href="<?php echo base_url('boots/css/bootstrap.min.css'); ?>">
                        <link rel="stylesheet" href="<?php echo base_url('boots/css/bootstrap1.css'); ?>">
                        <script src="<?php echo base_url('boots/js/bootstrap.min.js'); ?>"></script>
                        <meta charset="utf-8">-->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class ="container">
            <div class="row">
                <div class="col-md-4">.col-md-4</div>
                <div class="col-md-4">.col-md-4
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="page-header">
                                <h1>Login Zone</h1>
                            </div>
                            <form class="form-horizontal" action="mainlogin/login_valid">
                                <?php echo validation_errors(); ?>
                                <div class="form-group">
                                    <label>Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-primary" value="Log me in"></input><br><br>
                                        <p>No account? <a href ='<?php echo base_url() . "mainlogin/signup"; ?>'>Sign Me Up</a>
                                            

                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">.col-md-4</div>
            </div>
        </div>
        <h1>Log In!!</h1>
        <form method="post" action="mainlogin/login_valid">
            <?php echo validation_errors(); ?>
            <p>Username :<input type="text" name="username"></input><br>
            <p>Password :<input type="password" name="password"></input><br>

                <input type="submit" class ="btn btn-primary btn-lg" name="login_submit" value="LOG IN"></input>
        </form>
        <?php
        echo 'Doesn`t have account?';
        ?>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Modal1">
            Sign Up
        </button>
        
        <a href = '<?php echo base_url() . "mainlogin/signup"; ?>' class="form-inline" data-toggle="modal" data-target="#Modal1">SIGN UP</a>
    </div>
</body>
</html>
