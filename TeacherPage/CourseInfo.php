
<?php
include "includes/teacherMenu.php";
include "includes/databaseConnection.php";
?>


<?php
if (!isset($_SESSION["user"])) {
header ("Location:../index.php");

}

?>

<?php

//fetching data in descending order (lastest entry first)
$result = mysqli_query($conn,"SELECT * FROM course WHERE teacherID=".$_SESSION['user']." ORDER BY course_code DESC");
?>


<style type="text/css">
	

 .container
  {
  width:100%;
   margin: auto; 
  background-color: white;
  }
  </style>

	<div class="container">
	<br/><br/>
	<p><font size="+2">My Courses</font></p>
	<table width='100%' border='2' style=" font-size : 18px;text-align: center; border-width: 1px;">
		<tr bgcolor='#CCCCCC'>
			<td>Course Title</td>
			<td>Course Book</td>
			<td>Semester</td>
			<td>Course Description</td>
			<td>action</td>
		</tr>
		<?php

		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['title']."</td>";
			echo "<td>".$res['Book']."</td>";
			echo "<td>".$res['Semester']."</td>";
			echo "<td>".$res['description']."</td>";			
			echo "<td><a href=\"editCourse.php?id={$res['course_code']}\">Edit</a> | <a href=\"delete.php?id={$res['course_code']}\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
			| <a href=\"view_course.php?id={$res['course_code']}\" onClick=\"return confirm('Are you sure you want to view the course?')\">View</a>



			</td>";		
		}
		?>
	</table>
	
</body>
</html>
 



</div>


</div>

</body>
</html>
