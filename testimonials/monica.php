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
              <div class="testimonyTopBox2">
                <img src="../images/people/Monica_Thumbnail.png">
                <div class="testimonyName">Monica Lillis</div>
                <div class="testimonyTitle">Architectural Technologist/ Fire Safety and Event Co-ordinator</div>
                <!-- <div class="titleRibbon">Apprenticeship</div> -->
              </div>
              
              <div class="WW monicaWW">
                <table>
                  <tr>
                    <td class="WWTD">
                      Course:
                    </td>
                    <td class="WWTD">
                      Architectural Technology
                    </td>
                  </tr>
                  <tr>
                    <td class="WWTD">
                      Where
                    </td>
                    <td class="WWTD">
                      DIT, Bolton St.
                    </td>
                  </tr>
                </table>
              </div>
                

              <div class="questionsBlock">Did you always know waht you
wanted to do after school?</div>
              <div class="lightAnswerBlock monicaLight">I knew I wanted to be in architecture.</div>
              <div class="questionsBlock">What made you choose that course?</div>
              <div class="darkAnswerBlock monicaDark">Technical drawing was my favourite subject in school so that led
directly to architecture. Plus, though I know now that it's not like
in real life, the depiction of architects in movies/tv made it look
really interesting. Also, wherever I visited, I always appreciated the
architecture of the place, particularly cathedrals. I found it
fascinating how such large and complex structures could have
been built without the technology we have today.</div>
              <div class="questionsBlock">Was moving away from home a factor in your choice?</div>
              <div class="lightAnswerBlock monicaLight">I come from West Clare so there were no colleges very close.
Limerick would have been the closest, and I did put UL and LIT on
my CAO form as my 2nd choice, but Dublin was my first choice as
DIT had a good reputation in my particular course.
I was happy to move away from home. I love my home, but I come
from a large family and wanted to get out on my own.
I still returned home every weekend for the first year, but this got
less often after that.</div>
              <div class="questionsBlock">How did you find the whole experience?</div>
              <div class="darkAnswerBlock monicaDark monicaDark">I loved it. I met some of my best friends in college. I loved going to
Bolton Street as it was located in the city centre and there was a
great social life. The course I chose was tough enough, but I
enjoyed the subjects in general so it was never too daunting.</div>
              <div class="questionsBlock">What did you do after you graduated?</div>
              <div class="lightAnswerBlock monicaLight">I went to Connecticut on the J1 visa for the summer.
Then I got a job with an Architect and Fire Safety Advisor</div>
              <div class="questionsBlock">Was it hard to find work?</div>
              <div class="darkAnswerBlock monicaDark">I was slow looking for work in the beginning. I returned from my J1
in late September, and was just being lazy really for a little while.
But when I actually started looking properly I found
something pretty quickly and started my first proper job in the
January after graduating.</div>
              <div class="questionsBlock">How did you find that line of work?</div>
              <div class="lightAnswerBlock monicaLight">I found fire safety design very interesting. It's not for everyone. It's
quite procedural and involves a lot of report writing and examining
regulations, but it suited me perfectly. It's a problem solving
job...trying to make the architects designs comply with fire
regulations, without losing the essence of their design. It can
sometimes feel like a jigsaw puzzle that needs to be solved.</div>
              <div class="questionsBlock">Did you ever consider your current career
as a possibility when you were in secondary school?</div>
              <div class="darkAnswerBlock monicaDark">To be honest, I never knew the architecture path could lead me
towards event control, but I'm glad it did.
I did work in an architectural practice for 5 years, and I liked it
quite a bit, but I prefer where I've ended up now.</div>
              <div class="questionsBlock">How has it benifited you personally?</div>
              <div class="lightAnswerBlock monicaLight">It's a great feeling to enjoy what I do. I've worked in places
before, where going in to work felt very monotonous, but now I
actually enjoy coming in.
It doesn't seem like too much of a chore if I have to work late
the odd time, or come in at the weekend because I care about
my work.</div>
              <div class="questionsBlock">Have you always thought it was
important to work at something you love?</div>
              <div class="darkAnswerBlock monicaDark">Until I got my current job, I always thought work was a means to
an end. Work to gain money so you can do the things you want
in your free time. I've always been content enough in the places
I've worked, but at the same time,always looking forward to the
weekend, and to holidays. I'm actually enjoying my current job a
lot though and that makes life a lot more refreshing.
I think it's extremely important to enjoy what you do, whether
it's work or hobbies. Life's too short to muddle along in
something you don't like. If you don't like your job, make a plan
to get out. I'm not saying quit right there and then, but do a
part-time course, or just look to a different company, but you're
never too old to move on.</div>
              <div class="questionsBlock">What advice would you give to current leaving cert
students deciding on college courses/career paths?</div>
<div class="lightAnswerBlock monicaLight">The course I chose, architectural technology, was a defined roll,
with a defined job afterwards. That was a great help to me
personally. I saw others do arts degrees with no real focus and they
came out the other end not knowing what to do, then spent years
doing other courses trying to find one that fit. If you can focus on
a job you might want, and follow a path towards that, it makes life
so much easier.</div>
              <div class="questionsBlock">What do you do today?</div>
              <div class="bottomAnswerBlock monicaBottom">My current job involves a number of different aspects. I'm still
doing Fire Safety Design and also Disability Access to buildings,
but my main focus is in Event Safety/Management. I love this
aspect of my job. I'm now organising the safety/escape
strategies for large scale events, such as concerts, festivals,
rugby matches and parades. I do everything from laying out the
staging, monitoring the stage build, safety control on the night
(which means back stage passes to some of the best gigs in
town). It's an exiting job and I'm really enjoying it so far.</div>


                                          <!-- <div class="meta section">

                                          </div> <!-- /end .meta.section --> 
                                        </div><!-- /end .article -->
                                      </div><!-- /end .main -->
                                    </div><!-- /end .blog.section -->

                                    <div id="footer">
      Contact us <a href="mailto:levelupireland@gmail.com?Subject=Hi%20LevelUp" target="_top">@LevelUpIreland</a><br />
      Tweet us <a href="https://twitter.com/LevelUpDkIT">@LevelUpDkIT</a>
                                    </div><!-- /end #footer -->
                                  </div><!-- /end .page -->

                                </div><!-- /end .site -->

                              </body>
                              </html>
