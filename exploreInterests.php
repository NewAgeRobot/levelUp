<?php
include "connect.php";
include "algor.php";
if($logged == false){
	header('Location: index.php');
}
$userEmail = $user['Email'];
$result = mysql_query("SELECT * FROM interestsTable");
$i = 0;
if(isset($_POST['formSubmit'])){
	$subAmount = count($_POST['subject_list']);
	//echo $subAmount;
	mysql_query("UPDATE `storedInterests` SET `interest0`='', `interest1`='', `interest2`='', `CurrentCourse` = '0', `NumCourse` = '0', `County0`='', `County1`='', `County2`='', `County3`='', `County4`='', `County5`='', `County6`='', `County7`='', `County8`='', `County9`='', `County10`='', `County11`='', `County12`='', `County13`='', `County14`='' WHERE `Email` = '$userEmail'");
	for($k = 0; $k < $subAmount;$k++){
		$currentSub = $_POST['subject_list'][$k];
		$col = "interest" . $k;
		mysql_query("UPDATE `storedInterests` SET `$col` = '$currentSub' WHERE `Email` = '$userEmail'");

	}
	$count = count($_POST['Counties']);
	//echo $count;
	for($j = 0; $j < $count;$j++){
		$currentCounty = $_POST['Counties'][$j];
		$countyNumber = "County" . $j;
		mysql_query("UPDATE `storedInterests` SET `$countyNumber` = '$currentCounty' WHERE `Email` = '$userEmail'");

	}
	header('Location: showCourses.php');
}

$prompts = mysql_fetch_array(mysql_query("SELECT * FROM feedbackPrompts WHERE `Interests` = '1' ORDER BY rand() 
   LIMIT 1"));
echo $prompts['Prompt'];

?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<script type="text/javascript">
		var main = function(){
			$("input[name='subject_list[]']:checkbox").click(function() {
				var bol = $("input[name='subject_list[]']:checkbox:checked").length >= 3;
				$("input[name='subject_list[]']:checkbox").not(":checked").attr("disabled",bol);
			});

			$(".subjectClass").change(function() {
				if($(".subjectClass:checked").length >= 1) {
					$("#submit").removeAttr("disabled");
				} else {
					$("#submit").attr("disabled", "disabled");
				}
			});
		};

		$(document).ready(main);

		$(document).on("click", "#showCounties", function() {
			$('#countyTable').toggle();
		});
	</script>
	<title>test</title>
</head>
<body>
	<?php
	echo "<form action='' method='post' name='subjectlisting'>";
	
	echo "<button type='button' id='showCounties'>Show Counties</button>";

	//have one for all? maybe?
	echo "<div id='countyTable' style='display:none;'><table>";
	echo "<tr> <td> Louth </td> <td><input type='checkbox' name='Counties[]' class='county' value='Louth' /></td>";
	echo "<td> Dublin </td> <td><input type='checkbox' name='Counties[]' class='county' value='Dublin' /></td>";
	echo "<td> Cork </td> <td><input type='checkbox' name='Counties[]' class='county' value='Cork' /></td>";
	echo "<td> Kildare </td> <td><input type='checkbox' name='Counties[]' class='county' value='Kildare' /></td>";
	echo "<td> Galway </td> <td><input type='checkbox' name='Counties[]' class='county' value='Galway' /></td></tr>";
	echo "<tr> <td> Limerick </td> <td><input type='checkbox' name='Counties[]' class='county' value='Limerick' /></td>";
	echo "<td> Sligo </td> <td><input type='checkbox' name='Counties[]' class='county' value='Sligo' /></td>";
	echo "<td> Tipperary </td> <td><input type='checkbox' name='Counties[]' class='county' value='Tipperary' /></td>";
	echo "<td> Roscommon </td> <td><input type='checkbox' name='Counties[]' class='county' value='Roscommon' /></td>";
	echo "<td> Carlow </td> <td><input type='checkbox' name='Counties[]' class='county' value='Carlow' /></td></tr> ";
	echo "<tr> <td> Mayo </td> <td><input type='checkbox' name='Counties[]' class='county' value='Mayo' /></td>";
	echo "<td> Waterford </td> <td><input type='checkbox' name='Counties[]' class='county' value='Waterford' /></td>";
	echo "<td> Kerry </td> <td><input type='checkbox' name='Counties[]' class='county' value='Kerry' /></td>";
	echo "<td> Clare </td> <td><input type='checkbox' name='Counties[]' class='county' value='Clare' /></td>";
	echo "<td> Cavan </td> <td><input type='checkbox' name='Counties[]' class='county' value='Cavan' /></td></tr>";
	echo "</table></div>";


	echo "<table>";
	$result = mysql_query("SELECT * FROM interestsTable");
	$f = 0;
	while($row = mysql_fetch_assoc($result)) {
		foreach ($row as $col => $val) {
			if ($f++ < 8) continue;
			else if($f > 29) break;
			//use checktrue to query current interests, and make them checked if they exist
			echo "<tr> <td> " . $col . "</td> <td>
			<input type='checkbox' name='subject_list[]' class='subjectClass' value='" . $col . "'" . $checkTrue . " />
		</td></tr>";
	}
}
echo "</table><input type='submit' id='submit' name='formSubmit' value='Submit' disabled/>
</form>";
?>	
</body>
</html>