<?php
include "connect.php";
include "algor.php";
//add redirect for whether they have already entered their feedback for the week or hide tables and show warning and when they can do it again.
if($logged == false){
  header('Location: index.html');
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
  header('Location: index.html');
};


// $prompts = mysql_fetch_array(mysql_query("SELECT * FROM feedbackPrompts WHERE `Subjects` = '1' ORDER BY rand() 
//  LIMIT 1"));
// echo $prompts['Prompt'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
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
  <style type="text/css">
    canvas {
      display: block;
    }

    input {
      width: 200px;
    }

    body {
    }
  </style>

  <title>Interest Feedback</title>
</head>
<body>
  <ul id="menu" >
    <li class="sub"><a href="index.html">Home</a>
    </li>
    <li class="sub"><a href="subjectFeedback.php">Subject Feedback</a>
    </li>
    <li class="sub"><a href="interestFeedback.php">Interest Feedback</a>
    </li>
    <li class="sub"><a href="statistics.php">Statistics</a>
    </li>
    <li class="sub"><a href="">Testimonials</a>
    </li>
    <li class="sub"><a href="exploreInterests.php">Explore Courses</a>
    </li>
    <li class="sub"><a href="savedCourses.php">Saved Courses</a>
    </li>
    <li class="sub"><a href="logout.php">Log Out</a>
    </li>
  </ul>

  <form action='' method='post' name='subjectFavourites'>
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
</body>
</html>