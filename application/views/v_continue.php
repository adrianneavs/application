<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url('boots/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('boots/css/bootstrap-theme.min.css'); ?>">
        <script src="<?php echo base_url('boots/js/bootstrap.min.js'); ?>"></script>
            <?php
echo '<h3> To cotinue please login first</h3>';
echo '<h3>No account? Sign up!</h3>';
$this->load->view('v_login');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    </head>
</html>

