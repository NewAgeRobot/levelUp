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

  setcookie("seenSavedHelp", "1", time()+60*60*24*6004, "/");
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
      // var position = $(this).closest('tr').find('div:eq(2)').text();
      // alert($(this).parentsUntil('tr').children('.top_row').children('.jsCourseCode').text());
      // alert(position);
      var code = $(this).parentsUntil('tr').children('.top_row').children('.jsCourseCode').text();
      // alert(code);
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
      $(".bot_title_row").hide();
      $(".bot_row").hide();
      $(".reorderDone").hide();
      var reorderClicked = false;


      $("body").click(function() {
        $(".bot_title_row").hide();
        $(".bot_row").hide();
        $(".corner_fix").children().replaceWith("<div>&#x25BC;</div>");
      });

      $(".top_title_row").click(function() {
        event.stopPropagation();
        if(reorderClicked == false){
          $(".bot_title_row").hide();
          $(".bot_row").hide();
          $(".corner_fix").children().replaceWith("<div>&#x25BC;</div>");

          var $clicked = $(this);
          $clicked.siblings(".bot_row").show();  


          var $clickedTitle = $(this);
          $clickedTitle.siblings(".bot_title_row").show();  

          var $clickedCornerFix = $(this);
          $clickedCornerFix.siblings(".corner_fix").children().replaceWith("<div>&nbsp;</div>");
        };
      });

      $(".top_row").click(function() {
        event.stopPropagation();
        if(reorderClicked == false){
          $(".bot_title_row").hide();
          $(".bot_row").hide();
          $(".corner_fix").children().replaceWith("<div>&#x25BC;</div>");

          var $clicked = $(this);
          $clicked.siblings(".bot_row").show();  


          var $clickedTitle = $(this);
          $clickedTitle.siblings(".bot_title_row").show();  

          var $clickedCornerFix = $(this);
          $clickedCornerFix.siblings(".corner_fix").children().replaceWith("<div>&nbsp;</div>");
        };
      });

      $(".corner_fix").click(function() {
        event.stopPropagation();
        if(reorderClicked == false){
          $(".bot_title_row").hide();
          $(".bot_row").hide();

          var $clicked = $(this);
          $clicked.siblings(".bot_row").show();  


          var $clickedTitle = $(this);
          $clickedTitle.siblings(".bot_title_row").show();

          $(".corner_fix").children().replaceWith("<div>&#x25BC;</div>");
          $(this).children().replaceWith("<div>&nbsp;</div>");
        };
      });

      $(".bot_row").click(function() {
        event.stopPropagation();
      });

      $(".bot_title_row").click(function() {
        event.stopPropagation();
      });


      $('#reorder').click(function(){
        $(".title").replaceWith("<h1 class='title' style='color: #ed7d7c;'>You can now drag and drop each course to order them however you like.</h1>");
        $(".corner_fix").children().replaceWith("<div>&#x25BC;</div>");
        $(".bot_title_row").children().css({"background": "#ec2f3a"});
        $(".top_title_row").children().css({"background": "#ec2f3a"});
        $(".bot_title_row").hide();
        $(".bot_row").hide();
        $("#reorder").hide();
        $(".reorderDone").show();

        reorderClicked = true;
      });

      $('.reorderDone').click(function(){
        reorderClicked = false;
      });
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
    <div class='whiteHeader'><span class="currentPageSpanLeft"><a href="homepage.php" data-ajax='false'><img src="images/icons/Home_Icon.png"></a></span><span class="currentPageSpanRight">Saved Courses</span></div>

    <div class="page">


      <div class="navigationBar">
        <!-- <h1 class="logo"><a href="homepage.php"><img src="images/header-logo.png" /></a></h1> -->

        <ul class="nav nav-primary bigMenu">
          <div class="logoTest"><li id="logoImage"><a href="homepage.php" data-ajax='false'><img src="images/icons/LOGO_withFont.png"></a></li></div>
          <li id="nav-explore" class="first"><a href="exploreInterests.php" data-ajax='false'>&nbsp;&nbsp;Explore&nbsp;&nbsp;</a></li><li id="nav-saved"><a href="savedCourses.php" data-ajax='false'>><b class="currentPage">&nbsp;&nbsp;Saved Courses&nbsp;&nbsp;</b></a></li><li id="nav-feedback" class="second"><a href="interestFeedback.php" data-ajax='false'>>&nbsp;&nbsp;Rate&nbsp;&nbsp;</a></li><li id="nav-stats" class="third"><a href="statistics.php" data-ajax='false'>>&nbsp;&nbsp;Statistics&nbsp;&nbsp;</a></li><li id="nav-test" class="fourth"><a href="testimonials.php" data-ajax='false'>>&nbsp;&nbsp;Testimonials&nbsp;&nbsp;</a></li><li id="nav-log" class="sixth"><a href="logout.php" data-ajax='false'>>&nbsp;&nbsp;Log Out&nbsp;&nbsp;</a></li>
        </ul><!-- /end ul#nav-primary.nav -->


        <ul class="nav nav-primary smallMenu">
          <li class="header-image"><img src="images/icons/LOGO_ForMobile.png"></li>
          <ul class="menu">
            <li>
              <a href="#">&#9776; Menu</a>
              <ul>
                <li><a href="exploreInterests.php" data-ajax='false'><img src="images/icons/icon_ExploreCourses.jpg">Explore</a></li>
                <li><a href="savedCourses.php" data-ajax='false'><img src="images/icons/icon_SavedCourses.jpg">Saved Courses</a></li>
                <li><a href="interestFeedback.php" data-ajax='false'><img src="images/icons/icon_MyRecords.jpg">Rate</a></li>
                <li><a href="statistics.php" data-ajax='false'><img src="images/icons/icon_Statistics.jpg">Statistics</a></li>
                <li><a href="testimonials.php" data-ajax='false'><img src="images/icons/icon_Testimonials.jpg">Testimonials</a></li>
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
              <h1 class="title" style="color: #ed7d7c;">These are your saved courses</h1>
            </div><!-- /end .header -->

            <div class="intro">
              <div class="centeredIntro savedCenter">
              

<?php
// <input type="image" src="images/icons/logIn_btn.png" style="background:#303944; width: 50%; max-width:200px;" name="register" value="Register">
echo "<div id='reorder' style='text-align:center;'><img src='images/icons/changeOrder_btn.png' style='background:#303944; width: 50%; max-width:200px;'></div><a href='javascript:{}' class='reorderDone' style='text-align:center;'><div><img src='images/icons/saveOrder_btn.png' style='background:#303944; width: 50%; max-width:200px;'></div></a>";
if(!$numCourses){
  echo "You have yet to save any courses.";
}
else{
  echo "<table border='1' width='100%' id='sort' class='grid'>";

  for($counter = 0; $counter < $num_rows; $counter++){
    print_r("<tr>
      <td>
        <div class='top_title_row'>
          <div>#</div>
          <div>Code</div>
          <div>Title</div>
          <div>Institute</div>
        </div>
        <div class='top_row'>");
        if($counter == 0){
          print_r("<div class='index'><div class='firstCourse'>" . ($counter+1). "</div></div>");
        }
        else if($counter == 1){
          print_r("<div class='index'><div class='secondCourse'>" . ($counter+1). "</div></div>");
        }
        else if($counter == 2){
          print_r("<div class='index'><div class='thirdCourse'>" . ($counter+1). "</div></div>");
        }
        else{
          print_r("<div class='index'>" . ($counter+1). "</div>");
        }
          // "<div class='index'>" . ($counter+1). "</div>
          print_r("<div class='jsCourseCode'>" . $array[$counter]['CourseCode'] . "</div>
          <div>" . utf8_encode($array[$counter]['CourseTitle']) . "</div>
          <div>" . utf8_encode($array[$counter]['CourseCollege']) . "</div>
        </div>
        <div class='bot_title_row'>
          <div>Level</div>
          <div>Points</div>
          <div>Link</div>
          <div>Delete?</div>
        </div>
        <div class='bot_row'>
          <div>" . $array[$counter]['CourseLevel'] . "</div>
          <div>" . $array[$counter]['CoursePoints'] . "</div>
          <div><a href='" . $array[$counter]['CourseURL'] . "' target='_blank'><font color='#31c3ea'>Find out more</font></a></div>
          <div><a href='javascript:{}' class='ajax'><font color='red'><img src='images/icons/icon_Delete.png' style='width:20%;max-width:30px;min-width:20px;margin-top:5px;'></font></a></div>
        </div>
        <div class='corner_fix'>
          <div>&#x25BC;</div>
        </div>
      </td>
    </tr>");
}
echo "</table>";
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
<table class='saveNextButtons savedCoursesButtons'><tr><td>
                <a href='exploreInterests.php' class='backArrow' data-ajax='false'><img src='images/icons/explore_btn.png'></a>
                </td><td>
                <a href='interestFeedback.php' class='backArrow' data-ajax='false'><img src='images/icons/feedbackPage_btn.png'></a>
                </td></tr></table>
                <p>Need some help? Click <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">here</a> for an explanation.</p>


<div id="light" class="white_content" 
<?php 
  if (isset($_COOKIE['seenSavedHelp'])) {
    echo "style='display:none;'";
  }
  else{
    echo "style='display:inline-block;'";
  }
?>>
<div>To drag and drop the courses into your preferred order just hit the Reorder Courses button.</div>
<div>You can also click on the boxes to expand them for more information on the selected course.</div>
<div id="boxClose"><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">X</a></div></div>
<div id="fade" class="black_overlay" 
<?php 
  if (isset($_COOKIE['seenSavedHelp'])) {
    echo "style='display:none;'";
  }
  else{
    echo "style='display:block;'";
  }
?>></div>

</div> <!-- /end .meta.section -->

</div>
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