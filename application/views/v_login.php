<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <style>
            body{
            background-image: url("http://s15.postimg.org/d1ksncly3/anigif.gif");
            background-repeat: no-repeat;
            background-size: 1400px 550px;
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
                                
                                <h1>Log In Zone</h1>
                            </div>

                            <form action="<?php echo base_url() . "mainlogin/login_valid"; ?>" method="post">
                                <?php echo validation_errors();?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" name="username" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-asterisk"></span></span>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="loginbtn"><span class="glyphicon glyphicon-cutlery"></span> Log In</button><br><br>
                                    <p>No account? <a href="<?php echo base_url() . "mainlogin/signup"; ?>">Sign Up</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        

</body>
</html>
