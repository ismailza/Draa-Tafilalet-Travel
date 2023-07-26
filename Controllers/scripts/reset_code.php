<?php

use Controllers\ClientController;

require_once '../ClientController.class.php';

if (isset($_POST['code_check'])) {
  session_start();
  $in_code = $_POST['code'];
  $email = $_POST['email'];

  $cc = new ClientController;
  if ($code = $cc->getCodeVerification($email)) {
    if ($in_code == $code) {
      $cc->deleteVerificationCode($email);
      if (isset($_SESSION['signup'])) {
        unset($_SESSION['signup']);
        unset($_SESSION['reset']);
        $_SESSION['success'] = "Votre inscription bien effectuée";
        header("location: ../../Views/signform");
      } elseif (isset($_SESSION['reset'])) {
        unset($_SESSION['reset']);
        $_SESSION['new'] = $email;
        $_SESSION['success'] = "Saisir nouveau mot de passe!";
        header("location: ../../Views/new_password");
      }
    }
    else {
    $_SESSION['error'] = "Code de verification est incorrect";
    header("location: ../../Views/reset_code");
    }
  }
  else {
    $_SESSION['error'] = "Something is wrong!";
    header("location: ../../Views/signform");
  }
}
else header("location: ../../Views/signform");
