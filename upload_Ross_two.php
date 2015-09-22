
<?php

	
	




$currentdir = getcwd();
echo "$currentdir";
$target = "http://54.79.17.142/Media-Vault/uploads/" . basename($_FILES['photo']['name']);
move_uploaded_file($_FILES['photo']['tmp_name'], $target);
$Check = $_FILES[“myFile”][“error”];
echo "$Check";





?>
