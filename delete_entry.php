<?php
include "mysql_connect.php";

if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    // POST request: perform deletion
    $id = intval($_POST['id']);
    $stmt = $conn->prepare("DELETE FROM entries WHERE id=? LIMIT 1");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        // Redirect immediately after successful deletion
        header("Location: view_entries.php");
        exit;
    } else {
        echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
        $stmt->close();
    }

} elseif (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // GET request: show confirmation form
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT title, entry FROM entries WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($title, $entry);
    $stmt->fetch();
    $stmt->close();

    if ($title) {
        echo "<p>Are you sure you want to delete:</p>
        <h3>" . htmlentities($title) . "</h3>
        <p>" . htmlentities($entry) . "</p>
        <form method='post' action='delete_entry.php'>
            <input type='hidden' name='id' value='$id'>
            <input type='submit' name='submit' value='Delete Entry'>
        </form>";
    } else {
        echo "<p style='color:red;'>No entry found.</p>";
    }

} else {
    echo "<p style='color:red;'>Invalid access.</p>";
}
?>