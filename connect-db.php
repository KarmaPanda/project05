<?php
// New Config File
define('DB_SERVER', '66.147.242.186');
define('DB_USERNAME', 'urcscon3_chicago');
define('DB_PASSWORD', 'project4chicago');
define('DB_NAME', 'urcscon3_chicago');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Backward Compatibility: Database Variables (edit with your own server information)
$server = '66.147.242.186';
$user = 'urcscon3_chicago';
$pass = 'project4chicago';
$db = 'urcscon3_chicago';

// Connect to Database
$connection = mysqli_connect($server,$user,$pass,$db);
if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>