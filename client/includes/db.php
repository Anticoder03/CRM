<?php
// db.php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "CRM";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to utf8 (optional but recommended)
$conn->set_charset("utf8");

?>
