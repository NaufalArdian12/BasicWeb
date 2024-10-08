<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan pilihan buah
    $selectedBuah = $_POST['buah'];

    // Mendapatkan warna favorit (jika dipilih)
    if (isset($_POST['warna'])) {
      $selectedWarna = $_POST['warna'];
    } else {
      $selectedWarna = [];
    }

    // Mendapatkan jenis kelamin
    $selectedJenisKelamin = $_POST['jenis_kelamin'];

    // Menampilkan hasil
    echo "Anda memilih buah: " . $selectedBuah . "<br>";

    if (!empty($selectedWarna)) {
      echo "Warna favorit Anda: " . implode(", ", $selectedWarna) . "<br>";
    } else {
      echo "Anda tidak memilih warna favorit.<br>";
    }

    echo "Jenis kelamin Anda: " . $selectedJenisKelamin;
  }
  ?>
