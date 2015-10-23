<?php

session_start();	
$firstname  = $_SESSION['first_name'];
$lastname = $_SESSION['last_name'];
$userid = $_SESSION['userid'];
$dir = "uploads/";
$target_dir = $dir.$firstname.$lastname."/";


$target_file = $target_dir . basename($_FILES["fileName"]["name"]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
$filename = basename($_FILES["fileName"]["name"]);
$filesize = $_FILES["fileName"]["size"];
$synopsis = $_POST['ref'];

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

/*if ($_FILES["fileName"]["size"] > 5368709120) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}*/

if($FileType != "mp4" && $FileType != "mpeg" && $FileType != "avi") {
    echo "Sorry, only mp4, mpeg & avi files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
    if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileName"]["name"]). " has been uploaded.";
		
		$withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);
		$videothumbnail = $target_dir.$withoutExt."tb".".jpg";
		

 shell_exec("ffmpeg -i $target_file -deinterlace -an -ss 1 -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $videothumbnail 2>&1");
		
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if(isset($_POST["submit"])) {
	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";
	
	$type = "VIDEO";

		try {
			$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
		
			$sql = "INSERT INTO CONTENT(USERID, CONTENTTITLE, CONTENTTYPE, SIZE, SYNOPSIS) VALUES ('$userid','$filename','$type','$filesize','$synopsis')";
			
			//include 'library/closedb.php';
			$pdo->exec($sql);
			//header("location: upload_doc.php");
		}
				
		catch(PDOException $e){
			echo $e->getMessage();
		}

		$pdo = null;
		header("location: media_video.php");
		echo "<script>alert('uploaded');";
}
?>