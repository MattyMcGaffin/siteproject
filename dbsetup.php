<?php
	// Set up the database for the application
	
	// set up the connection to mysql
	$host = "localhost";
	$username = "root";
	$dbpassword = "";
	
	global $connection;
	$connection = new mysqli($host, $username, $dbpassword); // gets use a connection object to use to access mysql
	
	

	

	// create the database for the application
	$sql_create_db = "CREATE DATABASE IF NOT EXISTS gamesdb"; 
	
	// select database
	$connection->select_db("gamesdb");

    // creates the users table with three fields: ID, username and password
    // the ID field is the primary key for the table
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(100) NOT NULL
    )";


    // create a table in the selected database
	// specifies three fields: ID, name and email
	// The ID field is the primary key for the table
	$sql = "CREATE TABLE IF NOT EXISTS games (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title TEXT,
        description TEXT,
        image_path VARCHAR(255) NOT NULL
    )";


	

	
	// close the database Connection
	$connection->close();

?>