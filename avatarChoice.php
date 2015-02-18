<?php
include "connect.php";
include "algor.php";
if($logged == true){
	echo "<h1>you're logged in as " . $user['Username'] . "!</h1>";
}
else {
	header('Location: /');
}
//$avatarChosen = mysql_fetch_array(mysql_query("SELECT `Avatar` FROM `users` WHERE `Salt` = '$csalt'"));
//if($avatarChosen != 0){



if(!empty($user['Avatar'])){
	die("<img src='" . $user['Avatar'] . "'>");
}
else{
	echo "No Avatar selected yet! Chooooooose!";
}


if(isset($_POST['avatar'])) 
{
	$avatar = ($_POST['avatar']);
	$avatarLink = "avatars/" . $avatar . ".jpg"; 
	mysql_query("UPDATE `users` SET `Avatar` = '$avatarLink' WHERE `Salt` = '$csalt'");
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
	"<form action='' method='post'>
		Jon: <img src='avatars/1.jpg'><input type='checkbox' name='avatar' class='avatarChoice' value='1' id='checkbox1' /> <br />
		Benjin: <img src='avatars/2.jpg'><input type='checkbox' name='avatar' class='avatarChoice' value='2' id='checkbox2' /> <br />
		Eddard: <img src='avatars/3.jpg'> <input type='checkbox' name='avatar' class='avatarChoice' value='3' id='checkbox3' /> <br />
		Cersei: <img src='avatars/4.jpg'> <input type='checkbox' name='avatar' class='avatarChoice' value='4' id='checkbox4' /> <br />
	<input type='submit' name='formSubmit' value='Submit' />
	</form>";
?>
</body>
</html>