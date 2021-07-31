<?php  

include "includes/databaseConnection.php";
include "includes/teacherMenu.php";
//must be in all pages


if (!isset($_SESSION["user"])) {
header ("Location:../index.php");
}
?>



<style type="text/css">
  
   .container
  {
  width:100%;
 margin: auto; 
  background-color: white;
  }
</style>


<?php

    $teacherID = $_SESSION['user'];
   
     $query2 = mysqli_query($conn,"SELECT * FROM `course` WHERE `teacherID`='$teacherID'");
      



      print("

  <div class='container'>  
  <div class='table-responsive' >  
      
    <table class='table' style='width: 100%;' >
    <thead>
      <tr>
        <th  >Student Name</th>
        <th>Course</th>
      </tr>
    </thead>
    <tbody>"
    );


         while ($row = mysqli_fetch_assoc($query2))
         {
           $course  = $row['course_code'];
            $title =  $row['title']; 

          //echo $course;

        $query = mysqli_query($conn,"SELECT * FROM `students_requests` WHERE `course_code`='$course' ");
          

         while ($row = mysqli_fetch_assoc($query)) 
           {   

              //find student name
              $id=$row['studentID'];
              

              $result = mysqli_query($conn,"SELECT * FROM `student` WHERE `ID` ='$id'");

          $row = mysqli_fetch_array($result);
          

          $acc="acc";
          $dec="dec";


             print("
          <tr>
          <td> ".$row[0]." ".$row[1]." </td>
          <td>  ".$title." </td>
          <td   style='width: 5%;'>  <a href='RequestProcess.php?id=$id&course=$course&type=$dec'  class='btn btn btn-danger' name='decline' value='decline' 
           onClick=\"return confirm('Are you sure you want to delete?')\" >Decline</a> </td>
          <td style='width: 5%;'  >  
      <a href='RequestProcess.php?id=$id&course=$course&type=$acc'  class='btn btn btn-success' name='Accept' value='Accept'>Accept</a>
          </td>
          </tr>
        

        ");
           
         }        

    }

      print("
          </tbody>
            </table>
            </div>
        ");

 ?>


</div>

</body>
</html>