<?php
$mysql_host = "mysql2272int.cp.blacknight.com";
$mysql_database = "db1296121_levelUpApp";
$mysql_user = "u1296121_admin";
$mysql_password = "()()dkitlevelUP1";
$db = mysql_connect($mysql_host, $mysql_user, $mysql_password);
 if (!$db) {
 die("Database connection failed miserably: " . mysql_error());
 }
 $db_select = mysql_select_db($mysql_database,$db);
 if (!$db_select) {
 die("Database selection also failed miserably: " . mysql_error());
 }
?>