<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "config/koneksi.php";
include "function/flasher.php";
include "function/anti_injection.php";

$username = antiinjection($koneksi, $_POST['username']);
$password = antiinjection($koneksi, $_POST['password']);

$query = "SELECT username, level, salt, password AS hashed_password FROM user WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $salt = $row['salt'];
    $hashed_password = $row['hashed_password'];
    mysqli_close($koneksi);

    if ($salt !== null && $hashed_password !== null) {
        $combined_password = $salt . $password;

        if (password_verify($combined_password, $hashed_password)) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['level'] = $row['level'];
            header("Location: index.php");
            exit();
        } else {
            pesan('danger', "Login gagal. Password Anda Salah.");
            header("Location: login.php");
            exit();
        }
    }
} else {
    pesan('warning', "Username tidak ditemukan.");
    header("Location: login.php");
}
?>
