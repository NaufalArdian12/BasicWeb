<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect value of the input field using $_REQUEST
  $name = $_REQUEST['fname'];
  
  if (empty($name)) {
    echo "Name is empty";  // Display this message if the input field is empty
  } else {
    echo $name;  // Output the name entered by the user
  }
}
?>

</body>
</html>
