<?php
/*
-- EMAILBOOK PROCESS PAGE --
Receives form data from index.php, validates email, and inserts into database
*/
include('db_connect.php');

// Collect POST data from form
$first = $_POST['first_name'];
$last  = $_POST['last_name'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

// Insert into database using prepared statement
$sql = "INSERT INTO contacts (first_name,last_name,address,city,state,phone,email) VALUES (?,?,?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss",$first,$last,$address,$city,$state,$phone,$email);
$stmt->execute();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Record Saved</title>
    <link rel="stylesheet" type="text/css" href="page.css">
</head>
<body>

<!-- Header -->
<header>
    <h1>EmailBook Project</h1>
    <p>Author: Anthony Battista | © 2026</p>
</header>

<!-- Main content -->
<main>
    <h2>Record Saved!</h2>
    <p><a href="list.php">View Stored Contacts</a></p>
    <p><a href="index.php">Add Another Contact</a></p>
</main>

<!-- Footer -->
<footer>
    <p>© 2026 Anthony Battista. All rights reserved.</p>
</footer>

</body>
</html>