<?php
session_start();
	
$firstname  = $_SESSION['first_name'];
$lastname = $_SESSION['last_name'];
$userid = $_SESSION['userid'];
$contentid = $_SESSION['contentid'];


$filename = basename($_FILES["fileName"]["name"]);

if(isset($_POST["submit"])) {
	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";
	
	
	$type = "MUSIC";

		try {
			$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
		
			$sql = "INSERT INTO PLAYLIST(USERID, CONTENTTITLE, CONTENTTYPE) VALUES ('$userid','$filename','$type') where CONTENTID = '$contentid'";
			
			//include 'library/closedb.php';
			$pdo->exec($sql);
			//header("location: upload_doc.php");
		}
				
		catch(PDOException $e){
			echo $e->getMessage();
		}

		$pdo = null;
			header("location: media_music.php");
			echo "<script>alert('Files added to Playlist');";
		
}
?>