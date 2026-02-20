<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Product Cost Calculator</title>
    <style type="text/css">
        .number { font-weight: bold; }
    </style>
</head>
<body>

<?php
// Script 4.4 - handle_calc3.php
/* This script takes values from calculator.html and performs total cost and monthly payment calculations. */

// address erro handling

// Get values from POST
$price = (float) $_POST['price'];
$quantity = (int) $_POST['quantity'];
$discount = (float) $_POST['discount'];
$tax = (float) $_POST['tax'];
$shipping = (float) $_POST['shipping'];
$payments = (int) $_POST['payments'];

// Calculate the total
$total = $price * $quantity +
$shipping - $discount;

// Determine the tax rate
$taxrate = ($tax / 100) + 1;

// Factor in tax rate
$total = $total * $taxrate;

// Calulate the monthly payment
$monthly = $total / $payments;

// Apply the proper formatting
$total = number_format($total, 2);
$monthly = number_format($monthly, 2);


// Print out the results:
print "<p>You have selected to purchase:<br>
<span class=\"number\">$quantity</span> widget(s) at <span class=\"number\">$price</span> price each plus a<br>
<span class=\"number\">$shipping</span> shipping cost and a<br>
<span class=\"number\">$tax</span>% tax rate.<br>
After your $<span class=\"number\">$discount</span> discount, the total cost is $<span class=\"number\">$total</span>.<br>
Divided over <span class=\"number\">$payments</span> monthly payments, that would be $<span class=\"number\">$monthly</span> each.</p>";

?>
</body>
</html>
