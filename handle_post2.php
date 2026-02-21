<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forum Posting Results</title>
</head>
<body>

<?php
// Script 5.3 - handle_post2.php
// This script receives values from posting.html

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the values from the form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    
	// Converts lines to breaks
	$posting = nl2br($_POST['posting'], false);

    // Create a full name variable
    $name = $first_name . " " . $last_name;

    // print a message
	print "<div>Thank you, $name, for your posting:
	<p>$posting</p></div>";

}	

?>

</body>
</html>