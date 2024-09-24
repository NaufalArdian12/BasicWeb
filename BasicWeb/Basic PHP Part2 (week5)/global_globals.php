<?php
$x = 75;
$y = 25;

function addition() {
  $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];  // Access global variables and store the result in $z
}

addition();  // Call the function
echo $z;     // Output the value of $z
?>
