<?php

session_start();

include "dbsetup.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap">



  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link rel="icon" type="image/x-icon" href="favicon.jpg">
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
  <header>
    <script src="carousel.js" type="text/javascript"></script>
    <style>
      h1 {text-align: center};
      
    </style>

    <h1><span class="highlight">SERCsync Gamers Hub</span></h1>

    

    <nav>
      <ul>
        <?php
          if (!isset($_SESSION['username']))
          {
            echo("<div class='loginnotif'>Welcome, guest gamer. </div>");
          }
            else
          {
          echo("<div class='loginnotif'>Welcome, " .  $_SESSION['username'] . "</div>");
          }
        ?>
        <li><a href="index.php" class="btnhome">Home</a></li>
        <li><a href="librarypage.php" class="btnlib">Games Library</a></li>
        <li><a href="newspage.php" class="btnnews">News Page</a></li>
        <li><a href="contact.php" class="btncon">Contact</a></li>
      </ul>
    </nav>
    <div>
        <a href="login.php" class="btnlog">Login</a>
        <a href="register.php" class="btnreg">Register</a>
        <a href="logout.php" class="btnlogout">Logout</a>
      </div>

    </div>
  </header>

  <div class="foreground">
    <section class="features">
    <h2>Welcome to SERCsync Game Hub</h2>
    <p>There are many things to see here, have fun and explore!</p>
    <div class="feature">
      <h3>Feature 1</h3>
      <p>Description of feature 1 goes here.</p>
    </div>
    <div class="feature">
      <h3>Feature 2</h3>
      
      <div class ="sildeshow-container">

        <div class = "mySlides fade">
        <div class="numbertext">1/3"</div>
        <img src="img1.jpg" style="width:50%">
        <div class="text">Caption Text</div>
        </div>

        <div class = "mySlides fade">
        <div class="numbertext">2/3"</div>
        <img src="img1.jpg" style="width:50%">
        <div class="text">Caption Two</div>
        </div>

        <div class = "mySlides fade">
        <div class="numbertext">3/3"</div>
        <img src="img1.jpg" style="width:50%">
        <div class="text">Caption Three</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="prev" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
      </div>

        

    </div>
    <div class="feature">
      <h3>Feature 3</h3>
      <p>Description of feature 3 goes here.</p>
    </div>
    
  </section>

  <div class="pacman">
  <div class="pacman__eye"></div>
  <div class="pacman__mouth"></div>
  <div class="pacman__food"></div>
</div>

  <footer>
    <p>&copy; 2024 The Gaff Man. All rights reserved.</p>
  </footer>
</body>
</html>



