
<?php

	//if no errors...
	
			$currentdir = getcwd();
			$target = $currentdir .'/uploads/' . basename($_FILES['photo']['name']);
			move_uploaded_file($_FILES['photo']['tmp_name'], $target);
			echo 'Congratulations!  Your file was accepted.';
	


?>
