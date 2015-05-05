<?php
ini_set('display_errors', 0); 
error_reporting(E_ALL);
include "connect.php";
include "algor.php";
if($logged == true){
	die("You are already logged in!");
	echo "<h1>you're logged in!</h1>";
}
if ($_POST['login']){
	if($_POST['username'] && $_POST['password']){
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string(hash("sha512", $_POST['password']));
		$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `Username`='$username'")); //get user by their email
		if($user == '0'){
			die("That account doesn't exist, sorry!");
		}
		if( $user['Password'] != $password){
			die("Incorrect password, sorry brah");
		}
		$salt = hash("sha512", rand() . rand() . rand());
		setcookie("c_user", hash("sha512", $username), time() + 24 * 60 * 60, "/");
		setcookie("c_salt", $salt, time() + 24 * 60 * 60, "/");
		$userID = $user['ID'];
		mysql_query("UPDATE `users` SET `Salt` = '$salt' WHERE `ID`='$userID'");
		header('Location: index.html');
		//die("You are now logged in as $username!");
	}
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
  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

    <!-- Primary Page Layout
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->



    <div id="navigationBar">
      <div id="logo"><img src="images/header-logo.png"></div>
      <nav><a href="savedCourses.php">Saved Courses</a>&nbsp;&nbsp;<a href="exploreInterests.php">Explore Courses</a>&nbsp;&nbsp;<a href="interestFeedback.php">Interest Feedback</a>&nbsp;&nbsp;<a href="subjectFeedback.php">Subject Feedback</a>&nbsp;&nbsp;<a href="statistics.php">Statistics</a></nav>
    </div>

    <div class="section hero">
      <div class="container">
        <div class="row">
          <div class="offset-by-five column">
 	<form action="" method="post">
	username:<input type="text" name="username" class="formText"><br />
	password: <input type="password" name="password" class="formText"><br />
	<input type="submit" name="login" value="Log in">
	</form>
          </div>
        </div>
      </div>
    </div>
  <!-- End Document
  ––––––––––––––––––––––––––––––––––––––––––––––––––-->
</body>
</html>