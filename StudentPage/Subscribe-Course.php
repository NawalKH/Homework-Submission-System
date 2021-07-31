<?php  

include 'includes/studentMenu.php'; 

//must be in all pages
if (!isset($_SESSION["user"])) {
header ("Location:../index.php");

}
?>

<script>

$(document).ready(function(){
 var rowCount = $('#mytable >tbody >tr').length;

     if(rowCount==0){
      $("#div1").remove();
    $( "#div1" ).load( "Subscribe-Course.php #div1" );
    $("#razan").show();
  }
});  

$(document).ready(function(){
$('#submit').click(function(){
  var i=0;
var course=$('#course').val();
if ($(".flat:checked").length == 0){
  $('#dis').show();
$('#dis').html('<span style="color: red"> * Please select at least one course</span>');
return false;
}
else{
  $('#dis').hide();
return false;
}

});
});

$(document).ready(function() {
        $("#submit").click(function(){
            var favorite = [];
            $.each($("input[name='options']:checked"), function(){            
                favorite.push($(this).val());
            });
 if ($(".flat:checked").length == 0){
      $('#dis').show();
      $('#dis').html('<span style="color: red"> * Please select at least one course</span>');
      return false;
      }
 else{     
      $.ajax({
      type: "POST",
      url: "includes/subscribe.php",
      data: "courses="+ favorite ,
      success: function(html){

        //$('#dis').show();
      //$('#dis').html('<span style="color: red">'+ html +'</span>');

      if(html=="1"){
      alert("the courses you have selected are subscribed successfully");
      $( "#mytable" ).load( "Subscribe-Course.php #mytable" );
        }
        var rowCount = $('#mytable >tbody >tr').length;
     
      var len=$(".flat:checked").length;
      var total=rowCount-len;
   if (total== 0){
    $("#div1").remove();
    $( "#div1" ).load( "Subscribe-Course.php #div1" );
    $("#razan").show();
  }
      }
    });
  }


        });
});
</script>

<style >
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 8px;
     text-align:center;
}
</style>


</head>


<style type="text/css">
  
   .container
  {
  width:100%;
 margin: auto; 
  background-color: white;
  }
</style>

<body>

<div class="container">
<div class="SubscribeCourse">
<form method="post" action="">
<br><br><h4 ">Subscribe Course</h4>
<div id="div1">
<h5>Select a Course:</h5>
<?php
$userA=$_SESSION["user"];
   $con= mysqli_connect("localhost", "root", "") or die("Could not connect: " . mysqli_error($con));
    $db= mysqli_select_db($con,"submission_system");
    $Course = mysqli_query($con,"SELECT `course_code` FROM `course` WHERE `course_code` NOT IN(SELECT `course_code` FROM `student_course`WHERE `student_course`.`studentID`= '$userA') UNION SELECT `course_code` FROM `student_course` WHERE `course_code` NOT IN(SELECT `course_code`FROM `course`)");

    echo "<table id='mytable'>
        <thead>
        <tr>
        <th>check</th>
        <th>Course code</th>
        <th>Course Title</th>
        <th>Course Description</th>
        <th>Course Teachers</th>     
    </tr>
    </thead>
    <tbody>";
 while ($row=mysqli_fetch_assoc($Course)){
$coursename=$row['course_code'];
echo "<tr>
<td id='checkA'><input id='course' type='checkbox' class='flat' name='options' value='$coursename'></td>
<td id='course_code'>".$coursename."</td>";

$Course1 = mysqli_query($con," SELECT `title`,`description` FROM `course` WHERE `course_code`='$coursename' ");

 while ($row2=mysqli_fetch_assoc($Course1)){
echo "<td id='title'>".$row2['title']."</td>
<td id='description'>".$row2['description']."</td>
 <td id='name'>";
}

$sql1=mysqli_query($con,"SELECT `first_name`, `last_name` FROM `teacher` INNER JOIN  `course` WHERE `teacher`.`ID`=`course`.`teacherID` AND  `course`.`course_code`='{$row['course_code']}'");
 while ($row1=mysqli_fetch_assoc($sql1)){
  echo "{$row1['first_name']} {$row1['last_name']}

                                                  </div>
                                                  </div>
                                                  </td>
                                                </tr>";
} 

}
echo "</tbody></table>";

  ?>

<br>
<input type="submit" name="submit" id="submit" >   <input type="reset" value="Cancel" id="cancel" /> 
 <label id="dis"></label>


</div>
<div id="razan" style="display: none;">there are no courses go back to the <a href="home.php">home page</a> </div>
</div>
</div>
</form>


</body>
</html>

