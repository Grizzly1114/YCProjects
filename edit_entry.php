<?php
include "mysql_connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && is_numeric($_POST['id'])) {
    // POST request: perform update
    $id = intval($_POST['id']);
    $title = $_POST['title'] ?? '';
    $entry = $_POST['entry'] ?? '';

    $stmt = $conn->prepare("UPDATE entries SET title = ?, entry = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $entry, $id);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        // Redirect with a success note
        header("Location: view_entries.php?status=edited");
        exit;
    } else {
        echo "<p style='color:red;'>Error updating entry: " . $stmt->error . "</p>";
        $stmt->close();
    }

} elseif (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // GET request: show edit form
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT title, entry FROM entries WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($title, $entry);
    $stmt->fetch();
    $stmt->close();

    if ($title) {
        echo "<form method='post' action='edit_entry.php'>
                <input type='hidden' name='id' value='$id'>
                <label>Title:</label><br>
                <input type='text' name='title' value='" . htmlentities($title) . "'><br>
                <label>Entry:</label><br>
                <textarea name='entry'>" . htmlentities($entry) . "</textarea><br>
                <input type='submit' value='Update Entry'>
              </form>";
    } else {
        echo "<p style='color:red;'>No entry found.</p>";
    }

} else {
    echo "<p style='color:red;'>Invalid access.</p>";
}
?>