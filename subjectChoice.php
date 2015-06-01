<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}
if($user['CoursesPicked']){
	header('Location: homepage.php');
}

//test with multiple records to make sure identifier for table records is enouguh/that it works fine.
//sort out check for if they want to redo thier subject choice.
$userEmail = $user['Email'];
$result = mysql_query("SELECT * FROM subjectsTable WHERE `Email` = '$userEmail'");
$i = 0;
if(isset($_POST['formSubmit'])){
	$subAmount = count($_POST['subject_list']);
	while($row = mysql_fetch_assoc($result)) {
		foreach ($row as $col => $val) {
			if ($i++ < 2) continue;
			for($j = 0; $j <= 36; $j++){
				for($k = 0; $k < $subAmount;$k++){
					$currentSub = $_POST['subject_list'][$k];
					if($currentSub == $col){
						mysql_query("UPDATE `subjectsTable` SET `$col` = '1' WHERE `Email` = '$userEmail'");
						break;
					}
					else{
						mysql_query("UPDATE `subjectsTable` SET `$col` = '0' WHERE `Email` = '$userEmail'");
					}
				}
			}
			mysql_query("UPDATE `users` SET `SubAmount` = '$subAmount', `CoursesPicked` = '1' WHERE `Email` = '$userEmail'");
			header('Location: index.php');
		}
	}
}
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
	<script src="js/interactions.js"></script>


	<script type="text/javascript">
		$(document).ready(function() {
			$('.menu').dropit();
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
    <div class='whiteHeader'><span class="currentPageSpanLeft"><a href="homepage.php" data-ajax='false'><img src="images/icons/Home_Icon.png"></a></span><span class="currentPageSpanRight">Subject Choice</span></div>

		<div class="page">

			
			<div class="navigationBar">
        <!-- <h1 class="logo"><a href="homepage.php"><img src="images/header-logo.png" /></a></h1> -->

        <ul class="nav nav-primary bigMenu">
          <div class="logoTest"><li id="logoImage"><a href="homepage.php" data-ajax='false'><img src="images/icons/LOGO_withFont.png"></a></li></div>
          <div style="visibility:hidden;"><li id="nav-explore" class="first"><a href="exploreInterests.php" data-ajax='false'>&nbsp;&nbsp;Explore&nbsp;&nbsp;&nbsp;</a></li><li id="nav-feedback" class="second"><a href="interestFeedback.php" data-ajax='false'>>&nbsp;&nbsp;Weekly Feedback&nbsp;&nbsp;</a></li><li id="nav-stats" class="third"><a href="statistics.php" data-ajax='false'>>&nbsp;&nbsp;Statistics&nbsp;&nbsp;</a></li><li id="nav-test" class="fourth"><a href="testimonials.php" data-ajax='false'>>&nbsp;&nbsp;Testimonials&nbsp;&nbsp;</a></li><li id="nav-saved" class="fifth"><a href="savedCourses.php" data-ajax='false'>>&nbsp;&nbsp;Saved Courses&nbsp;&nbsp;</a></li><li id="nav-log" class="sixth"><a href="logout.php" data-ajax='false'>>&nbsp;&nbsp;Log Out&nbsp;&nbsp;</a></li>
        </div></ul><!-- /end ul#nav-primary.nav -->


        <ul class="nav nav-primary smallMenu">
          <li class="header-image"><img src="images/icons/LOGO_ForMobile.png"></li>
         <div style="visibility:hidden;"> <ul class="menu">
            <li>
              <a href="#">&#9776; Menu</a>
              <ul>
                <li><a href="exploreInterests.php" data-ajax='false'><img src="images/icons/icon_ExploreCourses.jpg">Explore</a></li>
                <li><a href="interestFeedback.php" data-ajax='false'><img src="images/icons/icon_MyRecords.jpg">Weekly Feedback</a></li>
                <li><a href="statistics.php" data-ajax='false'><img src="images/icons/icon_Statistics.jpg">Statistics</a></li>
                <li><a href="testimonials.php" data-ajax='false'><img src="images/icons/icon_Testimonials.jpg">Testimonials</a></li>
                <li><a href="savedCourses.php" data-ajax='false'><img src="images/icons/icon_SavedCourses.jpg">Saved Courses</a></li>
                <li><a href="logout.php" data-ajax='false'><img src="images/icons/icon_LogOut.jpg">Log Out</a></li>
              </ul>
            </li>
          </ul></div>
        </ul><!-- /end ul#nav-primary.nav -->
      </div>


		
		<hr />

		<div class="blog section">
			<!-- <h1 class="lede"></h1> -->

			<div class="main">
				<div class="article">
					<div class="header">
						<h1 class="title">Tick all the subjects you do to finalise your registration then we can get started!</h1>
					</div><!-- /end .header -->
					

					<div class="intro">
            <div class="centeredIntro">
					
						<?php	echo "<form action='' method='post' name='subjectlisting' data-ajax='false'>";
						echo "<div id='subjectDiv'>";
						echo "<fieldset data-role='controlgroup'>";
						$result = mysql_query("SELECT * FROM subjectsTable WHERE `Email` = '$userEmail'");
						$f = 0;
						while($row = mysql_fetch_assoc($result)) {   
							foreach ($row as $col => $val) {
								if ($f++ < 2) continue;
								if ($val == 1) {
									$checkTrue = "checked='true'";
								}
								else{
									$checkTrue = "";
								}
								echo "<input type='checkbox' name='subject_list[]' class='subjectClass' id='" . $col . "' value='" . $col . "'" . $checkTrue . " /><label for='" . $col . "'>" . $col . "</label>";
							}
						}
						echo "</fieldset>";
						echo "</div>";
						?>
						<div class="meta section">
							<?php echo "<input type='submit' id='submit' name='formSubmit' value='Submit'/></form>";?>	
						</div> <!-- /end .meta.section -->
						</div>
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
