<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: /');
}


/*
LOOP THROUGH COLUMNS AND THEN COMPARE EACH SUBJECT_LIST ARRAY ENTRY. IF IT MATCHES THEN UPDATE THE RECORD TO PUT A 1 IN THAT COLUMN
	$result = mysql_query("SELECT * FROM subjectsTable");
	$username = $user['Username'];
	$subjectsTableList = mysql_fetch_array(mysql_query("SELECT * FROM  `subjectsTable` WHERE `Email` = '$username'"));

	$i = 0;
	 while($row = mysql_fetch_assoc($result)) {   
        foreach ($row as $col => $val) {
        	if ($i++ < 2) continue;
            if($val) echo $col . "<br />";
            if($col == "Maths") echo "fart";
        }
    }
*/
if(isset($_POST['formSubmit'])){
	$i = 0;
	while($row = mysql_fetch_assoc($result)) {   
        foreach ($row as $col => $val) {
        	if ($i++ < 2) continue;
            if($val) echo $col . "<br />";
            if($col == $_POST['subject_list'][$i-2]) echo "fart";
        }
    }
}


/*
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
		header('Location: restrictTest.php');
	}
	else{
		die("You haven't chosen any subjects");
	}
}*/
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
/*	$result = mysql_query("SELECT * FROM subjectsTable");
	while($row = mysql_fetch_array($result))
	{
		for(var i = 2; i < 20; i++){
			echo $row[i];
		};
	};
	*/
echo 
	"<form action='' method='post' name='subjectlisting'>
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
	<input type='submit' id='submit' name='formSubmit' value='Submit' disabled />
	</form>";
	?>
</body>
</html>