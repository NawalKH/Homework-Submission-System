<?php  session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">






<style>



.not
{
padding: 0px 3px 3px 7px;
background: #cc0000;
color: #ffffff;
font-weight: bold;
margin-left: 77px;
border-radius: 9px;
-moz-border-radius: 9px;
-webkit-border-radius: 9px;
position: absolute;
margin-top: -1px;
font-size: 10px;
}
</style>



<script type="text/javascript" charset="utf-8">


function addmsg(type, msg){
$('#notification_count').html(msg);
}
 
function waitForMsg(){
$.ajax({
type: "GET",
url: "./notification.php",
async: true,
cache: false,
timeout:50000,
 
success: function(data){
  if(data != 0)
  {
addmsg("new", data);
$("#notification_count").addClass("not");
  }

setTimeout(
waitForMsg,
1000
);
},
error: function(XMLHttpRequest, textStatus, errorThrown){
addmsg("error", textStatus + " (" + errorThrown + ")");
setTimeout(
waitForMsg,
15000);
}
});
};
 
$(document).ready(function(){
waitForMsg();
});
 


</script>



</head>


<body>

<div class="all">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Student</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>


      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Courses <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="Subscribe-Course.php">Subscribe Course</a></li>
        </ul>
      </li>


       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">HomeWorks<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="Assignment.php">Submit Homework</a></li>
          <li><a href="View-Homework.php">View Assignment</a></li>
        </ul>
      </li>

        <span id="notification_count" onclick="$(this).remove();"></span>
        <li><a id="notificationLink"  href="Grades.php">Grades</a></li>
        

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="EditProfile.php"><span class="glyphicon glyphicon-user"></span>Edit Profile</a></li>
     <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Sign Out</a></li>
    </ul>
  </div>
</nav>


  
