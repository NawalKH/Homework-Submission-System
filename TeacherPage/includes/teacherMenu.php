<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Teacher</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./style.css">
</head>


<body>

<div class="all">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Teacher</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="Home.php">Home</a></li>


      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="displayCourses.php">Courses <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="CourseInfo.php">Display Course Information</a></li>
          <li><a href="CourseForm.php">Add Course</a></li>
        </ul>
      </li>


       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">HomeWorks<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="addHomework.php">Add Homework</a></li>
          <li><a href="viewAssignment.php">View Assignment</a></li>
        </ul>
      </li>


        <li><a href="studentRequest.php">Student Requests</a></li>
        <li><a href="Stat.php">Statistics</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="EditProfile.php"><span class="glyphicon glyphicon-user"></span>Edit Profile</a></li>
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Sign Out</a></li>
    </ul>
  </div>

</nav>



  
