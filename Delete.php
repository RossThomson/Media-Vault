<?php
session_start();

if(!isset($_SESSION['email'])){
header("location: Login.php");
}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Delete files</title>

<link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<div class="wrapper">
	<header>
		<?php include 'header.php'; ?>
	</header>
	
	<div id="aboutus_content">	
	<br><br>
	
	<h2 class="aboutus_Headings">Your Files</h2><br>
	
	<table>
	
	<tr>
		<th>File</th>
	</tr>
	
	<?php
		$allFiles = array();
	
		foreach ((new DirectoryIterator(dirname(__FILE__))) as $file) {
			$allFiles[] = $file->getFilename();
		}

		foreach($allFiles as $value) {
			count = 0;
			echo '<tr>';
			echo '<td><input type = "checkbox" name = "$count">'.$value.'</td>';
			echo '</tr>';
			count = count + 1;
		}
	?>
	
	
	
	
	<footer class="footer_absolute">
		<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>
	</div>
	</body>
</html>