<?php
include "connect.php";
include "algor.php";
if($logged == true){
	echo "<h1>you're logged in as " . $user['Username'] . "!</h1>";
}
else {
	header('Location: /');
}

if(isset($_POST['Subject1'])) 
{
    echo "Need wheelchair access.";
}
else
{
    echo "Do not Need wheelchair access.";
}    
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>test</title>
</head>
<body>
<?php
echo 
	"<form action='' method='post'>
		English: <input type='checkbox' name='Subject1' value='English' id='checkbox1' /> <br />
		Maths: <input type='checkbox' name='Subject2' value='Maths' id='checkbox2' /> <br />
		Irish: <input type='checkbox' name='Subject3' value='Irish' id='checkbox3' /> <br />
		History: <input type='checkbox' name='Subject4' value='History' id='checkbox4' /> <br />
	<input type='submit' name='formSubmit' value='Submit' />
	</form>";
?>
</body>
</html>