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

$savedCode = $_POST["code"];
$savedLevel = $_POST["level"];
$savedTitle = $_POST["title"];
$savedPoints = $_POST["points"];
$savedCollege = $_POST["college"];
$savedUrl = $_POST["url"];
//echo $savedCode . $savedTitle . $savedCollege . $savedUrl;
// echo $savedCourse;

//run a check of the current alotment of saved courses for this email address, if the current one doesn't exist then add it
$saveCheck = mysql_query("SELECT CourseTitle FROM savedCourses WHERE `Email` = '$userEmail'");
$j = 0;
while($row = mysql_fetch_assoc($saveCheck)) {
	foreach ($row as $col => $val) {
		if($val === $savedTitle){
			$j++;
		}
	}
}
if($j == 0){ 
	$saveCheck = mysql_query("SELECT Position FROM savedCourses WHERE `Email` = '$userEmail'");
	$k = 0;
	$newPosition = 0;
	while($row = mysql_fetch_assoc($saveCheck)) {
		foreach ($row as $col => $val) {
			if($val >= $newPosition){
				$newPosition = $val + 1;
				// echo $newPosition;
			}
		}
	}
	mysql_query("INSERT INTO `savedCourses` (`Email`, `CourseCode`, `CourseLevel`, `CourseTitle`, `CoursePoints`, `CourseCollege`, `CourseURL`, `Position`) VALUES ('$userEmail', '$savedCode', '$savedLevel', '$savedTitle', '$savedPoints', '$savedCollege', '$savedUrl', '$newPosition')");
	echo "Course Saved!";
	$newAmountSaved = ($user['CoursesSaved'] + 1);
	mysql_query("UPDATE `users` SET `CoursesSaved` = '$newAmountSaved' WHERE `Email` = '$userEmail'");
}
else{
	echo "Already saved this course!";
}






//if I can't get it to work then simply save the course title of whatever the user is looking at currently and then if they hit save, grab the title and then save it permanently in a different table.




// echo "yay";
// $savedCourse = $_POST["courseTitle"];
// // echo "<script type='text/javascript'>alert('" . $array[$currentCourse-1]['CourseCode'] . "');</script>";
// echo "<script type='text/javascript'>alert('" . $savedCourse . "');</script>";
?>