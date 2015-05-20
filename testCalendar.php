<?php
include "connect.php";
include "algor.php";
if($logged == false){
  header('Location: index.php');
}
$userEmail = $user['Email'];
$calendarGrab = mysql_query("SELECT * FROM  calendarDates");
$numberOfEvents = 0;
$dbDatesArray = array();
$dbEventsArray = array();





// echo "<table border='1'><th>Date</th><th>Event</th><th>About</th>";
while($row = mysql_fetch_array($calendarGrab)){
  $dbDatesArray[] = $row['Date'];
  $dbEventsArray[] = $row['Event'];
  // echo "<tr><td>" . $row['Date']. "</td><td>". $row['Event']. "</td><td>". $row['About'] . "</td></tr>";
  $numberOfEvents++;
}
// echo "</table>";

// print_r($dbDatesArray[0]);
// print_r($dbDatesArray[1]);

// print_r($datesArray[0]);
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
  <link rel="stylesheet" href="css/clndr.css">

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>


  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.js"></script>


   <script language="Javascript" type="text/javascript">


       // var test = '<?php echo $test; ?>';
       // alert('<?php print_r($dbDatesArray[1]); ?>');

       var eventsArray = [
        { date: moment().format('2015-11-05'), title: 'CAO online application & Change of Course Choices facilities open.' },
        { date: moment().format('2015-1-20'), title: 'CAO - Apply before this date to avail of discounted fee of €25' },
        { date: moment().format('2015-02-01'), title: 'CAO - Normal closing date for applications - 5:15pm' },
        { date: moment().format('2015-02-05'), title: 'CAO - Change of Course Choices online facility opens - €10 fee' },
        { date: moment().format('2015-02-15'), title: 'CAO - All Paper Applicants should have received a Statement of Course Choices by this date' },

        { date: moment().format('2015-02-28'), title: 'HPAT Test -  Undergraduate Entry to Medicine' },
        { date: moment().format('2015-03-01'), title: 'CAO - Change of Course Choices CLOSES - 5:15pm' },
        { date: moment().format('2015-03-01'), title: 'CAO - Final completion date for online HEAR/DARE forms - 5:15pm' },
        { date: moment().format('2015-04-01'), title: 'CAO - Latest date for HEAR/DARE supporting documentation to arrive - 5:15pm' },
        { date: moment().format('2015-05-01'), title: 'CAO - Last day for LATE applications - 5:15pm' },

        { date: moment().format('2015-05-05'), title: 'CAO - Online Change of Mind facility opens (free)' },
        { date: moment().format('2015-05-15'), title: 'CAO - All LATE Paper Applicants should have received a Statement of Course Choices by this date' },
        { date: moment().format('2015-05-31'), title: 'CAO - All applicants should have received a Statement of Application Record by this date' },
        { date: moment().format('2015-07-01'), title: 'CAO - Change of Mind  closes - 5:15pm' },
        { date: moment().format('2015-08-15'), title: 'Leaving Certificate results issued' },

        { date: moment().format('2015-08-17'), title: 'CAO - Round 1 offers issued' },
        { date: moment().format('2015-08-24'), title: 'CAO - Round 1 acceptance closing date - 5:15pm' },
        { date: moment().format('2015-08-26'), title: 'CAO - Round 2 offers issued' },
        { date: moment().format('2015-09-02'), title: 'CAO - Round 2 acceptance closing date - 5:15pm' }
      ];






      // var numberOfEvents = '<?php echo $numberOfEvents ?>';
    
      // var ajaxDates = [];
      // var ajaxEvents = [];
      // switch (numberOfEvents){
      //     case "1":
      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[0]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[0]) ?>');
      //     break;
      //     case "2":
      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[0]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[0]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[1]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[1]) ?>');
      //     break;
      //     case "3":
      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[0]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[0]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[1]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[1]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[2]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[2]) ?>');
      //     break;
      //     case "4":
      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[0]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[0]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[1]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[1]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[2]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[2]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[3]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[3]) ?>');
      //     break;
      //     case "5":
      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[0]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[0]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[1]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[1]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[2]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[2]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[3]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[3]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[4]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[4]) ?>');
      //     break;
      //     case "6":
      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[0]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[0]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[1]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[1]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[2]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[2]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[3]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[3]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[4]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[4]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[5]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[5]) ?>');
      //     break;
      //     case "7":
      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[0]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[0]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[1]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[1]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[2]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[2]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[3]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[3]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[4]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[4]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[5]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[5]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[6]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[6]) ?>');
      //     break;
      //     case "8":
      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[0]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[0]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[1]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[1]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[2]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[2]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[3]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[3]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[4]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[4]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[5]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[5]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[6]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[6]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[7]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[7]) ?>');
      //     break;
      //     case "9":
      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[0]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[0]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[1]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[1]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[2]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[2]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[3]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[3]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[4]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[4]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[5]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[5]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[6]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[6]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[7]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[7]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[8]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[8]) ?>');
      //     break;
      //     case "10":
      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[0]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[0]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[1]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[1]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[2]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[2]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[3]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[3]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[4]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[4]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[5]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[5]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[6]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[6]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[7]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[7]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[8]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[8]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[9]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[9]) ?>');

      //       ajaxDates.push('<?php echo json_encode($dbDatesArray[10]) ?>');
      //       ajaxEvents.push('<?php echo json_encode($dbEventsArray[10]) ?>');
      //     break;
      //   }

      // var eventsArray = [];
      // for (var i = 0; i < parseInt(numberOfEvents); i++) {
      //   eventsArray.push({ date: moment().format(ajaxDates[i]), title: ajaxEvents[i] });
      // };
        
        
      // eventsArray.push({ date: moment().format('2015-06-15'), title: 'This is an fff' });

      </script>


  <script type="text/javascript" src="js/clndr.js"></script>



  <script src="js/clndrTest.js"></script>



  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>
  <div class="container">
    <div id="pass-in-events" class="cal1"></div>
  </div>
</body>
</html>