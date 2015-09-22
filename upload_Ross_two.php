<?php

	
			//move it to where we want it to be
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/".$new_file_name);
			echo "Congratulations!  Your file was accepted.";
]

?>