<?php
if(!is_dir("uploads")){
	mkdir("uploads");
}

function savedata(){
	global $_FILES, $_POST;
}

$putItAt = "uploads/".basename($_FILES['uploadedfile']['name']);
$putItAt = str_replace("php","txt", $putItAt);

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$putItAt)){
	header("location: listfiles.php");
} else{
	if(copy($_FILES['uploadedfile']['tmp_name'],$putItAt)){
		header("location: listfiles.php");
	}else{
		echo 'You totally failed. click <a href="index.php">here</a> to go back and try again';
	}
}
?>