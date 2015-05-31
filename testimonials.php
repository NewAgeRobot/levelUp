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

    <div class="page">

      
      <div class="navigationBar">
        <!-- <h1 class="logo"><a href="homepage.php"><img src="images/header-logo.png" /></a></h1> -->

        <ul class="nav nav-primary bigMenu">
          <div class="logoTest"><li id="logoImage"><a href="homepage.php" data-ajax='false'><img src="images/icons/LOGO_withFont.png"></a></li></div>
          <li id="nav-explore" class="first"><a href="exploreInterests.php" data-ajax='false'>&nbsp;&nbsp;Explore&nbsp;&nbsp;&nbsp;</a></li><li id="nav-feedback" class="second"><a href="interestFeedback.php" data-ajax='false'>>&nbsp;&nbsp;Weekly Feedback&nbsp;&nbsp;</a></li><li id="nav-stats" class="third"><a href="statistics.php" data-ajax='false'>>&nbsp;&nbsp;Statistics&nbsp;&nbsp;</a></li><li id="nav-test"><a href="testimonials.php" data-ajax='false'>><b class="currentPage">&nbsp;&nbsp;Testimonials&nbsp;&nbsp;</b></a></li><li id="nav-saved" class="fifth"><a href="savedCourses.php" data-ajax='false'>>&nbsp;&nbsp;Saved Courses&nbsp;&nbsp;</a></li><li id="nav-log" class="sixth"><a href="logout.php" data-ajax='false'>>&nbsp;&nbsp;Log Out&nbsp;&nbsp;</a></li>
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
            <h1 class="title">Select which story you'd like to hear</h1>
          </div><!-- /end .header -->

          <div class="intro">
          <div class="centeredIntro">
          <div class="testimonialLinks">
            <div class="testimonialBox1"><a href=""><img src="images/people/Andrea_Thumbnail.png"></a><div class="descriptionTitle">Andrea</div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at volutpat mi. Phasellus vitae tortor ut dolor lacinia ullamcorper nec eget mi. Praesent sem ipsum, sollicitudin at ipsum nec, elementum malesuada ante. Vestibulum maximus elementum nulla dignissim finibus. Nulla consequat nisi in ipsum elementum, in aliquam risus ultrices. In hac habitasse platea dictumst. Duis sed bibendum leo.</div><br style="clear:both" />
            <div class="testimonialBox2"><a href=""><img src="images/people/Monica_Thumbnail.png"></a><div class="descriptionTitle">Monica</div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at volutpat mi. Phasellus vitae tortor ut dolor lacinia ullamcorper nec eget mi. Praesent sem ipsum, sollicitudin at ipsum nec, elementum malesuada ante. Vestibulum maximus elementum nulla dignissim finibus. Nulla consequat nisi in ipsum elementum, in aliquam risus ultrices. In hac habitasse platea dictumst. Duis sed bibendum leo.</div><br style="clear:both" />
            <div class="testimonialBox3"><a href=""><img src="images/people/Kevin_Thumbnail.png"></a><div class="descriptionTitle">Kevin</div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at volutpat mi. Phasellus vitae tortor ut dolor lacinia ullamcorper nec eget mi. Praesent sem ipsum, sollicitudin at ipsum nec, elementum malesuada ante. Vestibulum maximus elementum nulla dignissim finibus. Nulla consequat nisi in ipsum elementum, in aliquam risus ultrices. In hac habitasse platea dictumst. Duis sed bibendum leo.</div><br style="clear:both" />
            <div class="testimonialBox4"><a href=""><img src="images/people/Fergal_Thumbnail.png"></a><div class="descriptionTitle">Fergal</div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at volutpat mi. Phasellus vitae tortor ut dolor lacinia ullamcorper nec eget mi. Praesent sem ipsum, sollicitudin at ipsum nec, elementum malesuada ante. Vestibulum maximus elementum nulla dignissim finibus. Nulla consequat nisi in ipsum elementum, in aliquam risus ultrices. In hac habitasse platea dictumst. Duis sed bibendum leo.</div><br style="clear:both" />
            <div class="testimonialBox5"><a href=""><img src="images/people/Paul_Thumbnail.png"></a><div class="descriptionTitle">Paul</div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at volutpat mi. Phasellus vitae tortor ut dolor lacinia ullamcorper nec eget mi. Praesent sem ipsum, sollicitudin at ipsum nec, elementum malesuada ante. Vestibulum maximus elementum nulla dignissim finibus. Nulla consequat nisi in ipsum elementum, in aliquam risus ultrices. In hac habitasse platea dictumst. Duis sed bibendum leo.</div><br style="clear:both" />
            <div class="testimonialBox6"><a href=""><img src="images/people/Gerard_Thumbnail.png"></a><div class="descriptionTitle">Gerard</div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at volutpat mi. Phasellus vitae tortor ut dolor lacinia ullamcorper nec eget mi. Praesent sem ipsum, sollicitudin at ipsum nec, elementum malesuada ante. Vestibulum maximus elementum nulla dignissim finibus. Nulla consequat nisi in ipsum elementum, in aliquam risus ultrices. In hac habitasse platea dictumst. Duis sed bibendum leo.</div><br style="clear:both" />
          </div>
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
