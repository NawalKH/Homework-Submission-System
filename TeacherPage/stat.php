<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>



<?php  

include "includes/teacherMenu.php";
include "includes/databaseConnection.php";
//must be in all pages


if (!isset($_SESSION["user"])) {
header ("Location:../index.php");

}



$ga=array();

$teacher=$_SESSION['user'];


$result = mysqli_query($conn, "SELECT MIN(course_code) AS `course_code`, `Semester` FROM `course` WHERE `teacherID`='$teacher'  GROUP BY Semester ");
$num_rows = mysqli_num_rows($result);

$labels= array();
$arrData= array();



for ($x = 0; $x <$num_rows ; $x++) {

    $info=mysqli_fetch_array($result);
    $sem= $info['Semester'];
    $labels[$x]=$sem;


        


    $all=  mysqli_query($conn, "SELECT * FROM `course` WHERE `teacherID`='$teacher' AND `Semester`= '$sem' ");
    
    while($tmp=mysqli_fetch_array($all))
    {       

            $course= $tmp['course_code']; 
   

          $sql = mysqli_query($conn,"SELECT * FROM `submissions` WHERE `course`='$course' AND `grade`!=0 ");

            $i=0;
            $sum=0;
            $avg=0;

          while($c=mysqli_fetch_array($sql))
             {
                 $sum = $sum+ $c['grade']; 
                 $i++; 
                     }

                         if($i !=0)
                            {        
                                 $avg= $sum/$i;
                                            
                                            
                    $h= array($sem, $avg);                             
                         array_push($ga, $h);
                            
                                }
                                 


                          

             }
        }
                           
                    
?>





<script type="text/javascript">




var artistJSON = <?php echo json_encode($ga); ?>;


$(function () {
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Students Grades'
        },
        subtitle: {
            text: ' '
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Grades'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Avrage in Course: <b>{point.y:.1f} </b>'
        },
        series: [{
            name: 'Semester',
            data:artistJSON,
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#000000',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});

</script>

<style type="text/css">
    

 #container
  {
  width:100%;
   margin: auto; 
  background-color: white;
  }
  </style>




<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>

</div>

</body>
</html>
