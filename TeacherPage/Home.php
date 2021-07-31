<?php  
include "includes/teacherMenu.php";
include "includes/databaseConnection.php";
//must be in all pages


if (!isset($_SESSION["user"])) {
header ("Location:../index.php");

}

?>


<div class="container">

<style type="text/css">
	h3
	{

		font-family: "Comic Sans MS", cursive, sans-serif;
		padding: 25px;
	}

</style>

<?php

$id= $_SESSION["user"];
$sql="SELECT * FROM `teacher` WHERE `ID`='$id' ";
$result =mysqli_query($conn,$sql);


$row = mysqli_fetch_row($result);

echo mysqli_error($conn);
echo "<h3> Welcome Tr. ".$row[0]." ".$row[1]."</h3> ";

?>

  
</div>


</div>
</body>
</html>

