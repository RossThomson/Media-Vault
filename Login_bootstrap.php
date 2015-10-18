
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
		<!-- Bootstrap core CSS -->
		<link href="bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="http://getbootstrap.com/examples/navbar-fixed-top/navbar-fixed-top.css" rel="stylesheet">
		<script type="text/javascript" src="scripts/login_val.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	
	<body>
	<div class="container">
	
			<header>
				<?php include 'header_bootstrap.php'; ?>
			</header>
	
	<!--FORM FOR THE USER TO FILL OUT-->
	<div id="jumbotron">	
		<h1>Login To Your Account</h1>
	</div>
	<form class="form-horizontal" role="form" id="loginform" name="login_form" onsubmit="scripts/login_val.js" action="scripts/login_val_bootstrap.php"  method="post">
		<fieldset>
		<p><span id="error_message"><?php session_start(); echo $_SESSION['error'];?></span></p>
		<div class="form-group">
			<label for="email" class="col-sm-2">Email Address*: </label>
			<div class="col-sm-9"> 
				<input type="text" class="form-control" name="email" id="email" required onchange ="checkEmail();"><span id ="emailmessage"></span>
			</div>
		</div>
		<div>
		<div class="form-group">
			<label for="password" class="col-sm-2">Password*: </label>
			<div class="col-sm-9">
				<input type="password" class="form-control" min = "6" max = "15" id="pass" name="password" required>
			</div>
		</div>
		<div class="well" href="password_recovery.php">
			<a id="retrieve_password" href="password_recovery.php">Reset Password</a>
		</div>
		<div>
			<input class="btn btn-lg btn-primary" type = "submit" name = "submit" id="submit" value = "Submit">
		</div>
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
	