<?php
// Total number of seats in the restaurant
$totalSeats = 45;

// Number of seats occupied by customers
$occupiedSeats = 28;

// Calculate the number of empty seats
$emptySeats = $totalSeats - $occupiedSeats;

// Calculate the percentage of empty seats
$emptyPercentage = ($emptySeats / $totalSeats) * 100;

// Display the result
echo "Total seats in the restaurant: {$totalSeats} <br>";
echo "Occupied seats: {$occupiedSeats} <br>";
echo "Empty seats: {$emptySeats} <br>";
echo "Percentage of empty seats: " . number_format($emptyPercentage, 1) . "%<br>";
