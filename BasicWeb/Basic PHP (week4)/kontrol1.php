<?php
// Array of grades from 10 students
$grades = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

// Sort the grades in ascending order
sort($grades);

// Remove the two lowest grades
array_shift($grades);  // Removes the first (smallest) element
array_shift($grades);  // Removes the second (next smallest) element

// Remove the two highest grades
array_pop($grades);    // Removes the last (largest) element
array_pop($grades);    // Removes the second last (next largest) element

// Calculate the total score of the remaining grades
$totalScore = array_sum($grades);

// Calculate the average grade
$averageGrade = $totalScore / count($grades);

// Display the total score and the average grade
echo "<br><br>";
echo "Total score after ignoring the highest and lowest grades: $totalScore <br>";
echo "Average grade after ignoring the highest and lowest grades: " . number_format($averageGrade, 2);
