<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>No Soup for You</title>
</head>
<body>
<h1>Mmm ... soups</h1>

<?php
// Script 7.1 - soups1.php
/* This script creates and prints out an array. */

// Create the array:
$soups = [
    "Monday"    => "Clam Chowder",
    "Tuesday"   => "White Chicken Chili",
    "Wednesday" => "Vegetarian",
    "Thursday"  => "Loaded Potatoe",
    "Friday"    => "Black Bean Chili",
    "Saturday"  => "Beef noodle",
    "Sunday"    => "Broccoli Cheddar"
];

// Print the contents of the array nicely:
foreach ($soups as $day => $soup) {
    echo "<p>$day: $soup</p>";
}
?>

</body>
</html>