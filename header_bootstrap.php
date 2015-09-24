	
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
			<span id = "sign_in_info"><?php echo $welcome;?> <?php echo $_SESSION['first_name'];?></span>
	</nav>




