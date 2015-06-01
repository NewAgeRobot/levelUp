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
          <div class="logoTest"><li id="logoImage"><a href="../../homepage.php" data-ajax='false'><img src="../images/icons/LOGO_withFont.png"></a></li></div>
          <li id="nav-explore" class="first"><a href="../exploreInterests.php" data-ajax='false'>&nbsp;&nbsp;Explore&nbsp;&nbsp;&nbsp;</a></li><li id="nav-saved" class="fifth"><a href="../savedCourses.php" data-ajax='false'>>&nbsp;&nbsp;Saved Courses&nbsp;&nbsp;</a></li><li id="nav-feedback" class="second"><a href="../interestFeedback.php" data-ajax='false'>>&nbsp;&nbsp;Weekly Feedback&nbsp;&nbsp;</a></li><li id="nav-stats" class="third"><a href="../statistics.php" data-ajax='false'>>&nbsp;&nbsp;Statistics&nbsp;&nbsp;</a></li><li id="nav-test"><a href="../testimonials.php" data-ajax='false'>><b class="currentPage">&nbsp;&nbsp;Testimonials&nbsp;&nbsp;</b></a></li><li id="nav-log" class="sixth"><a href="../logout.php" data-ajax='false'>>&nbsp;&nbsp;Log Out&nbsp;&nbsp;</a></li>
        </ul><!-- /end ul#nav-primary.nav -->


        <ul class="nav nav-primary smallMenu">
          <li class="header-image"><img src="../images/icons/LOGO_ForMobile.png"></li>
          <ul class="menu">
            <li>
              <a href="#">&#9776; Menu</a>
              <ul>
                <li><a href="../exploreInterests.php" data-ajax='false'><img src="../images/icons/icon_ExploreCourses.jpg">Explore</a></li>
                <li><a href="../savedCourses.php" data-ajax='false'><img src="../images/icons/icon_SavedCourses.jpg">Saved Courses</a></li>
                <li><a href="../interestFeedback.php" data-ajax='false'><img src="../images/icons/icon_MyRecords.jpg">Weekly Feedback</a></li>
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
              <div class="testimonyTopBox3">
                <img src="../images/people/Kevin_Thumbnail.png">
                <div class="testimonyName">Kevin O’Brien</div>
                <div class="testimonyTitle">Guitar Builder at George Lowden Guitars</div>
                <!-- <div class="titleRibbon">Apprenticeship</div> -->
              </div>
              
              <div class="WW kevinWW">
                <table>
                  <tr>
                    <td class="WWTD">
                      What:
                    </td>
                    <td class="WWTD">
                      Senior Architectural Technologist
                    </td>
                  </tr>
                  <tr>
                    <td class="WWTD">
                      Where
                    </td>
                    <td class="WWTD">
                      An Architectural practice in Dublin
                    </td>
                  </tr>
                </table>
              </div>
                

              <div class="questionsBlock">What made you choose that course?</div>
              <div class="lightAnswerBlock kevinLight">A s I began to look more closely at the courses available, I decided
that Architectural Technology most closely fitted my interests and
strengths at the time; those being design, drawing and how buildings
are made. At this time (1997) there was the very beginning of a
construction boom, so the job prospects on completion of the
course would be very good.</div>
              <div class="questionsBlock">Did you enjoy that experience?</div>
              <div class="darkAnswerBlock kevinDark">I found the experience a little overwhelming to begin with. I was 17
when I began college and looking back now I think I was a bit too
young and naïve. Academically, I did well in my first year. But I
remember only scraping through second year as the workload
became more intense and much of my spare time was devoted to a
part time job.</div>
              <div class="questionsBlock">What did you do after you graduated?</div>
              <div class="lightAnswerBlock kevinLight">A fter graduating I went straight back to work full time with a
company I had worked for during a gap year in college, where I spent
the next eight years.</div>
              <div class="questionsBlock">What made you want to change careers?</div>
              <div class="darkAnswerBlock kevinDark">T hat building boom came to a grinding halt in 2008, the work
dried up, and in 2009, having been working a three-day week for
around nine months, I was finally made redundant. I decided to
change career because at that stage I felt pretty burnt out and
disillusioned with Architecture and the building industry. There were
also zero job prospects as the Architecture and building
industries were decimated. At that point, out of a group of ten
friends I had been to college with, eight of us were out of work.</div>
              <div class="questionsBlock">How did you choose your new career?</div>
              <div class="lightAnswerBlock kevinLight">I needed a complete change. I had always been interested in
woodwork, always made things since I was a kid. I also played
music throughout my teens and twenties, and inevitably ended up
taking guitars apart to see how they were made, and also fixing
friend’s guitars, all of which I really enjoyed. So I decided to see if I
could turn that into a career, in spite of the fact that job prospects
as a guitar maker in Ireland are extremely limited. I was thinking
along the lines of the old saying that if you do something you love
for a living, you’ll never work a day in your life.</div>
              <div class="questionsBlock">How has it benifited you personally?</div>
              <div class="darkAnswerBlock kevinDark">I feel more comfortable in my life. It feels right, like there was
always something missing and now I’ve found it. It’s incredibly sat-
isfying to take some wood and make something with my own
hands, that in turn makes beautiful music in someone else’s
hands. I earn less than half what I used to as an Architectural
Technologist, but for me having a real interest and passion for
what I am doing is far more rewarding.</div>
              <div class="questionsBlock">Did you ever consider your current career
as a possibility when you were in secondary school?</div>
              <div class="lightAnswerBlock kevinLight">When I was around fifteen I wrote a bucket list of things I
wanted to do in my life, and on the list was “make a guitar
(business idea???)”. So I guess it was something I wanted to do,
but I didn’t seriously consider it as a career at that stage because
I had absolutely no idea how to go about becoming a guitar
maker. And if it wasn’t engineering, science, computers or “arts”,
it wasn’t something that the career guidance counsellor in my
school could help me with.</div>
              <div class="questionsBlock">Have you always thought it was
important to work at something you love?</div>
              <div class="darkAnswerBlock kevinDark">Yes, absolutely.</div>
              <div class="questionsBlock">What advice would you give to current leaving cert
students deciding on college courses/career paths?</div>
<div class="lightAnswerBlock kevinLight">My advice to leaving cert students deciding on a college course or
career path is, don’t. You are seventeen, maybe eighteen years old.
Your whole life experience up to now consists of school. Do your
leaving cert and do as well as you can, but when you’re finished my
advice is to get some life experience. Time is on your side. Once you
turn 23 you’re a mature student and can apply for any course in the
country regardless of how many points you got in the leaving cert.
And don’t forget all the other options there are aside from going to
college, apprenticeships, PLC courses, etc.</div>
              <div class="questionsBlock">What do you do today?</div>
              <div class="bottomAnswerBlock kevinBottom">Today I am a guitar maker with George Lowden Guitars
in Downpatrick, Co. Down. We make some of the best
acoustic guitars in the world.</div>


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
