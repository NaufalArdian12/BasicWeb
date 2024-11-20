<?php
include('../lib/Session.php');
$session = new Session();

// Check if user is logged in
if ($session->get('is_login') !== true) {
  header('Location: login.php');
}

include_once('../model/bukuModel.php');
include_once('../lib/Secure.php');

// Get action (act) from GET parameters
$act = isset($_GET['act']) ? strtolower($_GET['act']) : '';

// ** Load Data Buku **
if ($act == 'load') {
  $buku = new bukuModel();
  $data = $buku->getData();
  $result = [];
  $i = 1;

  while ($row = $data->fetch_assoc()) {
    $result['data'][] = [
      $i,
      $row['buku_nama'],          // Book Name
      $row['buku_kode'],          // Book Code
      $row['kategori_nama'],      // Category Name
      $row['jumlah'],             // Quantity
      $row['deskripsi'],          // Description
      '<img src="' . $row['gambar'] . '" style="width:50px;height:auto;">', // Image
      '<button class="btn btn-sm btn-warning" onclick="editData(' . $row['buku_id'] . ')"><i class="fa fa-edit"></i></button>
           <button class="btn btn-sm btn-danger" onclick="deleteData(' . $row['buku_id'] . ')"><i class="fa fa-trash"></i></button>'
    ];
    $i++;
  }

  // Return valid JSON
  echo json_encode($result);
}

// ** Load Data Kategori **
if ($act == 'load_kategori') {
  $buku = new bukuModel();
  $data = $buku->getKategori(); // Get categories
  $result = [];

  while ($row = $data->fetch_assoc()) {
    $result[] = [
      'kategori_id' => $row['kategori_id'],
      'kategori_nama' => $row['kategori_nama']
    ];
  }

  // Return the category data as JSON
  echo json_encode($result);
}

// ** Get Data Buku by ID **
if ($act == 'get') {
  $id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : 0;

  $buku = new bukuModel();
  $data = $buku->getDataById($id);
  echo json_encode($data);
}

// ** Save Data Buku **
if ($act == 'save') {
  // Sanitize and collect data
  $data = [
    'buku_nama' => antiSqlInjection($_POST['buku_nama']),
    'buku_kode' => antiSqlInjection($_POST['buku_kode']),
    'kategori_id' => antiSqlInjection($_POST['kategori_id']),
    'jumlah' => antiSqlInjection($_POST['jumlah']),
    'deskripsi' => antiSqlInjection($_POST['deskripsi']),
    'gambar' => antiSqlInjection($_POST['gambar'])
  ];

  $buku = new bukuModel();
  $buku->insertData($data);

  echo json_encode([
    'status' => true,
    'message' => 'Data buku berhasil disimpan.'
  ]);
}

// ** Update Data Buku **
if ($act == 'update') {
  $id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : 0;
  $data = [
    'buku_nama' => antiSqlInjection($_POST['buku_nama']),
    'buku_kode' => antiSqlInjection($_POST['buku_kode']),
    'kategori_id' => antiSqlInjection($_POST['kategori_id']),
    'jumlah' => antiSqlInjection($_POST['jumlah']),
    'deskripsi' => antiSqlInjection($_POST['deskripsi']),
    'gambar' => antiSqlInjection($_POST['gambar'])
  ];

  $buku = new bukuModel();
  $buku->updateData($id, $data);

  echo json_encode([
    'status' => true,
    'message' => 'Data buku berhasil diupdate.'
  ]);
}

// ** Delete Data Buku **
if ($act == 'delete') {
  $id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : 0;

  $buku = new bukuModel();
  $buku->deleteData($id);

  echo json_encode([
    'status' => true,
    'message' => 'Data buku berhasil dihapus.'
  ]);
}
