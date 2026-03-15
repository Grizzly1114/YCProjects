<?php
// Connect to MySQL
$dbc = mysqli_connect('localhost', 'root', '762X51mmNato$', 'myblog');
if (!$dbc) { die("Database connection failed: " . mysqli_connect_error()); }

// Handle Add Entry
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    if (!empty($_POST['title']) && !empty($_POST['entry'])) {
        $title = trim($_POST['title']);
        $entry = trim($_POST['entry']);
        $stmt = $dbc->prepare("INSERT INTO entries (title, entry, date_entered) VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $title, $entry);
        $stmt->execute();
        $stmt->close();
    }
}

// Handle Delete Entry
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = intval($_POST['id']);
    $stmt = $dbc->prepare("DELETE FROM entries WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Handle Edit Entry
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = intval($_POST['id']);
    $title = trim($_POST['title']);
    $entry = trim($_POST['entry']);
    $stmt = $dbc->prepare("UPDATE entries SET title = ?, entry = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $entry, $id);
    $stmt->execute();
    $stmt->close();
}

// Fetch all entries
$result = mysqli_query($dbc, "SELECT * FROM entries ORDER BY date_entered DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>My Blog</title>
<style>
body { font-family: Arial; margin: 30px; }
input, textarea { width: 100%; padding: 8px; margin: 5px 0 15px; box-sizing: border-box; }
input[type=submit] { width: auto; padding: 8px 20px; background-color: #2F80ED; color: white; border: none; cursor: pointer; }
input[type=submit]:hover { background-color: #1366D6; }
.entry { border-bottom: 1px solid #ccc; padding: 10px 0; }
.entry h3 { margin: 0; }
.entry p { margin: 5px 0; }
.entry small { color: #777; }
.entry form { display: inline-block; margin-right: 10px; }
</style>
</head>
<body>

<h1>Add a Blog Entry</h1>
<form method="post" action="add_entry.php">
    <input type="hidden" name="action" value="add">
    <label>Title:</label>
    <input type="text" name="title" maxlength="100" required>
    
    <label>Entry:</label>
    <textarea name="entry" rows="5" required></textarea>
    
    <input type="submit" value="Post Entry">
</form>

<h2>All Blog Entries</h2>
<?php
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="entry">
            <h3><?php echo htmlspecialchars($row['title']); ?></h3>
            <p><?php echo nl2br(htmlspecialchars($row['entry'])); ?></p>
            <small>Posted on <?php echo $row['date_entered']; ?></small>
            <br><br>

            <!-- Edit form -->
            <form method="post" action="add_entry.php">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>
                <textarea name="entry" rows="3" required><?php echo htmlspecialchars($row['entry']); ?></textarea>
                <input type="submit" value="Update">
            </form>

            <!-- Delete form -->
            <form method="post" action="add_entry.php" onsubmit="return confirm('Delete this entry?');">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="submit" value="Delete">
            </form>
        </div>
        <?php
    }
} else {
    echo "<p>No entries yet.</p>";
}
mysqli_close($dbc);
?>
</body>
</html>