<?php
  session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
  if (!isset($_SESSION['auth']))
  {
    $_SESSION['url'] = $_SERVER['REQUEST_URI'];
    $_SESSION['warning'] = 'Vous devez se connecté pour accéder à cette page';
    header("location: ../../Views/signform");
    exit();
  }