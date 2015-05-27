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

/* this is to be used to send the ajax calls to the savedCourseOrder.php page
GOING TO HAVE TO BE COMBINED SOMEHOW WITH PREVIOUS FUNCTION - MAYBE WRAP EACH INSIDE ANOTHER FUNCTION
*/
    

  });

</script>


    <script type="text/javascript">
      $(document).ready(function() {
        $('.menu').dropit();
      });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
      $(".courseExpand").hide();
      $(".courseExpandTitle").hide();


      $(".toggleExpand").click(function() {
        $(".courseExpand").hide();
        $(".courseExpandTitle").hide();

        var $clicked = $(this);
        var linkIndex = $clicked.index();
        linkIndex -= 1;
        $clicked.siblings(".courseExpand").eq(linkIndex).show();  


        var $clickedTitle = $(this);
        var linkIndexTitle = $clickedTitle.index();
        linkIndexTitle -= 1;
        $clickedTitle.siblings(".courseExpandTitle").eq(linkIndexTitle).show();  
      });

      $(".toggleExpandTitle").click(function() {
        $(".courseExpand").hide();
        $(".courseExpandTitle").hide();

        var $clicked = $(this);
        var linkIndex = $clicked.index();
        $clicked.siblings(".courseExpand").eq(linkIndex).show();  


        var $clickedTitle = $(this);
        var linkIndexTitle = $clickedTitle.index();
        $clickedTitle.siblings(".courseExpandTitle").eq(linkIndexTitle).show();  
      });
    });
      
    </script>

  </head>

  <body>

    <div class="site">

      <div class="page">


        <div class="navigationBar">
        <!-- <h1 class="logo"><a href="homepage.php"><img src="images/header-logo.png" /></a></h1> -->

        <ul class="nav nav-primary bigMenu">
          <div class="logoTest"><li id="logoImage"><a href="homepage.php" data-ajax='false'><img src="images/icons/LOGO_withFont.png"></a></li></div>
          <li id="nav-explore" class="first"><a href="exploreInterests.php" data-ajax='false'><b class="currentPage">&nbsp;&nbsp;Explore&nbsp;&nbsp;</b></a></li><li id="nav-feedback" class="second"><a href="interestFeedback.php" data-ajax='false'>|&nbsp;&nbsp;Weekly Feedback&nbsp;&nbsp;</a></li><li id="nav-stats" class="third"><a href="statistics.php" data-ajax='false'>|&nbsp;&nbsp;Statistics&nbsp;&nbsp;</a></li><li id="nav-test" class="fourth"><a href="testimonials.php" data-ajax='false'>|&nbsp;&nbsp;Testimonials&nbsp;&nbsp;</a></li><li id="nav-saved"><a href="savedCourses.php" data-ajax='false'>|<b class="currentPage">&nbsp;&nbsp;Saved Courses&nbsp;&nbsp;</b></a></li><li id="nav-log" class="sixth"><a href="logout.php" data-ajax='false'>|&nbsp;&nbsp;Log Out&nbsp;&nbsp;</a></li>
        </ul><!-- /end ul#nav-primary.nav -->


        <ul class="nav nav-primary smallMenu">
          <img src="images/icons/LOGO_ForMobile.png">
          <ul class="menu">
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
          </ul>
        </ul><!-- /end ul#nav-primary.nav -->
      </div>



      <hr />

      <div class="blog section">
        <!-- <h1 class="lede">Tick up to 3 interests</h1> -->

        <div class="main">
          <div class="article">
            <div class="header">
              <h1 class="title" style="color: #ed7d7c;">These are where courses you save while exploring are listed. Get exploring! </h1>
            </div><!-- /end .header -->

            <div class="intro">
            <div class="centeredIntro">
<?php
  if(!$numCourses){
  echo "You have yet to save any courses.";
}
else{
  echo "<table id='sort' class='grid'>
  <thead><tr><td><b><u>No.</b></u></td><td><b><u>Course Code</b></u></td><td><b><u>Course Title</b></u></td><td><b><u>Level</b></u></td><td><b><u>Course Points</b></u></td><td><b><u>Institute</b></u></td><td><b><u>More Information</b></u></td><td><b><u>Delete?</b></u></td></tr>
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


<!-- <div class='coursesList' id='sort' class='grid'>
<img align='right' src='images/icons/DeleteCourse_Btn.png'>
<table class='courseInfoTable'>
<tr class='toggleExpandTitle'><td><b><u>Code</b></u></td><td><b><u>Title</b></u></td><td><b><u>Institute</b></u></td></tr>
<tr class='toggleExpand'><td>D01K</td><td>Creative Media</td><td>Dundalk Institute of Technology</td></tr>
<tr class='courseExpandTitle'><td><b><u>Level</b></u></td><td><b><u>Points</b></u></td><td><b><u>Link</b></u></td></tr>
<tr class='courseExpand'><td>7</td><td>450</td><td>Find out more</td></tr>
</table>
</div> -->


              <div class="meta section">

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