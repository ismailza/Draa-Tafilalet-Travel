<?php

require_once 'functions.php';
require_once '../PlatController.class.php';

use Controllers\PlatController;

if ((isset($_POST['update']))) {
  session_start();
  $nom = $_POST['nom_plat'];
  $image1 = $_FILES['image_plat1'];
  $image2 = $_FILES['image_plat2'];
  $image3 = $_FILES['image_plat3'];
  $description = $_POST['description_plat'];
  $id = $_POST['id'];

  $ac = new PlatController;
  $ld = $ac->one($id);
  if (is_uploaded_file($image1['tmp_name'])) {
    if (!import_image($image1, '../../public/img/plats')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_dish?id=".$id);
      exit;
    }
  }
  else $image1['name'] = $ld->image_plat1;
  if (is_uploaded_file($image2['tmp_name'])) {
    if (!import_image($image2, '../../public/img/plats')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_dish?id=".$id);
      exit;
    }
  }
  else $image2['name'] = $ld->image_plat2;
  if (is_uploaded_file($image3['tmp_name'])) {
    if (!import_image($image3, '../../public/img/plats')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_dish?id=".$id);
      exit;
    }
  }
  else $image3['name'] = $ld->image_plat3;

  if ($ac->update($nom, $image1['name'], $image2['name'], $image3['name'], $description, $id))
    $_SESSION['success'] = "la modification du plat est effectuée avec succès";
  else {
    $_SESSION['error'] = "Un problème est survenu lors de la modification du plat";
    header("location: ../../Views/admin/update_dish?id=".$id);
    exit;
  }
}
header("location: ../../Views/admin/show_dishs");