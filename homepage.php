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
  <!-- <link rel="stylesheet" href="css/normalize.css"> -->
  <!-- <link rel="stylesheet" href="css/skeleton.css"> -->
  <!-- <link rel="stylesheet" href="css/custom.css"> -->
  <link rel="stylesheet" href="css/clndr.css">
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.js"></script>

  <script language="Javascript" type="text/javascript">

       var eventsArray = [
        { date: moment().format('2015-11-05'), title: 'CAO online application & Change of Course Choices facilities open.' },
        { date: moment().format('2015-1-20'), title: 'CAO - Apply before this date to avail of discounted fee of €25' },
        { date: moment().format('2015-02-01'), title: 'CAO - Normal closing date for applications - 5:15pm' },
        { date: moment().format('2015-02-05'), title: 'CAO - Change of Course Choices online facility opens - €10 fee' },
        { date: moment().format('2015-02-15'), title: 'CAO - All Paper Applicants should have received a Statement of Course Choices by this date' },

        { date: moment().format('2015-02-28'), title: 'HPAT Test -  Undergraduate Entry to Medicine' },
        { date: moment().format('2015-03-01'), title: 'CAO - Change of Course Choices CLOSES - 5:15pm' },
        { date: moment().format('2015-03-01'), title: 'CAO - Final completion date for online HEAR/DARE forms - 5:15pm' },
        { date: moment().format('2015-04-01'), title: 'CAO - Latest date for HEAR/DARE supporting documentation to arrive - 5:15pm' },
        { date: moment().format('2015-05-01'), title: 'CAO - Last day for LATE applications - 5:15pm' },

        { date: moment().format('2015-05-05'), title: 'CAO - Online Change of Mind facility opens (free)' },
        { date: moment().format('2015-05-15'), title: 'CAO - All LATE Paper Applicants should have received a Statement of Course Choices by this date' },
        { date: moment().format('2015-05-31'), title: 'CAO - All applicants should have received a Statement of Application Record by this date' },
        { date: moment().format('2015-07-01'), title: 'CAO - Change of Mind  closes - 5:15pm' },
        { date: moment().format('2015-08-15'), title: 'Leaving Certificate results issued' },

        { date: moment().format('2015-08-17'), title: 'CAO - Round 1 offers issued' },
        { date: moment().format('2015-08-24'), title: 'CAO - Round 1 acceptance closing date - 5:15pm' },
        { date: moment().format('2015-08-26'), title: 'CAO - Round 2 offers issued' },
        { date: moment().format('2015-09-02'), title: 'CAO - Round 2 acceptance closing date - 5:15pm' }
      ];

      </script>

  <script type="text/javascript" src="js/clndr.js"></script>

  <script src="js/clndrTest.js"></script>

  <script type="text/javascript">
  // $(document).ready(function () {
  //   $('#testCalendar').clndr();
  // });
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
           <!-- <div class="twelve column" id="testCalendar"></div> -->
           <div id="pass-in-events" class="cal1"></div>
          </div>
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
  <!-- End Document
  ––––––––––––––––––––––––––––––––––––––––––––––––––-->
</body>
</html>