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
              <div class="testimonyTopBox1">
                <img src="../images/people/Andrea_Thumbnail.png">
                <div class="testimonyName">Andrea McConnon</div>
                <div class="testimonyTitle">Electrical Engineer</div>
                <!-- <div class="titleRibbon">Apprenticeship</div> -->
              </div>
              
              <div class="WW andreaWW">
                <table>
                  <tr>
                    <td class="WWTD">
                      What:
                    </td>
                    <td class="WWTD">
                      Apprenticeship
                    </td>
                  </tr>
                  <tr>
                    <td class="WWTD">
                      Where
                    </td>
                    <td class="WWTD">
                      ESB Networks
                    </td>
                  </tr>
                </table>
              </div>
                <div class="questionsBlock">When you were finishing secondary school did
                  you always know what you wanted to do afterwards?</div>
                  <div class="lightAnswerBlock andreaLight">No, definitely not. I'd always said I wanted to be a PE teacher, and
                    it wasn't until the day that I got my leaving cert results and got
                    the points for it that I realised I definitely didn't want it!</div>
                    <div class="questionsBlock">Is what you are doing now something
                      you always wanted to do?</div>
                      <div class="darkAnswerBlock andreaDark">It was something I'd always thought about doing because I wanted
                        to do something practical or hands-on, but I never thought I'd
                        enjoy it as much as I do.</div>
                        <div class="questionsBlock">What made you decide to do an apprenticeship?</div>
                        <div class="lightAnswerBlock andreaLight">When the career guidance teacher came around to my class to
                          mainly tell the lads that the ESB were recruiting, I contemplated
                          applying. When I was filling out the application form I never
                          intended to take the job, it was always just a back-up plan if
                          everything went wrong in the leaving cert. And even though
                          everything went much better than expected in the exams, and I
                          got my first choice on my CAO form, I realised I didn't want what
                          I'd been offered. So I decided to start the apprenticeship with the
                          intentions of using it as a gap year and a chance to earn some
                          money, and had planned on re-applying to the CAO the following
                          year. However, the ESB were offering their apprentices the chance
                          to go to college to study electrical engineering after completing
                          the first 2 years of the apprenticeship. They fully fund this by
                          paying your college fees and giving you enough money to cover all
                          of your expenses (accommodation, travel, food, etc.). This is the
                          road I went down, but the option was also there to finish out the
                          apprenticeship and become a fully qualified electrician.</div>
                          <div class="questionsBlock">Where did you undertake this apprenticeship?</div>
                          <div class="darkAnswerBlock andreaDark">I did my apprenticeship with ESB Networks.</div>
                          <div class="questionsBlock">How did you find the experience?</div>
                          <div class="lightAnswerBlock andreaLight">I've really enjoyed all of it. The apprenticeship is great because
                            you learn while you work, you get to earn money so you get some
                            independence, and you don't spend too long in college at any one
                            time. Because ESB Networks is split into different areas of work, as
                            an apprentice, you get to move around all of the different areas
                            every 3 or 4 months, so if you don't like one area you only have to
                            do it for a few months and then you can move on.
                            The ordinary level degree I completed was Electrical and Control
                            Engineering in DIT (DT009). This course was great because a lot of
                            time was spent in labs doing practical work like building and
                            programming robots to fight each other in robot wars.
                            I'm currently completing the honours degree in electrical/
                            electronic engineering in DIT (DT021), and have one year left.
                            Because I had done two years of the apprenticeship with the ESB, I
                            got to go straight into 2nd year of the ordinary degree, and then
                            following that, I went into 3rd year of the honours degree.</div>
                            <div class="questionsBlock">How has it benefited you personally?</div>
                            <div class="darkAnswerBlock andreaDark">By doing the apprenticeship first, I felt that it gave me a chance to
                              mature and really think about what I wanted to do. So when I did
                              go to college to do the engineering degree I was really ready to
                              start studying. Whereas if I'd gone straight to college after school I
                              think I would have been burned out after all the studying for the
                              leaving cert to give college my all.</div>
                              <div class="questionsBlock">Did the apprenticeship involve any
                                course work or further study?</div>
                                <div class="lightAnswerBlock andreaLight">The apprenticeship itself consists of 7 phases spread out over 4
                                  years. Phases 1, 3, 5 & 7 are on the job, and phases 2, 4 & 6 are in
                                  college. Phase 2 lasts 20 weeks, and takes place in FAS/SOLAS
                                  training centres. This phase is split 50/50 between theory and
                                  practical work. Phases 4 & 6 both last 10 weeks and take place in
                                  ITs. These two phases are much more theory based, with one day a
                                  week spent in the workshop. Because I was going to study electrical
                                  engineering after the 2nd year, I had to complete engineering
                                  bridging modules in DIT before going into 2nd year of the degree.
                                  This was 6 weeks long and was completed in two 3 week blocks
                                  before and after completing Phase 4 of the apprenticeship.</div>
                                  <div class="questionsBlock">Have you always thought it was
                                    important to work at something you love?</div>
                                    <div class="darkAnswerBlock andreaDark">Definitely, if you enjoy what you're doing then you'll never dread
                                      getting up for work in the morning.</div>
                                      <div class="questionsBlock">What advice would you give to current leaving cert
                                        students deciding on college courses/career paths?</div>
                                        <div class="bottomAnswerBlock andreaBottom">Whether you know what you want to do or not, aim to get the
                                          highest points you possibly can. That way if like me you decide
                                          you don't want to do what you thought you wanted to do, you'll
                                          have left yourself with as many opportunities as you possibly can.
                                          Don't panic if you don't know what you want do to, most people
                                          don't. Make sure you give yourself some back-up options whether
                                          it be an apprenticeship or a PLC course.
                                          Don't rely solely on your CAO application. If you can, try to get a
                                          weeks work experience in whatever it is you think you might want
                                          to do. Do it the summer after your leaving cert even if it is after
                                          the CAO deadline.
                                          It's better to know then if you don't want to do it than to spend a
                                          year in college to discover it. I got a weeks work experience in a
                                          soccer summer camp, and it was then that I realised I didn't really
                                          want to be a PE teacher. Whatever it is that you want to do, it's
                                          not out of your reach. There are back ways into everything. So
                                          don't let the points dictate what career you choose.</div>


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
