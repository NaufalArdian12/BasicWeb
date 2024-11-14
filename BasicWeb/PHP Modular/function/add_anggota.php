<?php
session_start();

require '../config/koneksi.php';
require '../function/flasher.php';
require '../function/anti_injection.php';

// Check if user is logged in
if (!empty($_SESSION['username'])) {
    // Process form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = antiinjection($koneksi, $_POST['username']);
        $password = antiinjection($koneksi, $_POST['password']);
        $level = antiinjection($koneksi, $_POST['level']);
        $nama = antiinjection($koneksi, $_POST['nama']);
        $jenis_kelamin = antiinjection($koneksi, $_POST['jenis_kelamin']);
        $alamat = antiinjection($koneksi, $_POST['alamat']);
        $no_telp = antiinjection($koneksi, $_POST['no_telp']);
        $jabatan_id = antiinjection($koneksi, $_POST['jabatan_id']);

        // Generate salt and hashed password
        $salt = bin2hex(random_bytes(16));
        $combined_password = $salt . $password;
        $hashed_password = password_hash($combined_password, PASSWORD_BCRYPT);

        // Insert into 'user' table
        $query = "INSERT INTO user (username, password, salt, level) VALUES ('$username', '$hashed_password', '$salt', '$level')";

        if (mysqli_query($koneksi, $query)) {
            $user_id = mysqli_insert_id($koneksi); // Get the last inserted user ID

            // Insert into 'anggota' table
            $query2 = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp, user_id, jabatan_id) 
                       VALUES ('$nama', '$jenis_kelamin', '$alamat', '$no_telp', '$user_id', '$jabatan_id')";
            
            if (mysqli_query($koneksi, $query2)) {
                pesan('success', 'Anggota baru berhasil ditambahkan.');
            } else {
                pesan('warning', 'Gagal menambahkan anggota tetapi data login tersimpan. Kesalahan: ' . mysqli_error($koneksi));
            }
        } else {
            pesan('danger', 'Gagal menambahkan anggota. Kesalahan: ' . mysqli_error($koneksi));
        }

        // Redirect to anggota page after processing
        header("Location: ../index.php?page=anggota");
        exit();
    }
} else {
    // Redirect to login page if user is not logged in
    header("Location: ../index.php?page=login");
    exit();
}
