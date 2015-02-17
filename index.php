<?php
include "connect.php";
include "algor.php";
if($logged == true){
  echo "<h1>you're logged in as " . $user['Username'] . "!</h1>";
}
else{
	echo "<h1>You're not logged in</h1>";
}
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

  <title>test</title>
</head>
<body>
<a href="login.php">Log in</a>
<a href="logout.php">Log out</a>
<a href="register.php">Register</a>
<a href="restrictTest.php">Restriction Test</a>
</body>
</html>