<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forum Posting with String Functions</title>
</head>
<body>
<?php
//handle_post.php modified to demonstrate string functions

// Get the values from the $_POST array
$first_name = $_POST['first_name'];
$last_name  = $_POST['last_name'];
$email      = $_POST['email'];
$posting    = nl2br($_POST['posting']);

// 1. strcmp() compares first name and last name alphabetically
$comparison = strcmp($first_name, $last_name);
if ($comparison === 0) {
    $cmp_text = "Your first and last name are the same!";
} elseif ($comparison < 0) {
    $cmp_text = "Alphabetically, your first name comes before your last name.";
} else {
    $cmp_text = "Alphabetically, your last name comes before your first name.";
}

// 2. str_replace() replaces a part of the first name or last name
$modified_first = str_replace("Anthony", "Tony", $first_name);
$modified_last  = str_replace("Battista", "B.", $last_name);

// 3. substr() takes a snippet of the posting and name
$name_snippet    = substr($first_name . " " . $last_name, 0, 5);

//  Get a snippet of the posting
$posting_snippet = substr(strip_tags($posting), 0, 50);

// Word count of the posting
$words = str_word_count(strip_tags($posting));

// rint message
print "<h3>String Function Demonstration</h3>";

print "<p><strong>strcmp() result:</strong> $cmp_text</p>";

print "<p><strong>str_replace() result:</strong> Your modified name is $modified_first $modified_last</p>";

print "<p><strong>substr() result:</strong> First 5 characters of your name: $name_snippet</p>";

print "<p><strong>Posting snippet:</strong> $posting_snippet...</p>";
print "<p>($words words in your posting)</p>";

?>
</body>
</html>