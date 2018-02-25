<?php

require_once('wp-config.php');
$hostname = DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;

// Create connection
$conn = mysqli_connect($hostname, $username, $password, DB_NAME) or die("Unable to connect to mysqli");


?>
