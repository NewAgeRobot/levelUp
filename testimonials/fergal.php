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
              <div class="testimonyTopBox4">
                <img src="../images/people/Fergal_Thumbnail.png">
                <div class="testimonyName">Fergal Tumelty</div>
                <div class="testimonyTitle">Hospitality Management</div>
                <!-- <div class="titleRibbon">Apprenticeship</div> -->
              </div>
              
              <div class="WW fergalWW">
                <table>
                  <tr>
                    <td class="WWTD">
                      Course:
                    </td>
                    <td class="WWTD">
                      Hospitality and Bar Management
                    </td>
                  </tr>
                  <tr>
                    <td class="WWTD">
                      Where
                    </td>
                    <td class="WWTD">
                      DkIT
                    </td>
                  </tr>
                </table>
              </div>
                

              <div class="questionsBlock">When you where finishing secondary school did you
always know what you wanted to do afterwards?</div>
              <div class="lightAnswerBlock fergalLight">Not really, it did kind of worry me at the time. A lot of people I
knew had this really clear plan of what they wanted to do and the
fact that I didn’t made me feel a lot of pressure.</div>
              <div class="questionsBlock">What course did you do? and In what
college did you do it?</div>
              <div class="darkAnswerBlock fergalDark">I did the Hospitality and Bar management course in Dundalk
Institute of Technology.</div>
              <div class="questionsBlock">What made you choose this course?</div>
              <div class="lightAnswerBlock fergalLight">I always liked the idea of working in that area, it seemed like it
would be the kind of career that wouldn’t be boring or repetitive .
Obviously I found out through the course that there was so much
more to it that just pulling pints!</div>
              <div class="questionsBlock">How did you find that experience?</div>
              <div class="darkAnswerBlock fergalDark">On the college life side of things I really enjoyed it. But the course
itself has been helpful in my career so far. It has given me a good
head start in this business.</div>
              <div class="questionsBlock">What did you do after finishing?</div>
              <div class="lightAnswerBlock fergalLight">After college, I felt a little drained. I had friends going on a J1 to
the US. It was then I found out about the year long graduate visa. I
decided I would go for it and take a year out. My friends would be
there for the first 3 months, so it wasnt if I was going on my own.</div>
              <div class="questionsBlock">How do you find the experience?</div>
              <div class="darkAnswerBlock fergalDark">It was honestly one of the best experiences of my life. The first
three months when my friends were there, I will admit we did live
the student life. When they left I did learn a lot about myself. Just
even in the way you handle everyday situations. I did have a few
jobs while I was there, in different bars, that way I could be gaining
experience in a bar and taking time out for myself.</div>
              <div class="questionsBlock">Have you always thought it was
important to Work at something you enjoy?</div>
              <div class="lightAnswerBlock fergalLight">Yea, it makes work feel more like a career rather than just a job.</div>
              <div class="questionsBlock">What do you feel are the benefits
of Taking a year out?</div>
              <div class="darkAnswerBlock fergalDark">It gives you time to really see where you want your life to go, while
I did work in an area which I studied while I was away. The
experiences I had while I was there really helped me decide on the
direction I wanted to go in career wise.</div>
              <div class="questionsBlock">What advice would you give to current leaving cert
students deciding on college courses/career paths?</div>
<div class="lightAnswerBlock fergalLight">The only advice I can really give is whatever decision you make,
make sure it is right for you, and you alone.
If it doesnt work out, there is always something else you can try.</div>
              <div class="questionsBlock">Now that your Gap Year is over,
What are you currently working at?</div>
              <div class="bottomAnswerBlock fergalBottom">I now work in the Guiness Storehouse in Dublin,
It’s currently Irelands busiest tourist attraction.
I absolutley love it, I get to meet people from all over the world
everyday.</div>


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
