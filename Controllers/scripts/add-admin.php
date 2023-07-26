<?php

require_once '../AdminController.class.php';
use Controllers\AdminController;

if(isset($_POST['submit'])) {
  session_start();

  $nom = $_POST['nom_admin'];
  $prenom = $_POST['prenom_admin'];
  $image = $_FILES['photo_admin'];
  $email = $_POST['email_admin'];
  $login = $_POST['login_admin'];
  $password = password_hash($_POST['password_admin'], PASSWORD_DEFAULT);

  if (is_uploaded_file($image['tmp_name'])) {
    if (!import_image($image, '../../Views/admin/images/profile')) {
      $_SESSION['error'] = "Un problème est survenu! Image non importé!";
    }
  }
  else $image['name'] = NULL;
  
  $ac = new AdminController;
  if ($ac->create($nom, $prenom, $image['name'], $email, $login, $password)) {
    $_SESSION['success'] = "L'ajout d'un admin est bien effectué";
    header("location: ../../Views/admin/show_admins");
    exit;
  }
  else $_SESSION['error'] = "Something is wrong!";
}
header("location: ../../Views/admin/add_admin");