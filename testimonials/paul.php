<?php
include "../connect.php";
include "../algor.php";
if($logged == false){
  header('Location: ../index.php');
}
if(!$user['CoursesPicked']){
  header('Location: ../subjectChoice.php');
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

  <link rel="stylesheet" href="../css/robotCss.css" media="screen, projection" />

  <script type="text/javascript" src="../js/jquery-2.1.3.min.js"></script>
  <link rel="stylesheet" href="../css/jquery-mobile.css" />
  <script src="../js/jquery-mobile.js"></script>
  <link rel="stylesheet" href="../css/dropit.css" />
  <script src="../js/dropit.js"></script>
  <script src="../js/redirect.js"></script>


  <script type="text/javascript">
    $(document).ready(function() {
      $('.menu').dropit();
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $(".smallMenu .header-image img").click(function() {
        window.location.replace("../homepage.php");
      });
    });
  </script>
</head>

<body>

  <div class="site">
    <div class='whiteHeader'><span class="currentPageSpanLeft"><a href="../homepage.php" data-ajax='false'><img src="../images/icons/Home_Icon.png"></a></span><span class="currentPageSpanRight">Testimonials</span></div>

    <div class="page">


      <div class="navigationBar">
        <!-- <h1 class="logo"><a href="../homepage.php"><img src="../images/header-logo.png" /></a></h1> -->

        <ul class="nav nav-primary bigMenu">
          <div class="logoTest"><li id="logoImage"><a href="../homepage.php" data-ajax='false'><img src="../images/icons/LOGO_withFont.png"></a></li></div>
          <li id="nav-explore" class="first"><a href="../exploreInterests.php" data-ajax='false'>&nbsp;&nbsp;Explore&nbsp;&nbsp;&nbsp;</a></li><li id="nav-saved" class="fifth"><a href="../savedCourses.php" data-ajax='false'>>&nbsp;&nbsp;Saved Courses&nbsp;&nbsp;</a></li><li id="nav-feedback" class="second"><a href="../interestFeedback.php" data-ajax='false'>>&nbsp;&nbsp;Rate&nbsp;&nbsp;</a></li><li id="nav-stats" class="third"><a href="../statistics.php" data-ajax='false'>>&nbsp;&nbsp;Statistics&nbsp;&nbsp;</a></li><li id="nav-test"><a href="../testimonials.php" data-ajax='false'>><b class="currentPage">&nbsp;&nbsp;Testimonials&nbsp;&nbsp;</b></a></li><li id="nav-log" class="sixth"><a href="../logout.php" data-ajax='false'>>&nbsp;&nbsp;Log Out&nbsp;&nbsp;</a></li>
        </ul><!-- /end ul#nav-primary.nav -->


        <ul class="nav nav-primary smallMenu">
          <li class="header-image"><img src="../images/icons/LOGO_ForMobile.png"></li>
          <ul class="menu">
            <li>
              <a href="#">&#9776; Menu</a>
              <ul>
                <li><a href="../exploreInterests.php" data-ajax='false'><img src="../images/icons/icon_ExploreCourses.jpg">Explore</a></li>
                <li><a href="../savedCourses.php" data-ajax='false'><img src="../images/icons/icon_SavedCourses.jpg">Saved Courses</a></li>
                <li><a href="../interestFeedback.php" data-ajax='false'><img src="../images/icons/icon_MyRecords.jpg">Rate</a></li>
                <li><a href="../statistics.php" data-ajax='false'><img src="../images/icons/icon_Statistics.jpg">Statistics</a></li>
                <li><a href="../testimonials.php" data-ajax='false'><img src="../images/icons/icon_Testimonials.jpg">Testimonials</a></li>
                <li><a href="../logout.php" data-ajax='false'><img src="../images/icons/icon_LogOut.jpg">Log Out</a></li>
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

            <div class="intro">
              <div class="testimonyTopBox5">
                <img src="../images/people/Paul_Thumbnail.png">
                <div class="testimonyName">Paul Ryan</div>
                <div class="testimonyTitle">Healthcare Assistant</div>
                <!-- <div class="titleRibbon">Apprenticeship</div> -->
              </div>
              
              <div class="WW paulWW">
                <table>
                  <tr>
                    <td class="WWTD">
                      Course:
                    </td>
                    <td class="WWTD">
                      Fetac level 5 in Healthcare assistance.
                    </td>
                  </tr>
                  <tr>
                    <td class="WWTD">
                      Where
                    </td>
                    <td class="WWTD">
                      Ardee Business School
                    </td>
                  </tr>
                </table>
              </div>
                

              <div class="questionsBlock">Did you have a job prior to completing a PLC?</div>
              <div class="lightAnswerBlock paulLight">Yes I worked in a call centre for a UK bank,
but was made redundant.</div>
              <div class="questionsBlock">Did you always know what you
wanted to do after school?</div>
              <div class="darkAnswerBlock paulDark">No I really did not know what to do, business
was a popular choice with a lot of prospects.</div>
              <div class="questionsBlock">What made you to do this PLC course?</div>
              <div class="lightAnswerBlock paulLight">I was in Sligo General hospital visiting a loved one and I
remember it was a bank holiday weekend, I was watching the
nursing/care staff going about their daily jobs and their
dedication to what they were doing. I said to myself that I might
enjoy that sort of work so I went for it.</div>
              <div class="questionsBlock">How did you find the PLC experience?</div>
              <div class="darkAnswerBlock paulDark">Great! lots of people from various backgrounds
wanting to do well, and there was also a sense of
team work within the group. All different ages and
nationalities.</div>
              <div class="questionsBlock">How has pursuing something you are truly
interested in benefited you personally?</div>
              <div class="lightAnswerBlock paulLight">I'm definitely happier and don't mind getting out of bed
for work, I look forward to it. Everyday is different.
I enjoy every minute of it, it’s very rewarding and fufilling.</div>
              <div class="questionsBlock">What do you feel are the benefits
of doing a PLC course?</div>
              <div class="darkAnswerBlock paulDark">It's a different way of increasing your skill set and it's slightly
different than college,
less pressures.</div>
              <div class="questionsBlock">Have you always thought it was important
to work at something you love?</div>
              <div class="lightAnswerBlock paulLight">No.
But I know now that it is very important for home
life as well as for myself.</div>
              <div class="questionsBlock">What advice would you give to current leaving cert
students deciding on college courses/career paths?</div>
              <div class="darkAnswerBlock paulDark">Take your time to decide what you want to do, look outside
the box and try things out that you wouldn't normally do.
Don't follow the crowd,
be your own person.</div>
              <div class="questionsBlock">What do you do today?</div>
              <div class="bottomAnswerBlock paulBottom">Looking after the care of both elderly and intellectually
challenged people. Basic hygiene, feeding, dressing and
mobility.</div>


                                          <!-- <div class="meta section">

                                          </div> <!-- /end .meta.section --> 
                                        </div><!-- /end .article -->
                                      </div><!-- /end .main -->
                                    </div><!-- /end .blog.section -->

                                    <div id="footer">
                                    </div><!-- /end #footer -->
                                  </div><!-- /end .page -->

                                </div><!-- /end .site -->

                              </body>
                              </html>
