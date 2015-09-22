
<?php

	
	$target_path = "uploads/";

$target_path = $target_path . basename( $_FILES['photo']['name']); 

if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['photo']['name']). 
    " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}

?>
