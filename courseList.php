<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}
$userEmail = $user['Email'];
$userInterests = mysql_fetch_array(mysql_query("SELECT * FROM  `storedInterests` WHERE `Email` = '$userEmail'"));

$interest0 = $userInterests['Interest0'];
$interest1 = $userInterests['Interest1'];
$interest2 = $userInterests['Interest2'];
$currentCourse = $userInterests['CurrentCourse'];
$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1'");
for($i = 0; $array[$i] = mysql_fetch_assoc($allCourses); $i++);
	array_pop($array);
$numCourses = sizeOf($array);
mysql_query("UPDATE `storedInterests` SET `NumCourse` = '$numCourses' WHERE `Email` = '$userEmail'");
if($currentCourse <= ($numCourses-1)){
echo "Course " . ($currentCourse + 1) . " of " . ($numCourses) . "<br />";
print_r("Course title: " . $array[$currentCourse]['CourseTitle']);
echo "<br />";
print_r("Course Code: " . $array[$currentCourse]['CourseCode']);
echo "<br />";
print_r("Synopsis: " . $array[$currentCourse]['Synopsis']);
echo "<br />";
print_r("Points: " . $array[$currentCourse]['Points']);
echo "<br />";
print_r("Institute: " . $array[$currentCourse]['Institute']);
echo "<br />";
print_r("Hyperlink: " . $array[$currentCourse]['Hyperlink']);
echo "<br />";
echo "<br />";
$currentCourse++;
mysql_query("UPDATE `storedInterests` SET `CurrentCourse` = '$currentCourse' WHERE `Email` = '$userEmail'");
} else{
	header('Location: exploreInterests.php');
}
?>