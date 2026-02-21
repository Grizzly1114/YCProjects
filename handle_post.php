<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forum Posting Results</title>
</head>
<body>

<?php
// Script 5.2 - handle_post.php
// This script receives values from posting.html

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the values from the form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $posting = $_POST['posting'];

    // Create a full name variable
    $name = $first_name . " " . $last_name;

    // print a message
	print "<div>Thank you, $name, for your posting:
	<p>$posting</p></div>";
	
?>
</body>
</html>
