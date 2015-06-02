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
              <div class="testimonyTopBox6">
                <img src="../images/people/Gerard_Thumbnail.png">
                <div class="testimonyName">Gerard McCabe</div>
                <div class="testimonyTitle">Visual Communication Student</div>
                <!-- <div class="titleRibbon">Apprenticeship</div> -->
              </div>
              
              <div class="WW gerardWW">
                <table>
                  <tr>
                    <td class="WWTD">
                      What:
                    </td>
                    <td class="WWTD">
                      Visual Communication
                    </td>
                  </tr>
                  <tr>
                    <td class="WWTD">
                      Where
                    </td>
                    <td class="WWTD">
                      NCAD
                    </td>
                  </tr>
                </table>
              </div>
                

              <div class="questionsBlock">When you where finishing secondary school did you
always know what you wanted to do afterwards?</div>
              <div class="lightAnswerBlock gerardLight">Not really, I always loved art and creativity so I always imagined I
would end up doing something like that. But yea I suppose at the
time you tend to sort of think towards more traditional careers.</div>
              <div class="questionsBlock">What PLC course did you do? In what
college did you do it?</div>
              <div class="darkAnswerBlock gerardDark">I did a portfolio preparation course in Sallynoggin College of
Further Education in Dublin.</div>
              <div class="questionsBlock">What made you choose this course?</div>
              <div class="lightAnswerBlock gerardLight">When I realized I wanted to study art, I set about seeing how to
apply to art colleges. By the time I realized this, the deadline for
portfolio applications was already very close. This meant I
wouldn't be able to do one to the standard I wanted . My art
teacher told me about this PLC course where you spend a year
making your portfolio specifically to apply to art colleges.</div>
              <div class="questionsBlock">How did you find that experience?</div>
              <div class="darkAnswerBlock gerardDark">It was fantastic, I really enjoyed it. I never had the chance before to
just focus solely on art without other things getting in the way.</div>
              <div class="questionsBlock">What did you do after finishing?</div>
              <div class="lightAnswerBlock gerardLight">Towards the end of the course I started submitting my portfolio to
various art colleges including NCAD. It had a reputation of being
very hard to get into, so applying was a bit daunting. However a
few months later I got accepted, and started the following
September, now I'm currently finishing up my third year.</div>
              <div class="questionsBlock">How do you find the course?</div>
              <div class="darkAnswerBlock gerardDark">The course is brilliant. After first year I chose to focus on Visual
Communication, or 'Viscom' as we call it. I really do love it,
creating something to suit someones needs
design wise is really fulfilling,
especially from the freelance work I’ve done so far. The course also
has some theory elements to it, so there is a fair amount of written
work. But overall I enjoy being in that kind of creative space.</div>
              <div class="questionsBlock">Have you always thought it was
important to study something you love?</div>
              <div class="lightAnswerBlock gerardLight">Yes, definitely. It's what your going to spend your life doing.
Having a genuine interest in it makes it that little bit easier.</div>
              <div class="questionsBlock">What do you feel are the benefits
of doing a PLC course?</div>
              <div class="darkAnswerBlock gerardDark">It gives you an insight into the type of course you may want to do
in the future. It is usually cheaper than third level as well, so its
almost like a taster course. A lot of what I did in the PLC we
covered again in my first year in NCAD, that gave me a lot of
confidence in what I was doing. Plus you can get up to 400 CAO
points through a PLC which is a fantastic way to get into third level
education through applying to the CAO</div>
              <div class="questionsBlock">What advice would you give to current leaving cert
students deciding on college courses/career paths?</div>
              <div class="bottomAnswerBlock gerardBottom">Ultimately it's your decision, while parents and teachers might be
telling where there is job prospects. That shouldn't be the basis of
your decision. Find something you love, or if you don't know what
that is yet, don't worry, you're young and have time on your side.</div>


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
