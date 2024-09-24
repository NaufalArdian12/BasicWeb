<!DOCTYPE HTML>
<html>
<head></head>
<body>
  <h3>Date</h3>
  
  <?php
  echo "Today is " . date("Y/m/d") . "<br>";  // Format: Year/Month/Day (e.g., 2023/09/25)
  echo "Today is " . date("Y.m.d") . "<br>";  // Format: Year.Month.Day (e.g., 2023.09.25)
  echo "Today is " . date("Y-m-d") . "<br>";  // Format: Year-Month-Day (e.g., 2023-09-25)
  echo "Today is " . date("l");               // Format: Full name of the day (e.g., Monday)
  ?>
  
</body>
</html>
