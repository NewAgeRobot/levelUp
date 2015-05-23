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
$saveCheck = mysql_query("SELECT * FROM savedCourses WHERE `Email` = '$userEmail'");
$num_rows = mysql_num_rows($saveCheck);
for($i = 0; $array[$i] = mysql_fetch_assoc($saveCheck); $i++);
array_pop($array);
$numCourses = sizeOf($array);
// print_r($array[2]);




$sortedArray = array();
foreach ($array as $key => $row)
{
    $sortedArray[$key] = $row['Position'];
}
array_multisort($sortedArray, SORT_ASC, $array);

?>
<html lang="en">
<head>

<meta charset="utf-8" />
<title>LevelUp</title>

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
<link rel="stylesheet" href="css/dropit.css" />
<script src="js/dropit.js"></script>
<script src="js/redirect.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script src="js/jquery.ui.touch-punch.min.js"></script>
<script src="js/test.js"></script>
  <script language="Javascript" type="text/javascript">
$(document).ready(function(){
    $('.ajax').show();
    $(".ajax").click(function() {
      var position = $(this).closest('tr').find('td:eq(0)').text();
      var code = $(".jsCourseCode").eq(position).text();
        $.ajax({
          method: 'POST' ,
          url: 'deleteCourse.php' ,
          data: { code: code } ,
          success: function(result)
          {
            $('.ajax').after(result);
            $('.ajax').hide();
            window.location.reload();
           }
          });
      });
  });

</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.menu').dropit();
});
</script>
</head>

<body>

<div class="site">

	<div class="page">

	
		<h1 class="logo"><a href="homepage.php"><img src="images/header-logo.png" /></a></h1>

		<ul class="nav nav-primary bigMenu">
			<li id="nav-explore" class="first"><a href="exploreInterests.php" data-ajax='false'>Explore</a></li>
			<li id="nav-feedback" class="second"><a href="interestFeedback.php" data-ajax='false'>Weekly Feedback</a></li>
			<li id="nav-stats" class="third"><a href="statistics.php" data-ajax='false'>Statistics</a></li>
			<li id="nav-test" class="fourth"><a href="testimonials.php" data-ajax='false'>Testimonials</a></li>
			<li id="nav-saved" class="fifth"><a href="savedCourses.php" data-ajax='false'>Saved Courses</a></li>
			<li id="nav-log" class="sixth"><a href="logout.php" data-ajax='false'>Log Out</a></li>
		</ul><!-- /end ul#nav-primary.nav -->

		
		<ul class="nav nav-primary smallMenu">
		<img src="images/text-logo.png"></li><ul class="menu">
				    <li>
				        <a href="#">&#9776; Menu</a>
				        <ul>
				            <li><a href="exploreInterests.php" data-ajax='false'><img src="images/explore-icon.png">Explore</a></li>
				            <li><a href="interestFeedback.php" data-ajax='false'><img src="images/feedback-icon.png">Weekly Feedback</a></li>
				            <li><a href="statistics.php" data-ajax='false'><img src="images/stats-icon.png">Statistics</a></li>
				            <li><a href="testimonials.php" data-ajax='false'><img src="images/testimonials-icon.png">Testimonials</a></li>
				            <li><a href="savedCourses.php" data-ajax='false'><img src="images/saved-icon.png">Saved Courses</a></li>
				            <li><a href="logout.php" data-ajax='false'><img src="images/account-icon.png">Log Out</a></li>
				        </ul>
				    </li>
				</ul>
		</ul><!-- /end ul#nav-primary.nav -->


		
		<hr />

		<div class="blog section">
			<h1 class="lede"></h1>

			<div class="main">
				<div class="article">
					<div class="header">
						<h1 class="title">These are where courses you save while exploring are listed. Get exploring!</h1>
					</div><!-- /end .header -->

				<div class="intro">
<?php
	if(!$numCourses){
	echo "You have yet to save any courses.";
}
else{
	echo "<table id='sort' class='grid'>
  <thead><tr><th>No.</th><th>Course Code</th><th>Course Title</th><th>Level</th><th>Course Points</th><th>Institute</th><th>More Information</th><th>Delete?</th></tr>
  </thead>
  <tbody>";
 
	//might have to save amount of courses they've saved
	for($counter = 0; $counter < $num_rows; $counter++){
		print_r("<tr><td class='index'>" . $counter . "</td><td class='jsCourseCode'>" . $array[$counter]['CourseCode'] . "</td><td>" . $array[$counter]['CourseTitle'] . "</td><td>" . $array[$counter]['CourseLevel'] . "</td><td>" . $array[$counter]['CoursePoints'] . "</td><td>" . $array[$counter]['CourseCollege'] . "</td><td><a href='" . $array[$counter]['CourseURL'] . "' target='_blank'><font color='lightblue'>Find out more</font></a></td><td><a href='javascript:{}' class='ajax'><font color='red'>Delete Course</font></a></td></tr>"); //not working
	}
	echo "</tbody></table>";
  echo "<button id='reorder'>Reorder Courses</button><a href='javascript:{}' class='reorderDone'><button>Save Order</button></a>";
}
?>
					 <div class="meta section">
							
					</div> <!-- /end .meta.section -->
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
