<?php 
// unset cookies
if (isset($_COOKIE['c_user']) && isset($_COOKIE['c_salt'])) {
	setcookie("c_user", "", time() - 50000);
	setcookie("c_salt", "", time() - 50000);
	session_start();
	unset($_SESSION);
	session_destroy();
	session_write_close();
	header('Location: index.php');
	die;
}
else{
	header('Location: index.php');
}
?>