<?php
$mysql_host = "localhost";
$mysql_database = "db1296121_levelUpApp";
$mysql_user = "root";
$mysql_password = "";
$db = mysql_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database);
 if (!$db) {
 die("Database connection failed miserably: " . mysql_error());
 }
 $db_select = mysql_select_db($mysql_database,$db);
 if (!$db_select) {
 die("Database selection also failed miserably: " . mysql_error());
 }
 error_reporting(0);
?>