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

$test = 1;
$tester = "English";
$tester2 = "Accounting";
$testQuery = mysql_query("SELECT sum($tester) as total, sum($tester2) as total2 FROM subjectFeedback WHERE `Email` = '$userEmail'");
$row = mysql_fetch_assoc($testQuery);
echo $row['total'];
echo $row['total2'];
print_r($subjectArray);
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