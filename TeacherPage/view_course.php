<?php
include "includes/teacherMenu.php";
include "includes/databaseConnection.php";
?>


<?php
if (!isset($_SESSION["user"])) {
header ("Location:../index.php");

}
$course_code=$_GET['id'];

$res=  mysqli_query($conn,"SELECT * FROM `course` WHERE `course_code`='$course_code'");

$result = mysqli_query($conn,"  SELECT `student`.`first_name`,`student`.`last_name` FROM `student_course` inner join `student` on `student_course`.`studentID`= `student`.`ID` WHERE `course_code`='$course_code' ");

echo "<div style='padding-left:50px'><br><h3>Course Information:</h3>";
if($res){
	
while($row2=mysqli_fetch_assoc($res)){
echo "title: ".$row2['title']."<br>";
			echo "Book: ".$row2['Book']."<br>";
			echo "Semester: ".$row2['Semester']."<br>";
			echo "description: ".$row2['description']."<br>";}

}

echo "<h3>Students:</h3>";
if($result){
	while($row=mysqli_fetch_assoc($result)){
	echo $row['first_name']." ".$row['last_name']."<br>";}
if(mysqli_num_rows($result)==0){
	echo "there are no students";
}

}
echo "</div>";

?>