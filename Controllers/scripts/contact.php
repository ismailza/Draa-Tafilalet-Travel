<?php

use Controllers\MessageController;

require_once '../MessageController.class.php';

if (isset($_POST['submit']))
{
  session_start();
  $nom_redacteur = $_POST['nom_red'];
  $email_redacteur = $_POST['email_red'];
  $sujet = $_POST['sujet'];
  $message = $_POST['message'];
  
  $mc = new MessageController;
  if ($mc->create($nom_redacteur, $email_redacteur, $sujet, $message))
    $_SESSION['success'] = "Votre message est envoyé avec succès";
  else $_SESSION['error'] = "Un problème est survenu veuillez réessayer";
}
header('location: ../../Views/contact');