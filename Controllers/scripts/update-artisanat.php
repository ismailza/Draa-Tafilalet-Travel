<?php

require_once 'functions.php';
require_once '../ArtisanatController.class.php';

use Controllers\ArtisanatController;

if ((isset($_POST['update']))) {
  session_start();
  $nom = $_POST['nom_artisanat'];
  $image = $_FILES['image_artisanat'];
  $id = $_POST['id'];

  $ac = new ArtisanatController;

  if (is_uploaded_file($image['tmp_name'])) {
    if (!import_image($image, '../../public/img/artisanats')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_artisanat?id=".$id);
      exit;
    }
  }
  else $image['name'] = $ac->one($id)->image_artisanat;
  if ($ac->update($nom, $image['name'], $id)) $_SESSION['success'] = "la modification de l'arisanat est effectuée avec succès";
  else {
    $_SESSION['error'] = "Un problème est survenu lors de la modification de l'artisanat";
    header("location: ../../Views/admin/update_artisanat?id=".$id);
    exit;
  }
}
header("location: ../../Views/admin/show_artisanats");