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
	echo "<span class='badgeBlock'><img src='images/icons/OneCourse_Saved_Positive.png'></span>";
}
else{
	echo "<span class='badgeBlock'><img src='images/icons/OneCourse_Saved_Negative.png' style='opacity: 0.2;'></span>";
}

if ($amountSaved >= 5){
	$fiveBadge = true;
	echo "<span class='badgeBlock'><img src='images/icons/FiveCourse_Saved_Positive.png'></span>";
}
else{
	echo "<span class='badgeBlock'><img src='images/icons/FiveCourse_Saved_Negative.png' style='opacity: 0.2;'></span>";
}
if ($amountSaved >= 10){
	$tenBadge = true;
	echo "<span class='badgeBlock'><img src='images/icons/TenCourse_Saved_Positive.png'></span>";
}
else{
	echo "<span class='badgeBlock'><img src='images/icons/TenCourse_Saved_Negative.png' style='opacity: 0.2;'></span>";
}
?>