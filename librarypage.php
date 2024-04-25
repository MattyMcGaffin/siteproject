<?php
// Start the session
session_start();

include "dbsetup.php";

function get_games()
{

    // Database connection
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $db = "gamesdb";

    $connection = new mysqli($host, $dbusername, $dbpassword, $db);

    // Check connection
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    }

    $stmt = $connection->prepare("SELECT * FROM games");
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
}


?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap">
<body>
    <header>
        <style>H1 {text-align: center};</style>
        <H1>Available Games</H1>
        <nav>
          <ul>
           <li><a href="index.php" class="btnhome">Home</a></li>
            <li><a href="librarypage.php" class="btnlib">Games Library</a></li>
            <li><a href="newspage.php" class="btnnews">News Page</a></li>
            <li><a href="contact.php" class="btncon">Contact</a></li>

            <link rel="stylesheet" href="stylesheet.css">
           </ul>

           <div>
        <a href="login.php" class="btnlog">Login</a>
        <a href="register.php" class="btnreg">Register</a>
        <a href="logout.php" class="btnlogout">Logout</a>
      </div>
        </nav>
    </header>


</body>


<?php

?>
    </div>
    
    <div>
        <a href="addgames.php" class="btnaddgame">New game</a>
    </div>



<?php
$dbgames = get_games();

if ($dbgames->num_rows == 0)
{
    echo("<br><br><br><p>Oh no!<br>
    no games have been added :( hit the button to get started!</p>"); 
}    
else
{
    $count = 1;

    echo("<div class='row'>");

    while($row = $dbgames->fetch_assoc())
    {
        if ($count % 4 == 0)
        {
            echo("<div class='row'>");
        }

        echo("<div class='column'>");
        echo("<div class='content'>");
        echo("<h3>" . $row['title'] . "</h3>");
        echo("<p>" . $row['description'] ."</p>");
        echo("<img src='". $row['image_path'] . "' alt='" . $row['description'] ."' class='gameImage'>");
        echo("</div>");
        echo("</div>");

        if ($count % 4 == 0)
        {
            echo("</div>");
        }

        $count++;
    }

}





?>




</head>
</html>





