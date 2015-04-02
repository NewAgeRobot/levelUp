<script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
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
if(!$interest1){
	$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1'");
}
else if(!$interest2){
	$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1'");
}
else if($interest2){
	$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1'");
}
for($i = 0; $array[$i] = mysql_fetch_assoc($allCourses); $i++);
	array_pop($array);
$numCourses = sizeOf($array);
mysql_query("UPDATE `storedInterests` SET `NumCourse` = '$numCourses' WHERE `Email` = '$userEmail'");
if($currentCourse <= ($numCourses-1)){
	echo "<table>";
	echo "Course " . ($currentCourse + 1) . " of " . ($numCourses) . "<br />";
	print_r("<tr><td>Course Title: </td><td class='jsCourseTitle'>" . $array[$currentCourse]['CourseTitle'] . "</td></tr>");
	print_r("<tr><td>Course Code: </td><td class='jsCourseCode'>" . $array[$currentCourse]['CourseCode'] . "</td></tr>");
	print_r("<tr><td>Synopsis: </td><td>" . $array[$currentCourse]['Synopsis'] . "</td></tr>");
	print_r("<tr><td>Points: </td><td>" . $array[$currentCourse]['Points'] . "</td></tr>");
	print_r("<tr><td>Institute: </td><td class='jsCourseCollege'>" . $array[$currentCourse]['Institute'] . "</td></tr>");
	print_r("<tr><td>Hyperlink: </td><td class='jsCourseURL'>" . $array[$currentCourse]['Hyperlink'] . "</td></tr>");
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
} else{
	echo "That is all the courses that match your selection, please refine search for more options.";
	echo "<br />";
	echo "<br />";
	echo "<a href='exploreInterests.php'>Explore more Interests</a>";
}
?>