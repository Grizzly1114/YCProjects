<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cost Calculator</title>
</head>
<body>
<?php
// Script 10.4 - calculator1.php

// This function performs the calculations.
function calculate_total($quantity, $price) {
    $total = $quantity * $price; // Calculation
    $total = number_format($total, 2); // Formatting
    return $total; // Return the value.
} // End of function

// Check for a form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Check for numeric values
    if (is_numeric($_POST['quantity']) && is_numeric($_POST['price'])) {

        // Call the function and print the result
        $total = calculate_total($_POST['quantity'], $_POST['price']);
        print "<p>Your total comes to $<span style=\"font-weight: bold;\">$total</span>.</p>";

    } else { // Inappropriate values
        print '<p style="color: red;">Please enter a valid quantity and price!</p>';
    }

}
?>

<form action="" method="post">
    <p>Quantity: <input type="text" name="quantity" size="3"></p>
    <p>Price: <input type="text" name="price" size="5"></p>
    <input type="submit" name="submit" value="Calculate!">
</form>
</body>
</html>