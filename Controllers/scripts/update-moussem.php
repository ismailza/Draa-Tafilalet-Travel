<?php

require_once 'functions.php';
require_once '../MoussemController.class.php';

use Controllers\MoussemController;

if ((isset($_POST['update']))) {
  session_start();
  $nom = $_POST['nom_moussem'];
  $ville = $_POST['ville_moussem'];
  $image1 = $_FILES['image_moussem1'];
  $image2 = $_FILES['image_moussem2'];
  $image3 = $_FILES['image_moussem3'];
  $description = $_POST['description_moussem'];
  $id = $_POST['id'];

  $ac = new MoussemController;
  $ld = $ac->one($id);
  if (is_uploaded_file($image1['tmp_name'])) {
    if (!import_image($image1, '../../public/img/moussems')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_moussem?id=".$id);
      exit;
    }
  }
  else $image1['name'] = $ld->image_moussem1;
  if (is_uploaded_file($image2['tmp_name'])) {
    if (!import_image($image2, '../../public/img/moussems')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_moussem?id=".$id);
      exit;
    }
  }
  else $image2['name'] = $ld->image_moussem2;
  if (is_uploaded_file($image3['tmp_name'])) {
    if (!import_image($image3, '../../public/img/moussems')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_moussem?id=".$id);
      exit;
    }
  }
  else $image3['name'] = $ld->image_moussem3;

  if ($ac->update($nom, $ville, $image1['name'], $image2['name'], $image3['name'], $description, $id))
    $_SESSION['success'] = "la modification du moussem est effectuée avec succès";
  else {
    $_SESSION['error'] = "Un problème est survenu lors de la modification du moussem";
    header("location: ../../Views/admin/update_moussem?id=".$id);
    exit;
  }
}
header("location: ../../Views/admin/show_moussems");