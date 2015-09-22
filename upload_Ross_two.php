
<?php

	
	




$currentdir = getcwd();
echo "$currentdir";
$target = $currentdir .'/uploads/' . basename($_FILES['photo']['name']);
move_uploaded_file($_FILES['photo']['tmp_name'], $target);
$Check = $_FILES[“myFile”][“error”];
echo "$Check";





?>
