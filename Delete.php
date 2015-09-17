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
	
	<form onsubmit = 'scripts/del_script.php' method = "POST">
		<fieldset>
	<?php
		$dbname = "Media_Lynx";
		$dbserver = "54.79.17.142";
		$dbuser = "root";
		$dbpass = "root";
		$Email = $_SESSION['email'];
		
		$conn = new mysqli($dbserver,$dbuser,$dbpass,$dbname);
		if(!$conn->connect_error) {
			die("Connection failed".$conn->connect_error);
		}
		
		echo"<legend>Your Files, ".$Email."</legend>";
		
		$sql = "SELECT USERID FROM User WHERE email = '$Email'";
		$user = $conn->query($sql);
		
		echo"<td>$user</td>";
		
		$newSql = "SELECT * FROM CONTENT WHERE USERID = '$user'";
		$result = $conn->query($newSql);
		
		if($result->num_rows > 0) {
			
			while($row = $result->fetch_assoc()) {
				$id = $row["CONTENTID"];
				echo '<ul style="lsit-style-type:none">';
				echo '	<li><input type = "checkbox" name = "$id"><label>'.$row["CONTENTTITLE"].'</label></li>';
				echo '	<li>'.$row["SYNOPSIS"].'</li>';
				echo '</ul>';
			} 
		}
		
		$conn->close();
	?>
		<input type = "submit" name = "Delete" Value = "Delete">
		</fieldset>
	</form>
	
	
	<footer class="footer_absolute">
		<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>
	</body>
</html>