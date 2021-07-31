<?php  

include "includes/teacherMenu.php";
include "includes/databaseConnection.php";


if (!isset($_SESSION["user"])) {
header ("Location:../index.php");
}

?>

  <script>
   $("#sub").click(function(){
                                              
<?php
    $h= $_POST['homework'];
    $s= $_POST['student'];
    $UpdGrade=$_POST['GradeU'];
  $SQL3="UPDATE `submissions` SET `grade`='$UpdGrade' WHERE `studentID`='$s' AND `homeWorkTitle`='$h' ";

  $results=mysqli_query($conn,$SQL3);

  if(!$results)
    mysqli_error($conn);
?>
  

});                                                       
</script>


<?php
if(isset($_GET['title'])){
//clean it up
if(!is_numeric($_GET['title'])){
$error=true;
$errormsg=" Serious error. Contact webmaster: Invalid Category id entered: ".$_GET['title']."";
}
else{
//clean it up
$error=false; 


if($records){
//$row=mysql_fetch_assoc($records);
}
else{
//there's a query error
$error=true;
$errormsg .=mysqli_error($conn);
}//result test
}//numeric
}//if isset
?>


 <html>
<head>
	<title> Assigment</title>
	<script>

	$(document).ready(function(){
    $('#update').click(function(){
    var gr=$('#grade').val();
    
    })
    })
	
	</script>
</head>
<body>

<?php
    echo "

    <div class='table-responsive'> 
    <table  class='table table-hover table-bordered' >
    ";
echo"<thead>
    <tr>
        <th>student ID</th>
        <th>student name</th>
        <th>Grade</th> 
        <th>submission</td>    
    </tr>
    </thead>
    <tbody>";
     // output data of each row
     $aID=mysqli_escape_string($conn, $_GET['title']);

	$query ="SELECT * from submissions INNER JOIN homework ON submissions.homeworkTitle=homework.Title WHERE submissions.homeworkTitle='".$aID."' ";
 	$records=mysqli_query($conn, $query);

  	while($row=mysqli_fetch_assoc($records))
  	{
  	$studentID=$row['studentID'];
  	$sql="SELECT first_name from student WHERE ID='$studentID' ";
  	$result=mysqli_query($conn,$sql);
  ?>


  
     												                         <tr> 
                                                     <td id="ID"><?php echo trim(stripslashes($row['studentID']));?></td>
                                              	  <?php $Grade = $row['grade'];?>
                    							              <?php $row2=mysqli_fetch_assoc($result) ?>                
                                                <td id="name"><?php echo trim(stripslashes($row2['first_name'])); ?></td>
                                                <td id="Grade">
                                                <form method="post" action="Assigment.php?title=<?php echo $aID?>">
                                                <input id="g"  name="GradeU" type="text" value="<?php echo trim(stripslashes($row['grade']));?>"></input>
                                                <input type="hidden" name="student" value=<?php echo "$studentID" ?>>
                                                <input type="hidden" name="homework" value=<?php echo "$aID" ?> >
                                                <input id= "sub" name="update" type="submit" value="update"></input></td>
                                                </form>


                                                <td id="subURL"><?php  echo "<a title='Click here to download in file.' 
                                                       href='download.php?user={$row['submissionURL']}'>{$row['submissionURL']} </a>"; ?></td>
                                                </tr>      
                                            
     <?php }

echo "</tbody></table></div>";

  ?>

</table>
</body>
</html>