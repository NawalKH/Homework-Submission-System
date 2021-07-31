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

<body>
<?php

if( $_FILES['file']['size'] > 0)
 {	
	$title = $_POST['title'];
	$course = $_POST['course'];
	$description = $_POST['description'];
	

	$insertdate = date('Y-m-d', strtotime($_POST['date']));
$fileName = $_FILES['file']['name'];
$tmpName  = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileType = $_FILES['file']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);


if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}



					if (file_exists("TeacherHomeworks/" . $_FILES["file"]["name"]))
					{
						echo '<script language="javascript">alert(" Sorry!! Filename Already Exists...")</script>';
					}
					else
					{
						move_uploaded_file($_FILES["file"]["tmp_name"],
						"TeacherHomeworks/" . $_FILES["file"]["name"]) ;

						
						$sql = "INSERT INTO homework(title, description, deadline, URL, course) VALUES ('" . $_POST["title"] ."','" . $_POST["description"] ."','$insertdate','" . $_FILES["file"]["name"]  ."','".$_POST['course'] ."');";
						if (!mysqli_query($conn,$sql))
							echo('Error : ' . mysqli_error($conn));
						else
							  header ("Location:home.php");
							echo '<script language="javascript">alert("Thank You!! File Uploded")</script>';
						
						}

}


?>
</body>
</html>
