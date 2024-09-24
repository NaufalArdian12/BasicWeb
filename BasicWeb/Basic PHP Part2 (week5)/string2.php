<?php
  // Using \n (newline) escape sequence inside double and single quotes
echo "Baris\nbaru <br>";  // Soal 10.a: \n creates a new line (works in HTML as whitespace but no visible newline)
echo 'Baris\nbaru <br>';  // Soal 10.b: \n inside single quotes is treated as literal text, not as a newline

// Using \r (carriage return) escape sequence
echo "Halo\rDunia <br>";  // Soal 10.c: \r is a carriage return, usually brings the cursor to the beginning of the line (might not be visible in HTML)
echo 'Halo\rDunia <br>';  // Soal 10.d: \r inside single quotes is treated as literal text, not as a carriage return

// Using the <pre> tag for formatted text
echo "<pre>Halo\tDunia!</pre>";  // Soal 10.e: \t (tab) is displayed inside the <pre> tag, which preserves whitespace and formatting
echo '<pre>Halo\tDunia!</pre>';  // Soal 10.f: Similar to the previous, but \t is treated as literal text in single quotes

// Using escape sequences to print quotes
echo "Katakanlah \"Tidak pada narkoba!\" <br>";  // Soal 10.g: Double quotes are escaped with \"
echo 'Katakanlah \"Tidak pada narkoba!\" <br>';  // Soal 10.h: \ is unnecessary in single quotes but prints the backslashes anyway
