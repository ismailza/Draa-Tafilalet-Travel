<?php

require_once '../AdminController.class.php';
use Controllers\AdminController;

if(isset($_POST['submit'])) {
  session_start();

  $nom = $_POST['nom_admin'];
  $prenom = $_POST['prenom_admin'];
  $image = $_FILES['photo_admin']['name'];
  $email = $_POST['email_admin'];
  $login = $_POST['login_admin'];
  $password = password_hash($_POST['password_admin'], PASSWORD_DEFAULT);

  if (is_uploaded_file($_FILES['photo_admin']['tmp_name'])) {
    $target_file = "../../Views/admin/images/profile/" . $image;
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
    $valid_extension = array("png", "jpeg", "jpg");
    if (!in_array($file_extension, $valid_extension)) {
      $_SESSION['error'] = "Extension de l'image non valide: png, jpeg, png";
      header("location: ../../Views/admin/account-update");
      exit;
    }
    if (!move_uploaded_file($_FILES['photo_admin']['tmp_name'], $target_file)) {
      $_SESSION['error'] = "Un problème est survenu! Image non importé!";
      header("location: ../../Views/admin/account-update");
      exit;
    }
  }
  else $image = $_SESSION['admin']->image_admin;
  
  $ac = new AdminController;
  if ($ac->update($nom, $prenom, $image, $email, $login, $password, $_SESSION['admin']->id_admin)) {
    $_SESSION['admin'] = $ac->one($_SESSION['admin']->id_admin);
    $_SESSION['success'] = "Votre modification est bien effectuée";
    unset($_SESSION['update']);
  }
  else $_SESSION['error'] = "Something is wrong!";
}
header("location: ../../Views/admin/account");