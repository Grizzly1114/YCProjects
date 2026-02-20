<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Forum Posting</title>
</head>
<body>
<?php 
// Script 5.5 - handle_post.php
/* This script receives five values from posting.html:
first_name, last_name, email, posting, submit */

// 1. Get the values from the $_POST array:
$first_name = $_POST['first_name'];
$last_name  = $_POST['last_name'];
$email      = $_POST['email'];
$posting    = nl2br($_POST['posting']); // Converts newlines to <br> tags

// 2. Create a full name variable:
$name = $first_name . " " . $last_name;

// 3. Print a message:
print "<div>Thank you, $name, for your posting:
<p>$posting</p></div>";

// 4. Make a link to another page using urlencode:
$encoded_name  = urlencode($name);
$encoded_email = urlencode($email);

print "<p>Click <a href='thanks.php?name=$encoded_name&email=$encoded_email'>here</a> to continue.</p>";
?>
</body>
</html>
