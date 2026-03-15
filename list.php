<?php
//-- EMAILBOOK LIST PAGE --
// Includes the database connection file and displays all contacts in a table
include('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>EmailBook List</title>
    <!-- Link to your CSS file -->
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
<h2>Stored Contacts</h2>

<?php
// Retrieve all contacts from the database
$result = $conn->query("SELECT * FROM contacts");

// Display contacts in a table
echo "<table>";
echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Action</th></tr>";

// Loop through each record and display
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['first_name']."</td>";
    echo "<td>".$row['last_name']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td><a class='delete-btn' href='delete.php?id=".$row['id']."'>Delete</a></td>";
    echo "</tr>";
}
echo "</table>";
?>

<!-- Link to add new contact -->
<p><a href="index.php">Add New Contact</a></p>
</main>

<!-- Footer -->
<footer>
    <p>© 2026 Anthony Battista. All rights reserved.</p>
</footer>

</body>
</html>