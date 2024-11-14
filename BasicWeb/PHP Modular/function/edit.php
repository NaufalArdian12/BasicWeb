<?php
session_start();

if (!empty($_SESSION['username'])) {
  require '../config/koneksi.php';
  require '../function/flasher.php';
  require '../function/anti_injection.php';

  if (!empty($_GET['jabatan'])) {
    $id = antiinjection($koneksi, $_POST['id']);
    $jabatan = antiinjection($koneksi, $_POST['jabatan']);
    $keterangan = antiinjection($koneksi, $_POST['keterangan']);

    $query = "UPDATE jabatan SET jabatan = '$jabatan', keterangan = '$keterangan' WHERE id = '$id'";

    if (mysqli_query($koneksi, $query)) {
      pesan('success', 'Jabatan telah diubah.');
    } else {
      pesan('danger', 'Gagal mengubah jabatan: ' . mysqli_error($koneksi));
    }

    header("Location: ../index.php?page=jabatan");
    exit();
  }elseif (!empty($_GET['anggota'])) {
    // Sanitize and retrieve input data
    $user_id = antiInjection($koneksi, $_POST['id']);
    $nama = antiInjection($koneksi, $_POST['nama']);
    $jabatan = antiInjection($koneksi, $_POST['jabatan']);
    $jenis_kelamin = antiInjection($koneksi, $_POST['jenis_kelamin']);
    $alamat = antiInjection($koneksi, $_POST['alamat']);
    $no_telp = antiInjection($koneksi, $_POST['no_telp']);
    $username = antiInjection($koneksi, $_POST['username']);
    $new_password = isset($_POST['password']) ? $_POST['password'] : null;
  
    // Update the anggota table
    $query_anggota = "
        UPDATE anggota 
        SET 
            nama = '$nama',
            jabatan_id = '$jabatan',
            jenis_kelamin = '$jenis_kelamin',
            alamat = '$alamat',
            no_telp = '$no_telp'
        WHERE user_id = '$user_id'
    ";
  
    if (mysqli_query($koneksi, $query_anggota)) {
      // If updating anggota data is successful
      if (!empty($new_password)) {
        // If password is provided, hash it and update the user table with username, password, and salt
        $salt = bin2hex(random_bytes(16));
        $combined_password = $salt . $new_password;
        $hashed_password = password_hash($combined_password, PASSWORD_BCRYPT);
  
        $query_user = "
                UPDATE user 
                SET 
                    username = '$username', 
                    password = '$hashed_password', 
                    salt = '$salt' 
                WHERE id = '$user_id'
            ";
  
        if (mysqli_query($koneksi, $query_user)) {
          pesan('success', "Data anggota dan password berhasil diubah.");
        } else {
          pesan('warning', "Data anggota berhasil diubah, tetapi password gagal diubah. Kesalahan: " . mysqli_error($koneksi));
        }
      } else {
        // If password is not provided, only update the username in the user table
        $query_user = "
                UPDATE user 
                SET 
                    username = '$username' 
                WHERE id = '$user_id'
            ";
  
        if (mysqli_query($koneksi, $query_user)) {
          pesan('success', "Data anggota berhasil diubah.");
        } else {
          pesan('warning', "Data anggota berhasil diubah, tetapi username gagal diubah. Kesalahan: " . mysqli_error($koneksi));
        }
      }
    } else {
      // If updating anggota data fails
      pesan('danger', "Gagal mengubah data anggota. Kesalahan: " . mysqli_error($koneksi));
    }
  
    // Redirect to the anggota page after processing
    header("Location: ../index.php?page=anggota");
    exit();
} 
}
