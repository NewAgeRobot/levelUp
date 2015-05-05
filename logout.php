<?php 
// unset cookies

// if (isset($_COOKIE['c_user']) && isset($_COOKIE['c_salt'])) {
// 	setcookie("c_user", "", time() - 50000);
// 	setcookie("c_salt", "", time() - 50000);
// 	session_start();
// 	unset($_SESSION);
// 	session_destroy();
// 	session_write_close();
// 	header('Location: index.html');
// 	die;
// }
// else{
// 	header('Location: index.html');
// }
if (isset($_SERVER['HTTP_COOKIE']))
{
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie)
    {
        $mainCookies = explode('=', $cookie);
        $name = trim($mainCookies[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
    header('Location: index.html');
}
?>