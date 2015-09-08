<?php
	//Assuming we already have a connection opened (under conn) and we also have the user 
	//logged into their account and looking at their file.
	
	
	$userTable = "table";
	$filename = "FileName";
	
	$sql = "DELETE FROM " $userTable " WHERE File = "$filename;
	if($conn -> query($sql) === TRUE) {
		echo "Item has been deleted successfully";
	} else {
		echo "Item was not deleted successfully";
	}
?>