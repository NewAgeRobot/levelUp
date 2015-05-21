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

	header('Location: showCourses.php');
}

$prompts = mysql_fetch_array(mysql_query("SELECT * FROM feedbackPrompts WHERE `Interests` = '1' ORDER BY rand() 
	LIMIT 1"));


?>
<html lang="en">
 <head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Level Up</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
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
  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

    <!-- Primary Page Layout
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->



    <div id="navigationBar">
      <div id="logo"><a href="index.php"><img src="images/header-logo.png"></a></div>
      <nav><a href="savedCourses.php">Saved Courses</a>&nbsp;&nbsp;<a href="exploreInterests.php">Explore Courses</a>&nbsp;&nbsp;<a href="interestFeedback.php">Weekly Feedback</a>&nbsp;&nbsp;<a href="statistics.php">Statistics</a>&nbsp;&nbsp;<a href="logout.php">Log out</a></nav>
    </div>

    <div class="section hero">
      <div class="container">
        <div class="row">
          <div class="offset-by-one column">
          <h4>Select up to three categories to refine your search for courses! Best to get searching and explore!</h4>
            
            <?php
	echo $prompts['Prompt'];
?>
</div>
          <div class="offset-by-three column">
<?php	echo "<form action='' method='post' name='subjectlisting'>";
	
	

	echo "<table><tr> ";
	$result = mysql_query("SELECT * FROM interestsTable");
	$f = 0;
	while($row = mysql_fetch_assoc($result)) {
		foreach ($row as $col => $val) {
			if ($f++ < 9) continue;
			else if($f > 31) break;
			//use checktrue to query current interests, and make them checked if they exist
			echo "<td> " . $col . "</td> <td>
			<input type='checkbox' name='subject_list[]' class='subjectClass' value='" . $col . "'" . $checkTrue . " />
		</td>";
		if($f % 2){
			echo "</tr><tr>";
		}
	}
}

echo "</table>";

	echo "<br /><button type='button' id='showLevel'>Course Level</button>";

	echo "<div id='levelTable' style='display:none;'><table>";
	echo "<tr> <td> 6 </td> <td><input type='checkbox' name='courseLevel[]' class='county' value='6' /></td>";
	echo "<td> 7 </td> <td><input type='checkbox' name='courseLevel[]' class='county' value='7' /></td>";
	echo "<td> 8 </td> <td><input type='checkbox' name='courseLevel[]' class='county' value='8' /></td></tr>";
	echo "</table></div><br />";


	echo "<br /><button type='button' id='showCounties'>Show Counties</button>";

	echo "<div id='countyTable' style='display:none;'><table>";
	echo "<tr> <td> Louth </td> <td><input type='checkbox' name='Counties[]' class='county' value='Louth' /></td>";
	echo "<td> Dublin </td> <td><input type='checkbox' name='Counties[]' class='county' value='Dublin' /></td>";
	echo "<td> Cork </td> <td><input type='checkbox' name='Counties[]' class='county' value='Cork' /></td>";
	echo "<td> Kildare </td> <td><input type='checkbox' name='Counties[]' class='county' value='Kildare' /></td>";
	echo "<td> Galway </td> <td><input type='checkbox' name='Counties[]' class='county' value='Galway' /></td>";
	echo "<td> Wexford </td> <td><input type='checkbox' name='Counties[]' class='county' value='Wexford' /></td></tr>";
	echo "<tr> <td> Limerick </td> <td><input type='checkbox' name='Counties[]' class='county' value='Limerick' /></td>";
	echo "<td> Sligo </td> <td><input type='checkbox' name='Counties[]' class='county' value='Sligo' /></td>";
	echo "<td> Tipperary </td> <td><input type='checkbox' name='Counties[]' class='county' value='Tipperary' /></td>";
	echo "<td> Roscommon </td> <td><input type='checkbox' name='Counties[]' class='county' value='Roscommon' /></td>";
	echo "<td> Carlow </td> <td><input type='checkbox' name='Counties[]' class='county' value='Carlow' /></td>";
	echo "<td> Mayo </td> <td><input type='checkbox' name='Counties[]' class='county' value='Mayo' /></td></tr> ";
	echo "<tr> <td> Waterford </td> <td><input type='checkbox' name='Counties[]' class='county' value='Waterford' /></td>";
	echo "<td> Kerry </td> <td><input type='checkbox' name='Counties[]' class='county' value='Kerry' /></td>";
	echo "<td> Clare </td> <td><input type='checkbox' name='Counties[]' class='county' value='Clare' /></td>";
	echo "<td> Cavan </td> <td><input type='checkbox' name='Counties[]' class='county' value='Cavan' /></td></tr>";
	echo "</table></div><br /> <br />";

echo "<input type='submit' id='submit' name='formSubmit' value='Submit' disabled/>
</form>";
?>	
          </div>
        </div>
      </div>
    </div>
  <!-- End Document
  ––––––––––––––––––––––––––––––––––––––––––––––––––-->
</body>
</html>