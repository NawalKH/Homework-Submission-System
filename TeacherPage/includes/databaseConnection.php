<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) 
	{ die("Connection failed");}

   if(!mysqli_select_db($conn,"submission_system"))
   { die("Connection to Database table failed");}

?>