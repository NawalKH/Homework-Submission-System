<?php
session_start();

if (!isset($_SESSION["user"])) {
header ("Location:../index.php");

}
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "submission_system";
 
       // Create connection
 
       $conn = new mysqli($servername, $username, $password, $dbname);
 
       // Check connection
 
       if ($conn->connect_error) {
 
           die("Connection failed: " . $conn->connect_error);
 
       } 

	 $student= $_SESSION["user"];
       $sql = "SELECT * FROM `submissions` WHERE `studentID`='$student' AND `grade`!= 'NULL' AND `seen`!=1" ;
       $result = $conn->query($sql);
       $row = $result->fetch_assoc();
       $count = $result->num_rows;
       echo $count;
       $conn->close();
?>