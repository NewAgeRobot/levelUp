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
$result = mysql_query("SELECT * FROM interestsTable");

$currentLogin = mysql_query("SELECT * FROM visitStats WHERE `Email` = '$userEmail' AND `CurrentLogin` = '1'");

while($row = mysql_fetch_array($currentLogin)){
	$currentLoginTime = $row['LoginTime'];
}

print_r($currentLogin['LoginTime']);


$i = 0;
if(isset($_POST['formSubmit'])){
	$subAmount = count($_POST['subject_list']);
	//echo $subAmount;
	mysql_query("UPDATE `storedInterests` SET `interest0`='', `interest1`='', `interest2`='', `CurrentCourse` = '0', `NumCourse` = '0', `County0`='', `County1`='', `County2`='', `County3`='', `County4`='', `County5`='', `County6`='', `County7`='', `County8`='', `County9`='', `County10`='', `County11`='', `County12`='', `County13`='', `County14`='', `Seed` = '0', `Level0` = '', `Level1` = '', `Level2` = '' WHERE `Email` = '$userEmail'");
	for($k = 0; $k < $subAmount;$k++){
		$currentSub = $_POST['subject_list'][$k];
		$col = "interest" . $k;
		mysql_query("UPDATE `storedInterests` SET `$col` = '$currentSub' WHERE `Email` = '$userEmail'");

	}
	$count = count($_POST['Counties']);
	//echo $count;
	for($j = 0; $j < $count;$j++){
		$currentCounty = $_POST['Counties'][$j];
		$countyNumber = "County" . $j;
		mysql_query("UPDATE `storedInterests` SET `$countyNumber` = '$currentCounty' WHERE `Email` = '$userEmail'");

	}
// THIS IS TO BE TURNED INTO THE CODE FOR SENDING WHAT LEVELS HAVE BEEN SELECTED
	$levelCount = count($_POST['courseLevel']);
	//echo $count;
	for($l = 0; $l < $levelCount;$l++){
		$currentLevel = $_POST['courseLevel'][$l];
		$levelNumber = "Level" . $l;
		mysql_query("UPDATE `storedInterests` SET `$levelNumber` = '$currentLevel' WHERE `Email` = '$userEmail'");
	}

	$randomSeed = rand(1, 50);
	$randomSeed = (string)$randomSeed;
	mysql_query("UPDATE `storedInterests` SET `Seed` = '$randomSeed' WHERE `Email` = '$userEmail'");

	mysql_query("UPDATE `visitStats` SET `ExploreAmount` = ExploreAmount + 1 WHERE `Email` = '$userEmail' AND `LoginTime` = '$currentLoginTime'");












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
            if(!$numCourses){
				mysql_query("UPDATE `storedInterests` SET `AnyCourses` = '0' WHERE `Email` = '$userEmail'");
            }
            else{
            	header('Location: showCourses.php');
            }
}

$prompts = mysql_fetch_array(mysql_query("SELECT * FROM feedbackPrompts WHERE `Interests` = '1' ORDER BY rand() 
	LIMIT 1"));


	?>
	<html lang="en">
	<head>

		<meta charset="utf-8" />
		<title>LevelUp</title>

		<meta name="LevelUp" content="Level Up - http://www.Levelup.ie" />
  <meta name="description" content="A website to help students better discover what they enjoy and want to pursue after second level." /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="css/robotCss.css" media="screen, projection" />

  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" href="css/jquery-mobile.css" />
		<script src="js/jquery-mobile.js"></script>
		<link rel="stylesheet" href="css/dropit.css" />
		<script src="js/dropit.js"></script>
		<script src="js/redirect.js"></script>


		<script type="text/javascript">
			$(document).ready(function() {
				$('.menu').dropit();

				checkAnyCourses();
				function checkAnyCourses(){
			      var url="courseCheck.php";
			      $.post(url, function(data){
			      	// alert(data);
			        if(data == "0"){
			        	// alert("That combination has no courses in common, try selecting some others.");
			        	$("#noCourseWarning").show();


			        	var target = $("#noCourseWarning");
					      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
					      if (target.length) {
					        $('html,body').animate({
					          scrollTop: target.offset().top
					        }, 1000);
					        return false;
					      }
			        }else{
			        	$("#noCourseWarning").hide();
			        }
			      });
			    }
			});
		</script>



		<script type="text/javascript">
			var main = function(){
				$("input[name='subject_list[]']:checkbox").click(function() {
					var bol = $("input[name='subject_list[]']:checkbox:checked").length >= 3;
					$("input[name='subject_list[]']:checkbox").not(":checked").attr("disabled",bol);
				});

				$(".subjectClass").change(function() {
					if($(".subjectClass:checked").length >= 1) {
						$("#submit").removeAttr("disabled");
					} else {
						$("#submit").attr("disabled", "disabled");
					}
				});
			};

			$(document).ready(main);

			$(document).on("click", "#showCounties", function() {
				$('#countyTable').toggle();
			});

			$(document).on("click", "#showLevel", function() {
				$('#levelTable').toggle();
			});
		</script>

 <script type="text/javascript">
  $(document).ready(function(){
      $(".smallMenu .header-image img").click(function() {
        window.location.replace("homepage.php");
      });
    });
</script>

	</head>

	<body>

		<div class="site">
    <div class='whiteHeader'><span class="currentPageSpanLeft"><a href="homepage.php" data-ajax='false'><img src="images/icons/Home_Icon.png"></a></span><span class="currentPageSpanRight">Explore Interests</span></div>
			<div class="page">


				<div class="navigationBar">
        <!-- <h1 class="logo"><a href="homepage.php"><img src="images/header-logo.png" /></a></h1> -->

        <ul class="nav nav-primary bigMenu">
          <div class="logoTest"><li id="logoImage"><a href="homepage.php" data-ajax='false'><img src="images/icons/LOGO_withFont.png"></a></li></div>
          <li id="nav-explore"><a href="exploreInterests.php" data-ajax='false'><b class="currentPage">&nbsp;&nbsp;Explore&nbsp;&nbsp;</b></a></li><li id="nav-saved" class="fifth"><a href="savedCourses.php" data-ajax='false'>>&nbsp;&nbsp;Saved Courses&nbsp;&nbsp;</a></li><li id="nav-feedback" class="second"><a href="interestFeedback.php" data-ajax='false'>>&nbsp;&nbsp;Weekly Feedback&nbsp;&nbsp;</a></li><li id="nav-stats" class="third"><a href="statistics.php" data-ajax='false'>>&nbsp;&nbsp;Statistics&nbsp;&nbsp;</a></li><li id="nav-test" class="fourth"><a href="testimonials.php" data-ajax='false'>>&nbsp;&nbsp;Testimonials&nbsp;&nbsp;</a></li><li id="nav-log" class="sixth"><a href="logout.php" data-ajax='false'>>&nbsp;&nbsp;Log Out&nbsp;&nbsp;</a></li>
        </ul><!-- /end ul#nav-primary.nav -->


        <ul class="nav nav-primary smallMenu">
          <li class="header-image"><img src="images/icons/LOGO_ForMobile.png"></li>
          <ul class="menu">
            <li>
              <a href="#">&#9776; Menu</a>
              <ul>
                <li><a href="exploreInterests.php" data-ajax='false'><img src="images/icons/icon_ExploreCourses.jpg">Explore</a></li>
                <li><a href="savedCourses.php" data-ajax='false'><img src="images/icons/icon_SavedCourses.jpg">Saved Courses</a></li>
                <li><a href="interestFeedback.php" data-ajax='false'><img src="images/icons/icon_MyRecords.jpg">Weekly Feedback</a></li>
                <li><a href="statistics.php" data-ajax='false'><img src="images/icons/icon_Statistics.jpg">Statistics</a></li>
                <li><a href="testimonials.php" data-ajax='false'><img src="images/icons/icon_Testimonials.jpg">Testimonials</a></li>
                <li><a href="logout.php" data-ajax='false'><img src="images/icons/icon_LogOut.jpg">Log Out</a></li>
              </ul>
            </li>
          </ul>
        </ul><!-- /end ul#nav-primary.nav -->
      </div>



			<hr />

			<div class="blog section">
				<!-- <h1 class="lede">Tick up to 3 interests</h1> -->

				<div class="main">
					<div class="article">
						<div class="header">
							<h1 class="title" style="color: #ed7d7c;">Please explore courses that might suit with your personal interests. You can choose up to 3 interests to search</h1>
							<h1 class="title"><div class="roundedPrompt"><?php echo $prompts['Prompt'];?></div></h1>
						</div><!-- /end .header -->

						<div class="intro">
						<div class="centeredIntro">
							<?php	echo "<form action='' method='post' name='subjectlisting' data-ajax='false'>";


							echo "<div id='subjectDiv'>";
							echo "<fieldset data-role='controlgroup'>";
							$result = mysql_query("SELECT * FROM interestsTable");
							$counter = 0;
							$f = 0;
							while($row = mysql_fetch_assoc($result)) {
								foreach ($row as $col => $val) {
									if ($f++ < 9) continue;
									else if($f > 31) break;
									echo "<input type='checkbox' name='subject_list[]' class='subjectClass' id='" . $col . "' value='" . $col . "'  />";
									echo "<label for='" . $col . "'>" . $col . "</label>";
									$counter++;
								}
							}
							echo "</fieldset>";
							echo "</div>";

							?>

							<div class="meta section">
								<?php echo "<button type='button' id='showLevel'>Course Level</button>";

								echo "<div id='levelTable' style='display:none;'>";
								echo "<fieldset data-role='controlgroup' data-type='horizontal' >";
								echo "<input type='checkbox' name='courseLevel[]' class='county' id='6' value='6' />";
								echo "<label for='6'>Level 6</label>";
								echo "<input type='checkbox' name='courseLevel[]' class='county' id='7' value='7' />";
								echo "<label for='7'>Level 7</label>";
								echo "<input type='checkbox' name='courseLevel[]' class='county' id='8' value='8' />";
								echo "<label for='8'>Level 8</label>";
								echo "</fieldset>";
								echo "</div><br />";


								echo "<button type='button' id='showCounties'>Show Counties</button>";

								echo "<div id='countyTable' style='display:none;'>";
								echo "<fieldset data-role='controlgroup' data-type='horizontal' >";


								echo "<input type='checkbox' name='Counties[]' class='county' id='Carlow' value='Carlow' />";
								echo "<label for='Carlow'>Carlow</label>";
								echo "<input type='checkbox' name='Counties[]' class='county' id='Cavan' value='Cavan' />";
								echo "<label for='Cavan'>Cavan</label>";
								echo "<input type='checkbox' name='Counties[]' class='county' id='Clare' value='Clare' />";
								echo "<label for='Clare'>Clare</label>";
								echo "<input type='checkbox' name='Counties[]' class='county' id='Cork' value='Cork' />";
								echo "<label for='Cork'>Cork</label>";
								echo "<input type='checkbox' name='Counties[]' class='county' id='Dublin' value='Dublin' />";
								echo "<label for='Dublin'>Dublin</label>";
								echo "<input type='checkbox' name='Counties[]' class='county' id='Galway' value='Galway' />";
								echo "<label for='Galway'>Galway</label>";
								echo "<input type='checkbox' name='Counties[]' class='county' id='Kerry' value='Kerry' />";
								echo "<label for='Kerry'>Kerry</label>";
								echo "<input type='checkbox' name='Counties[]' class='county' id='Kildare' value='Kildare' />";
								echo "<label for='Kildare'>Kildare</label>";
								echo "<input type='checkbox' name='Counties[]' class='county' id='Limerick' value='Limerick' />";
								echo "<label for='Limerick'>Limerick</label>";
								echo "<input type='checkbox' name='Counties[]' class='county' id='Louth' value='Louth' />";
								echo "<label for='Louth'>Louth</label>";
								echo "<input type='checkbox' name='Counties[]' class='county' id='Mayo' value='Mayo' />";
								echo "<label for='Mayo'>Mayo</label>";
								echo "<input type='checkbox' name='Counties[]' class='county' id='Roscommon' value='Roscommon' />";
								echo "<label for='Roscommon'>Roscommon</label>";
								echo "<input type='checkbox' name='Counties[]' class='county' id='Sligo' value='Sligo' />";
								echo "<label for='Sligo'>Sligo</label>";
								echo "<input type='checkbox' name='Counties[]' class='county' id='Tipperary' value='Tipperary' />";
								echo "<label for='Tipperary'>Tipperary</label>";
								echo "<input type='checkbox' name='Counties[]' class='county' id='Waterford' value='Waterford' />";
								echo "<label for='Waterford'>Waterford</label>";
								echo "<input type='checkbox' name='Counties[]' class='county' id='Wexford' value='Wexford' />";
								echo "<label for='Wexford'>Wexford</label>";











								echo "</fieldset>";
								echo "</div><br />";
								echo "<div id='noCourseWarning'>";
                if(!$interest0){
                  echo "Sorry, but you haven't selected any interests. Please select at least one and try again.";
                }
                else if(!$interest1){
                  echo "Sorry there are no courses available that cover " . $interest0 . ". You could try a different combination or select fewer categories.";
                }
                else if(!$interest2){
                  echo "Sorry there are no courses available that cover " . $interest0 . " and " . $interest1 . ". You could try a different combination or select fewer categories.";
                }
                else if($interest2){
                  echo "Sorry there are no courses available that cover " . $interest0 . ", " . $interest1 . ", and " . $interest2 . ". You could try a different combination or select fewer categories.";
                }
                echo "</div>";
								echo "<input type='submit' id='submit' name='formSubmit' value='Submit'/>
							</form>";
							?>
						</div> <!-- /end .meta.section -->
						
							</div>
					</div><!-- /end .article -->
				</div><!-- /end .main -->
			</div><!-- /end .blog.section -->

			<div id="footer">
		</div><!-- /end #footer -->
	</div><!-- /end .page -->

</div><!-- /end .site -->

</body>
</html>
