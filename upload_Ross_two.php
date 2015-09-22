<?php
//if they DID upload a file...
if($_FILES['fileToUpload']['name'])
{
	//if no errors...
	if(!$_FILES['fileToUpload']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$new_file_name = strtolower($_FILES['fileToUpload']['name']); //rename file
		if($_FILES['photo']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}
		
		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			move_uploaded_file($_FILES['fileToUpload']['tmp_name'], 'uploads/'.$new_file_name);
			$message = 'Congratulations!  Your file was accepted.';
		}
	}
	//if there is an error...
	else
	{
		//set that to be the returned message
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['fileToUpload']['error'];
	}
}

?>