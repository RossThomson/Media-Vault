<?php
session_start();
if(!isset($_SESSION['email'])){
header("location: Login.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
	<title>Media</title>	
	<!-- <link rel="shortcut icon" href="graphics/favicon.ico" />
	<link rel="stylesheet" href="styles/styles.css" type="text/css" media="screen" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> -->
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
<div class="wrapper">
	<header>
		<?php include 'header.php'; ?>
		<span id="sign_in_info"></span>
		<div id="media2_header_inside">
			<!-- <a href="index.php">
				<img src="graphics/logo.jpg">
			</a> -->
			<ul>
				<li><a href="media_playlist.php">Playlist</a></li>
				<li><a href="media_doc.php">Doc</a></li>
				<li><a href="media_photo.php">Photo</a></li>
				<li><a href="media_music.php">Music</a></li>
				<li><a class="active" href="media_video.php">Video</a></li>
				<li><a href="media_all.php">All files</a></li>
			</ul>		
		</div>
	</header>
</div>
	<!-- </div> -->
	<div class="media_divider"></div>
		<div class="media_content">
			<br><br><br><br>		
			<?php
				$conn=mysql_connect("localhost","root","root");
				mysql_select_db("MEDIALYNX",$conn);
				mysql_query("set names utf8");
				
				$output = '';

				$query = mysql_query("SELECT * FROM CONTENT") or die("could not search");
				$count = mysql_num_rows($query);
				if($count == 0){
					$output = 'There was no search result';
				} else {
					while($row = mysql_fetch_array($query)){
						$fileaddress=$row['address'];
						$fileid=$row['CONTENTID'];
						$file=pathinfo($fileaddress);
						$filetype=$file['extension'];

						if( $filetype=='mp4'){			
							$name = $row['CONTENTTITLE'];
							$id=$row['CONTENTID'];            		
							$tmp=$row['address'];
							$output.="<video width='880' height='480' controls>
							<source src='".$row['address']."' type='video/mp4'></video><br/>".$row['CONTENTTITLE']."<br/><br/>
			
							<form  method='post' action='/images/delete.php' >
							<input name='id' type='hidden' value='$row[id]' />
							<input type='submit' value='Delete'><br>
							</form>";
			  
							//$output .= "<div><a href='$tmp' target='blank'><img src='$tmp'><br>".$name."</a></div>";
						}		
					}
				}				
			?>

			
		</div>
	</div>
	<div class="media_divider"></div>
	</div>
	<br><br>
<div id="aboutus_content">	
<form action="upload_movie.php" method="post" enctype="multipart/form-data">
    Select a video to upload:
    <input type="file" name="fileName"/>
	<br />
	Description: <input name="ref" type="text" />
    <input type="submit" value="Submit" name="submit"/>
</form>

</div>
<br><br><br>
	
	<footer class="footer_relative">
	<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>

</body>
</html>