<?php

require_once 'functions.php';
require_once '../MoussemController.class.php';

use Controllers\MoussemController;

if ((isset($_POST['submit']))) {
  session_start();
  $nom = $_POST['nom_moussem'];
  $ville = $_POST['ville_moussem'];
  $image1 = $_FILES['image_moussem1'];
  $image2 = $_FILES['image_moussem2'];
  $image3 = $_FILES['image_moussem3'];
  $description = $_POST['description_moussem'];

  if (
    !import_image($image1, '../../public/img/moussems') ||
    !import_image($image2, '../../public/img/moussems') ||
    !import_image($image3, '../../public/img/moussems')
  ) {
    $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
    header("location: ../../Views/admin/add_moussem");
    exit;
  }

  $ac = new MoussemController;
  if ($ac->create($nom, $ville, $image1['name'], $image2['name'], $image3['name'], $description)) $_SESSION['success'] = "l'ajout du moussem est effectué avec succès";
  else $_SESSION['error'] = "Un problème est survenu lors de l'ajout du moussem";
  header("location: ../../Views/admin/show_moussems");
} else header("location: ../../Views/admin/add_moussem");
