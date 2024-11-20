<?php
class Session
{
  public function __construct()
  {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  }

  public function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public function get($key)
  {
    return (isset($_SESSION[$key])) ? $_SESSION[$key] : null;
  }

  public function exist($key)
  {
    return (isset($_SESSION[$key])) ? true : false;
  }

  public function delete($key)
  {
    if (isset($_SESSION[$key])) {
      unset($_SESSION[$key]);
    }
  }

  public function setFlash($key, $value)
  {
    $_SESSION['flash'][$key] = $value;
  }

  public function getFlash($key)
  {
    $value = (isset($_SESSION['flash'][$key])) ? $_SESSION['flash'][$key] : null;

    $this->deleteFlash($key);
    return $value;
  }

  public function deleteFlash($key)
  {
    if (isset($_SESSION['flash'][$key])) {
      unset($_SESSION['flash'][$key]);
    }
  }

  public function deleteAllFlash()
  {
    if (isset($_SESSION['flash'])) {
      unset($_SESSION['flash']);
    }
  }

  public function deleteAll()
  {
    session_destroy();
  }

  public function commit()
  {
    session_commit();
  }
}
