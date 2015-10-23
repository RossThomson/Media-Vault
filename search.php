<?php
include "conn.php";

$output = '';
if(isset($_POST['search'])){
	if($_POST['search']==" "){	
	$output ="<script>window.alert('Please enter keywords')</script>";
	} else{
	
    $searchq = $_POST['search'];
	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
	
	$query = mysql_query("SELECT * FROM CONTENT WHERE CONTENTTITLE LIKE '%$searchq%'") or die("could not search");
	$count = mysql_num_rows($query);
		if($count == 0){
			$output = 'There was no search result';
		} else {
			while($row = mysql_fetch_array($query)){
				$name = $row['CONTENTTITLE'];
				//$fileaddress=$row['address'];
				//$tmp=$row['address'];
				$fileid=$row['CONTENTID'];
				//$file=pathinfo($fileaddress);
				$filetype=$file['CONTENTTYPE'];

				if( $filetype=='pdf'){
					$output .= "<div><a href='$tmp' target='blank'><img src='/img/pdf.png'><br>".$name."</a></div><br/><br/>";
				}
				if($filetype=='VIDEO'){
					$output.="<video width='880' height='480' controls>
					<source src='uploads/JaeSim/ga.mp4' type='video/mp4'></video><br/>".$row['CONTENTTITLE']."<br/><br/>";
			    }
				if($filetype=='mp3'){
					$output.="<audio width='300' height='220' controls>
					<source src='".$row['address']."' type='video/mp4'></audio><br/>".$row['name']."<br/><br/>";
				}
				if($filetype=='jpg'){
					$output .= "<div><a href='$tmp' target='blank'><img src='$tmp'><br>".$name."</a></div><br/><br/>";
				}		
			}
		}
	}
}
?>