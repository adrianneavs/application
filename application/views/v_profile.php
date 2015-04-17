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
        <div class='jumbotron'>
            <center><h1>Form Update</h1></center>
        </div>
        <br><br>
        <div class ='container'>
            <div class='col-lg-8 col-lg-offset-2'>
                <div class ='row top-buffer'>
                    <div class ="col-lg-6 col-lg-offset-3">
                        <form action ='<?php echo base_url() . 'mainlogin/updateprofile/' . $this->uri->segment(3); ?>' method='post'>
                            <div class="panel panel-default">
                                <div class="panel-heading"><h3>Edit Data: </h3></div>
                                <div class="panel-body">
                                    <?php
                                    $id = $this->uri->segment(3);
                                    $this->db->where('username', $username);
                                    $this->db->from('users');

                                    $query = $this->db->get();

                                    foreach ($query->result() as $rows) {
                                        ?>
                                        <table class ='table table-bordered'>
                                            <td><div class='form-group <?php echo form_error('firstname') !== "" ? 'has-error' : ''; ?>'>
                                                    <label for="username">First Name:</label>
                                                    <?php echo form_error('firstname', '<span id="helpBlock" class="help-block">', '</span>'); ?>
                                                    <div class ="input-group">
                                                        <div class ="input-group-addon"> <span class ="glyphicon glyphicon-pencil"> </span> </div>
                                                        <input type = "text" name = "firstname" class ='form-control' value ='<?php echo $rows->firstname; ?>'/>		
                                                    </div></div></br>
                                                <div class='form-group <?php echo form_error('lastname') !== "" ? 'has-error' : ''; ?>'>
                                                    <label for ='lastname'>Last Name:</label>
                                                    <?php echo form_error('lastname', '<span id="helpBlock" class="help-block">', '</span>'); ?>
                                                    <div class ="input-group">
                                                        <div class ="input-group-addon"> <span class ="glyphicon glyphicon-pencil"> </span> </div>
                                                        <input type = "text" name = "lastname" class ='form-control' value ='<?php echo $rows->lastname; ?>'/>			
                                                    </div>
                                                </div></br>
                                                <div class='form-group <?php echo form_error('username') !== "" ? 'has-error' : ''; ?>'>
                                                    <label for='username'>Username:</label>
                                                    <?php echo form_error('username', '<span id="helpBlock" class="help-block">', '</span>'); ?>
                                                    <div class ="input-group">
                                                        <div class ="input-group-addon"> <span class ="glyphicon glyphicon-user"> </span> </div>
                                                        <input type = "text" name = "username" class ='form-control' value ='<?php echo $rows->username; ?>'/>
                                                    </div>
                                                </div></br>
                                                <div class='form-group <?php echo form_error('password') !== "" ? 'has-error' : ''; ?>'>
                                                    <label for='password'>Password:</label>
                                                    <?php echo form_error('password', '<span id="helpBlock" class="help-block">', '</span>'); ?>
                                                    <div class ="input-group">
                                                        <div class ="input-group-addon"> <span class ="glyphicon glyphicon-lock"> </span> </div>
                                                        <input type = "text" name = "password" class ='form-control' value ='<?php echo $rows->password; ?>'/>
                                                    </div>
                                                </div></br>
                                                <div class='form-group <?php echo form_error('email') !== "" ? 'has-error' : ''; ?>'>
                                                    <label for='email'>Email:</label>
                                                    <?php echo form_error('email', '<span id="helpBlock" class="help-block">', '</span>'); ?>
                                                    <div class ="input-group"><div class ="input-group-addon"> @ </div>
                                                        <input type = "text" name = "email" class ='form-control' value ='<?php echo $rows->email; ?>'/>
                                                    </div>
                                                </div></br>
                                                <?php
                                            }
                                            ?>  

                                            <input type ="submit" class ='btn btn-default btn-lg' name = "submit" value="Update"/>
                                    </table>
                                    <a href ="<?php echo base_url() . 'mainlogin/index' ?>"> Back </a>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
