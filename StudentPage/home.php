<?php  
include 'includes/studentMenu.php'; 
include 'includes/databaseConnection.php';
//must be in all pages


if (!isset($_SESSION["user"])) {
header ("Location:../index.php");

}

?>


<style type="text/css">
	h3
	{

		font-family: "Comic Sans MS", cursive, sans-serif;
		padding: 25px;
	}


   .container
  {
  width:100%;
 margin: auto; 
  background-color: white;
  }
</style>



<?php

$id= $_SESSION["user"];
$sql="SELECT * FROM `student` WHERE `ID`='$id' ";
$result =mysqli_query($conn,$sql);


$row = mysqli_fetch_row($result);

echo mysqli_error($conn);
echo "<h3> Welcome  ".$row[0]." ".$row[1]."</h3> ";

?>

 

   <div class="container">


  		<!DOCTYPE html>
			<html lang="en">
				<head>
					<meta charset="utf-8" />
					<title></title>
				</head>
				<body>
			<form action="" method="post">  
			 <div class="div2">
      <label >Search:<br><br>
      <input type="search" name="term" placeholder="Search for Homework..">
      <input type="submit" value="Search" />  
      <br>

      </label>
      
      </div>
	  
			
			</form>  

			<?php
			if (!empty($_REQUEST['term'])) {

			$term = mysqli_real_escape_string($conn,$_REQUEST['term']);     

			$sql = "SELECT * FROM homework WHERE Title LIKE '%".$term."%' "; 

			$r_query = mysqli_query($conn,$sql); 

?>
			<table width='80%' border='2' style=" font-size : 18px;text-align: center; border-width: 1px;">
				<tr bgcolor='#CCCCCC'>
				<th>homeworkTitle</th>
				<th>description</th>
				<th>deadline</th>
				<th>course</th>
				<th>file</th>
				</tr>
<?php
			while($row = mysqli_fetch_array($r_query))
				  {
				echo "<tr>";
				echo "<td>" . $row['title'] . "</td>";
				echo "<td>" . $row['description'] . "</td>";
				echo "<td>" . $row['deadline'] . "</td>";
				echo "<td>" . $row['course'] . "</td>";
				echo "<td align=center><a title='Click here to download in file.' 
		        href='download.php?user={$row['URL']}'>{$row['URL']} </a> </td>"; 
				echo "</tr>";
				}
				
			}
			?>
    </body>
</html>
</div>
  

</body>
</html>

