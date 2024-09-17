<?php
$a = 10;
$b = 5;
$c = $a + 5;
$d = $b + (10 * 5);
$e = $d - $c;

echo "Variable a: {$a} <br>";
echo "Variable b: {$b} <br>";
echo "Variable c: {$c} <br>";
echo "Variable d: {$d} <br>";
echo "Variable e: {$e} <br>";

var_dump($e);
echo "<br>";
echo "<br>";

$nilaiMatematika = 5.1;
$nilaiIpa = 6.7;
$nilaiBahasaIndonesia = 9.3;

$rataRata = ($nilaiIpa + $nilaiBahasaIndonesia + $nilaiMatematika) / 3;

echo "Matematika: {$nilaiMatematika} <br>";
echo "Ipa: {$nilaiIpa} <br>";
echo "Bahasa Indonesia: {$nilaiBahasaIndonesia} <br>";
echo "Rata - rata: {$rataRata} <br>";

var_dump($rataRata);
echo "<br>";
echo "<br>";

$apakahSiswaLulus = true;
$apakahSiswaSudahUjian = false;

var_dump(($apakahSiswaLulus));
echo "<br>";
var_dump($apakahSiswaSudahUjian);
echo "<br>";
echo "<br>";

$namaDepan = "Ibnu";
$namaBelakang = "Jakarta";

$namaLengkap = "{$namaDepan} {$namaBelakang}";
$namaLengkap2 = $namaDepan . ' ' . $namaBelakang;

echo "Nama Depan: {$namaDepan} <br>";
echo 'Nama Belakang: ' . $namaBelakang . '<br>';

echo $namaLengkap2;

echo '<br>';
echo  '<br>';

$listMahasiswa = ["Wahif Abdullah", "Elmo Bachtiar", "Lendis Fabri"];
echo $listMahasiswa[0];

