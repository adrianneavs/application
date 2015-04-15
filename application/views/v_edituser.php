<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
        <form class ="form-horizontal" method="POST" action=".">
                <label>ID</label>
                <input type="text" name="id" value="<?php echo $id; ?>" ><br>
                <label>Full name</label>
                <input type="text" name="id" value="<?php echo $firstname . " " . $lastname; ?>" readonly><br>
                <label>Email</label>
                <input type="text" name="id" value="<?php echo $email; ?>" readonly><br>
                <label>Username</label>
                <input type="text" name="id" value="<?php echo $username; ?>" readonly><br>
                <label>Password</label>
                <input type="password" name="id" value="<?php echo $password; ?>" readonly><br>
                <button type="submit" class="btn btn-info" name="editbutton" onclick="window.location = 'profile'"><span class="glyphicon glyphicon-pencil"></span>OK</button><br><br>
                <button type="submit" class="btn btn-danger" name="deletebutton"><span class="glyphicon glyphicon-trash"></span>Cancel</button><br><br>
            </form>

        <?php
        // put your code here
        ?>
    </body>
</html>
