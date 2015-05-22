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

<!--[if lt IE 7 ]> <html lang="en" class="ie ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>

<meta charset="utf-8" />
<title>ROBOT&#8230;OR NOT?</title>

<meta name="DC.creator" content="Ethan Marcotte - http://ethanmarcotte.com" />
<meta name="robots" content="index, follow" />
<meta name="description" content="A demonstration site for Ethan Marcotte's book, RESPONSIVE WEB DESIGN" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="css/robotCss.css" media="screen, projection" />

<script src="http://use.typekit.com/daz7uli.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
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

</head>

<body id="www-responsivewebdesign-com-robot">

<div class="site">

	<div class="page">
		<h1 class="logo"><a href="/"><img src="images/header-logo.png" alt="Robot or Not?" /></a></h1>

		<ul class="nav nav-primary bigMenu">
			<li id="nav-explore" class="first"><a href="exploreInterests.php">Explore</a></li>
			<li id="nav-feedback" class="second"><a href="interestFeedback.php">Weekly Feedback</a></li>
			<li id="nav-stats" class="third"><a href="statistics.php">Statistics</a></li>
			<li id="nav-test" class="fourth"><a href="testimonials.php">Testimonials</a></li>
			<li id="nav-saved" class="fifth"><a href="savedCourses.php">Saved Courses</a></li>
			<li id="nav-log" class="sixth"><a href="logout.php">Log Out</a></li>
		</ul><!-- /end ul#nav-primary.nav -->

		
		<ul class="nav nav-primary smallMenu">
		<table><tr><td><li><img src="images/text-logo.png"></li></td><li><a href="#menu">&#9776; Menu</a></li><td></td></tr>
		</table>
			
			
		</ul><!-- /end ul#nav-primary.nav -->
		
		<hr />

		<div class="blog section">
			<h1 class="lede"><?php echo $prompts['Prompt'];?></h1>

			<div class="main">
				<div class="article">
					<div class="header">
						<h1 class="title"><a href="#">Tick up to 3 interests</a></h1>
					</div><!-- /end .header -->

					<!-- http://www.gutenberg.org/files/31611/31611-h/31611-h.htm -->

					<div class="intro">
						<?php	echo "<form action='' method='post' name='subjectlisting'>";
	
	

	$result = mysql_query("SELECT * FROM interestsTable");
	$f = 0;
	while($row = mysql_fetch_assoc($result)) {
		foreach ($row as $col => $val) {
			if ($f++ < 9) continue;
			else if($f > 31) break;
			//use checktrue to query current interests, and make them checked if they exist
			echo $col . "<input type='checkbox' name='subject_list[]' class='subjectClass' value='" . $col . "'" . $checkTrue . " />";
		if($f % 2){
			echo "<br />";
		}
	}
}

	echo "<br /><button type='button' id='showLevel'>Course Level</button>";

	echo "<div id='levelTable' style='display:none;'>";
	echo " 6 <input type='checkbox' name='courseLevel[]' class='county' value='6' />";
	echo " 7 <input type='checkbox' name='courseLevel[]' class='county' value='7' />";
	echo " 8 <input type='checkbox' name='courseLevel[]' class='county' value='8' />";
	echo "</div><br />";


	echo "<br /><button type='button' id='showCounties'>Show Counties</button>";

	echo "<div id='countyTable' style='display:none;'>";
	echo "  Louth  <input type='checkbox' name='Counties[]' class='county' value='Louth' />";
	echo " Dublin  <input type='checkbox' name='Counties[]' class='county' value='Dublin' />";
	echo " Cork  <input type='checkbox' name='Counties[]' class='county' value='Cork' />";
	echo " Kildare  <input type='checkbox' name='Counties[]' class='county' value='Kildare' />";
	echo " Galway  <input type='checkbox' name='Counties[]' class='county' value='Galway' />";
	echo " Wexford  <input type='checkbox' name='Counties[]' class='county' value='Wexford' />";
	echo "  Limerick  <input type='checkbox' name='Counties[]' class='county' value='Limerick' />";
	echo " Sligo  <input type='checkbox' name='Counties[]' class='county' value='Sligo' />";
	echo " Tipperary  <input type='checkbox' name='Counties[]' class='county' value='Tipperary' />";
	echo " Roscommon  <input type='checkbox' name='Counties[]' class='county' value='Roscommon' />";
	echo " Carlow  <input type='checkbox' name='Counties[]' class='county' value='Carlow' />";
	echo " Mayo  <input type='checkbox' name='Counties[]' class='county' value='Mayo' /> ";
	echo "  Waterford  <input type='checkbox' name='Counties[]' class='county' value='Waterford' />";
	echo " Kerry  <input type='checkbox' name='Counties[]' class='county' value='Kerry' />";
	echo " Clare  <input type='checkbox' name='Counties[]' class='county' value='Clare' />";
	echo " Cavan  <input type='checkbox' name='Counties[]' class='county' value='Cavan' />";
	echo "</div><br /> <br />";

echo "<input type='submit' id='submit' name='formSubmit' value='Submit' disabled/>
</form>";
?>	

					<!-- <div class="meta section">
						<h1>Posted on 10 October 2010 by <cite><a href="http://www.gutenberg.org/ebooks/31611">Mari Wolf</a></cite></h1>

						<h2>Tagged with:</h2>
						<ul>
							<li><a href="#">beep</a></li>
							<li><a href="#">boop</a></li>
							<li><a href="#">asimovsucks</a></li>
						</ul>
					</div> --><!-- /end .meta.section -->
				</div><!-- /end .article -->
			</div><!-- /end .main -->
		</div><!-- /end .blog.section -->

		<div id="footer">
			<!-- <p>Images &copy; their respective copyright holders.</p>

			<p>The design and code is &copy; 2014 <a href="http://unstoppablerobotninja.com/">Ethan Marcotte</a>, supporting his book <cite><a href="http://www.abookapart.com/products/responsive-web-design">Responsive Web Design</a></cite>.</p>

			<p>Beep boop beep.</p> -->
		</div><!-- /end #footer -->
	</div><!-- /end .page -->

</div><!-- /end .site -->

</body>
</html>
