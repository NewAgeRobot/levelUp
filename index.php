<?php
include "connect.php";
include "algor.php";
// if($logged == true){
//   echo "<h1>you're logged in as " . $user['Username'] . "!</h1>";
// }
// else{
//   echo "<h1>You're not logged in</h1>";
// }


// if (isset($_COOKIE['c_user']) && isset($_COOKIE['c_salt'])) {
//   $userCookie = $_COOKIE['c_salt'];
//   $query="SELECT * FROM users WHERE Salt = '$userCookie'";
//   $results = mysql_query($query);
//   $row = mysql_fetch_array($results);
//   echo "<h1>HELLO THERE, " . $row[1] . "</h1>";
// }
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

  <title>LevelUp</title>
</head>
<body>

  <ul id="menu" >
    <li class="sub"><a href="index.php">Home</a>
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

  <?php
if($logged == true){
  echo "<h1>you're logged in as " . $user['Username'] . "!</h1>";
  echo "You can start logging your enjoyment by going to subject Feedback or Interest Feedback, this will start to be gathered and analysed and you can see the results in Statistics.";
}
else{
  echo "<h1>You're not logged in</h1>
      <nav><table><tr>
      <td><a href='login.php'>Log in</a></td>
      <td><a href='register.php'>Register</a></td>
      </tr></table></nav>";
}
?>




</body>
</html>