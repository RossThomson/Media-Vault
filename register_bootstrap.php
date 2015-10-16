<!DOCTYPE html>
<html id="Register">
	<head>
	<title>Register</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<!-- Bootstrap core CSS-->
		<link href="bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<!--Custom styles for this template 
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
		<link href="http://getbootstrap.com/examples/navbar-fixed-top/navbar-fixed-top.css" rel="stylesheet">
		<script type="text/javascript" src="scripts/register_val.js"></script>
		<?php include 'scripts/register_val.php';?> 
	</head>
	
	<body>	
		
	<div class="container">
	
			<header>
				<?php include 'header_bootstrap.php'; ?>
			</header>
	
	<!--FORM FOR THE USER TO FILL OUT-->
	<div class="jumbotron">	
	<h1>Register For An Account</h1>
	<small>Fill in all details with an astrix to sign up for your own personal Media Vault</small>
	</div>
	<div class="container">
	<form class="form-horizontal" role="form" name="Register_form" onsubmit="scripts/register_val.js" action="scripts/register_val.php"  method="post">
		<div class="form-group">
			<p><span id="error_message"><?php session_start(); echo $_SESSION['error'];?></span></p>
			<label for="firstname" class="col-sm-2 control-label">First Name*: </label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="firstname" id="name" required onchange="firstNameVal();"><span id ="namemessage"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="lastname" class="col-sm-2 control-label">Last name*: </label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="lastname" id="surname" required onchange="surnameVal();"><span id ="surnamemessage"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">Email Address*: </label>
			<div class="col-sm-9">
				<input type="text"class="form-control" name="email" id="email" required onchange ="checkEmail();"><span id ="emailmessage"></span>
			</div>
		</div>
		<div class="form-group">
			<label for="secretquestion" class="col-sm-2 control-label">Secret Question*: </label>
			<div class="col-sm-9">
				<input type="text" class = "form-control" name="secretquestion" required>
			</div>
		</div>
		<div class="form-group">
			<label for="secretanswer" class="col-sm-2 control-label">Secret Answer*: </label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="secretanswer" required>
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password*: </label>
			<div class="col-sm-9">
				<input type="password" class="form-control" min = "6" max = "15" id="password" name="password" required>
			</div>
		</div>
		<div class="form-group">
			<label for="cPassword" class="col-sm-2 control-label">Confirm Password*: </label>
			<div class="col-sm-9">
				<input type="password" class="form-control" id="cPassword" name="cPassword" required onkeyup ="checkPass(); return false;"><span id="confirmMessage" class="confirmMessage"></span>
			</div>
		</div>
		<div>
			<input class="btn btn-lg btn-primary" type = "submit" name = "Submit" id = "Submit" value = "Submit">
		</div>
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
