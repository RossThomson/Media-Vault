<?php

	

		
		$new_file_name = strtolower($_FILES["fileToUpload"]["name"]); 		

			//move it to where we want it to be
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/test");
			echo "Congratulations!  Your file was accepted.";
?>