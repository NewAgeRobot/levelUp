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
<link rel="stylesheet" href="css/jquery-mobile.css" />
<script src="js/jquery-mobile.js"></script>



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
						<h1 class="title">Tick up to 3 interests</h1>
					</div><!-- /end .header -->

					<!-- http://www.gutenberg.org/files/31611/31611-h/31611-h.htm -->

					<div class="intro">
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
			//use checktrue to query current interests, and make them checked if they exist
			echo "<input type='checkbox' name='subject_list[]' class='subjectClass' id='" . $col . "' value='" . $col . "'" . $checkTrue . " data-theme='b' />";
			echo "<label for='" . $col . "'>" . $col . "</label>";
			$counter++;
			// if($counter == 3){
			// 	$counter = 0;
			// 	echo "</fieldset>";
			// 	echo "<fieldset data-role='controlgroup' data-type='horizontal'>";
			// }
		}
	}
	echo "</fieldset>";
	echo "</div>";

	echo "<br /><button type='button' id='showLevel'>Course Level</button>";

	echo "<div id='levelTable' style='display:none;'>";
	echo "<fieldset data-role='controlgroup' data-type='horizontal' data-theme='b'>";
	echo "<input type='checkbox' name='courseLevel[]' class='county' id='6' value='6' />";
	echo "<label for='6'>Level 6</label>";
	echo "<input type='checkbox' name='courseLevel[]' class='county' id='7' value='7' />";
	echo "<label for='7'>Level 7</label>";
	echo "<input type='checkbox' name='courseLevel[]' class='county' id='8' value='8' />";
	echo "<label for='8'>Level 8</label>";
	echo "</fieldset>";
	echo "</div><br />";


	echo "<br /><button type='button' id='showCounties'>Show Counties</button>";

	echo "<div id='countyTable' style='display:none;'>";
	echo "<fieldset data-role='controlgroup' data-type='horizontal' data-theme='b'>";
	echo "<input type='checkbox' name='Counties[]' class='county' id='Louth' value='Louth' />";
	echo "<label for='Louth'>Louth</label>";

	echo "<input type='checkbox' name='Counties[]' class='county' id='Dublin' value='Dublin' />";
	echo "<label for='Dublin'>Dublin</label>";
	
	echo "<input type='checkbox' name='Counties[]' class='county' id='Cork' value='Cork' />";
	echo "<label for='Cork'>Cork</label>";
	
	echo "<input type='checkbox' name='Counties[]' class='county' id='Kildare' value='Kildare' />";
	echo "<label for='Kildare'>Kildare</label>";
	
	echo "<input type='checkbox' name='Counties[]' class='county' id='Galway' value='Galway' />";
	echo "<label for='Galway'>Galway</label>";
	
	echo "<input type='checkbox' name='Counties[]' class='county' id='Wexford' value='Wexford' />";
	echo "<label for='Wexford'>Wexford</label>";
	
	echo "<input type='checkbox' name='Counties[]' class='county' id='Limerick' value='Limerick' />";
	echo "<label for='Limerick'>Limerick</label>";
	
	echo "<input type='checkbox' name='Counties[]' class='county' id='Sligo' value='Sligo' />";
	echo "<label for='Sligo'>Sligo</label>";
	
	echo "<input type='checkbox' name='Counties[]' class='county' id='Tipperary' value='Tipperary' />";
	echo "<label for='Tipperary'>Tipperary</label>";
	
	echo "<input type='checkbox' name='Counties[]' class='county' id='Roscommon' value='Roscommon' />";
	echo "<label for='Roscommon'>Roscommon</label>";
	
	echo "<input type='checkbox' name='Counties[]' class='county' id='Carlow' value='Carlow' />";
	echo "<label for='Carlow'>Carlow</label>";
	
	echo "<input type='checkbox' name='Counties[]' class='county' id='Mayo' value='Mayo' />";
	echo "<label for='Mayo'>Mayo</label>";
	
	echo "<input type='checkbox' name='Counties[]' class='county' id='Waterford' value='Waterford' />";
	echo "<label for='Waterford'>Waterford</label>";
	
	echo "<input type='checkbox' name='Counties[]' class='county' id='Kerry' value='Kerry' />";
	echo "<label for='Kerry'>Kerry</label>";
	
	echo "<input type='checkbox' name='Counties[]' class='county' id='Clare' value='Clare' />";
	echo "<label for='Clare'>Clare</label>";
	
	echo "<input type='checkbox' name='Counties[]' class='county' id='Cavan' value='Cavan' />";
	echo "<label for='Cavan'>Cavan</label>";
	
	echo "</fieldset>";
	echo "</div><br /> <br />";

echo "<input type='submit' id='submit' name='formSubmit' value='Submit'/>
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
