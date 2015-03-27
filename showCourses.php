<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}

//test with multiple records to make sure identifier for table records is enouguh/that it works fine.
//sort out check for if they want to redo their subject choice.
$userEmail = $user['Email'];
$userInterests = mysql_fetch_array(mysql_query("SELECT * FROM  `storedInterests` WHERE `Email` = '$userEmail'"));
$interest0 = $userInterests['Interest0'];
$interest1 = $userInterests['Interest1'];
$interest2 = $userInterests['Interest2'];
$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1'");

// while ($row = mysql_fetch_assoc($result)) 
// {
//     echo $row['CourseTitle'];
// }

// $row = mysql_fetch_assoc($allCourses);
// print_r($row['CourseTitle']);
for($i = 0; $array[$i] = mysql_fetch_assoc($allCourses); $i++);
array_pop($array);
$numCourses = sizeOf($array);
mysql_query("UPDATE `storedInterests` SET `NumCourse` = '$numCourses' WHERE `Email` = '$userEmail'");


print_r($array[0]['CourseTitle']);
echo "<br />";
print_r($array[1]['CourseTitle']);
echo "<br />";
print_r($array[2]['CourseTitle']);
echo "<br />";
print_r($array[3]['CourseTitle']);
echo "<br />";
print_r($array[4]['CourseTitle']);
echo "<br />";
print_r($array[5]['CourseTitle']);
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/interactions2.js"></script>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">

	<title>test</title>
</head>
<body>
</body>
</html>