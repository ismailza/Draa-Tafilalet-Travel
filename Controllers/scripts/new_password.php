<?php
require_once '../ClientController.class.php';

use Controllers\ClientController;

if (isset($_POST['submit'])) {
  session_start();
  $cc = new ClientController;
  $password = $_POST['password'];
  $email = $_POST['email'];

  if ($cc->changePassword($email, $password)) {
    unset($_SESSION['new']);
    $_SESSION['success'] = "Votre mot de passe est modifié avec succès";
    header("location: ../../Views/signform");
  } else {
    $_SESSION['error'] = "Un problème est survenu veuillez réessayer";
    header("location: ../../Views/signform");
  }
}
