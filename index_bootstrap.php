
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
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="http://getbootstrap.com/favicon.ico">
		<title>Media Lynx</title>
		<!-- Bootstrap core CSS -->
		<link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="http://getbootstrap.com/examples/navbar-fixed-top/navbar-fixed-top.css" rel="stylesheet">
	</head>
	<body>
	<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <img class="navbar-brand" href="http://getbootstrap.com/examples/navbar-fixed-top/#" <a="" src="graphics/logo.png">Media Lynx</img>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index_bootstrap.php">Home</a></li>
            <li><a href="about.php"><img src="graphics/about.png"></a><a href="about.php">About</a></li>
            <li><a href="help.php"><img src="graphics/help.png"></a><a href="help.php">Help</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<div class="container">
		<header>
			<?php include 'header_bootstrap.php'; ?>
		</header>

	<div class="jumbotron">
        <h1>Welcome to Media Lynx!</h1>
        <p>It's like Netflix, but for your own content!</p>
        <p>
          <a class="btn btn-lg btn-primary" href="register.php" role="button">Register now »</a>
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