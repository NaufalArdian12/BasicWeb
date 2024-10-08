<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form input PHP</title>
</head>
<body>
  <h2>Form input PHP</h2>
  <?php
  $namaErr = "";
  $nama = "";
  //inisialisasi Variabel
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //validasi nama
    if (empty( $_POST["nama"])){
      $namaErr = "Nama harus diisi";
    } else {
      $nama = $_POST["nama"];
      echo "Data berhasil disimpan";
    }
  }
  ?>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <table for="nama">Nama :</table>
      <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>">
      <span class="error"><?php echo $namaErr; ?></span> <br><br>

      <input type="submit" name="submit" value="submit">
  </form>
</body>
</html>