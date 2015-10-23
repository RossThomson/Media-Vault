<?php
session_start();


	$firstname  = $_SESSION['first_name'];
	$lastname = $_SESSION['last_name'];
	$userid = $_SESSION['userid'];
	$dir = "uploads/";
	$target_dir = $dir.$firstname.$lastname."/";

if(!isset($_SESSION['email'])){
header("location: Login_bootstrap.php");
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="scripts/upload_val.js"></script>
		<script src="./bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
		<!-- Custom styles for this template -->
		<link href="http://getbootstrap.com/examples/navbar-fixed-top/navbar-fixed-top.css" rel="stylesheet">
		
</head>

<body class="bodyMedia">
<div class="wrapper">
	<div class="container">
	<header>
		<?php include 'header_bootstrap.php'; ?>
	</header>
	</div>
<div class="container-fluid">
	<div class = "container">
		<ul class="nav nav-tabs nav-justified">
			<li><a href="media_all_bootstrap.php">All files</a></li>
			<li><a href="media_playlist.php">Playlists</a></li>
			<li  class="active disabled"><a class = "active" href="#">Docs</a></li>
			<li><a href="media_photo_bootstrap.php">Photos</a></li>
			<li><a href="media_music.php">Music</a></li>
			<li><a href="media_video.php">Videos</a></li>
		</ul>		
	</div>
</div>
</header>
<div class="container">
<h1>Upload your Files Here!</h1>
<div class="well-inverse well-lg" href="#" data-toggle="modal" data-target="#upload">
	<a href="#" class="body" data-toggle = "modal" data-target="#upload" role="button" >Upload</a>
</div>
</div>
<div id="upload" class="modal" roll="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header-inverse"> 
				<button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></button>
				<h1>Upload</h1>
				<small>Please fill all areas</small>
			</div>
			<div class="modal-body-inverse">
			<form  class="form-horizontal" role="form" id="UploadForm" action="upload_doc_new_dir.php" method="post" enctype="multipart/form-data" onsubmit="return checkDocFile(this);">
				<div class="form-group">
					<label  class="col-sm-2 control-label" for="fileName">Select a document to upload:</label>
					<div class="col-sm-9">
						<input class="form-control" id="Document" type="file" name="fileName">
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

	<div class="media_divider"></div>
		<div class="media_content">
			<br><br><br><br>
	<?php
        @ $db = new mysqli('localhost', 'root', 'root', 'MEDIALYNX');
        if(mysqli_connect_errno())
        {
            echo "DB connect error";
        }

        $query = "select * from CONTENT where CONTENTTYPE = 'DOC' and USERID = '$userid'";
        $result = $db->query($query);
        $num_result = $result->num_rows;
    ?>
	
	<table border='1' class="table" align="center">
        <thead>
            <tr>
				<th class="col-lg-1">SELECT</th>
                <th class="col-lg-2">FILE</th>
                <th class="col-lg-1">SIZE</th>
				<th class="col-lg-2">SYNOPSIS</th>
                <th class="col-lg-1">DEL</th>
				<th class="col-lg-1">VIEW</th>
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
                    //echo "<tr>";
                    echo "<td align='left'>
                <a href='download.php?num=".$row['CONTENTID']."'>".$row['CONTENTTITLE']."</a></td>";
                    echo "<td align='center'>".$row['SIZE']."</td>";
					echo "<td align='center'>".$row['SYNOPSIS']."</td>";

                    echo "<td align='center'>
                <a href='delete_jae.php?num=".$row['CONTENTID']."' onClick=\"return 
							confirm('are you sure you want to delete??');\">DEL</a></td>";

					echo "<td align='center'>
					<a href='". $target_dir.$row['CONTENTTITLE']."'>View</a></td>";

                    echo "</tr>";
                }
                $db->close();
				//Testing..
            ?>
        </tbody>
    </table>	
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