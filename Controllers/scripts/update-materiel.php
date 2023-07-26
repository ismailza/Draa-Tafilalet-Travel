<?php

require_once 'functions.php';
require_once '../MaterielController.class.php';

use Controllers\MaterielController;

if ((isset($_POST['update']))) {
  session_start();
  $nom = $_POST['nom'];
  $image1 = $_FILES['image1'];
  $image2 = $_FILES['image2'];
  $image3 = $_FILES['image3'];
  $prix = $_POST['prix'];
  $description = $_POST['description'];
  $id = $_POST['id'];

  $ac = new MaterielController;
  $ld = $ac->one($id);
  if (is_uploaded_file($image1['tmp_name'])) {
    if (!import_image($image1, '../../public/img/materiels')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_materiel?id=".$id);
      exit;
    }
  }
  else $image1['name'] = $ld->image_materiel1;
  if (is_uploaded_file($image2['tmp_name'])) {
    if (!import_image($image2, '../../public/img/materiels')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_materiel?id=".$id);
      exit;
    }
  }
  else $image2['name'] = $ld->image_materiel2;
  if (is_uploaded_file($image3['tmp_name'])) {
    if (!import_image($image3, '../../public/img/materiels')) {
      $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
      header("location: ../../Views/admin/update_materiel?id=".$id);
      exit;
    }
  }
  else $image3['name'] = $ld->image_materiel3;

  if ($ac->update($nom, $image1['name'], $image2['name'], $image3['name'], $prix, $description, $id))
    $_SESSION['success'] = "la modification du materiel est effectuée avec succès";
  else {
    $_SESSION['error'] = "Un problème est survenu lors de la modification du materiel";
    header("location: ../../Views/admin/update_materiel?id=".$id);
    exit;
  }
}
header("location: ../../Views/admin/show_materiels");