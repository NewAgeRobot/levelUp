<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}
$userEmail = $user['Email'];
$userInterests = mysql_fetch_array(mysql_query("SELECT * FROM  `storedInterests` WHERE `Email` = '$userEmail'"));

$counties[] = array();
$countyNumber = 0;
$county1;
$county2;
$county3;
$county4;
$county5;
$county6;
$county7;
$county8;
$county9;
$county10;
$county11;
$county12;
$county13;
$county14;
$county15;

for($f = 7; $f < 22; $f++){
	if($userInterests[$f] != ""){
		switch ($f) {
		    case 7:
		        $county1 = $userInterests[$f];
		        break;
		    case 8:
		        $county2 = $userInterests[$f];
		        break;
		    case 9:
		        $county3 = $userInterests[$f];
		        break;
		    case 10:
		        $county4 = $userInterests[$f];
		        break;
		    case 11:
		        $county5 = $userInterests[$f];
		        break;
		    case 12:
		        $county6 = $userInterests[$f];
		        break;
		    case 13:
		        $county7 = $userInterests[$f];
		        break;
		    case 14:
		        $county8 = $userInterests[$f];
		        break;
		    case 15:
		        $county9 = $userInterests[$f];
		        break;
		    case 16:
		        $county10 = $userInterests[$f];
		        break;
		    case 17:
		        $county11 = $userInterests[$f];
		        break;
		    case 18:
		        $county12 = $userInterests[$f];
		        break;
		    case 19:
		        $county13 = $userInterests[$f];
		        break;
		    case 20:
		        $county14 = $userInterests[$f];
		        break;
		    case 21:
		        $county15 = $userInterests[$f];
		        break;
		}
		$countyNumber++;
	}
		//echo $countyNumber;
		//echo $county1;
}
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

		$(document).ready(function(){
			$('.ajax').show();
			$(".ajax").click(function() {
				var code = $(".jsCourseCode").text();
				var title = $(".jsCourseTitle").text();
				var college = $(".jsCourseCollege").text();
				var url = $(".jsCourseURL").text();
				//alert(s);
				$.ajax({
					method: 'POST' ,
					url: 'saveCourse.php' ,
					data: { code: code, title: title, college: college, url: url } ,
					success: function(result)
					{
					//$('.ajax').after(result); //replace with .html("saved!"); when working
					// $('.ajax').after("Course Saved!");
					$('.ajax').after(result);
					$('.ajax').hide();
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
		//figure out how to integrate the county refinement. If County0 is empty then just do these normally. Might be a switch statement case. Maybe approach it at the array level? 
		//Where I can run through the array and remove entries that aren't equal to the chosen counties 
		switch ($countyNumber) {
		    case 0:
		        if(!$interest1){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1'");
				}
				else if(!$interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1'");
				}
				else if($interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1'");
				}
		        break;
		    case 1:
		        if(!$interest1){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `County` = '$county1'");
				}
				else if(!$interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `County` = '$county1'");
				}
				else if($interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND `County` = '$county1'");
				}
		        break;
		    case 2:
		        if(!$interest1){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2')");
				}
				else if(!$interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2')");
				}
				else if($interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2')");
				}
		        break;
		    case 3:
		        if(!$interest1){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3')");
				}
				else if(!$interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3')");
				}
				else if($interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3')");
				}
		        break;
		    case 4:
		        if(!$interest1){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4')");
				}
				else if(!$interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4')");
				}
				else if($interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4')");
				}
		        break;
		    case 5:
		        if(!$interest1){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5')");
				}
				else if(!$interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5')");
				}
				else if($interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5')");
				}
		        break;
		    case 6:
		        if(!$interest1){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6')");
				}
				else if(!$interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6')");
				}
				else if($interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6')");
				}
		        break;
		    case 7:
		        if(!$interest1){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7')");
				}
				else if(!$interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7')");
				}
				else if($interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7')");
				}
		        break;
		    case 8:
		        if(!$interest1){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8')");
				}
				else if(!$interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8')");
				}
				else if($interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8')");
				}
		        break;
		    case 9:
		        if(!$interest1){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9')");
				}
				else if(!$interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9')");
				}
				else if($interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9')");
				}
		        break;
		    case 10:
		        if(!$interest1){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10')");
				}
				else if(!$interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10')");
				}
				else if($interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10')");
				}
		        break;
		    case 11:
		        if(!$interest1){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11')");
				}
				else if(!$interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11')");
				}
				else if($interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11')");
				}
		        break;
		    case 12:
		        if(!$interest1){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12')");
				}
				else if(!$interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12')");
				}
				else if($interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12')");
				}
		        break;
		    case 13:
		        if(!$interest1){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13')");
				}
				else if(!$interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13')");
				}
				else if($interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13')");
				}
		        break;
		    case 14:
		        if(!$interest1){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14')");
				}
				else if(!$interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14')");
				}
				else if($interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14')");
				}
		        break;
		    case 15:
		        if(!$interest1){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14' || `County` = '$county15')");
				}
				else if(!$interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14' || `County` = '$county15')");
				}
				else if($interest2){
					$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14' || `County` = '$county15')");
				}
		        break;
		}

		// if(!$interest1){
		// 	$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1'");
		// }
		// else if(!$interest2){
		// 	$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1'");
		// }
		// else if($interest2){
		// 	$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1'");
		// }
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
				print_r("<tr><td>Course Title: </td><td class='jsCourseTitle'>" . $array[$currentCourse]['CourseTitle'] . "</td></tr>");
				print_r("<tr><td>Course Code: </td><td class='jsCourseCode'>" . $array[$currentCourse]['CourseCode'] . "</td></tr>");
				print_r("<tr><td>Synopsis: </td><td>" . $array[$currentCourse]['Synopsis'] . "</td></tr>");
				print_r("<tr><td>Points: </td><td>" . $array[$currentCourse]['Points'] . "</td></tr>");
				print_r("<tr><td>Institute: </td><td class='jsCourseCollege'>" . $array[$currentCourse]['Institute'] . "</td></tr>");
				print_r("<tr><td>Hyperlink: </td><td class='jsCourseURL'><a href='" . $array[$currentCourse]['Hyperlink'] . "'target='_blank'>" . $array[$currentCourse]['Hyperlink'] . "</a></td></tr>"); //not working
				echo "</table>";
				echo "<br />";
				$currentCourse++;
				mysql_query("UPDATE `storedInterests` SET `CurrentCourse` = '$currentCourse' WHERE `Email` = '$userEmail'");
				echo "<br />";
				echo "<br />";
				echo "<a href='exploreInterests.php'>Explore more Interests</a>";
				echo "<br />";
				echo "<a href='#' onCLick='return false' onmousedown='javascript:nextCourse(" . $currentCourse . ");'>Next Course</a>";
				echo "<br />";
				echo "<a href='javascript:{}' class='ajax'>Save Course</a>";
			}
		}
		?>
		
	</div>
</body>
</html>