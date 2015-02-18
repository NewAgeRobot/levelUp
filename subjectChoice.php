<?php
include "connect.php";
include "algor.php";
if($logged == true){
	echo "<h1>you're logged in as " . $user['Username'] . "!</h1>";
}
else {
	header('Location: /');
}

if(isset($_POST['formSubmit'])){
	if(!empty($_POST['subject_list'])){
		if(empty($user['Subject1'])){
			$subject1 = $_POST['subject_list'][0];
			mysql_query("UPDATE `users` SET `Subject1` = '$subject1' WHERE `Salt`='$csalt'");
		}
		if(empty($user['Subject2'])){
			$subject2 = $_POST['subject_list'][1];
			mysql_query("UPDATE `users` SET `Subject2` = '$subject2' WHERE `Salt`='$csalt'");
		}
		if(empty($user['Subject3'])){
			$subject3 = $_POST['subject_list'][2];
			mysql_query("UPDATE `users` SET `Subject3` = '$subject3' WHERE `Salt`='$csalt'");
		}
		if(empty($user['Subject4'])){
			$subject4 = $_POST['subject_list'][3];
			mysql_query("UPDATE `users` SET `Subject4` = '$subject4' WHERE `Salt`='$csalt'");
		}
		if(empty($user['Subject5'])){
			$subject5 = $_POST['subject_list'][4];
			mysql_query("UPDATE `users` SET `Subject5` = '$subject5' WHERE `Salt`='$csalt'");
		}
		if(empty($user['Subject6'])){
			$subject6 = $_POST['subject_list'][5];
			mysql_query("UPDATE `users` SET `Subject6` = '$subject6' WHERE `Salt`='$csalt'");
		}
		if(empty($user['Subject7'])){
			$subject7 = $_POST['subject_list'][6];
			mysql_query("UPDATE `users` SET `Subject7` = '$subject7' WHERE `Salt`='$csalt'");
		}
		if(empty($user['Subject8'])){
			$subject8 = $_POST['subject_list'][7];
			mysql_query("UPDATE `users` SET `Subject8` = '$subject8' WHERE `Salt`='$csalt'");
		}
	}
	else{
		echo "already entered";
	}
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
	"<form action='' method='post'>
	<table>
		<tr>
			<td>
				English:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='English' />
			</td>
		</tr>
		<tr>
			<td>
				Maths:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Maths' />
			</td>
		</tr>
		<tr>
			<td>
				Irish:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Irish' />
			</td>
		</tr>
		<tr>
			<td>
				History:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='History' />
			</td>
		</tr>
		<tr>
			<td>
				Geography:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Geography' />
			</td>
		</tr>
		<tr>
			<td>
				Home Economics:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Home Economics' />
			</td>
		</tr>
		<tr>
			<td>
				Accounting:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Accounting' />
			</td>
		</tr>
		<tr>
			<td>
				Economics:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Economics' />
			</td>
		</tr>
		<tr>
			<td>
				Business:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Business' />
			</td>
		</tr>
		<tr>
			<td>
				Biology:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Biology' />
			</td>
		</tr>
		<tr>
			<td>
				Physics:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Physics' />
			</td>
		</tr>
		<tr>
			<td>
				Chemistry:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Chemistry' />
			</td>
		</tr>
		<tr>
			<td>
				Art:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Art' />
			</td>
		</tr>
		<tr>
			<td>
				Music:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Music' />
			</td>
		</tr>
		<tr>
			<td>
				Construction Studies:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Construction Studies' />
			</td>
		</tr>
		<tr>
			<td>
				French:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='French' />
			</td>
		</tr>
		<tr>
			<td>
				German:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='German' />
			</td>
		</tr>
		<tr>
			<td>
				Italian:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Italian' />
			</td>
		</tr>
		<tr>
			<td>
				Spanish:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Spanish' />
			</td>
		</tr>
		<tr>
			<td>
				Arabic:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Arabic' />
			</td>
		</tr>
		<tr>
			<td>
				Classical Studies:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Classical Studies' />
			</td>
		</tr>
		<tr>
			<td>
				Hebrew Studies:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Hebrew Studies' />
			</td>
		</tr>
		<tr>
			<td>
				Ancient Greek:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Ancient Greek' />
			</td>
		</tr>
		<tr>
			<td>
				Latin:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Latin' />
			</td>
		</tr>
		<tr>
			<td>
				Applied Mathematics:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Applied Mathematics' />
			</td>
		</tr>
		<tr>
			<td>
				Physics and Chemistry:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Physics and Chemistry' />
			</td>
		</tr>
		<tr>
			<td>
				Agricultural Economics:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Agricultural Economics' />
			</td>
		</tr>
		<tr>
			<td>
				Engineering:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Engineering' />
			</td>
		</tr>
		<tr>
			<td>
				Design and Communication Graphics:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Design and Communication Graphics' />
			</td>
		</tr>
		<tr>
			<td>
				Religious Education:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Religious Education' />
			</td>
		</tr>
		<tr>
			<td>
				Russian:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Russian' />
			</td>
		</tr>
		<tr>
			<td>
				Japanese:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Japanese' />
			</td>
		</tr>
		<tr>
			<td>
				Technology:
			</td>
			<td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='Technology' />
			</td>
		</tr>
	</table>
	<input type='submit' name='formSubmit' value='Submit' />
	</form>";
?>

<!--


		Irish: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Irish' />
		History: <input type='checkbox' name='subject_list[]' class='subjectClass' value='History' />
		Geography: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Geography' />
		Home Economics: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Home Economics' />
		Accounting: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Accounting' />
		Economics: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Economics' />
		Business: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Business' />
		Biology: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Biology' />
		Physics: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Physics' />
		Chemistry: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Chemistry' />
		Art: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Art' />
		Music: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Music' />
		Construction Studies: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Construction Studies' />
		French: <input type='checkbox' name='subject_list[]' class='subjectClass' value='French' />
		German: <input type='checkbox' name='subject_list[]' class='subjectClass' value='German' />
		Italian: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Italian' />
		Spanish: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Spanish' />
		Arabic: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Arabic' />
		Classical Studies: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Classical Studies' />
		Hebrew Studies: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Hebrew Studies' />
		Ancient Greek: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Ancient Greek' />
		Latin: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Latin' />
		Applied Mathematics: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Applied Mathematics' />
		Physics and Chemistry: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Physics and Chemistry' />
		Agricultural Economics: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Agricultural Economics' />
		Engineering: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Engineering' />
		Design and Communication Graphics: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Design and Communication Graphics' />
		Religious Education: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Religious Education' />
		Russian: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Russian' />
		Japanese: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Japanese' />
		Technology: <input type='checkbox' name='subject_list[]' class='subjectClass' value='Technology' />



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