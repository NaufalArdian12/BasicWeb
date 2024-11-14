<?php
if (session_status() === PHP_SESSION_NONE)
  session_start();


if (!empty($_SESSION['level'])) {
  require_once 'config/koneksi.php';
  require_once 'function/flasher.php';

  include 'admin/templatess/header.php';
  if (!empty($_GET['page'])) {
    include 'admin/module/' . $_GET['page'] . '/index.php';
  } else {
    include 'admin/templatess/home.php';
  }
  include 'admin/templatess/footer.php';
} else {
    header("Location: login.php");
}
