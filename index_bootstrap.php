
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
		<script src="./bootstrap-3.3.5-dist/js/bootstrap.js"></script>
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
			  <a class="btn btn-lg btn-primary" href="register_bootstrap.php" role="button">Register now »</a>
			</p>
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