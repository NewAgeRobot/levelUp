<script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <style type="text/css">
  .completeSynopsis{
    display:none;
}

.teaserSynopsis{
}

.showMoreSynopsis{
    color:navy;
    cursor:pointer;
}
</style>
<script language="Javascript" type="text/javascript">


	function nextCourse(cv){
		$("#myDiv").html("<img src='images/loader.gif'>").show();
		var url="courseList.php";
		$.post(url, {contentVar: cv}, function(data){
			$("#myDiv").html(data).show();
		});
	}



	$(document).ready(function(){
      $(".completeSynopsis").hide();
      $(".showLess").hide(); 

      
		$('.ajax').show();
		$(".ajax").click(function() {
			var code = $(".jsCourseCode").text();
			var level = $(".jsCourseLevel").text();
			var title = $(".jsCourseTitle").text();
			var points = $(".jsCoursePoints").text();
			var college = $(".jsCourseCollege").text();
			var url = $(".jsCourseURL").text();
				//alert(s);
				$.ajax({
					method: 'POST' ,
					url: 'saveCourse.php' ,
					data: { code: code, level: level, title: title, points: points, college: college, url: url } ,
					success: function(result)
					{
					 	//$('.ajax').after(result); //replace with .html("saved!"); when working
					 	// $('.ajax').after("Course Saved!");
					 	$('.ajax').after(result);
					 	$('.ajax').hide();
					 }
					});
			});

     $( ".showLess").click(function() {
        $(".teaserSynopsis").show();  
        $(".completeSynopsis").hide(); 
        $(".showLess").hide(); 
        $(".showMore").show(); 
    // $(this).text("...Show More").siblings(".teaserSynopsis").hide();    
  });

      $( ".showMore").click(function() {
        $(".teaserSynopsis").hide();  
        $(".completeSynopsis").show();
        $(".showLess").show(); 
        $(".showMore").hide(); 
    // $(this).text("...Show less").siblings(".teaserSynopsis").show(); 
      // $(this).text("...Show less").siblings(".completeSynopsis").hide();
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
$userSeed = $userInterests['Seed'];

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
}

$interest0 = $userInterests['Interest0'];
$interest1 = $userInterests['Interest1'];
$interest2 = $userInterests['Interest2'];

$level0 = $userInterests['Level0'];
$level1 = $userInterests['Level1'];
$level2 = $userInterests['Level2'];

if(!$level0 || $level2){
	$levelNumber = 0;
}
else if(!$level1){
	$levelNumber = 1;
}
else if(!$level2){
	$levelNumber = 2;
}

$currentCourse = $userInterests['CurrentCourse'];
switch($levelNumber){
	case 0:
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
	break;
	case 1:
	switch ($countyNumber) {
		case 0:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1'");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1'");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1'");
		}
		break;
		case 1:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `County` = '$county1'");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `County` = '$county1'");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND `County` = '$county1'");
		}
		break;
		case 2:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2')");
		}
		break;
		case 3:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3')");
		}
		break;
		case 4:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4')");
		}
		break;
		case 5:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5')");
		}
		break;
		case 6:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6')");
		}
		break;
		case 7:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7')");
		}
		break;
		case 8:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8')");
		}
		break;
		case 9:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9')");
		}
		break;
		case 10:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10')");
		}
		break;
		case 11:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11')");
		}
		break;
		case 12:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12')");
		}
		break;
		case 13:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13')");
		}
		break;
		case 14:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14')");
		}
		break;
		case 15:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14' || `County` = '$county15')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14' || `County` = '$county15')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE `CourseLevel` = '$level0' AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14' || `County` = '$county15')");
		}
		break;
	}
	break;
	case 2:
	switch ($countyNumber) {
		case 0:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1'");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1'");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1'");
		}
		break;
		case 1:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `County` = '$county1'");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `County` = '$county1'");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND `County` = '$county1'");
		}
		break;
		case 2:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2')");
		}
		break;
		case 3:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3')");
		}
		break;
		case 4:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4')");
		}
		break;
		case 5:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5')");
		}
		break;
		case 6:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6')");
		}
		break;
		case 7:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7')");
		}
		break;
		case 8:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8')");
		}
		break;
		case 9:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9')");
		}
		break;
		case 10:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10')");
		}
		break;
		case 11:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11')");
		}
		break;
		case 12:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12')");
		}
		break;
		case 13:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13')");
		}
		break;
		case 14:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14')");
		}
		break;
		case 15:
		if(!$interest1){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14' || `County` = '$county15')");
		}
		else if(!$interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14' || `County` = '$county15')");
		}
		else if($interest2){
			$allCourses = mysql_query("SELECT * FROM interestsTable WHERE (`CourseLevel` = '$level0' OR `CourseLevel` = '$level1') AND `$interest0` = '1' AND `$interest1` = '1' AND `$interest2` = '1' AND (`County` = '$county1' || `County` = '$county2' || `County` = '$county3' || `County` = '$county4' || `County` = '$county5' || `County` = '$county6' || `County` = '$county7' || `County` = '$county8' || `County` = '$county9' || `County` = '$county10' || `County` = '$county11' || `County` = '$county12' || `County` = '$county13' || `County` = '$county14' || `County` = '$county15')");
		}
		break;
	}
	break;
}



for($i = 0; $array[$i] = mysql_fetch_assoc($allCourses); $i++);
	array_pop($array);
$numCourses = sizeOf($array);
$newTest = $array;



mt_srand($userSeed);
$order = array_map(create_function('$val', 'return mt_rand();'), range(1, count($array)));
array_multisort($order, $array);

function sortArrayByArray(Array $array, Array $orderArray) {
	$ordered = array();
	foreach($orderArray as $key) {
		if(array_key_exists($key,$array)) {
			$ordered[$key] = $array[$key];
			unset($array[$key]);
		}
	}
	return $ordered + $array;
}

$seededArray = sortArrayByArray($array, $newTest);



mysql_query("UPDATE `storedInterests` SET `NumCourse` = '$numCourses' WHERE `Email` = '$userEmail'");
if($currentCourse <= ($numCourses-1)){
	if(($currentCourse + 1)%8 === 0){
		echo "<h4>Remember to check out the testimonials to see the paths that others followed.</h4>";
	}
	echo "<table>";
	echo "Course " . ($currentCourse + 1) . " of " . ($numCourses) . "<br />";
	print_r("<tr><td>Course Title: </td><td class='jsCourseTitle'>" . $seededArray[$currentCourse]['CourseTitle'] . "</td></tr>");
	print_r("<tr><td>Course Code: </td><td class='jsCourseCode'>" . $seededArray[$currentCourse]['CourseCode'] . "</td></tr>");
	print_r("<tr><td>Level: </td><td class='jsCourseLevel'>" . $seededArray[$currentCourse]['CourseLevel'] . "</td></tr>");



	$synopsisSpaceCount =  substr_count($seededArray[$currentCourse]['Synopsis'], ' ');
              // echo $synopsisSpaceCount;
              if($synopsisSpaceCount > 34){
                $lastSpacePosition = strpos($seededArray[$currentCourse]['Synopsis'], ' ', 250);
                $synopsisLength = strlen($seededArray[$currentCourse]['Synopsis']);
                if($synopsisLength < 250){
                  print_r("<tr><td>Synopsis: </td><td>" . substr($seededArray[$currentCourse]['Synopsis'], 0, $synopsisLength) . "</td></tr>");
                }
                else{
                  echo "<tr><td>Synopsis: </td><td>";
                  print_r("<span class='teaserSynopsis'>" . substr($seededArray[$currentCourse]['Synopsis'], 0, $lastSpacePosition) . "</span><span class='showMore'><font color='lightblue' style='cursor: pointer;'>...Show more</font></span>");
                  print_r("<span class='completeSynopsis'>" . substr($seededArray[$currentCourse]['Synopsis'], 0, $synopsisLength) . "</span><span class='showLess'><font color='lightblue' style='cursor: pointer;'>...Show less</font></span>");
                  echo "</td></tr>";
                }
              }
              else{
                print_r("<tr><td>Synopsis: </td><td>" . $seededArray[$currentCourse]['Synopsis'] . "</td></tr>");
              }


	print_r("<tr><td>Points: </td><td class='jsCoursePoints'>" . $seededArray[$currentCourse]['Points'] . "</td></tr>");
	print_r("<tr><td>Institute: </td><td class='jsCourseCollege'>" . $seededArray[$currentCourse]['Institute'] . "</td></tr>");
	print_r("<tr><td>Hyperlink: </td><td class='jsCourseURL'><a href='" . $seededArray[$currentCourse]['Hyperlink'] . "'target='_blank'>" . $seededArray[$currentCourse]['Hyperlink'] . "</a></td></tr>");
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