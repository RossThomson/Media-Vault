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
		<link rel="stylesheet" href="styles/styles.css">
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
	</div>
	<div class="media_divider"></div>
	</div>
	<br><br>
<div id="aboutus_content">	

<form action="upload_Ross_two.php" method="post" enctype="multipart/form-data">
    Select an image to upload:
    <input type="file" name="photo" id="uploadfile"/>
	<br />
	Description: <input name="ref" type="text" />
    <input type="submit" value="Submit" name="submit" id="upload"/>
</form>

</div>
	
	<br><br><br>
	<footer class="footer_relative">
	<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>

</body>
</html>