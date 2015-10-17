<?php
session_start();

if(!isset($_SESSION['email'])){
header("location: Login.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
	<title>Media</title>	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<!--<link rel="icon" href="http://getbootstrap.com/favicon.ico">-->
		<!--<title>Media Lynx</title>-->
		<!-- Bootstrap core CSS -->
		<link href="bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="http://getbootstrap.com/examples/navbar-fixed-top/navbar-fixed-top.css" rel="stylesheet">
		
</head>

<body>
<div class="container">
	<header>
		<?php include 'header_bootstrap.php'; ?>
	</header>
</div>
<div class="container-fluid">
	<span id="sign_in_info"></span>
		<div id="media2_header_inside">
			<ul>
				<li><a href="media_playlist.php">Playlists</a></li></li></li>
				<li><a href="media_doc.php">Docs</a></li></li></li>
				<li><a href="image_gallery_test.php">Photos</a></li></li></li>
				<li><a href="media_music.php">Music</a></li></li></li>
				<li><a href="media_video.php">Videos</a></li></li></li>
				<li><a class="active" href="media_all.php">All files</a></li></li></li>
			</ul>		
		</div>
	</header>
</div>
	<!-- </div> -->
	<div class="media_divider"></div>
		<div class="table">
			<br><br><br><br>		
			<?php
				@ $db = new mysqli('localhost', 'root', 'root', 'MEDIALYNX');
				if(mysqli_connect_errno())
				{
					echo "DB connect error";
				}		
				
				$userid = $_SESSION['userid'];
				$query = "select * from CONTENT where USERID = '$userid'";				
				$result = $db->query($query);
				$num_result = $result->num_rows;
			?>
			
			<table class="table" border='1' align="center">
				<thead>
					<tr>
						<th class="col-sm-2">NUM</th>
						<th class="col-sm-2">FILE</th>
						<th class="col-sm-2">TYPE</th>
						<th class="col-sm-2">SIZE</th>
						<th class="col-sm-2">SYNOPSIS</th>
						<th class="col-sm-2">DEL</th>
					</tr>
				</thead>
				<tbody>
					<?php
						for($i=0; $i<$num_result; $i++)
						{
							$row = $result->fetch_assoc();
							echo "<tr>";
							echo "<td align='center'>".$row['CONTENTID']."</td>";
							echo "<td align='left'>
						<a href='download.php?num=".$row['CONTENTID']."'>".$row['CONTENTTITLE']."</a></td>";
							echo "<td align='center'>".$row['CONTENTTYPE']."</td>";
							echo "<td align='center'>".$row['SIZE']."</td>";
							echo "<td align='center'>".$row['SYNOPSIS']."</td>";
							echo "<td align='center'>
						<a href='delete_jae.php?num=".$row['CONTENTID']."'>DEL</a></td>";
							echo "</tr>";
						}
						$db->close();
					?>
				</tbody>
			</table>			
		</div>
	</div>
	<div class="media_divider"></div>
	</div>
	<br><br>
	<br><br><br>
	<footer class="footer_relative">
	<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>

</body>
</html>