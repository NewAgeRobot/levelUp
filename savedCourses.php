<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}
$userEmail = $user['Email'];
$saveCheck = mysql_query("SELECT CourseTitle FROM savedCourses WHERE `Email` = '$userEmail'");
$num_rows = mysql_num_rows($saveCheck);
//make notice for if the user has no saved courses yet
//echo $num_rows;
if(!$num_rows){
	echo "loser";
}
else{
	//query the other information or maybe see about just uploading all course info when they save a course, then pasting it here. Just the important bits maybe, like course title, code, synopsis and link? or maybe just code and title
	while($row = mysql_fetch_assoc($saveCheck)) {
		foreach ($row as $col => $val) {
			echo $val . "<br />";
		}
	}
}
?>
<html> <!-- Remove ="en" from every page, look up the html 5 thing to put -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="js/interactions2.js"></script>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">

	<title>test</title>
</head>
<body>

</body>
</html>