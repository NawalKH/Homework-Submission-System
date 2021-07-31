<?php

include "databaseConnection.php";
if(isset($_POST['search'])){
	$search=$_POST['search'];


  $sql= "SELECT `homework`.`description`,`homework`.`deadline`,`homework`.`URL`,`submissions`.`submissionID`,`submissions`.`homeworkTitle`,`submissions`.`submissionURL`,`submissions`.`studentID`,`submissions`.`submissionDate`,`submissions`.`grade`,`submissions`.`course`,`teacher`.`first_name`,`teacher`.`last_name` FROM `submissions` INNER JOIN `teacher` INNER JOIN `homework` WHERE `submissions`.`teacherID`=`teacher`.`ID` and `submissions`.`homeworkTitle`='$search' and `submissions`.`studentID`='213213213'";
$res= mysql_query($sql);
if(!$res){
   die("Error: ".mysql_error());
}
if(mysql_num_rows($res)==0)
echo "not found";
else{
while ($row=mysql_fetch_assoc($res)){
   echo 
  "homeworkTitle: {$row['homeworkTitle']} <br>
  submissionURL: {$row['submissionURL']}<br>
  description: {$row['description']} <br>
  URL: {$row['URL']}"; 

}
}
}

?>
