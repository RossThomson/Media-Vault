<?php  

$directory ='Recently Viewing file';

if ($handle = opendir($directory.'/'))  {
   echo looking file \''.$directory.'\':<br>';
   
   while ($file =  readdir($handle)) {
   if($file!='.'&&$file!='..') {
   echo '<a href=" '.$directory.'/'.file.'">'.$file.'</a><br>';
   }
 
 }
 
}
?>