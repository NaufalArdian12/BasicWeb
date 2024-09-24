<html>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect value of the input field
  $name = $_POST['fname'];
  
  if (empty($name)) {
    echo "Name is empty";  // Display this message if no input is provided
  } else {
    echo $name;  // Output the name entered by the user
  }
}
?>

</body>
</html>
