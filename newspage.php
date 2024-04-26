<?php
// Start the session
session_start();

include "dbsetup.php";
?>



<!DOCTYPE html>
<html>
<head>
    <title>News Page</title>
    <link rel="icon" type="image/x-icon" href="favicon.jpg">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap">
<body>
    <header>


    <style>
      h1 {text-align: center};
    </style>

    <h1><span class="highlight">News Page</span></h1>
        <div class="headernews"></div>
        <link rel="stylesheet" href="stylesheet.css">

        <nav>
            <ul>
        <li><a href="index.php" class="btnhome">Home</a></li>
        <li><a href="librarypage.php" class="btnlib">Games Library</a></li>
        <li><a href="newspage.php" class="btnnews">News Page</a></li>
        <li><a href="contact.php" class="btncon">Contact</a></li>
        </ul>   
        <div>

        <a href="login.php" class="btnlog">Login</a>
        <a href="register.php" class="btnreg">Register</a>
        <a href="logout.php" class="btnlogout">Logout</a>
            </div>
        </nav>
    </header>


</body>
</head>
</html>