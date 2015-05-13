<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}
$userEmail = $user['Email'];
$saveCheck = mysql_query("SELECT * FROM savedCourses WHERE `Email` = '$userEmail'");
$num_rows = mysql_num_rows($saveCheck);
for($i = 0; $array[$i] = mysql_fetch_assoc($saveCheck); $i++);
array_pop($array);
$numCourses = sizeOf($array);
// print_r($array[2]);




$testArray = array();
foreach ($array as $key => $row)
{
    $testArray[$key] = $row['Position'];
}
array_multisort($testArray, SORT_ASC, $array);

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
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="js/test.js"></script>
  <script language="Javascript" type="text/javascript">
$(document).ready(function(){
    $('.ajax').show();
    $(".ajax").click(function() {
      var position = $(this).closest('tr').find('td:eq(0)').text();
      var code = $(".jsCourseCode").eq(position).text();
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
          <h4>These are where courses you save while exploring are listed. Get exploring! </h4>
	<?php
	if(!$numCourses){
	echo "You have yet to save any courses.";
}
else{
	echo "<table id='sort' class='grid'>
  <thead><tr><th>No.</th><th>Course Code</th><th>Course Title</th><th>Level</th><th>Course Points</th><th>Institute</th><th>More Information</th><th>Delete?</th></tr>
  </thead>
  <tbody>";
 
	//might have to save amount of courses they've saved
	for($counter = 0; $counter < $num_rows; $counter++){
		print_r("<tr><td class='index'>" . $counter . "</td><td class='jsCourseCode'>" . $array[$counter]['CourseCode'] . "</td><td>" . $array[$counter]['CourseTitle'] . "</td><td>" . $array[$counter]['CourseLevel'] . "</td><td>" . $array[$counter]['CoursePoints'] . "</td><td>" . $array[$counter]['CourseCollege'] . "</td><td><a href='" . $array[$counter]['CourseURL'] . "' target='_blank'><font color='lightblue'>Find out more</font></a></td><td><a href='javascript:{}' class='ajax'><font color='red'>Delete Course</font></a></td></tr>"); //not working
	}
	echo "</tbody></table>";
  echo "<button id='reorder'>Reorder Courses</button><a href='javascript:{}' class='reorderDone'><button>Save Order</button></a>";
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