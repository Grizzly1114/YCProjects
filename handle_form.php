<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Your Feedback</title>
</head>
<body>
<?php
// Script 3.3 handle_form.php

// This page receives data from feedback.html
// It will receive: title, first_name, last_name, email, response, comments in $_POST

// Get form values safely (avoids warnings if keys are missing)
$title      = $_POST['title'];
$first_name = $_POST['first_name'];
$last_name  = $_POST['last_name'];
$response   = $_POST['response'];
$comments   = $_POST['comments'];

// Prints the received data:
print "<p>Thank you, $first_name $last_name, for your comments.</p>";
print "<p>You stated that you found this example to be '$response' and added:<br>$comments</p>";