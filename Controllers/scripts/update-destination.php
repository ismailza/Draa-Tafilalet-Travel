<?php

require_once 'functions.php';
require_once '../DestinationController.class.php';

use Controllers\DestinationController;

if ((isset($_POST['update']))) {
  session_start();
  $nom = $_POST['nom_dest'];
  $ville = $_POST['ville_dest'];
  $province = $_POST['province'];
  $image1 = $_FILES['image_dest1'];
  $image2 = $_FILES['image_dest2'];
  $image3 = $_FILES['image_dest3'];
  $localisation = $_POST['loc_dest'];
  $carte = $_POST['carte_dest'];
  $description = $_POST['description_dest'];
  $id = $_POST['id'];

  $ac = new DestinationController;
  $ld = $ac->one($id);
  if (is_uploaded_file($image1['tmp_name'])) {
    if (!import_image($image1, '../../public/img/destinations')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_destination?id=".$id);
      exit;
    }
  }
  else $image1['name'] = $ld->image_destination1;
  if (is_uploaded_file($image2['tmp_name'])) {
    if (!import_image($image2, '../../public/img/destinations')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_destination?id=".$id);
      exit;
    }
  }
  else $image2['name'] = $ld->image_destination2;
  if (is_uploaded_file($image3['tmp_name'])) {
    if (!import_image($image3, '../../public/img/destinations')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_destination?id=".$id);
      exit;
    }
  }
  else $image3['name'] = $ld->image_destination3;

  if ($ac->update($nom, $province, $ville, $image1['name'], $image2['name'], $image3['name'], $localisation, $carte, $description, $id))
    $_SESSION['success'] = "la modification de la destination est effectuée avec succès";
  else {
    $_SESSION['error'] = "Un problème est survenu lors de la modification de la destination";
    header("location: ../../Views/admin/update_destination?id=".$id);
    exit;
  }
}
header("location: ../../Views/admin/show_destinations");