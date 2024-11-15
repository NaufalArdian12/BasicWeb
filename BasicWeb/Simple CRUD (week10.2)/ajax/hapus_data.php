<?php
session_start();
include 'koneksi.php';
include 'csrf.php';

$payload = json_decode(file_get_contents('php://input'));
$id =stripslashes(strip_tags(htmlspecialchars($payload->id, ENT_QUOTES)));
// $id = $_POST['id'];

$query = "DELETE FROM anggota WHERE id=?";
$sql = $dbl->prepare($query);
$sql->bind_param("i", $id);
$sql->execute();

echo json_encode(['success' => 'Sukses']);

$dbl->close();
?>
