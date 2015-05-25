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

$codeToDelete = $_POST["code"];

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
$deleteQuery = "DELETE FROM savedCourses WHERE `CourseCode` = '$codeToDelete' AND `Email` = '$userEmail' LIMIT 1";
$deletion = mysql_query($deleteQuery, $db);
?>