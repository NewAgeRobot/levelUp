<?php
include "connect.php";
include "algor.php";
if($logged == false){
  header('Location: index.php');
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
};
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
      <nav><a href="savedCourses.php">Saved Courses</a>&nbsp;&nbsp;<a href="exploreInterests.php">Explore Courses</a>&nbsp;&nbsp;<a href="interestFeedback.php">Interest Feedback</a>&nbsp;&nbsp;<a href="subjectFeedback.php">Subject Feedback</a>&nbsp;&nbsp;<a href="statistics.php">Statistics</a>&nbsp;&nbsp;<a href="logout.php">Log out</a></nav>
    </div>

    <div class="section hero">
      <div class="container">
        <div class="row">
          <div class="offset-by-one column">
          <h4>Pick your three favourite interests of this week.Remember to check the statistics page to see how your interests have changed over time!</h4>
          </div>
          <div class="offset-by-five column">
            <form action='' method='post' name='subjectFavourites' class='formText'>
    <select class="subjectClass" id="first" name="subjectList[]">
      <?php 
      for($j = 4; $j < $itemsSize; $j++){
        print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
      }
      ?>
    </select>
    <br />
    <br />
    <select class="subjectClass" id="second" name="subjectList[]">
      <?php 
      for($j = 4; $j < $itemsSize; $j++){
        print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
      }
      ?>
    </select>
    <br />
    <br />
    <select class="subjectClass" id="third" name="subjectList[]">
      <?php 
      for($j = 4; $j < $itemsSize; $j++){
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