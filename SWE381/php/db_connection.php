<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$db = mysqli_connect($servername, $username, $password);

$database_name = 'swe381';

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!mysqli_select_db($db, $database_name))

    die("Unable to select database: " . mysqli_error($db));
