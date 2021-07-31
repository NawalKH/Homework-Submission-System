<?php session_start(); ?>
<?php
include "includes/databaseConnection.php";
if (isset($_SESSION["user"])) {
  $userA=$_SESSION["user"];
  echo $userA;


$result = mysqli_query($conn,"SELECT * FROM `teacher` WHERE `ID`='$userA'");
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
        
$res1 = mysqli_query($conn,"SELECT * FROM `teacher` WHERE `ID`='$userA'");
if($res1){
          if(mysqli_num_rows($res1) ==1 )
            header ("Location:TeacherPage/EditProfile.php");
}

$result =mysqli_query($conn,"SELECT * FROM `student` WHERE `ID`='$userA'");
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
        
$res1 = mysqli_query($conn,"SELECT * FROM `student` WHERE `ID`='$userA'");
if($res1){
          if(mysqli_num_rows($res1) ==1 )
            header ("Location:StudentPage/EditProfile.php");
}

}
?>


<!DOCTYPE html>

<html>
<head>
<title>Myhomework</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">

//AJAX #ID
$(document).ready(function(){
$("#ID").blur(function() {
var name = $('#ID').val();
if(name=="")
{
$("#disp").html("<span style='color:red;'>Enter ID</span>");
}
else
{
$.ajax({
type: "POST",
url: "includes/login_check.php",
data: "ID="+ name ,
success: function(html){
$("#disp").html(html);
}
});
return false;
}
});
});

//AJAX #Password
$(document).ready(function(){
$("#Password").blur(function() {
var name = $('#Password').val();
if(name=="")
{
$("#disp2").html("<span style='color:red;'>Enter Password</span>");
}
else
{
$.ajax({
type: "POST",
url: "includes/login_check.php",
data: "Password="+ name ,
success: function(html){
$("#disp2").html(html);
}
});
return false;
}
});
});

//AJAX submit
$(document).ready(function(){
$("#submit").click(function(){
var ID = $("#ID").val();
var password = $("#Password").val();
var type= $('input[name=type]:checked', '#myForm').val();

// Returns successful data submission message when the entered information is stored in database.
var dataString = '&ID='+ ID+ '&Password='+ password + '&type='+ type;
$("#disp2").html(type);
if(ID==''||password=='')
{
alert("Please Fill the Fields");
if(ID=='')
$("#disp").html("<span style='color:red;'>Enter ID</span>");
if(password=='')
$("#disp2").html("<span style='color:red;'>Enter Password</span>");
}
else
{
$("#disp2").html(type);
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "includes/login_check.php",
data: dataString,
////////////\\\\\\\\\\\\
success: function(result){
if(result==0){
alert("incorrect ID or password");
}
else{
  if(type=='Teacher')
  window.location.href = "TeacherPage/EditProfile.php";
if(type=='Student')
  window.location.href = "StudentPage/EditProfile.php";

}
}

});
}
return false;
});
});
////////////\\\\\\\\\\\\

</script>
</head>



<body>


  <div class="logo">My Homework</div>

   <div class="midLogin" align="center">
    <form id="myForm" action="" method="post">
      <fieldset >
      <legend>Log In</legend><center>
        ID:<br><input type="text" name="id" id="ID" placeholder="Enter your ID" size = "25" > 
          <div id="disp"></div><br>
        Password:<br><input type="password" name="password" id="Password" placeholder="Enter your Password" maxlength="10" size = "25"><div id="disp2"></div><br><br>

        <input type="radio" name="type" value="Teacher"> Teacher
        <input type="radio" name="type" value="Student" checked> Student
        <br><br>
        <span class="text-danger"></span>
        <button class="button" type="Login" id="submit" name="login" target="_blank">Login</button>
        <br><br>
        Not a member ? <a style="color:black;" href="RegistrationPage.php" >Register</a>
      </center>
      </fieldset>
    </form>
  </div>

  <footer>Powered by KSU</footer>
</body>
</html>


