<?php
include "connect.php";
include "algor.php";
if($logged == false){
  header('Location: index.php');
}
$userEmail = $user['Email'];
$result = mysql_query("SELECT * FROM subjectsTable WHERE `Email` = '$userEmail'");

//adding their chosen subjects to an array
$f = 0;
$items[] = array();
while($row = mysql_fetch_assoc($result)) {
  foreach ($row as $col => $val) {
    if ($f++ < 2) continue;
    if ($val == 1) {
      $items[] = $col;
    }
  }
  $itemsSize = count($items)-1;
}
//query to grab each of the subjects that the user has chosen. 
//Replace the hard coded ones with the php variables
//check if submit button is passing the form or should it be placed inside form/outside form
//javascript is checking for dupes etc. so it will need to trigger the php - can maybe get around this by greying out the submit until there are no dupes?
//javascript might still have to run ajax call to send the subject names in order.
//names are used to designate which subject is being referred to(the column) and the order refers to what amount of "points" gets added to that subject so the data being stored under each subject column is actually a number
//then institute a lockout of a week I guess

}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="js/MooTools-Core-1.5.1.js"></script>
  <script type="text/javascript" src="js/moo.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="js/interactions.js"></script>
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <script language="Javascript" type="text/javascript">
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
      $first = $("#first").val();
      $second = $("#second").val();
      $third = $("#third").val();
      $fourth = $("#fourth").val();
      $fifth = $("#fifth").val();
      $sixth = $("#sixth").val();
      $("#submit").removeAttr("disabled");
    //$("#submit").attr("disabled", "disabled");
});

    $("#submit").click(function() {
    //alert($first + " + " + $second + " + " + $third + " + " + $fourth + " + " + $fifth + " + " + $sixth);
    arr = [];
    duplicates = [];
    hash = [];
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
      alert("Duplicate entries detected.");
    }
    else{
      alert("Your favourite subjects are: " + $first + ", " + $second + ", " + $third + ", " + $fourth + ", " + $fifth + ", " + $sixth);
    }
});

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

  <title>test</title>
</head>
<body>
  <form action='' method='post' name='subjectFavourites'>
    <select class="subjectClass" id="first">
      <option value="Maths">Maths</option>
      <option value="English">English</option>
      <option value="Irish">Irish</option>
      <option value="History">History</option>
      <option value="Geography">Geography</option>
      <option value="Home Economics">Home Economics</option>
    </select>
    <br />
    <br />
    <select class="subjectClass" id="second">
      <option value="Maths">Maths</option>
      <option value="English">English</option>
      <option value="Irish">Irish</option>
      <option value="History">History</option>
      <option value="Geography">Geography</option>
      <option value="Home Economics">Home Economics</option>
    </select>
    <br />
    <br />
    <select class="subjectClass" id="third">
      <option value="Maths">Maths</option>
      <option value="English">English</option>
      <option value="Irish">Irish</option>
      <option value="History">History</option>
      <option value="Geography">Geography</option>
      <option value="Home Economics">Home Economics</option>
    </select>
    <br />
    <br />
    <select class="subjectClass" id="fourth">
      <option value="Maths">Maths</option>
      <option value="English">English</option>
      <option value="Irish">Irish</option>
      <option value="History">History</option>
      <option value="Geography">Geography</option>
      <option value="Home Economics">Home Economics</option>
    </select>
    <br />
    <br />
    <select class="subjectClass" id="fifth">
      <option value="Maths">Maths</option>
      <option value="English">English</option>
      <option value="Irish">Irish</option>
      <option value="History">History</option>
      <option value="Geography">Geography</option>
      <option value="Home Economics">Home Economics</option>
    </select>
    <br />
    <br />
    <select class="subjectClass" id="sixth">
      <option value="Maths">Maths</option>
      <option value="English">English</option>
      <option value="Irish">Irish</option>
      <option value="History">History</option>
      <option value="Geography">Geography</option>
      <option value="Home Economics">Home Economics</option>
    </select>
    <br />
    <br />
</form>
<input type='submit' id='submit' name='formSubmit' value='Submit' disabled/>
</body>
</html>