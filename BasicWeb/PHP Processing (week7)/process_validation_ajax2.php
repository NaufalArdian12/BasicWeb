<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil data input dari form
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
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

  // Validasi Password (Minimal 8 karakter)
  if (strlen($password) < 8) {
    $errors[] = "Password harus minimal 8 karakter.";
  }

  // Jika ada kesalahan validasi
  if (!empty($errors)) {
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  } else {
    // Lanjutkan dengan pemrosesan data jika validasi berhasil
    echo "Data berhasil dikirim: Nama = $nama, Email = $email, Password berhasil disimpan.";
  }
}
?>
