<?php
include('databaseConnection.php');
$query="";
if(isset($_POST['type'])){
  $type=$_POST['type'];
  
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$Password= $_POST['Password'];
$ID=$_POST['ID'];
$Phone_Number=$_POST['Phone_Number'];
$Email=$_POST['Email'];
$pass= hash('ripemd160', $Password);

   if($type=="Teacher"){
$query = "INSERT INTO `teacher`(`first_name`, `last_name`, `Password`, `ID`, `Email`, `Phone_Number`)VALUES ('$first_name','$last_name','$pass','$ID','$Email','$Phone_Number')";
}

if($type=="Student"){
 $query = "INSERT INTO Student(first_name, last_name, ID, Email,Phone_Number, Password) VALUES ('$first_name','$last_name','$ID','$Email','$Phone_Number','$pass')";
 }
   if(mysql_query($query)) // will return true if succefull else it will return false
{
echo "you have registered succefully";
}
else{
  echo "Error: " . $query . "<br>" . mysql_error($con).$PhoneNo;
 }
}

?>