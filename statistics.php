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
$subjectAmount = $user['SubAmount'];

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
// echo $subjectTotals[$subjectArray[1]];









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

	case 5: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 6: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 7: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];
	$interest7 = $interestsSorted[7];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6], sum($interest7) as $interestsSorted[7] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 8: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];
	$interest7 = $interestsSorted[7];
	$interest8 = $interestsSorted[8];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6], sum($interest7) as $interestsSorted[7], sum($interest8) as $interestsSorted[8] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 9: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];
	$interest7 = $interestsSorted[7];
	$interest8 = $interestsSorted[8];
	$interest9 = $interestsSorted[9];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6], sum($interest7) as $interestsSorted[7], sum($interest8) as $interestsSorted[8], sum($interest9) as $interestsSorted[9] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 10: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];
	$interest7 = $interestsSorted[7];
	$interest8 = $interestsSorted[8];
	$interest9 = $interestsSorted[9];
	$interest10 = $interestsSorted[10];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6], sum($interest7) as $interestsSorted[7], sum($interest8) as $interestsSorted[8], sum($interest9) as $interestsSorted[9], sum($interest10) as $interestsSorted[10] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 11: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];
	$interest7 = $interestsSorted[7];
	$interest8 = $interestsSorted[8];
	$interest9 = $interestsSorted[9];
	$interest10 = $interestsSorted[10];
	$interest11 = $interestsSorted[11];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6], sum($interest7) as $interestsSorted[7], sum($interest8) as $interestsSorted[8], sum($interest9) as $interestsSorted[9], sum($interest10) as $interestsSorted[10] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 12: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];
	$interest7 = $interestsSorted[7];
	$interest8 = $interestsSorted[8];
	$interest9 = $interestsSorted[9];
	$interest10 = $interestsSorted[10];
	$interest11 = $interestsSorted[11];
	$interest12 = $interestsSorted[12];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6], sum($interest7) as $interestsSorted[7], sum($interest8) as $interestsSorted[8], sum($interest9) as $interestsSorted[9], sum($interest10) as $interestsSorted[10], sum($interest11) as $interestsSorted[11], sum($interest12) as $interestsSorted[12] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 13: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];
	$interest7 = $interestsSorted[7];
	$interest8 = $interestsSorted[8];
	$interest9 = $interestsSorted[9];
	$interest10 = $interestsSorted[10];
	$interest11 = $interestsSorted[11];
	$interest12 = $interestsSorted[12];
	$interest13 = $interestsSorted[13];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6], sum($interest7) as $interestsSorted[7], sum($interest8) as $interestsSorted[8], sum($interest9) as $interestsSorted[9], sum($interest10) as $interestsSorted[10], sum($interest11) as $interestsSorted[11], sum($interest12) as $interestsSorted[12], sum($interest13) as $interestsSorted[13] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 14: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];
	$interest7 = $interestsSorted[7];
	$interest8 = $interestsSorted[8];
	$interest9 = $interestsSorted[9];
	$interest10 = $interestsSorted[10];
	$interest11 = $interestsSorted[11];
	$interest12 = $interestsSorted[12];
	$interest13 = $interestsSorted[13];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6], sum($interest7) as $interestsSorted[7], sum($interest8) as $interestsSorted[8], sum($interest9) as $interestsSorted[9], sum($interest10) as $interestsSorted[10], sum($interest11) as $interestsSorted[11], sum($interest12) as $interestsSorted[12], sum($interest13) as $interestsSorted[13], sum($interest14) as $interestsSorted[14] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 15: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];
	$interest7 = $interestsSorted[7];
	$interest8 = $interestsSorted[8];
	$interest9 = $interestsSorted[9];
	$interest10 = $interestsSorted[10];
	$interest11 = $interestsSorted[11];
	$interest12 = $interestsSorted[12];
	$interest13 = $interestsSorted[13];
	$interest14 = $interestsSorted[14];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6], sum($interest7) as $interestsSorted[7], sum($interest8) as $interestsSorted[8], sum($interest9) as $interestsSorted[9], sum($interest10) as $interestsSorted[10], sum($interest11) as $interestsSorted[11], sum($interest12) as $interestsSorted[12], sum($interest13) as $interestsSorted[13], sum($interest14) as $interestsSorted[14], sum($interest15) as $interestsSorted[15] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 16: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];
	$interest7 = $interestsSorted[7];
	$interest8 = $interestsSorted[8];
	$interest9 = $interestsSorted[9];
	$interest10 = $interestsSorted[10];
	$interest11 = $interestsSorted[11];
	$interest12 = $interestsSorted[12];
	$interest13 = $interestsSorted[13];
	$interest14 = $interestsSorted[14];
	$interest15 = $interestsSorted[15];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6], sum($interest7) as $interestsSorted[7], sum($interest8) as $interestsSorted[8], sum($interest9) as $interestsSorted[9], sum($interest10) as $interestsSorted[10], sum($interest11) as $interestsSorted[11], sum($interest12) as $interestsSorted[12], sum($interest13) as $interestsSorted[13], sum($interest14) as $interestsSorted[14], sum($interest15) as $interestsSorted[15], sum($interest16) as $interestsSorted[16] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 17: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];
	$interest7 = $interestsSorted[7];
	$interest8 = $interestsSorted[8];
	$interest9 = $interestsSorted[9];
	$interest10 = $interestsSorted[10];
	$interest11 = $interestsSorted[11];
	$interest12 = $interestsSorted[12];
	$interest13 = $interestsSorted[13];
	$interest14 = $interestsSorted[14];
	$interest15 = $interestsSorted[15];
	$interest16 = $interestsSorted[16];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6], sum($interest7) as $interestsSorted[7], sum($interest8) as $interestsSorted[8], sum($interest9) as $interestsSorted[9], sum($interest10) as $interestsSorted[10], sum($interest11) as $interestsSorted[11], sum($interest12) as $interestsSorted[12], sum($interest13) as $interestsSorted[13], sum($interest14) as $interestsSorted[14], sum($interest15) as $interestsSorted[15], sum($interest16) as $interestsSorted[16], sum($interest17) as $interestsSorted[17] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 18: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];
	$interest7 = $interestsSorted[7];
	$interest8 = $interestsSorted[8];
	$interest9 = $interestsSorted[9];
	$interest10 = $interestsSorted[10];
	$interest11 = $interestsSorted[11];
	$interest12 = $interestsSorted[12];
	$interest13 = $interestsSorted[13];
	$interest14 = $interestsSorted[14];
	$interest15 = $interestsSorted[15];
	$interest16 = $interestsSorted[16];
	$interest17 = $interestsSorted[17];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6], sum($interest7) as $interestsSorted[7], sum($interest8) as $interestsSorted[8], sum($interest9) as $interestsSorted[9], sum($interest10) as $interestsSorted[10], sum($interest11) as $interestsSorted[11], sum($interest12) as $interestsSorted[12], sum($interest13) as $interestsSorted[13], sum($interest14) as $interestsSorted[14], sum($interest15) as $interestsSorted[15], sum($interest16) as $interestsSorted[16], sum($interest17) as $interestsSorted[17], sum($interest18) as $interestsSorted[18] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 19: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];
	$interest7 = $interestsSorted[7];
	$interest8 = $interestsSorted[8];
	$interest9 = $interestsSorted[9];
	$interest10 = $interestsSorted[10];
	$interest11 = $interestsSorted[11];
	$interest12 = $interestsSorted[12];
	$interest13 = $interestsSorted[13];
	$interest14 = $interestsSorted[14];
	$interest15 = $interestsSorted[15];
	$interest16 = $interestsSorted[16];
	$interest17 = $interestsSorted[17];
	$interest18 = $interestsSorted[18];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6], sum($interest7) as $interestsSorted[7], sum($interest8) as $interestsSorted[8], sum($interest9) as $interestsSorted[9], sum($interest10) as $interestsSorted[10], sum($interest11) as $interestsSorted[11], sum($interest12) as $interestsSorted[12], sum($interest13) as $interestsSorted[13], sum($interest14) as $interestsSorted[14], sum($interest15) as $interestsSorted[15], sum($interest16) as $interestsSorted[16], sum($interest17) as $interestsSorted[17], sum($interest18) as $interestsSorted[18], sum($interest19) as $interestsSorted[19] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 20: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];
	$interest7 = $interestsSorted[7];
	$interest8 = $interestsSorted[8];
	$interest9 = $interestsSorted[9];
	$interest10 = $interestsSorted[10];
	$interest11 = $interestsSorted[11];
	$interest12 = $interestsSorted[12];
	$interest13 = $interestsSorted[13];
	$interest14 = $interestsSorted[14];
	$interest15 = $interestsSorted[15];
	$interest16 = $interestsSorted[16];
	$interest17 = $interestsSorted[17];
	$interest18 = $interestsSorted[18];
	$interest19 = $interestsSorted[19];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6], sum($interest7) as $interestsSorted[7], sum($interest8) as $interestsSorted[8], sum($interest9) as $interestsSorted[9], sum($interest10) as $interestsSorted[10], sum($interest11) as $interestsSorted[11], sum($interest12) as $interestsSorted[12], sum($interest13) as $interestsSorted[13], sum($interest14) as $interestsSorted[14], sum($interest15) as $interestsSorted[15], sum($interest16) as $interestsSorted[16], sum($interest17) as $interestsSorted[17], sum($interest18) as $interestsSorted[18], sum($interest19) as $interestsSorted[19], sum($interest20) as $interestsSorted[20] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 21: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];
	$interest7 = $interestsSorted[7];
	$interest8 = $interestsSorted[8];
	$interest9 = $interestsSorted[9];
	$interest10 = $interestsSorted[10];
	$interest11 = $interestsSorted[11];
	$interest12 = $interestsSorted[12];
	$interest13 = $interestsSorted[13];
	$interest14 = $interestsSorted[14];
	$interest15 = $interestsSorted[15];
	$interest16 = $interestsSorted[16];
	$interest17 = $interestsSorted[17];
	$interest18 = $interestsSorted[18];
	$interest19 = $interestsSorted[19];
	$interest20 = $interestsSorted[20];
	$interest20 = $interestsSorted[21];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6], sum($interest7) as $interestsSorted[7], sum($interest8) as $interestsSorted[8], sum($interest9) as $interestsSorted[9], sum($interest10) as $interestsSorted[10], sum($interest11) as $interestsSorted[11], sum($interest12) as $interestsSorted[12], sum($interest13) as $interestsSorted[13], sum($interest14) as $interestsSorted[14], sum($interest15) as $interestsSorted[15], sum($interest16) as $interestsSorted[16], sum($interest17) as $interestsSorted[17], sum($interest18) as $interestsSorted[18], sum($interest19) as $interestsSorted[19], sum($interest20) as $interestsSorted[20], sum($interest21) as $interestsSorted[21] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;

	case 22: 
	$interest1 = $interestsSorted[1];
	$interest2 = $interestsSorted[2];
	$interest3 = $interestsSorted[3];
	$interest4 = $interestsSorted[4];
	$interest5 = $interestsSorted[5];
	$interest6 = $interestsSorted[6];
	$interest7 = $interestsSorted[7];
	$interest8 = $interestsSorted[8];
	$interest9 = $interestsSorted[9];
	$interest10 = $interestsSorted[10];
	$interest11 = $interestsSorted[11];
	$interest12 = $interestsSorted[12];
	$interest13 = $interestsSorted[13];
	$interest14 = $interestsSorted[14];
	$interest15 = $interestsSorted[15];
	$interest16 = $interestsSorted[16];
	$interest17 = $interestsSorted[17];
	$interest18 = $interestsSorted[18];
	$interest19 = $interestsSorted[19];
	$interest20 = $interestsSorted[20];
	$interest21 = $interestsSorted[21];
	$interest22 = $interestsSorted[22];

	$interestQuery = mysql_query("SELECT sum($interest1) as $interestsSorted[1], sum($interest2) as $interestsSorted[2], sum($interest3) as $interestsSorted[3], sum($interest4) as $interestsSorted[4], sum($interest5) as $interestsSorted[5], sum($interest6) as $interestsSorted[6], sum($interest7) as $interestsSorted[7], sum($interest8) as $interestsSorted[8], sum($interest9) as $interestsSorted[9], sum($interest10) as $interestsSorted[10], sum($interest11) as $interestsSorted[11], sum($interest12) as $interestsSorted[12], sum($interest13) as $interestsSorted[13], sum($interest14) as $interestsSorted[14], sum($interest15) as $interestsSorted[15], sum($interest16) as $interestsSorted[16], sum($interest17) as $interestsSorted[17], sum($interest18) as $interestsSorted[18], sum($interest19) as $interestsSorted[19], sum($interest20) as $interestsSorted[20], sum($interest21) as $interestsSorted[21], sum($interest22) as $interestsSorted[22] FROM interestFeedback WHERE `Email` = '$userEmail'");
	break;
}

$interestTotals = mysql_fetch_assoc($interestQuery);

// print_r($interestTotals);
// print_r($subjectTotals);

//errors when handling phrases with spaces



?>
<html lang="en">
<head>

<meta charset="utf-8" />
<title>LevelUp</title>

<meta name="DC.creator" content="Ethan Marcotte - http://ethanmarcotte.com" />
<meta name="robots" content="index, follow" />
<meta name="description" content="A demonstration site for Ethan Marcotte's book, RESPONSIVE WEB DESIGN" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="css/robotCss.css" media="screen, projection" />

<script src="http://use.typekit.com/daz7uli.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
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

        // Build the chart
        $('#interestChart').highcharts({
        	chart: {
        		backgroundColor: '#1b1b27',
        		plotBackgroundColor: null,
        		plotBorderWidth: null,
        		plotShadow: false
        	},
        	colors: ['#00C5CD','#00E5EE','#00F5FF','#67E6EC','#00CDCD','#05EDFF','#70DBDB','#73B1B7','#79CDCD','#7AC5CD','#8EE5EE','#05B8CC','#98F5FF','#B0E0E6','#39B7CD','#0EBFE9','#C1F0F6','#5F9EA0','#00CED1','#97FFFF','#BBFFFF','#8DEEEE','#66CCCC'],
        	title: {
        		text: 'Interest enjoyment over time',
        		style: {
	                color: '#FFF'
	            }
        	},
        	tooltip: {
        		pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        	},
        	plotOptions: {
        		pie: {
        			allowPointSelect: true,
        			cursor: 'pointer',
        			dataLabels: {
        				enabled: false
        			},
        			showInLegend: true
        		},
        		series: {
                	// borderColor: '#00E5EE',
                	// borderWidth: 1,
                	borderWidth: 0,
                	shadow: false
            	}
        	},
        	legend: {
            backgroundColor: 'grey'
        },
            series: [{
            	type: 'pie',
            	name: 'Interest percentage',
            	data: [
            	<?php
            	for($o = 1; $o <= intval($interestAmount); $o++){
            		echo "['" . $interestsSorted[$o] . "' , " . floatval($interestTotals[$interestsSorted[$o]]) . "],";
            	} 
            	?>
                    ]
                }]
            });
});

});


$(function () { //change to have different name than container

	$(document).ready(function () {

        // Build the chart
        $('#subjectChart').highcharts({
        	chart: {
        		backgroundColor: '#1b1b27',
        		plotBackgroundColor: null,
        		plotBorderWidth: null,
        		plotShadow: false
        	},
        	colors: ['#FA1D2F','#D41A1F','#F54D70','#FF0033','#CC4E5C','#F64D54','#FFB6C1','#F54D70','#FF82AB','#EEA2AD','#FFAEB9','#AF1E2D','#C82536','#B81324'],
        	title: {
        		text: 'Subject enjoyment over time',
        		style: {
	                color: '#FFF'
	            }
        	},
        	tooltip: {
        		pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        	},
        	plotOptions: {
        		pie: {
        			allowPointSelect: true,
        			cursor: 'pointer',
        			dataLabels: {
        				enabled: false
        			},
        			showInLegend: true
        		},
        		series: {
        			// borderColor: '#F54D70',
           //      	borderWidth: 1,
                	borderWidth: 0,
                	shadow: false
            	}
        	},
        	legend: {
            backgroundColor: 'grey'
        },


            series: [{
            	type: 'pie',
            	name: 'Interest percentage',
            	data: [
            	<?php
            	for($o = 1; $o <= intval($subjectAmount); $o++){
            		echo "['" . $subjectArray[$o] . "' , " . intval($subjectTotals[$subjectArray[$o]]) . "],";
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

</head>

<body>

<div class="site">

	<div class="page">

	
		<h1 class="logo"><a href="homepage.php"><img src="images/header-logo.png" /></a></h1>

		<ul class="nav nav-primary bigMenu">
			<li id="nav-explore" class="first"><a href="exploreInterests.php" data-ajax='false'>Explore</a></li>
			<li id="nav-feedback" class="second"><a href="interestFeedback.php" data-ajax='false'>Weekly Feedback</a></li>
			<li id="nav-stats" class="third"><a href="statistics.php" data-ajax='false'>Statistics</a></li>
			<li id="nav-test" class="fourth"><a href="testimonials.php" data-ajax='false'>Testimonials</a></li>
			<li id="nav-saved" class="fifth"><a href="savedCourses.php" data-ajax='false'>Saved Courses</a></li>
			<li id="nav-log" class="sixth"><a href="logout.php" data-ajax='false'>Log Out</a></li>
		</ul><!-- /end ul#nav-primary.nav -->

		
		<ul class="nav nav-primary smallMenu">
		<img src="images/text-logo.png"></li><ul class="menu">
				    <li>
				        <a href="#">&#9776; Menu</a>
				        <ul>
				            <li><a href="exploreInterests.php" data-ajax='false'><img src="images/explore-icon.png">Explore</a></li>
				            <li><a href="interestFeedback.php" data-ajax='false'><img src="images/feedback-icon.png">Weekly Feedback</a></li>
				            <li><a href="statistics.php" data-ajax='false'><img src="images/stats-icon.png">Statistics</a></li>
				            <li><a href="testimonials.php" data-ajax='false'><img src="images/testimonials-icon.png">Testimonials</a></li>
				            <li><a href="savedCourses.php" data-ajax='false'><img src="images/saved-icon.png">Saved Courses</a></li>
				            <li><a href="logout.php" data-ajax='false'><img src="images/account-icon.png">Log Out</a></li>
				        </ul>
				    </li>
				</ul>
		</ul><!-- /end ul#nav-primary.nav -->


		
		<hr />

		<div class="blog section">
			<h1 class="lede"><?php echo $prompts['Prompt'];?></h1>

			<div class="main">
				<div class="article">
					<div class="header">
						<h1 class="title">Tick up to 3 interests</h1>
					</div><!-- /end .header -->

					

				<div class="intro">
					<?php 
      	if ($noInterests) {
      		echo "<div id='interestChart' style='min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto'></div>";
      	}
      	else {
      		echo "<p>You must fill out some feedback on your interests before we can display the statistics.</p>";
      	}
      	if ($noSubjects) {
      		echo "<div id='subjectChart' style='min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto'></div>";
      	}
      	else {
      		echo "<p>You must fill out some feedback on your subjects before we can display the statistics.</p>";
      	}
      ?>
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
