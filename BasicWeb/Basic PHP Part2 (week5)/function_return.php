<?php
function hitungUmur($thn_lahir, $thn_sekarang){
  $umur = $thn_sekarang - $thn_lahir;
  return $umur;
}
function perkenalan($nama, $salam = "Assalamualaikum") {
  echo $salam . ", ";  // Menampilkan ucapan salam (bisa default atau dari argumen)
  echo "Perkenalkan, nama saya " . $nama . "<br>";  // Menampilkan perkenalan

  echo "Saya berusia ". hitungUmur(1998, 2023) ." tahun <br>";
  echo "Senang berkenalan dengan Anda<br><br>";
}

perkenalan("Nopal");
?>