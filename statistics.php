<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}
$userEmail = $user['Email'];
$subjectAmount = $user['SubAmount'];

$subjectScores = mysql_query("SELECT * FROM subjectFeedback WHERE `Email` = '$userEmail'");
$subjectArray[] = array();

$l = 0;

while($row = mysql_fetch_assoc($subjectScores)) {
  foreach ($row as $col => $val) {
    if ($col == 'ID' || $col == 'Date' || $col == 'Email') continue;
    if($l <= $subjectAmount+1){
    	if ($val > 0) {
	      $subjectArray[] = $col;
	    }
	    $l++;
    }
    
  }
  // $subjectAmount = count($subjectArray);
}

$subject1 = $subjectArray[1];
$subject2 = $subjectArray[2];
$subject3 = $subjectArray[3];
$subject4 = $subjectArray[4];
$subject5 = $subjectArray[5];
$subject6 = $subjectArray[6];
// $subject7 = $subjectArray[7];
// $subject8 = $subjectArray[8];
// $subject9 = $subjectArray[9];

$testQuery = mysql_query("SELECT sum($subject1) as totalSub1, sum($subject2) as totalSub2, sum($subject3) as totalSub3, sum($subject4) as totalSub4, sum($subject5) as totalSub5, sum($subject6) as totalSub6 FROM subjectFeedback WHERE `Email` = '$userEmail'");
$row = mysql_fetch_assoc($testQuery);
echo $row['totalSub1'];
echo $row['totalSub2'];
echo $row['totalSub3'];
echo $row['totalSub4'];
echo $row['totalSub5'];
echo $row['totalSub6'];
// echo $row['totalSub7'];
// echo $row['totalSub8'];
// echo $row['totalSub9'];
// print_r($subjectArray);
?>
<!DOCTYPE HTML>
<html>
<head>
  <script type="text/javascript">
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {

      title:{
        text: "Fruits sold in First Quarter"              
      },
      data: [//array of dataSeries              
        { //dataSeries object

         /*** Change type "column" to "bar", "area", "line" or "pie"***/
         type: "column",
         dataPoints: [
           <?php
         for($j = 1; $j <= $subjectAmount; $j++){
         	echo "{ label: '" . $subjectArray[$j] . "', y: " . $test . "},";
         	// if($j < $subjectAmount - 1){
         	// 	echo ",";
         	// }
         } 
         ?>
         ]
       }
       ]
     });

    chart.render();
  }
  </script>
  <script type="text/javascript" src="js/canvasjs.min.js"></script>
</head>
<body>
  <div id="chartContainer" style="height: 300px; width: 100%;">
  </div>
</body>
</html>