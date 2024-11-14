<?php
session_start();

// Check if the user is logged in
if (!empty($_SESSION['username'])) {
    require '../config/koneksi.php';
    require '../function/flasher.php';
    require '../function/anti_injection.php';

    // Delete Jabatan Functionality
    if (!empty($_GET['jabatan'])) {
        $id = antiInjection($koneksi, $_GET['id']);
        
        // Query to delete the specified jabatan
        $query = "DELETE FROM jabatan WHERE id = '$id'";
        
        if (mysqli_query($koneksi, $query)) {
            // Success message if deletion succeeds
            pesan('success', "Jabatan telah terhapus.");
        } else {
            // Error message if deletion fails
            pesan('danger', "Jabatan tidak terhapus: " . mysqli_error($koneksi));
        }
        
        // Redirect to jabatan page after processing
        header("Location: ../index.php?page=jabatan");
        exit();
    }

    // Delete Anggota Functionality
    elseif (!empty($_GET['anggota'])) {
        $id = antiInjection($koneksi, $_GET['id']);

        // Step 1: Delete related records from 'anggota' table first
        $query1 = "DELETE FROM anggota WHERE user_id = '$id'";
        
        if (mysqli_query($koneksi, $query1)) {
            // Step 2: Now delete from 'user' table after related records are removed
            $query2 = "DELETE FROM user WHERE id = '$id'";
            
            if (mysqli_query($koneksi, $query2)) {
                // Success message if both deletions succeed
                pesan('success', 'Anggota dan pengguna terkait telah terhapus.');
            } else {
                // Error message if 'user' deletion fails
                pesan('danger', 'Pengguna tidak terhapus. Kesalahan: ' . mysqli_error($koneksi));
            }
        } else {
            // Error message if 'anggota' deletion fails
            pesan('danger', 'Data anggota tidak terhapus. Kesalahan: ' . mysqli_error($koneksi));
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
