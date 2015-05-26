<?php
ini_set('display_errors', 0); 
error_reporting(E_ALL);
include "connect.php";
include "algor.php";
if($logged == true){
  die("You are already logged in!");
  // echo "<h1>you're logged in!</h1>";
}
if ($_POST['login']){
  if($_POST['email'] && $_POST['password']){
    $email = mysql_real_escape_string($_POST['email']);
    $password = mysql_real_escape_string(hash("sha512", $_POST['password']));
    $user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `Email`='$email'")); //get user by their email
    if($user == '0'){
      die("An account with that username and password does not exist. Please try another.");
    }
    if( $user['Password'] != $password){
      die("Incorrect password. Please try another");
    }
    $salt = hash("sha512", rand() . rand() . rand());
    setcookie("c_user", hash("sha512", $email), time() + 12 * 60 * 60, "/");
    setcookie("c_salt", $salt, time() + 12 * 60 * 60, "/");
    $userID = $user['ID'];
    mysql_query("UPDATE `users` SET `Salt` = '$salt' WHERE `ID`='$userID'");


    mysql_query("UPDATE `visitStats` SET `CurrentLogin` = '0' WHERE `Email`='$email'");
    mysql_query("INSERT INTO `visitStats` (`Email`, `CurrentLogin`) VALUES ('$email', '1')");
    header('Location: index.php');
    //die("You are now logged in as $username!");
  }
};
?>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <title>LevelUp</title>

  <meta name="DC.creator" content="Ethan Marcotte - http://ethanmarcotte.com" />
  <meta name="robots" content="index, follow" />
  <meta name="description" content="A demonstration site for Ethan Marcotte's book, RESPONSIVE WEB DESIGN" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="css/robotCss.css" media="screen, projection" />

  <script src="http://use.typekit.com/daz7uli.js"></script>
  <script>try{Typekit.load();}catch(e){}</script>
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  <link rel="stylesheet" href="css/jquery-mobile.css" />
  <script src="js/jquery-mobile.js"></script>
  <link rel="stylesheet" href="css/dropit.css" />
  <script src="js/dropit.js"></script>
  <script src="js/redirect.js"></script>


  <script type="text/javascript">
    $(document).ready(function() {
      $('.menu').dropit();
    });
  </script>
</head>

<body>

  <div class="site">

    <div class="page">


      <div class="navigationBar">
        <!-- <h1 class="logo"><a href="homepage.php"><img src="images/header-logo.png" /></a></h1> -->

        <ul class="nav nav-primary bigMenu">
          <div class="logoTest"><li id="logoImage"><a href="homepage.php" data-ajax='false'><img src="images/header-logo.png"></a></li></div>
          <div style="visibility:hidden;"><li id="nav-explore" class="first"><a href="exploreInterests.php" data-ajax='false'>&nbsp;&nbsp;Explore&nbsp;&nbsp;&nbsp;</a></li><li id="nav-feedback" class="second"><a href="interestFeedback.php" data-ajax='false'>|&nbsp;&nbsp;Weekly Feedback&nbsp;&nbsp;</a></li><li id="nav-stats" class="third"><a href="statistics.php" data-ajax='false'>|&nbsp;&nbsp;Statistics&nbsp;&nbsp;</a></li><li id="nav-test" class="fourth"><a href="testimonials.php" data-ajax='false'>|&nbsp;&nbsp;Testimonials&nbsp;&nbsp;</a></li><li id="nav-saved" class="fifth"><a href="savedCourses.php" data-ajax='false'>|&nbsp;&nbsp;Saved Courses&nbsp;&nbsp;</a></li><li id="nav-log" class="sixth"><a href="logout.php" data-ajax='false'>|&nbsp;&nbsp;Log Out&nbsp;&nbsp;</a></li>
        </div></ul><!-- /end ul#nav-primary.nav -->


        <ul class="nav nav-primary smallMenu">
          <img src="images/text-logo.png">
         <div style="visibility:hidden;"> <ul class="menu">
            <li>
              <a href="#">&#9776; Menu</a>
              <ul>
                <li><a href="exploreInterests.php" data-ajax='false'><img src="images/explore-icon.png">Explore</a></li>
                <li><a href="interestFeedback.php" data-ajax='false'><img src="images/feedback-icon.png">Weekly Feedback</a></li>
                <li><a href="statistics.php" data-ajax='false'><img src="images/stats-icon.png">Statistics</a></li>
                <li><a href="testimonials.php" data-ajax='false'><img src="images/testimonials-icon.png">Testimonials</a></li>
                <li><a href="savedCourses.php" data-ajax='false'><img src="images/saved-icon.png">Saved Courses</a></li>
                <li><a href="logout.php" data-ajax='false'><img src="images/account-icon.png">Log Out</a></li>
              </ul>
            </li>
          </ul></div>
        </ul><!-- /end ul#nav-primary.nav -->
      </div>


    
    <hr />

    <div class="blog section">
      <!-- <h1 class="lede"></h1> -->

      <div class="main">
        <div class="article">
          <div class="header">
            <h1 class="title"></h1>
          </div><!-- /end .header -->

          <div class="intro">
            <form action="" method="post" data-ajax='false'>
              <table>
                <tr>
                <td>
                Email:
                </td>
                <td>
                <input type="text" name="email">
                </td>
                </tr>
                <tr>
                <td>
                Password:
                </td>
                <td>
                <input type="password" name="password">
                </td>
                </tr>
              </table>

              <div class="meta section">
                <input type="submit" name="login" value="Log in">
              </form>
            </div> <!-- /end .meta.section -->
          </div><!-- /end .article -->
        </div><!-- /end .main -->
      </div><!-- /end .blog.section -->

      <div id="footer">
      <!-- <p>Images &copy; their respective copyright holders.</p>

      <p>The design and code is &copy; 2014 <a href="http://unstoppablerobotninja.com/">Ethan Marcotte</a>, supporting his book <cite><a href="http://www.abookapart.com/products/responsive-web-design">Responsive Web Design</a></cite>.</p>

      <p>Beep boop beep.</p> -->
    </div><!-- /end #footer -->
  </div><!-- /end .page -->

</div><!-- /end .site -->

</body>
</html>
