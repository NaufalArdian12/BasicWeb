<?php
// Player's points
$points = 550; // Example value; you can change this to test different scenarios

// Display the player's total score
echo "Player's total score is: {$points}<br>";

// Check if the player gets additional rewards
if ($points > 500) {
    // If points are greater than 500, the player gets additional rewards
    echo "Do players get additional rewards? YES";
} else {
    // If points are 500 or less, the player does not get additional rewards
    echo "Do players get additional rewards? NO";
}
