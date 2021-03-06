<?php
ini_set('display_errors', 0); 
error_reporting(E_ALL);
include "connect.php";
include "algor.php";
if($logged == true){
    header('Location: index.php');
  // echo "<h1>you're logged in!</h1>";
}
if ($_POST['register']){
  if($_POST['username'] && $_POST['password'] && $_POST['year'] && $_POST['email']){
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string(hash("sha512", $_POST['password']));
    $year = ($_POST['year']);
    $email = mysql_real_escape_string($_POST['email']);
    $check = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `Email`='$email'"));
    if ($check != '0'){
      // die("That Email address is already in use.");
      if (isset($_COOKIE['existingUser'])) {
        unset($_COOKIE['existingUser']);
        setcookie('existingUser', null, -1, '/');
      }
      if (isset($_COOKIE['usernameTooLong'])) {
        unset($_COOKIE['usernameTooLong']);
        setcookie('usernameTooLong', null, -1, '/');
      }
      setcookie("existingUser", "1", time()+10, "/");
      header('Location: register.php');
      die();
    }
    if(strlen($username) > 20){
      // die("Username can't be more than 20 characters, sorry");
      if (isset($_COOKIE['existingUser'])) {
        unset($_COOKIE['existingUser']);
        setcookie('existingUser', null, -1, '/');
      }
      if (isset($_COOKIE['usernameTooLong'])) {
        unset($_COOKIE['usernameTooLong']);
        setcookie('usernameTooLong', null, -1, '/');
      }
      setcookie("usernameTooLong", "1", time()+10, "/");
      header('Location: register.php');
      die();
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
    <div class='whiteHeader'><span class="currentPageSpanLeft"><a href="homepage.php" data-ajax='false'><img src="images/icons/Home_Icon.png"></a></span><span class="currentPageSpanRight">Register</span></div>

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
            <h1 class="title">Registration Form</h1>
          </div><!-- /end .header -->

          <div class="intro">

            <div class="centeredIntro">
            <form action="" method="post" data-ajax='false'>
              <table>
                <tr>
                  <td>
                    Username: 
                  </td>
                  <td>
                    <input type="text"  style="background: white;" name="username" placeholder="Username">
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
                <tr>
                  <td>
                    Email: 
                  </td>
                  <td>
                    <input type="email"  style="background: white;" name="email" placeholder="student@email.com">
                  </td>
                </tr>
                <!-- <tr>
                  <td>
                    School Year: 
                  </td>
                  <td>
                    <input type="number" style="background: white;" name="year" value="School Year e.g. 5">
                  </td>
                </tr> -->
                <table width="60%" align="center">
                  <tr><td>
                <select name="year">
                <option value="" disabled selected>What year are you in?</option>
                <option value='1'>First Year</option>
                <option value='2'>Second Year</option>
                <option value='3'>Third Year</option>
                <option value='4'>Fourth Year</option>
                <option value='5'>Fifth Year</option>
                <option value='6'>Sixth Year</option>
              </select>
              </td></tr>
                </table>
              </table>
              <table width="100%">
              <tr><td><div class="meta section">
              <div class="loginError"><?php 
                if (isset($_COOKIE['existingUser'])) {
                  echo "That Email address is already in use.";
                }
                else if (isset($_COOKIE['usernameTooLong'])) {
                  echo "Username can't be more than 20 characters, sorry.";
                }
               ?></div>
                <input type="submit" name="register" value="Register">
                <!-- <input type="image" src="images/icons/logIn_btn.png" style="background:#303944; width: 50%; max-width:200px;" name="register" value="Register"> -->
              </form></td></tr>

              </table>
            </div> <!-- /end .meta.section -->
            </div>
          </div><!-- /end .article -->
        </div><!-- /end .main -->
      </div><!-- /end .blog.section -->

      <div id="footer">
      Contact us <a href="mailto:levelupireland@gmail.com?Subject=Hi%20LevelUp" target="_top">@LevelUpIreland</a><br />
      Tweet us <a href="https://twitter.com/LevelUpDkIT">@LevelUpDkIT</a>
    </div><!-- /end #footer -->
  </div><!-- /end .page -->

</div><!-- /end .site -->

</body>
</html>
