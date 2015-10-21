<?php
session_start();
	

if(isset($_POST["submit"])) {
	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";
	
	
	$type = "MUSIC";

		try {
			$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
		
			$sql = "INSERT INTO PLAYLIST(USERID, CONTENTTITLE, CONTENTTYPE, SIZE) VALUES ('$userid','$filename','$type')";
			
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