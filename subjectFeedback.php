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
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
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
  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

    <!-- Primary Page Layout
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->



    <div id="navigationBar">
      <div id="logo"><a href="index.php"><img src="images/header-logo.png"></a></div>
      <nav><a href="savedCourses.php">Saved Courses</a>&nbsp;&nbsp;<a href="exploreInterests.php">Explore Courses</a>&nbsp;&nbsp;<a href="interestFeedback.php">Weekly Feedback</a>&nbsp;&nbsp;<a href="statistics.php">Statistics</a>&nbsp;&nbsp;<a href="logout.php">Log out</a></nav>
    </div>

    <div class="section hero">
      <div class="container">
        <div class="row">
          <div class="offset-by-one column">
          <h4>Rank your six favourite subjects to keep track of your enjoyment. Check out the statistics page to see what you liked all year round!</h4>
          <?php echo $prompts['Prompt']; ?>
          </div>
          <div class="offset-by-five column">
            
            <form action='' method='post' name='subjectFavourites' class = 'formText'>
              <select class="subjectClass" id="first" name="subjectList[]">
                <?php 
                for($j = 1; $j < $itemsSize; $j++){
                  print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
                }
                ?>
              </select>
              <br />
              <br />
              <select class="subjectClass" id="second" name="subjectList[]">
                <?php 
                for($j = 1; $j < $itemsSize; $j++){
                  print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
                }
                ?>
              </select>
              <br />
              <br />
              <select class="subjectClass" id="third" name="subjectList[]">
                <?php 
                for($j = 1; $j < $itemsSize; $j++){
                  print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
                }
                ?>
              </select>
              <br />
              <br />
              <select class="subjectClass" id="fourth" name="subjectList[]">
                <?php 
                for($j = 1; $j < $itemsSize; $j++){
                  print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
                }
                ?>
              </select>
              <br />
              <br />
              <select class="subjectClass" id="fifth" name="subjectList[]">
                <?php 
                for($j = 1; $j < $itemsSize; $j++){
                  print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
                }
                ?>
              </select>
              <br />
              <br />
              <select class="subjectClass" id="sixth" name="subjectList[]">
                <?php 
                for($j = 1; $j < $itemsSize; $j++){
                  print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
                }
                ?>
              </select>
              <br />
              <br />
              <input type='submit' id='submit' name='formSubmit' value='Submit' disabled/>
            </form>
          </div>
        </div>
      </div>
    </div>
  <!-- End Document
  ––––––––––––––––––––––––––––––––––––––––––––––––––-->
</body>
</html>