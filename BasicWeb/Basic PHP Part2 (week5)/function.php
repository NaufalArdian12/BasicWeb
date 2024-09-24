<?php

// function perkenalan(){
//   echo "Assalamualaikum, ";
//   echo "Pekenalkan, nama saya Elok <br>";
//   echo "senang berkenalan dengan Anda <br> ";
// }

// perkenalan();
// perkenalan();

// Membuat fungsi dengan dua parameter
// function perkenalan($nama, $salam) {
//   echo $salam . ", ";  // Menampilkan ucapan salam
//   echo "Perkenalkan, nama saya " . $nama . "<br>";  // Menampilkan perkenalan
//   echo "Senang berkenalan dengan Anda<br><br>";  // Menampilkan pesan perkenalan
// }

// // Memanggil fungsi yang sudah dibuat dengan argumen "Hamdanah" dan "Hallo"
// perkenalan("Hamdanah", "Hallo");

// echo "<hr>";  // Membuat garis horizontal

// // Mendefinisikan variabel $saya dan $ucapanSalam
// $saya = "Elok";
// $ucapanSalam = "Selamat pagi";

// // Memanggil lagi fungsi perkenalan dengan variabel $saya dan $ucapanSalam
// perkenalan($saya, $ucapanSalam);

// Membuat fungsi dengan parameter $nama dan $salam, dengan default untuk $salam
function perkenalan($nama, $salam = "Assalamualaikum") {
  echo $salam . ", ";  // Menampilkan ucapan salam (bisa default atau dari argumen)
  echo "Perkenalkan, nama saya " . $nama . "<br>";  // Menampilkan perkenalan
  echo "Senang berkenalan dengan Anda<br><br>";  // Menampilkan pesan perkenalan
}

// Memanggil fungsi dengan argumen lengkap (nama dan salam)
perkenalan("Hamdanah", "Hallo");

echo "<hr>";  // Membuat garis horizontal

// Mendefinisikan variabel $saya dan $ucapanSalam
$saya = "Elok";
$ucapanSalam = "Selamat pagi";

// Memanggil lagi fungsi perkenalan dengan nama saja tanpa parameter salam
perkenalan($saya);  // Salam tidak diisi, akan menggunakan nilai default "Assalamualaikum"

