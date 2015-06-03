  <link rel="stylesheet" href="css/robotCss.css" media="screen, projection" />

  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  <link rel="stylesheet" href="css/jquery-mobile.css" />
  <link rel="stylesheet" href="css/dropit.css" />

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
		// $("#myDiv").html("<img src='images/loader.gif'>").show();
		var url="nextCourse.php";
		$.post(url, {contentVar: cv}, function(data){
			$(".thinnerCourses").html(data).show();
		});
	}

    function previousCourse(cv){
      // $("#myDiv").html("<img src='images/loader.gif'>").show();
      var url="previousCourse.php";
      $.post(url, {contentVar: cv}, function(data){
        $(".thinnerCourses").html(data).show();
      });
    }



	$(document).ready(function(){
      $(".completeSynopsis").hide();
      $(".showLess").hide(); 

      var target = $(".sliderPos");
      var screenSize = $(window).width();
      // alert(screenSize);
      if(screenSize < 845){
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 400);
          return false;
        }
      };

      
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
         				nextCourse();
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
$currentCourse--;
mysql_query("UPDATE `storedInterests` SET `CurrentCourse` = '$currentCourse' WHERE `Email` = '$userEmail'");




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

if($currentCourse%15==0){
              echo "<div class='showCoursesBorder'>";
  echo "<div class='promptTitle'>Don't forget!</div>";
  echo "<div class='promptBody'>College is not the only option after school. Check out the Testimonials page to explore other options.</div>";
    echo "<div style='width: 15%; min-width:130px;max-width:180px;'><a href='testimonials.php' data-ajax='false'><img src='images/icons/testimonials_btn.png'></a></div>";

              echo "</div>";
            }

mysql_query("UPDATE `storedInterests` SET `NumCourse` = '$numCourses' WHERE `Email` = '$userEmail'");
              if($currentCourse <= ($numCourses-1)){
                print_r("<div class='hiddenLink'><div class='jsCourseURL'><a href='" . $seededArray[$currentCourse]['Hyperlink'] . "'target='_blank'>" . $array[$currentCourse]['Hyperlink'] . "</a></div></div>");
                // echo "<br />";
				echo "<table style='width:100%'><tr><td class='courseCounter'>";
				echo "You chose: ";
				if(!$interest1){
				  echo $interest0;
				}
				else if(!$interest2){
				  echo $interest0 . " and " . $interest1;
				}
				else if($interest2){
				  echo $interest0 . ", " . $interest1 . ", and " . $interest2;
				};
				echo "</td></tr>";
				echo "<tr><td class='sliderPos'>";
				echo "<span class='courseCounter'>Course " . ($currentCourse + 1) . " of " . ($numCourses);
				echo "</td></tr>";
				echo "</table>";
                echo "<table class='saveNextButtons'><tr><td>";
				if($currentCourse == 0){
                  echo "<a href='#' onCLick='return false' onmousedown='javascript:previousCourse(" . $currentCourse . ");'><img src='images/icons/PreviousCourse_btn.png' style='visibility:hidden;'></a>";
                }
                else{
                  echo "<a href='#' onCLick='return false' onmousedown='javascript:previousCourse(" . $currentCourse . ");'><img src='images/icons/PreviousCourse_btn.png'></a>";
                }                
                echo "</td><td>";
                echo "<a href='javascript:{}' class='ajax'><img src='images/icons/SaveCourse_Btn.png'></a>";
                echo "</td><td>";
                echo "<a href='#' onCLick='return false' onmousedown='javascript:nextCourse(" . $currentCourse . ");'><img src='images/icons/NextCourse_btn.png'></a>";
                echo "</td></tr></table>";
                echo "<div class='showCoursesBorder'>";
                echo "<table class='showCourses'>";
                print_r("<tr><td class='jsCourseCode'><b>" . $seededArray[$currentCourse]['CourseCode'] . "</b></td></tr>");
                print_r("<tr><td class='jsCourseTitle'><b>" . utf8_encode($seededArray[$currentCourse]['CourseTitle']) . "</b></td></tr>");
                print_r("<tr><td class='jsCourseLevel'><b>Level: </b>" . $seededArray[$currentCourse]['CourseLevel'] . "</td></tr>");
                print_r("<tr><td class='jsCourseCollege'>" . utf8_encode($seededArray[$currentCourse]['Institute']) . "</td></tr>");
                print_r("<tr><td class='jsCoursePoints'><b>Points: </b>" . $seededArray[$currentCourse]['Points'] . "</td></tr>");
                echo "<tr><td class='openQuotes'><img src='images/icons/LeftQuotation.jpg'></td></tr>";


                $synopsisSpaceCount =  substr_count($seededArray[$currentCourse]['Synopsis'], '.');
// echo $synopsisSpaceCount;
                if($synopsisSpaceCount >= 5){
                  $lastPeriodPosition = strpos($seededArray[$currentCourse]['Synopsis'], '.', 400); //there's no space after the 250 mark / this works but sometimes all you're seeing is 1 character more. Check if length is within 20
                  $synopsisLength = strlen($seededArray[$currentCourse]['Synopsis']);
                  if($synopsisLength <= 430){
                    print_r("<tr><td>" . utf8_encode(substr($seededArray[$currentCourse]['Synopsis'], 0, $synopsisLength) . "</td></tr>"));
                  }
                  else{
                    echo "<tr><td>";
                    print_r("<span class='teaserSynopsis'>" . utf8_encode(substr($seededArray[$currentCourse]['Synopsis'], 0, $lastPeriodPosition)) . "</span><span class='showMore'><font color='#ed7d7c' style='cursor: pointer;'>...Show more</font></span>");
                    print_r("<span class='completeSynopsis'>" . utf8_encode(substr($seededArray[$currentCourse]['Synopsis'], 0, $synopsisLength)) . "</span><span class='showLess'><font color='#ed7d7c' style='cursor: pointer;'>...Show less</font></span>");
                    echo "</td></tr>";
                  }

                }
                else{
                  print_r("<tr><td>" . utf8_encode($seededArray[$currentCourse]['Synopsis']) . "</td></tr>");
                }

                echo "<tr><td class='closeQuotes'><img src='images/icons/RightQuotation.jpg'></td></tr><tr><td class='closeQuotes'>-Taken from institute website</td></tr>";
                // print_r("<tr class='hiddenLink'><td class='jsCourseURL'><a href='" . $seededArray[$currentCourse]['Hyperlink'] . "'target='_blank'>" . $array[$currentCourse]['Hyperlink'] . "</a></td></tr>"); //not working
                //MAYBE JUST HIDE THIS? LIKE, HAVE IT ECHO OUT BUT MAKE IT HIDDEN AND SHOW THE BUTTON INSTEAD?
                print_r("<tr><td class='visitWebsite'><a href='" . $seededArray[$currentCourse]['Hyperlink'] . "'target='_blank'><img src='images/icons/visitWebsite_btn.png'></a></td></tr>");
                
                echo "</table>";
                echo "</div>";
                
                echo "</table>";
                echo "</div>";
                echo "<table class='saveNextButtons'><tr><td>";
                echo "<a href='exploreInterests.php' class='backArrow' data-ajax='false'><img src='images/icons/goBack_btn.png'></a>";
                echo "</td><td>";
                echo "<a href='savedCourses.php' class='backArrow' data-ajax='false'><img src='images/icons/savedCourses_btn.png'></a>";
                echo "</td></tr></table>";
              } else{
              echo "There are no more courses that match this selection.<br /> <a href='exploreInterests.php' data-ajax='false'><img src='images/icons/goBack_btn.png' style='width:50%; max-width:50px;'></a>";
			}
            ?>