<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}

//test with multiple records to make sure identifier for table records is enouguh/that it works fine.
//sort out check for if they want to redo thier subject choice.
$userEmail = $user['Email'];
$result = mysql_query("SELECT * FROM subjectsTable WHERE `Email` = '$userEmail'");
$i = 0;
if(isset($_POST['formSubmit'])){
	$subAmount = count($_POST['subject_list']);
	while($row = mysql_fetch_assoc($result)) {
		foreach ($row as $col => $val) {
			if ($i++ < 2) continue;
			for($j = 0; $j <= 36; $j++){
				for($k = 0; $k < $subAmount;$k++){
					$currentSub = $_POST['subject_list'][$k];
					if($currentSub == $col){
						mysql_query("UPDATE `subjectsTable` SET `$col` = '1' WHERE `Email` = '$userEmail'");
						break;
					}
					else{
						mysql_query("UPDATE `subjectsTable` SET `$col` = '0' WHERE `Email` = '$userEmail'");
					}
				}
			}
			mysql_query("UPDATE `users` SET `SubAmount` = '$subAmount' WHERE `Email` = '$userEmail'");
			header('Location: index.php');
		}
	}
}
?>
<html lang="en">
 <head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Level Up</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
	<script src="js/interactions.js"></script>
  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

    <!-- Primary Page Layout
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->



    <div id="navigationBar">
      <div id="logo"><a href="index.php"><img src="images/header-logo.png"></a></div></div>

    <div class="section hero">
      <div class="container">
        <div class="row">
          <div class="offset-by-two column">
          <h4>Tick all the subjects you do to finalise your registration then we can get started!</h4>
	<?php
	echo "<form action='' method='post' name='subjectlisting'><table>";
	$result = mysql_query("SELECT * FROM subjectsTable WHERE `Email` = '$userEmail'");
	$f = 0;
	while($row = mysql_fetch_assoc($result)) {   
		foreach ($row as $col => $val) {
			if ($f++ < 2) continue;
			if ($val == 1) {
				$checkTrue = "checked='true'";
			}
			else{
				$checkTrue = "";
			}
			echo "<tr> <td> " . $col . "</td> <td>
			<input type='checkbox' name='subject_list[]' class='subjectClass' value='" . $col . "'" . $checkTrue . " />
		</td></tr>";
	}
}
echo "</table><input type='submit' id='submit' name='formSubmit' value='Submit' disabled/>
</form>";
?>
          </div>
        </div>
      </div>
    </div>
  <!-- End Document
  ––––––––––––––––––––––––––––––––––––––––––––––––––-->
</body>
</html>