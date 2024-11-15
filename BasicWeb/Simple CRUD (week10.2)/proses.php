<?php
include('koneksi.php');

// Retrieve data from form
$aksi = $_GET['aksi'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];

if ($aksi === 'tambah') {
  // SQL query to insert data
  $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) 
              VALUES ('$nama', '$jenis_kelamin', '$alamat', '$no_telp')";

  // Execute query
  if (mysqli_query($koneksi, $query)) {
    header("Location: index.php"); // Redirect to index page
    exit;
  } else {
    // Display error message if insertion fails
    echo "Gagal menambahkan data: " . mysqli_error($koneksi);
  }
} elseif ($aksi === 'ubah') {
  if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // SQL query to update data
    $query = "UPDATE anggota SET 
                nama = '$nama', 
                jenis_kelamin = '$jenis_kelamin', 
                alamat = '$alamat', 
                no_telp = '$no_telp' 
                WHERE id = $id";

    // Execute the query
    if (mysqli_query($koneksi, $query)) {
      header("Location: index.php"); // Redirect to index page
      exit;
    } else {
      // Error handling if the query fails
      echo "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
  } else {
    // Error message if ID is not set
    echo "ID tidak valid.";
  }
} elseif ($aksi === 'hapus') {
  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to delete data
    $query = "DELETE FROM anggota WHERE id = $id";

    // Execute the query
    if (mysqli_query($koneksi, $query)) {
      header("Location: index.php"); // Redirect to index page
      exit;
    } else {
      // Error handling if the query fails
      echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
  } else {
    // Error message if ID is not set
    echo "ID tidak valid.";
  }
} else {
  // Redirect to index if no valid action is provided
  header("Location: index.php");
  exit;
}

// Close the database connection
mysqli_close($koneksi);
