<?php
include "connect.php";
include "algor.php";
if($logged == true){
	echo "<h1>you're logged in as " . $user['Username'] . "!</h1>";
}
else {
	header('Location: /');
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/interactions.js"></script>

  <title>test</title>
</head>
<body>
<?php 
echo
 	"<h1>Name: " . $user['Username'] . "</h1><br />
	<h1>Year: " . $user['Year'] . "</h1><br />
	<h1>Email: " . $user['Email'] . "</h1><br />";



if(!empty($user['Avatar'])){
	die("<img src='" . $user['Avatar'] . "'>");
}
else{
	echo "You should choose an avatar! <a href='avatarChoice.php'>Click here</a>";
}
?>
</body>
</html>