<?php

$logged = false;
if ($_COOKIE['c_user'] && $_COOKIE['c_salt']){

	$cuser = mysql_real_escape_string($_COOKIE['c_user']);
	$csalt = mysql_real_escape_string($_COOKIE['c_salt']);
	$user = mysql_fetch_array(mysql_query("SELECT * FROM  `users` WHERE `Salt` = '$csalt'"));
	if($user != 0){

		if(hash("sha512", $user['Email']) == $cuser){

			$logged = true;
		}
	}
};

?>