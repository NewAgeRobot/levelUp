<?php
/*
badges for amount of courses saved
*/
include "connect.php";
include "algor.php";
if($logged == false){
  header('Location: index.php');
}
$userEmail = $user['Email'];
$amountSaved = $user['CoursesSaved'];
?>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Level Up</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/clndr.css">
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.js"></script>

  <script type="text/javascript" src="js/clndr.js"></script>

  <script type="text/javascript">
  $(document).ready(function () {
    $('#testCalendar').clndr();
  });
  </script>
  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

    <!-- Primary Page Layout
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->



    <div id="navigationBar">
      <div id="logo"><a href="index.php"><img src="images/header-logo.png"></a></div>
      <nav><a href="savedCourses.php">Saved Courses</a>&nbsp;&nbsp;<a href="exploreInterests.php">Explore Courses</a>&nbsp;&nbsp;<a href="interestFeedback.php">Interest Feedback</a>&nbsp;&nbsp;<a href="subjectFeedback.php">Subject Feedback</a>&nbsp;&nbsp;<a href="statistics.php">Statistics</a>&nbsp;&nbsp;<a href="logout.php">Log out</a></nav>
    </div>

    <div class="section">
      <div class="container">
        <div class="row">
     <!--      <div class="twelve column">
            <img class="resizeImage" src="images/homepage.jpg">
          </div> -->
          <div class="twelve column">
           <div class="twelve column" id="testCalendar"></div>
            <div class="twelve column">
              <?php
              if ($amountSaved > 0){
                $oneBadge = true;
                echo "<img src='images/savedCourse1.png' height='50px' width='50px'>";
              }
              if ($amountSaved >= 5){
                $fiveBadge = true;
                echo "<img src='images/savedCourse2.png' height='50px' width='50px'>";
              }
              if ($amountSaved >= 10){
                $tenBadge = true;
                echo "<img src='images/savedCourse3.png' height='50px' width='50px'>";
              }
              ?>
            </div>
          </div>
        </div>
      </div>
  <!-- End Document
  ––––––––––––––––––––––––––––––––––––––––––––––––––-->
</body>
</html>