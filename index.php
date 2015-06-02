<?php
include "connect.php";
include "algor.php";
if($logged == true){
  header('Location: homepage.php');
}
?>
<!DOCTYPE html>
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

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/robotCss.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">
<!-- bxSlider CSS file -->
<link href="css/jquery.bxslider.css" rel="stylesheet" />

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="js/jquery.bxslider.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.bxslider').bxSlider();
  });
</script>
</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->



  <div id="navigationBar">
      <div id="logo"><a href="index.php"><img src="images/icons/LOGO_withFont.png"></a></div>
    </div>

  <div class="section hero">
    <div class="container">
      <div class="row">
        <div class="one-half column">
          <h4 class="hero-heading">Your future, in your hands.</h4>
          <a class="button button-primary" href="register.php">Register</a>
          <a class="button button-primary" href="login.php">Log In</a>
        </div>
        <div class="one-half column phones">
          <img class="phone" src="images/iphone-new.png">
          <img class="phone" src="images/iphone-new.png">
        </div>
      </div>
    </div>
  </div>

  <div class="section values">
    <div class="container">

      <ul class="bxslider">
        <li><img src="images/slideshow/WebsiteStat01.jpg" width="100%" /></li>
        <li><img src="images/slideshow/WebsiteStat02.jpg" width="100%" /></li>
        <li><img src="images/slideshow/WebsiteStat03.jpg" width="100%" /></li>
        <li><img src="images/slideshow/WebsiteStat04.png" width="100%" /></li>
        <li><img src="images/slideshow/WebsiteStat05.png" width="100%" /></li>
      </ul>

    </div>
  </div>

  <div class="section get-help">
    <div class="container">
      <h3 class="section-heading">Need help getting started?</h3>
      <p class="section-description">Here at LevelUp we believe that by simply including your interests and hobbies in your search for courses, you will surprise yourself with the wide range of areas of study available in Ireland.
As well as providing a new and engaging way to search for college courses, we also give information on the many other career and education paths available after school, information from professionals who have been through the experience, from PLC courses to apprenticeships to entrepreneurs.</p>
      <a class="button button-primary" href="register.php">Register</a>
    </div>
  </div>

  <div class="section categories">
    <div class="container">
      <h3 class="section-heading">Come see us at FÍS!</h3>
      <p class="section-description"></p>
      <div class="row">
      <div class="videoWrapper">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/RfM24d1hboE" frameborder="0" allowfullscreen></iframe>
      </div>
      
        <!-- <div class="column category">
        </div> -->
      </div>
    </div>
  </div>

  <div class="section get-help">
    <div class="container">
      <h3 class="section-heading">The Team</h3>
      <div class="row">
        <div class="three columns">
        <img class="bioImages" src="images/Sinead.jpg">
          <h5 class="value-heading">Sinéad</h5>
          <h6 class="value-heading">Project Lead</h6>
          <p class="value-description">Sinéad Duffy is a freelance Graphic Designer and Animator. Recent work includes re-branding of the DkIT Music Department and various eLearning projects for educational publishers including Gill & Macmillan and Folens.</p>
        </div>
        <div class="three columns">
        <img class="bioImages" src="images/Pauric.jpg">
          <h5 class="value-heading">Pauric</h5>
          <h6 class="value-heading">Content Developer</h6>
          <p class="value-description">Pauric Martin is a graduate of Communications in Creative Multimedia. Having studied in a wide variety of areas such as design, audio and video, he has used these to create high quality projects both individually and as part of a group.</p>
        </div>
        <div class="three columns">
        <img class="bioImages" src="images/Sian.jpg">
          <h5 class="value-heading">Sían</h5>
          <h6 class="value-heading">Designer</h6>
          <p class="value-description">Sían is a freelance graphic designer with a Degree in Communications in Creative Multimedia. Sían loves the use of colour in clean and contemporary web design.</p>
        </div>
        <div class="three columns">
        <img class="bioImages" src="images/Sean.jpg">
          <h5 class="value-heading">Seán</h5>
          <h6 class="value-heading">Programmer</h6>
          <p class="value-description">Seán McDonnell is a freelance web developer with a Degree in Communications in Creative Multimedia. He has worked as lead programmer on several commercial products and enjoys new challenges.</p>
        </div>
      </div>
    </div>
  </div>




<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>