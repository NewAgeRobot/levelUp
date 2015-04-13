<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}
//add code for when actually submitted?
if(isset($_POST['avatar'])){
	$avatar = ($_POST['avatar']);
	$avatarLink = "avatars/".$avatar.".jpg"; 
	mysql_query("UPDATE `users` SET `Avatar` = '$avatarLink' WHERE `Salt`='$csalt'");
	header('Location: subjectChoice.php');
}
if(!empty($user['Avatar'])){
	header('Location: restrictTest.php');
}
else{
	echo"No Avatar selected yet! Chooooooose!";
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
	"<form action='' method='post'>
		Jon: <img src='avatars/1.jpg'><input type='checkbox' name='avatar' class='avatarChoice' value='1'/> <br />
		Benjin: <img src='avatars/2.jpg'><input type='checkbox' name='avatar' class='avatarChoice' value='2'/> <br />
		Eddard: <img src='avatars/3.jpg'> <input type='checkbox' name='avatar' class='avatarChoice' value='3'/> <br />
		Cersei: <img src='avatars/4.jpg'> <input type='checkbox' name='avatar' class='avatarChoice' value='4'/> <br />
	<input type='submit' name='formSubmit' value='Submit' />
	</form>";
?>
</body>
</html>