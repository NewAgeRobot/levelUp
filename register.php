  <?php
ini_set('display_errors', 0); 
error_reporting(E_ALL);
include "connect.php";
if ($_POST['register']){
  if($_POST['username'] && $_POST['password'] && $_POST['year'] && $_POST['email']){
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string(hash("sha512", $_POST['password']));
    $year = ($_POST['year']);
    $email = mysql_real_escape_string($_POST['email']);
    $check = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `Username`='$username'"));
    if ($check != '0'){
      die("That username already exists! Try another");
    }
    if(!ctype_alnum($username)){
      die("Username can only contain letters");
    }
    if(strlen($username) > 20){
      die("Username can't be more than 20 characters, sorry");
    }
    $salt = hash("sha512", rand() . rand() . rand());
    mysql_query("INSERT INTO `users` (`Username`, `Password`, `Year`, `Email`, `Salt`) VALUES ('$username', '$password', '$year', '$email', '$salt')");
    mysql_query("INSERT INTO `subjectsTable` (`Email`) VALUES ('$email')");
    mysql_query("INSERT INTO `storedInterests` (`Email`) VALUES ('$email')");
    setcookie("c_user", hash("sha512", $username), time() + 24 * 60 * 60, "/");
    setcookie("c_salt", $salt, time() + 24 * 60 * 60, "/");
    header('Location: subjectChoice.php');
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

  <title>Register</title>
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
<?php echo
"<nav><table><tr>
  <td><a href='login.php'>Log in</a></td>
  </tr></table></nav><br />"
?>

  <form action="" method="post">
    username: <input type="text" name="username"><br />
    password: <input type="password" name="password"><br />
    year: <input type="number" name="year"><br />
    email: <input type="text" name="email"><br />
    <input type="submit" name="register" value="Register">
  </form>
  <a href="logout.php">Logout</a>



  
</body>
</html>