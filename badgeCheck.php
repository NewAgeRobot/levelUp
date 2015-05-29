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
$amountSaved = $user['CoursesSaved'];

if ($amountSaved > 0){
	$oneBadge = true;
	echo "<img src='images/icons/OneCourse_Badge.png' width='120px'>";
}
if ($amountSaved >= 5){
	$fiveBadge = true;
	echo "<img src='images/icons/FiveCourses_Badge.png' width='120px'>";
}
if ($amountSaved >= 10){
	$tenBadge = true;
	echo "<img src='images/icons/TenCourses_Badge.png' width='120px'>";
}
?>