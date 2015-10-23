	
<?php	
	session_start();
	if(isset($_SESSION['email'])) 
	
	{
		$login = "Logout";
		$welcome = "Welcome";
	
	}
	
	else 
	{
		$login = "Login";
		$welcome = "";
	}


	
	?>
	
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <a href="index_bootstrap.php" class="navbar-brand"><img alt="brand" src="graphics/logo.jpg" class="img-responsive"></a>
		</div>
        <div class="navbar-collapse collapse" id="navbar">
			<div class="col-sm-6 col-md-6 pull-left">
				<ul class="nav navbar-nav">
					<li><a href="#" data-target = "#aboutModal" data-toggle="modal"><span class="glyphicon glyphicon-info-sign"></span>About</a></li>
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-book"></span>Help</a>
					<ul class="dropdown-menu">
						<li><a href="#" data-target="#helpFAQ" data-toggle="modal">FAQs</a></li>
						<li><a href="#" data-target="#fileTypes" data-toggle="modal">File Types</a></li>
						<li><a href="#" data-target="#contactUs" data-toggle="modal">Contact Us</a></li>
					</ul>
				</li>
			</ul>
		<ul class="nav navbar-nav navbar-right">
		    <li><span id = "sign_in_info" class="label"><?php echo $welcome;?><br> <?php echo $_SESSION['first_name'];?></span></li>
			<li><a href="<?php echo $login;?>_bootstrap.php"><label class="label"><?php echo $login;?></label></a></li>
		  </ul>
        </div>
      </div>
    </nav>
	<div id="aboutModal" class="modal" role="dialog" tabindex="-1">
		<div class="modal-dialog">
			<div class = "modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></button>
					<h1>About</h1>
				</div>
				<div class="modal-body">
					<p>MediaLynx provides users with a private online media vault, where you can upload all your media files, including music,
					movies, ebooks and photos.  MediaLynx is a free to use service and provides the perfect secure platform to store and access
					your media on all your devices.  Join today and see why everyone loves MediaLynx.</p>
				</div>
			<div class="modal-footer">
				<div class="col-sm-12">
					<button class="btn" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div id="helpFAQ" class="modal" tabindex="-1">
		<div class="modal-dialog">
			<div class = "modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></button>
					<h1>Frequently Asked Questions (FAQ)</h1>
				</div>
				<div class="modal-body">	
					<h3>How do I create an account on Media Lynx?</h3>				
					<p>New users can create an account through the <a href="register_bootstrap.php">registration</a> page</p>
					<h3>I've forgotten my password! What can I do?</h3>
					<p>Registered users can recover their password <a href="password_recovery_bootstrap.php">here</a></p>
					<h3>How do I upload files?</h3>
					<p>Each page will allow someone to upload that particular file type there</p>
					<h3>How can I view and remove the files I have uploaded?</h3>
					<p>Once logged in, users can view a list of their uploaded files and remove items via the relevant tabs</p>
					<h3>Why can't I connect to Media Lynx?</h3>
					<p>To use Media Lynx, you must have an internet connection, data and a compatible device</p>
					<h3>Media Lynx says my account is already in use when I try to open my content</h3>
					<p>Unfortunately, Media Lynx only supports one screen per user at this time. 
					Watch this space, as multiple screens and sharing content with friends is coming soon!</p>
				</div>
				<div class="modal-footer">
					<div class="col-sm-12">
						<button class="btn" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="fileTypes" class="modal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></button>
					<h1>Relevant File Types</h1>
				</div>
				<div class="modal-body">
					<table style="width=device-width">
					<tr>
						<th>Content</th>
						<th>Compatible file formats</th>
					</tr>
					<tr>
						<td>Videos</td>
						<td>.mkv, .flv, .vob, .gif, .avi, .mov, .qt, .wmv, .mp4, .m4p, .m4v, .mpg, .mpeg, .m2v, .m4v and .3gp</td>
					</tr>
					<tr>
						<td>Images</td>
						<td>.tif, .png, .gif, .jpg, .jpeg, .raw, .bmp, .psd and .psp</td>
					</tr>
					<tr>
						<td>Audio</td>
						<td>.3gp, .aac, .flac, .m4a, .mp3, .raw, .wav, .wma and .webm</td>
					</tr>
					<tr>
						<td>Documents</td>
						<td>.txt, .doc, .docm, .docx, .eps, .odt, .pdf, .rtf and .xml</td>
					</tr>
					</table>
				</div>
				<div class="modal-footer">
					<div class="col-sm-12">
						<button class="btn" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="contactUs" class="modal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></button>
					<h1>Contact Us</h1>
				</div>
				<div class="modal-body">
					<p>We are here to help and would appreciate your feedback:</p>
					<ul>
						<li>Email us at <a href="mailto:support@medialynx.com?Subject=Help%20page" target"_top">support@medialynx.com</a></li>
						<li>Call us on +61731380000</li>
					</ul>
				</div>
				<div class="modal-footer">
					<div class="col-sm-12">
						<button class="btn" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>