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
				<?php include 'header.php'; ?>
			</header>
			
			
	
	<!--FORM FOR THE USER TO FILL OUT-->
	<div id="register_form">
	
	<h1>Register For An Account</h1>
	<form id="regform" name="Register_form" onsubmit="scripts/register_val.js" action="scripts/register_val.php"  method="Post">
		<fieldset>
		<p><span id="error_message"><?php session_start(); echo $_SESSION['error'];?></span></p>
		<p><label>First Name: </label><input type="text" name="firstname" id="name" required onchange="firstNameVal();">*<span id ="namemessage"></span></p>
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
	<?php 
if(isset($_POST['submit'])){
    $to = "ppriyanka211@yahoo.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" ;
    $message2 = "Here is a copy of your message " . $first_name . ";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>
	<footer class="footer_relative">
		<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>
	</div>
	</body>
</html>
	
