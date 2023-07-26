<?php

require_once 'functions.php';
require_once '../MaterielController.class.php';

use Controllers\MaterielController;

if ((isset($_POST['submit']))) {
  session_start();
  $nom = $_POST['nom'];
  $image1 = $_FILES['image1'];
  $image2 = $_FILES['image2'];
  $image3 = $_FILES['image3'];
  $prix = $_POST['prix'];
  $description = $_POST['description'];

  if (
    !import_image($image1, '../../public/img/materials') ||
    !import_image($image2, '../../public/img/materials') ||
    !import_image($image3, '../../public/img/materials')
  ) {
    $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
    header("location: ../../Views/admin/add_materiel");
    exit;
  }

  $ac = new MaterielController;
  if ($ac->create($nom, $image1['name'], $image2['name'], $image3['name'], $prix, $description)) $_SESSION['success'] = "l'ajout du materiel est effectué avec succès";
  else $_SESSION['error'] = "Un problème est survenu lors de l'ajout du materiel";
  header("location: ../../Views/admin/show_materiels");
} else header("location: ../../Views/admin/add_materiel");
