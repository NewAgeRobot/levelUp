<?php
include "connect.php";
include "algor.php";
if($logged == true){
	echo "<h1>you're logged in as " . $user['Username'] . "!</h1>";
}
else {
	header('Location: index.php');
}
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/interactions.js"></script>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">

	<title>test</title>
</head>
<body>
	<?php 
	echo
	"<nav><table><tr>
	<td><a href='login.php'>Log in</a></td>
	<td><a href='logout.php'>Log out</a></td>
	<td><a href='register.php'>Register</a></td>
	<td><a href='restrictTest.php'>Restriction Test</a></td>
	<td><a href='subjectChoice.php'>Subject Choice</a></td>";
	if($user['DailyFeedback'] <= $user['SubAmount']){
		echo "<td><a href='journal.php'>Journal</a></td>";
	}
	echo "</tr></table></nav><br />

	<h1>Name: " . $user['Username'] . "</h1><br />";
	if(!empty($user['Avatar'])){
		echo("<img src='" . $user['Avatar'] . "'>");
	}
	else{
		echo "You should choose an avatar! <a href='avatarChoice.php'>Click here</a>";
	}
	echo"<p>Year: " . $user['Year'] . "</p><br />
	<p>Email: " . $user['Email'] . "</p><br />";
	?>
</body>
</html>