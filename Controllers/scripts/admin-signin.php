<?php
require_once '../AdminController.class.php';
use Controllers\AdminController;

if (isset($_POST['submit'])) {
  session_start();
  $ac = new AdminController;
  $admin = $ac->auth($_POST['username'], $_POST['password']);
  if ($admin) {
    $_SESSION['admin'] = $admin;
    if (!empty($_POST['remember']))
    {
      $expired = time()+3600*24*60;
      setcookie('login', $login, $expired);
      setcookie('password', password_hash($password, PASSWORD_DEFAULT), $expired);
    }
    if (isset($_SESSION['url'])) {
      header("location: ".$_SESSION['url']);
      unset($_SESSION['url']);
    }
    else header("location: ../../Views/admin/index");
  }
  else {
    $_SESSION['error'] = "Nom d'utilisateur ou mot de passe incorrect!";
    header("location: ../../Views/admin/login");
  }
}
else header("location: ../../Views/admin/login");