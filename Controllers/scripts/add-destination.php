<?php

require_once 'functions.php';
require_once '../DestinationController.class.php';

use Controllers\DestinationController;

if ((isset($_POST['submit']))) {
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

  if (
    !import_image($image1, '../../public/img/destinations') ||
    !import_image($image2, '../../public/img/destinations') ||
    !import_image($image3, '../../public/img/destinations')
  ) {
    $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
    header("location: ../../Views/admin/add_destination");
    exit;
  }

  $ac = new DestinationController;
  if ($ac->create($nom, $ville, $province, $image1['name'], $image2['name'], $image3['name'], $localisation, $carte, $description)) $_SESSION['success'] = "l'ajout de la destination est effectué avec succès";
  else $_SESSION['error'] = "Un problème est survenu lors de l'ajout de la destination";
  header("location: ../../Views/admin/show_destinations");
} else header("location: ../../Views/admin/add_destination");
