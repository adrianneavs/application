<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Members Page</title>
        <style type="text/css">
            h1 {
		color: #444;
		background-color: transparent;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

            body {
		background-color: #add8e6;
		margin: 40px;
		font: 15px/20px Arial;
		color: #4F5155;
	}
            #body{
		margin: 0 15px 0 15px;
	}
        a {
		background-color: #add8e6;
		
		font: 15px/20px Arial;
		color: #4F5155;
                padding: 14px 15px 10px 15px;
	}
        
        
	</style>
    </head>
    <body>
        <div id ="body">
            <h1>Members page</h1>
            <?php 
            include ("v_food.php");
            
    //if(isset($_POST['submit'])){
	if(!empty($_POST['fnb_list'])) {
            if(isset($_POST['confirm_button'])){
	//Counting number of checked checkboxes 
	
	$mqty = $_POST["mqty"];
	$oqty = $_POST["oqty"];
	
        echo "You have selected following:";
        
	//Loop to store and display values of individual checked checkbox
		
        foreach($_POST['fnb_list'] as $selected ){
                    echo "<p>".$mqty." ".$selected."</p>"; 
	
                } echo 30*$mqty." + ".$oqty*5; echo " = "; echo $mqty*30+$oqty*5; echo " RM";
                echo '</br>';echo '</br>';
                echo form_submit('edit_button', 'Edit');echo '  ';
                
                echo form_open('mainlogin/confirm');
                echo form_submit('confirm_button', 'Confirm');
                echo form_close();
	}
	else{
	echo "<b>Please Select Atleast One Option.</b>";
	}
        }
    //}
    
    ?>
            
            <a href ='<?php echo base_url()."mainlogin/userlogout"?>'>LOGOUT</a>
        </div>
    </body>
</html>
