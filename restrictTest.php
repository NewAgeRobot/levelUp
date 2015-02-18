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
  <script src="js/interactions.js"></script>

  <title>test</title>
</head>
<body>
<?php 
echo
 	"<h1>Name: " . $user['Username'] . "</h1><br />
	<h1>Year: " . $user['Year'] . "</h1><br />
	<h1>Email: " . $user['Email'] . "</h1><br />";

	echo 
	"<form action='' method='post'>
		Jon: <img src='avatars/1.jpg'><input type='checkbox' name='avatar' class='avatarChoice' value='1' id='checkbox1' /> <br />
		Benjin: <img src='avatars/2.jpg'><input type='checkbox' name='avatar' class='avatarChoice' value='2' id='checkbox2' /> <br />
		Eddard: <img src='avatars/3.jpg'> <input type='checkbox' name='avatar' class='avatarChoice' value='3' id='checkbox3' /> <br />
		Cersei: <img src='avatars/4.jpg'> <input type='checkbox' name='avatar' class='avatarChoice' value='4' id='checkbox4' /> <br />
	<input type='submit' name='formSubmit' value='Submit' />
	</form>";

if(!empty($user['Avatar'])){
	die("<img src='" . $user['Avatar'] . "'>");
}
else{
	echo "You should choose an avatar! <a href='avatarChoice.php'>Click here</a>";
}
?>
</body>
</html>