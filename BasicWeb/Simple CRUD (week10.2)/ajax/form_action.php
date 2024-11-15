<?php
session_start();
include 'koneksi.php';
include 'csrf.php'; // Include CSRF protection

$payload = json_decode(file_get_contents('php://input'));

// Sanitize and validate input data
// $id = stripslashes(strip_tags(htmlspecialchars($_POST['id'], ENT_QUOTES)));
// $nama = stripslashes(strip_tags(htmlspecialchars($_POST['nama'], ENT_QUOTES)));
// $jenis_kelamin = stripslashes(strip_tags(htmlspecialchars($_POST['jenis_kelamin'], ENT_QUOTES)));
// $alamat = stripslashes(strip_tags(htmlspecialchars($_POST['alamat'], ENT_QUOTES)));
// $no_telp = stripslashes(strip_tags(htmlspecialchars($_POST['no_telp'], ENT_QUOTES)));

$id = "";
if(!isset($payload->id)){
    $id =stripslashes(strip_tags(htmlspecialchars($payload->id, ENT_QUOTES)));
}

$nama = stripslashes(strip_tags(htmlspecialchars($payload->nama, ENT_QUOTES)));
$jenis_kelamin = stripslashes(strip_tags(htmlspecialchars($payload->jenis_kelamin, ENT_QUOTES)));
$alamat = stripslashes(strip_tags(htmlspecialchars($payload->alamat, ENT_QUOTES)));
$no_telp = stripslashes(strip_tags(htmlspecialchars($payload->no_telp, ENT_QUOTES)));

// Check if the ID is empty (for inserting new data)
try {
    if ($id == "") {
        // Prepare the query for inserting data
        $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES (?, ?, ?, ?)";
        $sql = $dbl->prepare($query);
        $sql->bind_param("ssss", $nama, $jenis_kelamin, $alamat, $no_telp);
        $sql->execute();
    } else {
        // Prepare the query for updating existing data
        $query = "UPDATE anggota SET nama=?, jenis_kelamin=?, alamat=?, no_telp=? WHERE id=?";
        $sql = $dbl->prepare($query);
        $sql->bind_param("ssssi", $nama, $jenis_kelamin, $alamat, $no_telp, $id);
        $sql->execute();
    }
    // Return success response
    echo json_encode(['success' => 'Sukses']);
} catch (Exception $e) {
    echo json_encode(['error' => "Error: " . $e->getMessage()]);
} finally {
    // Close the database connection
    $dbl->close();
}
