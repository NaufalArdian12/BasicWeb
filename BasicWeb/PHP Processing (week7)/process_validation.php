<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil data input dari form
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $errors = array();

  // Validasi Nama
  if (empty($nama)) {
    $errors[] = "Nama harus diisi.";
  }

  // Validasi Email
  if (empty($email)) {
    $errors[] = "Email harus diisi.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format email tidak valid.";
  }

  // Jika ada kesalahan validasi
  if (!empty($errors)) {
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  } else {
    // Lanjutkan dengan pemrosesan data jika validasi berhasil
    // Misalnya, simpan ke database atau kirim email
    echo "Data berhasil dikirim: Nama = $nama, Email = $email";
  }
}
?>
