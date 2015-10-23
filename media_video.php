<?php
session_start();
	$firstname  = $_SESSION['first_name'];
	$lastname = $_SESSION['last_name'];
	$userid = $_SESSION['userid'];
	$dir = "uploads/";
	$target_dir = $dir.$firstname.$lastname."/";

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
	<script type="text/javascript" src="scripts/upload_val.js"></script>
	<script src="js/jquery-1.11.3.min.js"></script>
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
				<li><a href="media_playlist.php">Playlists</a></li>
				<li><a href="media_doc.php">Docs</a></li>
				<li><a href="image_gallery_test.php">Photos</a></li>
				<li><a href="media_music.php">Music</a></li>
				<li><a class="active" href="media_video.php">Videos</a></li>
				<li><a href="media_all.php">All files</a></li>
			</ul>		
		</div>
	</header>
</div>
	<!-- </div> -->
	
	

	
	
	<form class="upload_form" action="upload_movie.php" method="post" enctype="multipart/form-data" onsubmit="return checkVideoFile(this);">
    Select a video to upload:
    <input type="hidden" name="fileName" id="uploadfile" value="512000000/>
	<br />
	Description: <input name="ref" type="text" />
    <input type="submit" id="upload" value="Submit" name="submit"/>
</form>

<div class="toggle_button_div">
<a href="video_gallery_test.php" class="toggle_button">Video Gallery View</a>
</div>
	
	
	<div class="media_divider"></div>
		<div class="media_content">
			<br>		
			<?php
				@ $db = new mysqli('localhost', 'root', 'root', 'MEDIALYNX');
				if(mysqli_connect_errno())
				{
					echo "DB connect error";
				}		
				
				
				$query = "select * from CONTENT where CONTENTTYPE = 'VIDEO' and USERID = '$userid'";				
				$result = $db->query($query);
				$num_result = $result->num_rows;
			?>
	
			<table border='1' align="center">
				<thead>
					<tr>
                    	<th width="40">SELECT
                       </th>
						<th width="250">FILE</th>
						<th width="150">SIZE</th>
						<th width="200">SYNOPSIS</th>
						<th width="200">Thumbnail</th>
						<th width="50">DEL</th>
						<th width="50">View</th>
					</tr>
				</thead>
				<tbody>
					<?php
					
						for($i=0; $i<$num_result; $i++)
						{
							echo "<tr>";
						echo "<td align='center' padding='20'>";
						echo "<form id='form1' method='post'>";
	  					echo "<p>";
	    				echo "<input type='checkbox' name='chkbx' id='chkbx' />";
	    				echo "<label for='chkbx'>";
						echo "</label>";
      					echo "</p>";
						echo "</form>";
						echo "</td>";
							$row = $result->fetch_assoc();
							
							echo "<td align='left'>
						<a href='download.php?num=".$row['CONTENTID']."'>".$row['CONTENTTITLE']."</a></td>";
							echo "<td align='center'>".$row['SIZE']."</td>";
							echo "<td align='center'>".$row['SYNOPSIS']."</td>";
							echo "<td align='center'>";
							echo'<video src=  "' . $target_dir.$row['CONTENTTITLE'] . '" width = "150" height = "150" controls></video></td>';
							echo "<td align='center'>
						<a href='delete_jae.php?num=".$row['CONTENTID']."'>DEL</a></td>";
							echo "<td align='center'>";
						echo'<a href="' . $target_dir.$row['CONTENTTITLE'] . '">View</a></td>';
							echo "</tr>";
						}
						$db->close();
					?>
				</tbody>
			</table>
			
			<script type="text/javascript" src="scripts/check_for_empty_field.js"></script>
			
            <form  action="php_checkbox.php" id="form1" method="post">
            <input type = "submit" name = "submit" id = "submit" value = "Submit">
            </form>			
		</div>
	</div>
	<div class="media_divider"></div>
	</div>
	<br><br>
	




	
	<footer class="footer_relative">
	<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>

</body>
</html>