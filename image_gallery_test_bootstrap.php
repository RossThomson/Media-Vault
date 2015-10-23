<?php
session_start();

if(!isset($_SESSION['email'])){
header("location: Login.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UFT-8" />
<title>Pictures</title>
<link rel="stylesheet" href="styles/lightbox.css" type="text/css" media="screen" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<!--<link rel="icon" href="http://getbootstrap.com/favicon.ico">-->
<!--<title>Media Lynx</title>-->
<!-- Bootstrap core CSS -->
<link href="bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="./bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<!-- Custom styles for this template -->
<link href="http://getbootstrap.com/examples/navbar-fixed-top/navbar-fixed-top.css" rel="stylesheet">
<script type="text/javascript" src="scripts/upload_val.js"></script>
<script src="js/jquery-1.11.3.min.js"></script>
<?php include 'scripts/image_gallery_script.php'; ?>

<style type="text/css">
#pictures li {
	float:left;
	height:<?php echo ($max_height + 10); ?>px;
	list-style:none outside;
	width:<?php echo ($max_width + 10); ?>px;
	text-align:center;
}



</style>
</head>
<body class="bodyMedia">

<header>
	<?php include 'header_bootstrap.php'; ?>
<div class="container-fluid">
	<div class = "container">
		<ul class="nav nav-tabs nav-justified">
			<li><a href="media_all_bootstrap.php">All files</a></li>
			<li><a href="media_playlist.php">Playlists</a></li>
			<li><a href="media_doc_bootstrap.php">Docs</a></li>
			<li class="active disabled"><a class="active" href="media_photo_bootstrap.php">Photos</a></li>
			<li><a href="media_music.php">Music</a></li>
			<li><a href="media_video.php">Videos</a></li>
		</ul>		
	</div>
</div>
</header>

<script type="text/javascript" src="scripts/check_for_empty_field.js"></script>

<form class="upload_form" action="upload_Ross_two.php" method="post" enctype="multipart/form-data" onsubmit="return checkImageFile(this);">
    Select an image to upload:
    <input type="file" name="photo" id="uploadfile"/>
	<br />
	Description: <input name="ref" type="text" />
    <input type="submit" value="Submit" name="submit" id="upload"/>
</form>


<div class="toggle_button_div">
<a href="image_list.php" class="toggle_button">Image List View</a>
</div>

<?php getPictures(); ?>





<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<style type="text/css">
#imageData #bottomNavClose img{ content: url(styles/Gallery_icons/closelabel.gif);} 
</style>
<br><br><br>
	<footer class="footer_relative">
		Copyright &copy; Media Lynx 2015.
	</footer>

</body>
</html>
