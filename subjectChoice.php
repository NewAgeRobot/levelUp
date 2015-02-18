<?php
include "connect.php";
include "algor.php";
if($logged == true){
	echo "<h1>you're logged in as " . $user['Username'] . "!</h1>";
}
else {
	header('Location: /');
}

if(!empty($_POST['subject_list']))
{
	
		//$choices = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `Salt`='$csalt'")); //get user by their email
		//if statements are useless because it's looping the same value through them all initially because they're all empty
		//within the slots filled - run through and see if the subject already exists in the table
		if(empty($user['Subject1'])){
			foreach($_POST['subject_list'] as $check) {
				if($user['Subject1'] != $check && $user['Subject2'] != $check && $user['Subject3'] != $check && $user['Subject4'] != $check){
					mysql_query("UPDATE `users` SET `Subject1` = '$check' WHERE `Salt`='$csalt'");
					echo "fart1";
					continue;
				}
			}
		}
		if(empty($user['Subject2'])){
			foreach($_POST['subject_list'] as $check) {
				if($user['Subject1'] != $check && $user['Subject2'] != $check && $user['Subject3'] != $check && $user['Subject4'] != $check){
					mysql_query("UPDATE `users` SET `Subject2` = '$check' WHERE `Salt`='$csalt'");
					echo "fart2";
					continue;
				}
			}
		}
		if(empty($user['Subject3'])){
			foreach($_POST['subject_list'] as $check) {
				if($user['Subject1'] != $check && $user['Subject2'] != $check && $user['Subject3'] != $check && $user['Subject4'] != $check){
					mysql_query("UPDATE `users` SET `Subject3` = '$check' WHERE `Salt`='$csalt'");
					echo "fart3";
					continue;
				}
			}
		}
		if(empty($user['Subject4'])){
			foreach($_POST['subject_list'] as $check) {
				if($user['Subject1'] != $check && $user['Subject2'] != $check && $user['Subject3'] != $check && $user['Subject4'] != $check){
					mysql_query("UPDATE `users` SET `Subject4` = '$check' WHERE `Salt`='$csalt'");
					echo "fart4";
					continue;
				}
			}
		}
		/*if(empty($user['Subject2'])){
			mysql_query("UPDATE `users` SET `Subject2` = '$check' WHERE `Salt`='$csalt'");
			echo "fart2";
		}
		if(empty($user['Subject3'])){
			mysql_query("UPDATE `users` SET `Subject3` = '$check' WHERE `Salt`='$csalt'");
			echo "fart3";
		}
		if(empty($user['Subject4'])){
			mysql_query("UPDATE `users` SET `Subject4` = '$check' WHERE `Salt`='$csalt'");
			echo "fart4";
		}
		else{
			echo "You do all these subjects already! Silly goose";
		}*/
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>test</title>
</head>
<body>
<?php
echo 
	"<form action='' method='post'>
		English: <input type='checkbox' name='subject_list[]' value='English' /> <br />
		Maths: <input type='checkbox' name='subject_list[]' value='Maths' /> <br />
		Irish: <input type='checkbox' name='subject_list[]' value='Irish' /> <br />
		History: <input type='checkbox' name='subject_list[]' value='History' /> <br />
	<input type='submit' name='formSubmit' value='Submit' />
	</form>";
?>

<!--
<form action="test.php" method="post">
<input type="checkbox" name="check_list[]" value="value 1">
<input type="checkbox" name="check_list[]" value="value 2">
<input type="checkbox" name="check_list[]" value="value 3">
<input type="checkbox" name="check_list[]" value="value 4">
<input type="checkbox" name="check_list[]" value="value 5">
<input type="submit" />
</form>
<?php

/*if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
            echo $check; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }
}
*/
?>

-->
</body>
</html>