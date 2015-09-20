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
	
	<form id = "delform" name = "Delete Form" onsubmit = 'scripts/del_script.php' method = "POST">
		<fieldset>
	<?php
		$dbname = "MEDIALYNX";
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "root";
		$name = $_SESSION['first_name'];
		$Email = $_SESSION['email'];
		
		$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
		
		$q1 = $conn->query("SELECT * FROM USERS WHERE EMAIL = '$Email'");
		$q2 = $q1->fetch(); 
		$user = $q2['USERID'];
		
		echo"<legend>Your Files, ".$name."</legend>";
				
		$q3 = $conn->query("SELECT * FROM CONTENT WHERE USERID = '$user'");
		while($q4 = $q3->fetch()) {
			$id = $q4['CONTENTID'];
			echo '<ul style="list-style-type:none">';
			echo '	<li><input type = "checkbox" name = "$id"><label>'.$q4['CONTENTTITLE'].'</label></li>';
			echo '	<li>'.$q4["SYNOPSIS"].'</li>';
			echo '</ul>';
		}
		echo '<input class = "btn btn-alt" type = "submit" id = "submit" name = "Delete" Value = "Delete">';
		
		$conn->close();
	?>
		</fieldset>
	</form>
	<footer class="footer_absolute">
		<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>
	</body>
</html>