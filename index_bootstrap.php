
<?php
include 'scripts/login_val.php'; // Includes Login Script

if(isset($_SESSION['email'])){
header("location: media.php");
}
?>



<!DOCTYPE html>

<html id="Homepage_pic">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<!-- Bootstrap core CSS -->
		<link href="bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="./bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
		<!-- Custom styles for this template -->
		<link href="http://getbootstrap.com/examples/navbar-fixed-top/navbar-fixed-top.css" rel="stylesheet">
	</head>
	<body>
	<!-- Fixed navbar -->

	<div class="container">
		<header>
			<?php include 'header_bootstrap.php'; ?>
		</header>

		<div class="jumbotron">
			<h1>Welcome to Media Lynx!</h1>
			<p>It's like Netflix, but for your own content!</p>
			<p>
			  <a href="#" data-toggle = "modal" data-target="#register" role="button">Register now</a>
			</p>
		 </div>
		<div id="register" class="modal" roll="dialog" tabindex="-1">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class=""modal-header">
						<button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></button>
						<h1>Register</h1>
						<small>Please fill all areas marked with an *</small>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" role="form" name="Register_form" onsubmit="scripts/register_val.js" action="scripts/register_val.php"  method="post">
							<p><span id="error_message"><?php session_start(); echo $_SESSION['error'];?></span></p>
							<div class="form-group">
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
					<div class="modal-footer">
						<div class="col-sm-12">
							<button class="btn" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		<footer class="footer_absolute">
		<span id="jae_design-by">Copyright &copy; Media Lynx 2015</span> 
		</footer>	
	</div>
		<script src="./Fixed Top Navbar Example for Bootstrap_files/jquery.min.js"></script>
		<script src="./Fixed Top Navbar Example for Bootstrap_files/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="./Fixed Top Navbar Example for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>