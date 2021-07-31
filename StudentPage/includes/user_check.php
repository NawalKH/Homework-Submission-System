<?php
include('databaseConnection.php');
$IDError=$PasswordError=true;
$type='';
$IDM='';


if(isset($_POST['ID']))
{
$ID=mysqli_real_escape_string($conn,$_POST['ID']);
$ID = test_input($ID);
$query=mysqli_query($conn, "SELECT * FROM Teacher WHERE ID='$ID'");
$row=mysqli_num_rows($query);
$query2=mysqli_query($conn, "SELECT * FROM Student WHERE ID='$ID'");
$row2=mysqli_num_rows($query2);
if($row==0&&$row2==0&&strlen($ID) >= 6&&preg_match("/^[1-9][0-9]*$/",$ID))
{
$IDM = 'Available';
$IDError=true;
}
else if(empty($ID)) {
echo "<span style='color:red;'>Please enter your ID</span>";	
}
else if (!preg_match("/^[1-9][0-9]*$/",$ID)) {
echo "<span style='color:red;'>please enter numbers only</span>";
}
else if(strlen($ID)<6)
{
echo "<span style='color:red;'>less than 6 characters</span>";
}
else
{
echo "<span style='color:red;'>Already exist</span>";
}

}

if(isset($_POST['Email']))
{
$Email=mysqli_real_escape_string($conn,$_POST['Email']);
$Email = test_input($Email);
$query=mysqli_query($conn,"SELECT * FROM Teacher WHERE Email='$Email'");
$row=mysqli_num_rows($query);
$query2=mysqli_query($conn,"SELECT * FROM Student WHERE Email='$Email'");
$row2=mysqli_num_rows($query2);
if($row==0&&$row2==0&&filter_var($Email,FILTER_VALIDATE_EMAIL))
{
echo "<span style='color:green;'>Available</span>";
$EmailError=true;
}
else if ( !filter_var($Email,FILTER_VALIDATE_EMAIL) ) {
	echo "<span style='color:red;'>Please enter valid email address</span>";
	}
else
{
echo "<span style='color:red;'>Already exist</span>";
}
}

if(isset($_POST['Password']))
{
$Password=mysqli_real_escape_string($conn, $_POST['Password']);
$Password = test_input($Password);
if(strlen($Password) >= 8)
{
echo "<span style='color:green;'>great</span>";
$pass= hash('ripemd160', $Password);
$PasswordError=true;
}
else{
echo "<span style='color:red;'>less than 8 characters</span>";
}
}

if(isset($_POST['first_name']))
{
$first_name=mysqli_real_escape_string($conn, $_POST['first_name']);
$first_name=test_input($first_name);
if (preg_match("/^[a-zA-Z ]+$/",$first_name)){
$first_nameError=true;
}
else{
	echo "<span style='color:red;'>First Name must contain alphabets and space.</span>";
}
}

if(isset($_POST['last_name']))
{
$last_name=mysqli_real_escape_string($conn,$_POST['last_name']);
$last_name=test_input($last_name);
if (preg_match("/^[a-zA-Z ]+$/",$last_name)){
$last_nameError=true;
}
else{
	echo "<span style='color:red;'>Last Name must contain alphabets and space.</span>";
}
}

if(isset($_POST['Phone_Number']))
{
$Phone_Number=mysqli_real_escape_string($conn, $_POST['Phone_Number']);
$Phone_Number=test_input($Phone_Number);
if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $Phone_Number)) {
$Phone_Number=true;
}
else{
	echo "<span style='color:red;'>PhoneNo must be 000-0000-0000.</span>";
}
}


  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
 
  return $data;
}

///


?>