<?php

// define variables and set to empty values

$firstname = $lastname = $email= $secretanswer = $password = $secretquestion = "";
$dir = "/var/www/html/Media-Vault/uploads/";

function validate_form($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$firstname = validate_form($_POST["firstname"]);
	$lastname = validate_form($_POST["lastname"]);
	$email = validate_form($_POST["email"]);
	$password = validate_form($_POST["password"]);
	$secretquestion = validate_form($_POST["secretquestion"]);
	$secretanswer = validate_form($_POST["secretanswer"]);
	
	$hash = password_hash('$password', PASSWORD_DEFAULT);
	
	$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";

		try {
					$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$result = $pdo->query("SELECT EMAIL FROM  USERS WHERE EMAIL = '$email'");
					
					if ($result->rowCount() > 0)
					{	session_start();
						$_SESSION['error'] = "Email already registered";
						header("location: ../register.php");
					}
					
					else
					{ 
						$sql = "INSERT INTO USERS(FIRSTNAME, LASTNAME, EMAIL, SECRETQUESTION, SECRETANSWERS, HASH) VALUES ('$firstname','$lastname','$email','$secretquestion','$secretanswer','$hash')";
						
					$pdo->exec($sql);
					
					$userfolder = $dir.$firstname.$lastname;
					$userthumbs = $userfolder."/thumbs";
					
					mkdir("$userfolder");
					mkdir("$userthumbs");
 
 
					
				
						
					} 
				}
				
			catch(PDOException $e)
				{
					echo $e->getMessage();
				}

				$pdo = null;
				
	
	
}
if (isset($_POST['Submit']))
{
   session_start();
   mysql_connect('localhost','root','root');
   mysql_select_db("MEDIALYNX");
	$FIRSTNAME = MYSQL_REAL_ESCAPE_STRING($_POST['FIRSTNAME']);
	$LASTNAME = MYSQL_REAL_ESCAPE_STRING($_POST['LASTNAME']);
	$EMAILADDRESS = MYSQL_REAL_ESCAPE_STRING($_POST['EMAILADDRESS']);
	$SECRETQUESTION = MYSQL_REAL_ESCAPE_STRING($_POST['SECRETQUESTION']);
	$SECRETANSWER = MYSQL_REAL_ESCAPE_STRING($_POST['SECRETANSWER']);
	$PASSWORD = MYSQL_REAL_ESCAPE_STRING($_POST['PASSWORD']);
	$CONFIRMPASSWORD = MYSQL_REAL_ESCAPE_STRING($_POST['CONFIRMPASSWORD']);
	
	$ENC_PASSWORD = MD5($PASSWORD);
		MAIL($EMAILADDRESS,"MEDIAVAULT CONFIRM EMAIL",$MESSAGE,"FORM: DONOTREPLY@MEDIAVAULT.COM");
		
		ECHO "REGISTRATION COMPLETE! PLEASE CONFIRM YOUR MAIL ";
	IF ($FIRSTNAME && $LASTNAME && $EMAILADDRESS && $SECRETQUESTION && $SECRETANSWER && $PASSWORD && $CONFIRMPASSWORD )
	{
	    $CONFIRMCODE = RAND();
		$QUERY = MYSQL_QUERY("INSERT IN TO 'USERS' VALUES('','$FIRSTNAME','$LASTNAME','$EMAILADDRESS','$SECRETQUESTION','$SECRETANSWER','$PASSWORD','$CONFIRMPASSWORD','0','$CONFIRMCODE')");
	    $MESSAGE =
		"
		CONFIRM YOUR EMAIL
		CLICK THE LINK BELOW TO VERIFY YOUR ACCOUNT
		HTTP://54.79.17.142/INDEX.PHPS/EMAILCONFIRM.PHP?FIRSTNAME=$FIRSTNAME$CODE=$CONFIRMCODE
	    " ;
		MAIL($EMAIL,"MEDIAVAULT CONFIRM EMAIL",$MESSAGE,"FORM: DONOTREPLY@MEDIAVAULT.COM");
		
		ECHO "REGISTRATION COMPLETE! PLEASE CONFIRM YOUR MAIL ";
	}

	
}
else
{	ECHO "else cond";}








