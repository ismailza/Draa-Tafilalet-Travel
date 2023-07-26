<?php

require_once 'functions.php';
require_once '../PlatController.class.php';

use Controllers\PlatController;

if ((isset($_POST['submit']))) {
  session_start();
  $nom = $_POST['nom_plat'];
  $image1 = $_FILES['image_plat1'];
  $image2 = $_FILES['image_plat2'];
  $image3 = $_FILES['image_plat3'];
  $description = $_POST['description_plat'];

  if (
    !import_image($image1, '../../public/img/plats') ||
    !import_image($image2, '../../public/img/plats') ||
    !import_image($image3, '../../public/img/plats')
  ) {
    $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
    header("location: ../../Views/admin/add_dish");
    exit;
  }

  $ac = new PlatController;
  if ($ac->create($nom, $image1['name'], $image2['name'], $image3['name'], $description)) $_SESSION['success'] = "l'ajout du plat est effectué avec succès";
  else $_SESSION['error'] = "Un problème est survenu lors de l'ajout du plat";
  header("location: ../../Views/admin/show_dishs");
} else header("location: ../../Views/admin/add_dish");
