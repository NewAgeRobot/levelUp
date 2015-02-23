<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: /');
}

//test with multiple records to make sure identifier for table records is enouguh/that it works fine.
//sort out check for if they want to redo thier subject choice.
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
$subName = $items[1];

if(isset($_POST['barThing'])){ //FIGURE OUT IF THEY NEED TO HAVE CHECKED A CATEGORY OR WHETHER THEM SIMPLY INPUTTING A SCORE IS ENOUGH
$result2 = mysql_query("SELECT * FROM subjectsGrades WHERE `Email` = '$userEmail'"); //new query for the grade table, remember to add different ID as well as email
	$sliderValue = $_POST['barThing'];
	echo $sliderValue;
	if(isset($_POST['formSubmit'])){
		$subAmount = count($_POST['subject_list']);
		for($k = 0; $k < $subAmount;$k++){
			$currentSub = $_POST['subject_list'][$k];
			//echo $currentSub;
			$subCat = $subName . "Cat";
			$catsChosen .= $currentSub . ",";
			if($k == $subAmount -1){
				//echo $catsChosen;
				mysql_query("INSERT INTO `subjectsGrades` (`Email`, `$subName`, `$subCat`) VALUES ('$userEmail', '$sliderValue', '$catsChosen')");
			}
			//mysql_query("INSERT INTO `subjectsGrades` (`Email`, `$subName`, `$subCat`) VALUES ('$userEmail', '$sliderValue', '$currentSub')");




/*

			if($k == 0){
				mysql_query("INSERT INTO `subjectsGrades` (`Email`, `$subName`, `$subCat`) VALUES ('$userEmail', '$sliderValue', '$currentSub')");
			}
			if($k > 0){
				$prevEntry = $result2['$subCat'];
				$newEntry = $prevEntry . ", " . $currentSub;
				echo $newEntry;
				mysql_query("UPDATE `subjectsGrades` SET `$subCat` = '$newEntry' WHERE `Email` = '$userEmail'");
			}

*/






			//mysql_query("UPDATE `subjectsGrades` SET `$col` = '1' WHERE `Email` = '$userEmail'");

			//multiple checks make multiple records. check length > if more than 1 then first add then update? Also, going to have to use something as well as Email to verify the correct row



			//mysql_query("INSERT INTO `subjectsGrades` (`Email`, `$subName`, `$subCat`) VALUES ('$userEmail', '$sliderValue', '$currentSub')");
			

			//mysql_query("INSERT INTO `subjectsGrades` (`Email`, `EnglishCat`) VALUES ('$userEmail', '$currentSub')");
		}
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
	<?php
	//print_r($items[1]);
	$subName = $items[1];
	echo $subName . "<br /> <br />";
	$cats = mysql_fetch_array(mysql_query("SELECT * FROM `subjects` WHERE `SubjectName` = '$subName'"));
	//echo $cats['Cat1'];
	echo "<form action='' method='post' name='subjectlisting'><table>";

	echo "<tr><td><input id='range' type='range' min='0' max='100' value='10' name='barThing'/>
	<canvas id='counter' width='240' height='240'></canvas> </td></tr>";

	echo "<tr> <td> " . $cats['Cat1'] . "</td><td><input type='checkbox' name='subject_list[]' class='subjectClass' value='" . $cats['Cat1'] . "' /></tr>";
	echo "<tr> <td> " . $cats['Cat2'] . "</td><td><input type='checkbox' name='subject_list[]' class='subjectClass' value='" . $cats['Cat2'] . "' /></tr>";
	echo "<tr> <td> " . $cats['Cat3'] . "</td><td><input type='checkbox' name='subject_list[]' class='subjectClass' value='" . $cats['Cat3'] . "' /></tr>";
	echo "<tr> <td> " . $cats['Cat4'] . "</td><td><input type='checkbox' name='subject_list[]' class='subjectClass' value='" . $cats['Cat4'] . "' /></tr>";

	echo "</table><input type='submit' name='formSubmit' value='Submit' />
</form>";
//Now separate them out and generate first a non-dynamic way for people to enter feedback to get the calls to the database right. Then make it dynamic. Each submit should generate the same again but with new values etc. and keep a counter to track how many they've entered feedback for.
?>
</body>
</html>