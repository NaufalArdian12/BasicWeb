<?php
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
  echo"Nilai Huruf: A";
} else if ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
  echo "Nilai Huruf: B";
} else if ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
  echo "Nilai Huruf: C";
} else if ($nilaiNumerik < 70) {
  echo "Nilai Huruf: D";
}

$jarakSaatIni = 0;          // Current distance
$jarakTarget = 500;         // Target distance
$peningkatanHarian = 30;    // Daily increase in distance
$hari = 0;                  // Days counter

// Loop until the current distance reaches the target distance
while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian; // Increase the distance daily
    $hari++;                             // Increment the day counter
}

// Display the result in a neat format
echo "<p>Atlet tersebut memerlukan <strong>$hari</strong> hari untuk mencapai jarak <strong>500 kilometer</strong>.</p>";

$jumlahLahan = 10;
$tanamanPerLahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i = 0; $i <= $jumlahLahan; $i++) {
  $jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
}

echo "Jumlah buah yang akan dipanen adalah: {$jumlahBuah}";

$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
  $totalSkor += $skor;
}

echo "<br>";
echo "<br>";
echo "Total Skor Ujian adaalah: $totalSkor";
echo "<br>";
echo "<br>";


$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

foreach ($nilaiSiswa as $nilai) {
  if ($nilai < 60) {
    echo"Nilai: $nilai (tidak lulus <br>";
    continue;
  }
  echo"Nilai: $nilai (lulus) <br>";
}