<?php
$servername = "localhost"; // Server name
$username = "root";      // Username database
$password = "762X51mmNato$";  // Password datebase
$dbname = "emailbook_db"; // SQL created database

// Creates the connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checks connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

?>
