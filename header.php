	
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
	
	<nav>
			<a href="index.php"><img src="graphics/logo.jpg"></a>
			<ul>
				<li><a href="<?php echo $login?>.php"><?php echo $login;?></a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="help.php">Help</a></li>
			</ul>	
			<span id = "sign_in_info"><?php echo $welcome;?>" "<?php echo $_SESSION['email'];?></span>
	</nav>




