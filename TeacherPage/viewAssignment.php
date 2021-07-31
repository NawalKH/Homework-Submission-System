<?php
include "includes/teacherMenu.php";
include "includes/databaseConnection.php";
//must be in all pages


if (!isset($_SESSION["user"])) {
header ("Location:../index.php");
}

$id= $_SESSION["user"];
$one ="SELECT `course_code` FROM `course` WHERE `teacherID`= '$id'";
$two = mysqli_query($conn,$one);

 echo "
  		<div class='table-responsive'> 
    <table  class='table table-hover table-bordered' >";
    echo"<thead>
        <tr>
        <th>course</th>
        <th>Title</th>
        <th>submitted student</th> 
        ";

while($row = mysqli_fetch_row($two))
{

$c =$row[0]; 

$sql = "SELECT * FROM `homework` WHERE `course`='$c'" ;
$records = mysqli_query($conn,$sql);



echo"    
    </tr>
    </thead>
    <tbody>";
     // output data of each row
     while($row =mysqli_fetch_assoc($records)) {

     							$title= $row['title'];
      									echo    "<tr>
                                                <td id='course_code'>$c</td>
                                                <td id='title'> $title</td>
                                                 <td id='linkS'> <a href='Assigment.php?title=$title&coursename=$c' > Display submitted student list</a> </td>
                                                 <td id='statue'></td>
                                                </tr> ";   
                                              
     				 } 
     				

 		}
echo "</tbody></table></div>";

  ?>


</table>
</body>
</html>


