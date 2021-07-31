<?php  

include "includes/databaseConnection.php";
include "includes/teacherMenu.php";

//must be in all pages

if (!isset($_SESSION["user"])) {
header ("Location:../index.php");

}
?>
<script type="text/javascript">

$(document).ready(function(){

$("#title").blur(function() {
var name = $('#title').val();
if(name=="")
$("#emptyTitle").html("<span style='color:red;'>Enter Title</span>");
else
$("#emptyTitle").html("");
});
$("#des").blur(function() {
if(!$.trim($("#des").val()))
$("#emptyDes").html("<span style='color:red;'>Enter description</span>");
else
$("#emptyDes").html("");
});
$("#date").blur(function() {
var name = $('#date').val();
if(name=="")
$("#emptyDate").html("<span style='color:red;'>Select a Deadline Date</span>");
else
$("#emptyDate").html("");
});


});


$(document).ready(function(){

$("button").click(function(){

var file = $("#file").val();
var title = $("#title").val();
var description = $("#des").val();
var date = $("#date").val();
var course = $("#course").val();


if(file==''||title==''||description==''||date==''||course=='')
{
if(file=='')
$("#emptyfile").html("<span style='color:red;'>Uploud File</span>");
if (title=='')
$("#emptyTitle").html("<span style='color:red;'>Enter title</span>");
if (description=='') 
$("#emptyDes").html("<span style='color:red;'>Enter Description</span>");
if(date=='')
$("#emptyDate").html("<span style='color:red;'>Select a Date</span>");
if(course=='')
$("#emptyCourse").html("<span style='color:red;'>Select a course</span>");


alert("Please Fill the Fields");
}
else
{
	
var fd = new FormData(document.querySelector("form"));
    $.ajax({
           type: "POST",
           url: "insertHW.php",
           data: fd, 
           processData: false,  
  			contentType: false, 

  			success: function(result){
				alert("HomeWork added Seccussfuly");
				window.location.href = "home.php";
}
         });

}
return false;

});


});





</script>

<style type="text/css">
 .container
  {
  width:100%;
 margin: auto; 
  background-color: white;
  }

input[type=text], select {
    width: 100%;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=reset], button {
	width: 100px;
    background-color: lightgray;
    color: black;
    padding: 14px 20px;
    margin: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

input[type=reset]:hover
{
background-color: red;
}

</style>

<div class="container">
<h4 ">add new HomeWork</h4>
<form  id="myForm" method="post" enctype="multipart/form-data" >

<label>File: 
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input type="file" name="file" id="file"> </label>
<div id="emptyfile"></div>

<br>
<label>
<span style="white-space: pre">   Course:   </span>
<select name="course" id="course">
 "

<?php 
$result = mysqli_query($conn, "SELECT course_code  FROM course WHERE teacherID=".$_SESSION['user']."");
while($res = mysqli_fetch_array($result)) {
	print(" <option value=".$res['course_code'].">".$res['course_code']."</option> "); 
}
?>
</select>
</label>
<div id="emptyCourse"></div>

<br>
<label>
<span style="white-space: pre">   Title:        </span>
<input type='text' name="title" id="title" >
</label>
<div id="emptyTitle"></div>
<br>


   <label style="white-space: pre">   description: 
<textarea rows="4" cols="50" name="description" id="des" placeholder="enter description about the homework:"> </textarea>
</label>

<div id="emptyDes"></div>
<br>

   <span style="white-space: pre">   submission deadline: </span> 
<input type="date" name="date" id="date"> 
<div id="emptyDate"></div>
<br>
<br>

<input style="float: right;"  id="cancel " name="cancel" type="reset" value="Cancel">
<button  style="float: right;"  id="submit"  name="Submit">Add</button>
 
 </form>


</div>



</div>
</body>
</html>
