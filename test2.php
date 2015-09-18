<?php
session_start();

if(!isset($_SESSION['email'])){
header("location: Login.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
	<title>Media</title>	
	<!-- <link rel="shortcut icon" href="graphics/favicon.ico" />
	<link rel="stylesheet" href="styles/styles.css" type="text/css" media="screen" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> -->
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
<div class="wrapper">
	<header>
		<?php include 'header.php'; ?>/
		<span id="sign_in_info"></span>
		<div id="media2_header_inside">
			<!-- <a href="index.php">
				<img src="graphics/logo.jpg">
			</a> -->
			<ul>
				<li><a href="media_doc.html">Doc</a></li>
				<li><a href="media_photo.html">Photo</a></li>
				<li><a href="media_music.html">Music</a></li>
				<li><a class="active" href="media_video.html">Video</a></li>
			</ul>		
		</div>
	</header>
</div>
	<!-- </div> -->
	<div class="media_divider"></div>
		<div class="media_content">
			<br><br><br><br>		
			<table align="center">
				<tr>
					<th class="media_first"><strong>upload</strong> date</th>
					<th><strong>size</strong></th>
					<th><strong>file</strong> name</th>
					<th><strong>function</strong></th>
				</tr>
				<tr class="media_rowA">
					<td class="media_first"><span class="media_date">09.02.2015</span></td>
					<td>2.8GB</td>
					<td>Test.avi</td>
					<td><a href="watch.php">watch</a> &nbsp &nbsp &nbsp <a href="#">download</a> &nbsp &nbsp &nbsp <a href="#">remove</a> &nbsp &nbsp &nbsp <a href="#">modify</a>
				</tr>
				<tr class="media_rowB">
					<td class="media_first"><span class="media_date">N/A</span></td>
					<td>N/A</td>
					<td>N/A</td>
					<td><a href="#">watch</a> &nbsp &nbsp &nbsp <a href="#">download</a> &nbsp &nbsp &nbsp <a href="#">remove</a> &nbsp &nbsp &nbsp <a href="#">modify</a>
				</tr>
				<tr class="media_rowA">
					<td class="media_first"><span class="media_date">N/A</span></td>
					<td>N/A</td>
					<td>N/A</td>
					<td><a href="#">watch</a> &nbsp &nbsp &nbsp <a href="#">download</a> &nbsp &nbsp &nbsp <a href="#">remove</a> &nbsp &nbsp &nbsp <a href="#">modify</a>
				</tr>
				<tr class="media_rowB">
					<td class="media_first"><span class="media_date">N/A</span></td>
					<td>N/A</td>
					<td>N/A</td>
					<td><a href="#">watch</a> &nbsp &nbsp &nbsp <a href="#">download</a> &nbsp &nbsp &nbsp <a href="#">remove</a> &nbsp &nbsp &nbsp <a href="#">modify</a>
				</tr>
			</table>			
		</div>
	</div>
	<div class="media_divider"></div>
	</div>
	<br><br>
<div id="aboutus_content">	
	<!--<form enctype="multipart/form-data" action="upload_Ross.php" method="POST">
	<input type = "hidden" name="MAX_FILE_SIZE" value = "10000"/>
	Choose your file to upload: <input name="uploadedFile" type="file"/>
	
	<br />
	And what would you like to call it? <input name="title" type="text" />
	<input type="submit" value="Upload file" />
	</form> -->
	
	<form enctype="multipart/form-data" action="upload_Ross.php" method="POST">
 <input type="hidden" name="MAX_FILE_SIZE" value="10000" />
Choose a GIF file to upload: <input name="uploadedFile" type="file" /><br />
<input type="submit" value="Upload File" />
</form>
</div>	
	<br><br><br>
	<footer class="footer_relative">
	<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>
</body>
</html>