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
$result = mysql_query("SELECT * FROM subjectsTable WHERE `Email` = '$userEmail'");

$items[] = array();


while($row = mysql_fetch_assoc($result)) {
  foreach ($row as $col => $val) {
    if ($val == 1) {
      $items[] = $col;
    }
  }
  $itemsSize = count($items);
}


if(isset($_POST['formSubmit'])){
  $currentDay = date("Y/m/d"); //Maybe change to week number?
  $first = $_POST['subjectList'][0];
  $second = $_POST['subjectList'][1];
  $third = $_POST['subjectList'][2];
  $fourth = $_POST['subjectList'][3];
  $fifth = $_POST['subjectList'][4];
  $sixth = $_POST['subjectList'][5];
  mysql_query("INSERT INTO `subjectFeedback` (`Date`, `Email`, `$first`, `$second`, `$third`, `$fourth`, `$fifth`, `$sixth`) VALUES ('$currentDay', '$userEmail', '6', '5', '4', '3', '2', '1')");
  header('Location: statistics.php');
};


$prompts = mysql_fetch_array(mysql_query("SELECT * FROM feedbackPrompts WHERE `Subjects` = '1' ORDER BY rand() 
 LIMIT 1"));
 ?>
 <html lang="en">
 <head>

  <meta charset="utf-8" />
  <title>LevelUp</title>

  <meta name="DC.creator" content="Ethan Marcotte - http://ethanmarcotte.com" />
  <meta name="robots" content="index, follow" />
  <meta name="description" content="A demonstration site for Ethan Marcotte's book, RESPONSIVE WEB DESIGN" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="css/robotCss.css" media="screen, projection" />

  <script src="http://use.typekit.com/daz7uli.js"></script>
  <script>try{Typekit.load();}catch(e){}</script>
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  <link rel="stylesheet" href="css/jquery-mobile.css" />
  <script src="js/jquery-mobile.js"></script>
  <link rel="stylesheet" href="css/dropit.css" />
  <script src="js/dropit.js"></script>
  <script src="js/redirect.js"></script>


  <script type="text/javascript">
    $(document).ready(function() {
      $('.menu').dropit();
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
      $(".subjectClass").change(function() {
        arr = [];
        duplicates = [];
        hash = [];
        $first = $("#first").val();
        $second = $("#second").val();
        $third = $("#third").val();
        $fourth = $("#fourth").val();
        $fifth = $("#fifth").val();
        $sixth = $("#sixth").val();

        arr.push($first, $second, $third, $fourth, $fifth, $sixth);
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
        }
        else{
          $("#submit").removeAttr("disabled");
        }
      });
    }

    $(document).ready(main);

  </script>
</head>

<body>

  <div class="site">

    <div class="page">

      
      <h1 class="logo"><a href="homepage.php"><img src="images/header-logo.png" /></a></h1>

      <ul class="nav nav-primary bigMenu">
        <li id="nav-explore" class="first"><a href="exploreInterests.php" data-ajax='false'>Explore</a></li>
        <li id="nav-feedback" class="second"><a href="interestFeedback.php" data-ajax='false'>Weekly Feedback</a></li>
        <li id="nav-stats" class="third"><a href="statistics.php" data-ajax='false'>Statistics</a></li>
        <li id="nav-test" class="fourth"><a href="testimonials.php" data-ajax='false'>Testimonials</a></li>
        <li id="nav-saved" class="fifth"><a href="savedCourses.php" data-ajax='false'>Saved Courses</a></li>
        <li id="nav-log" class="sixth"><a href="logout.php" data-ajax='false'>Log Out</a></li>
      </ul><!-- /end ul#nav-primary.nav -->

      
      <ul class="nav nav-primary smallMenu">
        <img src="images/text-logo.png"></li><ul class="menu">
        <li>
          <a href="#">&#9776; Menu</a>
          <ul>
            <li><a href="exploreInterests.php" data-ajax='false'><img src="images/explore-icon.png">Explore</a></li>
            <li><a href="interestFeedback.php" data-ajax='false'><img src="images/feedback-icon.png">Weekly Feedback</a></li>
            <li><a href="statistics.php" data-ajax='false'><img src="images/stats-icon.png">Statistics</a></li>
            <li><a href="testimonials.php" data-ajax='false'><img src="images/testimonials-icon.png">Testimonials</a></li>
            <li><a href="savedCourses.php" data-ajax='false'><img src="images/saved-icon.png">Saved Courses</a></li>
            <li><a href="logout.php" data-ajax='false'><img src="images/account-icon.png">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </ul><!-- /end ul#nav-primary.nav -->


    
    <hr />

    <div class="blog section">
      <h1 class="lede"><?php echo $prompts['Prompt']; ?></h4>
      </h1>

      <div class="main">
        <div class="article">
          <div class="header">
            <h1 class="title">Rank your six favourite subjects to keep track of your enjoyment. Check out the statistics page to see what you liked all year round!</h1>
          </div><!-- /end .header -->

          <div class="intro">

            <form action='' method='post' name='subjectFavourites' class = 'formText' data-ajax='false'>
              <select class="subjectClass" id="first" name="subjectList[]">
                <?php 
                for($j = 1; $j < $itemsSize; $j++){
                  print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
                }
                ?>
              </select>
              <select class="subjectClass" id="second" name="subjectList[]">
                <?php 
                for($j = 1; $j < $itemsSize; $j++){
                  print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
                }
                ?>
              </select>
              <select class="subjectClass" id="third" name="subjectList[]">
                <?php 
                for($j = 1; $j < $itemsSize; $j++){
                  print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
                }
                ?>
              </select>
              <select class="subjectClass" id="fourth" name="subjectList[]">
                <?php 
                for($j = 1; $j < $itemsSize; $j++){
                  print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
                }
                ?>
              </select>
              <select class="subjectClass" id="fifth" name="subjectList[]">
                <?php 
                for($j = 1; $j < $itemsSize; $j++){
                  print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
                }
                ?>
              </select>
              <select class="subjectClass" id="sixth" name="subjectList[]">
                <?php 
                for($j = 1; $j < $itemsSize; $j++){
                  print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
                }
                ?>
              </select>

              <div class="meta section">
                
                <input type='submit' id='submit' name='formSubmit' value='Submit' disabled/>
              </form>
            </div> <!-- /end .meta.section -->
          </div><!-- /end .article -->
        </div><!-- /end .main -->
      </div><!-- /end .blog.section -->

      <div id="footer">
      <!-- <p>Images &copy; their respective copyright holders.</p>

      <p>The design and code is &copy; 2014 <a href="http://unstoppablerobotninja.com/">Ethan Marcotte</a>, supporting his book <cite><a href="http://www.abookapart.com/products/responsive-web-design">Responsive Web Design</a></cite>.</p>

      <p>Beep boop beep.</p> -->
    </div><!-- /end #footer -->
  </div><!-- /end .page -->

</div><!-- /end .site -->

</body>
</html>
