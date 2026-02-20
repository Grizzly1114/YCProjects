<?php
// Script 4.2 - handle_calc.php
// This script takes values from calculator.html and performs total cost and monthly payment calculations.

// Get the values from the POST array and validate them
$price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
$discount = isset($_POST['discount']) ? floatval($_POST['discount']) : 0;
$tax = isset($_POST['tax']) ? floatval($_POST['tax']) : 0;
$shipping = isset($_POST['shipping']) ? floatval($_POST['shipping']) : 0;
$payments = isset($_POST['payments']) ? intval($_POST['payments']) : 1;

// Calculate the subtotal
$total = ($price * $quantity) - $discount + $shipping;

// Apply tax
$tax_rate = $tax / 100;
$total_with_tax = $total * (1 + $tax_rate);

// Calculate monthly payments
$monthly = $total_with_tax / $payments;

// Display the results
echo "<h2>Calculation Results</h2>";
echo "Subtotal (before tax and shipping): $" . number_format($price * $quantity, 2) . "<br>";
echo "Discount: $" . number_format($discount, 2) . "<br>";
echo "Shipping: $" . number_format($shipping, 2) . "<br>";
echo "Tax: " . number_format($tax, 2) . "%<br>";
echo "<strong>Total Cost: $" . number_format($total_with_tax, 2) . "</strong><br>";
echo "Monthly Payment (" . $payments . " payments): $" . number_format($monthly, 2) . "<br>";
?>
