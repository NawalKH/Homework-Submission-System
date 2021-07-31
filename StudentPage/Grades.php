<?php  
include "includes/databaseConnection.php";
include 'includes/studentMenu.php'; 

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
$student= $_SESSION["user"];

    $q = mysqli_query($conn, "SELECT * FROM `submissions` WHERE `studentID`='$student' AND `grade`!= 'NULL' ");
         mysqli_query($conn,"UPDATE `submissions` SET `seen`=1 WHERE `studentID`='$student' AND `grade`!= 'NULL'  ");

      
       

$results = Array();
$i = 0;



  print("
	<div class='container'>  
	<div class='table-responsive' >  
      
  	<table class='table' style='width: 80%;' >
    <thead>
      <tr>
      	<th> Course </th>
        <th  >Homework Title</th>
        <th>Grade</th>
      </tr>
    </thead>");


while ($row = mysqli_fetch_assoc($q))
{	


	  print("

    		<tbody>
      		<tr>
      		<td> ".$row['course']."</td>
        	<td> ".$row['homeworkTitle']." </td>
        	<td>  ".$row['grade']." </td>
      		</tr>
    		</tbody>

   			");

	
}

  print("        
  			</table>
  			</div>
			</div>" );

?>



</div>

</body>
</html>

