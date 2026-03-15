<?php
/*
-- EMAILBOOK FORM PAGE --
Includes the database connection file to allow form processing in process.php
*/
 include('db_connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>EmailBook Form</title>
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
<h2>Enter Contact</h2>
<!-- Form to collect contact information -->
<form method="post" action="process.php">
  First Name: <input type="text" name="first_name" required><br>
  Last Name: <input type="text" name="last_name" required><br>
  Address: <input type="text" name="address" required><br>
  City: <input type="text" name="city" required><br>
  State: <input type="text" name="state" maxlength="2" required><br>
  Phone: <input type="text" name="phone" required><br>
  Email: <input type="email" name="email" required><br>
  <input type="submit" value="Submit">
</form>
<!-- Link to view all stored contacts -->
<a href="list.php">View Stored Contacts</a>
</main>

<!-- Footer -->
<footer>
    <p>© 2026 Anthony Battista. All rights reserved.</p>
</footer>
</body>
</html>
