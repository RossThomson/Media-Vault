<?php
session_start();

if(!isset($_SESSION['email'])){
header("location: Login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Document files</title>

<link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<div class="wrapper">
	<header>
		<?php include 'header.php'; ?>
	</header>
	
	<div id="aboutus_content">	
	<br><br>	
	<h2 class="aboutus_Headings">Your document files</h2><br>
	<a href="media_movie.php">movie</a> &nbsp <a href="media_document.php">document</a> &nbsp <a href="media_photo.php">photo</a> &nbsp <a href="media_music.php">music</a>
	</div>

	<div class="media_divider"></div>
		<div class="media_content">
					
			<table align="center">
				<tr>
					<th class="media_first"><strong>upload</strong> date</th>
					<th><strong>size</strong></th>
					<th><strong>file</strong> name</th>
					<th><strong>function</strong></th>
				</tr>
				<tr class="media_rowA">
					<td class="media_first"><span class="media_date">09.02.2015</span></td>
					<td>1.2MB</td>
					<td>Test.txt</td>
					<td><a href="#">watch</a> &nbsp &nbsp &nbsp <a href="#">download</a> &nbsp &nbsp &nbsp <a href="#">remove</a> &nbsp &nbsp &nbsp <a href="#">modify</a>
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
	<br><br><br>
				
	<footer class="footer_relative">
	<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>

</body>
</html>