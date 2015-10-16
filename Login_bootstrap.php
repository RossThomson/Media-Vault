
<?php
include 'scripts/login_val.php'; // Includes Login Script

if(isset($_SESSION['email'])){
header("location: media.php");
}
?>



<!DOCTYPE html>
<html>
	<head>
	<title>Login</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<!--<link rel="icon" href="http://getbootstrap.com/favicon.ico">-->
		<!--<title>Media Lynx</title>-->
		<!-- Bootstrap core CSS -->
		<link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="http://getbootstrap.com/examples/navbar-fixed-top/navbar-fixed-top.css" rel="stylesheet">
		<script type="text/javascript" src="scripts/login_val.js"></script>
	</head>
	
	<body>
	<div class="container">
	
			<header>
				<?php include 'header_bootstrap.php'; ?>
			</header>
	
	<!--FORM FOR THE USER TO FILL OUT-->
	<div id="jumbotron">
	
	<h1>Login To Your Account</h1>
	<form id="loginform" name="login_form" onsubmit="scripts/login_val.js" action="scripts/login_val.php"  method="post">
		<fieldset>
		<p><span id="error_message"><?php session_start(); echo $_SESSION['error'];?></span></p>
		<p><label>Email Address: </label><br>
		<input type="text" name="email" id="email" required onchange ="checkEmail();">*<span id ="emailmessage"></span></p>
		<p><label>Password: </label><br>
		<input type="password" min = "6" max = "15" id="pass" name="password" required>*</p>
		<a id="retrieve_password" href="password_recovery.php">Reset Password</a><br>
		<input class="btn btn-alt" type = "submit" name = "submit" id="submit" value = "Submit">
		</fieldset>
	</form>
	</div>
	
	<footer class="footer_absolute">
		<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>
	</div>
	</body>
</html>
	