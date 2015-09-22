<?php

	

		
		$new_file_name = strtolower($_FILES["fileToUpload"]["name"]); 
		if($_FILES["fileToUpload"]["size"] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			echo "Oops!  Your file\'s size is to large.";
		}
		
		
		if($valid_file)
		{
			//move it to where we want it to be
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/".$new_file_name);
			echo "Congratulations!  Your file was accepted.";
		}
		

	
	

	


?>