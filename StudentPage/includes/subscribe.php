<?php
session_start();


include('databaseConnection.php');
$query="";
if(isset($_SESSION["user"])){
  $user=$_SESSION["user"];

  if(isset($_POST["courses"])){
  	$courses=$_POST["courses"];
$arr= explode(",",$courses);
$count= count($arr);



$i=0;
while($i<$count){
$query = " INSERT INTO `students_requests`(`studentID`, `course_code`) VALUES ('$user','$arr[$i]') ";
$result = mysqli_query($conn,$query);
    if (!$result) {

     die('Invalid query: ' . mysqli_error($conn));
     }

$i=$i+1;

}

}
else{echo "ERROR";}
}

else{echo "ERROR";}
if($result) // will return true if succefull else it will return false
{
echo "1";
}
else{
 echo "Error: " . $query . "<br>" . mysql_error($conn);
 }
?>