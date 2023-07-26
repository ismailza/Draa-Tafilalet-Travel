<?php
require_once '../ClientController.class.php';
use Controllers\ClientController;

if (isset($_POST['submit'])) {
  session_start();
  $cc = new ClientController;
  $client = $cc->auth($_POST['login'], $_POST['password']);
  if ($client) {
    if ($cc->verified($client->email_client))
    {
      $_SESSION['auth'] = $client;
      if (isset($_SESSION['url'])) {
        header("location: ".$_SESSION['url']);
        unset($_SESSION['url']);
      }
      else header("location: ../../Views/index");
    }
    else {
      $_SESSION['reset'] = $client->email_client;
      $_SESSION['signup'] = true;
      $_SESSION['success'] = "Vérifier votre boite email";
      header("location: ../../Views/reset_code");
    }
  }
  else {
    $_SESSION['error'] = "Nom d'utilisateur ou mot de passe incorrect!";
    header("location: ../../Views/signform");
  }
}
else header("location: ../../Views/signform");