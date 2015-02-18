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
	foreach($_POST['subject_list'] as $check) {
		echo "chosen subjects are: " . $check . "<br />";
	}
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