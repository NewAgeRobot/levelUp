<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.html');
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

//errors when handling phrases with spaces

?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <title>Statistics</title>
	<script type="text/javascript">
		window.onload = function () {
			var subjectChart = new CanvasJS.Chart("chartContainer", {

				title:{
					text: "Overall Subject Enjoyment"              
				},
data: [//array of dataSeries              
{ //dataSeries object

	/*** Change type "column" to "bar", "area", "line" or "pie"***/
	type: "bar",
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
	type: "pie",
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
  <ul id="menu" >
	<li class="sub"><a href="index.html">Home</a>
	</li>
    <li class="sub"><a href="subjectFeedback.php">Subject Feedback</a>
    </li>
    <li class="sub"><a href="interestFeedback.php">Interest Feedback</a>
    </li>
    <li class="sub"><a href="statistics.php">Statistics</a>
    </li>
    <li class="sub"><a href="">Testimonials</a>
    </li>
    <li class="sub"><a href="exploreInterests.php">Explore Courses</a>
    </li>
    <li class="sub"><a href="savedCourses.php">Saved Courses</a>
    </li>
    <li class="sub"><a href="logout.php">Log Out</a>
    </li>
  </ul>
  
	<div id="chartContainer" style="height: 300px; width: 100%;">
	</div>
	<div id="chartContainer2" style="height: 300px; width: 100%;">
	</div>
</body>
</html>