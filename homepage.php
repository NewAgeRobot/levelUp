<?php
/*
badges for amount of courses saved
*/
include "connect.php";
include "algor.php";
if($logged == false){
  header('Location: index.php');
}
if(!$user['CoursesPicked']){
  header('Location: subjectChoice.php');
}
$userEmail = $user['Email'];
$amountSaved = $user['CoursesSaved'];
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
  <link rel="stylesheet" href="css/clndr.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.js"></script>

  <script language="Javascript" type="text/javascript">

   var eventsArray = [
   { date: moment().format('2015-11-05'), title: 'CAO online application & Change of Course Choices facilities open.' },
   { date: moment().format('2015-1-20'), title: 'CAO - Apply before this date to avail of discounted fee of €25' },
   { date: moment().format('2015-02-01'), title: 'CAO - Normal closing date for applications - 5:15pm' },
   { date: moment().format('2015-02-05'), title: 'CAO - Change of Course Choices online facility opens - €10 fee' },
   { date: moment().format('2015-02-15'), title: 'CAO - All Paper Applicants should have received a Statement of Course Choices by this date' },

   { date: moment().format('2015-02-28'), title: 'HPAT Test -  Undergraduate Entry to Medicine' },
   { date: moment().format('2015-03-01'), title: 'CAO - Change of Course Choices CLOSES - 5:15pm' },
   { date: moment().format('2015-03-01'), title: 'CAO - Final completion date for online HEAR/DARE forms - 5:15pm' },
   { date: moment().format('2015-04-01'), title: 'CAO - Latest date for HEAR/DARE supporting documentation to arrive - 5:15pm' },
   { date: moment().format('2015-05-01'), title: 'CAO - Last day for LATE applications - 5:15pm' },

   { date: moment().format('2015-05-05'), title: 'CAO - Online Change of Mind facility opens (free)' },
   { date: moment().format('2015-05-15'), title: 'CAO - All LATE Paper Applicants should have received a Statement of Course Choices by this date' },
   { date: moment().format('2015-05-31'), title: 'CAO - All applicants should have received a Statement of Application Record by this date' },
   { date: moment().format('2015-07-01'), title: 'CAO - Change of Mind  closes - 5:15pm' },
   { date: moment().format('2015-08-15'), title: 'Leaving Certificate results issued' },

   { date: moment().format('2015-08-17'), title: 'CAO - Round 1 offers issued' },
   { date: moment().format('2015-08-24'), title: 'CAO - Round 1 acceptance closing date - 5:15pm' },
   { date: moment().format('2015-08-26'), title: 'CAO - Round 2 offers issued' },
   { date: moment().format('2015-09-02'), title: 'CAO - Round 2 acceptance closing date - 5:15pm' }
   ];

 </script>

  <script src="src/clndr.js"></script>
  <script src="src/test.js"></script>

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
    <!-- <div class="whiteHeader">WEDNESDAY 16TH</div> -->
    <div id="pass-in-events" class="cal1" style="margin-top:0px"></div>
    <div class="page">

      <div class="navigationBar">
        <!-- <h1 class="logo"><a href="homepage.php"><img src="images/header-logo.png" /></a></h1> -->

        <ul class="nav nav-primary bigMenu">
          <div class="logoTest"><li id="logoImage"><a href="homepage.php" data-ajax='false'><img src="images/icons/LOGO_withFont.png"></a></li></div>
          <li id="nav-explore" class="first"><a href="exploreInterests.php" data-ajax='false'>&nbsp;&nbsp;Explore&nbsp;&nbsp;&nbsp;</a></li><li id="nav-feedback" class="second"><a href="interestFeedback.php" data-ajax='false'>|&nbsp;&nbsp;Weekly Feedback&nbsp;&nbsp;</a></li><li id="nav-stats" class="third"><a href="statistics.php" data-ajax='false'>|&nbsp;&nbsp;Statistics&nbsp;&nbsp;</a></li><li id="nav-test" class="fourth"><a href="testimonials.php" data-ajax='false'>|&nbsp;&nbsp;Testimonials&nbsp;&nbsp;</a></li><li id="nav-saved" class="fifth"><a href="savedCourses.php" data-ajax='false'>|&nbsp;&nbsp;Saved Courses&nbsp;&nbsp;</a></li><li id="nav-log" class="sixth"><a href="logout.php" data-ajax='false'>|&nbsp;&nbsp;Log Out&nbsp;&nbsp;</a></li>
        </ul><!-- /end ul#nav-primary.nav -->


        <ul class="nav nav-primary smallMenu">
          <li class="header-image"><img src="images/icons/LOGO_ForMobile.png"></li>
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
        <!-- <h1 class="lede"></h1> -->

        <div class="main">
          <div class="article">
            <div class="header">
              <h1 class="title"></h1>
            </div><!-- /end .header -->

            <!-- <div class="intro"> -->
              <!-- <div class="meta section"> -->
               <!--  <?php
                if ($amountSaved > 0){
                  $oneBadge = true;
                  echo "<img src='images/icons/OneCourse_Badge.png' height='150px' width='150px'>";
                }
                if ($amountSaved >= 5){
                  $fiveBadge = true;
                  echo "<img src='images/icons/FiveCourses_Badge.png' height='150px' width='150px'>";
                }
                if ($amountSaved >= 10){
                  $tenBadge = true;
                  echo "<img src='images/icons/TenCourses_Badge.png' height='150px' width='150px'>";
                }
                ?> -->
              <!-- </div> --> <!-- /end .meta.section -->
            <!-- </div> --><!-- /end .article -->
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
