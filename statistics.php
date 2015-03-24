<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}
$userEmail = $user['Email'];
$result = mysql_query("SELECT * FROM subjectsTable WHERE `Email` = '$userEmail'");
$f = 0;
$items[] = array();
while($row = mysql_fetch_assoc($result)) {
	foreach ($row as $col => $val) {
		if ($f++ < 2) continue;
		if ($val == 1) {
			$items[] = $col;
		}
	}
	$itemsSize = count($items)-1;
}
$subCount = $user['DailyFeedback'];
echo "SUBCOUNT IS : " . $subCount . "and " . $user['SubAmount'] . "<br />";
$subName = $items[$subCount];
if(isset($_POST['barThing'])){
	$currentDay = date("Y/m/d");
	$sliderValue = $_POST['barThing'];
	if(isset($_POST['formSubmit'])){
		$subAmount = count($_POST['subject_list']);
		for($k = 0; $k < $subAmount;$k++){
			$currentSub = $_POST['subject_list'][$k];
			$catsChosen .= $currentSub . ", ";
			if($k == $subAmount -1){
				$catsChosen = rtrim($catsChosen, ", ");
			}
		}
	}
	if($subName == $items[1]){
		mysql_query("INSERT INTO `subjectsCategories` (`Email`, `Date`, `$subName`) VALUES ('$userEmail', '$currentDay', '$catsChosen')");
		mysql_query("INSERT INTO `subjectsGrades` (`Email`, `Date`, `$subName`) VALUES ('$userEmail', '$currentDay', '$sliderValue')");
		$subCount++;
		mysql_query("UPDATE `users` SET `DailyFeedback` = '$subCount' WHERE `Email` = '$userEmail'");
		die("<a href='journal.php'>Go to next subject!</a><br />");
	}
	else if($subCount < $user['SubAmount']){
		mysql_query("UPDATE `subjectsCategories` SET `$subName` = '$catsChosen' WHERE `Email` = '$userEmail' AND `Date` = '$currentDay'");
		mysql_query("UPDATE `subjectsGrades` SET `$subName` = '$sliderValue' WHERE `Email` = '$userEmail' AND `Date` = '$currentDay'");
		$subCount++;
		mysql_query("UPDATE `users` SET `DailyFeedback` = '$subCount' WHERE `Email` = '$userEmail'");
		die("<a href='journal.php'>Go to next subject!</a><br />");
	}
	else{
		mysql_query("UPDATE `subjectsCategories` SET `$subName` = '$catsChosen' WHERE `Email` = '$userEmail' AND `Date` = '$currentDay'");
		mysql_query("UPDATE `subjectsGrades` SET `$subName` = '$sliderValue' WHERE `Email` = '$userEmail' AND `Date` = '$currentDay'");
		$subCount++;
		mysql_query("UPDATE `users` SET `DailyFeedback` = '$subCount' WHERE `Email` = '$userEmail'");
		die("<a href='restrictTest.php'>All done!</a><br />");
	}
}
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="js/MooTools-Core-1.5.1.js"></script>
	<script type="text/javascript" src="js/moo.js"></script>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/interactions.js"></script>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">

	<style type="text/css">
		canvas {
			display: block;
		}

		input {
			width: 200px;
		}

		body {
		}
	</style>

	<title>test</title>
</head>
<body>
<div id="wrapper">
	<?php
	echo $subName . "<br /> <br />";
	$statsReadout = mysql_fetch_array(mysql_query("SELECT * FROM `subjects` WHERE `SubjectName` = '$subName'"));
		
	?>
</div>
</body>
</html>