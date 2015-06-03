<?php
include "connect.php";
include "algor.php";
if($logged == true){
  header('Location: homepage.php');
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
  <link rel="stylesheet" href="css/jquery-mobile.css" />
  <link rel="stylesheet" href="css/dropit.css" />
  <!-- bxSlider CSS file -->
  <link href="css/jquery.bxslider.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/skeleton.css">

  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  <script src="js/jquery-mobile.js"></script>
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
  <!-- bxSlider Javascript file -->
  <script>
   $(document).ready(orangeBox);

   $(window).resize(orangeBox);

   function orangeBox(){
      var screenWidth = $(window).width();
      var divHeight = $('iframe').height(); 
      // alert(divHeight);
      if(screenWidth > 845){
        $('#testOrangeBox').css('height', (divHeight+35)+'px');
      }
      else{
        $('#testOrangeBox').css('height', (divHeight+80)+'px');
      }
   }
  </script>
</head>

<body style="background:#fff;">

  <div class="site">
    <div class='whiteHeader'><!--<span class="currentPageSpanLeft"><a href="homepage.php" data-ajax='false'><img src="images/icons/Home_Icon.png"></a></span><span class="currentPageSpanRight"><a href="#team">Meet the Team</a></span>--></div>

    <div class="page">


      <div class="navigationBar">
        <!-- <h1 class="logo"><a href="homepage.php"><img src="images/header-logo.png" /></a></h1> -->

        <ul class="nav nav-primary bigMenu">
          <div class="logoTest"><li id="logoImage"><a href="homepage.php" data-ajax='false'><img src="images/icons/LOGO_withFont.png"></a></li></div>
          <li id="nav-explore" class="meetTheTeam"><a href="#team" data-ajax='false'>&nbsp;&nbsp;Meet the Team&nbsp;&nbsp;&nbsp;</a></li>
        </ul><!-- /end ul#nav-primary.nav -->


        <ul class="nav nav-primary smallMenu">
          <li class="header-image"><img src="images/icons/LOGO_ForMobile.png"></li>
          <ul class="menu"><li id="nav-explore" class="meetTheTeam"><a href="#team" data-ajax='false'>&nbsp;&nbsp;Meet the Team</a></li>
          </ul>
        </ul><!-- /end ul#nav-primary.nav -->
      </div>



      <hr />

      <div class="blog section" style="background:#fff;">
        <!-- <h1 class="lede"></h1> -->

        <div class="main">
          <div class="article">
            <div class="header">
              <h1 class="title"></h1>
            </div><!-- /end .header -->

            <div class="intro" style="background:#fff;">
            <div class="blurb">
                Here at LevelUp we provide a new and engaging way to search for college courses. We also offer information on  the many various career and education paths available after the Leaving Cert by providing testimonials from working professionals who have been through a PLC course, apprenticeship or entrepreneurship.
                <table class='saveNextButtons savedCoursesButtons'><tr><td>
                    <a href='login.php' class='backArrow' data-ajax='false'><img src='images/icons/logIn_btn.png'></a>
                  </td><td>
                  <a href='register.php' class='backArrow' data-ajax='false'><img src='images/icons/register_btn.png'></a>
                </td></tr></table>
              </div>
                <div class="slideshow">
              <ul class="bxslider">
                <li><img src="images/slideshow/WebsiteStat01.jpg" width="100%" /></li>
                <li><img src="images/slideshow/WebsiteStat02.jpg" width="100%" /></li>
                <li><img src="images/slideshow/WebsiteStat03.jpg" width="100%" /></li>
                <li><img src="images/slideshow/WebsiteStat04.png" width="100%" /></li>
                <li><img src="images/slideshow/WebsiteStat05.png" width="100%" /></li>
              </ul>
            </div>
            

              <div id="testOrangeBox">&nbsp;
              </div>
              <br />
            <div class="meta section" style="background:#1b1b27;">
              <div class="videoWrapper">
                <iframe width="560" height="315" src="https://www.youtube.com/v/RfM24d1hboE&vq=hd720" frameborder="0" allowfullscreen="1"></iframe>
              </div>
            </div> <!-- /end .meta.section -->

            <div class="meta section" style="background:#fff;">
              <a name="team"></a>
              <div class="teamTitle">The Team</div>
              <div class="row">
                <div class="three columns">
                  <img class="bioImages" src="images/Sinead.jpg">
                  <h5 class="value-heading">Sinéad</h5>
                  <h6 class="value-heading">Project Lead</h6>
                  <p class="value-description">Sinéad Duffy is a freelance Graphic Designer and Animator. Recent work includes re-branding of the DkIT Music Department and various eLearning projects for educational publishers including Gill & Macmillan and Folens.</p>
                </div>
                <div class="three columns">
                  <img class="bioImages" src="images/Pauric.jpg">
                  <h5 class="value-heading">Pauric</h5>
                  <h6 class="value-heading">Content Developer</h6>
                  <p class="value-description">Pauric Martin is a graduate of Communications in Creative Multimedia. Having studied in a wide variety of areas such as design, audio and video, he has used these to create high quality projects both individually and as part of a group.</p>
                </div>
                <div class="three columns">
                  <img class="bioImages" src="images/Sian.jpg">
                  <h5 class="value-heading">Sían</h5>
                  <h6 class="value-heading">Designer</h6>
                  <p class="value-description">Sían is a freelance graphic designer with a Degree in Communications in Creative Multimedia. Sían loves the use of colour in clean and contemporary web design.</p>
                </div>
                <div class="three columns">
                  <img class="bioImages" src="images/Sean.jpg">
                  <h5 class="value-heading">Seán</h5>
                  <h6 class="value-heading">Programmer</h6>
                  <p class="value-description">Seán McDonnell is a freelance web developer with a Degree in Communications in Creative Multimedia. He has worked as lead programmer on several commercial products and enjoys new challenges.</p>
                </div>
              </div>
              </div>
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
<script src="js/jquery.bxslider.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.bxslider').bxSlider({
      auto: true
    });
  });
</script>
</body>
</html>
