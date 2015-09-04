
<?php


if(!isset($_SESSION['email'])){
header("location: index.php");
}
?>


<!DOCTYPE html>

<html id="Homepage_pic">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="refresh" content="60">
		<link rel="stylesheet" href="styles/styles.css">
		<title>Media Lynx</title>
	</head>
	<body>
	<div class="wrapper">
			
			<header>
				<?php include 'header.php'; ?>
			</header>

			<div id = "register_success">
			<h2> Congratulations, you are now a member of MediaLynx</h2>
			</div>
					<footer class="footer_absolute">
					<span id="jae_design-by">Design by Media lynx</span> 
						Copyright &copy; Media Lynx 2015.
					</footer>
		<?php  header('Refresh: 2; URL= media.php'); ?>	
	</div>
	</body>
	</html>