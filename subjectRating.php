<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: /');
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
	$result = mysql_query("SELECT * FROM subjectsTable");
	$username = $user['Username'];
	$subjectsTableList = mysql_fetch_array(mysql_query("SELECT * FROM  `subjectsTable` WHERE `Email` = '$username'"));

	$i = 0;
	 while($row = mysql_fetch_assoc($result)) {   
        foreach ($row as $col => $val) {
        	if ($i++ < 2) continue;
            if($val) echo $col . "<br />";
        }
    }
?>
</body>
</html>