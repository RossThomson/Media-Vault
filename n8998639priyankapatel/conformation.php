<?php

session_start();
$error = "problem connecting";
mysul_connect('localhost','root','root');
mysul_select_db("Media_Lynx");

$id = $_GET['id'];
$code = $_GET['code'];

if ($id&&$code)
{
     
    $check = mysql_query("SELECT * FROM users WHERE id='$id' AND random='$code'");
    $checknum = mysql_num_rows($check);
   if ($checknum==1)
     {
       $acti = mysql_query("UPDATE users SET activated='1' WHERE id= '$id'");
       die ("your account is activated");
     }
   else
       die ("Invalid id")

}

else
   die ("Data missing!");
?>php
