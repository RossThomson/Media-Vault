<?php
session_start();

if(!isset($_SESSION['email'])){
header("location: Login_bootstrap.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
	        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<!-- Bootstrap core CSS -->
		<link href="bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="./bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
		<script src="js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="scripts/check_for_empty_field.js"></script>
		<!-- Custom styles for this template -->
		<link href="http://getbootstrap.com/examples/navbar-fixed-top/navbar-fixed-top.css" rel="stylesheet">
</head>

<body class="bodyMedia">
<div class="container">
	<header>
		<?php include 'header_bootstrap.php'; ?>
	</header>
</div>
<div class="container-fluid">
	<div class = "container">
		<ul class="nav nav-tabs nav-justified">
			<li><a class="active" href="media_all_bootstrap.php">All files</a></li>
			<li><a href="media_playlist.php">Playlists</a></li>
			<li><a href="media_doc_bootstrap.php">Docs</a></li>
			<li  class="active disabled"><a href="#">Photos</a></li>
			<li><a href="media_music.php">Music</a></li>
			<li><a href="media_video.php">Videos</a></li>
		</ul>		
	</div>
</div>
</header>
<!-- </div> -->
<div class="container"></div>
<h1>Upload your Files Here!</h1>
<div class="well-inverse well-lg" href="#" data-toggle="modal" data-target="#upload">
	<a href="#" class="body" data-toggle = "modal" data-target="#upload" role="button" >Upload</a>
</div>
<h2>Or view your files in a gallery</h2>
<div class="well-inverse" href="image_gallery_test.php">
	<a href="image_gallery_test_bootstrap.php" class="body">Image Gallery</a>
</div>
	<?php
	
	session_start();
	$userid = $_SESSION['userid'];
	
	@ $db = new mysqli('localhost', 'root', 'root', 'MEDIALYNX');
		if(mysqli_connect_errno())
		{
			echo "DB connect error";
		}		
	
		$query = "select * from CONTENT WHERE CONTENTTYPE = 'IMAGE' AND USERID = '$userid'";
		$result = $db->query($query);
		$num_result = $result->num_rows;
	?>
<div class="container-fluid">
	<table border='1' align="center">
		<thead>
			<tr>
				<th class="col-lg-1">SELECT</th>
				<th class="col-lg-1">NUM</th>
				<th class="col-lg-2">FILE</th>
				<th class="col-lg-1">TYPE</th>
				<th class="col-lg-1">SIZE</th>
				<th class="col-lg-2">SYNOPSIS</th>
				<th class="col-lg-1">DEL</th>
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
		<form  action="php_checkbox.php" id="form1" method="post">
		<input type = "submit" name = "submit" id = "submit" value = "Submit">
		</form>			
</div>
<div class="media_divider"></div>
</div>
<br><br>
<div id="upload" class="modal" roll="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header-inverse"> 
				<button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></button>
				<h1>Upload</h1>
				<small>Please fill all areas</small>
			</div>
			<div class="modal-body-inverse">
			<form  class="form-horizontal" role="form" id="UploadForm" action="upload_Ross_two.php" method="post" enctype="multipart/form-data" onsubmit="return checkDocFile(this);">
				<div class="form-group">
					<label  class="col-sm-2 control-label" for="photo">Select a photo to upload:</label>
					<div class="col-sm-9">
						<input class="form-control" id="Document" type="file" name="photo">
					</div>
				</div>
				<div class="form-group">
					<label  class="col-sm-2 control-label" for="ref">Description:</label>
					<div class="col-sm-9">
						<input class="form-control" name="ref" type="text">
					</div>
				</div>
				<div>
					<input class="btn btn-lg btn-primary" type = "submit" name = "Submit" id = "Submit" value = "Submit">
				</div>
				</fieldset>
				</form>
			</div>
			<div class="modal-footer-inverse">
				<div class="col-sm-12">
					<button class="btn" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
	<br><br><br>
	<footer class="footer_relative">
	<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>

</body>
</html>