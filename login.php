<?php
ini_set('display_errors', 0); 
error_reporting(E_ALL);
include "connect.php";
include "algor.php";
if($logged == true){
    header('Location: homepage.php');
  // echo "<h1>you're logged in!</h1>";
}
if ($_POST['login']){
  if($_POST['email'] && $_POST['password']){
    $email = mysql_real_escape_string($_POST['email']);
    $password = mysql_real_escape_string(hash("sha512", $_POST['password']));
    $user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `Email`='$email'")); //get user by their email
    if($user == '0'){
      if (isset($_COOKIE['noUser'])) {
        unset($_COOKIE['noUser']);
        // setcookie('noUser', '', time() - 3600); // empty value and old timestamp
        setcookie('noUser', null, -1, '/');
      }
      if (isset($_COOKIE['wrongPassword'])) {
        unset($_COOKIE['wrongPassword']);
        // setcookie('wrongPassword', '', time() - 3600); // empty value and old timestamp
        setcookie('wrongPassword', null, -1, '/');
      }
      setcookie("noUser", "1", time()+10, "/");
      header('Location: login.php');
      die();
    }
    if( $user['Password'] != $password){
      if (isset($_COOKIE['noUser'])) {
        unset($_COOKIE['noUser']);
        // setcookie('noUser', '', time() - 3600); // empty value and old timestamp
        setcookie('noUser', null, -1, '/');
      }
      if (isset($_COOKIE['wrongPassword'])) {
        unset($_COOKIE['wrongPassword']);
        // setcookie('wrongPassword', '', time() - 3600); // empty value and old timestamp
        setcookie('wrongPassword', null, -1, '/');
      }
      setcookie("wrongPassword", "1", time()+10, "/");
      header('Location: login.php');
      die();
    }
    $salt = hash("sha512", rand() . rand() . rand());
    setcookie("c_user", hash("sha512", $email), time()+60*60*24*6004, "/");
    setcookie("c_salt", $salt, time()+60*60*24*6004, "/");
    if (isset($_COOKIE['noUser'])) {
        unset($_COOKIE['noUser']);
        // setcookie('noUser', '', time() - 3600); // empty value and old timestamp
        setcookie('noUser', null, -1, '/');
      }
      if (isset($_COOKIE['wrongPassword'])) {
        unset($_COOKIE['wrongPassword']);
        // setcookie('wrongPassword', '', time() - 3600); // empty value and old timestamp
        setcookie('wrongPassword', null, -1, '/');
      }
    $userID = $user['ID'];
    mysql_query("UPDATE `users` SET `Salt` = '$salt' WHERE `ID`='$userID'");


    mysql_query("UPDATE `visitStats` SET `CurrentLogin` = '0' WHERE `Email`='$email'");
    mysql_query("INSERT INTO `visitStats` (`Email`, `CurrentLogin`) VALUES ('$email', '1')");
    header('Location: index.php');
    //die("You are now logged in as $username!");


// if (isset($_COOKIE['noUser'])) {
//   unset($_COOKIE['noUser']);
//   setcookie('noUser', '', time() - 3600); // empty value and old timestamp
// }
// if (isset($_COOKIE['wrongPassword'])) {
//   unset($_COOKIE['wrongPassword']);
//   setcookie('wrongPassword', '', time() - 3600); // empty value and old timestamp
// }
  }
};
?>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <title>LevelUp</title>

  <meta name="LevelUp" content="Level Up - http://www.Levelup.ie" />
  <meta name="description" content="A website to help students better discover what they enjoy and want to pursue after second level." /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="css/robotCss.css" media="screen, projection" />

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

 <script type="text/javascript">
  $(document).ready(function(){
      $(".smallMenu .header-image img").click(function() {
        window.location.replace("homepage.php");
      });
    });
</script>
</head>

<body>

  <div class="site">
    <div class='whiteHeader'><span class="currentPageSpanLeft"><a href="homepage.php" data-ajax='false'><img src="images/icons/Home_Icon.png"></a></span><span class="currentPageSpanRight">Login</span></div>

    <div class="page">

      
      <div class="navigationBar">
        <!-- <h1 class="logo"><a href="homepage.php"><img src="images/header-logo.png" /></a></h1> -->

        <ul class="nav nav-primary bigMenu">
          <div class="logoTest"><li id="logoImage"><a href="homepage.php" data-ajax='false'><img src="images/icons/LOGO_withFont.png"></a></li></div>
          <div style="visibility:hidden;"><li id="nav-explore" class="first"><a href="exploreInterests.php" data-ajax='false'>&nbsp;&nbsp;Explore&nbsp;&nbsp;&nbsp;</a></li><li id="nav-feedback" class="second"><a href="interestFeedback.php" data-ajax='false'>|&nbsp;&nbsp;Rate&nbsp;&nbsp;</a></li><li id="nav-stats" class="third"><a href="statistics.php" data-ajax='false'>|&nbsp;&nbsp;Statistics&nbsp;&nbsp;</a></li><li id="nav-test" class="fourth"><a href="testimonials.php" data-ajax='false'>|&nbsp;&nbsp;Testimonials&nbsp;&nbsp;</a></li><li id="nav-saved" class="fifth"><a href="savedCourses.php" data-ajax='false'>|&nbsp;&nbsp;Saved Courses&nbsp;&nbsp;</a></li><li id="nav-log" class="sixth"><a href="logout.php" data-ajax='false'>|&nbsp;&nbsp;Log Out&nbsp;&nbsp;</a></li>
       </div> </ul><!-- /end ul#nav-primary.nav -->


       <ul class="nav nav-primary smallMenu">
          <li class="header-image"><img src="images/icons/LOGO_ForMobile.png"></li>
         <div style="visibility:hidden;"> <ul class="menu">
            <li>
              <a href="#">&#9776; Menu</a>
              <ul>
                <li><a href="exploreInterests.php" data-ajax='false'><img src="images/icons/icon_ExploreCourses.jpg">Explore</a></li>
                <li><a href="savedCourses.php" data-ajax='false'><img src="images/icons/icon_SavedCourses.jpg">Saved Courses</a></li>
                <li><a href="interestFeedback.php" data-ajax='false'><img src="images/icons/icon_MyRecords.jpg">Rate</a></li>
                <li><a href="statistics.php" data-ajax='false'><img src="images/icons/icon_Statistics.jpg">Statistics</a></li>
                <li><a href="testimonials.php" data-ajax='false'><img src="images/icons/icon_Testimonials.jpg">Testimonials</a></li>
                <li><a href="logout.php" data-ajax='false'><img src="images/icons/icon_LogOut.jpg">Log Out</a></li>
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
            <h1 class="title">Login Form</h1>
          </div><!-- /end .header -->

          <div class="intro">

            <div class="centeredIntro">
            <form action="" method="post" data-ajax='false'>
              <table>
                <tr>
                <td>
                Email:
                </td>
                <td>
                <input type="email"  style="background: white;" name="email" placeholder="User@email.com">
                </td>
                </tr>
                <tr>
                <td>
                Password:
                </td>
                <td>
                <input type="password"  style="background: white;" name="password" placeholder="Password">
                </td>
                </tr>
              </table>

              <div class="meta section">
              <div class="loginError"><?php 
                if (isset($_COOKIE['noUser'])) {
                  echo "Invalid Email address entered. Please try again.";
                }
                else if (isset($_COOKIE['wrongPassword'])) {
                  echo "An account with that Email and Password combination does not exist, please try again.";
                }
               ?></div>
                <input type="submit" name="login" value="Log in">
              </form>
            </div> <!-- /end .meta.section -->
            </div>
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
