<?php



session_start();
	
$firstname  = $_SESSION['first_name'];
$lastname = $_SESSION['last_name'];
$userid = $_SESSION['userid'];
$dir = "uploads/";
$target_dir = $dir.$firstname.$lastname."/";

$target_file = $target_dir . basename($_FILES["chkbx"]["name"]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
$filename = basename($_FILES["chkbx"]["name"]);
$filesize = $_FILES["chkbx"]["size"];
$synopsis = $_POST['ref'];

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["chkbx"]["size"] > 5000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($FileType != "mp3" && $FileType != "mp2") {
    echo "Sorry, only MP3 files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
    if (move_uploaded_file($_FILES["chkbx"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["chkbx"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if(isset($_POST["submit"])) {
	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";
	
	
	$type = "MUSIC";

		try {
			$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
		
			$sql = "INSERT INTO PLAYLIST(USERID, CONTENTTITLE, CONTENTTYPE) VALUES ('$userid','$filename','$type')";
			
			//include 'library/closedb.php';
			$pdo->exec($sql);
			//header("location: upload_doc.php");
		}
				
		catch(PDOException $e){
			echo $e->getMessage();
		}

		$pdo = null;
			header("location: media_music.php");
			echo "<script>alert('uploaded');";
		
}
?>