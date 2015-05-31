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
$userInterests = mysql_fetch_array(mysql_query("SELECT * FROM  `storedInterests` WHERE `Email` = '$userEmail'"));
$anyCourses = $userInterests['AnyCourses'];


if(!$anyCourses){
	echo "0";
	mysql_query("UPDATE `storedInterests` SET `AnyCourses` = '1' WHERE `Email` = '$userEmail'");
}

?>