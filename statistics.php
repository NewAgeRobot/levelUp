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
}

switch ($subjectAmount){
	case 6: 
	$subject1 = $subjectArray[1];
	$subject2 = $subjectArray[2];
	$subject3 = $subjectArray[3];
	$subject4 = $subjectArray[4];
	$subject5 = $subjectArray[5];
	$subject6 = $subjectArray[6];

	$subjectQuery = mysql_query("SELECT sum($subject1) as $subjectArray[1], sum($subject2) as $subjectArray[2], sum($subject3) as $subjectArray[3], sum($subject4) as $subjectArray[4], sum($subject5) as $subjectArray[5], sum($subject6) as $subjectArray[6] FROM subjectFeedback WHERE `Email` = '$userEmail'");
	break;

	case 7: 
	$subject1 = $subjectArray[1];
	$subject2 = $subjectArray[2];
	$subject3 = $subjectArray[3];
	$subject4 = $subjectArray[4];
	$subject5 = $subjectArray[5];
	$subject6 = $subjectArray[6];
	$subject7 = $subjectArray[7];

	$subjectQuery = mysql_query("SELECT sum($subject1) as $subjectArray[1], sum($subject2) as $subjectArray[2], sum($subject3) as $subjectArray[3], sum($subject4) as $subjectArray[4], sum($subject5) as $subjectArray[5], sum($subject6) as $subjectArray[6], sum($subject7) as $subjectArray[7] FROM subjectFeedback WHERE `Email` = '$userEmail'");
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

	$subjectQuery = mysql_query("SELECT sum($subject1) as $subjectArray[1], sum($subject2) as $subjectArray[2], sum($subject3) as $subjectArray[3], sum($subject4) as $subjectArray[4], sum($subject5) as $subjectArray[5], sum($subject6) as $subjectArray[6], sum($subject7) as $subjectArray[7], sum($subject8) as $subjectArray[8] FROM subjectFeedback WHERE `Email` = '$userEmail'");
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

	$subjectQuery = mysql_query("SELECT sum($subject1) as $subjectArray[1], sum($subject2) as $subjectArray[2], sum($subject3) as $subjectArray[3], sum($subject4) as $subjectArray[4], sum($subject5) as $subjectArray[5], sum($subject6) as $subjectArray[6], sum($subject7) as $subjectArray[7], sum($subject8) as $subjectArray[8], sum($subject9) as $subjectArray[9] FROM subjectFeedback WHERE `Email` = '$userEmail'");
	break;
}

$subjectTotals = mysql_fetch_assoc($subjectQuery);









$interestScores = mysql_query("SELECT * FROM interestFeedback WHERE `Email` = '$userEmail'");
$interestArray[] = array();

while($row = mysql_fetch_assoc($interestScores)) {
	foreach ($row as $col => $val) {
		if ($col == 'ID' || $col == 'Date' || $col == 'Email') continue;
		if ($val > 0) {
			// echo $col;
			$interestArray[] = $col;
		}
	}
}
// $sorted = array_unique($interestArray);

$interestsSorted = array_values(array_unique($interestArray));
$interestAmount = count($interestsSorted) - 1;


switch ($interestAmount){
	case 3: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 4: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;
}

//do out the rest for the possible amoounts they can have - 20 or so? all the interests

$interestTotals = mysql_fetch_assoc($interestQuery);


?>
<!DOCTYPE HTML>
<html>
<head>
	<script type="text/javascript">
		window.onload = function () {
			var subjectChart = new CanvasJS.Chart("chartContainer", {

				title:{
					text: "Overall Subject Enjoyment"              
				},
data: [//array of dataSeries              
{ //dataSeries object

	/*** Change type "column" to "bar", "area", "line" or "pie"***/
	type: "column",
	dataPoints: [
	<?php
	for($j = 1; $j <= $subjectAmount; $j++){
		echo "{ label: '" . $subjectArray[$j] . " - " . $subjectTotals[$subjectArray[$j]] . "', y: " . $subjectTotals[$subjectArray[$j]] . "},";
	} 
	?>
	]
}
]
});
			var interestChart = new CanvasJS.Chart("chartContainer2", {

				title:{
					text: "Overall Interest Enjoyment"              
				},
data: [//array of dataSeries              
{ //dataSeries object

	/*** Change type "column" to "bar", "area", "line" or "pie"***/
	type: "column",
	dataPoints: [
	<?php
	for($o = 1; $o <= $interestAmount; $o++){
		echo "{ label: '" . $interestsSorted[$o] . " - " . $interestTotals[$interestsSorted[$o]] . "', y: " . $interestTotals[$interestsSorted[$o]] . "},";
	} 
	?>
	]
}
]
});

			subjectChart.render();
			interestChart.render();
		}
	</script>
	<script type="text/javascript" src="js/canvasjs.min.js"></script>
</head>
<body>
	<div id="chartContainer" style="height: 300px; width: 100%;">
	</div>
	<div id="chartContainer2" style="height: 300px; width: 100%;">
	</div>
</body>
</html>