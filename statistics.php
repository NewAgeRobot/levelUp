<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}
if(!$user['CoursesPicked']){
	header('Location: subjectChoice.php');
}
$userEmail = $user['Email'];
// $subjectAmount = $user['SubAmount'];

$subjectScores = mysql_query("SELECT * FROM subjectFeedback WHERE `Email` = '$userEmail'");
$subjectArray[] = array();

if (mysql_num_rows($subjectScores) > 0) {
	$noSubjects = 1;
}
else{
	$noSubjects = 0;
}

$l = 0;

while($row = mysql_fetch_assoc($subjectScores)) {
	foreach ($row as $col => $val) {
		if ($col == 'ID' || $col == 'Date' || $col == 'Email') continue;

		if ($val > 0) {
			$subjectArray[] = $col;
				// echo $col . "<br />";
		}
	}
}

$subjectArray = array_unique($subjectArray);
$subjectArray = array_values($subjectArray);
$subjectAmount = sizeof($subjectArray) -1;

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
// print_r($subjectTotals);
// echo $subjectTotals[$subject1];
// echo $subjectArray[1];
arsort($subjectTotals);
// print_r($subjectTotals);
// $newSubjectArray = [];
foreach($subjectTotals as $key => $value)
{
	$newSubjectArray[] = $key;
}
$newSubjectAmount = sizeof($newSubjectArray);

// echo $newSubjectArray[1];








$interestScores = mysql_query("SELECT * FROM interestFeedback WHERE `Email` = '$userEmail'");
$interestArray[] = array();

if (mysql_num_rows($interestScores) > 0) {
	$noInterests = 1;
}
else{
	$noInterests = 0;
}

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

// $interestsSorted = array_values(array_unique($interestArray));
// $interestAmount = count($interestsSorted) - 1;
// print_r($interestArray);
$interestArray = array_unique($interestArray);
// print_r($interestArray);
$interestArray = array_values($interestArray);
// print_r($interestArray);
$interestAmount = sizeof($interestArray) -1;


switch ($interestAmount){
	case 3: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 4: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 5: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 6: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 7: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];
	$interest7 = $interestArray[7];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6], sum($interest7) as $interestArray[7] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 8: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];
	$interest7 = $interestArray[7];
	$interest8 = $interestArray[8];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6], sum($interest7) as $interestArray[7], sum($interest8) as $interestArray[8] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 9: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];
	$interest7 = $interestArray[7];
	$interest8 = $interestArray[8];
	$interest9 = $interestArray[9];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6], sum($interest7) as $interestArray[7], sum($interest8) as $interestArray[8], sum($interest9) as $interestArray[9] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 10: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];
	$interest7 = $interestArray[7];
	$interest8 = $interestArray[8];
	$interest9 = $interestArray[9];
	$interest10 = $interestArray[10];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6], sum($interest7) as $interestArray[7], sum($interest8) as $interestArray[8], sum($interest9) as $interestArray[9], sum($interest10) as $interestArray[10] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 11: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];
	$interest7 = $interestArray[7];
	$interest8 = $interestArray[8];
	$interest9 = $interestArray[9];
	$interest10 = $interestArray[10];
	$interest11 = $interestArray[11];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6], sum($interest7) as $interestArray[7], sum($interest8) as $interestArray[8], sum($interest9) as $interestArray[9], sum($interest10) as $interestArray[10] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 12: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];
	$interest7 = $interestArray[7];
	$interest8 = $interestArray[8];
	$interest9 = $interestArray[9];
	$interest10 = $interestArray[10];
	$interest11 = $interestArray[11];
	$interest12 = $interestArray[12];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6], sum($interest7) as $interestArray[7], sum($interest8) as $interestArray[8], sum($interest9) as $interestArray[9], sum($interest10) as $interestArray[10], sum($interest11) as $interestArray[11], sum($interest12) as $interestArray[12] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 13: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];
	$interest7 = $interestArray[7];
	$interest8 = $interestArray[8];
	$interest9 = $interestArray[9];
	$interest10 = $interestArray[10];
	$interest11 = $interestArray[11];
	$interest12 = $interestArray[12];
	$interest13 = $interestArray[13];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6], sum($interest7) as $interestArray[7], sum($interest8) as $interestArray[8], sum($interest9) as $interestArray[9], sum($interest10) as $interestArray[10], sum($interest11) as $interestArray[11], sum($interest12) as $interestArray[12], sum($interest13) as $interestArray[13] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 14: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];
	$interest7 = $interestArray[7];
	$interest8 = $interestArray[8];
	$interest9 = $interestArray[9];
	$interest10 = $interestArray[10];
	$interest11 = $interestArray[11];
	$interest12 = $interestArray[12];
	$interest13 = $interestArray[13];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6], sum($interest7) as $interestArray[7], sum($interest8) as $interestArray[8], sum($interest9) as $interestArray[9], sum($interest10) as $interestArray[10], sum($interest11) as $interestArray[11], sum($interest12) as $interestArray[12], sum($interest13) as $interestArray[13], sum($interest14) as $interestArray[14] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 15: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];
	$interest7 = $interestArray[7];
	$interest8 = $interestArray[8];
	$interest9 = $interestArray[9];
	$interest10 = $interestArray[10];
	$interest11 = $interestArray[11];
	$interest12 = $interestArray[12];
	$interest13 = $interestArray[13];
	$interest14 = $interestArray[14];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6], sum($interest7) as $interestArray[7], sum($interest8) as $interestArray[8], sum($interest9) as $interestArray[9], sum($interest10) as $interestArray[10], sum($interest11) as $interestArray[11], sum($interest12) as $interestArray[12], sum($interest13) as $interestArray[13], sum($interest14) as $interestArray[14], sum($interest15) as $interestArray[15] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 16: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];
	$interest7 = $interestArray[7];
	$interest8 = $interestArray[8];
	$interest9 = $interestArray[9];
	$interest10 = $interestArray[10];
	$interest11 = $interestArray[11];
	$interest12 = $interestArray[12];
	$interest13 = $interestArray[13];
	$interest14 = $interestArray[14];
	$interest15 = $interestArray[15];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6], sum($interest7) as $interestArray[7], sum($interest8) as $interestArray[8], sum($interest9) as $interestArray[9], sum($interest10) as $interestArray[10], sum($interest11) as $interestArray[11], sum($interest12) as $interestArray[12], sum($interest13) as $interestArray[13], sum($interest14) as $interestArray[14], sum($interest15) as $interestArray[15], sum($interest16) as $interestArray[16] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 17: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];
	$interest7 = $interestArray[7];
	$interest8 = $interestArray[8];
	$interest9 = $interestArray[9];
	$interest10 = $interestArray[10];
	$interest11 = $interestArray[11];
	$interest12 = $interestArray[12];
	$interest13 = $interestArray[13];
	$interest14 = $interestArray[14];
	$interest15 = $interestArray[15];
	$interest16 = $interestArray[16];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6], sum($interest7) as $interestArray[7], sum($interest8) as $interestArray[8], sum($interest9) as $interestArray[9], sum($interest10) as $interestArray[10], sum($interest11) as $interestArray[11], sum($interest12) as $interestArray[12], sum($interest13) as $interestArray[13], sum($interest14) as $interestArray[14], sum($interest15) as $interestArray[15], sum($interest16) as $interestArray[16], sum($interest17) as $interestArray[17] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 18: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];
	$interest7 = $interestArray[7];
	$interest8 = $interestArray[8];
	$interest9 = $interestArray[9];
	$interest10 = $interestArray[10];
	$interest11 = $interestArray[11];
	$interest12 = $interestArray[12];
	$interest13 = $interestArray[13];
	$interest14 = $interestArray[14];
	$interest15 = $interestArray[15];
	$interest16 = $interestArray[16];
	$interest17 = $interestArray[17];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6], sum($interest7) as $interestArray[7], sum($interest8) as $interestArray[8], sum($interest9) as $interestArray[9], sum($interest10) as $interestArray[10], sum($interest11) as $interestArray[11], sum($interest12) as $interestArray[12], sum($interest13) as $interestArray[13], sum($interest14) as $interestArray[14], sum($interest15) as $interestArray[15], sum($interest16) as $interestArray[16], sum($interest17) as $interestArray[17], sum($interest18) as $interestArray[18] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 19: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];
	$interest7 = $interestArray[7];
	$interest8 = $interestArray[8];
	$interest9 = $interestArray[9];
	$interest10 = $interestArray[10];
	$interest11 = $interestArray[11];
	$interest12 = $interestArray[12];
	$interest13 = $interestArray[13];
	$interest14 = $interestArray[14];
	$interest15 = $interestArray[15];
	$interest16 = $interestArray[16];
	$interest17 = $interestArray[17];
	$interest18 = $interestArray[18];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6], sum($interest7) as $interestArray[7], sum($interest8) as $interestArray[8], sum($interest9) as $interestArray[9], sum($interest10) as $interestArray[10], sum($interest11) as $interestArray[11], sum($interest12) as $interestArray[12], sum($interest13) as $interestArray[13], sum($interest14) as $interestArray[14], sum($interest15) as $interestArray[15], sum($interest16) as $interestArray[16], sum($interest17) as $interestArray[17], sum($interest18) as $interestArray[18], sum($interest19) as $interestArray[19] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 20: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];
	$interest7 = $interestArray[7];
	$interest8 = $interestArray[8];
	$interest9 = $interestArray[9];
	$interest10 = $interestArray[10];
	$interest11 = $interestArray[11];
	$interest12 = $interestArray[12];
	$interest13 = $interestArray[13];
	$interest14 = $interestArray[14];
	$interest15 = $interestArray[15];
	$interest16 = $interestArray[16];
	$interest17 = $interestArray[17];
	$interest18 = $interestArray[18];
	$interest19 = $interestArray[19];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6], sum($interest7) as $interestArray[7], sum($interest8) as $interestArray[8], sum($interest9) as $interestArray[9], sum($interest10) as $interestArray[10], sum($interest11) as $interestArray[11], sum($interest12) as $interestArray[12], sum($interest13) as $interestArray[13], sum($interest14) as $interestArray[14], sum($interest15) as $interestArray[15], sum($interest16) as $interestArray[16], sum($interest17) as $interestArray[17], sum($interest18) as $interestArray[18], sum($interest19) as $interestArray[19], sum($interest20) as $interestArray[20] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 21: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];
	$interest7 = $interestArray[7];
	$interest8 = $interestArray[8];
	$interest9 = $interestArray[9];
	$interest10 = $interestArray[10];
	$interest11 = $interestArray[11];
	$interest12 = $interestArray[12];
	$interest13 = $interestArray[13];
	$interest14 = $interestArray[14];
	$interest15 = $interestArray[15];
	$interest16 = $interestArray[16];
	$interest17 = $interestArray[17];
	$interest18 = $interestArray[18];
	$interest19 = $interestArray[19];
	$interest20 = $interestArray[20];
	$interest20 = $interestArray[21];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6], sum($interest7) as $interestArray[7], sum($interest8) as $interestArray[8], sum($interest9) as $interestArray[9], sum($interest10) as $interestArray[10], sum($interest11) as $interestArray[11], sum($interest12) as $interestArray[12], sum($interest13) as $interestArray[13], sum($interest14) as $interestArray[14], sum($interest15) as $interestArray[15], sum($interest16) as $interestArray[16], sum($interest17) as $interestArray[17], sum($interest18) as $interestArray[18], sum($interest19) as $interestArray[19], sum($interest20) as $interestArray[20], sum($interest21) as $interestArray[21] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 22: 
	$interest1 = $interestArray[1];
	$interest2 = $interestArray[2];
	$interest3 = $interestArray[3];
	$interest4 = $interestArray[4];
	$interest5 = $interestArray[5];
	$interest6 = $interestArray[6];
	$interest7 = $interestArray[7];
	$interest8 = $interestArray[8];
	$interest9 = $interestArray[9];
	$interest10 = $interestArray[10];
	$interest11 = $interestArray[11];
	$interest12 = $interestArray[12];
	$interest13 = $interestArray[13];
	$interest14 = $interestArray[14];
	$interest15 = $interestArray[15];
	$interest16 = $interestArray[16];
	$interest17 = $interestArray[17];
	$interest18 = $interestArray[18];
	$interest19 = $interestArray[19];
	$interest20 = $interestArray[20];
	$interest21 = $interestArray[21];
	$interest22 = $interestArray[22];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestArray[1], sum($interest2) as $interestArray[2], sum($interest3) as $interestArray[3], sum($interest4) as $interestArray[4], sum($interest5) as $interestArray[5], sum($interest6) as $interestArray[6], sum($interest7) as $interestArray[7], sum($interest8) as $interestArray[8], sum($interest9) as $interestArray[9], sum($interest10) as $interestArray[10], sum($interest11) as $interestArray[11], sum($interest12) as $interestArray[12], sum($interest13) as $interestArray[13], sum($interest14) as $interestArray[14], sum($interest15) as $interestArray[15], sum($interest16) as $interestArray[16], sum($interest17) as $interestArray[17], sum($interest18) as $interestArray[18], sum($interest19) as $interestArray[19], sum($interest20) as $interestArray[20], sum($interest21) as $interestArray[21], sum($interest22) as $interestArray[22] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;
}

$interestTotals = mysql_fetch_assoc($interestQuery);


arsort($interestTotals);

// $newInterestsSortedArray = [];
foreach($interestTotals as $key => $value)
{
	$newInterestsSortedArray[] = $key;
}
$newInterestAmount = sizeof($newInterestsSortedArray);

// print_r($interestTotals);
// print_r($subjectTotals);

//errors when handling phrases with spaces



?>
<html lang="en">
<head>

	<meta charset="utf-8" />
	<title>LevelUp</title>

	<meta name="LevelUp" content="Level Up - http://www.Levelup.ie" />
	<meta name="description" content="A website to help students better discover what they enjoy and want to pursue after second level." /> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="css/robotCss.css" media="screen, projection" />

	<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="css/jquery-mobile.css" />
	<script src="js/jquery-mobile.js"></script>
	<link rel="stylesheet" href="css/dropit.css" />
	<script src="js/dropit.js"></script>
	<script src="js/redirect.js"></script>
	<script type="text/javascript" src="js/canvasjs.min.js"></script>
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<script src="http://code.highcharts.com/modules/data.js"></script>
	<script src="http://code.highcharts.com/modules/drilldown.js"></script>
	<script type="text/javascript">



$(function () { //change to have different name than container

	$(document).ready(function () {
		$('#interestChart').highcharts({
			chart: {
				backgroundColor: '#2f3945',
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false
			},
			colors: ['#98cad3','#35c0e1','#138699'],
			title: {
				text: 'Your Top 3 Interests',
				style: {
					color: '#FFF',
					fontSize: '44px',
					fontFamily: '"Lobster"'
				},
				y: 50
			},
			credits: {
				enabled: false
			},
			tooltip: {
				'labelFormatter':function () { 
					var total = 0, percentage; 
					$.each(this.series.data, function() { 
						total+=this.y; 
					}); 

					percentage=((this.y/total)*100).toFixed(1); 
					return this.name+' '+percentage+'%'; 
				}
			},
			plotOptions: {
				pie: {
					dataLabels: {
						enabled: true,
						distance: -55,
						style: {
          					textShadow: false, 
							fontWeight: 'bold',
							color: 'white',
							fontFamily: '"PT Sans"',
							fontSize: '18px',
							width: '100px'
						}
					},
					borderWidth: 0,
					startAngle: 0,
					endAngle: 360,
					center: ['50%', '50%']
				}
			},
			series: [{
				type: 'pie',
				name: 'Points Allocated',
				innerSize: '0%',
				data: [
				<?php
				if ($noInterests) {
					for($o = 0; $o < 3; $o++){
						$tempInterest = $newInterestsSortedArray[$o];
						$cleanName = str_replace("_"," ", $tempInterest);
						echo "['" . $cleanName . "' , " .  intval($interestTotals[$tempInterest]) . "],";
					} 
				}
				else{
					echo "['No Data Yet',   45],
					['No Data Yet',   45],
					['No Data Yet',   45]";
				}
				?>
				]
			}]
		});
});
});

$(function () { //change to have different name than container

	$(document).ready(function () {
		$('#subjectChart').highcharts({
			chart: {
				backgroundColor: '#2f3945',
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false
			},
			colors: ['#f88c8c','#ec3837','#b02e2e'],
			title: {
				text: 'Your Top 3 Subjects',
				style: {
					color: '#FFF',
					fontSize: '44px',
					fontFamily: '"Lobster"'
				},
				y: 50
			},
			credits: {
				enabled: false
			},
			tooltip: {
				'labelFormatter':function () { 
					var total = 0, percentage; 
					$.each(this.series.data, function() { 
						total+=this.y; 
					}); 

					percentage=((this.y/total)*100).toFixed(1); 
					return this.name+' '+percentage+'%'; 
				}
			},
			plotOptions: {
				pie: {
					dataLabels: {
						enabled: true,
						distance: -55,
						style: {
          					textShadow: false, 
							fontWeight: 'bold',
							color: 'white',
							fontFamily: '"PT Sans"',
							fontSize: '18px',
							width: '100px'
						}
					},
					borderWidth: 0,
					startAngle: 0,
					endAngle: 360,
					center: ['50%', '50%']
				}
			},
			series: [{
				type: 'pie',
				name: 'Points Allocated',
				innerSize: '0%',
				data: [
				<?php
				if ($noSubjects) {
					for($o = 0; $o < 3; $o++){
						$tempSubject = $newSubjectArray[$o];
						$cleanName = str_replace("_"," ", $tempSubject);
						echo "['" . $cleanName . "' , " . intval($subjectTotals[$tempSubject]) . "],";
					} 
				}
				else{
					echo "['No Data Yet',   45],
					['No Data Yet',   45],
					['No Data Yet',   45]";
				}
				?>
				]
			}]
		});
});


});


</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.menu').dropit();
	});
</script>

 <script type="text/javascript">
  $(document).ready(function(){
      $(".smallMenu .header-image img").click(function() {
        window.location.replace("homepage.php");
      });
    });
</script>

</head>

<body>

	<div class="site">
    <div class='whiteHeader'><span class="currentPageSpanLeft"><a href="homepage.php" data-ajax='false'><img src="images/icons/Home_Icon.png"></a></span><span class="currentPageSpanRight">Statistics</span></div>

		<div class="page">


			<div class="navigationBar">
				<!-- <h1 class="logo"><a href="homepage.php"><img src="images/header-logo.png" /></a></h1> -->

				<ul class="nav nav-primary bigMenu">
					<div class="logoTest"><li id="logoImage"><a href="homepage.php" data-ajax='false'><img src="images/icons/LOGO_withFont.png"></a></li></div>
					<li id="nav-explore" class="first"><a href="exploreInterests.php" data-ajax='false'>&nbsp;&nbsp;Explore&nbsp;&nbsp;&nbsp;</a></li><li id="nav-saved" class="fifth"><a href="savedCourses.php" data-ajax='false'>>&nbsp;&nbsp;Saved Courses&nbsp;&nbsp;</a></li><li id="nav-feedback" class="second"><a href="interestFeedback.php" data-ajax='false'>>&nbsp;&nbsp;Weekly Feedback&nbsp;&nbsp;</a></li><li id="nav-stats"><a href="statistics.php" data-ajax='false'>><b class="currentPage">&nbsp;&nbsp;Statistics&nbsp;&nbsp;</b></a></li><li id="nav-test" class="fourth"><a href="testimonials.php" data-ajax='false'>>&nbsp;&nbsp;Testimonials&nbsp;&nbsp;</a></li><li id="nav-log" class="sixth"><a href="logout.php" data-ajax='false'>>&nbsp;&nbsp;Log Out&nbsp;&nbsp;</a></li>
				</ul><!-- /end ul#nav-primary.nav -->


				<ul class="nav nav-primary smallMenu">
          <li class="header-image"><img src="images/icons/LOGO_ForMobile.png"></li>
					<ul class="menu">
						<li>
							<a href="#">&#9776; Menu</a>
							<ul>
                <li><a href="exploreInterests.php" data-ajax='false'><img src="images/icons/icon_ExploreCourses.jpg">Explore</a></li>
                <li><a href="savedCourses.php" data-ajax='false'><img src="images/icons/icon_SavedCourses.jpg">Saved Courses</a></li>
                <li><a href="interestFeedback.php" data-ajax='false'><img src="images/icons/icon_MyRecords.jpg">Weekly Feedback</a></li>
                <li><a href="statistics.php" data-ajax='false'><img src="images/icons/icon_Statistics.jpg">Statistics</a></li>
                <li><a href="testimonials.php" data-ajax='false'><img src="images/icons/icon_Testimonials.jpg">Testimonials</a></li>
                <li><a href="logout.php" data-ajax='false'><img src="images/icons/icon_LogOut.jpg">Log Out</a></li>
							</ul>
						</li>
					</ul>
				</ul><!-- /end ul#nav-primary.nav -->
			</div>



			<hr />

			<div class="blog section">

				<div class="main">
					<div class="article">
						<div class="header">
							<h1 class="title"></h1>
						</div><!-- /end .header -->



						<div class="intro">
							<div id='interestChart' style='min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto'></div>
							<div class="Divider"><img src="images/icons/Divider.png"></div>
							<div id='subjectChart' style='min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto'></div>
							<div style="text-align:center;font-size:18px;font-family:'PT Sans';">Above are your current top 3 interests and subjects. To update them just enter more ratings in the feedback section, or explore more courses based on these statistics.</div>
			<table class='saveNextButtons savedCoursesButtons'>
			<tr><td>
                <a href='exploreInterests.php' class='backArrow' data-ajax='false'><img src='images/icons/explore_btn.png'></a>
                </td><td>
                <a href='interestFeedback.php' class='backArrow' data-ajax='false'><img src='images/icons/savedCourgses_btn.png'>weekly feedback</a>
                </td></tr></table>

							<div class="meta section">
							</div> <!-- /end .meta.section -->
						</div><!-- /end .article -->
					</div><!-- /end .main -->
				</div><!-- /end .blog.section -->

				<div id="footer">
			<!-- <p>Images &copy; their respective copyright holders.</p>

			<p>The design and code is &copy; 2014 <a href="http://unstoppablerobotninja.com/">Ethan Marcotte</a>, supporting his book <cite><a href="http://www.abookapart.com/products/responsive-web-design">Responsive Web Design</a></cite>.</p>

			<p>Beep boop beep.</p> -->
		</div><!-- /end #footer -->
	</div><!-- /end .page -->
</div><!-- /end .site -->

</body>
</html>
