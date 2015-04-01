<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}
$userEmail = $user['Email'];

$savedCourse = $_POST["name"];
// echo $savedCourse;

//run a check of the current alotment of saved courses for this email address, if the current one doesn't exist then add it
$saveCheck = mysql_query("SELECT CourseTitle FROM savedCourses WHERE `Email` = '$userEmail'");
$j = 0;
while($row = mysql_fetch_assoc($saveCheck)) {
	foreach ($row as $col => $val) {
		if($val === $savedCourse){
			$j++;
		}
	}
}
if($j == 0){
	mysql_query("INSERT INTO `savedCourses` (`Email`, `CourseTitle`) VALUES ('$userEmail', '$savedCourse')");
	echo "Course Saved!";
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