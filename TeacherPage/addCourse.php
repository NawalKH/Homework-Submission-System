<?php
include "includes/teacherMenu.php";
include "includes/databaseConnection.php";
?>



<?php
if (!isset($_SESSION["user"])) {
header ("Location:../index.php");

}
?>

<html>
<head>
	<title>Add Data</title>
</head>

<style type="text/css">
	
	 .container
  {
  width:100%;
 margin: auto; 
  background-color: white;
  }
</style>

<body>
<?php

if(isset($_POST['Submit'])) {	
	$code  = $_POST['code'];
	$title = $_POST['title'];
	$Book = $_POST['Book'];
	$Semester = $_POST['Semester'];
	$description = $_POST['description'];
	$TeacherID = $_SESSION['user'];
		
	// checking empty fields
	if(empty($title) || empty($Book) || empty($Semester) || empty($code) || empty($description)) {
				
		if(empty($title)) {
			echo "<font color='red'>title field is empty.</font><br/>";
		}
		
		if(empty($Semester)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($Book)) {
			echo "<font color='red'>Book field is empty.</font><br/>";
		}
		if(empty($description)) {
			echo "<font color='red'>description field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($conn,"INSERT INTO course(course_code, title, Book, Semester, description, teacherID) VALUES('$code', '$title','$Book','$Semester','$description', '$TeacherID')");


		if($result)
		{
				//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/>";
		echo "<a href='CourseInfo.php'>Go back Display Course Information</a>";
		}
		else
			 echo ("Could not insert data : " . mysqli_error($conn) );

	
		
		
	}
}
?>
</body>
</html>
