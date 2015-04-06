<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}
$userEmail = $user['Email'];
$subjectAmount = $user['SubAmount'];
// echo $subjectAmount;

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

switch ($subjectAmount){
	case 6: 
		$subject1 = $subjectArray[1];
		$subject2 = $subjectArray[2];
		$subject3 = $subjectArray[3];
		$subject4 = $subjectArray[4];
		$subject5 = $subjectArray[5];
		$subject6 = $subjectArray[6];
		
		$testQuery = mysql_query("SELECT sum($subject1) as $subjectArray[1], sum($subject2) as $subjectArray[2], sum($subject3) as $subjectArray[3], sum($subject4) as $subjectArray[4], sum($subject5) as $subjectArray[5], sum($subject6) as $subjectArray[6] FROM subjectFeedback WHERE `Email` = '$userEmail'");
	break;

	case 7: 
		$subject1 = $subjectArray[1];
		$subject2 = $subjectArray[2];
		$subject3 = $subjectArray[3];
		$subject4 = $subjectArray[4];
		$subject5 = $subjectArray[5];
		$subject6 = $subjectArray[6];
		$subject7 = $subjectArray[7];
		
		$testQuery = mysql_query("SELECT sum($subject1) as $subjectArray[1], sum($subject2) as $subjectArray[2], sum($subject3) as $subjectArray[3], sum($subject4) as $subjectArray[4], sum($subject5) as $subjectArray[5], sum($subject6) as $subjectArray[6], sum($subject7) as $subjectArray[7] FROM subjectFeedback WHERE `Email` = '$userEmail'");
	break;

	case 8: 
		$subject1 = $subjectArray[1];
		$subject2 = $subjectArray[2];
		$subject3 = $subjectArray[3];
		$subject4 = $subjectArray[4];
		$subject5 = $subjectArray[5];
		$subject6 = $subjectArray[6];
		$subject7 = $subjectArray[7];
		$subject8 = $subjectArray[8];
		
		$testQuery = mysql_query("SELECT sum($subject1) as $subjectArray[1], sum($subject2) as $subjectArray[2], sum($subject3) as $subjectArray[3], sum($subject4) as $subjectArray[4], sum($subject5) as $subjectArray[5], sum($subject6) as $subjectArray[6], sum($subject7) as $subjectArray[7], sum($subject8) as $subjectArray[8] FROM subjectFeedback WHERE `Email` = '$userEmail'");
	break;

	case 9: 
		$subject1 = $subjectArray[1];
		$subject2 = $subjectArray[2];
		$subject3 = $subjectArray[3];
		$subject4 = $subjectArray[4];
		$subject5 = $subjectArray[5];
		$subject6 = $subjectArray[6];
		$subject7 = $subjectArray[7];
		$subject8 = $subjectArray[8];
		$subject9 = $subjectArray[9];

		$testQuery = mysql_query("SELECT sum($subject1) as $subjectArray[1], sum($subject2) as $subjectArray[2], sum($subject3) as $subjectArray[3], sum($subject4) as $subjectArray[4], sum($subject5) as $subjectArray[5], sum($subject6) as $subjectArray[6], sum($subject7) as $subjectArray[7], sum($subject8) as $subjectArray[8], sum($subject9) as $subjectArray[9] FROM subjectFeedback WHERE `Email` = '$userEmail'");
	break;
}

// $subject1 = $subjectArray[1];
// $subject2 = $subjectArray[2];
// $subject3 = $subjectArray[3];
// $subject4 = $subjectArray[4];
// $subject5 = $subjectArray[5];
// $subject6 = $subjectArray[6];
// $subject7 = $subjectArray[7];
// $subject8 = $subjectArray[8];
// $subject9 = $subjectArray[9];

// $testQuery = mysql_query("SELECT sum($subject1) as totalSub1, sum($subject2) as $subjectArray[2], sum($subject3) as $subjectArray[3], sum($subject4) as $subjectArray[4], sum($subject5) as $subjectArray[5], sum($subject6) as $subjectArray[6] FROM subjectFeedback WHERE `Email` = '$userEmail'");
$listOfTotals = mysql_fetch_assoc($testQuery);
// echo $listOfTotals;
// echo $listOfTotals[$subjectArray[1]];
// echo $listOfTotals[$subjectArray[2]];
// echo $listOfTotals[$subjectArray[3]];
// echo $listOfTotals[$subjectArray[4]];
// echo $listOfTotals[$subjectArray[5]];
// echo $listOfTotals[$subjectArray[6]];
// echo $listOfTotals[$subjectArray[7]];
// echo $listOfTotals[$subjectArray[8]];
// echo $listOfTotals[$subjectArray[9]];
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
         	echo "{ label: '" . $subjectArray[$j] . "', y: " . $listOfTotals[$subjectArray[$j]] . "},";
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