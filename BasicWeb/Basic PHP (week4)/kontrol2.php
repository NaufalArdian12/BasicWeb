<?php
// Initial price of the product
$initialPrice = 120000;

// Discount rate (20%)
$discountRate = 20;

// Check if the initial price qualifies for the discount
if ($initialPrice > 100000) {
    // Calculate the discount amount
    $discountAmount = ($discountRate / 100) * $initialPrice;

    // Calculate the final price after discount
    $finalPrice = $initialPrice - $discountAmount;

    // Display the discount amount and the final price
    echo "<br><br>";
    echo "Initial Price: Rp " . number_format($initialPrice, 0, ',', '.') . "<br>";
    echo "Discount: Rp " . number_format($discountAmount, 0, ',', '.') . " ({$discountRate}%)<br>";
    echo "Final Price to be Paid: Rp " . number_format($finalPrice, 0, ',', '.');
} else {
    // If the price does not qualify for the discount
    echo "<br><br>";
    echo "No discount applied.<br>";
    echo "Price to be Paid: Rp " . number_format($initialPrice, 0, ',', '.');
}