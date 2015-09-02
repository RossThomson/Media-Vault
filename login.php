<!DOCTYPE html>
<html>
	<head>
	<title>Login</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="styles/styles.css">
	<script type="text/javascript" src="scripts/login_val.js"></script>
	<?php include 'scripts/login_val.php';?>
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
	<div id="login_form">
	
	<h1>Login To Your Account</h1>
	<form id="loginform" name="login_form" onsubmit="media.php" action="scripts/login_val.php"  method="post">
	
	
		<label>Email Address: </label><input type="text" name="email" required onchange ="validate_email(this,'MissingEmail');"><span id="MissingEmail">*</span><span id="invalid_email">Invalid email</span><p><p>
		<label>Password: </label><input type="password" min = "6" id="pass" name="password" required onkeyup ="checkvalue('pass', 'MissingPassword');"><span id="MissingPassword">*</span><p>
		<label><a href="password_recovery.php">Retrieve Password</a></label><br><br>
		<input class="btn btn-alt" type = "submit" name = "submit" value = "Submit">
	</form>
	</div>
	
	<footer class="footer_absolute">
		<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>
	</div>
	</body>
</html>
	