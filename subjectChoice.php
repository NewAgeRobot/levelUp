<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: /');
}

//test with multiple records to make sure identifier for table records is enouguh/that it works fine.
//sort out check for if they want to redo thier subject choice.
$userEmail = $user['Email'];
$result = mysql_query("SELECT * FROM subjectsTable WHERE `Email` = '$userEmail'");
$i = 0;
if(isset($_POST['formSubmit'])){
	$subAmount = count($_POST['subject_list']);
	while($row = mysql_fetch_assoc($result)) {   
		foreach ($row as $col => $val) {
			if ($i++ < 2) continue;
			for($j = 0; $j <= 36; $j++){
				for($k = 0; $k < $subAmount;$k++){
					$currentSub = $_POST['subject_list'][$k];
					if($currentSub == $col){
						mysql_query("UPDATE `subjectsTable` SET `$col` = '1' WHERE `Email` = '$userEmail'");
						break;
					}
					else{
						mysql_query("UPDATE `subjectsTable` SET `$col` = '0' WHERE `Email` = '$userEmail'");
					}
				}
			}
		}
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
	echo "<form action='' method='post' name='subjectlisting'><table>";
	$result = mysql_query("SELECT * FROM subjectsTable WHERE `Email` = '$userEmail'");
	$f = 0;
	while($row = mysql_fetch_assoc($result)) {   
		foreach ($row as $col => $val) {
			if ($f++ < 2) continue;
			if ($val == 1) {
				$checkTrue = "checked='true'";
			}
			else{
				$checkTrue = "";
			}
			echo "<tr> <td> " . $col . "</td> <td>
				<input type='checkbox' name='subject_list[]' class='subjectClass' value='" . $col . "'" . $checkTrue . " />
			</td></tr>";
		}
	}
	echo "</table><input type='submit' id='submit' name='formSubmit' value='Submit' disabled />
</form>";
?>
</body>
</html>