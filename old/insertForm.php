<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
include "connect.php";
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>test</title>
</head>
<body>

	<form action="insertForm.php" method="post">
		name: <input type="text" name="name"><br />
		password: <input type="password" name="password"><br />
		year: <input type="number" name="year"><br />
		email: <input type="text" name="email"><br />
		<input type="submit" name="register" value="Register">
		<input type="submit" name="login" value="Log in">
	</form>

	<?php 
	if (isset($_POST['register'])){
		include "connect.php";

		$sql = "INSERT INTO `$mysql_database`.`users` (`name`, `password`, `year`, `email`) VALUES ('$_POST[name]', '$_POST[password]', '$_POST[year]', '$_POST[email]')";
			
		mysql_query($sql, $db);

		mysql_close($db);
	}
	else if (isset($_POST['login'])){
		include "connect.php";

    	$userQuery="SELECT * FROM users WHERE email = '$_POST[email]'";
    	$results = mysql_query($userQuery);

		while ($row = mysql_fetch_array($results)) {
			echo $row[1];
		};

		mysql_close($db);
	};

	?>
</body>
</html>