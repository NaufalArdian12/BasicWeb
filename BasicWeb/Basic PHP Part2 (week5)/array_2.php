<?php
$Dosen = [
    'name' => 'Elok Nur Hamdana',
    'city' => 'Malang',
    'gender' => 'Perempuan',
    'Address' =>'Jl. Kampung Melaku'
];

// Displaying array using keys
// echo "Name: " . $Dosen['name'] . "<br>";
// echo "City: " . $Dosen['city'] . "<br>";
// echo "gender: " . $Dosen['gender'] . "<br>";
// echo "gender: " . $Dosen['gender'] . "<br>";

echo "<table border='1'>";
foreach ($Dosen as $key => $value) {
    echo "<tr><td>$key</td><td>$value</td></tr>";
}
?>