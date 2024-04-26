<?php
// Start the session
session_start();

include "dbsetup.php";

// Function to authenticate user
function authenticateUser($username, $password) 
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

    $stmt = $connection->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) 
    {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) 
        {
            return $user;
        }
    }

    return null;
}

// Login process
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = authenticateUser($username, $password);

    if ($user) 
    {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['upload_error'] = false;
        header("Location: index.php"); // Redirect to dashboard after successful login
        exit();
    } 
    else 
    {
        $login_error = "Invalid username or password";
    }
}

// Logout process
if (isset($_GET['logout'])) 
{
    session_destroy();
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap">
    <header>
    <style>H1 {text-align: center};</style>
        <H1>Login</H1>
    <title>Login Page</title>
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




    </div>
    <div class="container">
    <form method="post" action="">
        <label>Username:</label><br>
        <input type="text" name="username"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" value="Login">
        <div>
    <h2>No account? <a href="register.php">Register</a></h2>
    </div>
    </form>
    </div>
    <?php if (isset($login_error)) echo "<p>$login_error</p>"; ?>

</body>
</html>