<?php

$conn = new mysqli("localhost", "root", "762X51mmNato$", "myblog");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
