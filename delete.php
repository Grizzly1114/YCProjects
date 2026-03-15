<?php
/*
-- EMAILBOOK DELETE PAGE --
Deletes a record based on ID passed via GET
*/
include('db_connect.php');

// Get the ID from URL
$id = $_GET['id'];

// Delete record
$conn->query("DELETE FROM contacts WHERE id=$id");

// Redirect back to list
header("Location: list.php");
exit;
?>