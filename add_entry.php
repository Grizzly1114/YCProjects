<?php
include "mysql_connect.php"; // use $conn from mysql_connect.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['title']) && !empty($_POST['entry'])) {
        $title = trim(strip_tags($_POST['title']));
        $entry = trim(strip_tags($_POST['entry']));

        $stmt = $conn->prepare("INSERT INTO entries (title, entry, date_entered) VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $title, $entry);

        if ($stmt->execute()) {
            echo "<p>Blog entry added!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $conn->close();

    } else {
        echo "<p style='color:red;'>Please submit both a title and an entry.</p>";
    }
}
?>
<form action="add_entry.php" method="post">
    <p>Title: <input type="text" name="title" maxlength="100"></p>
    <p>Entry: <textarea name="entry" rows="5"></textarea></p>
    <input type="submit" value="Post Entry">
</form>