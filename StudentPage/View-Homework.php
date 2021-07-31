<?php  
include 'includes/studentMenu.php'; 
include 'includes/databaseConnection.php';


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


   <div class="container">

<?php
   $user = $_SESSION['user'];

//fetching data in descending order (lastest entry first)

		$result = mysqli_query($conn,"SELECT * FROM `submissions` WHERE studentID = '" . mysqli_real_escape_string($conn,$user) ."'");
?>

<html>

<head>

	<title>Homework Info</title>
</head>

<body>
	<br/><br/>
	<p><font size="+2">Homework </font></p>
							
		<table width='80%' border='2' style=" font-size : 18px;text-align: center; border-width: 1px;">
				<tr bgcolor='#CCCCCC'>
				<th>homeworkTitle</th>
				<th>submissionDate</th>
				<th>course</th>
				<th>file</th>
				</tr>
					<?php


				while($row = mysqli_fetch_array($result))
				  {
				echo "<tr>";
				echo "<td>" . $row['homeworkTitle'] . "</td>";
				echo "<td>" . $row['submissionDate'] . "</td>";
				echo "<td>" . $row['course'] . "</td>";
				echo "<td align=center><a title='Click here to download in file.' 
		     href='download.php?user={$row['submissionURL']}'>{$row['submissionURL']} </a>"; 
				echo "</tr>";
				}
				echo "</table>";
						?>

	</table>
	
</body>
</html>
 

</div>

</body>
</html>

