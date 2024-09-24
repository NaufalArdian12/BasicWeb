<?php

  // $pesan = "saya arek malang";
  // echo strrev($pesan) . "<br>";

// $pesan = "saya arek malang";  // Original string

// # Convert the string into an array using explode
// $pesanPerKata = explode(" ", $pesan);  // Splits the string into words based on spaces

// # Reverse each word in the array
// $pesanPerKata = array_map(fn($pesan) => strrev($pesan), $pesanPerKata);  // Applies strrev to reverse each word

// # Join the array back into a string using implode
// $pesan = implode(" ", $pesanPerKata);  // Joins the reversed words back into a string

// # Output the final result
// echo $pesan . "<br>";


echo '<html>';  // Outputs the opening <html> tag
echo '<head><title>Cara02</title></head>';  // Outputs the <head> section with a title "Cara02"
echo '<body>';  // Outputs the opening <body> tag

// Outputs the current date using the date() function in the 'd M Y' format
echo '<p>Tanggal Hari ini : ' . date('d M Y') . '</p>';  

echo '</body>';  // Outputs the closing </body> tag
echo '</html>';  // Outputs the closing </html> tag
?>