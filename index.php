<?php
include "connect.php";
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>test</title>
</head>
<!-- NAVBAR
  ================================================== -->
  <body>
    <h2 class="featurette-heading">Sales Table Output<span class="text-muted"> Queries in Progress</span></h2>
    <?php
    $query="SELECT * FROM testTable WHERE name = 'john'";
    $results = mysql_query($query);
    $num_rows = mysql_num_rows($results);

    while ($row = mysql_fetch_array($results)) {
          echo '<table>';
          echo '<tr><td>' . $row[1] . '<td>' . $row[2] . '</td><td>' . $row[3] . '</td></tr>';
          echo '</table>';
      }
    ?>

    <h2 class="featurette-heading">Products Table Output<span class="text-muted">Queries in Progress</span></h2>
    <?php

    $output_table = 

    '<table><tr><td><b>ID</b></td><td><b>Name</b></td><td><b>Description</b></td><td><b>Category</b></

    td><td><b>Stock</b></td><td><b>Price</b></td><td><b>Org ID</b></td><td><b>Time 

    Created</b></td></tr>';

    $con = mysql_connect($mysql_host, $mysql_user, $mysql_password);
    if (!$con) {
      die('Could not connect: ' . mysql_error());
    }
    mysql_select_db($mysql_database, $con);

    $result = mysql_query("SELECT * FROM testTable");
    while($row = mysql_fetch_array($result))
    {
      $output_table .= '<tr><td><b>' . $row[0] . '</b></td><td>' . $row[1] . '</td><td>' 

      . $row[2] . '</td><td>' . $row[3] . '</td><td>' . $row[4] . '</td><td>' . $row[5] . '</td><td>' . 

      $row[6] . '</td><td>' . $row[7] . '</td><td>' . $row[8] . '</td><td>' . $row[9] . '</td></tr>';
    }

    $output_table .= '</table>';

    echo $output_table;

    ?>
  </body>
  </html>