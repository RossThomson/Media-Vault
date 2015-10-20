	
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
      <div class="container-fluid">
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
          <ul class="nav navbar-nav">
            <li><a href="about_bootstrap.php"><span class="glyphicon glyphicon-info-sign"></span>About</a></li>
            <li><a href="help.php"><span class="glyphicon glyphicon-book"></span>Help</a></li>
          </ul>
		  <ul class="nav navbar-nav navbar-right">
		    <li><span id = "sign_in_info"><?php echo $welcome;?> <?php echo $_SESSION['first_name'];?></span></li>
			<li><a href="<?php echo $login;?>_bootstrap.php"><label class="label"><?php echo $login;?></label></a></li>
		  </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>





