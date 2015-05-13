<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}
$userEmail = $user['Email'];

$listOfCourses = $_POST["codeArray"];
$arraySize = sizeof($listOfCourses);

for($counter = 0; $counter < $arraySize; $counter++){ //LOOP THROUGH THE ARRAY AND GET EACH CODE
	// echo $listOfCourses[$counter];
	$tempCode = $listOfCourses[$counter];
	// echo "<script type='text/javascript'>console.log('$listOfCourses[$counter]');</script>";
	mysql_query("UPDATE `savedCourses` SET `Position` = '$counter' WHERE `Email` = '$userEmail' AND `CourseCode` = '$tempCode'");
}

// echo "<script type='text/javascript'>console.log('$listOfCourses[$counter]');</script>";
?>