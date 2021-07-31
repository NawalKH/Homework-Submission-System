<?php
include "includes/teacherMenu.php";
include "includes/databaseConnection.php";
?>

<div class="container">

<?php
if(!isset($_SESSION['user'])) {
	header('Location:../index.php');
}
?>

<?php

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$title = $_POST['title'];
	$Book = $_POST['Book'];
	$Semester = $_POST['Semester'];
    $description = $_POST['description'];		
	
	// checking empty fields
	if(empty($title) || empty($Book) || empty($Semester) || empty($description)) {
				
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
		
	} else {	
		//updating the table
		$result = mysqli_query($conn, "UPDATE course SET title='$title', Book='$Book', Semester='$Semester' , description='$description' 
			WHERE  course_code='$id'");
		
		//redirectig to the display page. In our case, it is view.php
	
		header("Location: CourseInfo.php");
	}
}

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn,"SELECT * FROM course WHERE course_code='$id'");
$num=mysqli_num_rows($result);
if(0==$num) {
    echo "No record";
    exit;
} 
else {
while ($row = mysqli_fetch_assoc($result)) {

	$title = $row['title'];
	$Book = $row['Book'];
	$Semester = $row['Semester'];
	$description = $row['description'];
}
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<br/><br/>
	
	<form name="form1" method="post" action="editCourse.php">
		<table border="0">
			<tr> 
				<td>Course Title</td>
				<td><input type="text" name="title" value="<?php echo $title;?>"></td>
			</tr>
			<tr> 
				<td>Course Book</td>
				<td><input type="text" name="Book" value="<?php echo $Book;?>"></td>
			</tr>
			<tr> 
				<td>Semester</td>
				<td><input type="text" name="Semester" value="<?php echo $Semester;?>"></td>
			</tr>
			<tr> 
				<td>Course Description</td>
				<td><textarea type="text" name="description" cols="27" rows="4" > <?php echo $description;?> </textarea></td>
		
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update">
				<a href="CourseInfo.php" class="btn btn-default" style="height: 30px;color: black; background-color: #E6E6E6;">Cancel</a>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>


</div>


</div>
</body>
</html>
