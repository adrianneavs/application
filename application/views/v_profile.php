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

        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        foreach ($userdata as $users) {
            $id = $users['id'];
            $firstname = $users['firstname'];
            $lastname = $users['lastname'];
            $email = $users['email'];
            $username = $users['username'];
            $password = $users['password'];
            ?>
            <form class ="form-horizontal">
                <label>ID</label>
                <input type="text" name="id" value="<?php echo $id; ?>" readonly><br>
                <label>Full name</label>
                <input type="text" name="id" value="<?php echo $firstname . " " . $lastname; ?>" readonly><br>
                <label>Email</label>
                <input type="text" name="id" value="<?php echo $email; ?>" readonly><br>
                <label>Username</label>
                <input type="text" name="id" value="<?php echo $username; ?>" readonly><br>
                <label>Password</label>
                <input type="password" name="id" value="<?php echo $password; ?>" readonly><br>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-cutlery"></span>Edit</button><br><br>
                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-cutlery"></span>Edit</button><br><br>
            </form>

            <?php
        }
        ?>
    </body>
</html>
