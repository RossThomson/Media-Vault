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
<link rel="stylesheet" href="styles/styles.css">
<script type="text/javascript" src="scripts/upload_val.js"></script>
<?php include 'scripts/image_gallery_script.php'; ?>
<?php include 'scripts/image_list_view_test.php'; ?>
<style type="text/css">
#pictures li {
	float:left;
	height:<?php echo ($max_height + 10); ?>px;
	list-style:none outside;
	width:<?php echo ($max_width + 10); ?>px;
	text-align:center;
}
img {
	border:1px solid #021a40;
	outline:none;
}
</style>
</head>
<body>

<div class="wrapper">
	<header>
		<?php include 'header.php'; ?>
		<span id="sign_in_info"></span>
		<div id="media2_header_inside">
			<!-- <a href="index.php">
				<img src="graphics/logo.jpg">
			</a> -->
			<ul>
				<li><a href="media_playlist.php">Playlists</a></li>
				<li><a href="media_doc.php">Docs</a></li>
				<li><a class="active" href="image_gallery_test.php">Photos</a></li>
				<li><a href="media_music.php">Music</a></li>
				<li><a href="media_video.php">Videos</a></li>
				<li><a href="media_all.php">All files</a></li>
			</ul>		
		</div>
	</header>
</div>


<form class="upload_form" action="upload_Ross_two.php" method="post" enctype="multipart/form-data" onsubmit="return checkImageFile(this);">
    Select an image to upload:
    <input type="file" name="photo"/>
	<br />
	Description: <input name="ref" type="text" />
    <input type="submit" value="Submit" name="submit"/>
</form>

<?php listView(); ?>





<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>

<br><br><br>
	<footer class="footer_relative">
	<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>

</body>
</html>
