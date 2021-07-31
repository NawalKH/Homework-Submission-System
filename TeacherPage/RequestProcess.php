<?php
include "includes/teacherMenu.php";
include "includes/databaseConnection.php";
?>


<?php
if (!isset($_SESSION["user"])) {
header ("Location:../index.php");

}
?>

<div class="container">

<?php


  if(isset($_GET['id'])&& isset($_GET['course'])&&isset($_GET['type']))
     {
     $ID = (int)$_GET['id'];
     $COURSE= $_GET['course'];
     $TYPE= $_GET['type'];

     if($TYPE == 'dec')
     {
     $delete_request = mysqli_query($conn,"DELETE FROM `students_requests` WHERE `studentID`='$ID ' AND `course_code`='$COURSE' ");
        }
    else if($TYPE =='acc')
        {
    $accept_request = mysqli_query($conn,"INSERT INTO `student_course`(`studentID`, `course_code`) VALUES ('$ID','$COURSE')");

 $delete_request = mysqli_query($conn,"DELETE FROM `students_requests` WHERE `studentID`='$ID ' AND `course_code`='$COURSE' ");
        }
    
    header('Location:studentRequest.php');
 }

?>
</div>


</div>
</body>
</html>



