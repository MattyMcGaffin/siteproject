<?php
// Start the session
session_start();

include "dbsetup.php";

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

// Function to hash password
function hashPassword($password) 
{
    return password_hash($password, PASSWORD_DEFAULT);
}

function createUser($username, $email, $password) 
{
    // Database connection
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $db = "gamesdb";


    global $connection;
    $connection = new mysqli($host, $dbusername, $dbpassword, $db);

    // Check connection
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    }

    $hashed_password = hashPassword($password);

    $stmt = $connection->prepare("INSERT INTO users (username, email, password) VALUES (?,?,?)");
    $stmt->bind_param("sss", $username,$email,$hashed_password);

    if ($stmt->execute()) 
    {
        return true;
    } 
    else 
    {
        return false;
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Create user account
    if (createUser($username, $email, $password)) 
    {
        header("Location: login.php");
        exit();
    } 
    else 
    {
        echo "Error creating user account.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/x-icon" href="favicon.jpg">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap">
    <header>
    <style>H1 {text-align: center};</style>
        <H1>Register</H1>
    <title>Register Page</title>
    <link rel="stylesheet" href="stylesheet.css"></link>
</head>
<body>
<nav>
      <ul>
      <li><a href="index.php" class="btnhome">Home</a></li>
        <li><a href="librarypage.php" class="btnlib">Games Library</a></li>
        <li><a href="newspage.php" class="btnnews">News Page</a></li>
        <li><a href="contact.php" class="btncon">Contact</a></li>
      </ul>
    </nav>
</header>

<?php


?>
    </div>
    <div class="container">
    <form method="post" action="">
        <label>Username:</label><br>
        <input type="text" name="username"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <label>Email:</label><br>
        <input type="email" name="email"><br>

        <input type="submit" value="Register">

    </form>
</div>
</body>
</html>