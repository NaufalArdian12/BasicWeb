<?php
include('../lib/Session.php');
include('../lib/Connection.php');

$session = new Session();

$act = isset($_GET['act']) ? strtolower($_GET['act']) : '';

if ($act == 'login') {
    // Validasi input
    if (!isset($_POST['username'], $_POST['password']) || empty($_POST['username']) || empty($_POST['password'])) {
        $session->setFlash('status', false);
        $session->setFlash('message', 'Username dan password tidak boleh kosong.');
        $session->commit();
        header('Location: ../login.php', false);
        exit;
    }

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Query untuk mendapatkan data pengguna berdasarkan username
    $query = $db->prepare('SELECT * FROM m_user WHERE username = ?');
    $query->bind_param('s', $username);
    $query->execute();
    $data = $query->get_result()->fetch_assoc();

    // Jika data ditemukan dan password cocok
    if ($data && password_verify($password, $data['password'])) {
        $session->set('is_login', true);
        $session->set('username', $data['username']);
        $session->set('name', $data['nama']);
        $session->set('level', $data['level']);
        $session->commit();

        header('Location: ../index.php', false);
        exit;
    } else {
        // Jika login gagal
        $session->setFlash('status', false);
        $session->setFlash('message', 'Username atau password salah.');
        $session->commit();
        header('Location: ../login.php', false);
        exit;
    }
} else if ($act == 'logout') {
    // Hapus semua data sesi dan logout
    $session->deleteAll();
    header('Location: ../login.php', false);
    exit;
} else {
    // Jika tidak ada aksi yang valid
    header('Location: ../login.php', false);
    exit;
}
?>
