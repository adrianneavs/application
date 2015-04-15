<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script>
            function myFunction() {
                document.getElementById("aidi").readOnly = false;
                document.getElementById("firstname").readOnly = false;
                document.getElementById("lastname").readOnly = false;
                document.getElementById("email").readOnly = false;
                document.getElementById("username").readOnly = false;
                document.getElementById("password").readOnly = false;
                document.getElementById("okbutton").disabled = false;

            }
        </script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="jumbotron">
            <h2 id="head" align="center">Edit Profile</h2></div>

        <?php

        foreach ($userdata1 as $userdata) {
            $id = $userdata['id'];
            $firstname = $userdata['firstname'];
            $lastname = $userdata['lastname'];
            $email = $userdata['email'];
            $username = $userdata['username'];
            $password = $userdata['password'];
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <form>
                                    <div class="form-group">
                                        <label>ID</label>
                                        <input type="text" id="aidi" name="aidi" value="<?php echo $id; ?>" readonly="true"><br></div>
                                    <label>Firstname</label>
                                    <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>" readonly><br>
                                    <label>Lastname</label>
                                    <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>" readonly><br>
                                    <label>Email</label>
                                    <input type="text" name="email" id="email" value="<?php echo $email; ?>" readonly><br>
                                    <label>Username</label>
                                    <input type="text" id="username" name="username" value="<?php echo $username; ?>" readonly><br>
                                    <label>Password</label>
                                    <input type="password" id="password" name="password" value="<?php echo $password; ?>" readonly><br>
                                    <button type="button" class="btn btn-info" name="editbutton" onclick="myFunction()"><span class="glyphicon glyphicon-pencil"></span>Edit</button>
                                    <button type="submit" class="btn btn-danger" id="okbutton" name="okbutton" disabled="true" onclick="window.location = 'mainlogin/edituser'"><span class="glyphicon glyphicon-trash"></span>OK</button><br><br>
                                    <a href ='<?php echo base_url() . "mainlogin/index" ?>'>Back</a>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
    <?php
}
?>

    </body>
</html>
