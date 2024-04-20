<?php
// Start the session
session_start();

include "dbsetup.php";

// Database connection
$host = "localhost";
$username = "root";
$dbpassword = "";
$db = "gamesdb";

$connection = new mysqli($host, $username, $dbpassword, $db);

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

function createUser($username, $password) 
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

    $stmt = $connection->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

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
    if (createUser($username, $password)) 
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
    <header>
    <title>Login Page</title>
    <link rel="stylesheet" href="stylesheet.css"></link>
</head>
<body>
<nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="librarypage.php">Games Library</a></li>
        <li><a href="newspage.php">News Page</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
</header>

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
    
    <form method="post" action="">
        <label>Username:</label><br>
        <input type="text" name="username"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <label>Email:</label><br>
        <input type="email" name="email"><br>

        <input type="submit" value="Register">

    </form>
</body>
</html>