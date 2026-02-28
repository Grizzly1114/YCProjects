<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>No Soup for You!</title>
</head>
<body>
<h1>Mmm ... soups</h1>

<?php
// Script 7.2 - soups2.php
/* This script creates and prints out an array. */

// Create the array:
$soups = [
    'Monday'    => 'Clam Chowder',
    'Tuesday'   => 'White Chicken Chili',
    'Wednesday' => 'Vegetarian'
];

// Count and print the current number of elements:
$count1 = count($soups);
print "<p>The soups array originally had $count1 elements.</p>";

// Add three items to the array:
$soups['Thursday']  = 'Chicken Noodle';
$soups['Friday']    = 'Tomato';  
$soups['Saturday']  = 'Cream of Broccoli';
$soups['Sunday']  = 'Cream of Spinach';

// Count and print the number of elements again:
$count2 = count($soups);
print "<p>After adding 3 more soups, the array now has $count2 elements.</p>";

// Print the contents of the array:
echo '<pre>';
print_r($soups);
echo '</pre>';
?>
</body>
</html>