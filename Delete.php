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
		
		echo"<legend>Your Files, ".$user."</legend>";
				
		$q3 = $conn->query("SELECT * FROM CONTENT WHERE USERID = '$user'");
		$q4 = $q3->fetch();
		$id = $q4['CONTENTID'];
		
		echo'<ul style="list-style-type:none">';
		foreach($q4 as $value) {
			echo'<ul style="list-style-type:none">';
			echo'<li><input type="checkbox" name="$id">'.$value.'</li>';
			echo'</ul>';
		}
		
		/*if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$id[] = $row["CONTENTID"];
				echo '<ul style="list-style-type:none">';
				echo '	<li><input type = "checkbox" name = "$id"><label>'.$row["CONTENTTITLE"].'</label></li>';
				echo '	<li>'.$row["SYNOPSIS"].'</li>';
				echo '</ul>';
			}
		} else {
				echo '<ul style="list-style-type:none">';
				echo '	<li><label>No available content. Please <a href="upload.php">upload</a> files.</label></li>';
				echo '</ul>';
		}*/
		
		$conn->close();
	?>
		<input class = "btn btn-alt" type = "submit" id = "submit" name = "Delete" Value = "Delete">
		</fieldset>
	</form>
	<footer class="footer_absolute">
		<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>
	</body>
</html>