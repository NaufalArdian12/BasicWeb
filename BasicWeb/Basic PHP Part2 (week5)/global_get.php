<?php
$nama = @$_GET['nama'];  // Retrieves the 'nama' parameter from the URL and suppresses the error if it is not set
$usia = @$_GET['usia'];  // Retrieves the 'usia' parameter from the URL and suppresses the error if it is not set

echo "Halo {$nama}! Apakah benar anda berusia {$usia} tahun?";  // Displays the name and age
?>
