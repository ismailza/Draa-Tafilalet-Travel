<?php
require_once '../ClientController.class.php';
use Controllers\ClientController;

if(isset($_POST['submit'])) {
  session_start();

  $nom = $_POST['nom_client'];
  $prenom = $_POST['prenom_client'];
  $email = $_POST['email_client'];
  $login = $_POST['login_client'];
  $password = password_hash($_POST['password_client'], PASSWORD_DEFAULT);
  
  $cc = new ClientController;
  if ($cc->update($nom, $prenom, $email, $login, $password, $_SESSION['auth']->id_client)) {
    $_SESSION['auth'] = $cc->one($_SESSION['auth']->id_client);
    $_SESSION['success'] = "Votre modification est bien effectuée";
    unset($_SESSION['update']);
  }
  else $_SESSION['error'] = "Something is wrong!";
}
header("location: ../../Views/account");