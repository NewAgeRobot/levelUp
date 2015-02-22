<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: /');
}

if(isset($_POST['formSubmit'])){
	echo "blah";
}
//test with multiple records to make sure identifier for table records is enouguh/that it works fine.
//sort out check for if they want to redo thier subject choice.
$userEmail = $user['Email'];
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
	"<form action='' method='post' name='subjectlisting'><table>";
	$result = mysql_query("SELECT * FROM subjectsTable WHERE `Email` = '$userEmail'");
	$f = 0;
	$items[] = array();
	while($row = mysql_fetch_assoc($result)) {   
		foreach ($row as $col => $val) {
			if ($f++ < 2) continue;
			if ($val == 1) {
				$items[] = $col;
			}
		}
		$itemsSize = count($items)-1;
	}
	echo "</table><input type='submit' name='formSubmit' value='Submit' />
</form>";
echo $itemsSize;

//print_r($items[2]);
?>
</body>
</html>