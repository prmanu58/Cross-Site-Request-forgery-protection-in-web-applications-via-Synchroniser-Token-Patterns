<?php 
    //start a session
    session_start();

    //setting a cookie
    $sessionID = session_id(); //storing session id

    setcookie("session_id",$sessionID,time()+3600,"/","localhost",false,true); //cookie terminates after 1 hour - HTTP only flag
    

?>


<!DOCTYPE html>
<html>
<head>
	<title>SSSystem Assignment 1 - IT16137660</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="config.js"> </script>
</head>
<body>

	<div class="header">
		<h2>Cross-Site Request forgery protection - Login</h2>
	</div>
	
	<form method="post" action="server.php">


		<div class="input-group">
			<label>Username</label>
			<input type="text" name="user_name" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="user_pswd">
		</div>
        <div class="spacing"><input type="checkbox" name="checkboxes" id="checkboxes-0" value="1"><small> Check me</small></div>
		<div class="spacing"><input type="hidden" id="TokenCS"  name="CSR" /></div>
		<div class="input-group">
			<button type="submit" class="btn" name="sbmt">Login</button>
		</div>
	</form>

    <?php 

		if(isset($_COOKIE['session_id']))
            { 
                echo '<script> var token = loadDOC("POST","server.php","TokenCS");  </script>'; 
                   
            }
    ?>


</body>
</html>
