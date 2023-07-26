<?php

require_once 'functions.php';
require_once '../ArtisanatController.class.php';

use Controllers\ArtisanatController;

if ((isset($_POST['submit']))) {
  session_start();
  $nom = $_POST['nom_art'];
  $image = $_FILES['image_art'];

  if (!import_image($image, '../../public/img/artisanats')) {
    $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
    header("location: ../../Views/admin/add_artisanat");
    exit;
  }

  $ac = new ArtisanatController;
  if ($ac->create($nom, $image['name'])) $_SESSION['success'] = "l'ajout de l'arisanat est effectué avec succès";
  else $_SESSION['error'] = "Un problème est survenu lors de l'ajout de l'artisanat";
  header("location: ../../Views/admin/show_artisanats");
}
else header("location: ../../Views/admin/add_artisanat");
