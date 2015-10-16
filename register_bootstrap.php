<!DOCTYPE html>
<html id="Register">
	<head>
	<title>Register</title>
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
		<script type="text/javascript" src="scripts/register_val.js"></script>
		<?php include 'scripts/register_val.php';?> 
	</head>
	
	<body>
		
		
	<div class="wrapper">
	
			<header>
				<?php include 'header_bootstrap.php'; ?>
			</header>
	
	<!--FORM FOR THE USER TO FILL OUT-->
	<div id="register_form">
	
	<h1>Register For An Account</h1>
	<form id="container" name="Register_form" onsubmit="scripts/register_val.js" action="scripts/register_val.php"  method="post">
		<fieldset>
		<p><span id="error_message"><?php session_start(); echo $_SESSION['error'];?></span></p>
		<p><label>First Name: </label>
		<input type="text" name="firstname" id="name" required onchange="firstNameVal();">*<span id ="namemessage"></span></p>
		<p><label>Last name: </label><input type="text" name="lastname" id="surname" required onchange="surnameVal();">*<span id ="surnamemessage"></span></p>
		<p><label>Email Address: </label><input type="text" name="email" id="email" required onchange ="checkEmail();">*<span id ="emailmessage"></span></p>
		<p><label>Secret Question: </label><input type="text" name="secretquestion" required>*</p>
		<p><label>Secret Answer: </label><input type="text" name="secretanswer" required>*</p>
		<p><label for="password">Password: </label><input type="password" min = "6" max = "15" id="password" name="password" required>*</p>
		<p><label for="cPassword">Confirm Password: </label><input type="password" id="cPassword" name="cPassword" required onkeyup ="checkPass(); return false;">*<span id="confirmMessage" class="confirmMessage"></span></p>
		<p><input class="btn btn-alt" type = "submit" name = "Submit" id = "Submit" value = "Submit">
		</fieldset>
	</form>
	</div>
	
	<footer class="footer_relative">
		<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>
	</div>
	</body>
</html>
