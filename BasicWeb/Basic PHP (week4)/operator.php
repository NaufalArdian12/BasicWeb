<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$hasilPangkat = $a ** $b;

echo "Hasil Pangkat: {$hasilPangkat}";
echo '<br>';
echo "Hasil Bagi: {$hasilBagi}";
echo '<br>';
echo "Hasil kali: {$hasilKali}";
echo "<br>";
echo "Hasil Kurang: {$hasilKurang}";
echo "<br>";
echo "Hasil Tambah: {$hasilTambah}";

// Comparison operations
$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "<br>";
echo "<br>";


// Display the results
echo "Hasil Sama: " . ($hasilSama ? 'True' : 'False') . "<br>";
echo "Hasil Tidak Sama: " . ($hasilTidakSama ? 'True' : 'False') . "<br>";
echo "Hasil Lebih Kecil: " . ($hasilLebihKecil ? 'True' : 'False') . "<br>";
echo "Hasil Lebih Besar: " . ($hasilLebihBesar ? 'True' : 'False') . "<br>";
echo "Hasil Lebih Kecil Sama: " . ($hasilLebihKecilSama ? 'True' : 'False') . "<br>";
echo "Hasil Lebih Besar Sama: " . ($hasilLebihBesarSama ? 'True' : 'False') . "<br>";

echo "<br>";
echo "<br>";

// Logical operations
$hasilAnd = $a && $b; // Logical AND
$hasilOr = $a || $b;  // Logical OR
$hasilNotA = !$a;     // Logical NOT for $a
$hasilNotB = !$b;     // Logical NOT for $b

// Display the results
echo "Hasil AND (a && b): " . ($hasilAnd ? 'True' : 'False') . "<br>";
echo "Hasil OR (a || b): " . ($hasilOr ? 'True' : 'False') . "<br>";
echo "Hasil NOT A (!a): " . ($hasilNotA ? 'True' : 'False') . "<br>";
echo "Hasil NOT B (!b): " . ($hasilNotB ? 'True' : 'False') . "<br>";

echo "<br>";
echo "<br>";

$a += $b; // $a = $a + $b
echo "Setelah operasi +=, nilai a: {$a} <br>";

$a -= $b; // $a = $a - $b
echo "Setelah operasi -=, nilai a: {$a} <br>";

$a *= $b; // $a = $a * $b
echo "Setelah operasi *=, nilai a: {$a} <br>";

$a /= $b; // $a = $a / $b
echo "Setelah operasi /=, nilai a: {$a} <br>";

$a %= $b; // $a = $a % $b
echo "Setelah operasi %=, nilai a: {$a} <br>";

echo "<br>";
echo "<br>";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

// Display the results
echo "Hasil Identik (a === b): " . ($hasilIdentik ? 'True' : 'False') . "<br>";
echo "Hasil Tidak Identik (a !== b): " . ($hasilTidakIdentik ? 'True' : 'False') . "<br>";
?>
