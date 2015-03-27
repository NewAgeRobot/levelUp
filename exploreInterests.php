<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}
$userEmail = $user['Email'];
$result = mysql_query("SELECT * FROM interestsTable");
$i = 0;
if(isset($_POST['formSubmit'])){
	$subAmount = count($_POST['subject_list']);
	mysql_query("UPDATE `users` SET `interest0`='', `interest1`='', `interest2`='' WHERE `Email` = '$userEmail'");
	for($k = 0; $k < $subAmount;$k++){
		$currentSub = $_POST['subject_list'][$k];
		$col = "interest" . $k;
		//echo $col;
		mysql_query("UPDATE `storedInterests` SET `$col` = '$currentSub' WHERE `Email` = '$userEmail'");
		//echo $currentSub;
		if($k == 0){
			$interest0 = $currentSub;
		};
		if($k == 1){
			$interest1 = $currentSub;
		};
		if($k == 2){
			$interest2 = $currentSub;
		};
	}
}
header('Location: showCourses.php');
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/interactions2.js"></script>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">

	<title>test</title>
</head>
<body>
	<?php
	echo "<form action='' method='post' name='subjectlisting'><table>";
	$result = mysql_query("SELECT * FROM interestsTable");
	$f = 0;
	while($row = mysql_fetch_assoc($result)) {
		foreach ($row as $col => $val) {
			if ($f++ < 7) continue;
			else if($f > 28) break;
			echo "<tr> <td> " . $col . "</td> <td>
			<input type='checkbox' name='subject_list[]' class='subjectClass' value='" . $col . "'" . $checkTrue . " />
		</td></tr>";
	}
}
echo "</table><input type='submit' id='submit' name='formSubmit' value='Submit' disabled/>
</form>";
?>
</body>
</html>