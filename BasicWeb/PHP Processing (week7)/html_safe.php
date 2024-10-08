<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form Input PHP - Email Validation</title>
</head>
<body>
  <h2>Form Input PHP with Email Validation</h2>
  <?php
  $emailErr = "";
  $email = "";

  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if email is empty
    if (empty($_POST["email"])) {
      $emailErr = "Email harus diisi";  // "Email is required"
    } else {
      $email = $_POST["email"];
      
      // Validate email
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Format email tidak valid";  // "Invalid email format"
      } else {
        echo "Email berhasil disimpan dengan aman";  // "Email successfully saved"
      }
    }
  }
  ?>

  <!-- HTML Form -->
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="email">Email:</label>
    <input type="text" name="email" id="email" value="<?php echo $email; ?>">
    <span class="error" style="color:red;"><?php echo $emailErr; ?></span> <br><br>

    <input type="submit" name="submit" value="Submit">
  </form>
</body>
</html>
