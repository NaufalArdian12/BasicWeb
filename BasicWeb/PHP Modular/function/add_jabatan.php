<?php
session_start();

require '../config/koneksi.php';
require '../function/flasher.php';
require '../function/anti_injection.php';

// Check if user is logged in
if (!empty($_SESSION['username'])) {
    // Process form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $jabatan = antiinjection($koneksi, $_POST['jabatan']);
        $keterangan = antiinjection($koneksi, $_POST['keterangan']);
        
        $query = "INSERT INTO jabatan (jabatan, keterangan) VALUES ('$jabatan', '$keterangan')";
        
        if (mysqli_query($koneksi, $query)) {
            pesan('success', "Jabatan berhasil ditambahkan.");
        } else {
            pesan('danger', "Gagal menambahkan jabatan. Kesalahan: " . mysqli_error($koneksi));
        }
        
        // Redirect to jabatan page after processing
        header("Location: ../index.php?page=jabatan");
        exit();
    }
} else {
    // Redirect to login page if user is not logged in
    header("Location: ../index.php?page=login");
    exit();
}
