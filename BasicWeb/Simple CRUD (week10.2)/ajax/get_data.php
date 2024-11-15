<?php
session_start();
include 'koneksi.php';
include 'csrf.php'; // Include CSRF protection

// Get the id from POST data
$id = $_POST['id'];

// SQL query to fetch data from the 'anggota' table by id
$query = "SELECT * FROM anggota WHERE id=? ORDER BY id DESC";
$sql = $dbl->prepare($query);
$sql->bind_param('i', $id);  // Bind the id parameter
$sql->execute();

// Get the result of the query
$res1 = $sql->get_result();

// Fetch each row from the result and store it in the array
while ($row = $res1->fetch_assoc()) {
    $h['id'] = $row['id'];
    $h['nama'] = $row['nama'];
    $h['jenis_kelamin'] = $row['jenis_kelamin'];
    $h['alamat'] = $row['alamat'];
    $h['no_telp'] = $row['no_telp'];
}

// Return the result as a JSON object
echo json_encode($h);

// Close the database connection
$dbl->close();
?>
