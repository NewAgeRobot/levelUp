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
		header('Location: restrictTest.php');
		//die("You are now logged in as $username!");
	}
};
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
<title>Login</title>
<head>
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
<?php echo
"<nav><table><tr>
  <td><a href='register.php'>Register</a></td>
  </tr></table></nav><br />"
?>

	<form action="" method="post">
	username: <input type="text" name="username"><br />
	password: <input type="password" name="password"><br />
	<input type="submit" name="login" value="Log in">
	</form>
</body>
</html>