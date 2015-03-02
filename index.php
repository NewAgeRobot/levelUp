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
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

  <title>test</title>
</head>
<body>
<?php echo
"<nav><table><tr>
  <td><a href='login.php'>Log in</a></td>
  <td><a href='logout.php'>Log out</a></td>
  <td><a href='register.php'>Register</a></td>
  <td><a href='restrictTest.php'>Restriction Test</a></td>
  </tr></table></nav><br />"
?>
<img src="http://www.reactiongifs.com/r/2013/05/Ron-Paul_Its-Happening1.gif"> <br />

</body>
</html>