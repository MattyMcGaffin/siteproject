<!DOCTYPE html>
<html>
<head>
<title>Contact Us</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap">
</head>
<body>

<header>


    <style>
      h1 {text-align: center};
    </style>

    <h1>Contact Us</h1>
        <div class="headernews"></div>
        <link rel="stylesheet" href="stylesheet.css">

     <nav>
       <ul>
        <<li><a href="index.php" class="btnhome">Home</a></li>
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


<div class="container">
  <style>
    h2{text-align:center};
  </style>
  <h2>Contact Us</h2>
  <form action="/submit_form" method="post">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Your email">

    <label for="message">Message</label>
    <textarea id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>






