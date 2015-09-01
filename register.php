<!DOCTYPE html>
<html>
	<head>
	<title>Register</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="styles/styles.css">
	<script type="text/javascript" src="scripts/register_val.js"></script>
	<?php include 'scripts/register_val.php';?>
	</head>
	
	<body>
	<div class="wrapper">
	
			<header>
	
				<nav>
					
					<a href="index.php"><img src="graphics/logo.jpg"></a>
			
					<ul>
						
						<li><a href="login.php">Login</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="help.php">Help</a></li>
					</ul>			
				</nav>
			</header>
	
	<!--FORM FOR THE USER TO FILL OUT-->
	<div id="register_form">
	
	<h1>Register For An Account</h1>
	<form id="regform" name="Register_form" onsubmit="Register_Success.php" action="scripts/register_val.php"  method="post">
	
		<label>First Name: </label><input type="text" name="firstname" id="Fname" onkeyup ="checkvalue('Fname', 'MissingFirstName');"><span id="MissingFirstName">*</span><p>
		<label>Last name: </label><input type="text" name="lastname" id="Lname" onkeyup ="checkvalue('Lname', 'MissingLastName');"><span id="MissingLastName">*</span><p>
		<label>Email Address: </label><input type="text" name="email" onchange ="validate_email(this,'MissingEmail');"><span id="MissingEmail">*</span><span id="invalid_email">Invalid email</span><p><p>
		<label>Secret Question: </label><input type="text" name="secretquestion" id="squestion" onkeyup ="checkvalue('squestion', 'Missingsecretquestion');"><span id="Missingsecretquestion">*</span><p>
		<label>Secret Answer: </label><input type="text" name="secretanswer" id="sanswer" onkeyup ="checkvalue('sanswer', 'Missingsecretanswer');"><span id="Missingsecretanswer">*</span><p>
		<label>Password: </label><input type="password" min = "6" id="pass" name="password" onkeyup ="checkvalue('pass', 'MissingPassword');"><span id="MissingPassword">*</span><p>
		<label>Confirm Password: </label><input type="password" id="cPass" name="cPassword" onkeyup ="checkvalue('cPass', 'MissingPasswordc');" onchange ="matching_passwords(this,'PasswordsDontMatch');"><span id="MissingPasswordc">*</span><span id="PasswordsDontMatch">Passwords dont match</span><p>	
		<input class="btn btn-alt" type = "submit" name = "submit" value = "Submit">
	</form>
	</div>
	
	<footer class="footer_relative">
		<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>
	</div>
	</body>
</html>
	