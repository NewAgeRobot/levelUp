<?php
include "connect.php";
include "algor.php";
//add redirect for whether they have already entered their feedback for the week or hide tables and show warning and when they can do it again.
if($logged == false){
  header('Location: index.html');
}
$userEmail = $user['Email'];
$result = mysql_query("SELECT * FROM subjectsTable WHERE `Email` = '$userEmail'");

//adding their chosen subjects to an array
// $f = 0;
$items[] = array();


while($row = mysql_fetch_assoc($result)) {
  foreach ($row as $col => $val) {
    // if ($f++ < 2) continue;
    if ($val == 1) {
      $items[] = $col;
    }
  }
  $itemsSize = count($items);
}


if(isset($_POST['formSubmit'])){
  $currentDay = date("Y/m/d"); //Maybe change to week number?
  //$subAmount = count($_POST['subjectList']);
  //echo $subAmount;
  // for($k = 0; $k < 6;$k++){
  //   //$currentSub = $_POST['subjectList'][$k];
  //   //upload here to find the relevant columns and assign a grade to them. Bam, done
  //   echo $currentSub;
  // }
  $first = $_POST['subjectList'][0];
  $second = $_POST['subjectList'][1];
  $third = $_POST['subjectList'][2];
  $fourth = $_POST['subjectList'][3];
  $fifth = $_POST['subjectList'][4];
  $sixth = $_POST['subjectList'][5];
  // echo $first;
  mysql_query("INSERT INTO `subjectFeedback` (`Date`, `Email`, `$first`, `$second`, `$third`, `$fourth`, `$fifth`, `$sixth`) VALUES ('$currentDay', '$userEmail', '6', '5', '4', '3', '2', '1')");
};


$prompts = mysql_fetch_array(mysql_query("SELECT * FROM feedbackPrompts WHERE `Subjects` = '1' ORDER BY rand() 
   LIMIT 1"));
// echo $prompts['Prompt'];


//query to grab each of the subjects that the user has chosen. 
//Replace the hard coded ones with the php variables
//check if submit button is passing the form or should it be placed inside form/outside form
//javascript is checking for dupes etc. so it will need to trigger the php - can maybe get around this by greying out the submit until there are no dupes?
//javascript might still have to run ajax call to send the subject names in order.
//names are used to designate which subject is being referred to(the column) and the order refers to what amount of "points" gets added to that subject so the data being stored under each subject column is actually a number
//then institute a lockout of a week I guess
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

//       $(".subjectClass").change(function() {
//        $first = $("#first").val();
//        $second = $("#second").val();
//        $third = $("#third").val();
//        $fourth = $("#fourth").val();
//        $fifth = $("#fifth").val();
//        $sixth = $("#sixth").val();
//        $("#submit").removeAttr("disabled");
//   //$("#submit").attr("disabled", "disabled");
// });

//$("#submit").click(function() {
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
//alert(arr);
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
//alert("Duplicate entries detected.");
}
else{
  $("#submit").removeAttr("disabled");
//alert("Your favourite subjects are: " + $first + ", " + $second + ", " + $third + ", " + $fourth + ", " + $fifth + ", " + $sixth);
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

<title>Subject Feedback</title>
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


<?php echo $prompts['Prompt']; ?>
  <form action='' method='post' name='subjectFavourites'>
    <select class="subjectClass" id="first" name="subjectList[]">
      <?php 
      for($j = 1; $j < $itemsSize; $j++){
        print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
      }
      ?>
<!--<option value="Maths">Maths</option>
<option value="English">English</option>
<option value="Irish">Irish</option>
<option value="History">History</option>
<option value="Geography">Geography</option>
<option value="Home Economics">Home Economics</option> -->
</select>
<br />
<br />
<select class="subjectClass" id="second" name="subjectList[]">
  <?php 
  for($j = 1; $j < $itemsSize; $j++){
    print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
  }
  ?>
<!--<option value="Maths">Maths</option>
<option value="English">English</option>
<option value="Irish">Irish</option>
<option value="History">History</option>
<option value="Geography">Geography</option>
<option value="Home Economics">Home Economics</option>-->
</select>
<br />
<br />
<select class="subjectClass" id="third" name="subjectList[]">
  <?php 
  for($j = 1; $j < $itemsSize; $j++){
    print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
  }
  ?>
<!--<option value="Maths">Maths</option>
<option value="English">English</option>
<option value="Irish">Irish</option>
<option value="History">History</option>
<option value="Geography">Geography</option>
<option value="Home Economics">Home Economics</option>-->
</select>
<br />
<br />
<select class="subjectClass" id="fourth" name="subjectList[]">
  <?php 
  for($j = 1; $j < $itemsSize; $j++){
    print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
  }
  ?>
<!--<option value="Maths">Maths</option>
<option value="English">English</option>
<option value="Irish">Irish</option>
<option value="History">History</option>
<option value="Geography">Geography</option>
<option value="Home Economics">Home Economics</option>-->
</select>
<br />
<br />
<select class="subjectClass" id="fifth" name="subjectList[]">
  <?php 
  for($j = 1; $j < $itemsSize; $j++){
    print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
  }
  ?>
<!--<option value="Maths">Maths</option>
<option value="English">English</option>
<option value="Irish">Irish</option>
<option value="History">History</option>
<option value="Geography">Geography</option>
<option value="Home Economics">Home Economics</option>-->
</select>
<br />
<br />
<select class="subjectClass" id="sixth" name="subjectList[]">
  <?php 
  for($j = 1; $j < $itemsSize; $j++){
    print_r("<option value='" . $items[$j] . "'>" . $items[$j] . "</option>");
  }
  ?>
<!--<option value="Maths">Maths</option>
<option value="English">English</option>
<option value="Irish">Irish</option>
<option value="History">History</option>
<option value="Geography">Geography</option>
<option value="Home Economics">Home Economics</option>-->
</select>
<br />
<br />
<input type='submit' id='submit' name='formSubmit' value='Submit' disabled/>
</form>
</body>
</html>