<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forum Posting Results</title>
</head>
<body>

<?php
// Script 5.4 - handle_post3.php
// This script receives values from posting.html

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the values from the form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $posting = $_POST['posting'];

    // Create a full name variable
    $name = $first_name . " " . $last_name;
	
	// Adjust for html tags
	$html_post = htmlentities($_POST['posting']);
	$strip_post = strip_tags($_POST['posting']);

    // print a message
	print "<div>Thank you, $name, for your posting:
	<p>Original: $posting</p>
	<p>Entity: $html_post</p>
	<p>Stripped: $strip_post</p></div>";
	
}
	
?>
</body>
</html>
