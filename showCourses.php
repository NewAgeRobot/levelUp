<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}
$userEmail = $user['Email'];
$userInterests = mysql_fetch_array(mysql_query("SELECT * FROM  `storedInterests` WHERE `Email` = '$userEmail'"));
// $interest0 = $userInterests['Interest0'];
// $interest1 = $userInterests['Interest1'];
// $interest2 = $userInterests['Interest2'];
// $currentCourse = $userInterests['CurrentCourse'];
// $allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1'");
// for($i = 0; $array[$i] = mysql_fetch_assoc($allCourses); $i++);
// 	array_pop($array);
// $numCourses = sizeOf($array);
// mysql_query("UPDATE `storedInterests` SET `NumCourse` = '$numCourses' WHERE `Email` = '$userEmail'");
// if($currentCourse <= ($numCourses-1)){
// echo "Course " . ($currentCourse + 1) . " of " . ($numCourses) . "<br />";
// print_r("Course title: " . $array[$currentCourse]['CourseTitle']);
// echo "<br />";
// print_r("Course Code: " . $array[$currentCourse]['CourseCode']);
// echo "<br />";
// print_r("Synopsis: " . $array[$currentCourse]['Synopsis']);
// echo "<br />";
// print_r("Points: " . $array[$currentCourse]['Points']);
// echo "<br />";
// print_r("Institute: " . $array[$currentCourse]['Institute']);
// echo "<br />";
// print_r("Hyperlink: " . $array[$currentCourse]['Hyperlink']);
// echo "<br />";
// echo "<br />";
// $currentCourse++;
// mysql_query("UPDATE `storedInterests` SET `CurrentCourse` = '$currentCourse' WHERE `Email` = '$userEmail'");
// echo "<p><a href='exploreInterests.php'>Explore more Interests</a></p>";
// echo "<p><a href='showCourses.php'>Next Course</a></p>";
// } else{
// 	header('Location: exploreInterests.php');
// }
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="js/interactions2.js"></script>
	<!--<script src="js/jquery.js"></script>  link to the app javascript file -->
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<script language="Javascript" type="text/javascript">
		function nextCourse(cv){
			$("#myDiv").html("<img src='http://media.jumpingjack.com/JumpingJack/loading.gif'>").show();
			var url="courseList.php";
			$.post(url, {contentVar: cv}, function(data){
				$("#myDiv").html(data).show();
			});
		}

		function saveCourse(course){
			var url="saveCourse.php";
			$.post(url, {courseTitle: course}, function(data){
				$("#myDiv").html(data).show();
			});
		}

		$(document).ready(function(){
			$(".ajax").click(function() {
				var s = $(".jsCourseTitle").text();
				//alert(s);
				$.ajax({
					method: 'POST' ,
					url: 'saveCourse.php' ,
					data: { name: s } ,
					success: function(result)
					{
						$('.ajax').after(result); //replace with .html("saved!"); when working
					}
				});
			});
		});

		
	</script>

	<title>test</title>
</head>
<body>
	<!-- pass the nextCourse variable the php of the current course? -->
	<div id="myDiv">
		<?php 
		$interest0 = $userInterests['Interest0'];
		$interest1 = $userInterests['Interest1'];
		$interest2 = $userInterests['Interest2'];
		$currentCourse = $userInterests['CurrentCourse'];
			//if statement for selection of multiple ones determinging what $allcourses is given the value of
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1'");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1'");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1'");
		}
			// $allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1'");
		for($i = 0; $array[$i] = mysql_fetch_assoc($allCourses); $i++);
			array_pop($array);
		$numCourses = sizeOf($array);
			//if statement to check the size of the array has at least one course. If it doesn't then a different message is run
		if(!$numCourses){
			echo "Apologies, but no matches were found. <br /> <a href='exploreInterests.php'>Please choose again </a>";
		}
		else{
			mysql_query("UPDATE `storedInterests` SET `NumCourse` = '$numCourses' WHERE `Email` = '$userEmail'");
			if($currentCourse <= ($numCourses-1)){
				echo "<table>";
				echo "Course " . ($currentCourse + 1) . " of " . ($numCourses) . "<br />";
				print_r("Course title: " . $array[$currentCourse]['CourseTitle']);
				echo "<br />";
				print_r("<tr><td>Course Code: </td><td class='jsCourseTitle'>" . $array[$currentCourse]['CourseCode'] . "</td></tr>");
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
				$toSend = $array[$currentCourse]['CourseCode'];
				$currentCourse++;
				mysql_query("UPDATE `storedInterests` SET `CurrentCourse` = '$currentCourse' WHERE `Email` = '$userEmail'");
				echo "<br />";
				echo "<br />";
				echo "<a href='exploreInterests.php'>Explore more Interests</a>";
				echo "<br />";
				echo "<a href='#' onCLick='return false' onmousedown='javascript:nextCourse(" . $currentCourse . ");'>Next Course</a>";
				echo "</table>";
			}
		}
		?>
		<a href="javascript:{}" class="ajax">run ajax</a>
	</div>
</body>
</html>