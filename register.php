



test
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
						
						<li><a href="Login.php">Login</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="help.php">Help</a></li>
					</ul>			
				</nav>
			</header>
	
	<!--FORM FOR THE USER TO FILL OUT-->
	<div id="register_form">
	
	<h1>Register For An Account</h1>
	<form id="regform" name="Register_form" onsubmit="scripts/register_val.js" action="scripts/register_val.php"  method="post">
		<fieldset>
		<p><span id="error_message"><?php session_start(); echo $_SESSION['error'];?></span></p>
		<p><label>First Name: </label><input type="text" name="firstname" id="name" required onchange="firstNameVal();">*<span id ="namemessage"></span></p>
		<p><label>Last name: </label><input type="text" name="lastname" id="surname" required onchange="surnameVal();">*<span id ="surnamemessage"></span></p>
		<p><label>Email Address: </label><input type="text" name="email" id="email" required onchange ="checkEmail();">*<span id ="emailmessage"></span></p>
		<p><label>Secret Question: </label><input type="text" name="secretquestion" required>*</p>
		<p><label>Secret Answer: </label><input type="text" name="secretanswer" required>*</p>
		<p><label for="password">Password: </label><input type="password" min = "6" max = "15" id="password" name="password" required>*</p>
		<p><label for="cPassword">Confirm Password: </label><input type="password" id="cPassword" name="cPassword" required onkeyup ="checkPass(); return false;">*<span id="confirmMessage" class="confirmMessage"></span></p>
		<p><input class="btn btn-alt" type = "submit" name = "submit" id = "submit" value = "Submit">
		</fieldset>
		</form>
<?php
if (isset($_POST['submit']))
{
   session_start();
   mysql_connect('localhost','root','root');
   mysql_select_db("Media_Lynx");;
	
	$FirstName = mysql_real_escape_string($_POST['FirstName']);
	$LastName = mysql_real_escape_string($_POST['LastName']);
	$EmailAddress = mysql_real_escape_string($_POST['EmailAddress']);
	$SecretQuestion = mysql_real_escape_string($_POST['SecretQuestion']);
	$SecretAnswer = mysql_real_escape_string($_POST['SecretAnswer']);
	$Password = mysql_real_escape_string($_POST['Password']);
	$ConfirmPassword = mysql_real_escape_string($_POST['ConfirmPassword']);
	
	$enc_password = md5($Password);
	
	if ($FirstName && $LastName && $EmailAddress && $SecretQuestion && $SecretAnswer && $password && $ConfirmPassword )
	{
	    $confirmcode = rand();
		$query = mysql_query("INSERT IN TO 'users' VALUES('','$FirstName','$LastName','$EmailAddress','$SecretQuestion','$SecretAnswer','$password','$ConfirmPassword','0','$confirmcode')");
	    $message =
		"
		Confirm your Email
		Click the link below to verify your account
		http://54.79.17.142/index.phps/emailconfirm.php?FirstName=$FirstName$code=$confirmcode
	    " ;
		mail($email,"MediaVault confirm Email",$message,"Form: DoNotReply@mediavault.com");
		
		echo "Registration complete! Please confirm your mail ";
	}
?>	
	
	</div>
	
	<footer class="footer_relative">
		<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>
	</div>
	</body>
</html>
	
