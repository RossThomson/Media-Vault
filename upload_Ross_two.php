
<?php

	
	




$target = '/uploads/' . basename($_FILES['photo']['name']);
move_uploaded_file($_FILES['photo']['tmp_name'], $target);






?>
