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
  <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

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
          <h4 class="hero-heading">Explore courses that actually interest you, not just what's popular.</h4>
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
      <div class="row">
        <div class="one-third column value">
          <h2 class="value-multiplier">10%</h2>
          <h5 class="value-heading">Secondary School Students</h5>
          <p class="value-description">Drop out before the Leaving Certificate.</p>
        </div>
        <div class="one-third column value">
          <h2 class="value-multiplier">10%</h2>
          <h5 class="value-heading">Third Level Students</h5>
          <p class="value-description">Drop out of College each year.</p>
        </div>
        <div class="one-third column value">
          <h2 class="value-multiplier">100%</h2>
          <h5 class="value-heading">People</h5>
          <p class="value-description">Would rather be doing what they love.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="section get-help">
    <div class="container">
      <h3 class="section-heading">Need help getting started?</h3>
      <p class="section-description">We're here to help you! Just register, and get using the app. See the feedback within days, and track your progress towards happiness!</p>
      <a class="button button-primary" href="register.php">Register</a>
    </div>
  </div>

  <div class="section categories">
    <div class="container">
      <h3 class="section-heading">Testimonials</h3>
      <p class="section-description">Just an example of some of the options other than College.</p>
      <div class="row">
        <div class="one-half column category">
          <a href=""><img class="u-max-full-width" src="images/test1.jpg"></a>
          <a class="button button-primary" href="">Further Reading</a>
        </div>
        <div class="one-half column category">
          <a href=""><img class="u-max-full-width" src="images/test2.jpg"></a>
          <a class="button button-primary" href="">Further Reading</a>
        </div>
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
          <p class="value-description">Bio here would be nice this is just filler text to see what size the text would be and how much space can be allocated. I wonder will this be too much? Short and sweet would be best I think.</p>
        </div>
        <div class="three columns">
        <img class="bioImages" src="images/Pauric.jpg">
          <h5 class="value-heading">Pauric</h5>
          <h6 class="value-heading">Content Developer</h6>
          <p class="value-description">Bio here would be nice this is just filler text to see what size the text would be and how much space can be allocated. I wonder will this be too much? Short and sweet would be best I think.</p>
        </div>
        <div class="three columns">
        <img class="bioImages" src="images/Sian.jpg">
          <h5 class="value-heading">Sían</h5>
          <h6 class="value-heading">Designer</h6>
          <p class="value-description">Bio here would be nice this is just filler text to see what size the text would be and how much space can be allocated. I wonder will this be too much? Short and sweet would be best I think.</p>
        </div>
        <div class="three columns">
        <img class="bioImages" src="images/Sean.jpg">
          <h5 class="value-heading">Seán</h5>
          <h6 class="value-heading">Programmer</h6>
          <p class="value-description">Bio here would be nice this is just filler text to see what size the text would be and how much space can be allocated. I wonder will this be too much? Short and sweet would be best I think.</p>
        </div>
      </div>
    </div>
  </div>




<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>