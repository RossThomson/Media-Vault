	
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
	
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		</div>
        <div class="navbar-collapse collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index_bootstrap.php"><img src="graphics/logo.jpg" height="100" width="100"></a></li>
            <li><a href="about.php"><img src="graphics/about.png"></a><a href="about.php">About</a></li>
            <li><a href="help.php"><img src="graphics/help.png"></a><a href="help.php">Help</a></li>
          </ul>
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="<?php echo $login;?>_bootstrap.php"><label><?php echo $login;?></label></a></li>
  			<li><span id = "sign_in_info"><?php echo $welcome;?> <?php echo $_SESSION['first_name'];?></span></li>
		  </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>





