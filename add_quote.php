<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add A Quotation</title>
</head>
<body>
<?php 
// Script 11.1 - add_quote.php

// Identify the file to use
$file = '../quotes.txt';

// Check for a form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    // Make sure the user entered something and it's not the placeholder text
    if (!empty($_POST['quote']) && ($_POST['quote'] != 'Enter your quotation here.')) { 

        // Confirm that the file is writable
        if (is_writable($file)) { 

            // Write the data to the file, appending a newline and locking the file
            file_put_contents($file, $_POST['quote'] . PHP_EOL, FILE_APPEND | LOCK_EX); 

            // Print message
            print '<p>Your quotation has been stored.</p>';

        } else { 
            // Could not open the file
            print '<p style="color: red;">Your quotation could not be stored due to a system error.</p>';
        }

    } else { 
        // Failed to enter a quotation
        print '<p style="color: red;">Please enter a quotation!</p>';
    }

} 

// Leave PHP and display the form
?>

<form action="add_quote.php" method="post">
    <textarea name="quote" rows="5" cols="30" placeholder="Enter your quotation here."></textarea><br>
    <input type="submit" name="submit" value="Add This Quote!">
</form>

</body>
</html>