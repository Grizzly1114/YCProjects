<?php
//Script 3.7 hello.php

//Show all errors for learning
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Get the name from the URL
$name = isset($_GET['name']) ? $_GET['name'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Greetings!</title>
    <style type="text/css">
        .bold {
            font-weight: bolder;
        }
    </style>
</head>
<body>

<!-- Say hello -->
<p>Hello, <span class="bold"><?php echo htmlspecialchars($name); ?></span>!</p>

</body>
</html>
