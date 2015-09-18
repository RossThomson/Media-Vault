<?php



if ($_FILES["uploadedFile"]["size"] < 10000)
{
  if ($_FILES["uploadedFile"]["type"] == "image")

{
 if ($_FILES["uploadedFile"]["error"] == 0)
{
 $filePath = "testFolder/";
$filePath = $filePath . basename( $_FILES['uploadedFile']['name']); 
if(move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $filePath)) 
{
 echo "The file ". basename( $_FILES['uploadedFile']['name'])." was uploaded successfully.";
} 
else
{
 echo "A problem occurred while uploading your file, please try again.";
}
} 
else
{
 echo "Something went wrong...";
}
}
else
{
 echo "Your file is not a gif filetype..";
}
}
else
{
 echo "Your file exceeds the maximum size of 10KB.";
}

error_reporting(E_ERROR | E_WARNING | E_PARSE);
?> 