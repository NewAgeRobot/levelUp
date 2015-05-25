<?php
ini_set('display_errors', 0); 
error_reporting(E_ALL);
include "connect.php";
if ($_POST['register']){
  if($_POST['username'] && $_POST['password'] && $_POST['year'] && $_POST['email']){
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string(hash("sha512", $_POST['password']));
    $year = ($_POST['year']);
    $email = mysql_real_escape_string($_POST['email']);
    $check = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `Email`='$email'"));
    if ($check != '0'){
      die("That Email address is already in use.");
    }
    if(strlen($username) > 20){
      die("Username can't be more than 20 characters, sorry");
    }
    $salt = hash("sha512", rand() . rand() . rand());
    mysql_query("INSERT INTO `users` (`Username`, `Password`, `Year`, `Email`, `Salt`) VALUES ('$username', '$password', '$year', '$email', '$salt')");
    mysql_query("INSERT INTO `subjectsTable` (`Email`) VALUES ('$email')");
    mysql_query("INSERT INTO `storedInterests` (`Email`) VALUES ('$email')");
    mysql_query("INSERT INTO `visitStats` (`Email`, `CurrentLogin`) VALUES ('$email', '1')");
    setcookie("c_user", hash("sha512", $email), time() + 12 * 60 * 60, "/");
    setcookie("c_salt", $salt, time() + 12 * 60 * 60, "/");
    header('Location: subjectChoice.php');
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

      
      <h1 class="logo"><a href="homepage.php"><img src="images/header-logo.png" /></a></h1>

      <ul class="nav nav-primary bigMenu">
        <li id="nav-explore" class="first"><a href="exploreInterests.php" data-ajax='false'>Explore</a></li>
        <li id="nav-feedback" class="second"><a href="interestFeedback.php" data-ajax='false'>Weekly Feedback</a></li>
        <li id="nav-stats" class="third"><a href="statistics.php" data-ajax='false'>Statistics</a></li>
        <li id="nav-test" class="fourth"><a href="testimonials.php" data-ajax='false'>Testimonials</a></li>
        <li id="nav-saved" class="fifth"><a href="savedCourses.php" data-ajax='false'>Saved Courses</a></li>
        <li id="nav-log" class="sixth"><a href="logout.php" data-ajax='false'>Log Out</a></li>
      </ul><!-- /end ul#nav-primary.nav -->

      
      <ul class="nav nav-primary smallMenu">
        <img src="images/text-logo.png"></li><ul class="menu">
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
      </ul>
    </ul><!-- /end ul#nav-primary.nav -->


    
    <hr />

    <div class="blog section">
      <h1 class="lede"></h1>

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
                    username: 
                  </td>
                  <td>
                    <input type="text" name="username">
                  </td>
                </tr>
                <tr>
                  <td>
                    password: 
                  </td>
                  <td>
                    <input type="password" name="password">
                  </td>
                </tr>
                <tr>
                  <td>
                    year: 
                  </td>
                  <td>
                    <input type="number" name="year">
                  </td>
                </tr>
                <tr>
                  <td>
                    email: 
                  </td>
                  <td>
                    <input type="text" name="email">
                  </td>
                </tr>
              </table>

              <div class="meta section">
                <input type="submit" name="register" value="Register">
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
