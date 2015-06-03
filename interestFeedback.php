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
$result = mysql_query("SELECT `COLUMN_NAME` 
  FROM `INFORMATION_SCHEMA`.`COLUMNS` 
  WHERE `TABLE_SCHEMA`='$mysql_database' 
  AND `TABLE_NAME`='interestFeedback'");

$items[] = array();


while($row = mysql_fetch_assoc($result)) {
  foreach ($row as $col => $val) {
    $items[] = $val;
  }
  $itemsSize = count($items);
}
if(isset($_POST['formSubmit'])){
  $currentDay = date("Y/m/d");

  $first = $_POST['subjectList'][0];
  $second = $_POST['subjectList'][1];
  $third = $_POST['subjectList'][2];
  mysql_query("INSERT INTO `interestFeedback` (`Date`, `Email`, `$first`, `$second`, `$third`) VALUES ('$currentDay', '$userEmail', '1', '1', '1')");
  header('Location: subjectFeedback.php');
};
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

          $("#dupeCourseWarning").hide();
    });
  </script>
  <script language="Javascript" type="text/javascript">
    var main = function(){
      var arr  = [];
      var hash = [];
      var duplicates = [];

      var $first; 
      var $second; 
      var $third;
      var $fourth;
      var $fifth;
      var $sixth;

          $("#submit").attr("disabled", "disabled");
      $(".subjectClass").change(function() {
        arr = [];
        duplicates = [];
        hash = [];
        $first = $("#first").val();
        $second = $("#second").val();
        $third = $("#third").val();

        arr.push($first, $second, $third);
        for (var n=arr.length; n--; ){
          if (typeof hash[arr[n]] === 'undefined') hash[arr[n]] = [];
          hash[arr[n]].push(n);
        }

        for (var key in hash){
          if (hash.hasOwnProperty(key) && hash[key].length > 1){
            duplicates.push(key);
          }
        }

        if(duplicates.length > 0){
          $("#submit").attr("disabled", "disabled");
          $("#dupeCourseWarning").show();
        }
        else{
          $("#submit").removeAttr("disabled");
          $("#dupeCourseWarning").hide();
        }
      });
    }

    $(document).ready(main);

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
    <div class='whiteHeader'><span class="currentPageSpanLeft"><a href="homepage.php" data-ajax='false'><img src="images/icons/Home_Icon.png"></a></span><span class="currentPageSpanRight">Interest Feedback</span></div>

    <div class="page">


      <div class="navigationBar">
        <!-- <h1 class="logo"><a href="homepage.php"><img src="images/header-logo.png" /></a></h1> -->

        <ul class="nav nav-primary bigMenu">
          <div class="logoTest"><li id="logoImage"><a href="homepage.php" data-ajax='false'><img src="images/icons/LOGO_withFont.png"></a></li></div>
          <li id="nav-explore" class="first"><a href="exploreInterests.php" data-ajax='false'>&nbsp;&nbsp;Explore&nbsp;&nbsp;&nbsp;</a></li><li id="nav-saved" class="fifth"><a href="savedCourses.php" data-ajax='false'>>&nbsp;&nbsp;Saved Courses&nbsp;&nbsp;</a></li><li id="nav-feedback"><a href="interestFeedback.php" data-ajax='false'>><b class="currentPage">&nbsp;&nbsp;Rate&nbsp;&nbsp;</b></a></li><li id="nav-stats" class="third"><a href="statistics.php" data-ajax='false'>>&nbsp;&nbsp;Statistics&nbsp;&nbsp;</a></li><li id="nav-test" class="fourth"><a href="testimonials.php" data-ajax='false'>>&nbsp;&nbsp;Testimonials&nbsp;&nbsp;</a></li><li id="nav-log" class="sixth"><a href="logout.php" data-ajax='false'>>&nbsp;&nbsp;Log Out&nbsp;&nbsp;</a></li>
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
      <!-- <h1 class="lede"></h1> -->

      <div class="main">
        <div class="article">
          <div class="header">
            <h1 class="title">Pick your three favourite interests of this week. Remember to check the statistics page to see how your interests have changed over time!</h1>
          </div><!-- /end .header -->

          <div class="intro">

            <div class="centeredIntro">
            <form action='' method='post' name='subjectFavourites' class='formText' data-ajax='false'>
              <select class="subjectClass" id="first" name="subjectList[]">
                <option value="" disabled selected>Select your 1st Interest</option>
                <?php 
                for($j = 4; $j < $itemsSize; $j++){
                  print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
                }
                ?>
              </select>
              <select class="subjectClass" id="second" name="subjectList[]">
                <option value="" disabled selected>Select your 2nd Interest</option>
                <?php 
                for($j = 4; $j < $itemsSize; $j++){
                  print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
                }
                ?>
              </select>
              <select class="subjectClass" id="third" name="subjectList[]">
                <option value="" disabled selected>Select your 3rd Interest</option>
                <?php 
                for($j = 4; $j < $itemsSize; $j++){
                  print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
                }
                ?>
              </select>

              <div class="meta section">
              <div id='dupeCourseWarning'>
                You must rank three separate Interests before submitting.
              </div>
              <input type='submit' id='submit' name='formSubmit' value='Submit'/>
              </form>
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
