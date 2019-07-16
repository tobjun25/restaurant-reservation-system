<?php
// Initialises database variables
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'restaurant_database');

// Attempt to connect to MySQL database
$connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Checks if a connection exists
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>