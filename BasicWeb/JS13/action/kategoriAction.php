<?php include
('../lib/Session.php');

$session = new Session();

if ($session->get('is_login') !== true) {
  header('Location: login.php');
}

include_once('../model/KategoriModel.php');
include_once('../lib/Secure.php');
$act = isset($_GET['act']) ? strtolower($_GET['act']) : '';
if ($act == 'load') {
  $kategori = new KategoriModel();
  $data = $kategori->getData();
  $result = [];
  $i = 1;
  while ($row = $data->fetch_assoc()) {
    $result['data'][] = [
      $i,
      $row['kategori_kode'],
      $row['kategori_nama'],
      '<button class="btn btn-sm btn-warning" onclick="editData(' . $row['kategori_id'] . ')"><i class="fa fa-edit"></i></button>
  <button class="btn btn-sm btn-danger" onclick="deleteData(' . $row['kategori_id'] . ')"><i class="fa fa-trash"></i></button>'
    ];
    $i++;
  }
  echo json_encode($result);
}

if ($act == 'get') {
  $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;

  $kategori = new KategoriModel();
  $data = $kategori->getDataById($id);
  echo json_encode($data);
}

if ($act == 'save') {
  $data = [
    'kategori_kode' => antiSqlInjection($_POST['kategori_kode']),
    'kategori_nama' => antiSqlInjection($_POST['kategori_nama'])
  ];

  $kategori = new KategoriModel();
  $kategori->insertData($data);

  echo json_encode([
    'status' => true,
    'message' => 'Data berhasil disimpan.'
  ]);
}

if ($act == 'update') {
  $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
  $data = [
    'kategori_kode' => antiSqlInjection($_POST['kategori_kode']),
    'kategori_nama' => antiSqlInjection($_POST['kategori_nama'])
  ];

  $kategori = new KategoriModel();
  $kategori->updateData($id, $data);

  echo json_encode([
    'status' => true,
    'message' => 'Data berhasil diupdate.'
  ]);
}

if ($act == 'delete') {
  $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;

  $kategori = new KategoriModel();
  $kategori->deleteData($id);

  echo json_encode([
    'status' => true,
    'message' => 'Data berhasil dihapus.'
  ]);
}
