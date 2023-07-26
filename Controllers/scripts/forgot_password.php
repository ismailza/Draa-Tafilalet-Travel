<?php

use Controllers\ClientController;

require_once '../ClientController.class.php';

  session_start();
  if (isset($_POST['check']))
  {
    $email = htmlspecialchars($_POST['email']);
    
    $cc = new ClientController;
    if ($cc->checkEmail($email)) {
      if ($cc->sentCodeVerification($email)) {
        $_SESSION['success'] = "Nous avons envoyé le code de récupération à votre email";
        $_SESSION['reset'] = $email;
        header("location: ../../Views/reset_code");
        exit;
      }
      else $_SESSION['error'] = "Un problème est survenu!, veuillez réessayer";
    }
    else $_SESSION['error'] = "Cet email n'existe pas!";
  }
  header("location: ../../Views/forgot_password");
