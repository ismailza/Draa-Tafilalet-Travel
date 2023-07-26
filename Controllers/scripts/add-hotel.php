<?php

require_once 'functions.php';
require_once '../HotelController.class.php';

use Controllers\HotelController;

if ((isset($_POST['submit']))) {
  session_start();
  $nom = $_POST['nom_hot'];
  $ville = $_POST['ville_hot'];
  $province = $_POST['province_hot'];
  $image1 = $_FILES['image_hot1'];
  $image2 = $_FILES['image_hot2'];
  $image3 = $_FILES['image_hot3'];
  $localisation = $_POST['loc_hot'];
  $carte = $_POST['carte_hot'];
  $nb_chambre = $_POST['nbChambres'];
  $classe = $_POST['classe_hot'];
  $prix = $_POST['prix'];

  if (
    !import_image($image1, '../../public/img/hotels') ||
    !import_image($image2, '../../public/img/hotels') ||
    !import_image($image3, '../../public/img/hotels')
  ) {
    $_SESSION['error'] = "Un problème est survenu lors de l'importation de l'image";
    header("location: ../../Views/admin/add_hotel");
    exit;
  }

  $ac = new HotelController;
  if ($ac->create($nom, $ville, $province, $image1['name'], $image2['name'], $image3['name'], $localisation, $carte, $nb_chambre, $classe, $prix)) $_SESSION['success'] = "l'ajout de la hotel est effectué avec succès";
  else $_SESSION['error'] = "Un problème est survenu lors de l'ajout de l'hotel";
  header("location: ../../Views/admin/show_hotels");
} else header("location: ../../Views/admin/add_hotel");