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
      </div>
        </nav>
    </header>


</body>


<?php
if (!isset($_SESSION['user_id']))
{
    echo("<a href='login.php'>Login</a>");
}
else
{
    echo("<a href='logout.php'>Log out</a>");
}

?>
    </div>
    
    <div>
        <a href="addgame.php">New game</a>
    </div>



<?php
$dbgames = get_games();

if ($dbgames->num_rows == 0)
{
    echo("<p>No games have been added, yet.</p>"); 
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





