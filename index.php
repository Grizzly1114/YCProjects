<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a Blog Entry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        h1 {
            color: #333;
        }
        textarea, input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #2F80ED;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #1366D6;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

<h1>Add a Blog Entry</h1>

<form action="add_entry.php" method="post">
    <label for="title">Entry Title:</label>
    <input type="text" id="title" name="title" maxlength="100" placeholder="Enter title here">

    <label for="entry">Entry Text:</label>
    <textarea id="entry" name="entry" rows="8" placeholder="Write your blog entry here..."></textarea>

    <input type="submit" value="Post This Entry!">
</form>

</body>
</html>