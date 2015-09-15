<?php
session_start();


if(session_destroy()) // Destroying All Sessions
{
header("Location: logout_success.php"); // Redirecting To Home Page
}
?>