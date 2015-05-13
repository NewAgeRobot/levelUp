<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}
$userEmail = $user['Email'];

$firstCode = $_POST["firstCode"];
$amountSaved = $_POST["amountSaved"];

echo "<script type='text/javascript'>alert('first code: $firstCode,amount: $amountSaved');</script>";
?>