<?php

include "databaseConnection.php";
if(!isset($_POST['course'])){
echo "not found";
}
if(isset($_POST['course'])){
	$course=$_POST['course'];


$res= mysqli_query($conn, "SELECT teacherID FROM course where title='$course' ");
if(!$res){
   die("Error: ".mysqli_error($conn));
}
if(mysqli_num_rows($res)==0)
echo "not found";
else{
	echo "not found";
while ($row=mysqli_fetch_assoc($res)){
   echo $row['teacherID']; 

}
}
}

if(isset($_POST['courseA'])){
	$courseA=$_POST['courseA'];
	$query = "SELECT title FROM homework where course='$courseA'";
					$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
					
					echo "<select name='title'>";
					while ($row = mysqli_fetch_array($result)){
					  echo "<option value='" . $row['title'] ."'>" . $row['title'] ."</option>";
					}

					echo "</select>";
					



}

?>
