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
// Script 4.2 - handle_calc.php
/* This script takes values from calculator.html and performs total cost and monthly payment calculations. */

// Get values from POST
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$discount = $_POST['discount'];
$tax = $_POST['tax'];
$shipping = $_POST['shipping'];
$payments = $_POST['payments'];

// Do the calculations
$total = ($price * $quantity) - $discount + $shipping;
$total_with_tax = $total * (1 + $tax / 100);
$monthly = $total_with_tax / $payments;

// Print out the results:
print "<p>You have selected to purchase:<br>
<span class=\"number\">$quantity</span> widget(s) at <span class=\"number\">$price</span> price each plus a<br>
<span class=\"number\">$shipping</span> shipping cost and a<br>
<span class=\"number\">$tax</span>% tax rate.<br>
After your $<span class=\"number\">$discount</span> discount, the total cost is $<span class=\"number\">$total_with_tax</span>.<br>
Divided over <span class=\"number\">$payments</span> monthly payments, that would be $<span class=\"number\">$monthly</span> each.</p>";

?>
</body>
</html>
